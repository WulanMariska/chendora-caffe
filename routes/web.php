<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;

// 🏠 Redirect halaman awal ke login
Route::get('/', function () {
    return redirect('/login');
});

// 🔐 Auth bawaan Laravel
Auth::routes();

// 🔒 Semua route di bawah ini hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {

    // ✅ Setelah login langsung ke halaman Produk
    Route::get('/home', function () {
        return redirect()->route('product.index');
    })->name('home');

    // 🍨 CRUD Produk (halaman utama setelah login)
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    // 🍰 CRUD Resep (lengkap & aman)
    Route::get('/resep', [ResepController::class, 'index'])->name('resep');
    Route::get('/resep/create', [ResepController::class, 'create'])->name('resep.create');
    Route::post('/resep/store', [ResepController::class, 'store'])->name('resep.store');
    Route::get('/resep/{id}/edit', [ResepController::class, 'edit'])->name('resep.edit');
    Route::put('/resep/{id}', [ResepController::class, 'update'])->name('resep.update');
    Route::delete('/resep/{id}', [ResepController::class, 'destroy'])->name('resep.destroy');

    // 🍮 Halaman tambahan (About)
    Route::get('/about', [AboutController::class, 'index'])->name('about');

    // 👑 CRUD Admin & Users (hanya untuk admin)
    Route::middleware(['is_admin'])->group(function () {
        Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');
        Route::get('/admin/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
        Route::put('/admin/users/{id}', [AdminController::class, 'update'])->name('admin.users.update');
        Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    });
});
