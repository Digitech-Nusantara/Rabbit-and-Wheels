<?php

use App\Models\Product;
use App\Models\Subcategory;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('clothes-page');
  
Route::get('/about', function () {
	return view('about-us-page', ['title' => 'About Us - Syrious']);
});

Route::get('/{category?}', ProductController::class);
Route::get('/{category?}/{productSlug?}', ProductController::class);
