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
								<h4>Subscribers</h4>
							</div>
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{ route('admin.dashboard') }}">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Subscribers</a>
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
											<h5>Subscribers</h5>
											<div class="card-header-right">
												<i class="icofont icofont-rounded-down"></i>
												<i class="icofont icofont-refresh"></i>
												<i class="icofont icofont-close-circled"></i>
											</div>
										</div>
										<div class="card-block">
											<form action="{{route('admin.sendmail')}}" method="post" role="form">
												{{ csrf_field() }}
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Subject</label>
													<div class="col-sm-10">
														<input name="subject" type="text" class="form-control" id="title" value="{{old('subject')}}">
														@if ($errors->has('subject'))
														<span style="color:red;">{{$errors->first('subject')}}</span>
														@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Email Message</label>
													<div class="col-sm-10">
														<textarea name="body" class="form-control" rows="8" id="body"></textarea>
														@if ($errors->has('body'))
														<span style="color:red;">{{$errors->first('body')}}</span>
														@endif
													</div>
												</div>

												<div class="row">
													<label class="col-sm-2"></label>
													<div class="col-sm-10">
														<button type="submit" class="btn btn-primary m-b-0">Broadcast Email</button>
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
									<h5>Subscribers List</h5>
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
													<th> Email </th>
												</tr>
											</thead>
											<tbody>
												@php
												$i = 1;	
												@endphp
												{{-- @foreach($emails as $menu) --}}
												<tr>
													<td>{{$i}}</td>
													<td>{{ implode(', ',$emails) }}</td>
												</tr>
												@php
												$i++;	
												@endphp
												{{-- @endforeach --}}
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
<script type="text/javascript">
	CKEDITOR.replace( 'body' );
	
</script>
@endpush