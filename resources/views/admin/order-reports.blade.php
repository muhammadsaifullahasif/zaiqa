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
            <form id="reportForm" method="GET" action="{{ route('admin.order.reports.generate') }}">
                <div class="wg-filter flex-grow justify-start">
                    {{-- <div class="body-title mb-20">Report Filters</div> --}}

                    <div class="grid-3 gap20 mb-20">
                        <fieldset class="name">
                            <div class="body-title mb-10">Start Date</div>
                            <input type="date" name="start_date" id="start_date" class="" value="{{ request('start_date') }}" tabindex="1">
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title mb-10">End Date</div>
                            <input type="date" name="end_date" id="end_date" class="" value="{{ request('end_date') }}" tabindex="2">
                        </fieldset>
                        <fieldset class="">
                            <div class="body-title mb-10">Order Type</div>
                            <select name="order_type" id="order_type" class="">
                                <option value="">All Types</option>
                                <option value="delivery" {{ request('order_type') == 'delivery' ? 'selected' : '' }}>Delivery</option>
                                <option value="pickup" {{ request('order_type') == 'pickup' ? 'selected' : '' }}>Pickup</option>
                            </select>
                        </fieldset>
                    </div>

                    <div class="grid-3 gap20 mb-20">
                        <fieldset class="">
                            <div class="body-title mb-10">Order Status</div>
                            <select name="order_status" id="order_status" class="">
                                <option value="">All Status</option>
                                <option value="ordered" {{ request('order_status') == 'ordered' ? 'selected' : '' }}>Ordered</option>
                                <option value="delivered" {{ request('order_status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="canceled" {{ request('order_status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
                            </select>
                        </fieldset>
                        <fieldset class="">
                            <div class="body-title mb-10">Categories</div>
                            <div class="custom-multiselect" id="categories-dropdown">
                                <div class="multiselect-trigger">
                                    <span class="selected-text">Select Categories</span>
                                </div>
                                <div class="multiselect-options">
                                    <div class="multiselect-search">
                                        <input type="text" placeholder="Search categories..." class="search-input">
                                    </div>
                                    <div class="options-list">
                                        @foreach($categories as $category)
                                            <label class="option-item">
                                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                                    {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                                                <span>{{ $category->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="">
                            <div class="body-title mb-10">Products</div>
                            <div class="custom-multiselect" id="products-dropdown">
                                <div class="multiselect-trigger">
                                    <span class="selected-text">Select Products</span>
                                </div>
                                <div class="multiselect-options">
                                    <div class="multiselect-search">
                                        <input type="text" placeholder="Search products..." class="search-input">
                                    </div>
                                    <div class="options-list">
                                        @foreach($products as $product)
                                            <label class="option-item">
                                                <input type="checkbox" name="products[]" value="{{ $product->id }}"
                                                    {{ in_array($product->id, request('products', [])) ? 'checked' : '' }}>
                                                <span>{{ $product->title }}
                                                    @if($product->type == 'variation')
                                                        <small>(Variation)</small>
                                                    @endif
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="flex gap10">
                    <button type="submit" class="tf-button btn btn-primary style-1 w208">
                        <i class="icon-file-text"></i> Generate Report
                    </button>
                    <button type="button" id="clearFilters" class="tf-button btn btn-secondary style-3 w208">
                        <i class="icon-refresh-ccw"></i> Clear Filters
                    </button>
                </div>
            </form>
            <div class="divider"></div>
            @if (isset($reportData))
            <div class="report-header mb-3 d-flex justify-content-between align-items-center">
                <div>
                    <h4>
                        @if($reportType == 'orders')
                            All Orders Report
                        @else
                            Product Report: {{ $selectedProduct->title ?? 'N/A' }}
                        @endif
                    </h4>
                    <p class="text-muted">Generated on: {{ now()->format('F d, Y h:i A') }}</p>
                </div>
                <div>
                    <a href="{{ route('admin.order.reports.export', ['report_type' => $reportType, 'product_id' => request('product_id')]) }}"
                        class="tf-button btn btn-secondary style-1 w208"
                        target="_blank">
                        <i class="icon-download"></i> Export to PDF
                    </a>
                </div>
            </div>
            @endif
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    @if(isset($reportData))

                        @if($reportType == 'orders')
                            {{-- Orders Report Table --}}
                            <table class="table table-striped table-bordered">
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
                                                    <span class="badge bg-success">Delivered</span>
                                                @elseif($order->status == 'canceled')
                                                    <span class="badge bg-danger">Canceled</span>
                                                @else
                                                    <span class="badge bg-warning">{{ ucfirst($order->status) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No orders found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-end">Total:</th>
                                        <th>${{ number_format($reportData->sum('subtotal'), 2) }}</th>
                                        <th>${{ number_format($reportData->sum('tax'), 2) }}</th>
                                        <th>${{ number_format($reportData->sum('total'), 2) }}</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        @else
                            {{-- Product Report Table --}}
                            <div class="product-summary mb-4 p-3 bg-light">
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>Total Orders:</strong> {{ $reportData->count() }}
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Total Quantity Sold:</strong> {{ $reportData->sum('quantity') }}
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Total Revenue:</strong> ${{ number_format($reportData->sum('total_revenue'), 2) }}
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Avg Order Value:</strong> ${{ $reportData->count() > 0 ? number_format($reportData->avg('total_revenue'), 2) : '0.00' }}
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped table-bordered">
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
                                                    <span class="badge bg-success">Delivered</span>
                                                @elseif($item->order->status == 'canceled')
                                                    <span class="badge bg-danger">Canceled</span>
                                                @else
                                                    <span class="badge bg-warning">{{ ucfirst($item->order->status) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No orders found for this product</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @endif
                    @else
                        <div class="text-center p-5">
                            <i class="icon-file-text" style="font-size: 48px; opacity: 0.3;"></i>
                            <p class="text-muted mt-3">Apply filters and click "Generate Report" to view data</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .report-filters {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .grid-3 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
    }

    .gap20 {
        gap: 20px;
    }

    .mb-20 {
        margin-bottom: 20px;
    }

    .mb-10 {
        margin-bottom: 10px;
    }

    .mt-5 {
        margin-top: 5px;
    }

    .text-tiny {
        font-size: 12px;
        color: #6b7280;
    }

    .body-title {
        font-weight: 600;
        color: #1f2937;
        font-size: 14px;
    }

    fieldset.name input[type="date"],
    fieldset.select select:not([multiple]) {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #e1e1e1;
        border-radius: 6px;
        font-size: 14px;
        background: #fff;
        transition: all 0.3s ease;
    }

    fieldset.name input[type="date"]:focus,
    fieldset.select select:focus {
        outline: none;
        border-color: #0f4b46;
        box-shadow: 0 0 0 3px rgba(15, 75, 70, 0.1);
    }

    .report-header {
        padding: 15px 0;
        border-bottom: 2px solid #e1e1e1;
        margin-bottom: 20px;
    }

    .report-header h4 {
        margin: 0;
        color: #0f4b46;
        font-size: 20px;
        font-weight: 600;
    }

    .w208 {
        min-width: 208px;
    }

    /* Custom Multi-Select Dropdown */
    .custom-multiselect {
        position: relative;
        width: 100%;
    }

    .multiselect-trigger {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 40px 12px 15px;
        border: 1px solid #e1e1e1;
        border-radius: 6px;
        background: #fff;
        cursor: pointer;
        font-size: 14px;
        transition: all 0.3s ease;
        position: relative;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 20px;
    }

    .multiselect-trigger:hover {
        border-color: #0f4b46;
    }

    .multiselect-trigger .selected-text {
        flex: 1;
        color: #6b7280;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .multiselect-trigger .selected-text.has-selection {
        color: #1f2937;
        font-weight: 500;
    }

    .custom-multiselect.active .multiselect-trigger {
        border-color: #0f4b46;
        box-shadow: 0 0 0 3px rgba(15, 75, 70, 0.1);
    }

    .multiselect-options {
        position: absolute;
        top: calc(100% + 5px);
        left: 0;
        right: 0;
        background: #fff;
        border: 1px solid #e1e1e1;
        border-radius: 6px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        display: none;
        z-index: 1000;
        max-height: 300px;
        overflow: hidden;
    }

    .custom-multiselect.active .multiselect-options {
        display: block;
    }

    .multiselect-search {
        padding: 10px;
        border-bottom: 1px solid #e1e1e1;
    }

    .multiselect-search input {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #e1e1e1;
        border-radius: 4px;
        font-size: 13px;
        outline: none;
    }

    .multiselect-search input:focus {
        border-color: #0f4b46;
    }

    .options-list {
        max-height: 220px;
        overflow-y: auto;
        padding: 5px;
    }

    .option-item {
        display: flex;
        align-items: center;
        padding: 10px;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.2s ease;
        margin-bottom: 2px;
    }

    .option-item:hover {
        background-color: #f3f4f6;
    }

    .option-item input[type="checkbox"] {
        margin-right: 10px;
        width: 16px;
        height: 16px;
        cursor: pointer;
        accent-color: #0f4b46;
    }

    .option-item span {
        flex: 1;
        font-size: 14px;
        color: #1f2937;
    }

    .option-item span small {
        color: #6b7280;
        font-size: 12px;
        margin-left: 5px;
    }

    .option-item.hidden {
        display: none;
    }

    /* Scrollbar styling */
    .options-list::-webkit-scrollbar {
        width: 6px;
    }

    .options-list::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }

    .options-list::-webkit-scrollbar-thumb {
        background: #0f4b46;
        border-radius: 3px;
    }

    .options-list::-webkit-scrollbar-thumb:hover {
        background: #0a3a36;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Multi-Select Dropdowns
        function initMultiSelect(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            if (!dropdown) return;

            const trigger = dropdown.querySelector('.multiselect-trigger');
            const selectedText = dropdown.querySelector('.selected-text');
            const searchInput = dropdown.querySelector('.search-input');
            const optionsList = dropdown.querySelector('.options-list');
            const checkboxes = dropdown.querySelectorAll('input[type="checkbox"]');
            const dropdownOptions = dropdown.querySelector('.multiselect-options');

            // Toggle dropdown
            trigger.addEventListener('click', function(e) {
                e.stopPropagation();
                // Close all other dropdowns
                document.querySelectorAll('.custom-multiselect').forEach(d => {
                    if (d !== dropdown) d.classList.remove('active');
                });
                dropdown.classList.toggle('active');
            });

            // Prevent dropdown from closing when clicking inside the options
            if (dropdownOptions) {
                dropdownOptions.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }

            // Update selected text
            function updateSelectedText() {
                const selected = Array.from(checkboxes).filter(cb => cb.checked);
                if (selected.length === 0) {
                    selectedText.textContent = dropdownId === 'categories-dropdown' ? 'Select Categories' : 'Select Products';
                    selectedText.classList.remove('has-selection');
                } else if (selected.length === 1) {
                    selectedText.textContent = selected[0].nextElementSibling.textContent.trim();
                    selectedText.classList.add('has-selection');
                } else {
                    selectedText.textContent = `${selected.length} items selected`;
                    selectedText.classList.add('has-selection');
                }
            }

            // Handle checkbox changes
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateSelectedText);
            });

            // Search functionality
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const options = optionsList.querySelectorAll('.option-item');

                    options.forEach(option => {
                        const text = option.querySelector('span').textContent.toLowerCase();
                        if (text.includes(searchTerm)) {
                            option.classList.remove('hidden');
                        } else {
                            option.classList.add('hidden');
                        }
                    });
                });
            }

            // Initialize selected text on page load
            updateSelectedText();
        }

        // Initialize both dropdowns
        initMultiSelect('categories-dropdown');
        initMultiSelect('products-dropdown');

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            // Check if click is outside all dropdowns
            const isClickInsideDropdown = e.target.closest('.custom-multiselect');
            if (!isClickInsideDropdown) {
                document.querySelectorAll('.custom-multiselect').forEach(d => {
                    d.classList.remove('active');
                });
            }
        });

        // Clear Filters Button
        const clearFiltersBtn = document.getElementById('clearFilters');
        if (clearFiltersBtn) {
            clearFiltersBtn.addEventListener('click', function() {
                // Clear all form inputs
                document.getElementById('start_date').value = '';
                document.getElementById('end_date').value = '';
                document.getElementById('order_type').value = '';
                document.getElementById('order_status').value = '';

                // Clear multi-select checkboxes
                document.querySelectorAll('.custom-multiselect input[type="checkbox"]').forEach(cb => {
                    cb.checked = false;
                });

                // Update selected text for both dropdowns
                document.querySelectorAll('.custom-multiselect .selected-text').forEach(text => {
                    if (text.closest('#categories-dropdown')) {
                        text.textContent = 'Select Categories';
                    } else {
                        text.textContent = 'Select Products';
                    }
                    text.classList.remove('has-selection');
                });

                // Clear search inputs
                document.querySelectorAll('.search-input').forEach(input => {
                    input.value = '';
                });

                // Show all options
                document.querySelectorAll('.option-item').forEach(option => {
                    option.classList.remove('hidden');
                });
            });
        }
    });
</script>
@endpush
@endsection