<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route untuk halaman home
Route::get('/', [HomeController::class, 'index'])->name('home');

