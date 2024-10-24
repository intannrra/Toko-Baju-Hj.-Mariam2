<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CheckoutController;

// Route untuk halaman home
Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);

// Route untuk resource products
Route::resource('products', \App\Http\Controllers\ProductController::class);

Route::resource('pesanans', \App\Http\Controllers\PesananController::class);

Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::post('/pesanan/add', [PesananController::class, 'addToPesanan'])->name('pesanan.add');
Route::delete('/pesanan/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');
Route::post('/pesanan/checkout', [PesananController::class, 'checkout'])->name('pesanan.checkout');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/form', function () {
    return view('trans.index'); // Atur file Blade yang benar untuk halaman checkout
})->name('checkout.form');

Route::resource('transactions', TransactionController::class);

