<?php

use Illuminate\Support\Facades\Route;

// Admin Routes

// Admin Login
Route::middleware('guest')->get('/admin/login', function () {
    return view('admin.index');
});

// Serve React Admin SPA
Route::middleware(['auth', 'verified', 'IsAdmin'])->get('/admin/{any?}', function () {
    return view('admin.index');
})->where('any', '.*');