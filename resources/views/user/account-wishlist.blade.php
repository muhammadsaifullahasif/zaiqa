@extends('layouts.app')

@push('styles')
    <style>
        .filled-heart {
            color: #f00;
        }
    </style>
@endpush

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Wishlist</h2>
        <div class="row">
            <div class="col-lg-3">
                @include('user.my-account-nav')
            </div>
            <div class="col-lg-9">
                <section class="shop-checkout container">
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
                                                </div><!-- .qty-control -->
                                            </td>
                                            <td>
                                                <span class="shopping-cart__subtotal">${{ $item->subTotal() }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2 align-middle justify-center]">
                                                    <form action="{{ route('wishlist.move.to.cart', $item->rowId) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-warning">Move to cart</button>
                                                    </form>
                                                    <form id="remove_item_{{ $item->rowId }}">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="hidden" value="{{ $item->rowId }}" name="rowId" id="rowId_{{ $item->rowId }}">
                                                        <a href="javascript:void(0)" data-id="{{ $item->rowId }}" class="remove-wishlist">
                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="#FF0000" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                                                <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                                            </svg>
                                                        </a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="cart-table-footer">
                                    <form action="{{ route('wishlist.clear') }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-light" id="clear_wishlist_btn">CLEAR WISHLIST</button>
                                    </form>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-md-12 text-center pt-5 bp-5">
                                    <p>No item found in your wishlist.</p>
                                    <a href="{{ route('shop.index') }}" class="btn btn-info">Shop Now</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </section>
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
                    url: `{{ route('wishlist.update.qty') }}`,
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
                    url: `{{ route('wishlist.update.qty') }}`,
                    method: 'POST',
                    data: $('#qty-control__increase_' + $(this).data('id')).serialize(),
                    success: function(result) {
                        // if(result.status == 'success') {
                            $('#shopping-cart-wrapper').load(location.href + ' #shopping-cart');
                        // }
                    }
                });
            });

            $(document).on('click', '.remove-wishlist', function(){
                // var form = $(this).closest('form');
                var id = $(this).data('id');
                var url_path = "{{ route('wishlist.remove.item', ":id") }}".replace(':id', id);
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

            $('#clear_wishlist_btn').on('click', function(e){
                e.preventDefault();
                if(confirm('Are you sure to clear wishlist?')) {
                    $(this).closest('form').submit();
                }
            });
        });
    </script>
@endpush