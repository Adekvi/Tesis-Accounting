<?php

namespace App\Http\Controllers\Admin\Toko;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

class StoreApprovalController extends Controller
{
    public function index()
    {
        $pending = [
            [
                'id' => 1,
                'toko' => 'Apotek Waras Jaya',
                'pemilik' => 'Andi Wijaya',
                'kota' => 'Rembang',
                'db' => 'MySQL',
            ],
        ];

        return view('admin.toko.persetujuan', compact('pending'));
    }

    public function approve(int $id)
    {
        // TODO:
        // proses approval
        // update status toko
        // generate API key
        // provision database
        // initialize tenant
        // initialize COA
        // activity log

        return back()->with(
            'success',
            'Toko berhasil disetujui.'
        );
    }
}
