@extends('layouts.app')

@section('content')
<main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Order's Details</h2>
        <div class="row">
            <div class="col-lg-2">
                @include('user.my-account-nav')
            </div>

            <div class="col-lg-10">
                <div class="wg-box mt-5 mb-5">
                    @if (Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-6">
                            <h5>Ordered Details</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-sm btn-danger" href="{{ route('user.orders') }}">Back</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-transaction">
                            <tbody>
                                <tr>
                                    <th>Order No</th>
                                    <td>#{{ $order->id }}</td>
                                    <th>Mobile</th>
                                    <td>{{ $order->phone }}</td>
                                    <th>Pin/Zip Code</th>
                                    <td>{{ $order->zip }}</td>
                                </tr>
                                <tr>
                                    <th>Order Date</th>
                                    <td>{{ $order->created_at }}</td>
                                    <th>Delivered Date</th>
                                    <td>{{ $order->delivered_date }}</td>
                                    <th>Canceled Date</th>
                                    <td>{{ $order->canceled_date }}</td>
                                </tr>
                                <tr>
                                    <th>Order Status</th>
                                    <td colspan="5">
                                        @if ($order->status == 'ordered')
                                            <span class="badge bg-warning">Ordered</span>
                                        @elseif ($order->status == 'delivered')
                                            <span class="badge bg-success">Delivered</span>
                                        @elseif ($order->status == 'canceled')
                                            <span class="badge bg-danger">Canceled</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="wg-box wg-table table-all-user">
                    <div class="row">
                        <div class="col-6">
                            <h5>Ordered Items</h5>
                        </div>
                        <div class="col-6 text-right">

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">SKU</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Brand</th>
                                    <th class="text-center">Options</th>
                                    <th class="text-center">Return Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $item)
                                <tr>

                                    <td class="pname">
                                        <div class="image">
                                            <img src="{{ asset('uploads/products/thumbnails') }}/{{ $item->product->image }}" alt="{{ $item->product->name }}" class="image">
                                        </div>
                                        <div class="name">
                                            <a href="{{ route('shop.product.detail', $item->product->slug) }}" target="_blank" class="body-title-2">{{ $item->product->name }}</a>
                                        </div>
                                    </td>
                                    <td class="text-center">${{ $item->price }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-center">{{ $item->product->SKU }}</td>
                                    <td class="text-center">{{ $item->product->category->name }}</td>
                                    <td class="text-center">{{ $item->product->brand->name }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center">No</td>
                                    <td class="text-center">
                                        <a href="{{ route('shop.product.detail', $item->product->slug) }}" target="_blank">
                                            <div class="list-icon-function view-icon">
                                                <div class="item eye">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                </div>

                <div class="wg-box mt-5">
                    <h5>Shipping Address</h5>
                    <div class="my-account__address-item col-md-6">
                        <div class="my-account__address-item__detail">
                            <p>{{ $order->name }}</p>
                            <p>{{ $order->address }}</p>
                            <p>{{ $order->landmark }}</p>
                            <p>{{ $order->city }}, {{ $order->state }}, {{ $order->country }}</p>
                            <p>{{ $order->zip }}</p>
                            <br>
                            <p>{{ $order->phone }}</p>
                        </div>
                    </div>
                </div>

                <div class="wg-box mt-5">
                    <h5>Transactions</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-transaction">
                            <tbody>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>${{ $order->subtotal }}</td>
                                    <th>Tax</th>
                                    <td>${{ $order->tax }}</td>
                                    <th>Discount</th>
                                    <td>${{ $order->discount }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>${{ $order->total }}</td>
                                    <th>Payment Mode</th>
                                    <td>{{ $order->transaction->mode }}</td>
                                    <th>Status</th>
                                    <td>
                                        @if ($order->transaction->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif ($order->transaction->status == 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @elseif ($order->transaction->status == 'declined')
                                            <span class="badge bg-danger">Declined</span>
                                        @elseif ($order->transaction->status == 'refunded')
                                            <span class="badge bg-slate-700">Refunded</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                @if(!$order->canceled_date && !$order->delivered_date)
                <div class="wg-box mt-5 text-right">
                    <form action="{{ route('user.order.cancel', $order->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-danger">Cancel Order</button>
                    </form>
                </div>
                @endif
            </div>

        </div>
    </section>
</main>
@endsection