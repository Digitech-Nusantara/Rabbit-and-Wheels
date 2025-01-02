<x-layout>

	<x-slot:title>{{ $title }}</x-slot:title>
    <!-- main-content-start -->
    <main class="flex flex-col size-full">
        <div class="text-center">
            <h1>{{ $title }}</h1>
        </div>
    <div class="container mx-auto">
        <div class="wrapper">
		@foreach ($products as $product)
			<a href="/{{ Str::lower($product['category_name']) }}/{{ $product['slug'] }}" >
				<img src="{{ $product['photo'] }}" alt="{{ $product['name'] }}" class="cover-object w-200" />
			</a>
		@endforeach
        </div>
    </div>

    <div class="trending text-center mx-auto">
        <h1>Newest</h1>
		<a href="/{{ Str::lower($newest['category_name']) }}/{{ $newest['slug'] }}">
			<img src="{{ $newest['photo'] }}" alt="trendingFoto" width="500">
		</a>
    </div>

	<div class="flex flex-col mx-auto">
        <div class="card-container mx-auto grid grid-cols-4 max-w-screen-md size-full">
			@foreach ($products as $product)
            <div class="card grow-0">
                <img src="{{ $product['photo'] }}" alt="{{ $product['name'] }}" width="200" class="mx-auto">
                <h2 class="h-12">{{ $product['name'] }}</h2>
                <p class="truncate">{{ Str::limit($product['description'], 50) }}</p>
                <a href="/{{ Str::lower($product['category_name']) }}/{{ $product['slug'] }}">
                    <button class="button">See Detail</button>
                </a>
            </div>
			@endforeach
			
        </div>
		<div>
			{{ $products->links() }}
		</div>
	</div>
    
    </main>
    <!-- main-content-end -->
    
</x-layout>
