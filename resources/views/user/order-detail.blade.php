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
            {{-- ORDER DETAIL HEADER START --}}
            <div class="order-detail-header py-lg-5 py-md-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="dual-heading">
                                <span class="text-primary fst-italic">Track</span>
                                <span>Your Order</span>
                            </h2>
                            <p class="w-50 mx-auto">Stay updated with your delivery in real-time. See where your order is and when it will arrive — fresh from Royal to your doorstep.</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ORDER DETAIL HEADER END --}}
            {{-- ORDER DETAIL WRAPPER START --}}
            <div class="order-detail-wrapper py-lg-5 py-md-3">
                <div class="container">
                    <div class="track mb-5">
                        <div class="step @if ($order->order_status == 'processing' || $order->order_status == 'ready' || $order->order_status == 'completed') active @endif"> <span class="icon">1</span> <span class="text">Preparing</span> </div>
                        <div class="step @if ($order->order_status == 'ready' || $order->order_status == 'completed') active @endif"> <span class="icon">2</span> <span class="text">Order Ready</span> </div>
                        <div class="step @if ($order->order_status == 'completed') active @endif"> <span class="icon">3</span> <span class="text">Completed</span> </div>
                    </div>
                    <div class="order-status text-center my-3 mt-5">
                        <p class="text-primary">Estimated Delivery</p>
                        <h3 class="fw-bold text-secondary">Standard (8-12 hours)</h3>
                        @if ($order->order_status == 'processing')
                            <img src="{{ asset('assets/images/ready-for-dispatch.svg') }}" class="mb-3" alt="">
                            <h4 class="fw-bold">Ready for Dispatch</h4>
                        @elseif ($order->order_type == 'delivery' && $order->order_status == 'ready')
                            <img src="{{ asset('assets/images/on-the-way.svg') }}" class="mb-3" alt="">
                            <h4 class="fw-bold">Order On The Way</h4>
                        @elseif ($order->order_type == 'pickup' && $order->order_status == 'ready')
                            <img src="{{ asset('assets/images/ready-for-pickup.svg') }}" class="mb-3" alt="">
                            <h4 class="fw-bold">Ready For Pickup</h4>
                        @elseif ($order->order_status == 'completed')
                            <img src="{{ asset('assets/images/order-successfull.svg') }}" class="mb-3" alt="">
                            <h4 class="fw-bold">Order Delivered!</h4>
                        @endif
                    </div>
                    <div class="order-detail-list">
                        <div class="order-detail-item rounded-4 mb-3 row">
                            <div class="col-12 p-4 py-5">
                                <p class="d-flex justify-content-between align-items-center">
                                    <span>Order Number:</span>
                                    <strong>#{{ $order->id }} <i class="fas fa-copy text-primary"></i></strong>
                                </p>
                                <p class="d-flex justify-content-between align-items-center">
                                    <span>Date:</span>
                                    <strong>{{ \Carbon\Carbon::parse($order->created_at)->format('M d, Y') }}</strong>
                                </p>
                            </div>
                        </div>
                        <div class="order-detail-item rounded-4 mb-3 row">
                            <div class="col-lg-6 p-4 py-5">
                                <h4 class="text-secondary mb-3">Contact Info</h4>
                                <p class="d-flex justify-content-between align-items-center">
                                    <span>Full Name:</span>
                                    <span>{{ (!empty($order->order_address->first_name) || !empty($order->order_address->last_name)) ? ( ($order->order_address->first_name ?? '') . ' ' . ($order->order_address->last_name ?? '') ) : '' }}</span>
                                </p>
                                <p class="d-flex justify-content-between align-items-center">
                                    <span>Phone Number:</span>
                                    <span>{{ $order->order_address['phone'] ?? '' }}</span>
                                </p>
                                <p class="d-flex justify-content align-items-center">
                                    <span>Email:</span>
                                    <span>{{ $order->user['email'] ?? '' }}</span>
                                </p>
                            </div>
                            <div class="col-lg-6 p-4 py-5">
                                <h4 class="text-secondary mb-3">Delivery Address</h4>
                                <p class="d-flex justify-content-between align-items-center">
                                    <span>City/Town:</span>
                                    <span>{{ $order->order_address['city'] ?? '' }}</span>
                                </p>
                                <p class="d-flex justify-content-between align-items-center">
                                    <span>Zipcode:</span>
                                    <span>{{ $order->order_address['zipcode'] ?? '' }}</span>
                                </p>
                                <p class="d-flex justify-content-between align-items-center">
                                    <span>Address:</span>
                                    <span>{{ (!empty($order->order_address['address_1']) || !empty($order->order_address['address_2'])) ? ( ($order->order_address['address_1'] ?? '') . ' ' . ($order->order_address['address_2'] ?? '') ) : '' }}</span>
                                </p>
                            </div>
                            {{-- <div class="col-lg-4 p-4 py-5">
                                <h4 class="text-secondary mb-3">Payment Method</h4>
                                <p class="d-flex justify-content-between align-items-center">
                                    <span>Card Number:</span>
                                    <span>****-****-****-2416</span>
                                </p>
                                <p class="d-flex justify-content-between align-items-center">
                                    <span>Expire Date:</span>
                                    <span>03/24</span>
                                </p>
                                <p class="d-flex justify-content-between align-items-center">
                                    <span>CVC:</span>
                                    <span>***</span>
                                </p>
                            </div> --}}
                        </div>

                        <div class="order-detail-item order-summary rounded-4 mb-3 row">
                            <div class="col-12 p-4 py-5">
                                <h4 class="text-secondary">Order Summary</h4>
                                <div class="order-product-list py-2">
                                    @foreach ($order->order_items as $order_item)
                                        <div class="order-product-item mb-2 d-flex justify-content-between align-item-center">
                                            <p><strong>{{ $order_item->qty }}x</strong> {{ $order_item->order_item_meta['title'] }} {{ $order_item->order_item_meta['unit'] }}{{ $order_item->order_item_meta['unitSymbol'] }}</p>
                                            <p>{{ $order->transaction->transaction_meta['currency_symbol'] }}{{ ($order_item->order_item_meta['price'] * $order_item->qty) }}</p>
                                        </div>
                                    @endforeach
                                    {{-- <div class="order-product-item mb-2 d-flex justify-content-between align-item-center">
                                        <p><strong>1x</strong> Chicken Masala</p>
                                        <p>€40.99</p>
                                    </div>
                                    <div class="order-product-item mb-2 d-flex justify-content-between align-item-center">
                                        <p><strong>2x</strong> Beef Karahi Masala</p>
                                        <p>€80.99</p>
                                    </div>
                                    <div class="order-product-item mb-2 d-flex justify-content-between align-item-center">
                                        <p><strong>3x</strong> Tikka Masala</p>
                                        <p>€120.99</p>
                                    </div> --}}
                                    {{-- <div class="order-product-item mb-2 d-flex justify-content-between align-item-center">
                                        <p>Shipping fee</p>
                                        <p>Free</p>
                                    </div> --}}
                                </div>
                                <div class="order-summary-total d-flex justify-content-between align-item-center">
                                    <p>Subtotal</p>
                                    <p>({{ $order->transaction->transaction_meta['currency_symbol'] }}) {{ $order->transaction->transaction_meta['subtotal'] }}</p>
                                </div>
                                <div class="order-summary-total d-flex justify-content-between align-item-center">
                                    <p>Tax</p>
                                    <p>({{ $order->transaction->transaction_meta['currency_symbol'] }}) {{ $order->transaction->transaction_meta['tax'] }}</p>
                                </div>
                                <div class="order-summary-total d-flex justify-content-between align-item-center">
                                    <p>Total</p>
                                    <p>({{ $order->transaction->transaction_meta['currency_symbol'] }}) {{ $order->transaction->transaction_meta['total'] }}</p>
                                </div>
                                {{-- <div class="order-summary-total d-flex justify-content-between align-item-center">
                                    <strong>Total</strong>
                                    <strong>€240.99</strong>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-12 mb-3">
                            <div class="order-table mb-3">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Order Type</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-2 info">
                                                        <img src="{{ asset('gallery-1.png') }}" class="w-100 rounded" alt="">
                                                        <div class="detail">
                                                            <h4 class="title text-secondary">Chicken Masala</h4>
                                                            <p class="text">Delight in our Chicken Chop Fries...</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    3x
                                                </td>
                                                <td>
                                                    <p class="price">€40.99</p>
                                                </td>
                                                <td>Delivery</td>
                                                <td>10 August 2025</td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-secondary btn-lg rounded-pill">View <i class="fas fa-arrow-right-long"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-2 info">
                                                        <img src="{{ asset('gallery-1.png') }}" class="w-100 rounded" alt="">
                                                        <div class="detail">
                                                            <h4 class="title text-secondary">Chicken Masala</h4>
                                                            <p class="text">Delight in our Chicken Chop Fries...</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    3x
                                                </td>
                                                <td>
                                                    <p class="price">€40.99</p>
                                                </td>
                                                <td>Delivery</td>
                                                <td>10 August 2025</td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-secondary btn-lg rounded-pill">View <i class="fas fa-arrow-right-long"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-2 info">
                                                        <img src="{{ asset('gallery-1.png') }}" class="w-100 rounded" alt="">
                                                        <div class="detail">
                                                            <h4 class="title text-secondary">Chicken Masala</h4>
                                                            <p class="text">Delight in our Chicken Chop Fries...</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    2x
                                                </td>
                                                <td>
                                                    <p class="price">€40.99</p>
                                                </td>
                                                <td>Pick-up</td>
                                                <td>12 July 2025</td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-secondary btn-lg rounded-pill">View <i class="fas fa-arrow-right-long"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            {{-- ORDER DETAIL WRAPPER END --}}
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