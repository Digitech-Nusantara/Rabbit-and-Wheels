<?php

use App\Models\Product;
use App\Models\Subcategory;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
  
Route::get('/about', function () {
	return view('about-us-page', ['title' => 'About Us - Syrious']);
});

Route::get('/cart', [CartController::class, 'showCart']);
Route::post('/cart/add', [CartController::class, 'addToCart']);
Route::post('/cart/remove', [CartController::class, 'removeFromCart']);

Route::get('/{category?}', ProductController::class);
Route::get('/{category?}/{productSlug?}', ProductController::class);