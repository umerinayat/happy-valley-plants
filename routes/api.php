<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PlanterStyleController;
use App\Http\Controllers\Admin\PlanterSizeController;
use App\Http\Controllers\Admin\PlanterColorController;
use App\Http\Controllers\Admin\PlantProductController;


// Admin Protected API Routes

Route::middleware(['auth:sanctum,admin', 'onlyadmin', 'verified'])->group(function () {

    // API Resources
    // -------------------------------------------------

    // Category
    Route::apiResource('categories', CategoryController::class);
    // PlanterStyle
    Route::apiResource('planter-styles', PlanterStyleController::class);
    // PlanterSize
    Route::apiResource('planter-sizes', PlanterSizeController::class);
    // PlanterColor
    Route::apiResource('planter-colors', PlanterColorController::class);
    // PlantProduct
    Route::apiResource('plant-products', PlantProductController::class);
    // Customsers/Users
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers/orders', [CustomerController::class, 'orders']);
    
});






