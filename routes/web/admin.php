<?php

use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Toko\StoreApprovalController;
use App\Http\Controllers\Admin\Toko\TokoController;
use App\Http\Middleware\Admin\RoleGate;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('landing');

Route::prefix('admin')->middleware(RoleGate::class)->name('admin.')->group(function () {

    Route::redirect('/', '/admin/dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('toko')->name('toko.')->group(function () {
        Route::get('/', [TokoController::class, 'index'])->name('index');
        Route::get('/persetujuan', [StoreApprovalController::class, 'index'])->name('persetujuan');
        Route::post('/{id}/setujui', [StoreApprovalController::class, 'approve'])
            ->whereUuid('id')->name('setujui');
    });
});
