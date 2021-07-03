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
								<h4>Social Settings</h4>
							</div>
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{ route('admin.dashboard') }}">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Social Settings</a>
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
											<h5>Social Settings</h5>
											<div class="card-header-right">
												<i class="icofont icofont-rounded-down"></i>
												<i class="icofont icofont-refresh"></i>
												<i class="icofont icofont-close-circled"></i>
											</div>
										</div>
										<div class="card-block">
											<form class="" action="{{route('admin.social.store')}}" method="post">
												{{csrf_field()}}
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Social Name</label>
													<div class="col-sm-10">
														<input name="icon" type="text" class="form-control" >
														@if ($errors->has('icon'))
														<span style="color:red;">{{$errors->first('icon')}}</span>
														@endif
													<small>Note: Small Letters Only</small>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">URL</label>
													<div class="col-sm-10">
														<input name="title" type="text" class="form-control" value="{{$gs->title}}">
														@if ($errors->has('title'))
														<span style="color:red;">{{$errors->first('title')}}</span>
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

							<!-- Basic table card start -->
							<div class="card">
								<div class="card-header">
									<h5>Social List</h5>
									<div class="card-header-right">
										<i class="icofont icofont-rounded-down"></i>
										<i class="icofont icofont-refresh"></i>
										<i class="icofont icofont-close-circled"></i>
									</div>
								</div>
								<div class="card-block table-border-style">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Social Name</th>
													<th>URL</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@php
												$i = 1;	
												@endphp
												@foreach($socials as $social)
												<tr>
													<th scope="row">{{ $i }}</th>
													<td>{{ $social->fontawesome_code }}</td>
													<td>{{ $social->url }}</td>
													<td>
														<form action="{{ route('admin.social.delete') }}" method="post">
															<input type="hidden" name="socialID" value="{{ $social->id }}">
															{{csrf_field()}}
															<button type="submit" class="btn btn-danger">Delete</button>
														</form>
													</td>
												</tr>
												@php
												$i++;	
												@endphp
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- Basic table card end -->


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
		var email_verification = document.querySelector('.email_verification');
		var switchery_2 = new Switchery(email_verification, { color: '#1AB394' });
		var sms_verification = document.querySelector('.sms_verification');
		var switchery_2 = new Switchery(sms_verification, { color: '#1AB394' });
		var email_notification = document.querySelector('.email_notification');
		var switchery_2 = new Switchery(email_notification, { color: '#1AB394' });
		var sms_notification = document.querySelector('.sms_notification');
		var switchery_2 = new Switchery(sms_notification, { color: '#1AB394' });
		var registration = document.querySelector('.registration');
		var switchery_2 = new Switchery(registration, { color: '#1AB394' });
	});
</script>
@endpush
