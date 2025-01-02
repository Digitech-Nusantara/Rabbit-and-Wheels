<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>

	<!-- icon at title bar -->
	<link rel="icon" type="image/x-icon" href="{{ asset('img/logo-syrious.png') }}">
	<!-- icon at title bar -->

    <!-- tailwind -->
	@vite('resources/css/app.css')
	<!-- tailwind -->

    <!-- navbar -->
	<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
	<!-- navbar -->

    <!-- globalcss -->
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <!-- globalcss -->

    <!-- boxicons link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- boxicons link -->

	@if ($title == 'Home - Syrious')
		<link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">
	@endif

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="{{ asset('js/script.js') }}"></script>
</head>
@if ($title = 'Cart - Syrious')
	<body class="bg-gray-100 font-sans leading-normal tracking-normal">
@else
<body>
@endif
    <!-- navbar-start -->
    <x-navbar></x-navbar>
    <!-- navbar-end -->
	
	{{ $slot }}

	<!-- footer-start -->
	<x-footer></x-footer>
	<!-- footer-end -->
	@switch($title)
		@case('Clothes Details - Syrious')
		@case('Shoes Details - Syrious')
		@case('Accessories Details - Syrious')
			<script src="https://kit.fontawesome.com/23ac0adbe1.js" crossorigin="anonymous"></script>
			@break;
	@endswitch
</body>
</html>
