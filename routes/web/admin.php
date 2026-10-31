<?php

use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Toko\StoreApprovalController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

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
});
