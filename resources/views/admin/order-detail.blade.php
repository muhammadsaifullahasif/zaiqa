@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Order Details</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Order Items</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <h5>Ordered Items</h5>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('admin.orders') }}">Back</a>
            </div>
            <div class="table-responsive">
                @if (Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Options</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->order_items as $item)
                        <tr>

                            <td class="pname">
                                <div class="image">
                                    <img src="{{ asset('uploads/products/thumbnails') }}/{{ $item->product->product_meta['thumbnail'] }}" alt="{{ $item->product->name }}" class="image">
                                </div>
                                <div class="name">
                                    <a href="#" target="_blank"
                                        class="body-title-2">{{ $item->order_item_meta['title'] }}</a>
                                </div>
                            </td>
                            <td class="text-center">{{ $order->transaction->transaction_meta['currency_symbol'] }}{{ $item->order_item_meta['price'] }}</td>
                            <td class="text-center">{{ $item->qty }}</td>
                            <td class="text-center">{{ $item->product->category->name }}</td>
                            <td class="text-center">{{ $item->order_item_meta['unit'] }}{{ $item->order_item_meta['unitSymbol'] }}</td>
                            <td class="text-center">
                                <div class="list-icon-function view-icon">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

            </div>
        </div>

        <div class="wg-box mt-5">
            <h5>Shipping Address</h5>
            <div class="my-account__address-item col-md-6">
                <div class="my-account__address-item__detail">
                    <p>{{ (!empty($order->order_address['first_name']) || !empty($order->order_address['last_name'])) ? ( ($order->order_address['first_name'] ?? '') . ' ' . ($order->order_address['last_name'] ?? '') ) : '' }}</p>
                    <p>{{ (!empty($order->order_address['address_1']) || !empty($order->order_address['address_2'])) ? ( ($order->order_address['address_1'] ?? '') . ' ' . ($order->order_address['address_2'] ?? '') ) : '' }}</p>
                    <p>{{ $order->order_address['city'] }}, {{ $order->order_address['zipcode'] }}</p>
                    <br>
                    <p>Mobile : {{ $order->order_address['phone'] }}</p>
                </div>
            </div>
        </div>

        <div class="wg-box mt-5">
            <h5>Transactions</h5>
            <table class="table table-striped table-bordered table-transaction">
                <tbody>
                    <tr>
                        <th>Subtotal</th>
                        <td>${{ $order->transaction->transaction_meta['subtotal'] }}</td>
                        <th>Tax</th>
                        <td>${{ $order->transaction->transaction_meta['tax'] }}</td>
                        <th>Discount</th>
                        <td>${{ $order->transaction->transaction_meta['discount'] }}</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>${{ $order->transaction->transaction_meta['total'] }}</td>
                        <th>Payment Mode</th>
                        <td>{{ $order->transaction->mode }}</td>
                        <th>Status</th>
                        <td>{{ $order->transaction->status }}</td>
                    </tr>
                    <tr>
                        <th>Order Date</th>
                        <td>{{ $order->created_at }}</td>
                        <th>Delivered Date</th>
                        <td>{{ $order->order_meta['delivered_date'] ?? '' }}</td>
                        <th>Canceled Date</th>
                        <td>{{ $order->order_meta['canceled_date'] ?? '' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="wg-box mt-5">
            <h5>Update Order Status</h5>
            <form action="{{ route('admin.order.status.update', $order->id) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-3">
                        <div class="select">
                            <select name="order_status" id="order_status">
                                <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="packed" {{ $order->order_status == 'packed' ? 'selected' : '' }}>Packed</option>
                                <option value="shipped" {{ $order->order_status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="delivered" {{ $order->order_status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary tf-button w208">Update Status</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

@push('styles')
<style>
    .table-transaction>tbody>tr:nth-of-type(odd) {
        --bs-table-accent-bg: #fff !important;
    }
</style>
@endpush