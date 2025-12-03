<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{ url('/') }}/">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.min.css') }}">
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
            {{-- PRODUCT SUMMARY START --}}
            <div class="single-product-summary py-lg-5 py-md-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="product-single__media" data-media-type="vertical-thumbnail">
                                <div class="product-single__image">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="h-auto" src="{{ asset('uploads/products') }}/{{ $product->product_meta['thumbnail'] }}" width="674" height="674" alt="{{ $product->title }}" />
                                                <a data-fancybox="gallery" href="{{ asset('uploads/products') }}/{{ $product->product_meta['thumbnail'] }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="7" cy="7" r="5"></circle>
                                                        <line x1="11" y1="11" x2="15" y2="15"></line>
                                                    </svg>
                                                </a>
                                            </div>
                                            @foreach (explode(',', $product->product_meta['gallery']) as $image)
                                                <div class="swiper-slide product-single__image-item">
                                                    <img loading="lazy" class="h-auto" src="{{ asset('uploads/products') }}/{{ $image }}" width="674" height="674" alt="{{ $product->title }}" />
                                                    <a data-fancybox="gallery" href="{{ asset('uploads/products') }}/{{ $image }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                                                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="7" cy="7" r="5"></circle>
                                                            <line x1="11" y1="11" x2="15" y2="15"></line>
                                                        </svg>
                                                    </a>
                                                </div>
                                            @endforeach
                                            {{-- <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="h-auto" src="{{ asset('product-main.png') }}" width="674" height="674" alt="" />
                                                <a data-fancybox="gallery" href="{{ asset('product-main.png') }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="7" cy="7" r="5"></circle>
                                                        <line x1="11" y1="11" x2="15" y2="15"></line>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="h-auto" src="{{ asset('gallery-1.png') }}" width="674" height="674" alt="" />
                                                <a data-fancybox="gallery" href="{{ asset('gallery-1.png') }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="7" cy="7" r="5"></circle>
                                                        <line x1="11" y1="11" x2="15" y2="15"></line>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="h-auto" src="{{ asset('gallery-2.png') }}" width="674" height="674" alt="" />
                                                <a data-fancybox="gallery" href="{{ asset('gallery-2.png') }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="7" cy="7" r="5"></circle>
                                                        <line x1="11" y1="11" x2="15" y2="15"></line>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="h-auto" src="{{ asset('gallery-3.png') }}" width="674" height="674" alt="" />
                                                <a data-fancybox="gallery" href="{{ asset('gallery-3.png') }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="7" cy="7" r="5"></circle>
                                                        <line x1="11" y1="11" x2="15" y2="15"></line>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="h-auto" src="{{ asset('gallery-4.png') }}" width="674" height="674" alt="" />
                                                <a data-fancybox="gallery" href="{{ asset('gallery-4.png') }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="7" cy="7" r="5"></circle>
                                                        <line x1="11" y1="11" x2="15" y2="15"></line>
                                                    </svg>
                                                </a>
                                            </div> --}}
                                        </div>
                                        <div class="swiper-button-prev">
                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 1L3 5.5L7 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="swiper-button-next">
                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 1L8 5.5L4 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-single__thumbnail">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="" src="{{ asset('uploads/products') }}/{{ $product->product_meta['thumbnail'] }}" width="104" height="104" alt="" />
                                            </div>
                                            @foreach (explode(',', $product->product_meta['gallery']) as $image)
                                                <div class="swiper-slide product-single__image-item">
                                                    <img loading="lazy" class="" src="{{ asset('uploads/products/thumbnails') }}/{{ $image }}" width="104" height="104" alt="" />
                                                </div>
                                            @endforeach
                                            {{-- <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="" src="{{ asset('product-main.png') }}" width="104" height="104" alt="" />
                                            </div>
                                            <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="" src="{{ asset('gallery-1.png') }}" width="104" height="104" alt="" />
                                            </div>
                                            <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="" src="{{ asset('gallery-2.png') }}" width="104" height="104" alt="" />
                                            </div>
                                            <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="" src="{{ asset('gallery-3.png') }}" width="104" height="104" alt="" />
                                            </div>
                                            <div class="swiper-slide product-single__image-item">
                                                <img loading="lazy" class="" src="{{ asset('gallery-4.png') }}" width="104" height="104" alt="" />
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            <div class="product-summary">
                                <h1 class="title">{{ $product->title }}</h1>
                                <p class="text">{{ $product->short_description }}</p>
                                <div class="price-container">
                                    @if ($product->isOnSale())
                                        <span class="price">€ 
                                            <span>
                                                @if ($product->variations_count > 1)
                                                    {{ $product->getMinSalePrice() }}-{{ $product->getMaxSalePrice() }}
                                                @else
                                                    {{ $product->getSalePrice() }}
                                                @endif
                                            </span>
                                        </span>
                                        <span class="regular-price"><s>€ 
                                            <span>
                                                @if ($product->variations_count > 1)
                                                    {{ $product->getMinRegularPrice() }}-{{ $product->getMaxRegularPrice() }}
                                                @else
                                                @endif
                                            </span>
                                        </s></span>
                                    @else
                                        <span class="price">€ 
                                            <span>
                                                @if ($product->variations_count > 1)
                                                    {{ $product->getMinPrice() }}-{{ $product->getMaxPrice() }}
                                                @else
                                                    {{ $product->getPrice() }}                                                
                                                @endif
                                            </span>
                                        </span>
                                    @endif
                                </div>
                                <p class="text">Limited Time Offer Free Delivery On Orders €35+</p>

                                <div class="product-review d-flex align-items-center gap-2 mb-5">
                                    <ul class="d-flex align-items-center list-unstyled mb-0">
                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                        <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                        <li><img src="{{ asset('assets/images/star-half.svg') }}" alt=""></li>
                                    </ul>
                                    <p class="mb-0">4.5 (360 reviews)</p>
                                </div>

                                <div class="add-to-cart-form">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                        <!-- Variations Selection -->
                                        <div class="mb-3">
                                            @foreach ($product->variations as $index => $variation)
                                                @php
                                                    $unit = $variation->product_meta['unit'] ?? '';
                                                    $unitSymbol = $variation->product_meta['unit_symbol'] ?? 'g';
                                                    $price = $variation->product_meta['price'] ?? 0;
                                                    $salePrice = $variation->product_meta['sale_price'] ?? '';
                                                    $regularPrice = $variation->product_meta['regular_price'] ?? 0;
                                                    $quantity = $variation->product_meta['quantity'] ?? 0;
                                                @endphp
                                                <div class="form-check form-check-inline variation-option">
                                                    <input 
                                                        type="radio"
                                                        name="variation_id"
                                                        id="variation-{{ $variation->id }}"
                                                        class="form-check-input variation-input"
                                                        value="{{ $variation->id }}"
                                                        data-price="{{ $price }}"
                                                        data-sale-price="{{ $salePrice }}"
                                                        data-regular-price="{{ $regularPrice }}"
                                                        data-unit="{{ $unit }}"
                                                        data-unit-symbol="{{ $unitSymbol }}"
                                                        data-quantity="{{ $quantity }}"
                                                        {{ $index === 0 ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <label for="variation-{{ $variation->id }}" class="form-check-label">{{ $unit }}{{ $unitSymbol }}</label>
                                                </div>
                                            @endforeach
                                            {{-- <div class="form-check form-check-inline">
                                                <input type="radio" name="product-variation" id="small-pack" class="form-check-input" checked>
                                                <label for="small-pack" class="form-check-label">Small Pack</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="product-variation" id="medium-pack" class="form-check-input">
                                                <label for="medium-pack" class="form-check-label">Medium Pack</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="product-variation" id="large-pack" class="form-check-input">
                                                <label for="large-pack" class="form-check-label">Large Pack</label>
                                            </div> --}}
                                        </div>
                                        <div class="mb-3" id="variation-price-container">
                                            <span class="fw-bold text-primary">€ <span id="variation-price">{{ $product->variations[0]->product_meta['price'] }}</span></span>
                                        </div>
                                        <div class="product-quantity mb-3">
                                            <button class="btn quantity-decrement" type="button">-</button>
                                            <input type="number" id="quantity" name="quantity" class="quantity text-center" value="1" min="1">
                                            <button class="btn quantity-increment" type="button">+</button>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary product-add-to-cart-btn w-100">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- PRODUCT SUMMARY END --}}
            {{-- PRODUCT DESCRIPTION START --}}
            <div class="single-product-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="heading mb-3">
                                <img src="{{ asset('images/ingredients-and-flavors.svg') }}" alt="">
                                <h4 class="title">Ingredients & Flavors</h4>
                            </div>
                            <div class="text">
                                {!! $product->description !!}
                                {{-- <p>Indulge in our Chicken Chop Fries, a perfect fusion of flavor and comfort. Each serving features succulent, boneless chicken fillet, marinated in a blend of black pepper, garlic, soy sauce, and light herbs, then grilled to juicy perfection. The tender chicken is topped with our rich black pepper sauce, made from freshly crushed peppercorns and a creamy base that adds a bold, aromatic kick.</p> --}}
                                {{-- <p>Served with a side of crispy golden fries and a colorful mix of steamed vegetables — including carrots, beans, and corn — this meal is both hearty and wholesome. Carefully packed in a takeaway-friendly container, it stays hot, fresh, and ready to enjoy anytime, anywhere.</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- PRODUCT DESCRIPTION END --}}
            {{-- PRODUCT REVIEWS START --}}
            <div class="single-product-reviews">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="heading mb-3">
                                <img src="{{ asset('images/product-reviews.svg') }}" alt="">
                                <h4 class="title">Product Reviews</h4>
                            </div>
                            <div class="reviews-list mb-3">
                                <div class="review-item">
                                    <div class="author mb-3">
                                        <img src="{{ asset('images/avatar/user-1.png') }}" alt="">
                                        <div class="info">
                                            <h5>Abdul Wasi</h5>
                                            <p>California, USA</p>
                                        </div>
                                    </div>
                                    <div class="product-review d-flex align-items-center gap-2 mb-3">
                                        <ul class="d-flex align-items-center list-unstyled mb-0">
                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                            <li><img src="{{ asset('assets/images/star-half.svg') }}" alt=""></li>
                                        </ul>
                                    </div>
                                    <p class="text">“The food at Royal was fresh, flavorful, and perfectly cooked. Each dish had a rich, authentic taste that made the experience truly satisfying. You can feel the passion and care in every bite”</p>
                                </div>
                                <div class="review-item">
                                    <div class="author mb-3">
                                        <img src="{{ asset('images/avatar/user-1.png') }}" alt="">
                                        <div class="info">
                                            <h5>Abdul Wasi</h5>
                                            <p>California, USA</p>
                                        </div>
                                    </div>
                                    <div class="product-review d-flex align-items-center gap-2 mb-3">
                                        <ul class="d-flex align-items-center list-unstyled mb-0">
                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                            <li><img src="{{ asset('assets/images/star-half.svg') }}" alt=""></li>
                                        </ul>
                                    </div>
                                    <p class="text">“The food at Royal was fresh, flavorful, and perfectly cooked. Each dish had a rich, authentic taste that made the experience truly satisfying. You can feel the passion and care in every bite”</p>
                                </div>
                                <div class="review-item">
                                    <div class="author mb-3">
                                        <img src="{{ asset('images/avatar/user-1.png') }}" alt="">
                                        <div class="info">
                                            <h5>Abdul Wasi</h5>
                                            <p>California, USA</p>
                                        </div>
                                    </div>
                                    <div class="product-review d-flex align-items-center gap-2 mb-3">
                                        <ul class="d-flex align-items-center list-unstyled mb-0">
                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                            <li><img src="{{ asset('assets/images/star-half.svg') }}" alt=""></li>
                                        </ul>
                                    </div>
                                    <p class="text">“The food at Royal was fresh, flavorful, and perfectly cooked. Each dish had a rich, authentic taste that made the experience truly satisfying. You can feel the passion and care in every bite”</p>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg" type="button">Load all reviews</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- PRODUCT REVIEWS END --}}
            {{-- RELATED PRODUCTS START --}}
            <div class="top-selling py-5">
                <div class="container">
                    <div class="d-flex justify-content-between px-lg-5 px-md-3 mb-lg-5 mb-md-3">
                        <div class="">
                            <h2 class="dual-heading">
                                <span class="text-secondary">Similar</span>
                                <span class="text-primary fst-italic">Products</span>
                            </h2>
                        </div>
                        <div class="">
                            <div class="text-md-right">
                                <button class="btn btn-primary" id="productSliderPrevBtn" data-target="#product-slider"><i class="fas fa-arrow-left"></i></button>
                                <button class="btn btn-primary" id="productSliderNextBtn" data-target="#product-slider"><i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row px-lg-5 px-md-3 mb-lg-5 mb-md-3 product-archive product-slider" id="product-slider">
                        @foreach ($rProducts as $rProduct)
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="card product-item bg-transparent">
                                    <a href="{{ route('shop.product.detail', $rProduct->slug) }}"><img src="{{ asset('uploads/products/thumbnails') }}/{{ $rProduct->product_meta['thumbnail'] }}" class="card-img-top" alt="{{ $rProduct->title }}" /></a>
                                    <div class="card-body">
                                        <div class="card-title d-flex justify-content-between">
                                            <a href="{{ route('shop.product.detail', $rProduct->slug) }}"><h3 class="product-title fw-bold text-secondary">{{ $rProduct->title }}</h3></a>
                                            <p class="product-price fw-bold text-secondary"><span>€</span> {{ $product->getMinPrice() }}<span class="product-unit">/{{ $product->getMinUnit() }} {{ $product->product_meta['unit'] }}</span></p>
                                        </div>
                                        <p class="card-text product-short-description">{{ $rProduct->short_description }}</p>
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
                                            <a href="{{ route('shop.product.detail', $rProduct->slug) }}" class="btn btn-primary product-add-to-cart-btn"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="col-lg-4 col-md-6 mb-3">
                            <div class="card product-item bg-transparent">
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
                            <div class="card product-item bg-transparent">
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
                            <div class="card product-item bg-transparent">
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
                            <div class="card product-item bg-transparent">
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
                            <div class="card product-item bg-transparent">
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
                            <div class="card product-item bg-transparent">
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
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="card product-item bg-transparent">
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
                            <div class="card product-item bg-transparent">
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
                            <div class="card product-item bg-transparent">
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
                            <div class="card product-item bg-transparent">
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
                            <div class="card product-item bg-transparent">
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
                            <div class="card product-item bg-transparent">
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
                </div>
            </div>
            {{-- RELATED PRODUCTS END --}}
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
    <script src="{{ asset('assets/js/plugins/bootstrap-slider.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="{{ asset('assets/js/plugins/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/product-gallery.js') }}"></script>

    <script>
        Fancybox.bind('[data-fancybox="gallery"]', { Thumbs: false });

        $(document).ready(function(){
            $("input[name='variation_id']").change(function(){
                var $checked = $("input[name='variation_id']:checked");
                var price = $checked.attr('data-price');
                $('#variation-price-container').removeClass('d-none');
                $('#variation-price-container #variation-price').html(price);

            });

            $(document).on('click', '.quantity-increment', function(e){
                e.preventDefault();
                const input = $(this).siblings('.quantity');
                let value = parseInt(input.val());
                input.val(value + 1);
            });

            $(document).on('click', '.quantity-decrement', function(e){
                e.preventDefault();
                const input = $(this).siblings('.quantity');
                let value = parseInt(input.val());
                const min = parseInt(input.attr('min')) || 1;
                if (value > min) {
                    input.val(value - 1);
                }
            });
        });

        const productSliderPrevBtn = document.getElementById('productSliderPrevBtn');
        const productSliderNextBtn = document.getElementById('productSliderNextBtn');

        function scrollProductSlider(button, direction) {
        const targetSelector = button.getAttribute('data-target');
        const target = document.querySelector(targetSelector);

        if (!target) return;

        // Get one slide width dynamically (first child width + margin)
        const firstItem = target.querySelector('div');
        if (!firstItem) return;

        const itemStyle = getComputedStyle(firstItem);
        const itemWidth = firstItem.offsetWidth + parseFloat(itemStyle.marginRight);

        const scrollAmount = direction === 'next' ? itemWidth : -itemWidth;

        target.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }

        productSliderPrevBtn.addEventListener('click', (e) => scrollProductSlider(e.currentTarget, 'prev'));
        productSliderNextBtn.addEventListener('click', (e) => scrollProductSlider(e.currentTarget, 'next'));
    </script>
</body>
</html>