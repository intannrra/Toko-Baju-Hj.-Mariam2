<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route untuk halaman home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk resource products
Route::resource('products', \App\Http\Controllers\ProductController::class);
