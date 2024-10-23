<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
// Route untuk halaman home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/pesanans/create', [PesananController::class, 'create'])->name('pesanans.create');

// Route untuk resource products
Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::resource('pesanans', \App\Http\Controllers\PesananController::class);
