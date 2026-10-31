<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $stats = Cache::get('admin.stats');

        if (! $stats) {
            $stats = $this->loadStats();
            // Hanya cache hasil yang berhasil, supaya error koneksi tidak "menempel" 60 detik.
            if ($stats['ok']) {
                Cache::put('admin.stats', $stats, 60);
            }
        }

        return $this->render($request, 'admin.pages.dashboard', [
            'title' => 'Dashboard',
            'stats' => $stats,
        ]);
    }

    public function toko(Request $request)
    {
        try {
            $tokos = DB::connection('central')->table('tokos')
                ->select('id', 'nama_toko', 'engine_db', 'nama_database', 'status', 'created_at')
                ->orderByDesc('created_at')
                ->limit(100)
                ->get();
            $ok = true;
        } catch (\Throwable $e) {
            report($e);
            $tokos = collect();
            $ok = false;
        }

        return $this->render($request, 'admin.pages.toko', [
            'title' => 'Daftar toko',
            'tokos' => $tokos,
            'ok' => $ok,
        ]);
    }

    private function loadStats(): array
    {
        try {
            $c = DB::connection('central');

            $status = $c->table('tokos')->selectRaw('status, count(*) as total')
                ->groupBy('status')->pluck('total', 'status')->all();
            $engine = $c->table('tokos')->selectRaw('engine_db, count(*) as total')
                ->groupBy('engine_db')->pluck('total', 'engine_db')->all();
            $keys = $c->table('api_keys')->whereNull('revoked_at')->count();
            $recent = $c->table('tokos')->select('nama_toko', 'engine_db', 'status', 'created_at')
                ->orderByDesc('created_at')->limit(5)->get();

            return [
                'ok' => true,
                'total' => array_sum($status),
                'status' => $status,
                'engine' => $engine,
                'keys' => $keys,
                'recent' => $recent,
            ];
        } catch (\Throwable $e) {
            report($e);

            return ['ok' => false, 'total' => 0, 'status' => [], 'engine' => [], 'keys' => 0, 'recent' => collect()];
        }
    }

    /**
     * Permintaan navigasi dari admin.js (header X-Partial) hanya menerima isi halaman;
     * kunjungan langsung / refresh menerima halaman penuh.
     */
    private function render(Request $request, string $view, array $data)
    {
        $content = view($view, $data)->render();

        $response = $request->hasHeader('X-Partial')
            ? response($content)
            : response(view('admin.layout', ['content' => $content, 'title' => $data['title']])->render());

        return $response->header('Vary', 'X-Partial');
    }
}
