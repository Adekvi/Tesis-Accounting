<?php

namespace App\Http\Controllers\Admin\Toko;

use App\Http\Controllers\Admin\Concern\RendersAdminPage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TokoController extends Controller
{
    use RendersAdminPage;

    public function index(Request $request)
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

        return $this->render($request, 'admin.pages.toko.index', [
            'title' => 'Daftar toko',
            'tokos' => $tokos,
            'ok' => $ok,
        ]);
    }
}
