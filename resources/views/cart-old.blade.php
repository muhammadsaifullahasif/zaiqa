@extends('layouts.app')

@push('styles')
    <style>
        .text-success {
            color: #278c04 !important;
        }

        .text-danger {
            color: #d61808 !important;
        }
    </style>
@endpush

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
        <h2 class="page-title">Cart</h2>
        <div class="checkout-steps">
            <a href="javascript:void(0)" class="checkout-steps__item active">
                <span class="checkout-steps__item-number">01</span>
                <span class="checkout-steps__item-title">
                    <span>Shopping Bag</span>
                    <em>Manage Your Items List</em>
                </span>
            </a>
            <a href="javascript:void(0)" class="checkout-steps__item">
                <span class="checkout-steps__item-number">02</span>
                <span class="checkout-steps__item-title">
                    <span>Shipping and Checkout</span>
                    <em>Checkout Your Items List</em>
                </span>
            </a>
            <a href="javascript:void(0)" class="checkout-steps__item">
                <span class="checkout-steps__item-number">03</span>
                <span class="checkout-steps__item-title">
                    <span>Confirmation</span>
                    <em>Review And Submit Your Order</em>
                </span>
            </a>
        </div>
        <div id="shopping-cart-wrapper">
            <div class="shopping-cart" id="shopping-cart">
                @if ($items->count() > 0)
                <div class="cart-table__wrapper">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>
                                    <div class="shopping-cart__product-item">
                                        <img loading="lazy" src="{{ asset('uploads/products/thumbnails') }}/{{ $item->model->image }}" width="120" height="120" alt="{{ $item->name }}" />
                                    </div>
                                </td>
                                <td>
                                    <div class="shopping-cart__product-item__detail">
                                        <h4>{{ $item->name }}</h4>
                                        <ul class="shopping-cart__product-item__options">
                                            <li>Color: Yellow</li>
                                            <li>Size: L</li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <span class="shopping-cart__product-price">${{ $item->price }}</span>
                                </td>
                                <td>
                                    <div class="qty-control position-relative">
                                        <input type="number" name="quantity" value="{{ $item->qty }}" min="1" class="qty-control__number text-center">
                                        <form id="qty-control__reduce_{{ $item->rowId }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="{{ $item->rowId }}" name="rowId">
                                            <input type="hidden" value="decrease" name="operator" />
                                            <div class="qty-control__reduce" data-id="{{ $item->rowId }}">-</div>
                                        </form>
                                        <form id="qty-control__increase_{{ $item->rowId }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="{{ $item->rowId }}" name="rowId">
                                            <input type="hidden" value="increase" name="operator" />
                                            <div class="qty-control__increase" data-id="{{ $item->rowId }}">+</div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <span class="shopping-cart__subtotal">${{ $item->subTotal() }}</span>
                                </td>
                                <td>
                                    <form id="remove_item_{{ $item->rowId }}">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" value="{{ $item->rowId }}" name="rowId" id="rowId_{{ $item->rowId }}">
                                        <a href="javascript:void(0)" data-id="{{ $item->rowId }}" class="remove-cart">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                                <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                            </svg>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="cart-table-footer">
                        <div>
                            <form action="{{ route('cart.coupon.code') }}" method="post" class="position-relative bg-body">
                                @csrf
                                <input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code" value="@if (Session::has('coupon')) {{ Session::get('coupon')['code'] }} @endif">
                                <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit" value="APPLY COUPON">
                            </form>
                            @if (Session::has('coupon'))
                                <form action="{{ route('cart.remove.coupon.code') }}" method="post" id="remove_coupon_form">
                                    @csrf
                                    @method('delete')
                                    <a href="javascript:void(0);" onclick="document.getElementById('remove_coupon_form').submit();">&times; Remove Coupon</a>
                                </form>
                            @endif
                        </div>
                        <form action="{{ route('cart.clear') }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-light" id="clear_cart_btn">CLEAR CART</button>
                        </form>
                    </div>
                    <div>
                        @if (Session::has('success'))
                            <p class="text-success">{{ Session::get('success') }}</p>
                        @elseif (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif
                    </div>
                </div>
                <div class="shopping-cart__totals-wrapper">
                    <div class="sticky-content">
                        <div class="shopping-cart__totals">
                            <h3>Cart Totals</h3>
                            <table class="cart-totals">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>${{ Cart::instance('cart')->subtotal() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>Free shipping
                                            {{-- <div class="form-check">
                                                <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="free_shipping">
                                                <label class="form-check-label" for="free_shipping">Free shipping</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="flat_rate">
                                                <label class="form-check-label" for="flat_rate">Flat rate: $49</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="local_pickup">
                                                <label class="form-check-label" for="local_pickup">Local pickup: $8</label>
                                            </div>
                                            <div>Shipping to AL.</div>
                                            <div>
                                                <a href="#" class="menu-link menu-link_us-s">CHANGE ADDRESS</a>
                                            </div> --}}
                                        </td>
                                    </tr>
                                    @if (Session::has('discounts'))
                                        <tr>
                                            <td>Discount {{ Session::get('coupon')['code'] }}</td>
                                            <td>${{ Session::get('discounts')['discount'] }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>VAT</th>
                                        <td>$@if (Session::has('discounts')) {{ Session::get('discounts')['tax'] }} @else {{ Cart::instance('cart')->tax() }} @endif</td>
                                        {{-- <td>{{ Cart::instance('cart')->tax() }}</td> --}}
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>$@if (Session::has('discounts')) {{ Session::get('discounts')['total'] }} @else {{ Cart::instance('cart')->total() }} @endif</td>
                                        {{-- <td>${{ Cart::instance('cart')->total() }}</td> --}}
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mobile_fixed-btn_wrapper">
                            <div class="button-wrapper container">
                                <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-checkout">PROCEED TO CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-md-12 text-center pt-5 bp-5">
                        <p>No item found in your cart.</p>
                        <a href="{{ route('shop.index') }}" class="btn btn-info">Shop Now</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
    <script>
        $(function(){
            $(document).on('click', '.qty-control__reduce', function(){
                // var form = $(this).closest('form');
                $.ajax({
                    url: `{{ route('cart.update.qty') }}`,
                    method: 'POST',
                    data: $('#qty-control__reduce_' + $(this).data('id')).serialize(),
                    success: function(result) {
                        // if(result.status == 'success') {
                            $('#shopping-cart-wrapper').load(location.href + ' #shopping-cart');
                        // }
                    }
                });
            });

            $(document).on('click', '.qty-control__increase', function(){
                // var form = $(this).closest('form');
                $.ajax({
                    url: `{{ route('cart.update.qty') }}`,
                    method: 'POST',
                    data: $('#qty-control__increase_' + $(this).data('id')).serialize(),
                    success: function(result) {
                        // if(result.status == 'success') {
                            $('#shopping-cart-wrapper').load(location.href + ' #shopping-cart');
                        // }
                    }
                });
            });

            $(document).on('click', '.remove-cart', function(){
                // var form = $(this).closest('form');
                var id = $(this).data('id');
                var url_path = "{{ route('cart.remove.item', ":id") }}".replace(':id', id);
                $.ajax({
                    url: url_path,
                    method: 'POST',
                    data: $('#remove_item_' + $(this).data('id')).serialize(),
                    success: function(result) {
                        // if(result.status == 'success') {
                            $('#shopping-cart-wrapper').load(location.href + ' #shopping-cart');
                        // }
                    }
                });
            });

            $('#clear_cart_btn').on('click', function(e){
                e.preventDefault();
                if(confirm('Are you sure to clear cart?')) {
                    $(this).closest('form').submit();
                }
            });

        });
    </script>
@endpush