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
								<h4>Edit admin User</h4>
							</div>
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{ route('admin.dashboard') }}">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Edit admin User</a>
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
											<h5>Edit admin User</h5>
											<div class="card-header-right">
												<i class="icofont icofont-rounded-down"></i>
												<i class="icofont icofont-refresh"></i>
												<i class="icofont icofont-close-circled"></i>
											</div>
										</div>
										<div class="card-block">
											<form role="form" method="POST" action="{{route('admin.user.update')}}">
												{{csrf_field()}}
												<input type="hidden" name="id" value="{{ $admin->id }}">
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Name</label>
													<div class="col-sm-10">
														<input name="name" type="text" class="form-control" value="{{ old('name').$admin->name, $admin->name }}">
														@if ($errors->has('name'))
														<span style="color:red;">{{$errors->first('name')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Email</label>
													<div class="col-sm-10">
														<input name="email" type="text" class="form-control" value="{{ old('email').$admin->email, $admin->email }}">
														@if ($errors->has('email'))
														<span style="color:red;">{{$errors->first('email')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Username</label>
													<div class="col-sm-10">
														<input name="username" type="text" class="form-control" value="{{ old('username').$admin->username, $admin->username }}">
														@if ($errors->has('username'))
														<span style="color:red;">{{$errors->first('username')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Password</label>
													<div class="col-sm-10">
														<input name="password" type="password" class="form-control" value="{{ old('phone').$admin->phone, $admin->phone }}">
														@if ($errors->has('password'))
														<span style="color:red;">{{$errors->first('password')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Phone</label>
													<div class="col-sm-10">
														<input name="phone" type="phone" class="form-control" value="{{ old('phone').$admin->phone, $admin->phone }}">
														@if ($errors->has('phone'))
														<span style="color:red;">{{$errors->first('phone')}}</span>
														@endif
													</div>
												</div>

												{{-- @if(auth()->user()->can('Edit Role')) --}}
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Role</label>
													<div class="col-sm-10">
														@if($admin->id == 78)
														{!! Form::select('roles', $roles,$userRole, array('class' => 'js-example-basic-single col-sm-12','id'=>'roles','disabled')) !!}
														@else
														{!! Form::select('roles', $roles,$userRole, array('class' => 'js-example-basic-single col-sm-12','id'=>'roles')) !!}
														@endif
														
														@if ($errors->has('roles'))
														<span style="color:red;">{{$errors->first('roles')}}</span>
														@endif
													</div>
												</div>
												{{-- @endif --}}
												{{-- @if( auth()->user()->can('Edit Permission')) --}}
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Permissions</label>
													<div class="col-sm-10">
														@if($admin->id == 78)
														{!! Form::select('permissions[]', $permissions, $userPermissions,array('class' => 'form-control','id'=>'permissions','multiple','disabled')) !!}
														@else
														{!! Form::select('permissions[]', $permissions, $userPermissions,array('class' => 'form-control','id'=>'permissions','multiple')) !!}
														@endif
														@if ($errors->has('permissions'))
														<p style="color:red;">{{$errors->first('permissions')}}</p>
														@endif
													</div>
												</div>
												{{-- @endif --}}

												<div class="row">
													<label class="col-sm-2"></label>
													<div class="col-sm-10">
														<button type="submit" class="btn btn-primary m-b-0">Submit</button>
														<a href="{{ route('admin.users') }}" class="btn btn-primary m-b-0">Back</a>
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
	$("#roles").select2({
		width: '100%',
	});
	$("#permissions").select2({
		width: '100%',
	});
</script>
@endpush