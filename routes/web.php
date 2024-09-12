<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileCompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route guests start
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
// Route guests end


// Route admin start
Route::prefix('super-admin')->group(function() {
    Route::middleware(['auth', 'isForbidden:super-admin'])->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin');

        // data master
        Route::resource('/categories', CategoryController::class);
        Route::resource('/profile-companies', ProfileCompanyController::class);
        Route::resource('/faqs', FaqController::class);
        Route::resource('/users', UserController::class);

        // produk
        Route::resource('/e-books', EbookController::class);

        // export
        Route::prefix('export')->group(function() {
            Route::get('/categories', [CategoryController::class, 'export'])->name('categories.export');
            Route::get('/profile-companies', [ProfileCompanyController::class, 'export'])->name('profile-companies.export');
            Route::get('/faqs', [FaqController::class, 'export'])->name('faqs.export');
            Route::get('/users', [UserController::class, 'export'])->name('users.export');
        });

        // import
        Route::prefix('import')->group(function() {
            Route::post('/categories', [CategoryController::class, 'import'])->name('categories.import');
            Route::post('/faqs', [FaqController::class, 'import'])->name('faqs.import');
            Route::post('/users', [UserController::class, 'import'])->name('users.import');
        });

        // template import
        Route::prefix('template')->group(function() {
            Route::get('/categories', [CategoryController::class, 'templateDownload'])->name('categories.template');
            Route::get('/faqs', [FaqController::class, 'templateDownload'])->name('faqs.template');
            Route::get('/users', [UserController::class, 'templateDownload'])->name('users.template');
        });
    });
});
// Route admin end


// Route user start
Route::prefix('user')->group(function() {
    Route::middleware(['auth', 'isForbidden:user'])->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'dashboardUser'])->name('dashboard.user');
    });
});
// Route user end