<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Admin\Concern\RendersAdminPage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    use RendersAdminPage;

    public function index(Request $request)
    {
        $stats = Cache::get('admin.stats');

        if (! $stats) {
            $stats = $this->loadStats();
            if ($stats['ok']) {
                Cache::put('admin.stats', $stats, 60);
            }
        }

        // Full page dengan component
        if (! $request->hasHeader('X-Partial')) {
            return view('admin.dashboard.index', [   // view baru yang memakai <x-admin.layout.app>
                'title' => 'Dashboard',
                'stats' => $stats,
            ]);
        }

        // Partial saja
        return view('admin.dashboard.partial', [
            'stats' => $stats,
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
}
