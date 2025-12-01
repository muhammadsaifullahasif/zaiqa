<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Royal') }}</title>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="surfside media" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/animation.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('font/fonts.css') }}">
	<link rel="stylesheet" href="{{ asset('icon/style.css') }}">
	<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
	<link rel="apple-touch-icon-precomposed" href="assets('images/favicon.ico')">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
	@stack('styles')
</head>

<body class="body">
	<div id="wrapper">
		<div id="page" class="">
			<div class="layout-wrap">

				<!-- <div id="preload" class="preload-container">
					<div class="preloading">
						<span></span>
					</div>
				</div> -->

				<div class="section-menu-left">
					<div class="box-logo">
						<a href="{{ route('admin.index') }}" id="site-logo-inner">
							<img class="" id="logo_header_1" alt="" src="{{ asset('images/logo/royal-logo-light.png') }}"
								data-light="{{ asset('images/logo/royal-logo-light.png') }}" data-dark="{{ asset('images/logo/royal-logo-light.png') }}">
						</a>
						<div class="button-show-hide">
							<i class="icon-menu-left"></i>
						</div>
					</div>
					<div class="center">
						<div class="center-item">
							<div class="center-heading">Main Home</div>
							<ul class="menu-list">
								<li class="menu-item">
									<a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
										<div class="icon"><i class="icon-grid"></i></div>
										<div class="text">Dashboard</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="center-item">
							<ul class="menu-list">
								<li class="menu-item has-children {{ request()->routeIs('products.*') ? 'active' : '' }}">
									<a href="javascript:void(0);" class="menu-item-button">
										<div class="icon"><i class="icon-shopping-cart"></i></div>
										<div class="text">Products</div>
									</a>
									<ul class="sub-menu" style="{{ request()->routeIs('products.*') ? 'display: block;' : '' }}">
										<li class="sub-menu-item">
											<a href="{{ route('products.create') }}" class="{{ request()->routeIs('products.create') ? 'active' : '' }}">
												<div class="text">Add Product</div>
											</a>
										</li>
										<li class="sub-menu-item">
											<a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.index') ? 'active' : '' }}">
												<div class="text">Products</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="menu-item has-children {{ request()->routeIs('admin.categories') || request()->routeIs('admin.category.*') ? 'active' : '' }}">
									<a href="javascript:void(0);" class="menu-item-button">
										<div class="icon"><i class="icon-layers"></i></div>
										<div class="text">Category</div>
									</a>
									<ul class="sub-menu" style="{{ request()->routeIs('admin.categories') || request()->routeIs('admin.category.*') ? 'display: block;' : '' }}">
										<li class="sub-menu-item">
											<a href="{{ route('admin.category.add') }}" class="{{ request()->routeIs('admin.category.add') ? 'active' : '' }}">
												<div class="text">New Category</div>
											</a>
										</li>
										<li class="sub-menu-item">
											<a href="{{ route('admin.categories') }}" class="{{ request()->routeIs('admin.categories') ? 'active' : '' }}">
												<div class="text">Categories</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="menu-item has-children {{ request()->routeIs('admin.orders') || request()->routeIs('admin.order.*') ? 'active' : '' }}">
									<a href="javascript:void(0);" class="menu-item-button">
										<div class="icon"><i class="icon-file-plus"></i></div>
										<div class="text">Orders</div>
									</a>
									<ul class="sub-menu" style="{{ request()->routeIs('admin.orders') || request()->routeIs('admin.order.*') ? 'display: block;' : '' }}">
										<li class="sub-menu-item">
											<a href="{{ route('admin.orders') }}" class="{{ request()->routeIs('admin.orders') ? 'active' : '' }}">
												<div class="text">All Orders</div>
											</a>
										</li>
										<li class="sub-menu-item">
											<a href="{{ route('admin.order.reports') }}" class="{{ request()->routeIs('admin.order.reports') ? 'active' : '' }}">
												<div class="text">Reports</div>
											</a>
										</li>
									</ul>
								</li>
								{{-- <li class="menu-item">
									<a href="{{ route('admin.orders') }}" class="">
										<div class="icon"><i class="icon-file-plus"></i></div>
										<div class="text">Orders</div>
									</a>
								</li> --}}
								<li class="menu-item">
									<a href="{{ route('admin.slides') }}" class="{{ request()->routeIs('admin.slides') ? 'active' : '' }}">
										<div class="icon"><i class="icon-image"></i></div>
										<div class="text">Slides</div>
									</a>
								</li>
								<li class="menu-item has-children {{ request()->routeIs('admin.units*') ? 'active' : '' }}">
									<a href="javascript:void(0);" class="menu-item-button">
										<div class="icon"><i class="icon-layers"></i></div>
										<div class="text">Units</div>
									</a>
									<ul class="sub-menu" style="{{ request()->routeIs('admin.units*') ? 'display: block;' : '' }}">
										<li class="sub-menu-item">
											<a href="{{ route('admin.units.create') }}" class="{{ request()->routeIs('admin.units.create') ? 'active' : '' }}">
												<div class="text">New Unit</div>
											</a>
										</li>
										<li class="sub-menu-item">
											<a href="{{ route('admin.units') }}" class="{{ request()->routeIs('admin.units') ? 'active' : '' }}">
												<div class="text">Units</div>
											</a>
										</li>
									</ul>
								</li>
								{{-- <li class="menu-item">
									<a href="{{ route('admin.coupons') }}" class="">
										<div class="icon"><i class="icon-grid"></i></div>
										<div class="text">Coupns</div>
									</a>
								</li> --}}

								<li class="menu-item">
									<a href="{{ route('admin.checkout-setting') }}" class="{{ request()->routeIs('admin.checkout-setting') ? 'active' : '' }}">
										<div class="icon"><i class="icon-settings"></i></div>
										<div class="text">Checkout Setting</div>
									</a>
								</li>

								<li class="menu-item">
									<a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users') ? 'active' : '' }}">
										<div class="icon"><i class="icon-user"></i></div>
										<div class="text">User</div>
									</a>
								</li>

								{{-- <li class="menu-item">
									<a href="{{ route('admin.setting') }}" class="">
										<div class="icon"><i class="icon-settings"></i></div>
										<div class="text">Settings</div>
									</a>
								</li> --}}

								<li class="menu-item">
									<form method="POST" action="{{ route('logout') }}" id="sidebar-logout-form">
										@csrf
										<a href="{{ route('logout') }}" class="" onclick="event.preventDefault();document.getElementById('sidebar-logout-form').submit();">
											<div class="icon"><i class="icon-log-out"></i></div>
											<div class="text">Logout</div>
										</a>
									</form>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="section-content-right">

					<div class="header-dashboard">
						<div class="wrap">
							<div class="header-left">
								<a href="index-2.html">
									<img class="" id="logo_header_mobile" alt="" src="{{ asset('images/logo/royal-logo-light.png') }}"
										data-light="{{ asset('images/logo/royal-logo-light.png') }}" data-dark="{{ asset('images/logo/royal-logo-light.png') }}"
										data-width="154px" data-height="52px" data-retina="{{ asset('images/logo/royal-logo-light.png') }}">
								</a>
								<div class="button-show-hide">
									<i class="icon-menu-left"></i>
								</div>


								{{-- <form class="form-search flex-grow">
									<fieldset class="name">
										<input type="text" placeholder="Search here..." class="show-search" id="search-input" name="name"
											tabindex="2" value="" aria-required="true" required="">
									</fieldset>
									<div class="button-submit">
										<button class="" type="submit"><i class="icon-search"></i></button>
									</div>
									<div class="box-content-search">
										<ul class="mb-24">
											<li class="mb-14">
												<div class="body-title">Top selling product</div>
											</li>
											<li class="mb-14">
												<div class="divider"></div>
											</li>
											<li>
												<ul id="box-content-search">
												</ul>
											</li>
										</ul>
										<ul class="">
											<li class="mb-14">
												<div class="body-title">Order product</div>
											</li>
											<li class="mb-14">
												<div class="divider"></div>
											</li>
											<li>
												<ul>
													<li class="product-item gap14 mb-10">
														<div class="image no-bg">
															<img src="{{ asset('images/products/20.png') }}" alt="">
														</div>
														<div class="flex items-center justify-between gap20 flex-grow">
															<div class="name">
																<a href="product-list.html" class="body-text">Sojos
																	Crunchy Natural Grain Free...</a>
															</div>
														</div>
													</li>
													<li class="mb-10">
														<div class="divider"></div>
													</li>
													<li class="product-item gap14 mb-10">
														<div class="image no-bg">
															<img src="{{ asset('images/products/21.png') }}" alt="">
														</div>
														<div class="flex items-center justify-between gap20 flex-grow">
															<div class="name">
																<a href="product-list.html" class="body-text">Kristin
																	Watson</a>
															</div>
														</div>
													</li>
													<li class="mb-10">
														<div class="divider"></div>
													</li>
													<li class="product-item gap14 mb-10">
														<div class="image no-bg">
															<img src="{{ asset('images/products/22.png') }}" alt="">
														</div>
														<div class="flex items-center justify-between gap20 flex-grow">
															<div class="name">
																<a href="product-list.html" class="body-text">Mega
																	Pumpkin Bone</a>
															</div>
														</div>
													</li>
													<li class="mb-10">
														<div class="divider"></div>
													</li>
													<li class="product-item gap14">
														<div class="image no-bg">
															<img src="{{ asset('images/products/23.png') }}" alt="">
														</div>
														<div class="flex items-center justify-between gap20 flex-grow">
															<div class="name">
																<a href="product-list.html" class="body-text">Mega
																	Pumpkin Bone</a>
															</div>
														</div>
													</li>
												</ul>
											</li>
										</ul>
									</div>
								</form> --}}

							</div>
							<div class="header-grid">

								<div class="popup-wrap bg-white message type-header">
									<div class="dropdown">
										<button class="dropdown-toggle" type="button"
											id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
											<span class="header-item">
												<span class="text-tiny">55</span>
												<i class="icon-bell"></i>
											</span>
										</button>
										<ul class="dropdown-menu dropdown-menu-end has-content"
											aria-labelledby="dropdownMenuButton2">
											<li>
												<h6>Notifications</h6>
											</li>
											<li>
												<div class="message-item item-1">
													<div class="image">
														<i class="icon-noti-1"></i>
													</div>
													<div>
														<div class="body-title-2">Discount available</div>
														<div class="text-tiny">Morbi sapien massa, ultricies at rhoncus
															at, ullamcorper nec diam</div>
													</div>
												</div>
											</li>
											<li>
												<div class="message-item item-2">
													<div class="image">
														<i class="icon-noti-2"></i>
													</div>
													<div>
														<div class="body-title-2">Account has been verified</div>
														<div class="text-tiny">Mauris libero ex, iaculis vitae rhoncus
															et</div>
													</div>
												</div>
											</li>
											<li>
												<div class="message-item item-3">
													<div class="image">
														<i class="icon-noti-3"></i>
													</div>
													<div>
														<div class="body-title-2">Order shipped successfully</div>
														<div class="text-tiny">Integer aliquam eros nec sollicitudin
															sollicitudin</div>
													</div>
												</div>
											</li>
											<li>
												<div class="message-item item-4">
													<div class="image">
														<i class="icon-noti-4"></i>
													</div>
													<div>
														<div class="body-title-2">Order pending: <span>ID 305830</span>
														</div>
														<div class="text-tiny">Ultricies at rhoncus at ullamcorper</div>
													</div>
												</div>
											</li>
											<li><a href="#" class="tf-button btn btn-primary w-full">View all</a></li>
										</ul>
									</div>
								</div>




								<div class="popup-wrap bg-transparent user type-header">
									<div class="dropdown">
										<button class="dropdown-toggle" type="button"
											id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
											<span class="header-user wg-user">
												<span class="image">
													<img src="{{ asset('images/avatar/user-1.png') }}" alt="">
												</span>
												<span class="flex flex-column">
													<span class="body-title mb-2">Kristin Watson</span>
													<span class="text-tiny">Admin</span>
												</span>
											</span>
										</button>
										<ul class="dropdown-menu dropdown-menu-end has-content"
											aria-labelledby="dropdownMenuButton3">
											<li>
												<a href="{{ route('admin.setting') }}" class="user-item">
													<div class="icon">
														<i class="icon-settings"></i>
													</div>
													<div class="body-title-2">Accounts</div>
												</a>
											</li>
											{{-- <li>
												<a href="#" class="user-item">
													<div class="icon">
														<i class="icon-user"></i>
													</div>
													<div class="body-title-2">Account</div>
												</a>
											</li> --}}
											{{-- <li>
												<a href="#" class="user-item">
													<div class="icon">
														<i class="icon-mail"></i>
													</div>
													<div class="body-title-2">Inbox</div>
													<div class="number">27</div>
												</a>
											</li> --}}
											{{-- <li>
												<a href="#" class="user-item">
													<div class="icon">
														<i class="icon-file-text"></i>
													</div>
													<div class="body-title-2">Taskboard</div>
												</a>
											</li> --}}
											{{-- <li>
												<a href="#" class="user-item">
													<div class="icon">
														<i class="icon-headphones"></i>
													</div>
													<div class="body-title-2">Support</div>
												</a>
											</li> --}}
											<li>
												<form method="POST" action="{{ route('logout') }}" id="nav-logout-form">
													@csrf
													<a href="{{ route('logout') }}" class="user-item" onclick="event.preventDefault();document.getElementById('nav-logout-form').submit();">
														<div class="icon">
															<i class="icon-log-out"></i>
														</div>
														<div class="body-title-2">Log out</div>
													</a>
												</form>
											</li>
										</ul>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="main-content">

						@yield('content')

						<div class="bottom-page">
							<div class="body-text">Copyright © {{ date('Y') }} Devlinkx</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>   
	<script src="{{ asset('js/sweetalert.min.js') }}"></script>    
	<script src="{{ asset('js/apexcharts/apexcharts.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
	<script>
		$(document).ready(function(){
			$('#search-input').on('keyup', function(){
				var searchQuery = $(this).val();
				if(searchQuery.length > 2) {
					$.ajax({
						type: "GET",
						url: "{{ route('admin.search') }}",
						data: { query:searchQuery },
						dataType: 'json',
						success: function(data) {
							$('#box-content-search').html('');
							$.each(data, function(index, item){
								var url = "{{ route('products.edit', 'product_id_pls') }}";
								var link = url.replace('product_id_pls', item.id);

								$('#box-content-search').append(`
								<li class="product-item gap14 mb-10">
									<div class="image no-bg">
										<img src="{{ asset('uploads/products/thumbnails') }}/${ item.image }" alt="${ item.name }">
									</div>
									<div class="flex items-center justify-between gap20 flex-grow">
										<div class="name">
											<a href="${ link }" class="body-text">${ item.name }</a>
										</div>
									</div>
								</li>
								<li class="mb-10">
									<div class="divider"></div>
								</li>
								`);
							});
						}
					});
				}
			});
		});
	</script>
	@stack('scripts')
</body>

</html>