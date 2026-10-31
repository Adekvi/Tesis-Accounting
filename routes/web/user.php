<?php

use App\Http\Controllers\User\Beranda\BerandaController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('user.')->group(function () {

    Route::redirect('/', '/user/dashboard');
    Route::get('/dashboard', [BerandaController::class, 'index'])->name('dashboard');

    Route::prefix('gudang')->name('gudang.')->group(function () {
        Route::view('/identifikasi', 'user.pages.placeholder', ['title' => 'Identifikasi Barang'])->name('identifikasi');
        Route::view('/kartu-stok', 'user.pages.placeholder', ['title' => 'Kartu Stok'])->name('kartu-stok');
        Route::view('/order-pengadaan', 'user.pages.placeholder', ['title' => 'Order Pengadaan'])->name('order-pengadaan');
        Route::view('/penerimaan', 'user.pages.placeholder', ['title' => 'Penerimaan'])->name('penerimaan');
        Route::view('/retur', 'user.pages.placeholder', ['title' => 'Retur Pembelian'])->name('retur');
    });

    Route::prefix('pengadaan')->name('pengadaan.')->group(function () {
        Route::view('/susun-order', 'user.pages.placeholder', ['title' => 'Susun Order'])->name('susun-order');
        Route::view('/order', 'user.pages.placeholder', ['title' => 'Terbit Order'])->name('order');
        Route::view('/pembelian', 'user.pages.placeholder', ['title' => 'Pembelian'])->name('pembelian');
        Route::view('/retur', 'user.pages.placeholder', ['title' => 'Proses Retur'])->name('retur');
    });

    Route::prefix('penjualan')->name('penjualan.')->group(function () {
        Route::view('/order', 'user.pages.placeholder', ['title' => 'Order Pelanggan'])->name('order');
        Route::view('/transaksi', 'user.pages.placeholder', ['title' => 'Jual'])->name('transaksi');
        Route::view('/retur', 'user.pages.placeholder', ['title' => 'Retur Penjualan'])->name('retur');
    });

    Route::prefix('keuangan')->name('keuangan.')->group(function () {
        Route::view('/coa', 'user.pages.coa', ['title' => 'Chart of Accounts'])->name('coa');
        Route::view('/saldo-awal', 'user.pages.placeholder', ['title' => 'Saldo Awal'])->name('saldo-awal');
        Route::view('/jurnal', 'user.pages.placeholder', ['title' => 'Jurnal'])->name('jurnal');
        Route::view('/buku-besar', 'user.pages.placeholder', ['title' => 'Buku Besar'])->name('buku-besar');
        Route::view('/neraca', 'user.pages.placeholder', ['title' => 'Neraca'])->name('neraca');
        Route::view('/tutup-buku', 'user.pages.placeholder', ['title' => 'Tutup Buku'])->name('tutup-buku');
    });
});
