<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $products[0]['name'] }} - Syrious </title>
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
     
    <!-- product view -->
     <div class="container grid grid-cols-2 gap-6">
        <!-- product image -->
         <div>
            <img src="{{ $products[0]['photo'] }}" alt="Gambar Baju" class="w-full">
            <div class="grid grid-cols-5 gap-4 mt-4 ml-10">
				@foreach ($products as $product)
					<img src="{{ $product['photo'] }}" alt="Gambar Baju" class="w-full cursor-pointer border border-black">
				@endforeach
            </div>
         </div>
         <!-- product image end -->


         <!-- product content -->
         <div>
            <h2 class="text-3xl font-medium uppercase mb-2">{{ $product['name'] }}</h2>
            <div class="flex items-center mb-4">
            <div class="flex gap-1 text-sm text-yellow-400">
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
            </div>
            <div class="text-xs text-gray-500 ml-3">(200 Reviews)</div>
         </div> 
         <div class="space-y-2">
            <p class="text-gray-800 font-semibold space-x-2">
                <span>Availability:</span>
                <span class="text-green-600">In Stock</span>
            </p>
            <p class="space-x-2">
                <span class="text-gray-800 font-semibold">Brand :</span>
                <span class="text-gray-600">H&M</span>
            </p>
            <p class="space-x-2">
                <span class="text-gray-800 font-semibold">Category :</span>
                <span class="text-gray-600">{{ $subcategory['name'] }}</span>
            </p>
            <p class="space-x-2">
                <span class="text-gray-800 font-semibold">SKU :</span> <!-- sku itu kode produk contoh sku : BT, bt itu basic tee -->
                <span class="text-gray-600">{{ $product['id'] }}</span>
            </p>
         </div>
         <div class="flex items-baseline mb-1 space-x-2 font-sans">
            <p class="text-xl text-red-600 font-semibold">${{ $product['price'] }}</p>
            <!-- <p class="text-base text-gray-400 line-through">Rp.200.000</p> -->
         </div>
         <p class="mt-4 text-gray-600">
			{{ $product['description'] }}
         </p>

         <!-- size filter -->
         <div class="pt-4">
            <h3 class="text-x1 text-gray-800 mb-3 uppercase font-medium">Size</h3>
            <div class="flex items-center gap-2">
                <!-- single size -->
                <div class="size-selector">
                    <input type="radio" name="size" class="hidden" id="size-xs">
                    <label for="size-xs" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex otems-center justify-center cursor-pointer shadow-sm text-gray-600">
                        XS
                    </label>
                </div>
                <!-- single size end -->
                <!-- single size -->
                <div class="size-selector">
                    <input type="radio" name="size" class="hidden" id="size-s">
                    <label for="size-s"
                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex item-center justify-center cursor-pointer shadow-sm text-gray-600">
                        S
                    </label>
                </div>
                <!-- single size end -->
                <!-- single size -->
                
                    <div class="size-selector">
                        <input type="radio" name="size" class="hidden" id="size-m" checked>
                        <label for="size-m"
                            class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            M
                        </label>
                    </div>
                    <!-- single size end -->
                    <!-- single size -->
                    <div class="size-selector">
                        <input type="radio" name="size" class="hidden" id="size-l">
                        <label for="size-l"
                            class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            L
                        </label>
                    </div>
                    <!-- single size end -->
                    <!-- single size -->
                    <div class="size-selector">
                        <input type="radio" name="size" class="hidden" id="size-xl">
                        <label for="size-xl"
                            class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            XL
                        </label>
                    </div>

            <!-- single size end -->
         </div>
        </div>
        
        <!-- size filter end -->


         <!-- color filter -->
         <div class="pt-4">
                <h3 class="text-x1 text-gray-800 mb-3 ippercase font-medium">Color</h3>
                <div class="felx items-center gap-2">
                    <!-- single color -->
					@foreach ($products as $product)
                    <div class="color-selector">
                        <input type="radio" name="color" class="hidden" id="color">
                        <label for="color" class="border border-gray-200 rounded-sm h-5 w-5 cursor-pointer shadow-sm block" style="background-color: {{ $product['color'] }}">
                        </label>
                    </div>
					@endforeach
                    <!-- single color end -->
                </div>
         </div>

        </div>
         <!-- product content end -->
     </div>
     
    <x-footer></x-footer>
     <script src="https://kit.fontawesome.com/23ac0adbe1.js" crossorigin="anonymous"></script>
</body>
</body>
</html>
