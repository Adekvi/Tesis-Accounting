<?php

namespace App\Http\Controllers\Admin\Toko;

use App\Http\Controllers\Admin\Concern\RendersAdminPage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreApprovalController extends Controller
{
    use RendersAdminPage;

    public function index(Request $request)
    {
        $pending = DB::connection('central')->table('tokos')
            ->where('status', 'pending')
            ->select('id', 'nama_toko', 'engine_db', 'nama_database', 'created_at')
            ->orderBy('created_at')
            ->get();

        return $this->render($request, 'admin.pages.toko.persetujuan', [
            'title' => 'Persetujuan toko',
            'pending' => $pending,
        ]);
    }

    public function approve(string $id)
    {
        $central = DB::connection('central');
        $toko = $central->table('tokos')->where('id', $id)->first();

        abort_if($toko === null, 404, 'Toko tidak ditemukan.');
        abort_if($toko->status !== 'pending', 409, 'Toko ini sudah diproses.');

        if (Artisan::call('tenant:provision', ['toko_id' => $id]) !== 0) {
            return back()->with('error', trim(Artisan::output()) ?: 'Provisioning gagal.');
        }

        $plain = Str::random(48);
        $central->table('api_keys')->insert([
            'toko_id' => $id,
            'key_hash' => hash('sha256', $plain),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Cache::forget('admin.stats');

        return back()
            ->with('success', "Toko {$toko->nama_toko} disetujui dan database siap.")
            ->with('api_key', $plain);
    }
}
