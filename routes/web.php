<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('landing.page');

Route::prefix('products')->group(function() {
    Route::get('/browse', [ProductController::class, 'listProduct'])->name('products.list');
    Route::get('/detail/{code}', [ProductController::class, 'detailProduct'])->name('products.detail');
    Route::get('/payment/{code}', [ProductController::class, 'paymentProduct'])->name('products.payment');
});

Route::prefix('auth')->group(function() {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('auth.login.page');
    Route::get('/register', [AuthController::class, 'registerPage'])->name('auth.register.page');
});