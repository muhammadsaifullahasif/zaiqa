@extends('layouts.app')

@section('content')
{{-- HERO START --}}
<div class="contact-form bg-primary py-lg-5 py-md-3">
    <div class="container">
        <div class="row px-lg-5 px-md-3">
            <div class="col-lg-6 col-md-12 mb-3">
                <h1 class="heading dual-heading"><span class="text-secondary fst-italic">Get in touch</span> <span class="text-white">with us. We're here to assist you.</span></h1>
                <form action="#" class="form">
                    <div class="mb-3">
                        <label for="" class="form-label">Full Name</label>
                        <input type="text" placeholder="Enter Your Name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone Number</label>
                        <input type="tel" placeholder="Enter Your Number" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" placeholder="Enter Your Email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class='form-label'>Message</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Start Typing Your Message"></textarea>
                    </div>
                    <button class="btn btn-secondary rounded-pill" type="submit">Leave us a Message</button>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 hero-img-container text-end pt-lg-5">
                {{-- <img src="{{ asset('assets/images/hero-img-bg.svg') }}" class="hero-img hero-img-bg" alt=""> --}}
                <img src="{{ asset('assets/images/contact-hero-img.png') }}" class="w-100 contact-hero" alt="">
            </div>
        </div>
    </div>
</div>
{{-- HERO END --}}
{{-- OUR LOCATION START --}}
<div class="our-location py-5">
    <div class="container">
        <div class="d-flex flex-column px-lg-5 px-md-3 mb-lg-5 mb-md-3 align-items-center justify-content-center">
            <h3 class="dual-heading fw-bold"><span class="text-black">Our</span> <span class="text-primary">Location</span></h3>
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
