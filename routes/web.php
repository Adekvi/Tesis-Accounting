<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

// Route::get('/view', fn() => view('user.view'))->name('view');

require __DIR__ . '/web/auth.php';
require __DIR__ . '/web/user.php';
require __DIR__ . '/web/admin.php';
