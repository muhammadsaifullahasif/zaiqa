@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
	<div class="main-content-wrap">
		<div class="flex items-center flex-wrap justify-between gap20 mb-27">
			<h3>Categories</h3>
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
					<div class="text-tiny">Categories</div>
				</li>
			</ul>
		</div>

		<div class="wg-box">
			<div class="flex items-center justify-between gap10 flex-wrap">
				<div class="wg-filter flex-grow">
					<form class="form-search d-flex gap10" action="{{ route('admin.categories') }}" method="GET">
						<fieldset class="name">
							<input type="text" placeholder="Search here..." class="" name="s"
								tabindex="2" value="{{ request()->input('s') }}" aria-required="true">
						</fieldset>
						<div class="select">
							<select name="type_filter" class="select w160 select-primary" onchange="this.form.submit()">
								<option value="">All Categories</option>
								<option value="all" {{ request()->input('type_filter') == 'all' ? 'selected' : '' }}>All</option>
								<option value="only-parent" {{ request()->input('type_filter') == 'only-parent' ? 'selected' : '' }}>Only Parent</option>
								<option value="only-sub" {{ request()->input('type_filter') == 'only-sub' ? 'selected' : '' }}>Only Sub</option>
							</select>
						</div>
					</form>
				</div>
				@if(request()->has('s') && request()->input('s') != '' || request()->has('type_filter') && request()->input('type_filter') != '')
				<div>
					<a href="{{ route('admin.categories') }}" class="tf-button btn btn-secondary">Clear Search</a>
				</div>
				@endif
				<a class="tf-button btn btn-primary w208" href="{{ route('admin.category.add') }}"><i
						class="icon-plus"></i>Add new</a>
			</div>
			<div class="wg-table table-all-user">
				<div class="table-responsive">
					@if (Session::has('status'))
						<p class="alert alert-success">{{ Session::get('status') }}</p>
					@endif
					@if(request()->has('s') && request()->input('s') != '')
						<div class="mb-20">
							<span class="text-tiny">Search results for "<strong>{{ request()->input('s') }}</strong>": {{ $categories->total() }} {{ Str::plural('category', $categories->total()) }} found</span>
						</div>
					@endif
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="width: 50px;">#</th>
								<th>Name</th>
								<th>Slug</th>
								<th>Parent Category</th>
								<th class="text-center" style="width: 150px;">Products</th>
								<th style="width: 150px;">Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($categories as $category)
							<tr>
								<td>{{ $category->id }}</td>
								<td class="pname">
									<div class="image">
										<img src="{{ asset('uploads/categories') }}/{{ $category->image }}" alt="{{ $category->name }}" class="image">
									</div>
									<div class="name">
										<a href="#" class="body-title-2">{{ $category->name }}</a>
									</div>
								</td>
								<td>{{ $category->slug }}</td>
								<td>{{ $category->parent_category->name ?? '' }}</td>
								<td class="text-center">{{ $category->products_count }}</td>
								<td>
									<div class="list-icon-function" style="justify-content: center;">
										<a href="{{ route('admin.category.edit', $category->id) }}" class="btn-secondary btn-sm">
											<div class="item">
												<i class="icon-edit-3"></i>
											</div>
										</a>
										<form action="{{ route('admin.category.delete', $category->id) }}" method="POST" class="btn btn-danger btn-sm delete">
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
								<td colspan="6" class="text-center">No Record Found.</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
				<div class="divider"></div>
				<div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
					{{ $categories->appends(request()->query())->links('pagination::bootstrap-5') }}
				</div>
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