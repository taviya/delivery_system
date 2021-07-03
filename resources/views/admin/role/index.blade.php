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
								<h4>Role Management</h4>
							</div>
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{ route('admin.dashboard') }}">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Role Management</a>
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
									<h5>Role Management</h5>
									<div class="float-right">
										<a class="btn btn-primary" onclick="addRoleModal()" tabindex="0" aria-controls="custom-btn" href="javascript:;">Add Roles
										</a>
									</div>
								</div>
								<div class="card-block table-border-style">
									<div class="table-responsive">
										@if (count($roles) == 0)
										<h3 class="text-center" style="padding-bottom: 10px; padding-top: 10px;">No Roles Found</h3>
										@else
										<table class="table table-styling">
											<thead>
												<tr class="table-primary">
													<th>#</th>
													<th>Role</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@php
												$i = 1;	
												@endphp
												@foreach ($roles as $role)
												<tr>
													<th scope="row">{{ $i }}</th>
													<td>{{ ucfirst($role->name) }}</td>
													<td>
														@if ($role->id == 1)
														@else
														<form action="{{ route('role.destroy',$role->id) }}" method="POST">
															@csrf
															@method('DELETE')
															<a href="{{ route('role.edit',$role->id) }}" class="btn btn-warning btn-outline-warning">Edit</a>
															<button type="button" class="btn btn-danger btn-outline-danger" onclick="deleteRole('{{ route('role.destroy',$role->id) }}')" >Delete</button>
														</form>
														@endif
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

				<div class="modal inmodal" id="myModal2"  tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content animated flipInY">
							<div class="modal-header">
								<h4 class="modal-title">Add Role</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="{{route('role.store')}}" method="post" role="form" id="addRoleForm">
								<div class="register-form-errors"></div>
								<div class="modal-body">
									{{csrf_field()}}
									<div class="form-body">
										<div class="form-group">
											<div class="row">
												<label class="col-md-12 "><strong style="text-transform: uppercase;">Name</strong></label>
												<div class="col-md-12">
													<input class="form-control input-lg" name="name" value="{{ old('name') }}" type="text" placeholder="Role Name">
													@if ($errors->has('name'))
													<p style="color:red;">{{$errors->first('name')}}</p>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')

<script>
	function addRoleModal(){
		$.fn.modal.Constructor.prototype._enforceFocus = function() {};
		$("#myModal2").modal('show');
		$("#permissions").select2({
			width: '100%',
			dropdownParent: $("#myModal2")
		});
	}
	$('#addRoleForm').validate({ 
		rules: {
			name: {
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
			first_name: {
				required: 'Please Enter First Name',
			},
		},
		submitHandler: function(form) {
			$.ajax({
				url: "{{route('role.store')}}",
				type: "POST",
				data: $("#addRoleForm").serialize(),
				dataType: 'json',
				cache: false,
				processData: false,
				success: function (data) {
					if(data.status==1){
						$( '.register-form-errors' ).html('<div class="alert alert-success">Role Add successfully</div>');
						setTimeout(function(){ 
							$("#myModal2").modal('hide');
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

	function deleteRole(routeUrl){
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this record!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			closeOnConfirm: false
		}, function () {
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: routeUrl,
				type: "DELETE",
				dataType: 'json',
				success: function (data) {
					swal("Deleted!", "Your Roles has been deleted.", "success");
					setTimeout(function(){ 
						window.location.reload();
					},3000);
				},
				error: function (data) {
				},
			});
		});
	}
</script>
@endpush