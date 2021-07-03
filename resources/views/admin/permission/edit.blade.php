@extends('backend.layouts.app')
@section('content')
@include('backend.include.sidebar')
<div id="page-wrapper" class="gray-bg">
	@include('backend.include.header')
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-lg-10">
			<h2>Edit Permission</h2>
		</div>
	</div>
	<div class="wrapper wrapper-content animated fadeInRight">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox ">
					<div class="ibox-content">
						<form action="{{route('permission.update',$permission->id)}}" method="post" rol="form">
							{{csrf_field()}}
							@method('PATCH')
							<div class="form-body">
								<div class="form-group">
									<div class="row">
										<label class="col-md-12 "><strong style="text-transform: uppercase;">Name</strong></label>
										<div class="col-md-12">
											<input class="form-control input-lg" name="name" value="{{ old('name').$permission->name, $permission->name }}" type="text" placeholder="permission Name">
											@if ($errors->has('name'))
											<p style="color:red;">{{$errors->first('name')}}</p>
											@endif
										</div>
									</div>
								</div>
								{{-- <div class="form-group">
									<div class="row">
										<label class="col-md-12 "><strong style="text-transform: uppercase;">Roles</strong></label>
										<div class="col-md-12">
											{!! Form::select('roles[]', $roles,$permissionRoles, array('class' => 'form-control','multiple')) !!}
											@if ($errors->has('roles'))
											<p style="color:red;">{{$errors->first('roles')}}</p>
											@endif
										</div>
									</div>
								</div> --}}
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-info">Update</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('backend.include.footer')
</div>
@endsection
