<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
    Route::middleware('guest')->group(function() {
        Route::get('/login', [AuthController::class, 'loginPage'])->name('auth.login.page');
        Route::post('/login', [AuthController::class, 'loginCheck'])->name('auth.login.check');
        Route::get('/register', [AuthController::class, 'registerPage'])->name('auth.register.page');
        Route::post('/register', [AuthController::class, 'registerCheck'])->name('auth.register.check');
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
});

Route::prefix('super-admin')->group(function() {
    Route::middleware(['auth', 'isForbidden:super-admin'])->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin');
    });
});

Route::prefix('user')->group(function() {
    Route::middleware(['auth', 'isForbidden:user'])->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'dashboardUser'])->name('dashboard.user');
    });
});

