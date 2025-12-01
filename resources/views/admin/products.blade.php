@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>All Products</h3>
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
                    <div class="text-tiny">All Products</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search" action="{{ route('products.index') }}" method="GET">
                        <fieldset class="name">
                            <input type="text" placeholder="Search by name, slug, category..." class="" name="name" tabindex="2" value="{{ request('name') }}"
                                aria-required="true">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="flex gap10">
                    @if(request('name'))
                        <a class="tf-button btn btn-secondary" href="{{ route('products.index') }}"><i class="icon-x"></i>Clear Search</a>
                    @endif
                    <a class="tf-button btn btn-primary w208" href="{{ route('products.create') }}"><i class="icon-plus"></i>Add new</a>
                </div>
            </div>
            <div class="table-responsive">
                @if (Session::has('status'))
                    <p class="alert alert-success">{{ Session::get('status') }}</p>
                @endif
                @if (Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
                @if(request('name'))
                    <div class="mb-20">
                        <span class="text-tiny">Search results for "<strong>{{ request('name') }}</strong>": {{ $products->total() }} {{ Str::plural('product', $products->total()) }} found</span>
                    </div>
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th class="text-center" style="width: 50px;"><i class="icon icon-star"></i></th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th class="text-center" style="width: 100px;">Variations</th>
                            <th class="text-center" style="width: 50px;">Qty</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td class="text-center">{!! ($product->is_featured ?? 0) == 0 ? "<i class='icon-star'><i>" : "<i class='icon-star1'></i>" !!}</td>
                            <td class="pname">
                                <div class="image">
                                    <img src="{{ asset('uploads/products/thumbnails') }}/{{ $product->product_meta['thumbnail'] }}" alt="" class="image">
                                </div>
                                <div class="name">
                                    <a href="#" class="body-title-2">{{ $product->title }}</a>
                                    <div class="text-tiny mt-3">{{ $product->slug }}</div>
                                </div>
                            </td>
                            <td>
                                @if($product->type === 'variable')
                                    ${{ number_format($product->getMinPrice(), 2) }} - ${{ number_format($product->getMaxPrice(), 2) }}
                                @else
                                    ${{ number_format($product->product_meta['price'] ?? 0, 2) }}
                                @endif
                            </td>
                            {{-- <td>{{ $product->product_meta['SKU'] ?? 'N/A' }}</td> --}}
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->sub_category->name ?? '' }}</td>
                            <td class="text-center">{{ $product->variations()->count() }}</td>
                            <td class="text-center">{{ $product->getTotalQuantity() }}</td>
                            <td>
                                <div class="list-icon-function" style="justify-content: center;">
                                    <a href="#" target="_blank" class="btn btn-success btn-sm">
                                        <div class="item">
                                            <i class="icon-eye"></i>
                                        </div>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn-secondary btn-sm">
                                        <div class="item">
                                            <i class="icon-edit-3"></i>
                                        </div>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="btn btn-danger delete btn-sm">
                                        @csrf
                                        @method('delete')
                                        <div class="item">
                                            <i class="icon-trash-2"></i>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">No Record Found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
	<script>
		$(function(){
			$('.delete').on('click', function(e){
				e.preventDefault();
				var form = $(this).closest('form');
				swal({
					title: "Are you sure?",
					text: "You want to delete this record?",
					type: "warning",
					buttons: ["No","Yes"],
					confirmButtonColor: "#dc3545"
				}).then(function(result){
					if(result) {
						form.submit();
					}
				});
			});
		});
	</script>
@endpush