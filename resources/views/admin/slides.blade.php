@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Slider</h3>
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
                    <div class="text-tiny">Slides</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search" action="{{ route('admin.slides') }}" method="GET">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value="{{ request()->input('name') }}" aria-required="true">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                @if(request()->has('name') && request()->input('name') != '')
                <div>
                    <a href="{{ route('admin.slides') }}" class="tf-button btn btn-secondary">Clear Search</a>
                </div>
                @endif
                <a class="tf-button btn btn-primary w208" href="{{ route('admin.slides.add') }}"><i class="icon-plus"></i>Add new</a>
            </div>
            <div class="wg-table table-all-user">
                @if (Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif
                @if(request()->has('name') && request()->input('name') != '')
                    <div class="alert alert-info">
                        Search results for "{{ request()->input('name') }}" - {{ $slides->total() }} {{ Str::plural('result', $slides->total()) }} found
                    </div>
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Tagline</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($slides as $slide)
                        <tr>
                            <td>{{ $slide->id }}</td>
                            <td class="pname">
                                <div class="image">
                                    <img src="{{ asset('uploads/slides') }}/{{ $slide->image }}" alt="{{ $slide->title }}" class="image">
                                </div>
                            </td>
                            <td>{{ $slide->tagline }}</td>
                            <td>{{ $slide->title }}</td>
                            <td>{{ $slide->subtitle }}</td>
                            <td class="slide-link" title="{{ $slide->link }}">{{ $slide->link }}</td>
                            <td>
                                <div class="list-icon-function" style="justify-content: center;">
                                    <a href="{{ route('admin.slides.edit', $slide->id) }}">
                                        <div class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </div>
                                    </a>
                                    <form action="{{ route('admin.slide.delete', $slide->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <div class="item text-danger delete">
                                            <i class="icon-trash-2"></i>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No record found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $slides->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <style>
        .slide-link {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endpush

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