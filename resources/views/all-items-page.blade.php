<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

        <!-- tailwind -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- tailwind -->
        
        <!-- navbarCss -->
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <!-- navbarCss -->
        
        <!-- globalCss -->
        <link rel="stylesheet" href="{{ asset('css/global.css') }}">
        <!-- globalCss -->

    <!-- boxicons link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- boxicons link -->
</head>
<body>
    <!-- navbar -->
    <x-navbar></x-navbar>    
    <!-- navbar -->

<!-- product list -->
    <div class="">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
			<h2 class="text-2xl font-bold">All Items</h2>
			<div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
				@foreach ($products as $product)
					<a href="#" class="group">
					<img src="{{ $product['photo'] }}" alt="{{ $product['name'] }}" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8]">
					<h3 class="mt-4 text-sm text-gray-700">{{ $product['name'] }}</h3>
					<p class="mt-1 text-lg font-medium text-gray-900">${{ $product['price'] }}</p>
					</a>
				@endforeach
			</div>
        </div>
    </div>
<!-- product list -->

    <!-- footer -->
    <x-footer></x-footer>
    <!-- footer -->
</body>
</html>
