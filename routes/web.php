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

Route::get('/sesi', [AuthController::class, 'index'])->name('auth');
Route::post('/sesi', [AuthController::class, 'login']);
Route::get('/reg', [AuthController::class, 'create'])->name('register');
Route::post('/reg', [AuthController::class, 'register']);
Route::middleware('auth')->get('/dashboard', function () {
    return view('halaman_auth/dashboard'); 
})->name('dashboard');



Route::get('/{category?}', ProductController::class);
Route::get('/{category?}/{productSlug?}', ProductController::class);
