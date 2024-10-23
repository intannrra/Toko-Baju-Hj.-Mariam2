<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
// Route untuk halaman home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('pesanans', \App\Http\Controllers\PesananController::class);
