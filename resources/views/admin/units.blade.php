@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
	<div class="main-content-wrap">
		<div class="flex items-center flex-wrap justify-between gap20 mb-27">
			<h3>Units</h3>
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
					<div class="text-tiny">Units</div>
				</li>
			</ul>
		</div>

		<div class="wg-box">
			<div class="flex items-center justify-between gap10 flex-wrap">
				<div class="wg-filter flex-grow">
					<form class="form-search" action="{{ route('admin.units') }}" method="GET">
						<fieldset class="name">
							<input type="text" placeholder="Search here..." class="" name="name"
								tabindex="2" value="{{ request()->input('name') }}" aria-required="true">
						</fieldset>
						<div class="button-submit">
							<button class="" type="submit"><i class="icon-search"></i></button>
						</div>
					</form>
				</div>
				@if(request()->has('name') && request()->input('name') != '')
				<div>
					<a href="{{ route('admin.units') }}" class="tf-button btn btn-secondary">Clear Search</a>
				</div>
				@endif
				<a class="tf-button btn btn-primary w208" href="{{ route('admin.units.create') }}"><i
						class="icon-plus"></i>Add new</a>
			</div>
			<div class="wg-table table-all-units">
				<div class="table-responsive">
					@if (Session::has('status'))
						<p class="alert alert-success">{{ Session::get('status') }}</p>
					@endif
					@if(request()->has('name') && request()->input('name') != '')
						<div class="alert alert-info">
							Search results for "{{ request()->input('name') }}" - {{ $units->total() }} {{ Str::plural('result', $units->total()) }} found
						</div>
					@endif
					<table class="table table-striped table-bordered w-full">
						<thead>
							<tr>
								<th style="width: 30px;">#</th>
								<th>Name</th>
								<th class="text-center" style="width: 50px;">Symbol</th>
								<th style="width: 50px;">Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($units as $unit)
							<tr>
								<td>{{ $unit->id }}</td>
								<td>{{ $unit->name }}</td>
								<td class="text-center">{{ $unit->symbol }}</td>
								<td>
									<div class="list-icon-function" style="justify-content: center;">
										<a href="{{ route('admin.units.edit', $unit->id) }}" class="btn-secondary btn-sm">
											<div class="item">
												<i class="icon-edit-3"></i>
											</div>
										</a>
										<form action="{{ route('admin.units.delete', $unit->id) }}" method="POST" class="btn btn-danger delete btn-sm">
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
								<td colspan="4" class="text-center">No Record Found.</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
				<div class="divider"></div>
				<div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
					{{ $units->appends(request()->query())->links('pagination::bootstrap-5') }}
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