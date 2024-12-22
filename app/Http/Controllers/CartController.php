<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
	public function showCart() {
		$cart = session()->get('cart');

		return view('cart-page', compact('cart'));
	}

	public function addToCart(Request $request) {
		$product = Product::findOrFail($request->id);
		$cart = session()->get('cart', []);

		if (isset($cart[$request->id])) {
			$cart[$request->id]['quantity']++;
		} else {
			$cart[$request->id] = [
				"id" => $request->input('id'),
				"name" => $request->input('name'),
				"quantity" => 1,
				"photo" => $request->input('photo'),
				"price" => $request->input('price'),
				"subtotal" => 0
			];
		}

		session()->put('cart', $cart);

		$total = 0;
		foreach($cart as $item) {
			$total += $item['price'] * $item['quantity'];
		}
		session()->put('total', $total);

		session()->flash('success', 'Product was added successfully!');
		return redirect()->back();
	}

	public function removeFromCart(Request $request) {
		$cart = session()->get('cart', []);
		if (isset($cart[$request->input('id')])) {
			$total = session()->get('total', 0);
			$total -= $cart[$request->input('id')]['price'] * $cart[$request->input('id')]['quantity'];
			unset($cart[$request->input('id')]);
			session()->put('cart', $cart);
		}

		session()->flash('success', 'Product was removed successfully!');
		return redirect()->back();
	}
}
