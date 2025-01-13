<x-layout> 

  <x-slot:title>{{ $title }}</x-slot:title>
  <!-- Main Content -->
  <main class="max-w-6xl mx-auto mt-6 px-4">
    <!-- Cart Items -->
	@if(session('cart') === null)
		<h1>Your cart was empty!</h1>
	@else
	@foreach(session('cart') as $id  => $details)
    <div class="bg-white rounded-lg shadow-lg p-6">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center border-b pb-4 mb-4">
        <img src="{{ $details['photo'] }}" alt="Product Image" class="w-full md:w-24 rounded">
        <div>
          <h2 class="text-lg font-semibold text-gray-800">{{ $details['name'] }}</h2>
          <p class="text-sm text-gray-600">Short product description</p>
        </div>
        <div>
          <label for="quantity" class="block text-sm text-gray-600">Quantity</label>
          <input type="number" id="quantity" value="{{ $details['quantity'] }}" class="border rounded px-2 py-1 w-16 mt-1">
        </div>
        <div class="flex justify-between items-center md:block">
          <p class="text-lg font-bold text-gray-800">${{ $details['price'] }}</p>
		  <form action="/cart/remove" method="post">
		  @csrf
			<input type="hidden" name="id" value="{{ $id }}">
          	<button type="submit" class="text-red-500 hover:text-red-700 text-sm mt-2 md:mt-0">Remove</button>
		  </form>
        </div>
      </div>
    </div>
	<form action="/cart/checkout" method="POST">
	@csrf
		<input type="hidden" name="product_id" value="{{ $id }}">
		<input type="hidden" name="qty" value="{{ $details['quantity'] }}">
		<input type="hidden" name="price" value="{{ $details['price'] }}">
		<input type="hidden" name="subtotal" value"{{ $details['subtotal'] }}">
	@endforeach
    <div class="bg-white rounded-lg shadow-lg p-6 mt-6 flex justify-between items-center">
		<a href="/generate-pdf" target="_blank" class="mt-4 w-full bg-slate-700 text-white py-2 rounded hover:bg-slate-900 text-center">Cetak PDF</a>
	</div>
	@endif
	
    <!-- Summary Section -->
    <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
      <div class="flex justify-between items-center">
        <p class="text-lg font-semibold text-gray-800">Total</p>
        <p class="text-lg font-bold text-gray-800">${{ session('total') }}</p>
      </div>
		<input type="hidden" name="total_price" value="{{ session('total') }}">
		<input type="hidden" name="total_payment" value="{{ session('total') }}">
		<input type="hidden" name="payment_method" value="cash">
		<button type="submit" class="mt-4 w-full bg-slate-700 text-white py-2 rounded hover:bg-slate-900">Checkout</button>
	  </form>
    </div>
  </main>

</x-layout>
