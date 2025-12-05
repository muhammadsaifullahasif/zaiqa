@extends('layouts.app')

@section('content')
{{-- HERO START --}}
<div class="hero">
    <div class="container">
        <div class="row px-lg-5 px-md-3 align-items-center">
            <div class="col-lg-6 col-md-12">
                <h1 class="heading"><span class="text-white">About Us</span></h1>
                <p class="text text-white mb-0">Welcome to Royal, where the rich heritage of Pakistani cuisine meets exceptional hospitality. At Royal, we not only offer guests a culinary experience, but we also strive to create a connection to the heart and soul of Pakistan.</p>
                <p class="text text-white mb-0">The name Royal (pronounced Zay-ka) means "taste" or "aroma" in Urdu and perfectly embodies our mission—to bring you the authentic, vibrant, and unforgettable flavors of Pakistan. Our menu is a tribute to the diverse and flavorful traditional cuisine of Pakistan.</p>
                <div class="cta mb-5">
                    <a href="#" class="btn btn-secondary rounded-pill">Order Delivery</a>
                    <a href="#" class="btn rounded-pill">Order Pickup</a>
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
            <div class="col-lg-6 col-md-12 hero-img-container text-end pt-lg-5">
                <img src="{{ asset('assets/images/hero-img-bg.svg') }}" class="hero-img hero-img-bg" alt="">
                <img src="{{ asset('assets/images/about-hero-img.png') }}" class="hero-img" alt="">
            </div>
        </div>
    </div>
</div>
{{-- HERO END --}}
{{-- CATEGORY SLIDER START --}}
<div class="about-category bg-secondary py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center px-lg-5 px-md-3">
            <span>Kitchen King</span>
            <img src="{{ asset('assets/images/diamond.svg') }}" alt="">
            <span>Zest of Royal</span>
            <img src="{{ asset('assets/images/diamond.svg') }}" alt="">
            <span>Flame & Flavor</span>
            <img src="{{ asset('assets/images/diamond.svg') }}" alt="">
            <span>BBQ Grill Mix</span>
            <img src="{{ asset('assets/images/diamond.svg') }}" alt="">
            <span>Royal Karahi</span>
        </div>
    </div>
</div>
{{-- CATEGORY SLIDER END --}}
{{-- ABOUT SECTION START --}}
<div class="about py-lg-5 py-md-3">
    <div class="container py-5">
        <div class="row px-lg-5 px-md-3 mb-lg-5 mb-md-3 align-items-center">
            <div class="col-md-4">
                <h2 class="dual-heading"><span>Our top</span> <span class="text-secondary fst-italic">specialties</span></h2>
            </div>
            <div class="col-md-8">
                <p>From rich aromatic masalas to perfectly balanced spice blends, every product is crafted with precision and passion. Each blend captures the essence of authentic Pakistani flavors a taste of tradition in every pinch.</p>
            </div>
        </div>
        <div class="row px-lg-5 px-md-3 mb-lg-5 mb-md-3 justify-content-between">
            <div class="col-lg-3 col-md-4">
                <img src="{{ asset('assets/images/our-experts.svg') }}" alt="">
                <h4 class="title text-primary">Our experts</h4>
                <p class="text text-primary">Our spice experts are trained in traditional Pakistani techniques, mastering the art of blending herbs and spices for consistent aroma, flavor, and freshness.</p>
            </div>
            <div class="col-lg-3 col-md-4">
                <img src="{{ asset('assets/images/selection-of-ingredients.svg') }}" alt="">
                <h4 class="title text-primary">Selection of ingredients</h4>
                <p class="text text-primary">We handpick the finest raw spices from trusted farms in Pakistan, ensuring every grain and leaf carries the natural richnesss and purity of our homeland.</p>
            </div>
            <div class="col-lg-3 col-md-4">
                <img src="{{ asset('assets/images/our-pride.svg') }}" alt="">
                <h4 class="title text-primary">Our pride</h4>
                <p class="text text-primary">We take pride in offering 100% pure, halal-certified and preservative-free spices bringing the real taste of Pakistan to your kitchen.</p>
            </div>
        </div>
    </div>
</div>
{{-- ABOUT SECTION END --}}
{{-- OUR LOCATION START --}}
<div class="our-location py-5">
    <div class="container">
        <div class="d-flex flex-column px-lg-5 px-md-3 mb-lg-5 mb-md-3 align-items-center justify-content-center">
            <h3 class="dual-heading fw-bold"><span class="text-black">Our</span> <span class="text-primary fst-italic">Location</span></h3>
            <p>Visit us and experience the rich flavors of Royal, freshly made and served with love.</p>
        </div>
        <div class="row align-items-stretch px-lg-5 px-md-3 mb-lg-5 mb-md-3 product-archive">
            <div class="col-12 mb-3">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2630.062020391962!2d11.419831476842239!3d48.76161190751169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479effa0af2b28d5%3A0xe1b672233c3a3d9b!2sZaiqa%20Restaurant!5e0!3m2!1sen!2s!4v1762461204043!5m2!1sen!2s" style="border:0; height: 850px; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
{{-- OUR LOCATION END --}}
@endsection
