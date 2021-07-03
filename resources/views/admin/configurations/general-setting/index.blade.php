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
								<h4>General Settings</h4>
							</div>
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{ route('admin.dashboard') }}">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">General Settings</a>
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
											<h5>General Settings</h5>
											<div class="card-header-right">
												<i class="icofont icofont-rounded-down"></i>
												<i class="icofont icofont-refresh"></i>
												<i class="icofont icofont-close-circled"></i>
											</div>
										</div>
										<div class="card-block">
											<form role="form" method="POST" action="{{route('admin.UpdateGenSetting')}}">
												{{csrf_field()}}
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Website Title</label>
													<div class="col-sm-10">
														<input name="websiteTitle" type="text" class="form-control" value="{{$gs->website_title}}">
														@if ($errors->has('websiteTitle'))
														<span style="color:red;">{{$errors->first('websiteTitle')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Footer Text</label>
													<div class="col-sm-10">
														<input name="footer" type="text" class="form-control" value="{{$gs->footer}}">
														@if ($errors->has('footer'))
														<span style="color:red;">{{$errors->first('footer')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Website Email</label>
													<div class="col-sm-10">
														<input name="email" type="text" class="form-control" value="{{$gs->email}}">
														@if ($errors->has('email'))
														<span style="color:red;">{{$errors->first('email')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Mobile No</label>
													<div class="col-sm-10">
														<input name="phone" type="text" class="form-control" value="{{$gs->phone}}">
														@if ($errors->has('phone'))
														<span style="color:red;">{{$errors->first('phone')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Address</label>
													<div class="col-sm-10">
														<textarea name="address" class="form-control">{{ $gs->address }}</textarea>
														@if ($errors->has('address'))
														<span style="color:red;">{{$errors->first('address')}}</span>
														@endif
													</div>
												</div>

												<div class="row">
													<label class="col-sm-2"></label>
													<div class="col-sm-10">
														<button type="submit" class="btn btn-primary m-b-0">Submit</button>
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
@endpush
