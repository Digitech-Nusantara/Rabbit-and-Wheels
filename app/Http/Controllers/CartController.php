<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
	public function showCart() {
		$cart = session()->get('cart');

		return view('cart-page', compact('cart'), ['title' => 'Cart - Syrious']);
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

	public function checkout (Request $request) {
		$cart = session()->get('cart', []);
		//dd($cart);
		if (!empty($request)) {
			Transaction::insert([
				'total_price' => $request->input('total_price'),
				'total_payment' => $request->input('total_payment'),
				'payment_method' => $request->input('payment_method'),
				'admin_id' => 1,
				'customer_id' => 1
			]);
			$transaction = Transaction::select('id')->latest()->first();
			foreach ($cart as $product) {
				TransactionDetail::insert([
					'transaction_id' => $transaction->id,
					'product_id' => $product['id'],
					'price' => $product['price'],
					'qty' => $product['quantity'],
					'subtotal_price' => $product['subtotal']
				]);
			}
			session()->forget('cart');
		}

		session()->flash('success', 'Trancsactions was recorded successfully!');
		return redirect('/');
	}
}
