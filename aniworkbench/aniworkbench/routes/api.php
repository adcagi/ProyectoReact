<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\CheckoutController;

Route::get('/products', function () {
    return Product::all();
});

Route::get('/products/{id}', function ($id) {
    return Product::findOrFail($id);
});
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/products', function () {
    return \App\Models\Product::all();
});

Route::post('/orders', [CheckoutController::class, 'apiStore']);
Route::get('/orders', [CheckoutController::class, 'index']);
Route::get('/orders/{id}', [CheckoutController::class, 'show']);