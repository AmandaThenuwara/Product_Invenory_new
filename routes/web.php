<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/product', [ProductController::class, 'index'])->name('products.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/product', [ProductController::class, 'store'])->name('products.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/supplier', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('suppliers.store');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

Route::middleware('auth')->group(function () {

    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
