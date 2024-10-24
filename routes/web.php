<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Rute untuk home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register'); // Menampilkan form register
Route::post('/register', [AuthController::class, 'register']); // Mengelola pendaftaran

// Rute untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login'); // Menampilkan form login
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.submit'); // Mengelola login

// Rute untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Mengelola logout
