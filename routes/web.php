<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

// Rute untuk home
Route::get('/', [HomeController::class, 'index'])->name('homes.home');

// Rute untuk register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register']);

// Rute untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.submit');

// Rute untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk order
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/add-to-cart', [OrderController::class, 'addToCart'])->name('cart.add');
Route::post('/orders/add-to-cart', [OrderController::class, 'addToCart'])->name('orders.addToCart');

// Rute untuk menambahkan produk ke keranjang
Route::post('/cart/add', [OrderController::class, 'addToCart'])->name('cart.add');
// Rute untuk memperbarui jumlah produk dalam keranjang
Route::post('/cart/update', [OrderController::class, 'updateCart'])->name('cart.update');

// Rute untuk menghapus produk dari keranjang
Route::delete('/cart/remove/{productId}', [OrderController::class, 'removeFromCart'])->name('cart.remove');