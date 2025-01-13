<x-layout>   

	<x-slot:title>{{ $title }}</x-slot:title>
    {{-- side-filter --}}
    <x-side-filter :categories="$categories"/>
    {{-- side-filter --}}

    <!-- product list -->
        <div class="ml-24">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
				<h2 class="text-2xl font-bold">{{ $title }}</h2>
				<div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
					@foreach ($products as $product)
						<a href="/accessories/{{ $product['slug'] }}" class="group">
						<img src="{{ $product['photo'] }}" alt="{{ $product['name'] }}" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8]">
						<h3 class="mt-4 text-sm text-gray-700">{{ $product['name'] }}</h3>
						<p class="mt-1 text-lg font-medium text-gray-900">${{ $product['price'] }}</p>
						</a>
					@endforeach
				</div>
				<div class="my-5">
					{{ $products->links() }}
				</div>
            </div>
        </div>
    <!-- product list -->
		    
</x-layout>
