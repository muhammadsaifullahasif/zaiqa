@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Category infomation</h3>
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
                    <a href="{{ route('admin.categories') }}">
                        <div class="text-tiny">Categories</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">New Category</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" id="form-add-category" action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset class="name">
                    <div class="body-title">Category Name <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Category name" name="name" id="name"
                        tabindex="0" value="{{ old('name') }}" aria-required="true">
                </fieldset>
                @error('name')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                <fieldset class="name">
                    <div class="body-title">Category Slug <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Category Slug" name="slug" id="slug"
                        tabindex="0" value="{{ old('slug') }}" aria-required="true">
                </fieldset>
                @error('slug')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                <fieldset class="category">
                    <div class="body-title">Parent Category:</div>
                    <div class="select w-100">
                        <select name="parent_category" id="parent_category">
                            <option value="">Select Parent</option>
                            @foreach ($parent_categories as $parent_category)
                                <option value="{{ $parent_category->id }}" @if($parent_category->id === old('parent_category')) selected @endif>{{ $parent_category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="body-title">Upload images <span class="tf-color-1">*</span>
                    </div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="" class="effect8" alt="">
                        </div>
                        <div id="upload-file" class="item up-load" style="grid-template-columns: auto;">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Drop your images here or select <span
                                        class="tf-color">click to browse</span></span>
                                <input type="file" id="myFile" name="image" accept="image/*">
                            </label>
                        </div>
                    </div>
                </fieldset>
                @error('image')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

                <div class="bot">
                    <div></div>
                    <button class="tf-button btn btn-primary w208" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function(){
            // Form Validation
            $('#form-add-category').on('submit', function(e) {
                let errors = [];

                // 1. Category name is required
                const name = $('input[name="name"]').val().trim();
                if (!name) {
                    errors.push('Category name is required');
                }

                // 2. Category slug is required
                const slug = $('input[name="slug"]').val().trim();
                if (!slug) {
                    errors.push('Category slug is required');
                }

                // 3. Feature image is required
                const categoryImage = $('#myFile').val();
                if (!categoryImage || categoryImage.trim() === '') {
                    errors.push('Category image is required');
                }

                // Display errors
                if (errors.length > 0) {
                    e.preventDefault();

                    let errorHtml = '<div class="alert alert-danger mb-20"><ul>';
                    errors.forEach(function(error) {
                        errorHtml += '<li>' + error + '</li>';
                    });
                    errorHtml += '</ul></div>';

                    // Remove existing error messages
                    $('#form-add-category .alert-danger').remove();

                    // Add new error messages at the top of the form
                    $('#form-add-category').prepend(errorHtml);

                    // Scroll to top
                    $('html, body').animate({
                        scrollTop: $('#form-add-category').offset().top - 100
                    }, 500);

                    // Focus on the first field with error
                    setTimeout(function() {
                        if (!name) {
                            $('input[name="name"]').focus();
                        } else if (!slug) {
                            $('input[name="slug"]').focus();
                        } else if (!categoryImage || categoryImage.trim() === '') {
                            $('#myFile').focus();
                        }
                    }, 100);

                    return false;
                }

                return true;
            });

            $('#myFile').on('change', function(e){
                const photoInp = $('#myFile');
                const [file] = this.files;
                if(file) {
                    $('#imgpreview img').attr('src', URL.createObjectURL(file));
                    $('#imgpreview').show();
                }
            });
            $("input[name='name']").on('change', function(){
                $("input[name='slug']").val(nameToSlug($(this).val()));
            });
        });

        function nameToSlug(text) {
            return text.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
        }
    </script>
@endpush