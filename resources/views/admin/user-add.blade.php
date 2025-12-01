@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>User New</h3>
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
                    <a href="{{ route('admin.users') }}">
                        <div class="text-tiny">Users</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">New User</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
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
            <form class="form-new-product" action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex gap10">
                    <div class="cols flex-grow mb-3">
                        <fieldset class="first_name">
                            <div class="body-title mb-10">First Name <span class="tf-color-1">*</span></div>
                            <input type="text" class="mb-10" value="{{ old('first_name') }}" name="first_name" id="first_name" placeholder="Enter First Name">
                            @error('first_name')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="cols flex-grow mb-3">
                        <fieldset class="last_name">
                            <div class="body-title mb-10">Last Name <span class="tf-color-1">*</span></div>
                            <input type="text" class="mb-10" value="{{ old('last_name') }}" name="last_name" id="last_name" placeholder="Enter Last Name">
                            @error('last_name')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                </div>

                <div class="d-flex gap10">
                    <div class="cols flex-grow mb-3">
                        <fieldset class="email">
                            <div class="body-title mb-10">Email: <span class="tf-color-1">*</span></div>
                            <input type="email" class="mb-10" value="{{ old('email') }}" name="email" id="email" placeholder="Enter Email">
                            @error('email')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="cols flex-grow mb-3">
                        <fieldset class="password">
                            <div class="body-title mb-10">Password: <span class="tf-color-1">*</span></div>
                            <input type="password" class="mb-10" name="password" id="password" placeholder="Enter Password">
                            @error('password')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                </div>

                <div class="d-flex gap10">
                    <div class="cols w-half flex-grow mb-3">
                        <fieldset class="phone">
                            <div class="body-title mb-10">Phone:</div>
                            <input type="text" class="mb-10" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Enter Phone">
                            @error('phone')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="cols w-half flex-grow mb-3">
                        <fieldset class="utype">
                            <div class="body-title mb-10">Role: <span class="tf-color-1">*</span></div>
                            <select name="utype" id="utype" class="mb-10">
                                <option value="">Select Role</option>
                                <option value="Customer" @if(old('utype') === 'Customer') selected @endif>Customer</option>
                                <option value="Admin" @if(old('utype') === 'Admin') selected @endif>Admin</option>
                            </select>
                        </fieldset>
                        @error('utype')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="d-flex gap10">
                    <div class="cols w-half flex-grow mb-10">
                        <fieldset class="city">
                            <div class="body-title mb-10">City:</div>
                            <input type="text" class="mb-10" value="{{ old('city') }}" name="city" id="city" placeholder="Enter City">
                            @error('city')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="cols w-half flex-grow mb-10">
                        <fieldset class="zipcode">
                            <div class="body-title mb-10">Zipcode:</div>
                            <input type="text" class="mb-10" value="{{ old('zipcode') }}" name="zipcode" id="zipcode" placeholder="Enter Zipcode">
                            @error('zipcode')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                </div>

                <div class="d-flex gap10">
                    <div class="cols w-half flex-grow mb-10">
                        <fieldset class="state">
                            <div class="body-title mb-10">State:</div>
                            <input type="text" class="mb-10" value="{{ old('state') }}" name="state" id="state" placeholder="Enter State">
                            @error('state')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="cols w-half flex-grow mb-10">
                        <fieldset class="country">
                            <div class="body-title mb-10">Country:</div>
                            <input type="text" class="mb-10" value="{{ old('country') }}" name="country" id="country" placeholder="Enter Country">
                            @error('country')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                </div>

                <div class="d-flex gap10">
                    <div class="cols w-half mb-10">
                        <fieldset class="address">
                            <div class="body-title">Address:</div>
                            <textarea name="address" id="address" rows="5" class="mb-10" style="height: auto;">{{ old('address') }}</textarea>
                            @error('address')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="cols w-half mb-10">
                        <fieldset class="profile_image">
                            <div class="body-title">Profile images</div>
                            <div class="upload-image flex-grow">
                                <div class="item" id="imgpreview" style="display:none">
                                    <img src="" class="effect8" alt="">
                                </div>
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="body-text">Drop your image here or select <span class="tf-color">click to browse</span></span>
                                        <input type="file" id="myFile" name="image" accept="image/*">
                                    </label>
                                </div>
                            </div>
                            @error('image')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                </div>

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

@push('styles')
    <style>
        .upload-image .item.up-load {
            grid-template-columns: auto;
            min-height: 150px;
        }
    </style>
@endpush