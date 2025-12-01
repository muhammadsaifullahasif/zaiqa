@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Shipping Policy</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.users') }}">
                        <div class="text-tiny">Users</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li> --}}
                <li>
                    <div class="text-tiny">Shipping Policy</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box mb-20">
            <h6>Shipping Rates</h6>
            @if (Session::has('shipping_status'))
                <p class="alert alert-success">{{ Session::get('shipping_status') }}</p>
            @endif
            @if (Session::has('shipping_error'))
                <p class="alert alert-danger">{{ Session::get('shipping_error') }}</p>
            @endif
            <form class="form-shipping-policy" action="{{ route('admin.shipping-policy.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="wg-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>ZipCode</th>
                                    <th>Rate</th>
                                    <th style="width: 80px;">Default</th>
                                    <th style="width: 80px;"></th>
                                </tr>
                            </thead>
                            <tbody id="shipping-policy-table">
                                @forelse ($shipping_rates as $index => $shipping_rate)
                                    <tr>
                                        <td>
                                            <input type="hidden" name="id[]" value="{{ $shipping_rate->id }}">
                                            <input type="text" class="form-control" name="location[]" value="{{ $shipping_rate->name }}" required>
                                        </td>
                                        <td><input type="text" class="form-control" name="zipcode[]" value="{{ $shipping_rate->zipcode }}" required></td>
                                        <td><input type="number" step="0.01" class="form-control" name="rate[]" value="{{ $shipping_rate->rate }}" required></td>
                                        <td class="text-center"><input type="radio" name="default" value="{{ $index }}" {{ $shipping_rate->is_default ? 'checked' : '' }}></td>
                                        <td>
                                            @if($loop->first)
                                                <button class="tf-button btn-secondary border-0 btn-sm" id="shipping-policy-add-btn"><i class="icon icon-plus"></i></button>
                                            @else
                                                <button class="tf-button btn-danger border-0 btn-sm shipping-policy-delete-btn"><i class="icon icon-minus"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>
                                            <input type="hidden" name="id[]" value="">
                                            <input type="text" class="form-control" name="location[]" required>
                                        </td>
                                        <td><input type="text" class="form-control" name="zipcode[]" required></td>
                                        <td><input type="number" step="0.01" class="form-control" name="rate[]" required></td>
                                        <td class="text-center"><input type="radio" name="default" value="0" checked></td>
                                        <td><button class="tf-button btn-secondary border-0 btn-sm" id="shipping-policy-add-btn"><i class="icon icon-plus"></i></button></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bot">
                    <div></div>
                    <button class="tf-button btn btn-primary w208" type="submit">Save</button>
                </div>
            </form>
        </div>

        <div class="wg-box" id="vat-section">
            <h6>VAT</h6>
            @if (Session::has('vat_status'))
                <p class="alert alert-success">{{ Session::get('vat_status') }}</p>
            @endif
            @if (Session::has('vat_error'))
                <p class="alert alert-danger">{{ Session::get('vat_error') }}</p>
            @endif
            <form class="form-vat" action="{{ route('admin.shipping-policy.vat_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset class="vat w-half">
                    <div class="body-title mb-10">VAT <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Enter VAT %" name="vat" tabindex="0" value="{{ old('vat', $vat) }}" aria-required="true" required="">
                </fieldset>

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
            // Scroll to VAT section if VAT was updated
            @if (Session::has('vat_status') || Session::has('vat_error'))
                $('html, body').animate({
                    scrollTop: $('#vat-section').offset().top - 100
                }, 500);
            @endif

            $(document).on('click', '#shipping-policy-add-btn', function(e){
                e.preventDefault();
                var rowIndex = $('#shipping-policy-table tr').length;
                $('#shipping-policy-table').append(`
                    <tr>
                        <td>
                            <input type="hidden" name="id[]" value="">
                            <input type="text" class="form-control" name="location[]" required>
                        </td>
                        <td><input type="text" class="form-control" name="zipcode[]" required></td>
                        <td><input type="number" step="0.01" class="form-control" name="rate[]" required></td>
                        <td class="text-center"><input type="radio" name="default" value="${rowIndex}"></td>
                        <td><button class="tf-button btn-danger border-0 btn-sm shipping-policy-delete-btn"><i class="icon icon-minus"></i></button></td>
                    </tr>
                `);
            });

            $(document).on('click', '.shipping-policy-delete-btn', function(e){
                e.preventDefault();
                var $row = $(this).parents('tr');
                var wasDefault = $row.find('input[type="radio"]').is(':checked');

                $row.remove();

                // Reindex radio button values after deletion
                $('#shipping-policy-table tr').each(function(index){
                    $(this).find('input[type="radio"]').val(index);
                });

                // If deleted row was default, set first row as default
                if (wasDefault && $('#shipping-policy-table tr').length > 0) {
                    $('#shipping-policy-table tr:first input[type="radio"]').prop('checked', true);
                }
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        .upload-image .item.up-load {
            grid-template-columns: auto;
            min-height: 150px;
        }
    </style>
@endpush