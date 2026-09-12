<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPostController;

// ======================
// PUBLIC SITE
// ======================

// Landing page
Route::get('/', [HomeController::class, 'index'])->name('home');

// About page (include dari home/about.blade.php)
Route::get('/about', function () {
    return view('home.about');
})->name('about');

// ======================
// ADMIN
// ======================
Route::get('/admin', [AdminPostController::class, 'index'])->name('admin.home');
Route::resource('/admin/posts', AdminPostController::class)->only(['store', 'update', 'destroy']);
