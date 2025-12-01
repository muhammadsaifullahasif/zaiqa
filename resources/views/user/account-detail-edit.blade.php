<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

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
            {{-- DASHBOARD WRAPPER START --}}
            <div class="dashboard-wrapper py-lg-5 py-md-3">
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-12 text-center">
                            <div class="profile-avatar-wrapper">
                                <img src="{{ asset('images/avatar/user-1.png') }}" alt="">
                                <label for="profile-img">
                                    <i class="fas fa-camera-retro text-white fa-2x"></i>
                                    <input type="file" id="profile-img" style="display: none;">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- DASHBOARD WRAPPER WRAPPER END --}}
            {{-- ACCOUNT DETAIL START --}}
            <div class="account-detail-wrapper py-lg-5 py-md-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="contact-info mb-5">
                                <h3 class="fw-semibold mb-3">
                                    <img src="{{ asset('assets/images/checkout-contact-info.svg') }}" alt="">
                                    <span class="text-secondary">Contact Info</span>
                                </h3>
                                <div class="mb-2">
                                    <label for="full-name">Full Name</label>
                                    <input type="text" id="full-name" name="full-name" class="form-control form-control-lg" placeholder="Enter Your Name">
                                </div>
                                <div class="mb-2">
                                    <label for="phone-number">Phone Number</label>
                                    <input type="tel" id="phone-number" name="phone-number" class="form-control form-control-lg" placeholder="Enter Your Number">
                                </div>
                                <div class="mb-2">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter Your Email">
                                </div>
                            </div>

                            <div class="delivery-address active mb-5" id="delivery">
                                <h3 class="fw-semibold mb-3">
                                    <img src="{{ asset('assets/images/checkout-delivery-address.svg') }}" alt="">
                                    <span class="text-secondary">Delivery Address</span>
                                </h3>
                                <div class="row g-2">
                                    <div class="col-6 mb-2">
                                        <label for="city-town">City/Town</label>
                                        <input type="text" id="city-town" name="city-town" class="form-control form-control-lg" placeholder="Enter City/Town">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="postal-code">Postal Code</label>
                                        <input type="text" id="postal-code" name="postal-code" class="form-control form-control-lg" placeholder="Enter postal code">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" class="form-control form-control-lg" placeholder="Enter Your Address" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="payment-method mb-5">
                                <h3 class="fw-semibold mb-3">
                                    <img src="{{ asset('assets/images/checkout-payment-method.svg') }}" alt="">
                                    <span class="text-secondary">Payment Method</span>
                                </h3>
                                <div class="row align-items-stretch g-3 payment-gateway-list">
                                    <div class="col mb-2">
                                        <label for="sumup" class="sumup payment-gateway-item h-100 px-5 py-2 rounded d-flex flex-column align-items-center">
                                            <img src="{{ asset('assets/images/sum-up-icon.svg') }}" alt="">
                                            <p>SumUp</p>
                                            <input type="radio" id="sumup" name="payment-gateway" class="form-check-input">
                                        </label>
                                    </div>
                                    <div class="col mb-2">
                                        <label for="stripe" class="stripe payment-gateway-item h-100 px-5 py-2 rounded d-flex flex-column align-items-center">
                                            <img src="{{ asset('assets/images/stripe-icon.svg') }}" alt="">
                                            <p>Stripe</p>
                                            <input type="radio" id="stripe" name="payment-gateway" class="form-check-input" checked>
                                        </label>
                                    </div>
                                </div>
                                <div id="sumup" style="display: none;">SumUp</div>
                                <div id="stripe">
                                    <div class="mb-2">
                                        <label for="full-name">Full Name</label>
                                        <input type="text" id="full-name" name="full-name" class="form-control form-control-lg" placeholder="Name on card">
                                    </div>
                                    <div class="mb-2">
                                        <label for="card-number">Card Number</label>
                                        <input type="text" id="card-number" name="card-number" class="form-control form-control-lg" placeholder="0000-0000-0000-0000">
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-6 mb-2">
                                            <label for="expiry-date">Expiry Date</label>
                                            <input type="text" id="expiry-date" name="expiry-date" class="form-control form-control-lg" placeholder="MM/YY">
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="cvc">CVC</label>
                                            <input type="text" id="cvc" name="cvc" class="form-control form-control-lg" placeholder="000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ACCOUNT DETAIL END --}}
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

    <script>
        $(document).ready(function(){
            
        });
    </script>
</body>
</html>