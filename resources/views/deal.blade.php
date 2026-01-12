@extends('layouts.app')

@section('content')
{{-- HERO START --}}
{{-- <div class="catalog-hero py-lg-5 py-md-3">
    <div class="container">
        <div class="d-flex flex-column px-lg-5 px-md-3 mb-md-3 align-items-center justify-content-center">
            <h3 class="dual-heading fw-bold"><span class="text-black">Explore Complete</span> <span class="text-primary">Menu</span></h3>
            <p>Discover every Royal creation, crafted with authentic flavor and top-quality ingredients.</p>
        </div>
    </div>
</div> --}}
{{-- HERO END --}}
{{-- DEALS SECTION START --}}
<div class="deals bg-secondary py-5 mb-md-5" style="background-image: url({{ asset('assets/images/deals-bg.png') }}); background-repeat: no-repeat; background-size: contain;">
    <div class="container">
        <div class="row px-lg-5 px-md-3 align-items-center justify-content-between">
            <div class="col-lg-4 col-md-6 mb-md-3">
                <img src="{{ asset('assets/images/deals-img.png') }}" class="w-100" alt="">
            </div>
            <div class="col-lg-6 col-md-6">
                <h3 class="dual-heading heading">
                    <span class="text-accent">Taste the Tradition <span class="deal-badge" style="background-image: url('{{ asset("assets/images/deal-badge.svg"); }}')">Offer</span></span>
                    <span class="text-primary fst-italic">with Royal</span>
                </h3>
                <p class="text-accent">Experience the perfect blend of authentic flavors and top-quality ingredients. At Royal, every dish is cooked with passion to bring you freshness and taste that feels like home.</p>
                {{-- <div class="cta mb-lg-5 mb-md-3">
                    <a href="{{ route('deal.index') }}" class="btn btn-primary rounded-pill">View Deal</a>
                    <a href="{{ route('shop.index') }}" class="btn bg-accent text-primary rounded-pill">Explore Menu</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
{{-- DEALS SECTION END --}}
{{-- CATALOG CONTAINER START --}}
<div class="our-location py-md-3">
    <div class="container">
        <div class="row px-lg-5 px-md-3">
            {{-- SIDEBAR START --}}
            <aside class="col-lg-2 col-md-12">
                <div class="sidebar-filters">
                    <div class="sidebar-filter">
                        <div class="header">
                            <h4 class="title">Filters</h4>
                            <a href="{{ route('shop.index') }}">Clear all</a>
                        </div>
                    </div>
                    <div class="sidebar-filter">
                        <div class="header">
                            <h5 class="subtitle">Categories</h5>
                            <a href="#"><i class="fas fa-angle-down"></i></a>
                        </div>
                        <div class="body">
                            @foreach ($categories as $category)
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="filter_category" id="{{ $category->slug }}" value="{{ $category->id }}" {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                                    <label for="{{ $category->slug }}" class="form-check-label">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-filter">
                        <div class="header">
                            <h5 class="subtitle">Units</h5>
                            <a href="#"><i class="fas fa-angle-down"></i></a>
                        </div>
                        <div class="body">
                            @foreach ($units as $unit)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="filter_units[]" id="{{ $unit['unit'] }}-{{ $unit['symbol'] }}" value="{{ $unit['unit'] }}-{{ $unit['symbol'] }}" {{ in_array(($unit['unit'].'-'.$unit['symbol']), request('units', [])) ? 'checked' : '' }}>
                                    <label for="{{ $unit['unit'] }}-{{ $unit['symbol'] }}" class="form-check-label">{{ $unit['unit'] }} {{ $unit['symbol'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-filter">
                        <div class="header">
                            <h5 class="subtitle">Price Range</h5>
                            <a href="#"><i class="fas fa-angle-down"></i></a>
                        </div>
                        <div class="body">
                            <div class="price-range-container">
                                <div class="price-inputs d-flex gap-2 mb-3">
                                    <input type="number" name="min_price" id="min_price" class="form-control" placeholder="Min" value="{{ request('min_price', $minPrice) }}" readonly>
                                    <input type="number" name="max_price" id="max_price" class="form-control" placeholder="Max" value="{{ request('max_price', $maxPrice) }}" readonly>
                                </div>
                                <div class="range-slider">
                                    <div class="range-fill" id="rangeFill"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range" name="range_min" id="rangeMin" class="min" min="0" max="{{ $maxPrice }}" value="{{ request('min_price', $minPrice) }}" step="10">
                                    <input type="range" name="range_max" id="rangeMax" class="max" min="0" max="{{ $maxPrice }}" value="{{ request('max_price', $maxPrice) }}" step="10">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="button" id="filter_btn">Filter Products</button>
                </div>
            </aside>
            {{-- SIDEBAR END --}}
            {{-- CATALOG START --}}
            <div class="col-lg-10 col-md-12">
                <div class="row align-items-stretch g-2 px-lg-5 px-md-3 mb-lg-5 mb-md-3 catalog-search">
                    <div class="col-12">
                        <input type="text" id="s" name="s" value="{{ request('search') }}" class="form-control form-control-lg bg-transparent" placeholder="Enter masala name">
                    </div>
                </div>

                <div class="row align-items-stretch px-lg-5 px-md-3 mb-lg-5 mb-md-3 product-archive catalog-archive">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="card product-item">
                                <a href="{{ route('shop.product.detail', $product->slug) }}"><img src="{{ asset('uploads/products') }}/{{ $product->product_meta['thumbnail'] }}" class="card-img-top" alt="{{ $product->title }}" /></a>
                                <div class="card-body">
                                    <div class="card-title d-flex justify-content-between">
                                        <a href="{{ route('shop.product.detail', $product->slug) }}"><h3 class="product-title fw-bold text-secondary">{{ $product->title }}</h3></a>
                                        <p class="product-price fw-bold text-secondary"><span>€</span> {{ $product->getMinPrice() }}<span class="product-unit">/{{ $product->getMinUnit() }} {{ $product->product_meta['unit'] }}</span></p>
                                    </div>
                                    <p class="card-text product-short-description">{{ $product->short_description }}</p>
                                    <div class="product-footer d-flex justify-content-between">
                                        <div class="product-review d-flex align-items-center gap-2">
                                            <ul class="d-flex align-items-center list-unstyled mb-0">
                                                <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                <li><img src="{{ asset('assets/images/star.svg') }}" alt=""></li>
                                                <li><img src="{{ asset('assets/images/star-half.svg') }}" alt=""></li>
                                            </ul>
                                            <p class="mb-0">4.5 (360 reviews)</p>
                                        </div>
                                        <a href="{{ route('shop.product.detail', $product->slug) }}" class="btn btn-primary product-add-to-cart-btn"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.52148 2.97949L4.42815 3.30949L5.3109 13.8264C5.34481 14.2403 5.53351 14.6261 5.83934 14.907C6.14518 15.1878 6.54567 15.343 6.9609 15.3417H16.9617C17.3593 15.3421 17.7437 15.199 18.0442 14.9386C18.3446 14.6782 18.541 14.3181 18.5971 13.9245L19.4679 7.91299C19.4911 7.75312 19.4826 7.59023 19.4428 7.43366C19.403 7.27708 19.3328 7.12988 19.236 7.00047C19.1393 6.87107 19.0181 6.762 18.8792 6.6795C18.7403 6.59699 18.5865 6.54268 18.4266 6.51966C18.3679 6.51324 4.73432 6.50866 4.73432 6.50866" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.9492 9.89551H15.4911" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.55932 18.52C6.62655 18.5171 6.69366 18.5279 6.75662 18.5516C6.81958 18.5753 6.87708 18.6116 6.92567 18.6581C6.97425 18.7047 7.01292 18.7606 7.03933 18.8224C7.06575 18.8843 7.07936 18.9509 7.07936 19.0182C7.07936 19.0855 7.06575 19.1521 7.03933 19.214C7.01292 19.2758 6.97425 19.3317 6.92567 19.3783C6.87708 19.4248 6.81958 19.4611 6.75662 19.4848C6.69366 19.5085 6.62655 19.5193 6.55932 19.5164C6.43089 19.5109 6.30954 19.456 6.22061 19.3632C6.13168 19.2703 6.08203 19.1468 6.08203 19.0182C6.08203 18.8896 6.13168 18.7661 6.22061 18.6732C6.30954 18.5804 6.43089 18.5255 6.55932 18.52Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9 18.5195C17.0325 18.5195 17.1595 18.5722 17.2532 18.6659C17.3469 18.7595 17.3996 18.8866 17.3996 19.0191C17.3996 19.1516 17.3469 19.2787 17.2532 19.3724C17.1595 19.4661 17.0325 19.5187 16.9 19.5187C16.7675 19.5187 16.6404 19.4661 16.5467 19.3724C16.453 19.2787 16.4004 19.1516 16.4004 19.0191C16.4004 18.8866 16.453 18.7595 16.5467 18.6659C16.6404 18.5722 16.7675 18.5195 16.9 18.5195Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- PAGINATION START --}}
                <div class="row align-items-stretch px-lg-5 px-md-3 mb-lg-5 mb-md-3 pagination-container">
                    <div class="col-md-12">
                        {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                {{-- PAGINATION END --}}
            </div>
            {{-- CATALOG END --}}
        </div>
    </div>
</div>
{{-- CATALOG CONTAINER END --}}
@endsection

@push('scripts')
    <script>
        document.querySelector('#filter_btn').addEventListener('click', function(e) {
            e.preventDefault();

            // Get all filter values
            const filters = {};

            // Get search input
            const search = document.querySelector('input[name="s"]')?.value;
            if (search) {
                filters.search = search;
            }

            // Get selected categories (checkboxes)
            const categories = [];
            document.querySelectorAll('input[name="filter_category"]:checked').forEach(function(checkbox) {
                categories.push(checkbox.value);
            });
            if (categories.length > 0) {
                filters.categories = categories;
            }

            // Get selected units (checkboxes)
            const units = [];
            document.querySelectorAll('input[name="filter_units[]"]:checked').forEach(function(checkbox) {
                units.push(checkbox.value);
            });
            if (units.length > 0) {
                filters.units = units;
            }

            // Get price range
            const minPrice = document.querySelector('input[name="min_price"]')?.value;
            const maxPrice = document.querySelector('input[name="max_price"]')?.value;
            if (minPrice) filters.min_price = minPrice;
            if (maxPrice) filters.max_price = maxPrice;

            // Build query string
            const queryParams = new URLSearchParams();
            for (const [key, value] of Object.entries(filters)) {
                if (Array.isArray(value)) {
                    value.forEach(v => queryParams.append(key + '[]', v));
                } else {
                    queryParams.append(key, value);
                }
            }

            // Redirect to shop.index with filters
            window.location.href = "{{ route('shop.index') }}" + '?' + queryParams.toString();
        });

        // Price Range Slider
        const rangeMin = document.getElementById('rangeMin');
        const rangeMax = document.getElementById('rangeMax');
        const minPrice = document.getElementById('min_price');
        const maxPrice = document.getElementById('max_price');
        const rangeFill = document.getElementById('rangeFill');

        const minGap = 50; // Minimum gap between sliders

        function updateRangeSlider() {
            const minVal = parseInt(rangeMin.value);
            const maxVal = parseInt(rangeMax.value);

            if (maxVal - minVal < minGap) {
                if (event.target.className === 'min') {
                    rangeMin.value = maxVal - minGap;
                } else {
                    rangeMax.value = minVal + minGap;
                }
            } else {
                minPrice.value = minVal;
                maxPrice.value = maxVal;

                // Update the fill bar
                const percent1 = (minVal / rangeMin.max) * 100;
                const percent2 = (maxVal / rangeMax.max) * 100;
                rangeFill.style.left = percent1 + '%';
                rangeFill.style.right = (100 - percent2) + '%';
            }
        }

        rangeMin.addEventListener('input', updateRangeSlider);
        rangeMax.addEventListener('input', updateRangeSlider);

        // Initialize on page load
        updateRangeSlider();
    </script>
@endpush

@push('styles')
    <style>
        .price-range-container {
            padding: 10px 0;
        }

        .price-inputs input {
            text-align: center;
            font-weight: 600;
            color: #333;
        }

        .range-slider {
            position: relative;
            width: 100%;
            height: 5px;
            background: #ddd;
            border-radius: 5px;
            margin: 20px 0;
        }

        .range-fill {
            position: absolute;
            height: 100%;
            background: #0F4B46;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .range-input {
            position: relative;
            margin-top: -25px;
        }

        .range-input input {
            position: absolute;
            width: 100%;
            height: 5px;
            background: none;
            pointer-events: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .range-input input::-webkit-slider-thumb {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #0F4B46;
            pointer-events: auto;
            -webkit-appearance: none;
            cursor: pointer;
            border: 2px solid #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .range-input input::-moz-range-thumb {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #0F4B46;
            pointer-events: auto;
            -moz-appearance: none;
            cursor: pointer;
            border: 2px solid #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .range-input input::-webkit-slider-thumb:hover {
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
            transform: scale(1.1);
        }

        .range-input input::-moz-range-thumb:hover {
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
            transform: scale(1.1);
        }
    </style>
@endpush
