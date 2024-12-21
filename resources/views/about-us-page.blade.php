{{-- header --}}
<x-header></x-header>
{{-- header --}}

<body class="bg-gray-100 font-sans">
  {{-- navbar --}}
  <x-navbar></x-navbar>
  {{-- navbar --}}

  <!-- Hero Section -->
  <section class="max-w-6xl mx-auto mt-6 px-4 flex flex-col md:flex-row items-center">
    <div class="md:w-1/2">
      <h2 class="text-3xl font-bold text-gray-800">Who We Are</h2>
      <p class="mt-4 text-gray-600">
        Welcome to our e-commerce store! Our mission is to provide you with the best online shopping experience by offering high-quality products and excellent customer service.
      </p>
    </div>
    <div class="md:w-1/2 mt-6 md:mt-0">
      <img src="https://via.placeholder.com/400x300" alt="E-commerce theme" class="rounded-lg shadow-lg">
    </div>
  </section>

  <!-- Team Section -->
  <section class="max-w-6xl mx-auto mt-10 px-4">
    <h3 class="text-2xl font-bold text-gray-800 text-center">Meet Our Team</h3>
    <div class="mt-6 grid grid-cols-2 md:grid-cols-5 gap-6">
      <!-- Team Member -->
      <div class="text-center bg-white rounded-lg shadow-lg p-6">
        <img src="https://via.placeholder.com/100" alt="Team Member" class="mx-auto rounded-full">
        <h4 class="text-lg font-semibold text-gray-800 mt-4">Robby</h4>
        <p class="text-gray-600">Leader</p>
      </div>
      <!-- Team Member -->
      <div class="text-center bg-white rounded-lg shadow-lg p-6">
        <img src="https://via.placeholder.com/100" alt="Team Member" class="mx-auto rounded-full">
        <h4 class="text-lg font-semibold text-gray-800 mt-4">Naufal</h4>
        <p class="text-gray-600">Frontend Dev</p>
      </div>
      <!-- Team Member -->
      <div class="text-center bg-white rounded-lg shadow-lg p-6">
        <img src="https://via.placeholder.com/100" alt="Team Member" class="mx-auto rounded-full">
        <h4 class="text-lg font-semibold text-gray-800 mt-4">Adrian</h4>
        <p class="text-gray-600">Frontend Dev</p>
      </div>
      <div class="text-center bg-white rounded-lg shadow-lg p-6">
        <img src="https://via.placeholder.com/100" alt="Team Member" class="mx-auto rounded-full">
        <h4 class="text-lg font-semibold text-gray-800 mt-4">Ali</h4>
        <p class="text-gray-600">Backend Dev</p>
      </div>
      <div class="text-center bg-white rounded-lg shadow-lg p-6">
        <img src="https://via.placeholder.com/100" alt="Team Member" class="mx-auto rounded-full">
        <h4 class="text-lg font-semibold text-gray-800 mt-4">Umar</h4>
        <p class="text-gray-600">Backend Dev</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <x-footer></x-footer>
  <!-- Footer -->
  
</body>
</html>
