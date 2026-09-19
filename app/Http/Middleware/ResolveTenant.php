<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ResolveTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */

    protected array $templateMap = [
        'mysql' => 'mysql_template',
        'pgsql' => 'pgsql_template',
        'mongodb' => 'mongodb_template',
    ];

    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('X-API-KEY');

        abort_unless($apiKey, 401, 'API key tidak ditemukan pada header X-API-KEY.');

        $keyRecord = DB::connection('central')
            ->table('api_keys')
            ->where('key_hash', hash('sha256', $apiKey))
            ->whereNull('revoked_at')
            ->first();

        abort_unless($keyRecord, 401, 'API key tidak valid atau sudah dicabut.');

        $toko = DB::connection('central')->table('tokos')->find($keyRecord->toko_id);

        abort_unless($toko, 404, 'Toko tidak ditemukan.');
        abort_unless($toko->status === 'active', 403, 'Toko belum aktif atau sedang ditangguhkan.');

        $this->bindTenantConnection($toko);

        // Simpan konteks toko yang sedang aktif, dipakai controller/service lain
        app()->instance('current_toko', $toko);

        return $next($request);
    }

    protected function bindTenantConnection(object $toko): void
    {
        $templateKey = $this->templateMap[$toko->engine_db]
            ?? abort(500, "Engine database '{$toko->engine_db}' tidak dikenali.");

        $template = config("database.connections.{$templateKey}");

        config([
            'database.connections.tenant' => array_merge($template, [
                'database' => $toko->nama_database,
                'host' => $toko->host ?: $template['host'],
                'port' => $toko->port ?: $template['port'],
            ]),
        ]);

        // Bersihkan koneksi lama supaya konfigurasi baru benar-benar dipakai
        DB::purge('tenant');
    }
}
