<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;
use RuntimeException;

class TenantConnectionResolver
{
    protected static array $templateMap = [
        'mysql' => 'mysql_template',
        'pgsql' => 'pgsql_template',
        'mongodb' => 'mongodb_template',
    ];

    /**
     * Bangun ulang koneksi 'tenant' agar mengarah ke database toko yang diberikan.
     * Dipakai oleh ResolveTenant::handle() (saat request masuk) dan
     * ProvisionTenant::bindTenantConnection() (saat provisioning) — sebelumnya
     * logic ini di-copy paste di dua tempat.
     */
    public static function resolve(object $toko): void
    {
        $templateKey = static::$templateMap[$toko->engine_db]
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
}
