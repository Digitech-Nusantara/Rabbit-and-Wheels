{{-- header --}}
<x-header></x-header>
{{-- header --}}
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
  {{-- navbar --}}
  <x-navbar></x-navbar>
  {{-- navbar --}}
  

  <!-- Main Content -->
  <main class="max-w-6xl mx-auto mt-6 px-4">
    <!-- Cart Items -->
    <div class="bg-white rounded-lg shadow-lg p-6">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center border-b pb-4 mb-4">
        <img src="https://via.placeholder.com/150" alt="Product Image" class="w-full md:w-24 rounded">
        <div>
          <h2 class="text-lg font-semibold text-gray-800">Product Name</h2>
          <p class="text-sm text-gray-600">Short product description</p>
        </div>
        <div>
          <label for="quantity" class="block text-sm text-gray-600">Quantity</label>
          <input type="number" id="quantity" value="1" class="border rounded px-2 py-1 w-16 mt-1">
        </div>
        <div class="flex justify-between items-center md:block">
          <p class="text-lg font-bold text-gray-800">$25.00</p>
          <button class="text-red-500 hover:text-red-700 text-sm mt-2 md:mt-0">Remove</button>
        </div>
      </div>
    </div>

    <!-- Summary Section -->
    <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
      <div class="flex justify-between items-center">
        <p class="text-lg font-semibold text-gray-800">Total</p>
        <p class="text-lg font-bold text-gray-800">$25.00</p>
      </div>
      <button class="mt-4 w-full bg-slate-700 text-white py-2 rounded hover:bg-slate-900">Checkout</button>
    </div>
  </main>

  {{-- footer --}}
  <x-footer></x-footer>
  {{-- footer --}}
</body>
</html>
