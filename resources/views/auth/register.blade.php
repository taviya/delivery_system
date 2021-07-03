@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="registration-form">
                        @csrf

                        <div class="form-group row">
                            <label for="First Name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Last Name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Mobile No" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile_no" type="number" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}" autocomplete="mobile_no">

                                @error('mobile_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="Gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}:</label>
                            <div class="col-md-6">
                                <label class="radio-label">
                                    <input type="radio" name="gender" value="1"  {{(old('gender') == '1') ? 'checked' : ''}}>
                                    {{ __('Male') }}
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="gender" value="2" {{(old('gender') == '2') ? 'checked' : ''}}>
                                    {{ __('Female') }}
                                </label>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Profile Picture" class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>

                            <div class="col-md-6">
                                <input id="user_image" type="file" class="@error('user_image') is-invalid @enderror" name="user_image" value="{{ old('user_image') }}" autocomplete="user_image">

                                @error('user_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="register-btn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push("scripts")

<script>
  $('#register-btn').click(function() {
    $('#registration-form').validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            gender: {
                required: true,
            },
            mobile_no: {
                required: true,
                minlength:10,
                digits: true,
            },
            email: {
                required: true,
                email:true,
            },
            password: {
                required: true,
                minlength: 8,
            },
            password_confirmation: {
                required: true,
                equalTo: "#password",
            },
            terms: {
                required: true,
            },
        },
        errorPlacement: function(error, element) {
            if (element.is(":radio")) {
                error.insertAfter("#radio-error");
            }
            else if(element.is(":checkbox"))
            {
                error.insertAfter("#checkbox-error");
            }
            else {
                error.appendTo(element.parent());
            }
        },
        messages:{
            first_name: {
                required: 'Please Enter First Name',
            },
            last_name: {
                required: 'Please Enter Last Name',
            },
            gender: {
                required: 'Please Select Gender',
            },
            mobile_no: {
                required: 'Please Enter Your Mobile No',
                minlength: 'Please Enter 10 Digit Mobile No',
            },
            email: {
                required: 'Please Enter Your Email',
            },
            terms: {
                required: 'Please Accept Terms & Conditions',
            },
            password:{
                required: 'Please Enter Your Password',
                minlength: 'Password Length must be 8 Character',
            },
            password_confirmation:{
                required: 'Please Confirm Your Password',
            },
        },
    });
});
</script>

@endpush