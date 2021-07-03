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
								<h4>Admin Users Management</h4>
							</div>
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{ route('admin.dashboard') }}">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Admin Users Management</a>
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
									<h5>Admin Users Management</h5>
									<div class="float-right">
										<a href="{{ route('add.adminuser') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Admin User</a>
									</div>
								</div>
								<div class="card-block table-border-style">
									<div class="table-responsive">
										@if (count($adminUsers) == 0)
										<h3 class="text-center" style="padding-bottom: 10px; padding-top: 10px;">No Admin User Found</h3>
										@else
										<table class="table table-styling">
											<thead>
												<tr class="table-primary">
													<th scope="col">#</th>
													<th scope="col">Name</th>
													<th scope="col">Phone</th>
													<th scope="col">Email</th>
													<th scope="col">Username</th>
													<th scope="col">Role</th>
													<th scope="col">Permissions</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
												@php
												$i = 1;	
												@endphp
												@foreach ($adminUsers as $admin)
												<tr>
													<th scope="row">{{ $i }}</th>
													<td>{{ ucfirst($admin->name) }}</td>
													<td>{{ $admin->phone }}</td>
													<td>{{ $admin->email }}</td>
													<td>{{ $admin->username }}</td>
													<td>
														@if ($admin->roles->count())
														@foreach ($admin->roles as $role)
														{{ ucwords($role->name) }}
														@endforeach
														@else
														None
														@endif
													</td>
													<td>
														<ul>
															@if ($admin->permissions->count())
															@foreach ($admin->permissions as $key=>$permission)
															<li>{{ ucwords($permission->name) }}</li>
															@endforeach
															@else
															None
															@endif
														</ul>	
													</td>
													<td>
														<form action="{{ route('admin.user.delete',$admin->id) }}" method="POST">
															@csrf
															@method('DELETE')
															<a href="{{ route('admin.user.edit',$admin->id) }}" class="btn btn-warning btn-outline-warning" >Edit</a>
															<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-outline-danger">Delete</button>
														</form>
													</td>
												</tr>
												@php
												$i++;
												@endphp
												@endforeach
											</tbody>
										</table>
										@endif
									</div>
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
	// $("#roles").select2({
	// 	width: '100%',
	// 	dropdownParent: $("#addAdminUser")
	// });
	$("#permissions").select2({
		width: '100%',
		dropdownParent: $("#roles")
	});
	$('#addAdminUserForm').validate({ 
		rules: {
			name: {
				required: true,
			},
			email: {
				required: true,
				email:true,
			},
			password: {
				minlength: 10,
			},
			username: {
				required: true,
			},
			phone: {
				digits: true,
				minlength:10,
				maxlength:10,
			},
			password: {
				required: true,
			},
			"roles[]": {
				required: true,
			},
		},
		errorPlacement: function(error, element) {
			if (element.is(":radio")) {
				var name = element.attr('name');
				error.insertAfter("#"+name+"_radio-error");
			}else {
				error.appendTo(element.parent());
			}
		},
		messages:{
			name: {
				required: 'Please Enter Name',
			},
		},
		submitHandler: function(form) {
			$.ajax({
				url: "{{route('admin.user.create')}}",
				type: "POST",
				data: $("#addAdminUserForm").serialize(),
				dataType: 'json',
				cache: false,
				processData: false,
				success: function (data) {
					if(data.status==1){
						$( '.register-form-errors' ).html('<div class="alert alert-success">User Add successfully</div>');
						setTimeout(function(){ 
							$("#addAdminUser").modal('hide');
							window.location.reload();
						}, 1000);
					}
				},
				error: function (data) {
					var errorString = '<ul>';
					$.each(data.responseJSON.errors, function( key, value) {
						errorString += '<li>' + value + '</li>';
					});
					errorString += '</ul>';
					$('.register-form-errors').html('');
					$( '.register-form-errors' ).html('<div class="alert alert-danger">'+errorString+'</div>');
				},
			});
			return false;
		}
	});

</script>
@endpush