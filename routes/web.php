<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page', ['title' => 'Home - Syrious']);
});

Route::get('/clothes', function () {
	$products = Product::latest()->get();
    return view('clothes-page', ['title' => 'Clothes - Syrious', 'products' => $products]);
});

Route::get('/shoes', function () {
	$products = Product::latest()->get();
    return view('shoes-page', ['title' => 'Shoes - Syrious', 'products' => $products]);
});

Route::get('/accessories', function () {
	$products = Product::latest()->get();
    return view('accesoris-page', ['title' => 'Acccessories - Syrious', 'products' => $products]);
});

Route::get('/all-items', function () {
	$products = Product::latest()->get();
    return view('all-items-page', ['title' => 'All Item', 'products' => $products]);
});
