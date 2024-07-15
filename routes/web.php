<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;

Route::get('/', function () {
    return view('home');
});

Route::resource('products', ProductController::class);
Route::resource('brands', BrandController::class);
Route::resource('categories', CategoryController::class);
Route::get('stock/update', [StockController::class, 'index'])->name('stock.update');
Route::post('stock/update', [StockController::class, 'update'])->name('stock.update');
