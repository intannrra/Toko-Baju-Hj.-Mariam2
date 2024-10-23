<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

// Route untuk halaman home
Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);

Route::resource('transactions', \App\Http\Controllers\TransactionController::class);
