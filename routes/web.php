<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/products', [ProductController::class, 'products']);
Route::get('/create', [ProductController::class, 'create'])->name('create');
Route::post('/store', [ProductController::class, 'store'])->name('store');
Route::patch('/products/{id}/update-price', [ProductController::class, 'updatePrice'])->name('updatePrice');
Route::get('/sell', [ProductController::class, 'sellForm']);
Route::post('/sell/{id}/sell', [ProductController::class, 'sell'])->name('sell');
Route::get('/transactions', [TransactionController::class, 'index']);

