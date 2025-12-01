@extends('layouts.admin')

@section('content')
{{-- <!-- main-content-wrap --> --}}
<div class="main-content-inner">
    {{-- <!-- main-content-wrap --> --}}
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Add Product</h3>
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
                    <a href="{{ route('products.index') }}">
                        <div class="text-tiny">Products</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Add product</div>
                </li>
            </ul>
        </div>
        {{-- <!-- form-add-product --> --}}
        <form class="form-add-product" id="form-add-product" method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
            @csrf
            @if(session('error'))
                <div class="alert alert-danger mb-20">
                    {{ session('error') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger mb-20">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="tf-section-2">
                <div class="wg-box mb-20">
                    <fieldset class="name">
                        <div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter product name" name="name" tabindex="0" value="{{ old('name') }}" aria-required="true">
                        <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                    </fieldset>
                    @error('name')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">
                        <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter product slug" name="slug" tabindex="0" value="{{ old('slug') }}" aria-required="true">
                        <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                    </fieldset>
                    @error('slug')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror

                    <div class="flex gap10">
                        <div class="gap22 cols flex-grow">
                            <fieldset class="category">
                                <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                                <div class="select">
                                    <select class="parent_category" name="category_id">
                                        <option value="">Choose category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>
                            @error('category_id')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div id="sub-category-container"></div>
                        @error('sub_category_id')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <fieldset class="shortdescription">
                        <div class="body-title mb-10">Short Description <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10 ht-150" name="short_description" id="short_description" placeholder="Short Description" tabindex="0" aria-required="true" rows="3" style="height: auto;">{{ old('short_description') }}</textarea>
                        {{-- <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div> --}}
                    </fieldset>
                    @error('short_description')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror

                    <fieldset class="description">
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10" name="description" id="description" placeholder="Description" tabindex="0" aria-required="true">{{ old('description') }}</textarea>
                        {{-- <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div> --}}
                    </fieldset>
                    @error('description')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="wg-box mb-20">
                    <fieldset>
                        <div class="body-title">Featured images <span class="tf-color-1">*</span></div>
                        <div class="upload-image flex-grow">
                            <div class="item" id="imgpreview" style="display:none">
                                <img src="" class="effect8" alt="">
                            </div>
                            <div id="upload-file" class="item up-load" style="grid-template-columns: auto;">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your image here or select <span class="tf-color">click to browse</span></span>
                                    <input type="file" id="myFile" name="image" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="body-title">Upload Gallery Images <span class="tf-color-1">*</span></div>
                        <input type="hidden" id="attachments" name="images">
                        <div class="form-group dropzone" id="my-dropzone">
                            <div class="dz-message" data-dz-message>
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="text-tiny">Drop your images here or select <span class="tf-color">click to browse</span></span>
                            </div>
                            <!-- Dropzone Preview Template -->
                            <div id="preview-template" style="display: none;">
                                <div class="dz-preview dz-file-preview">
                                    <div class="dz-image">
                                        <img data-dz-thumbnail />
                                    </div>
                                    <div class="dz-details">
                                        <div class="dz-filename"><span data-dz-name></span></div>
                                        <div class="dz-size" data-dz-size></div>
                                    </div>
                                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                    <div class="dz-success-mark"><i class="fa fa-check"></i></div>
                                    <div class="dz-error-mark"><i class="fa fa-close"></i></div>
                                    <a class="dz-remove" href="javascript:undefined;" data-dz-remove>Remove</a>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    @error('images')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror

                    <fieldset class="featured">
                        <div class="body-title mb-10">Featured:</div>
                        <div class="select mb-10">
                            <select name="featured" id="featured">
                                <option value="0" {{ old('featured') == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('featured') == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="body-title mb-10">Unit:</div>
                        <div class="select mb-10">
                            <select name="unit" id="unit">
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->symbol }}" data-name="{{ $unit->name }}" data-symbol="{{ $unit->symbol }}">{{ $unit->name }} - {{ $unit->symbol }}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="tf-section-1">
                <div class="wg-box mb-20">
                    <h6>Variations</h6>
                    <div class="wg-table">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Unit</th>
                                        <th>SKU</th>
                                        <th>Regular Price</th>
                                        <th>Sale Price</th>
                                        <th>Quantity</th>
                                        <th>VAT</th>
                                        <th style="width: 3vw;"></th>
                                    </tr>
                                </thead>
                                <tbody id="product-variation">
                                    <tr>
                                        <td class="variation-image-container">
                                            <div class="variation-image text-center" style="display: none;">
                                                <img src="" alt="">
                                            </div>
                                            <input type="file" name="variations[image][]" class="variation-image-upload">
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="variations[unit][]" class="form-control form-control-sm" placeholder="Unit">
                                                <span class="input-group-text">/&nbsp;<span class="unit"></span></span>
                                            </div>
                                        </td>
                                        <td><input type="text" name="variations[SKU][]" class="form-control form-control-sm" placeholder="SKU"></td>
                                        <td><input type="text" name="variations[regular_price][]" class="form-control form-control-sm" placeholder="Regular Price"></td>
                                        <td><input type="text" name="variations[sale_price][]" class="form-control form-control-sm" placeholder="Sale Price"></td>
                                        <td><input type="text" name="variations[quantity][]" class="form-control form-control-sm" placeholder="Quantity"></td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="variations[vat][]" class="form-control form-control-sm" placeholder="VAT">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </td>
                                        <td><button class="tf-button btn-secondary border-0 btn-sm" id="variation-add-btn"><i class="icon icon-plus"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="cols gap10">
                        <button class="tf-button btn btn-primary" type="submit">Add product</button>
                    </div>
                </div>
            </div>

        </form>
        {{-- <!-- /form-add-product --> --}}
    </div>
    {{-- <!-- /main-content-wrap --> --}}
</div>
{{-- <!-- /main-content-wrap --> --}}
@endsection

@push('scripts')
    <script>
        $(function(){
            $(document).on('change', '.parent_category', function(){
                var parent_id = $(this).val();

                if (parent_id !== '') {
                    $.ajax({
                        url: '{{ route("admin.category.get-sub-category") }}',
                        method: 'POST',
                        data: {
                            parent_id: parent_id,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log('Response:', response);

                            if (response.data && response.data.length > 0) {
                                var subCategoryHtml = '<div class="gap22 cols"><fieldset class="category">';
                                subCategoryHtml += '<div class="body-title mb-10">Sub Category <span class="tf-color-1">*</span></div>';
                                subCategoryHtml += '<div class="select"><select name="sub_category_id" required>';
                                subCategoryHtml += '<option value="">Choose sub category</option>';

                                $.each(response.data, function(index, subCategory) {
                                    subCategoryHtml += '<option value="' + subCategory.id + '">' + subCategory.name + '</option>';
                                });

                                subCategoryHtml += '</select></div>';
                                subCategoryHtml += '@error("sub_category_id")<span class="alert alert-danger">{{ $message }}</span>@enderror';
                                subCategoryHtml += '</fieldset></div>';
                                $('#sub-category-container').html(subCategoryHtml).addClass('flex-grow');
                            } else {
                                $('#sub-category-container').html('').removeClass('flex-grow');
                            }
                        },
                        error: function(xhr, status, error) {
                            alert('Error saving policy heading: ' + (xhr.responseJSON?.message || error));
                            console.error('Error:', xhr.responseJSON);
                        }
                    });
                } else {
                    $('#sub-category-container').html('');
                }
            });

            $('#myFile').on('change', function(e){
                const photoInp = $('#myFile');
                const [file] = this.files;
                if(file) {
                    $('#imgpreview img').attr('src', URL.createObjectURL(file));
                    $('#imgpreview').show();
                }
            });

            $('#unit').on('change', variation_unit);

            function variation_unit() {
                var unit = $('#unit option:selected').attr('data-symbol');

                if(unit) {
                    $('.unit').html(unit);
                }
            }

            variation_unit();

            $('#variation-add-btn').on('click', function(e){
                e.preventDefault();
                var variationIndex = $('#product-variation tr').length;
                $('#product-variation').append(`
                    <tr>
                        <td class="variation-image-container">
                            <div class="variation-image text-center" style="display: none;">
                                <img src="" alt="">
                            </div>
                            <input type="file" name="variations[image][]" class="variation-image-upload">
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="variations[unit][]" class="form-control form-control-sm" placeholder="Unit">
                                <span class="input-group-text">/&nbsp;<span class="unit">${$('#unit option:selected').attr('data-symbol')}</span></span>
                            </div>
                        </td>
                        <td><input type="text" name="variations[SKU][]" class="form-control form-control-sm" placeholder="SKU"></td>
                        <td><input type="text" name="variations[regular_price][]" class="form-control form-control-sm" placeholder="Regular Price"></td>
                        <td><input type="text" name="variations[sale_price][]" class="form-control form-control-sm" placeholder="Sale Price"></td>
                        <td><input type="text" name="variations[quantity][]" class="form-control form-control-sm" placeholder="Quantity"></td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="variations[vat][]" class="form-control form-control-sm" placeholder="VAT">
                                <span class="input-group-text">%</span>
                            </div>
                        </td>
                        <td><button class="tf-button btn-danger btn-sm variation-delete-btn"><i class="icon icon-minus"></i></button></td>
                    </tr>
                `);
            });

            $(document).on('click', '.variation-delete-btn', function(e){
                e.preventDefault();
                $(this).parents('tr').remove();
            });

            $(document).on('change', '.variation-image-upload', function(e){
                var variation_image = $(this).parents('.variation-image-container').find('.variation-image');
                const [file] = this.files;
                if(file) {
                    variation_image.find('img').attr('src', URL.createObjectURL(file));
                    variation_image.show();
                }
            });

            $("input[name='name']").on('change', function(){
                $("input[name='slug']").val(nameToSlug($(this).val()));
            });
        });

        function nameToSlug(text) {
            return text.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
        }

        // Form Validation
        $('#form-add-product').on('submit', function(e) {
            let errors = [];

            // 1. Product title is required
            const title = $('input[name="name"]').val().trim();
            if (!title) {
                errors.push('Product title is required');
            }

            // 2. Product slug is required
            const slug = $('input[name="slug"]').val().trim();
            if (!slug) {
                errors.push('Product slug is required');
            }

            // 3. Category is required
            const category = $('select[name="category_id"]').val();
            if (!category) {
                errors.push('Category is required');
            }

            // 4. Sub Category is required if available
            const subCategorySelect = $('select[name="sub_category_id"]');
            if (subCategorySelect.length > 0 && subCategorySelect.find('option').length > 1) {
                const subCategory = subCategorySelect.val();
                if (!subCategory) {
                    errors.push('Sub Category is required');
                }
            }

            // 5. Short Description is required
            const shortDescription = $('textarea[name="short_description"]').val().trim();
            if (!shortDescription) {
                errors.push('Short Description is required');
            }

            // 6. Description is required
            const descriptionEditor = tinymce.get('description');
            const description = descriptionEditor ? descriptionEditor.getContent() : '';
            if (!description || description.trim() === '' || description.trim() === '<p></p>') {
                errors.push('Description is required');
            }

            // 7. Unit is required
            const unit = $('select[name="unit"]').val();
            if (!unit) {
                errors.push('Unit is required');
            }

            // 8. Feature image is required
            const featureImage = $('#myFile').val();
            if (!featureImage || featureImage.trim() === '') {
                errors.push('Feature image is required');
            }

            // 9. At least one variation is required
            const variationRows = $('#product-variation tr').length;
            if (variationRows === 0) {
                errors.push('At least one variation is required');
            } else {
                // Check if at least one variation has required fields
                let hasValidVariation = false;
                $('#product-variation tr').each(function() {
                    const variationUnit = $(this).find('input[name="variations[unit][]"]').val();
                    const variationSKU = $(this).find('input[name="variations[SKU][]"]').val();
                    const regularPrice = $(this).find('input[name="variations[regular_price][]"]').val();
                    const quantity = $(this).find('input[name="variations[quantity][]"]').val();
                    const variationImage = $(this).find('input[name="variations[image][]"]').val();

                    if (variationUnit && variationUnit.trim() !== '' &&
                        variationSKU && variationSKU.trim() !== '' &&
                        regularPrice && regularPrice.trim() !== '' &&
                        quantity && quantity.trim() !== '' &&
                        variationImage && variationImage.trim() !== '') {
                        hasValidVariation = true;
                    }
                });

                if (!hasValidVariation) {
                    errors.push('At least one variation with Unit, SKU, Regular Price, Quantity, and Image is required');
                }
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
                $('.form-add-product .alert-danger').remove();

                // Add new error messages at the top of the form
                $('.form-add-product').prepend(errorHtml);

                // Scroll to top
                $('html, body').animate({
                    scrollTop: $('.form-add-product').offset().top - 100
                }, 500);

                // Focus on the first field with error
                setTimeout(function() {
                    if (!title) {
                        $('input[name="name"]').focus();
                    } else if (!slug) {
                        $('input[name="slug"]').focus();
                    } else if (!category) {
                        $('select[name="category_id"]').focus();
                    } else if (!shortDescription) {
                        $('textarea[name="short_description"]').focus();
                    } else if (!description || description.trim() === '' || description.trim() === '<p></p>') {
                        // Focus TinyMCE editor
                        const editor = tinymce.get('description');
                        if (editor) {
                            editor.focus();
                        }
                    } else if (!unit) {
                        $('select[name="unit"]').focus();
                    } else if (!featureImage || featureImage.trim() === '') {
                        $('#myFile').focus();
                    }
                }, 100);

                return false;
            }

            return true;
        });
    </script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script type="text/javascript">
        let attached_files_array = []; // Array to store uploaded filenames

        Dropzone.autoDiscover = false;
        const dropzone = new Dropzone("#my-dropzone", {
			url: "{{ route('products.upload-attachments') }}",
			parallelUploads: 5,
			uploadMultiple: false,
			maxFilesize: 5,
            acceptedFiles: 'image/png,image/jpg,image/jpeg',
			addRemoveLinks: false,
            thumbnailWidth: 120,
            thumbnailHeight: 120,
            previewTemplate: document.querySelector('#preview-template').innerHTML,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            // Success handler
			success: function(file, response) {
                console.log('Upload success:', response);

                // Check if upload was successful
                if (response.success) {
                    // Store the filename in the file object for later retrieval
                    file.serverFileName = response.filename;

                    // Add filename to array
                    attached_files_array.push(response.filename);

                    // Update hidden input with all filenames (comma-separated, no spaces)
                    $('#attachments').val(attached_files_array.join(','));

                    console.log('All files:', attached_files_array);
                }
			},

            // Remove file handler
			removedfile: function(file) {
                // Get the filename from the file object
                let filename = file.serverFileName || '';

                // Remove from array
                if (filename) {
                    attached_files_array = attached_files_array.filter(f => f.trim() !== filename.trim());
                    $('#attachments').val(attached_files_array.join(','));

                    // Delete file from server
                    $.ajax({
                        url: "{{ route('products.delete-attachment') }}",
                        type: 'DELETE',
                        data: {
                            filename: filename,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log('File deleted from server:', filename);
                        },
                        error: function(xhr, status, error) {
                            console.error('Failed to delete file from server:', error);
                        }
                    });
                }

                console.log('Removed file:', filename);
                console.log('Remaining files:', attached_files_array);

                // Remove preview element (Dropzone's default behavior)
                if (file.previewElement && file.previewElement.parentNode) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
			},

            // Error handling
            error: function(file, response) {
                console.error('Upload error:', response);
                let errorMessage = 'Upload failed';

                if (typeof response === 'string') {
                    errorMessage = response;
                } else if (response.message) {
                    errorMessage = response.message;
                }

                alert(errorMessage);

                // Remove the failed file from dropzone
                this.removeFile(file);
            }
		});
    </script>
@endpush

@push('styles')
    <!-- Insert the blade containing the TinyMCE configuration and source script -->
    <script src="https://cdn.tiny.cloud/1/mlauos07cudrq3xfrvjgl0wp8pgq5xh2tykr3fss90btdnpf/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
    <script>
        tinymce.init({
            selector: 'textarea#description', // Replace this CSS selector to match the placeholder element for TinyMCE
            menubar: false,
            branding: false,
            statusbar: false,
            height: 200,
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
    <style>
        /* #upload-file::has(#myFile) {
            grid-template-columns: auto !important;
        } */

        #product-variation input {
            border-color: #ddd !important;
        }

        #product-variation .variation-image-container {
            display: flex;
            align-items: center;
            gap: 5px;
            width: 100%;
        }

        #product-variation .variation-image-container .variation-image img {
            max-height: 60px;
            max-width: 60px;
            object-fit: contain;
        }

        #product-variation .variation-image-container input[type="file"] {
            width: 100%;
            display: inline;
        }

        /* Dropzone Styles */
        #my-dropzone {
            border: 2px dashed #ccc;
            border-radius: 5px;
            background: #fafafa;
            padding: 20px;
            min-height: 150px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        #my-dropzone .dz-message {
            text-align: center;
            margin: 2em auto;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        #my-dropzone .dz-message .icon {
            font-size: 48px;
            color: #999;
        }

        #my-dropzone .dz-message .text-tiny {
            color: #666;
            font-size: 14px;
        }

        #my-dropzone .dz-message .tf-color {
            color: #2377fc;
        }

        #my-dropzone .dz-preview {
            display: flex;
            flex-direction: column;
            margin: 0;
            width: 140px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 10px;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            text-align: center;
            position: relative;
        }

        #my-dropzone .dz-preview .dz-image {
            border-radius: 5px;
            overflow: hidden;
            width: 120px;
            height: 120px;
            position: relative;
            display: block;
            z-index: 10;
            margin: 0 auto;
        }

        #my-dropzone .dz-preview .dz-image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #my-dropzone .dz-preview .dz-details {
            opacity: 1;
            font-size: 11px;
            width: 120px;
            padding: 8px 0;
            text-align: center;
            color: #333;
            line-height: 1.4;
        }

        #my-dropzone .dz-preview .dz-details .dz-filename {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        #my-dropzone .dz-preview .dz-details .dz-size {
            font-size: 10px;
            color: #999;
            margin-top: 3px;
        }

        #my-dropzone .dz-preview .dz-remove {
            font-size: 11px;
            text-align: center;
            display: block;
            cursor: pointer;
            border: none;
            background: #dc3545;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            margin-top: 8px;
            transition: background 0.2s;
            width: 100%;
        }

        #my-dropzone .dz-preview .dz-remove:hover {
            background: #c82333;
        }

        #my-dropzone .dz-preview .dz-success-mark,
        #my-dropzone .dz-preview .dz-error-mark {
            display: none;
        }

        #my-dropzone .dz-preview .dz-progress {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
            margin-top: 5px;
        }

        #my-dropzone .dz-preview .dz-upload {
            background: #28a745;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush