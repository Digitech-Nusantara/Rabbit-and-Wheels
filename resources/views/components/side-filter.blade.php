{{-- side category --}}
<div class=" m-12 flex justify-items-start absolute ">
    <div class="w-50 bg-red shadow-md rounded-md p-4">
        <!-- Filter Title -->
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Filter</h2>
        
        <!-- Category Filter -->
        <div class="mb-6">
          <button class="flex justify-between items-center w-full text-left text-gray-800 font-medium  mb-2"
                  onclick="toggleSection('category')">
            <span>Kategori</span>
            <svg id="icon-category" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform transform hover:bg-stone-400 rounded-full" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.44l3.71-3.25a.75.75 0 111.06 1.06l-4 3.5a.75.75 0 01-1.06 0l-4-3.5a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
            </svg>
          </button>
          <ul id="section-category" class="ml-4 space-y-2 ">
            <li class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path d="M5.23 7.21a.75.75 0 011.06-.02L10 10.44l3.71-3.25a.75.75 0 111.06 1.06l-4 3.5a.75.75 0 01-1.06 0l-4-3.5a.75.75 0 01-.02-1.06z" />
              </svg>
              Fashion Pria
            </li>
            <li class="ml-4 text-gray-600 cursor-pointer">Sepatu Pria</li>
          </ul>
        </div>
    
        <!-- Store Type Filter -->
        <div class="mb-6">
          <button class="flex justify-between items-center w-full text-left text-gray-800 font-mediu mb-2"
          onclick="toggleSection('store')">
            <span>Jenis toko</span>
            <svg id="icon-store" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform transform hover:bg-stone-400 rounded-full" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.44l3.71-3.25a.75.75 0 111.06 1.06l-4 3.5a.75.75 0 01-1.06 0l-4-3.5a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
            </svg>
          </button>
          <ul id="section-store" class="ml-4 space-y-2 ">
            <li class="flex items-center space-x-2">
                <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
              <span class="text-gray-600">Mall</span>
            </li>
            <li class="flex items-center space-x-2">
              <input type="checkbox" class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
              <span class="text-gray-600">Power Shop</span>
            </li>
          </ul>
        </div>
    
        <!-- Location Filter -->
        <div class="mb-6">
            <button class="flex justify-between items-center w-full text-left text-gray-800 font-medium  focus:outline-none mb-2"
                  onclick="toggleSection('location')">
            <span>Lokasi</span>
            <svg id="icon-location" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform transform hover:bg-stone-400 rounded-full" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.44l3.71-3.25a.75.75 0 111.06 1.06l-4 3.5a.75.75 0 01-1.06 0l-4-3.5a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
            </svg>
          </button>
          <ul id="section-location" class="ml-4 space-y-2 ">
            <li class="flex items-center space-x-2">
              <input type="checkbox" class="h-4 w-4 border-gray-300 rounded">
              <span class="text-gray-600">Bekasi</span>
            </li>
            <li class="flex items-center space-x-2">
              <input type="checkbox" class="h-4 w-4 border-gray-300 rounded">
              <span class="text-gray-600">Jakarta Barat</span>
            </li>
          </ul>

            {{-- tambah kategori --}}

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