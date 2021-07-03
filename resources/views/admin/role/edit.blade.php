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
						<!-- Page-header start -->
						<div class="page-header">
							<div class="page-header-title">
								<h4>Edit Role</h4>
							</div>
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{ route('admin.dashboard') }}">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Edit Role</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- Page-header end -->
						<!-- Page-body start -->
						<div class="page-body">
							<!-- Table header styling table start -->
							<div class="card">
								<div class="card-header">
									<h5>Edit Role</h5>
								</div>
								<div class="card-block">
									<form action="{{route('role.update',$role->id)}}" method="post" role="form">
										{{csrf_field()}}
										@method('PATCH')
										<input type="hidden" name="id" value="{{ $role->id  }}">
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Name</label>
											<div class="col-sm-10">
												<input name="name" type="text" class="form-control" value="{{ $role->name }}">
												@if ($errors->has('name'))
												<span style="color:red;">{{$errors->first('name')}}</span>
												@endif
											</div>
										</div>

										<div class="row">
											<label class="col-sm-2"></label>
											<div class="col-sm-10">
												<button type="submit" class="btn btn-primary m-b-0">Submit</button>
												<a href="{{ route('role.index') }}" class="btn btn-primary m-b-0">Back</a>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- Table header styling table end -->
						</div>
						<!-- Page-body end -->
					</div>
				</div>
				<!-- Main-body start -->

				<div id="styleSelector">

				</div>

			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
	$("#permissions").select2();
</script>
@endpush