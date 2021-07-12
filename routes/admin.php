<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

// Admin Routes

Route::group(['prefix' => 'admin', 'middleware' => 'admin:admin'], function () {
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'store']);
});

Route::middleware(['auth:sanctum,admin', 'onlyadmin', 'verified'])->post('/admin/logout', [AdminController::class, 'destroy']);

// Serve React Admin SPA
Route::middleware(['auth:sanctum,admin', 'onlyadmin', 'verified'])->get('/admin/{any?}', function () {
    return view('admin.index');
})->where('any', '.*')->name('admin.dashboard');


