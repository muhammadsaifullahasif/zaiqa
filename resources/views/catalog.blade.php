<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-slider@11.0.2/dist/css/bootstrap-slider.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
</head>
<body>
    
    {{-- TOP BAR START --}}
    <div class="top-bar">
        <div class="container">
            <div class="row px-lg-5 px-md-3 py-2">
                <div class="col-md-6">
                    <div class="d-flex flex-row gx-2 align-items-center">
                        <img src="{{ asset('assets/images/delivery.svg') }}" alt="">
                        <span class="text-white px-2">Free delivery on orders €35+</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-row gx-2 align-items-center justify-content-md-end">
                        <a href="" class="text-white px-1"><i class="fab fa-tiktok"></i></a>
                        <a href="" class="text-white px-1"><i class="fab fa-x-twitter"></i></a>
                        <a href="" class="text-white px-1"><i class="fab fa-youtube"></i></a>
                        <a href="" class="text-white px-1"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- TOP BAR END --}}

    {{-- MAIN SECTION START --}}
    <main class="main">
        <header class="header header-desktop py-3">
            <div class="container">
                <div class="row align-items-center px-5">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="#"><img src="{{ asset('assets/images/logo-light.svg') }}" class="logo-light" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/images/logo-dark.svg') }}" class="logo-dark" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ul class="nav justify-content-center primary-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Deals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="header-cta">
                            <a href="#" class="cart btn btn-secondary">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                <span>Cart</span>
                                <span class="count">2</span>
                            </a>

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.3225 12.2021C3.77683 12.2021 0.75 12.7384 0.75 14.8852C0.75 17.0321 3.75758 17.5876 7.3225 17.5876C10.8672 17.5876 13.895 17.0504 13.895 14.9045C13.895 12.7586 10.8865 12.2021 7.3225 12.2021V12.2021Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M7.3224 9.14084C8.15565 9.14084 8.97019 8.89376 9.66302 8.43083C10.3558 7.9679 10.8958 7.30992 11.2147 6.54009C11.5336 5.77027 11.617 4.92317 11.4544 4.10593C11.2919 3.28869 10.8906 2.538 10.3014 1.9488C9.71224 1.35961 8.96156 0.958357 8.14432 0.795797C7.32707 0.633238 6.47998 0.716669 5.71016 1.03554C4.94033 1.35441 4.28235 1.8944 3.81942 2.58723C3.35649 3.28005 3.1094 4.09459 3.1094 4.92785C3.1055 6.04116 3.54397 7.11043 4.32836 7.9005C5.11275 8.69056 6.17884 9.13672 7.29215 9.14084H7.3224Z" stroke="white" stroke-width="1.429" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <header class="header header-mobile">
            <div class="container">
                <div class="row align-items-center px-3 py-3">
                    <div class="col-4">
                        <nav class="navbar navbar-expend-lg" data-bs-theme="dark">
                            <div class="container-fluid">
                                <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNavbar">
                                    {{-- <span class="navbar-toggler-icon"></span> --}}
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="navbar-collapse collapse" id="mobileNavbar">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link text-primary" href="#">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-primary" href="#">Shop</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-primary" href="#">Deals</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-primary" href="#">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-primary" href="#">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-4">
                        <div class="logo text-center">
                            <a href="#"><img src="{{ asset('assets/images/logo-light.svg') }}" class="logo-light" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/images/logo-dark.svg') }}" class="logo-dark" alt=""></a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="header-cta">
                            <a href="#" class="cart btn btn-secondary">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                <span class="count">2</span>
                            </a>

                            <a href="#" class="btn btn-secondary">
                                <svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.3225 12.2021C3.77683 12.2021 0.75 12.7384 0.75 14.8852C0.75 17.0321 3.75758 17.5876 7.3225 17.5876C10.8672 17.5876 13.895 17.0504 13.895 14.9045C13.895 12.7586 10.8865 12.2021 7.3225 12.2021V12.2021Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M7.3224 9.14084C8.15565 9.14084 8.97019 8.89376 9.66302 8.43083C10.3558 7.9679 10.8958 7.30992 11.2147 6.54009C11.5336 5.77027 11.617 4.92317 11.4544 4.10593C11.2919 3.28869 10.8906 2.538 10.3014 1.9488C9.71224 1.35961 8.96156 0.958357 8.14432 0.795797C7.32707 0.633238 6.47998 0.716669 5.71016 1.03554C4.94033 1.35441 4.28235 1.8944 3.81942 2.58723C3.35649 3.28005 3.1094 4.09459 3.1094 4.92785C3.1055 6.04116 3.54397 7.11043 4.32836 7.9005C5.11275 8.69056 6.17884 9.13672 7.29215 9.14084H7.3224Z" stroke="white" stroke-width="1.429" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- MAIN CONTENT START --}}
        <section class="main-content">
            {{-- HERO START --}}
            <div class="catalog-hero py-lg-5 py-md-3">
                <div class="container">
                    <div class="d-flex flex-column px-lg-5 px-md-3 mb-md-3 align-items-center justify-content-center">
                        <h3 class="dual-heading fw-bold"><span class="text-black">Explore Complete</span> <span class="text-primary">Menu</span></h3>
                        <p>Discover every Royal creation, crafted with authentic flavor and top-quality ingredients.</p>
                    </div>
                </div>
            </div>
            {{-- HERO END --}}
            {{-- CATALOG CONTAINER START --}}
            <div class="our-location py-md-3">
                <div class="container">
                    <div class="row px-lg-5 px-md-3">
                        {{-- SIDEBAR START --}}
                        <aside class="col-lg-2 col-md-12">
                            <div class="sidebar-filters">
                                <div class="sidebar-filter">
                                    <div class="header">
                                        <h4 class="title">Filters</h4>
                                        <a href="#">Clear all</a>
                                    </div>
                                    <p class="product-count text">Showing 0 of 100</p>
                                </div>
                                <div class="sidebar-filter">
                                    <div class="header">
                                        <h5 class="subtitle">Categories</h5>
                                        <a href="#"><i class="fas fa-angle-down"></i></a>
                                    </div>
                                    <div class="body">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="whole-spices">
                                            <label for="whole-spices" class="form-check-label">Whole Spices</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="ground-spices">
                                            <label for="ground-spices" class="form-check-label">Ground Spices</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="blended-spices">
                                            <label for="blended-spices" class="form-check-label">Blended Spices</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="organic-spices">
                                            <label for="organic-spices" class="form-check-label">Organic Spices</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="seasonal-spices">
                                            <label for="seasonal-spices" class="form-check-label">Seasonal Spices</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="sidebar-filter">
                                    <div class="header">
                                        <h5 class="subtitle">Cuisine Type</h5>
                                        <a href="#"><i class="fas fa-angle-down"></i></a>
                                    </div>
                                    <div class="body">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="cuisine-type" id="desi-masala">
                                            <label for="desi-masala" class="form-check-label">Desi Masala</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="cuisine-type" id="continental-blend">
                                            <label for="continental-blend" class="form-check-label">Continental Blend</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="cuisine-type" id="arabic-middle-eastern">
                                            <label for="arabic-middle-eastern" class="form-check-label">Arabic / Middle Eastern</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="cuisine-type" id="chinese-mix">
                                            <label for="chinese-mix" class="form-check-label">Chinese Mix</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="cuisine-type" id="bbq-rubs">
                                            <label for="bbq-rubs" class="form-check-label">BBQ Rubs</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="sidebar-filter">
                                    <div class="header">
                                        <h5 class="subtitle">Spice Level</h5>
                                        <a href="#"><i class="fas fa-angle-down"></i></a>
                                    </div>
                                    <div class="body">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="spice-level" id="mild">
                                            <label for="mild" class="form-check-label">Mild</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="spice-level" id="medium">
                                            <label for="medium" class="form-check-label">Medium</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="spice-level" id="hot">
                                            <label for="hot" class="form-check-label">Hot</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="sidebar-filter">
                                    <div class="header">
                                        <h5 class="subtitle">Availability</h5>
                                        <a href="#"><i class="fas fa-angle-down"></i></a>
                                    </div>
                                    <div class="body">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="availability" id="in-stock">
                                            <label for="in-stock" class="form-check-label">In Stock</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="availability" id="out-of-stock">
                                            <label for="in-stock" class="form-check-label">Out of Stock</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="sidebar-filter">
                                    <div class="header">
                                        <h5 class="subtitle">Price Range</h5>
                                        <a href="#"><i class="fas fa-angle-down"></i></a>
                                    </div>
                                    <div class="body">
                                        {{-- <input class="price-range-slider" type="text" name="price_range" value="" data-slider-min="1" data-slider-max="500" data-slider-step="5" data-slider-value="[0,500]" data-currency="$" />
                                        <div class="price-range__info d-flex align-items-center mt-2">
                                            <div class="me-auto">
                                                <span class="text-secondary">Min Price: </span>
                                                <span class="price-range__min">$1</span>
                                            </div>
                                            <div>
                                                <span class="text-secondary">Max Price: </span>
                                                <span class="price-range__max">$500</span>
                                            </div>
                                        </div> --}}
                                        {{-- <b id="priceLabel"></b> --}}
                                        {{-- <input id="priceSlider" type="text"/> --}}
                                    </div>
                                </div>
                            </div>
                        </aside>
                        {{-- SIDEBAR END --}}
                        {{-- CATALOG START --}}
                        <div class="col-lg-10 col-md-12">
                            <div class="row align-items-stretch g-2 px-lg-5 px-md-3 mb-lg-5 mb-md-3 catalog-search">
                                <div class="col-10">
                                    <input type="text" class="form-control form-control-lg bg-transparent" placeholder="Enter masala name">
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-primary btn-lg w-100">Search</button>
                                </div>
                            </div>

                            <div class="row align-items-stretch px-lg-5 px-md-3 mb-lg-5 mb-md-3 product-archive catalog-archive">
                                @foreach ($products as $product)
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="card product-item">
                                            <a href="{{ route('shop.product.detail', $product->slug) }}"><img src="{{ asset('uploads/products') }}/{{ $product->product_meta['thumbnail'] }}" class="card-img-top" alt="{{ $product->title }}" /></a>
                                            <div class="card-body">
                                                <div class="card-title d-flex justify-content-between">
                                                    <a href="{{ route('shop.product.detail', $product->slug) }}"><h3 class="product-title fw-bold text-secondary">{{ $product->title }}</h3></a>
                                                    <p class="product-price fw-bold text-secondary"><span>€</span> {{ $product->getMinPrice() }}<span class="product-unit">/{{ $product->getMinUnit() }} {{ $product->product_meta['unit'] }}</span></p>
                                                </div>
                                                <p class="card-text product-short-description">{{ $product->short_description }}</p>
                                                <div class="product-footer d-flex justify-content-between">
                                                    <div class="product-review d-flex align-items-center gap-2">
                                                        <ul class="d-flex align-items-center list-unstyled mb-0">
                                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                            <li><img src="{{ asset('assets/images/star-half.svg') }}" alt=""></li>
                                                        </ul>
                                                        <p class="mb-0">4.5 (360 reviews)</p>
                                                    </div>
                                                    <a href="{{ route('shop.product.detail', $product->slug) }}" class="btn btn-primary product-add-to-cart-btn"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="col-lg-4 col-md-6 mb-3">
                                    <div class="card product-item">
                                        <a href="#"><img src="{{ asset('assets/images/product-img-1.png') }}" class="card-img-top" alt="" /></a>
                                        <div class="card-body">
                                            <div class="card-title d-flex justify-content-between">
                                                <a href="#"><h3 class="product-title fw-bold text-secondary">Checken Masala</h3></a>
                                                <p class="product-price fw-bold text-secondary"><span>€</span> 40</p>
                                            </div>
                                            <p class="card-text product-short-description">Crispy, deep-fried fritters made with gram flour and spiced vegetables</p>
                                            <div class="product-footer d-flex justify-content-between">
                                                <div class="product-review d-flex align-items-center gap-2">
                                                    <ul class="d-flex align-items-center list-unstyled mb-0">
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star-half.svg') }}" alt=""></li>
                                                    </ul>
                                                    <p class="mb-0">4.5 (360 reviews)</p>
                                                </div>
                                                <a href="#" class="btn btn-primary product-add-to-cart-btn"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <div class="card product-item">
                                        <a href="#"><img src="{{ asset('assets/images/product-img-2.png') }}" class="card-img-top" alt="" /></a>
                                        <div class="card-body">
                                            <div class="card-title d-flex justify-content-between">
                                                <a href="#"><h3 class="product-title fw-bold text-secondary">Checken Masala</h3></a>
                                                <p class="product-price fw-bold text-secondary"><span>€</span> 40</p>
                                            </div>
                                            <p class="card-text product-short-description">Crispy, deep-fried fritters made with gram flour and spiced vegetables</p>
                                            <div class="product-footer d-flex justify-content-between">
                                                <div class="product-review d-flex align-items-center gap-2">
                                                    <ul class="d-flex align-items-center list-unstyled mb-0">
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star-half.svg') }}" alt=""></li>
                                                    </ul>
                                                    <p class="mb-0">4.5 (360 reviews)</p>
                                                </div>
                                                <a href="#" class="btn btn-primary product-add-to-cart-btn"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <div class="card product-item">
                                        <a href="#"><img src="{{ asset('assets/images/product-img-3.png') }}" class="card-img-top" alt="" /></a>
                                        <div class="card-body">
                                            <div class="card-title d-flex justify-content-between">
                                                <a href="#"><h3 class="product-title fw-bold text-secondary">Checken Masala</h3></a>
                                                <p class="product-price fw-bold text-secondary"><span>€</span> 40</p>
                                            </div>
                                            <p class="card-text product-short-description">Crispy, deep-fried fritters made with gram flour and spiced vegetables</p>
                                            <div class="product-footer d-flex justify-content-between">
                                                <div class="product-review d-flex align-items-center gap-2">
                                                    <ul class="d-flex align-items-center list-unstyled mb-0">
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star-half.svg') }}" alt=""></li>
                                                    </ul>
                                                    <p class="mb-0">4.5 (360 reviews)</p>
                                                </div>
                                                <a href="#" class="btn btn-primary product-add-to-cart-btn"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <div class="card product-item">
                                        <a href="#"><img src="{{ asset('assets/images/product-img-4.png') }}" class="card-img-top" alt="" /></a>
                                        <div class="card-body">
                                            <div class="card-title d-flex justify-content-between">
                                                <a href="#"><h3 class="product-title fw-bold text-secondary">Checken Masala</h3></a>
                                                <p class="product-price fw-bold text-secondary"><span>€</span> 40</p>
                                            </div>
                                            <p class="card-text product-short-description">Crispy, deep-fried fritters made with gram flour and spiced vegetables</p>
                                            <div class="product-footer d-flex justify-content-between">
                                                <div class="product-review d-flex align-items-center gap-2">
                                                    <ul class="d-flex align-items-center list-unstyled mb-0">
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star-half.svg') }}" alt=""></li>
                                                    </ul>
                                                    <p class="mb-0">4.5 (360 reviews)</p>
                                                </div>
                                                <a href="#" class="btn btn-primary product-add-to-cart-btn"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <div class="card product-item">
                                        <a href="#"><img src="{{ asset('assets/images/product-img-5.png') }}" class="card-img-top" alt="" /></a>
                                        <div class="card-body">
                                            <div class="card-title d-flex justify-content-between">
                                                <a href="#"><h3 class="product-title fw-bold text-secondary">Checken Masala</h3></a>
                                                <p class="product-price fw-bold text-secondary"><span>€</span> 40</p>
                                            </div>
                                            <p class="card-text product-short-description">Crispy, deep-fried fritters made with gram flour and spiced vegetables</p>
                                            <div class="product-footer d-flex justify-content-between">
                                                <div class="product-review d-flex align-items-center gap-2">
                                                    <ul class="d-flex align-items-center list-unstyled mb-0">
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star-half.svg') }}" alt=""></li>
                                                    </ul>
                                                    <p class="mb-0">4.5 (360 reviews)</p>
                                                </div>
                                                <a href="#" class="btn btn-primary product-add-to-cart-btn"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <div class="card product-item">
                                        <a href="#"><img src="{{ asset('assets/images/product-img-6.png') }}" class="card-img-top" alt="" /></a>
                                        <div class="card-body">
                                            <div class="card-title d-flex justify-content-between">
                                                <a href="#"><h3 class="product-title fw-bold text-secondary">Checken Masala</h3></a>
                                                <p class="product-price fw-bold text-secondary"><span>€</span> 40</p>
                                            </div>
                                            <p class="card-text product-short-description">Crispy, deep-fried fritters made with gram flour and spiced vegetables</p>
                                            <div class="product-footer d-flex justify-content-between">
                                                <div class="product-review d-flex align-items-center gap-2">
                                                    <ul class="d-flex align-items-center list-unstyled mb-0">
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                        <li><img src="{{ asset('assets/images/star-half.svg') }}" alt=""></li>
                                                    </ul>
                                                    <p class="mb-0">4.5 (360 reviews)</p>
                                                </div>
                                                <a href="#" class="btn btn-primary product-add-to-cart-btn"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>

                            {{-- PAGINATION START --}}
                            <div class="row align-items-stretch px-lg-5 px-md-3 mb-lg-5 mb-md-3 pagination-container">
                                <div class="col-md-12">
                                    {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
                                    {{-- <ul class="pagination justify-content-center">
                                        <li class="page-item disabled"><a href="#" class="page-link"><i class="fas fa-arrow-left"></i> Previous</a></li>
                                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item disabled"><a href="#" class="page-link">...</a></li>
                                        <li class="page-item"><a href="#" class="page-link">67</a></li>
                                        <li class="page-item"><a href="#" class="page-link">68</a></li>
                                        <li class="page-item"><a href="#" class="page-link">Next <i class="fas fa-arrow-right"></i></a></li>
                                    </ul> --}}
                                </div>
                            </div>
                            {{-- PAGINATION END --}}
                        </div>
                        {{-- CATALOG END --}}
                    </div>
                </div>
            </div>
            {{-- CATALOG CONTAINER END --}}
        </section>
        {{-- MAIN CONTENT END --}}
    </main>
    {{-- MAIN SECTION END --}}

    {{-- FOOTER START --}}
    <footer class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row p-lg-5 p-md-3">
                <div class="col-lg-2 d-flex flex-column gap-4 footer-column px-lg-3 px-md-0">
                    <img src="{{ asset('assets/images/logo-light.svg') }}" alt="" class="footer-logo">
                    <div class="d-flex flex-row gx-2 align-items-center">
                        <a href="#" class="text-secondary fs-2 px-1"><i class="fab fa-tiktok"></i></a>
                        <a href="#" class="text-secondary fs-2 px-1"><i class="fab fa-x-twitter"></i></a>
                        <a href="#" class="text-secondary fs-2 px-1"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-secondary fs-2 px-1"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 footer-column px-lg-3 px-md-0">
                    <h4 class="footer-title">Quick Links</h4>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">Shop</a></li>
                        <li><a href="#" class="text-white">Deals</a></li>
                        <li><a href="#" class="text-white">About</a></li>
                        <li><a href="#" class="text-white">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 footer-column px-lg-3 px-md-0">
                    <h4 class="footer-title">About Company</h4>
                    <ul class="footer-links list-unstyled company-info">
                        <li>
                            <i class="fas fa-location-dot"></i>
                            <p>Address | B.d Schleifmühle 34, 85049 Ingolstadt</p>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <p>Phone Number | +49 (1726) 086-408</p>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <p>Email address | info@royal-in.com</p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5 footer-column px-lg-3 px-md-0 footer-newsletter">
                    <h4 class="footer-title">Newsletter</h4>
                    <form action="#" class="newsletter-form">
                        <input type="text" placeholder="Your email" class="form-control">
                        <button class="btn btn-secondary">Subscribe</button>
                    </form>
                    <p>Stay on trend — subscribe to our newsletter for exclusive discounts and style updates!</p>
                </div>
            </div>
        </div>
    </footer>
    {{-- FOOTER END --}}
    {{-- BOTTOM FOOTER START --}}
    <div class="bottom-footer py-3">
        <div class="container">
            <div class="row px-lg-5 px-md-3">
                <div class="col-12 text-center">
                    <p class="mb-0">Copyright 2025 Royal. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    {{-- BOTTOM FOOTER END --}}

    <script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/d35f256856.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-slider@11.0.2/dist/bootstrap-slider.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/js/plugins/bootstrap-slider.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/plugins/swiper.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/theme.js') }}"></script> --}}

    <script>
        // function initRangeSlider() {
        //     const selectors = {
        //         elementClass: '.price-range-slider',
        //         minElement: '.price-range__min',
        //         maxElement: '.price-range__max'
        //     }

        //     document.querySelectorAll(selectors.elementClass).forEach($se => {
        //         // $se = sliderElement
        //         const currency = $se.dataset.currency;

        //         if ($se) {
        //         // eslint-disable-next-line no-undef
        //         const priceRange = new Slider($se, {
        //             tooltip_split: true,
        //             formatter: function(value) {
        //             return currency + value;
        //             },
        //         });

        //         priceRange.on('slideStop', (value) => {
        //             const $minEl = $se.parentElement.querySelector(selectors.minElement);
        //             const $maxEl = $se.parentElement.querySelector(selectors.maxElement);
        //             $minEl.innerText = currency + value[0];
        //             $maxEl.innerText = currency + value[1];
        //         });
        //         }
        //     });
        // }

        // initRangeSlider();

        // $(function(){
        //     $("input[name='price_range']").on('change', async function(){
        //         // console.log($(this).val());
        //         $('#filter_min').val($(this).val().split(',')[0]);
        //         $('#filter_max').val($(this).val().split(',')[1]);
        //         await sleep(2000);
        //         $('#filter_form').submit();
        //     });
        // });
    </script>

    {{-- <script>
        const slider = new Slider('#priceSlider', {
            min: 0,
            max: 1000,
            step: 10,
            value: [200, 700],
            range: true,
            tooltip: 'hide'
        });

        const priceLabel = document.getElementById('priceLabel');
        function updateLabel() {
            priceLabel.textContent = `$${slider.getValue()[0]} - $${slider.getValue()[1]}`;
        }

        updateLabel();
        slider.on('slide', updateLabel);
    </script> --}}
</body>
</html>