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
                    <a href="{{ route('admin.units') }}">
                        <div class="text-tiny">Units</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">New Unit</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" id="form-add-unit" action="{{ route('admin.units.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset class="name">
                    <div class="body-title">Unit Name <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Unit name" name="name"
                        tabindex="0" value="{{ old('name') }}" aria-required="true">
                </fieldset>
                @error('name')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                <fieldset class="symbol">
                    <div class="body-title">Unit Symbol <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Unit Symbol" name="symbol"
                        tabindex="0" value="{{ old('symbol') }}" aria-required="true">
                </fieldset>
                @error('symbol')
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
            $('#form-add-unit').on('submit', function(e) {
                // e.preventDefault();
                let errors = [];

                // 1. Unit name is required
                const name = $('input[name="name"]').val().trim();
                if (!name) {
                    errors.push('Unit name is required');
                }

                // 2. Unit symbol is required
                const symbol = $('input[name="symbol"]').val().trim();
                if (!symbol) {
                    errors.push('Unit symbol is required');
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
                    $('#form-add-unit .alert-danger').remove();

                    // Add new error messages at the top of the form
                    $('#form-add-unit').prepend(errorHtml);

                    // Scroll to top
                    $('html, body').animate({
                        scrollTop: $('#form-add-unit').offset().top - 100
                    }, 500);

                    // Focus on the first field with error
                    setTimeout(function() {
                        if (!name) {
                            $('input[name="name"]').focus();
                        } else if (!symbol) {
                            $('input[name="symbol"]').focus();
                        }
                    }, 100);

                    return false;
                }

                return true;
            });
        });
    </script>
@endpush