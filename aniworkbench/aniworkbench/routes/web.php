<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;

Route::middleware('auth')->group(function () {
    Route::post('/checkout', [OrderController::class, 'store']);
});

Route::get('/checkout', [CheckoutController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/orders', [OrderController::class, 'index'])->middleware('auth');

Route::post('/cart/add/{id}', [CartController::class, 'add']);
Route::get('/orders/{order}', [OrderController::class, 'show'])->middleware('auth');

Route::get('/checkout', [OrderController::class, 'checkout'])->middleware('auth');
Route::post('/checkout', [OrderController::class, 'store'])->middleware('auth');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/add/{id}', [CartController::class, 'add']);
Route::get('/cart/remove/{id}', [CartController::class, 'remove']);
Route::get('/cart/clear', [CartController::class, 'clear']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
