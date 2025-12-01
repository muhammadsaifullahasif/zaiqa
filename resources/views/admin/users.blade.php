@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Users</h3>
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
                    <div class="text-tiny">All User</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search" action="{{ route('admin.users') }}" method="GET">
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
                    <a href="{{ route('admin.users') }}" class="tf-button btn btn-secondary">Clear Search</a>
                </div>
                @endif
                <a class="tf-button btn btn-primary w208" href="{{ route('admin.user.add') }}"><i
						class="icon-plus"></i>Add user</a>

            </div>
            <div class="wg-table table-all-user">

                <div class="table-responsive">
                    @if(request()->has('name') && request()->input('name') != '')
                        <div class="alert alert-info">
                            Search results for "{{ request()->input('name') }}" - {{ $users->total() }} {{ Str::plural('result', $users->total()) }} found
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="text-center" style="width: 150px;">Total Orders</th>
                                <th style="width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td class="pname">
                                        @if (isset($user->user_meta['profile_image']))
                                            <div class="image">
                                                <img src="{{ asset('uploads/users') }}/{{ $user->user_meta['profile_image'] }}" style="border-radius: 999px;">
                                            </div>
                                        @endif
                                        <div class="name">
                                            <a href="#" class="body-title-2">{{ $user->name }}</a>
                                            <div class="text-tiny mt-3">{{$user->utype}}</div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->user_meta['phone'] ?? '' }}</td>
                                    <td class="text-center"><a href="#" target="_blank">{{ $user->orders->count() }}</a></td>
                                    <td>
                                        <div class="list-icon-function" style="justify-content: center;">
                                            <a href="{{ route('admin.user.edit', $user->id) }}">
                                                <div class="item edit">
                                                    <i class="icon-edit-3"></i>
                                                </div>
                                            </a>
                                            @if ($user->utype !== 'Admin')
                                                <form action="{{ route('products.destroy', $user->id) }}" method="POST" class="btn btn-danger delete btn-sm">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="item">
                                                        <i class="icon-trash-2"></i>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td class="text-center" colspan="6">No record found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $users->appends(request()->query())->links('pagination::bootstrap-5') }}
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