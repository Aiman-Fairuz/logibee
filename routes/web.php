<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;

// ====================
// AUTH ROUTES
// ====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ====================
// PROTECTED ROUTES (HARUS LOGIN)
// ====================
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Users Management
    Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');   // list user
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // form tambah
    Route::post('/users', [UserController::class, 'store'])->name('users.store');  // simpan tambah

    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');  // form edit
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');   // simpan edit

    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // hapus
});


    // Transaksi
   Route::middleware('auth')->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
});

    // Laporan
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

    Route::middleware('auth')->group(function () {
    // Product
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});
});
