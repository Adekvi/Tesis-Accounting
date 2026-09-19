<?php

namespace App\Console\Commands;

use App\Services\SchemaCompiler;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class ProvisionTenant extends Command
{
    protected $signature = 'tenant:provision {toko_id : ID toko pada tabel tokos di central DB}';

    protected $description = 'Provisioning database baru untuk toko sesuai engine yang dipilih, berdasarkan skema kanonik';

    protected array $templateMap = [
        'mysql' => 'mysql_template',
        'pgsql' => 'pgsql_template',
        'mongodb' => 'mongodb_template',
    ];

    public function handle(): int
    {
        $toko = DB::connection('central')->table('tokos')->find($this->argument('toko_id'));

        if (! $toko) {
            $this->error('Toko tidak ditemukan.');
            return self::FAILURE;
        }

        $this->info("Memulai provisioning untuk toko: {$toko->nama_toko} ({$toko->engine_db})");

        try {
            $schemas = $this->loadCanonicalSchemas();

            if (empty($schemas)) {
                $this->warn('Tidak ada file skema di database/schema/canonical/*.json — tidak ada yang di-provision.');
                return self::FAILURE;
            }

            match ($toko->engine_db) {
                'mysql', 'pgsql' => $this->provisionSql($toko, $schemas),
                'mongodb' => $this->provisionMongo($toko, $schemas),
                default => throw new RuntimeException("Engine '{$toko->engine_db}' belum didukung."),
            };
        } catch (RuntimeException $e) {
            $this->error($e->getMessage());
            return self::FAILURE;
        }

        $this->seedDefaultData($toko);

        DB::connection('central')->table('tokos')
            ->where('id', $toko->id)
            ->update(['status' => 'active', 'updated_at' => now()]);

        $this->info("Toko {$toko->nama_toko} berhasil diaktifkan.");
        return self::SUCCESS;
    }

    /**
     * Baca seluruh definisi skema kanonik dari database/schema/canonical/*.json
     * Folder ini dibuat manual (lihat README) — sejajar dengan database/migrations/.
     */
    protected function loadCanonicalSchemas(): array
    {
        $path = database_path('schema/canonical');
        $schemas = [];

        foreach (glob("{$path}/*.json") as $file) {
            $decoded = json_decode(file_get_contents($file), true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new RuntimeException("Gagal parse JSON: {$file} — " . json_last_error_msg());
            }

            $schemas[basename($file, '.json')] = $decoded;
        }

        return $schemas;
    }

    protected function provisionSql(object $toko, array $schemas): void
    {
        $adminConnection = $toko->engine_db === 'mysql' ? 'mysql_admin' : 'pgsql_admin';

        $this->createDatabaseIfMissing($adminConnection, $toko->engine_db, $toko->nama_database);
        $this->bindTenantConnection($toko);

        $compiler = new SchemaCompiler();
        $count = 0;

        foreach ($schemas as $name => $schema) {
            if (($schema['location'] ?? null) !== 'tenant') {
                continue; // skip skema milik central, misal 'toko'
            }

            $compiler->compileSql($name, $schema);
            $this->line("  \u{2713} Tabel '{$name}' siap.");
            $count++;
        }

        if ($count === 0) {
            $this->warn("  Tidak ada skema dengan location='tenant' yang ditemukan.");
        }
    }

    protected function provisionMongo(object $toko, array $schemas): void
    {
        // MongoDB membuat database secara implisit saat koleksi pertama dibuat,
        // jadi tidak perlu langkah createDatabaseIfMissing seperti SQL.
        $this->bindTenantConnection($toko);

        $compiler = new SchemaCompiler();
        $count = 0;

        foreach ($schemas as $name => $schema) {
            if (($schema['location'] ?? null) !== 'tenant') {
                continue;
            }

            $compiler->compileMongo($name, $schema);
            $this->line("  \u{2713} Collection '{$name}' siap.");
            $count++;
        }

        if ($count === 0) {
            $this->warn("  Tidak ada skema dengan location='tenant' yang ditemukan.");
        }
    }

    protected function createDatabaseIfMissing(string $adminConnection, string $driver, string $databaseName): void
    {
        if ($driver === 'mysql') {
            DB::connection($adminConnection)->statement(
                "CREATE DATABASE IF NOT EXISTS `{$databaseName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci"
            );
            return;
        }

        // PostgreSQL tidak mendukung 'CREATE DATABASE IF NOT EXISTS', jadi dicek manual dulu
        $exists = DB::connection($adminConnection)
            ->select('SELECT 1 FROM pg_database WHERE datname = ?', [$databaseName]);

        if (empty($exists)) {
            DB::connection($adminConnection)->statement("CREATE DATABASE \"{$databaseName}\"");
        }
    }

    /**
     * Sama persis dengan ResolveTenant::bindTenantConnection.
     * TODO tahap berikutnya: ekstrak ke 1 class/trait bersama (mis. App\Support\TenantConnectionResolver)
     * supaya tidak duplikasi logic antara middleware runtime dan command provisioning ini.
     */
    protected function bindTenantConnection(object $toko): void
    {
        $templateKey = $this->templateMap[$toko->engine_db]
            ?? throw new RuntimeException("Engine database '{$toko->engine_db}' tidak dikenali.");

        $template = config("database.connections.{$templateKey}");

        if (! $template) {
            throw new RuntimeException(
                "Koneksi template '{$templateKey}' tidak ditemukan di config/database.php. " .
                    "Pastikan config/database-additions.php sudah digabungkan."
            );
        }

        config([
            'database.connections.tenant' => array_merge($template, [
                'database' => $toko->nama_database,
                'host' => $toko->host ?: ($template['host'] ?? null),
                'port' => $toko->port ?: ($template['port'] ?? null),
            ]),
        ]);

        DB::purge('tenant');
    }

    /**
     * Seed rekening standar akuntansi apotek (chart of accounts minimal)
     * dan menyiapkan referensi tarif pajak default.
     *
     * table()->insert() di query builder Laravel bekerja sama untuk SQL maupun
     * MongoDB (paket mongodb/laravel-mongodb meniru API query builder biasa),
     * jadi 1 fungsi ini otomatis berlaku untuk ketiga engine tanpa percabangan.
     */
    protected function seedDefaultData(object $toko): void
    {
        $coa = [
            ['kode_akun' => '1.1.01', 'nama_akun' => 'Kas', 'kategori' => 'aktiva', 'kode_induk' => null, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.1.02', 'nama_akun' => 'Bank', 'kategori' => 'aktiva', 'kode_induk' => null, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.1.03', 'nama_akun' => 'Persediaan Obat', 'kategori' => 'aktiva', 'kode_induk' => null, 'saldo_normal' => 'debit'],
            ['kode_akun' => '1.1.04', 'nama_akun' => 'Piutang Dagang', 'kategori' => 'aktiva', 'kode_induk' => null, 'saldo_normal' => 'debit'],
            ['kode_akun' => '2.1.01', 'nama_akun' => 'Hutang Dagang', 'kategori' => 'kewajiban', 'kode_induk' => null, 'saldo_normal' => 'kredit'],
            ['kode_akun' => '2.1.02', 'nama_akun' => 'Hutang PPN Keluaran', 'kategori' => 'pajak', 'kode_induk' => null, 'saldo_normal' => 'kredit'],
            ['kode_akun' => '2.1.03', 'nama_akun' => 'PPN Masukan', 'kategori' => 'pajak', 'kode_induk' => null, 'saldo_normal' => 'debit'],
            ['kode_akun' => '4.1.01', 'nama_akun' => 'Penjualan Obat', 'kategori' => 'pendapatan', 'kode_induk' => null, 'saldo_normal' => 'kredit'],
            ['kode_akun' => '5.1.01', 'nama_akun' => 'Harga Pokok Penjualan', 'kategori' => 'biaya', 'kode_induk' => null, 'saldo_normal' => 'debit'],
        ];

        foreach ($coa as $akun) {
            DB::connection('tenant')->table('akun')->updateOrInsert(
                ['kode_akun' => $akun['kode_akun']],
                array_merge($akun, ['created_at' => now(), 'updated_at' => now()])
            );
        }

        $this->line("  \u{2713} Chart of accounts default (" . count($coa) . " akun) ditanam.");
        $this->line("  \u{2713} Rekening pajak (Hutang PPN Keluaran, PPN Masukan) sudah tersedia untuk modul perhitungan pajak.");
    }
}
