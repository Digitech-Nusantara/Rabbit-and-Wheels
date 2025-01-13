        <!-- navbar-start -->
        <header>
            <nav>
                <div class="nav-wrapper">
                    <a href="/">
						<img src="{{ asset('img/logo-syrious.png') }}" alt="logo" width="36px" />
                        <p>SYRIOUS</p>
                    </a>
                <ul>

                    <!-- belum di route(buat pindah halaman) -->
                    <li>
                        <a href="/">Home</a>
                        <a href="/clothes">Clothes</a>
                        <a href="/shoes">Shoes</a>
                        <a href="/accessories">Accesoris</a> 
                        <a href="/all-items">All Items</a>
                    </li>
                    <!-- belum di route(buat pindah halaman) -->
                    
                </ul>
                <div class="userChart flex">
                    {{-- search --}}
                        <div class="navbar">
                            <div class="flex-1">
								<div class="flex-none gap-2">
									<div class="form-control relative inline-block text-left">
										<form action="all-items" method="GET">
											<input type="search" id="search" name="search" placeholder="Search for products" class="input input-bordered w-24 md:w-auto rounded" autocomplete="off"/>
										</form>
										<div id="search-results" class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
										</div>
									</div>
								</div>
								{{-- search --}}
								<a href="/login">
									<img src="../img/user.png" alt="user" width="36px" />
								</a>
								<a href="/cart">
									<img src="../img/cart.png" alt="chart" width="36px" />
								</a>
							</div>
						</div>
					</div>
				</nav>
            </header>
            <!-- navbar-end -->
