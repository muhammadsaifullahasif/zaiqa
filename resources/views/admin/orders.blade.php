@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Orders</h3>
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
                    <div class="text-tiny">Orders</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <div class="d-flex" style="gap: 5px;">
                        <fieldset class="select">
                            <select name="delivery_type" id="delivery_type" class="select w160 select-primary">
                                <option value="">Order Type</option>
                                <option value="">Delivery</option>
                                <option value="">Pickup</option>
                            </select>
                        </fieldset>
                        <fieldset class="select">
                            <select name="status" id="status" class="select w160 select-secondary">
                                <option value="">Order Status</option>
                                <option value="">Processing</option>
                                <option value="">Packed</option>
                                <option value="">Shipped</option>
                                <option value="">Delivered</option>
                            </select>
                        </fieldset>
                    </div>
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="name"
                                tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:70px">OrderNo</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Subtotal</th>
                                <th class="text-center">Tax</th>
                                <th class="text-center">Total</th>

                                <th class="text-center">Order Type</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Order Date</th>
                                <th class="text-center">Total Items</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                            <tr>
                                <td class="text-center">#{{ $order->id }}</td>
                                <td class="text-center">{{ (!empty($order->order_address['first_name']) || !empty($order->order_address['last_name'])) ? ( ($order->order_address['first_name'] ?? '') . ' ' . ($order->order_address['last_name'] ?? '') ) : '' }}</td>
                                <td class="text-center">{{ $order->order_address['phone'] }}</td>
                                <td class="text-center">{{ $order->transaction->transaction_meta['currency_symbol'] }}{{ $order->transaction->transaction_meta['subtotal'] }}</td>
                                <td class="text-center">{{ $order->transaction->transaction_meta['currency_symbol'] }}{{ $order->transaction->transaction_meta['tax'] }}</td>
                                <td class="text-center">{{ $order->transaction->transaction_meta['currency_symbol'] }}{{ $order->transaction->transaction_meta['total'] }}</td>

                                <td class="text-center">{{ $order->order_type }}</td>
                                <td class="text-center">{{ $order->order_status }}</td>
                                <td class="text-center">{{ $order->created_at }}</td>
                                <td class="text-center">{{ $order->order_items->count() }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.order.detail', $order->id) }}">
                                        <div class="list-icon-function view-icon" style="justify-content: center;">
                                            <div class="item eye">
                                                <i class="icon-eye"></i>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr><td colspan="11" class="text-center">No order found.</td></tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

            </div>
        </div>
    </div>
</div>
@endsection