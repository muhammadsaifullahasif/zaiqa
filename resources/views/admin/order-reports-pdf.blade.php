<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
        @if($reportType == 'orders')
            Orders Report
        @else
            Product Report - {{ $selectedProduct->title ?? 'N/A' }}
        @endif
    </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
        }
        .report-info {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
            font-size: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #0F4B46;
            color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .summary-box {
            background-color: #f0f0f0;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .summary-item {
            display: inline-block;
            width: 48%;
            margin-bottom: 10px;
        }
        .summary-item strong {
            color: #333;
        }
        tfoot {
            font-weight: bold;
            background-color: #f0f0f0;
        }
        tfoot td {
            padding: 10px;
            border-top: 2px solid #333;
        }
        .status-badge {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }
        .status-delivered {
            background-color: #4CAF50;
            color: white;
        }
        .status-canceled {
            background-color: #f44336;
            color: white;
        }
        .status-other {
            background-color: #ff9800;
            color: white;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <h1>
        @if($reportType == 'orders')
            All Orders Report
        @else
            Product Report: {{ $selectedProduct->title ?? 'N/A' }}
        @endif
    </h1>
    <div class="report-info">
        Generated on: {{ now()->format('F d, Y h:i A') }}
    </div>

    @if($reportType == 'orders')
        {{-- Orders Report --}}
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Items</th>
                    <th>Subtotal</th>
                    <th>Tax</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reportData as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                        <td>{{ $order->orderItems->count() }}</td>
                        <td>${{ number_format($order->subtotal, 2) }}</td>
                        <td>${{ number_format($order->tax, 2) }}</td>
                        <td>${{ number_format($order->total, 2) }}</td>
                        <td>
                            @if($order->status == 'delivered')
                                <span class="status-badge status-delivered">Delivered</span>
                            @elseif($order->status == 'canceled')
                                <span class="status-badge status-canceled">Canceled</span>
                            @else
                                <span class="status-badge status-other">{{ ucfirst($order->status) }}</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align: center;">No orders found</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right">Total:</td>
                    <td>${{ number_format($reportData->sum('subtotal'), 2) }}</td>
                    <td>${{ number_format($reportData->sum('tax'), 2) }}</td>
                    <td>${{ number_format($reportData->sum('total'), 2) }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    @else
        {{-- Product Report --}}
        <div class="summary-box">
            <div class="summary-item">
                <strong>Total Orders:</strong> {{ $reportData->count() }}
            </div>
            <div class="summary-item">
                <strong>Total Quantity Sold:</strong> {{ $reportData->sum('quantity') }}
            </div>
            <div class="summary-item">
                <strong>Total Revenue:</strong> ${{ number_format($reportData->sum('total_revenue'), 2) }}
            </div>
            <div class="summary-item">
                <strong>Avg Order Value:</strong> ${{ $reportData->count() > 0 ? number_format($reportData->avg('total_revenue'), 2) : '0.00' }}
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Order Date</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Revenue</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reportData as $item)
                    <tr>
                        <td>#{{ $item->order_id }}</td>
                        <td>{{ $item->order->name ?? 'N/A' }}</td>
                        <td>{{ $item->created_at->format('M d, Y') }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>${{ number_format($item->total_revenue, 2) }}</td>
                        <td>
                            @if($item->order->status == 'delivered')
                                <span class="status-badge status-delivered">Delivered</span>
                            @elseif($item->order->status == 'canceled')
                                <span class="status-badge status-canceled">Canceled</span>
                            @else
                                <span class="status-badge status-other">{{ ucfirst($item->order->status) }}</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center;">No orders found for this product</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @endif
</body>
</html>
