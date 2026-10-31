<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Toko\StoreApprovalController;
use App\Http\Middleware\Admin\RoleGate;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(RoleGate::class)->name('admin.')->group(function () {

    Route::get('/dashboard', [
        DashboardController::class,
        'index'
    ])->name('dashboard');

    Route::prefix('toko')
        ->name('toko.')
        ->group(function () {

            Route::get('/persetujuan', [
                StoreApprovalController::class,
                'index'
            ])->name('persetujuan');

            Route::post('/{id}/setujui', [
                StoreApprovalController::class,
                'approve'
            ])->name('setujui');
        });

    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/toko', [AdminController::class, 'toko'])->name('toko');
});
