<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products/list', [ProductController::class, 'listProduct'])->name('products.list');
Route::get('/products/detail', [ProductController::class, 'detailProduct'])->name('products.detail');
Route::get('/products/payment', [ProductController::class, 'paymentProduct'])->name('products.payment');

Route::prefix('auth')->group(function() {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('auth.page');
    Route::get('/register', [AuthController::class, 'registerPage'])->name('auth.register');
});