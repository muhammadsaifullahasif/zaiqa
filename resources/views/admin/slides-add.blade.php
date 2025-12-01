@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Slide</h3>
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
                    <a href="{{ route('admin.slides') }}">
                        <div class="text-tiny">Slides</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">New Slide</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" id="form-add-slide" action="{{ route('admin.slides.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset class="name">
                    <div class="body-title">Tagline <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Tagline" name="tagline" tabindex="0" value="{{ old('tagline') }}" aria-required="true">
                </fieldset>
                @error('tagline')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <fieldset class="name">
                    <div class="body-title">Title <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Title" name="title" tabindex="0" value="{{ old('title') }}" aria-required="true">
                </fieldset>
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <fieldset class="name">
                    <div class="body-title">Subtitle <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Subtitle" name="subtitle" tabindex="0" value="{{ old('subtitle') }}" aria-required="true">
                </fieldset>
                @error('subtitle')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <fieldset class="name">
                    <div class="body-title">Link <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Link" name="link" tabindex="0" value="{{ old('link') }}" aria-required="true">
                </fieldset>
                @error('link')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <fieldset>
                    <div class="body-title">Upload images <span class="tf-color-1">*</span>
                    </div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="" class="effect8" alt="">
                        </div>
                        <div class="item up-load" style="grid-template-columns: auto;">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                <input type="file" id="myFile" name="image">
                            </label>
                        </div>
                    </div>
                </fieldset>
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <fieldset class="category">
                    <div class="body-title">Status</div>
                    <div class="select flex-grow">
                        <select class="" name="status">
                            <option value="">Select Status</option>
                            <option value="1" @if(old('status') == '1') selected @endif>Active</option>
                            <option value="0" @if(old('status') == '0') selected @endif>Inactive</option>
                        </select>
                    </div>
                </fieldset>
                @error('status')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>
        <!-- /new-category -->
    </div>
    <!-- /main-content-wrap -->
</div>
@endsection

@push('scripts')
    <script>
        $(function(){
            // Form Validation
            $('#form-add-slide').on('submit', function(e) {
                let errors = [];

                // 1. Tagline is required
                const tagline = $('input[name="tagline"]').val().trim();
                if (!tagline) {
                    errors.push('Tagline is required');
                }

                // 2. Title is required
                const title = $('input[name="title"]').val().trim();
                if (!title) {
                    errors.push('Title is required');
                }

                // 3. Subtitle is required
                const subtitle = $('input[name="subtitle"]').val().trim();
                if (!subtitle) {
                    errors.push('Subtitle is required');
                }

                // 4. Link is required and must be a valid URL
                const link = $('input[name="link"]').val().trim();
                if (!link) {
                    errors.push('Link is required');
                } else {
                    // URL validation regex
                    const urlPattern = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
                    if (!urlPattern.test(link)) {
                        errors.push('Link must be a valid URL (e.g., https://example.com or /shop/products)');
                    }
                }

                // 5. Slide image is required
                const slideImage = $('#myFile').val();
                if (!slideImage || slideImage.trim() === '') {
                    errors.push('Slide image is required');
                }

                // 6. Status is required
                const status = $('select[name="status"]').val();
                if (!status) {
                    errors.push('Status is required');
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
                    $('#form-add-slide .alert-danger').remove();

                    // Add new error messages at the top of the form
                    $('#form-add-slide').prepend(errorHtml);

                    // Scroll to top
                    $('html, body').animate({
                        scrollTop: $('#form-add-slide').offset().top - 100
                    }, 500);

                    // Focus on the first field with error
                    setTimeout(function() {
                        if (!tagline) {
                            $('input[name="tagline"]').focus();
                        } else if (!title) {
                            $('input[name="title"]').focus();
                        } else if (!subtitle) {
                            $('input[name="subtitle"]').focus();
                        } else if (!link) {
                            $('input[name="link"]').focus();
                        } else if (!slideImage || slideImage.trim() === '') {
                            $('#myFile').focus();
                        } else if (!status) {
                            $('select[name="status"]').focus();
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
        });
    </script>
@endpush