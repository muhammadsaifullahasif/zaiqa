@extends('layouts.app')

@section('content')
{{-- CHECKOUT HEADER START --}}
<div class="checkout-header py-lg-5 py-md-3">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="dual-heading">
                    <span>Checkout</span>
                </h2>
                <p>Review your dishes before checkout and get ready to enjoy the fresh taste of Royal at your doorstep.</p>
            </div>
        </div>
    </div>
</div>
{{-- CHECKOUT HEADER END --}}
{{-- CHECKOUT SUMMARY START --}}
<div class="checkout-summary-wrapper py-lg-5 py-md-3">
    <div class="container">
        <div class="row">
            <form action="{{ route('checkout.place.order') }}" method="POST" id="checkout-form" class="col-lg-8 mb-3">
                @csrf
                <div class="contact-info mb-5">
                    <h3 class="fw-semibold mb-3">
                        <img src="{{ asset('assets/images/checkout-contact-info.svg') }}" alt="">
                        <span class="text-secondary">Contact Info</span>
                    </h3>
                    <div class="mb-2">
                        <label for="full-name">Full Name</label>
                        <input type="text" id="full-name" name="name" value="{{ (!empty($address->first_name) || !empty($address->last_name)) ? ( ($address->first_name ?? '') . ' ' . ($address->last_name ?? '') ) : '' }}" class="form-control form-control-lg" placeholder="Enter Your Name" required>
                    </div>
                    <div class="mb-2">
                        <label for="phone-number">Phone Number</label>
                        <input type="tel" id="phone-number" name="phone" value="{{ $address->phone ?? '' }}" class="form-control form-control-lg" placeholder="Enter Your Number" required>
                    </div>
                    <div class="mb-2">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{ Auth::user()->email ?? '' }}" placeholder="Enter Your Email" required>
                    </div>
                </div>

                <div class="delivery-type mb-5">
                    <div class="d-flex gap-3">
                        <button class="btn btn-secondary btn-lg rounded-pill" id="delivery-btn" type="button">Order Delivery</button>
                        <button class="btn btn-primary btn-lg rounded-pill" id="pickup-btn" type="button">Order Pickup</button>
                    </div>
                    <input type="hidden" name="order_type" id="order_type" value="delivery">
                </div>

                <div class="delivery-address active mb-5" id="delivery">
                    <h3 class="fw-semibold mb-3">
                        <img src="{{ asset('assets/images/checkout-delivery-address.svg') }}" alt="">
                        <span class="text-secondary">Delivery Address</span>
                    </h3>
                    <div class="mb-2">
                        <label for="delivery-time-slot">Delivery Time Slots</label>
                        <select name="delivery_time_slot" id="delivery-time-slot" class="form-control form-control-lg">
                            @foreach ($timeSlots as $slot)
                                <option value="{{ $slot }}">{{ $slot }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row g-2">
                        <div class="col-6 mb-2">
                            <label for="city-town">City/Town</label>
                            <input type="text" id="city-town" name="city_town" value="{{ $address->city ?? '' }}" class="form-control form-control-lg" placeholder="Enter City/Town">
                        </div>
                        <div class="col-6 mb-2">
                            <label for="zipcode">Zipcode</label>
                            <input type="text" id="zipcode" name="zipcode" value="{{ $address->zipcode ?? '' }}" class="form-control form-control-lg" placeholder="Enter zipcode">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control form-control-lg" placeholder="Enter Your Address" rows="5">{{ (!empty($address->address_1) || !empty($address->address_2)) ? ( ($address->address_1 ?? '') . ' ' . ($address->address_2 ?? '') ) : '' }}</textarea>
                    </div>
                </div>

                <div class="pickup-address mb-5" id="pickup">
                    <h3 class="fw-semibold mb-3">
                        <img src="{{ asset('assets/images/checkout-delivery-address.svg') }}" alt="">
                        <span class="text-secondary">Pickup Address</span>
                    </h3>
                    <div class="mb-2">
                        <p>Address | B.d Schleifmühle 34, 85049 Ingolstadt</p>
                        <a href="#" class="text-primary fw-bold">View larger map <i class="fas fa-arrow-right-long"></i></a>
                    </div>
                    <div class="mb-2">
                        <label for="pickup-time">Select Pickup Time</label>
                        <select name="pickup_time" id="pickup-time" class="form-control form-control-lg">
                            @foreach ($timeSlots as $slot)
                                <option value="{{ $slot }}">{{ $slot }}</option>
                            @endforeach
                        </select>
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
                                <input type="radio" id="sumup" value="sumup" name="payment_gateway" class="form-check-input">
                            </label>
                        </div>
                        <div class="col mb-2">
                            <label for="stripe" class="stripe payment-gateway-item h-100 px-5 py-2 rounded d-flex flex-column align-items-center">
                                <img src="{{ asset('assets/images/stripe-icon.svg') }}" alt="">
                                <p>Stripe</p>
                                <input type="radio" id="stripe" value="stripe" name="payment_gateway" class="form-check-input" checked>
                            </label>
                        </div>
                    </div>
                    <div id="sumup" style="display: none;">SumUp</div>
                    <div id="stripe">
                        <div class="mb-2">
                            <label for="full-name">Full Name</label>
                            <input type="text" id="full-name" name="full_name" class="form-control form-control-lg" placeholder="Name on card">
                        </div>
                        <div class="mb-2">
                            <label for="card-number">Card Number</label>
                            <input type="text" id="card-number" name="card_number" class="form-control form-control-lg" placeholder="0000-0000-0000-0000">
                        </div>
                        <div class="row g-2">
                            <div class="col-6 mb-2">
                                <label for="expiry-date">Expiry Date</label>
                                <input type="text" id="expiry-date" name="expiry_date" class="form-control form-control-lg" placeholder="MM/YY">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="cvc">CVC</label>
                                <input type="text" id="cvc" name="cvc" class="form-control form-control-lg" placeholder="000">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-lg-4 mb-3">
                <div class="checkout-summary card rounded-4 bg-primary">
                    <div class="card-body rounded-3 bg-accent m-3 mb-0">
                        <div class="d-flex justify-content-between align-item-center estimated-delivery">
                            <div class="d-flex flex-column justify-content-center">
                                <p>Estimated Delivery</p>
                                <h5 class="fw-bold">Standard (20-30 mins)</h5>
                            </div>
                            <img src="{{ asset('assets/images/cart-summary-delivery.svg') }}" alt="">
                        </div>
                        <div class="order-summary">
                            <h6 class="fw-semibold">Order Summary</h6>
                            <div class="order-product-list py-2">
                                @foreach ($items as $item)
                                    <div class="order-product-item mb-2 d-flex justify-content-between align-item-center">
                                        <p><strong>{{ $item->qty }}x</strong> {{ $item->name }} {{ $item->options['unit'] }}{{ $item->model->product_meta['unit'] }}</p>
                                        <p>€{{ $item->subTotal() }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="order-summary-total d-flex justify-content-between align-item-center">
                                <p>Tax</p>
                                <p>€{{ Cart::instance('cart')->tax() }}</p>
                            </div>
                            <div class="order-summary-total d-flex justify-content-between align-item-center">
                                <p>Total</p>
                                <p>€{{ Cart::instance('cart')->total() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="checkout-form-btn" class="btn btn-secondary w-100">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- CHECKOUT SUMMARY END --}}
{{-- ORDER SUCCESSFULL START --}}
@if ($order)
    <div class="modal fade order-successfull" id="order-successfull-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-body text-center rounded-5 bg-accent">
                    <img src="{{ asset('assets/images/order-successfull.svg') }}" alt="">
                    <h4>Order Placed Successfully!</h4>
                    <p>Thank you for choosing Royal. Your order is confirmed and being prepared with care — you'll receive it fresh and hot soon!</p>
                    <div class="order-detail rounded-3 p-3 mb-3">
                        <p class="d-flex justify-content-between align-item-center">
                            <span>Order Number:</span>
                            <strong>#{{ $order->id }} <i class="fas fa-copy text-secondary"></i></strong>
                        </p>
                        <p class="d-flex justify-content-between align-item-center">
                            <span>Estimated Delivery:</span>
                            <strong>30-45 mintues</strong>
                        </p>
                    </div>
                    <div class="order-detail rounded-3 p-3 mb-3">
                        <h6 class="fw-semibold">Order Summary</h6>
                        <div class="order-product-list py-2">
                            @foreach ($order->order_items as $item)
                                <div class="order-product-item mb-2 d-flex justify-content-between align-item-center">
                                    <p><strong>{{ $item->qty }}x</strong> {{ $item->order_item_meta['title'] }} {{ $item->order_item_meta['unit'] }}{{ $item->order_item_meta['unitSymbol'] }}</p>
                                    <p>({{ $order->transaction->transaction_meta['currency_symbol'] }}) {{ ($item->qty * $item->order_item_meta['price']) }}</p>
                                </div>
                            @endforeach
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
                    </div>
                    <div class="row g-2">
                        <div class="col">
                            <a href="{{ route('user.order.detail', $order->id) }}" class="btn btn-primary btn-lg w-100 rounded-pill">Track Order</a>
                        </div>
                        <div class="col">
                            <a href="{{ route('shop.index') }}" class="btn btn-secondary btn-lg w-100 rounded-pill">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
{{-- ORDER SUCCESSFULL END --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            @if ($order)
                $('#order-successfull-modal').modal('show');
            @endif
            // Form Validation
            $('#checkout-form').on('submit', function(e) {
                let errors = [];

                // 1. Full name is required
                const name = $('input[name="name"]').val().trim();
                if (!name) {
                    errors.push('Full name is required');
                }

                // 2. Phone number is required
                const phone = $('input[name="phone"]').val().trim();
                if (!phone) {
                    errors.push('Phone number is required');
                }

                // 3. Email is required
                const email = $('input[name="email"]').val().trim();
                if (!email) {
                    errors.push('Email is required');
                }

                var order_type = $('input[name="order_type"]').val().trim();

                if (order_type === 'delivery') {
                    // 4. Delivery time slot is required
                    const delivery_time_slot = $('select[name="delivery_time_slot"]').val().trim();
                    if (!delivery_time_slot) {
                        errors.push('Delivery time slot is required');
                    }

                    // 5. City is required
                    const city_town = $('input[name="city_town"]').val().trim();
                    if (!city_town) {
                        errors.push('City/town is required');
                    }

                    // 6. Zipcode is required
                    const zipcode = $('input[name="zipcode"]').val().trim();
                    if (!zipcode) {
                        errors.push('Zipcode is required');
                    }

                    // 7. Address is required
                    const address = $('textarea[name="address"]').val().trim();
                    if (!address) {
                        errors.push('Address is required');
                    }
                } else if (order_type === 'pickup') {
                    // 8. Pickup time is required
                    const pickup_time = $('select[name="pickup_time"]').val().trim();
                    if (!pickup_time) {
                        errors.push('Pickup time is required');
                    }
                }

                // Display errors
                if (errors.length > 0) {
                    e.preventDefault();

                    let errorHtml = '<div class="alert alert-danger mb-20"><ul>';
                    errors.forEach(function(error) {
                        errorHtml += '<li>' + error + '</li>';
                    });
                    errorHtml += '</ul></div>';

                    // Remove existing error messages
                    $('#checkout-form .alert-danger').remove();

                    // Add new error messages at the top of the form
                    $('#checkout-form').prepend(errorHtml);

                    // Scroll to top
                    $('html, body').animate({
                        scrollTop: $('#checkout-form').offset().top - 100
                    }, 500);

                    // Focus on the first field with error
                    setTimeout(function() {
                        if (!name) {
                            $('input[name="name"]').focus();
                        } else if (!phone) {
                            $('input[name="phone"]').focus();
                        } else if (!email) {
                            $('input[name="email"]').focus();
                        } else if (order_type === 'delivery') {
                            if (!delivery_time_slot) {
                                $('select[name="delivery_time_slot"]').focus();
                            } else if (!city_town) {
                                $('input[name="city_town"]').focus();
                            } else if (!zipcode) {
                                $('input[name="zipcode"]').focus();
                            }
                        } else if (order_type === 'pickup') {
                            if (!pickup_time) {
                                $('select[name="pickup_time"]').focus();
                            }
                        }
                    }, 100);

                    return false;
                }

                return true;
            });

            $('#checkout-form-btn').on('click', function(e) {
                e.preventDefault();

                $('#checkout-form').submit();
            });

            $('#delivery-btn').on('click', function() {
                $('#pickup').toggleClass('active');
                $('#delivery').toggleClass('active');
                $('#order_type').val('delivery');
            });

            $('#pickup-btn').on('click', function(){
                $('#delivery').toggleClass('active');
                $('#pickup').toggleClass('active');
                $('#order_type').val('pickup')
            });
        });
    </script>
@endpush