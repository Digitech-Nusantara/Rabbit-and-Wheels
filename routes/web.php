<?php

use App\Http\Controllers\AuthController;
use App\Models\Product;
use App\Models\Subcategory;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
  
Route::get('/about', function () {
	return view('about-us-page', ['title' => 'About Us - Syrious']);
});

Route::get('/cart', [CartController::class, 'showCart']);
Route::post('/cart/add', [CartController::class, 'addToCart']);
Route::post('/cart/remove', [CartController::class, 'removeFromCart']);

// Rute untuk halaman login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rute untuk halaman registrasi
Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rute untuk admin dashboard (dengan middleware role:admin)
Route::middleware(['auth', 'role:admin'])->get('/dashboard', function () {
    return view('halaman_auth/dashboard'); 
})->name('dashboard');

// Rute untuk user landing page (dengan middleware role:user)
Route::middleware(['auth', 'role:user'])->get('/landing', function () {
    return view('halaman_auth/landing'); 
})->name('landing');

// Rute untuk resource categories (hanya dapat diakses jika terautentikasi)
Route::middleware('auth')->resource('categories', CategoryController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::resource('products', ProductController::class);




Route::get('/{category?}', ProductController::class);
Route::get('/{category?}/{productSlug?}', ProductController::class);
