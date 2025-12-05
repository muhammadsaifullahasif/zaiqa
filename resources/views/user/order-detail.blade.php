@extends('layouts.app')

@section('content')
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
                </div>
            </div>
        </div>
    </div>
    {{-- ORDER DETAIL WRAPPER END --}}
@endsection
