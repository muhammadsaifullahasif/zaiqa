@extends('layouts.app')

@section('content')
{{-- CART HEADER START --}}
<div class="cart-header py-lg-5 py-md-3">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="dual-heading">
                    <span>Your</span>
                    <span class="text-primary fst-italic">Cart</span>
                </h2>
                <p>Review your dishes before checkout and get ready to enjoy the fresh taste of Royal at your doorstep.</p>
            </div>
        </div>
    </div>
</div>
{{-- CART HEADER END --}}
{{-- CART SUMMARY START --}}
<div class="cart-summary-wrapper py-lg-5 py-md-3">
    <div class="container" id="shopping-cart-wrapper">
        <div class="row" id="shopping-cart">
            <div class="col-lg-8 mb-3">
                <div class="cart-table mb-3">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex gap-2 info">
                                                <img src="{{ asset('uploads/products/thumbnails') }}/{{ $item->model->product_meta['thumbnail'] }}" class="w-100 rounded" alt="{{ $item->name }}">
                                                <div class="detail">
                                                    <h4 class="title text-secondary">{{ $item->name }}</h4>
                                                    <p class="text">{{ $item->options['unit'] }}{{ $item->model->product_meta['unit'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="product-quantity">
                                                <form id="qty-control__reduce_{{ $item->rowId }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $item->rowId }}" name="rowId">
                                                    <input type="hidden" value="decrease" name="operator" />
                                                    {{-- <div class="btn quantity-decrement qty-control__reduce" data-id="{{ $item->rowId }}">-</div> --}}
                                                    <button class="btn quantity-decrement qty-control__reduce" data-id="{{ $item->rowId }}" type="button">-</button>
                                                </form>
                                                <input type="number" id="quantity" name="quantity" class="quantity text-center" value="{{ $item->qty }}" min="1">
                                                {{-- <button class="btn quantity-increment" type="button">+</button> --}}
                                                <form id="qty-control__increase_{{ $item->rowId }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $item->rowId }}" name="rowId">
                                                    <input type="hidden" value="increase" name="operator" />
                                                    {{-- <div class="btn quantity-increment qty-control__increase" data-id="{{ $item->rowId }}">+</div> --}}
                                                    <button class="btn quantity-increment qty-control__increase" data-id="{{ $item->rowId }}" type="button">+</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="price">€{{ $item->subTotal() }}</p>
                                        </td>
                                        <td>
                                            <form id="remove_item_{{ $item->rowId }}">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" value="{{ $item->rowId }}" name="rowId" id="rowId_{{ $item->rowId }}">
                                                <a href="javascript:void(0)" data-id="{{ $item->rowId }}" class="btn btn-outline-primary btn-lg rounded-pill remove-cart">
                                                    <i class="far fa-trash-can"></i> Delete
                                                </a>
                                                {{-- <button class="btn btn-outline-primary btn-lg rounded-pill"><i class="far fa-trash-can"></i> Delete</button> --}}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- <tr>
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
                                        <div class="product-quantity">
                                            <button class="btn quantity-decrement" type="button">-</button>
                                            <input type="number" id="quantity" name="quantity" class="quantity text-center" value="1" min="1">
                                            <button class="btn quantity-increment" type="button">+</button>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="price">€40.99</p>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-lg rounded-pill"><i class="far fa-trash-can"></i> Delete</button>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    <a href="#" class="btn btn-lg w-100 add-more-product-btn fs-6">
                        <i class="fas fa-circle-plus fa-xl text-primary"></i>
                        Add more products
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="cart-summary card rounded-4 bg-primary">
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
                        <a href="{{ route('checkout.index') }}" class="btn btn-secondary w-100">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- CART SUMMARY END --}}
@endsection
