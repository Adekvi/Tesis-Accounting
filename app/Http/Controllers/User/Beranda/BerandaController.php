<?php

namespace App\Http\Controllers\User\Beranda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->hasHeader('X-Partial')) {
            return response()
                ->view('user.dashboard.content')
                ->header('Vary', 'X-Partial');
        }

        return view('user.view', [
            'title' => 'Dashboard'
        ]);
    }
}
