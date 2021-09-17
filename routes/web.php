<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StoreFront\CartController;
use App\Http\Controllers\StoreFront\DashboardController;
use App\Http\Controllers\StoreFront\HomeController;
use App\Http\Controllers\StoreFront\PlantProductController;

// Client Routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

// Processing Payments RND
Route::get('/payments', [PaymentController::class, 'index']);

// Home
Route::get('/', [HomeController::class, 'index']);

// List Categories Products
Route::get('/plants/{category_slug?}', [PlantProductController::class, 'index'])->name('plantsProducts');

// Single Product Detail
Route::get('/plants/{category_slug}/{product_slug}', [PlantProductController::class, 'productDetail'])->name('plantsProductDetail');


// Add Product to cart
Route::get('/products/add-to-cart/{id}', [CartController::class, 'addProductToCart']);

Route::get('/cart', [CartController::class, 'index'])->name('cart');








