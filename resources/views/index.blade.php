@extends('layouts.app')

@section('content')
{{-- HERO START --}}
<div class="hero py-5">
    <div class="container py-5">
        <div class="row px-lg-5 px-md-3 align-items-center">
            <div class="col-lg-6 col-md-12 position-relative">
                @foreach ($slides as $slide)
                    <h1 class="heading dual-heading slider-title @if ($loop->first) active @endif">
                        <span class="text-secondary tagline">{{ $slide->tagline }}</span>
                        <span class="text-white fst-italic title">{{ $slide->title }}</span>
                    </h1>
                    <p class="text text-white subtitle @if ($loop->first) active @endif">{{ $slide->subtitle }}</p>
                @endforeach
                <div class="cta mb-5">
                    <a href="{{ route('shop.index') }}" class="btn btn-secondary rounded-pill">Order Delivery</a>
                    <a href="{{ route('shop.index') }}" class="btn rounded-pill">Order Pickup</a>
                </div>
                <div class="trusted-by d-flex flex-column gap-2">
                    <p class="text text-white mb-0">Trusted by</p>
                    <img src="{{ asset('assets/images/trusted-by-img.png') }}" alt="" style="width: fit-content">
                    <div class="d-flex gap-3 align-items-center">
                        <ul class="d-flex gap-1">
                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                            <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                            <li><img src="{{ asset('assets/images/star-half.svg') }}" alt=""></li>
                        </ul>
                        <p class="text text-white mb-0">4.5 (360 reviews)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 hero-img-container text-end">
                <img src="{{ asset('assets/images/hero-img-bg.svg') }}" class="hero-img hero-img-bg" alt="">
                @foreach ($slides as $slide)
                    <img src="{{ asset('uploads/slides') }}/{{ $slide->image }}" class="hero-img @if ($loop->first) active @endif" alt="">
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- HERO END --}}
{{-- CATEGORY SLIDER START --}}
<div class="category-slider bg-secondary py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center px-lg-5 px-md-3 mb-3">
            <h3 class="text-accent fw-bold">Categories</h3>
            <div class="sa-carousel-controls">
                <button class="btn sa-carousel-btn" id="prevBtn"><i class="fas fa-arrow-left"></i></button>
                <button class="btn sa-carousel-btn" id="nextBtn"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>

        <div class="sa-carousel-wrapper mb-3">
            <div class="sa-carousel-track px-lg-5 px-md-3" id="saCarouselTrack">
                <!-- Original 8 items -->
                @foreach ($categories as $category)
                <div class="sa-carousel-item">
                    <div class="sa-item-card">
                        <img src="{{ asset('uploads/categories') }}/{{ $category->image }}" alt="{{ $category->name }}" class="sa-item-image">
                        <span class="sa-item-label">{{ $category->name }}</span>
                    </div>
                </div>
                @endforeach

                <!-- Duplicated items for infinite loop -->
                @if (count($categories) > 8)
                    @foreach ($categories as $category)
                    <div class="sa-carousel-item">
                        <div class="sa-item-card">
                            <img src="{{ asset('uploads/categories') }}/{{ $category->image }}" alt="{{ $category->name }}" class="sa-item-image">
                            <span class="sa-item-label">{{ $category->name }}</span>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
{{-- CATEGORY SLIDER END --}}
{{-- ABOUT SECTION START --}}
<div class="about py-lg-5 py-md-3">
    <div class="container py-5">
        <div class="row px-lg-5 px-md-3 mb-lg-5 mb-md-3 align-items-center">
            <div class="col-md-4">
                <h2 class="dual-heading"><span>About</span> <span class="text-secondary fst-italic">Royal</span></h2>
            </div>
            <div class="col-md-8">
                <p>Embark on a culinary journey with a menu that showcases a captivating fusion of flavors. Our chefs use only the finest ingredients to create dishes that are more than just meals—they are unforgettable taste experiences.</p>
            </div>
        </div>
        <div class="row px-lg-5 px-md-3 mb-lg-5 mb-md-3 justify-content-between">
            <div class="col-lg-3 col-md-4">
                <img src="{{ asset('assets/images/trusted-badge.svg') }}" alt="">
                <h4 class="title">Authentic Taste & Premium Quanlity Blends</h4>
                <p class="text">Crafted using original regional recipes for real, homemade flavor. Every batch is freshly ground and quality-checked for consistency and rich color.</p>
                <a href="{{ route('about.index') }}" class="text-primary fw-bold">Read More <i class="fas fa-arrow-right-long"></i></a>
            </div>
            <div class="col-lg-3 col-md-4 about-img-container text-md-center">
                <img src="{{ asset('assets/images/about-img.png') }}" class="about-img" alt="">
            </div>
            <div class="col-lg-3 col-md-4">
                <img src="{{ asset('assets/images/eco-badge.svg') }}" alt="">
                <h4 class="title">100% Pure & Natural Ingredients</h4>
                <p class="text">No preservatives, no artificial colors, only hand-picked spices. Emphasize farm-fresh sourcing and traditional grinding methods to preserve aroma and nutrients.</p>
                <a href="{{ route('about.index') }}" class="text-primary fw-bold">Read More <i class="fas fa-arrow-right-long"></i></a>
            </div>
        </div>
        <div class="row px-lg-5 px-md-3 mb-lg-5 mb-md-3">
            <div class="col-12 text-center">
                <a href="{{ route('about.index') }}" class="btn btn-secondary rounded-pill cta">About Us</a>
            </div>
        </div>
    </div>
</div>
{{-- ABOUT SECTION END --}}
{{-- FEATURED PRODUCTS START --}}
<div class="featured-products bg-white py-5">
    <div class="container">
        <div class="d-flex px-lg-5 px-md-3 mb-lg-5 mb-md-3 align-items-center justify-content-center">
            <h3 class="dual-heading fw-bold"><span class="text-secondary fst-italic">Featured</span> Products</h3>
        </div>
        <div class="row align-items-stretch px-lg-5 px-md-3 mb-lg-5 mb-md-3 product-archive">
            @foreach ($fProducts as $fProduct)
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card product-item">
                        <a href="{{ route('shop.product.detail', $fProduct->slug) }}"><img src="{{ asset('uploads/products') }}/{{ $fProduct->product_meta['thumbnail'] }}" class="card-img-top" alt="{{ $fProduct->title }}" /></a>
                        <div class="card-body">
                            <div class="card-title d-flex justify-content-between">
                                <a href="{{ route('shop.product.detail', $fProduct->slug) }}"><h3 class="product-title fw-bold text-secondary">{{ $fProduct->title }}</h3></a>
                                <p class="product-price fw-bold text-secondary"><span>€</span> {{ $fProduct->getMinPrice() }}<span class="product-unit">/{{ $fProduct->getMinUnit() }} {{ $fProduct->product_meta['unit'] }}</span></p>
                            </div>
                            <p class="card-text product-short-description">{{ $fProduct->short_description }}</p>
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
                                <a href="{{ route('shop.product.detail', $fProduct->slug) }}" class="btn btn-primary product-add-to-cart-btn"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row px-lg-5 px-md-3 mb-lg-5 mb-md-3">
            <div class="col-12 text-center">
                <a href="{{ route('shop.index') }}" class="btn btn-secondary rounded-pill cta">View all products</a>
            </div>
        </div>
    </div>
</div>
{{-- FEATURED PRODUCTS END --}}
{{-- DEALS SECTION START --}}
<div class="deals bg-secondary py-5" style="background-image: url({{ asset('assets/images/deals-bg.png') }}); background-repeat: no-repeat; background-size: contain;">
    <div class="container">
        <div class="row px-lg-5 px-md-3 align-items-center justify-content-between">
            <div class="col-lg-4 col-md-6 mb-md-3">
                <img src="{{ asset('assets/images/deals-img.png') }}" class="w-100" alt="">
            </div>
            <div class="col-lg-6 col-md-6">
                <h3 class="dual-heading heading">
                    <span class="text-accent">Taste the Tradition <span class="deal-badge" style="background-image: url('{{ asset("assets/images/deal-badge.svg"); }}')">Offer</span></span>
                    <span class="text-primary fst-italic">with Royal</span>
                </h3>
                <p class="text-accent">Experience the perfect blend of authentic flavors and top-quality ingredients. At Royal, every dish is cooked with passion to bring you freshness and taste that feels like home.</p>
                <div class="cta mb-lg-5 mb-md-3">
                    <a href="{{ route('deal.index') }}" class="btn btn-primary rounded-pill">View Deal</a>
                    <a href="{{ route('shop.index') }}" class="btn bg-accent text-primary rounded-pill">Explore Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- DEALS SECTION END --}}
{{-- TOP SELLING PRODUCTS START --}}
<div class="top-selling bg-white py-5">
    <div class="container">
        <div class="row px-lg-5 px-md-3 mb-lg-5 mb-md-3">
            <div class="col-lg-5 col-md-12">
                <h2 class="dual-heading">
                    <span>Our Most</span>
                    <span class="text-secondary fst-italic">Loved Items</span>
                </h2>
            </div>
            <div class="col-lg-5 col-md-9">
                <p>Loved by everyone, these are the dishes our customers can’t get enough of full of flavor, freshness, and authentic taste.</p>
            </div>
            <div class="col-lg-2 col-md-3">
                <div class="text-md-right">
                    <button class="btn btn-primary" id="productSliderPrevBtn" data-target="#product-slider"><i class="fas fa-arrow-left"></i></button>
                    <button class="btn btn-primary" id="productSliderNextBtn" data-target="#product-slider"><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="row px-lg-5 px-md-3 mb-lg-5 mb-md-3 product-archive product-slider" id="product-slider">
            @foreach ($topSellingProducts as $topSellingProduct)
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card product-item">
                        <a href="{{ route('shop.product.detail', $topSellingProduct->slug) }}"><img src="{{ asset('uploads/products') }}/{{ $topSellingProduct->product_meta['thumbnail'] }}" class="card-img-top" alt="{{ $topSellingProduct->title }}" /></a>
                        <div class="card-body">
                            <div class="card-title d-flex justify-content-between">
                                <a href="{{ route('shop.product.detail', $topSellingProduct->slug) }}"><h3 class="product-title fw-bold text-secondary">{{ $topSellingProduct->title }}</h3></a>
                                <p class="product-price fw-bold text-secondary"><span>€</span> {{ $fProduct->getMinPrice() }}<span class="product-unit">/{{ $topSellingProduct->getMinUnit() }} {{ $topSellingProduct->product_meta['unit'] }}</span></p>
                            </div>
                            <p class="card-text product-short-description">{{ $topSellingProduct->short_description }}</p>
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
                                <a href="{{ route('shop.product.detail', $topSellingProduct->slug) }}" class="btn btn-primary product-add-to-cart-btn"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row px-lg-5 px-md-3 mb-lg-5 mb-md-3">
            <div class="col-12 text-center">
                <a href="{{ route('shop.index') }}" class="btn btn-secondary rounded-pill cta">View all products</a>
            </div>
        </div>
    </div>
</div>
{{-- TOP SELLING PRODUCTS END --}}
{{-- DELIVERY SERVICES START --}}
<div class="delivery-services py-5">
    <div class="container" style="max-width: 100% !important;">
        <div class="row px-lg-5 px-md-3 mb-lg-5 mb-md-3 justify-content-center">
            <div class="col-md-8 col-sm-12 text-center">
                <h3 class="dual-heading">
                    <span>Pickup and delivery</span>
                    <span class="text-secondary fst-italic">made simple</span>
                </h3>
                <p>Choose how you’d like to enjoy our authentic, freshly made meals.</p>
            </div>
        </div>
        <div class="row mb-lg-5 mb-md-3">
            <div class="col-md-6 px-lg-5 px-md-3 bg-secondary text-white text-center service-card d-flex align-items-center justify-content-center flex-column gap-2">
                <img src="{{ asset('assets/images/pickup-service.svg') }}" alt="">
                <h4 class="title">Pickup your meal</h4>
                <p class="text">Grab your food quickly from our restaurant and enjoy it wherever you want</p>
                <a href="{{ route('shop.index') }}" class="btn cta rounded-pill">Order Pickup</a>
            </div>
            <div class="col-md-6 px-lg-5 px-md-3 bg-primary text-white text-center service-card d-flex align-items-center justify-content-center flex-column gap-2">
                <img src="{{ asset('assets/images/delivery-service.svg') }}" alt="">
                <h4 class="title">Delivery to your doorstep</h4>
                <p class="text">Hot and fresh meals delivered straight to your home or office with care</p>
                <a href="{{ route('shop.index') }}" class="btn cta rounded-pill">Order Delivery</a>
            </div>
        </div>
    </div>
</div>
{{-- DELIVERY SERVICES END --}}
@endsection

@push('scripts')
    <script>
        // Hero Slider Auto-rotate with Fade Animation
        (function() {
            const sliderTitles = document.querySelectorAll('.slider-title');
            const subtitles = document.querySelectorAll('.subtitle');
            const heroImages = document.querySelectorAll('.hero-img:not(.hero-img-bg)');

            let currentIndex = 0;
            const slideInterval = 5000; // Change slide every 5 seconds

            function slideToNext() {
                // Remove active class from current elemetns
                sliderTitles[currentIndex].classList.remove('active');
                subtitles[currentIndex].classList.remove('active');
                heroImages[currentIndex].classList.remove('active');

                // Move to next index (loop back to 0 if at the end)
                currentIndex = (currentIndex + 1) % sliderTitles.length;

                // Add active class to next elements
                sliderTitles[currentIndex].classList.add('active');
                subtitles[currentIndex].classList.add('active');
                heroImages[currentIndex].classList.add('active');
            }

            // Start auto-sliding
            setInterval(slideToNext, slideInterval);
        })();

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

        // const productSliderPrevBtn = document.getElementById('productSliderPrevBtn');
        // const productSliderNextBtn = document.getElementById('productSliderNextBtn');

        // function scrollProductSlider(button, direction) {
        // const targetSelector = button.getAttribute('data-target');
        // const target = document.querySelector(targetSelector);

        // if (!target) return;

        // const sliderWidth = target.clientWidth; // width of visible area
        // const scrollAmount = sliderWidth * 0.9; // move by ~90% of visible width

        // if (direction === 'next') {
        //     target.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        // } else if (direction === 'prev') {
        //     target.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        // }
        // }

        // productSliderPrevBtn.addEventListener('click', (e) => scrollProductSlider(e.currentTarget, 'prev'));
        // productSliderNextBtn.addEventListener('click', (e) => scrollProductSlider(e.currentTarget, 'next'));

        const track = document.getElementById('saCarouselTrack');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        let currentIndex = 0;
        const totalItems = 8;
        let autoScrollInterval;

        function getItemWidth() {
            const items = document.querySelectorAll('.sa-carousel-item');
            const item = items[0];
            const style = window.getComputedStyle(item);
            const width = parseFloat(style.width);
            const margin = parseFloat(style.marginRight) || 0;
            return width + margin;
        }

        function scrollCarousel(direction) {
            clearAutoScroll();
            currentIndex += direction;
            updateCarouselPosition();
            // startAutoScroll();
        }

        function updateCarouselPosition() {
            const itemWidth = getItemWidth();
            const offset = currentIndex * itemWidth;
            track.style.transform = `translateX(-${offset}px)`;

            // Reset position for infinite loop
            if (currentIndex >= totalItems) {
                setTimeout(() => {
                    track.style.transition = 'none';
                    currentIndex = 0;
                    track.style.transform = `translateX(0)`;
                    setTimeout(() => {
                        track.style.transition = 'transform 0.6s ease-in-out';
                    }, 50);
                }, 600);
            } else if (currentIndex < 0) {
                setTimeout(() => {
                    track.style.transition = 'none';
                    currentIndex = totalItems - 1;
                    const offset = currentIndex * getItemWidth();
                    track.style.transform = `translateX(-${offset}px)`;
                    setTimeout(() => {
                        track.style.transition = 'transform 0.6s ease-in-out';
                    }, 50);
                }, 600);
            }
        }

        // function startAutoScroll() {
        //     autoScrollInterval = setInterval(() => {
        //         currentIndex++;
        //         updateCarouselPosition();
        //     }, 3000);
        // }

        function clearAutoScroll() {
            clearInterval(autoScrollInterval);
        }

        prevBtn.addEventListener('click', () => scrollCarousel(-1));
        nextBtn.addEventListener('click', () => scrollCarousel(1));

        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') scrollCarousel(-1);
            if (e.key === 'ArrowRight') scrollCarousel(1);
        });

        // startAutoScroll();
    </script>
@endpush
