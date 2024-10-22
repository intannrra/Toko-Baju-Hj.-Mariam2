<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route untuk halaman home
Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);

// Route untuk resource products
Route::resource('products', ProductController::class);
