{{-- side category --}}
<div class=" m-12 flex justify-items-start absolute ">
    <div class="w-50 bg-red shadow-md rounded-md p-4">
        <!-- Filter Title -->
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Filter</h2>
        
		<form action="/all-items" method="GET">
        <!-- Category Filter -->
        <div class="mb-6">
          <button class="flex justify-between items-center w-full text-left text-gray-800 font-medium  mb-2"
                  type="button" onclick="toggleSection('category')">
            <span>Kategori</span>
            <svg id="icon-category" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform transform hover:bg-stone-400 rounded-full" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.44l3.71-3.25a.75.75 0 111.06 1.06l-4 3.5a.75.75 0 01-1.06 0l-4-3.5a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
            </svg>
          </button>
          <ul id="section-category" class="ml-4 space-y-2 ">
			@foreach($categories as $category)
            <li class="flex items-center">
			  @if($category['name'] == 'Home')
				@continue
			  @else
				  <input type="checkbox" name="cat[]" value="{{ $category['id'] }}" class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500" {{ in_array($category['id'], (array) request('category', [])) ? 'checked' : '' }}>
				  <span class="text-gray-600">{{ $category['name'] }}</span>
			  @endif
            </li>
			@endforeach
          </ul>
        </div>
    
		<!-- Subcategory Filter -->
        <div class="mb-6">
          <button class="flex justify-between items-center w-full text-left text-gray-800 font-medium  mb-2"
                  type="button" onclick="toggleSection('subcategory')">
            <span>Subkategori</span>
            <svg id="icon-subcategory" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform transform hover:bg-stone-400 rounded-full" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.44l3.71-3.25a.75.75 0 111.06 1.06l-4 3.5a.75.75 0 01-1.06 0l-4-3.5a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
            </svg>
          </button>
          <ul id="section-subcategory" class="ml-4 space-y-2 ">
			@foreach($subcategories as $subcategory)
            <li class="flex items-center">
			  @switch($subcategory['name'])
				@case('Unknown')
				@case('All Clothes')
				@case('All Shoes')
				@case('All Accessories')
					@continue(2)
				@default
				  <input type="checkbox" name="subcat[]" value="{{ $subcategory['id'] }}" class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500" {{ in_array($subcategory['id'], request('subcategory', [])) ? 'checked' : '' }}>
				  <span class="text-gray-600">{{ $subcategory['name'] }}</span>
					@break
			  @endswitch
            </li>
			@endforeach
          </ul>
		  <button type="submit">Filter Product!</button>
        </div>
            {{-- tambah kategori --}}

		</form>
        </div>
      </div>
		</div>

      <script>
        function toggleSection(section) {
          const content = document.getElementById(`section-${section}`);
          const icon = document.getElementById(`icon-${section}`);
          
          content.classList.toggle('hidden');
          icon.classList.toggle('rotate-180');
        }
      </script>
    {{-- side category --}}
