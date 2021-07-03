@extends('admin.layouts.app')
@section('content')
@include('admin.include.sidebar')

<div class="pcoded-main-container">
	<div class="pcoded-wrapper">
		<div class="pcoded-content">
			<div class="pcoded-inner-content">

				<!-- Main-body start -->
				<div class="main-body">
					<div class="page-wrapper">
						<!-- Page header start -->
						<div class="page-header">
							<div class="page-header-title">
								<h4>Update User</h4>
							</div>
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{ route('admin.dashboard') }}">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Update User</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- Page header end -->
						<!-- Page body start -->
						<div class="page-body">
							<div class="row">
								<div class="col-sm-12">
									<!-- Basic Form Inputs card start -->
									@include('admin.messages')
									<div class="card">
										<div class="card-header">
											<h5>Update User</h5>
											<div class="card-header-right">
												<i class="icofont icofont-rounded-down"></i>
												<i class="icofont icofont-refresh"></i>
												<i class="icofont icofont-close-circled"></i>
											</div>
										</div>
										<div class="card-block">
											<form role="form" method="POST" action="{{route('user.detail.update')}}" id="registration-form">
												{{csrf_field()}}
												<input type="hidden" name="id" value="{{ $users->id }}">
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">First Name</label>
													<div class="col-sm-10">
														<input name="first_name" type="text" class="form-control" value="{{ $users->first_name }}">
														@if ($errors->has('first_name'))
														<span style="color:red;">{{$errors->first('first_name')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Last Name</label>
													<div class="col-sm-10">
														<input name="last_name" type="text" class="form-control" value="{{ $users->last_name }}">
														@if ($errors->has('last_name'))
														<span style="color:red;">{{$errors->first('last_name')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">E-Mail Address</label>
													<div class="col-sm-10">
														<input name="email" type="email" class="form-control" value="{{ $users->email }}">
														@if ($errors->has('email'))
														<span style="color:red;">{{$errors->first('email')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Mobile No</label>
													<div class="col-sm-10">
														<input name="mobile_no" type="number" class="form-control" value="{{ $users->mobile_no }}">
														@if ($errors->has('mobile_no'))
														<span style="color:red;">{{$errors->first('mobile_no')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label for="Gender" class="col-sm-2 col-form-label">{{ __('Gender') }}:</label>
													<div class="col-sm-10">
														<label class="radio-label">
															<input type="radio" name="gender" value="1" {{ ($users->gender == '1') ? 'checked' : ''}}>
															{{ __('Male') }}
														</label>
														<label class="radio-label">
															<input type="radio" name="gender" value="2" {{( $users->gender == '2') ? 'checked' : ''}}>
															{{ __('Female') }}
														</label>
														<span id="radio-error"></span>
														@error('gender')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="row">
													<label class="col-sm-2"></label>
													<div class="col-sm-10">
														<button type="submit" class="btn btn-primary m-b-0" id="register-btn">Save</button>
														<a class="btn btn-primary m-b-0" href="{{ route('users.index') }}">Back</a>
													</div>
												</div>
											</form>
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- Page body end -->
					</div>
				</div>
				<!-- Main-body end -->
				<div id="styleSelector">

				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
	$(document).ready(function() {
		CKEDITOR.replace( 'address' );
	});
</script>

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
