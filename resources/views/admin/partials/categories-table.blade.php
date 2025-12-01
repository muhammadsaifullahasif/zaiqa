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
                    <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" class="btn btn-danger btn-sm">
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
<div class="divider"></div>
<div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
    {{ $categories->appends(request()->query())->links('pagination::bootstrap-5') }}
</div>
