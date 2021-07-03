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
								<h4>Permission Management</h4>
							</div>
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{ route('admin.dashboard') }}">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Permission Management</a>
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
									<h5>Permission Management</h5>
									<div class="float-right">
										<a href="javascipt:;" class="btn btn-primary" data-toggle="modal" data-target="#addPermision"><i class="fa fa-plus"></i> Add Permission</a>
									</div>
								</div>
								<div class="card-block table-border-style">
									<div class="table-responsive">
										@if (count($permissions) == 0)
										<h3 class="text-center" style="padding-bottom: 10px; padding-top: 10px;">No Permissions Found</h3>
										@else
										<table class="table table-styling">
											<thead>
												<tr class="table-primary">
													<th>#</th>
													<th>Permissions</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@php
												$i = 1;	
												@endphp
												@foreach ($permissions as $permission)
												<tr>
													<th scope="row">{{ $i }}</th>
													<td>{{ $permission->name }}</td>
													<td>
														<form action="{{ route('permission.destroy',$permission->id) }}" method="POST">
															@csrf
															@method('DELETE')
															<a href="{{ route('permission.edit',$permission->id) }}" class="btn btn-warning btn-outline-warning" >Edit</a>
															<button type="button" class="btn btn-danger" onclick="deletePermission('{{ route('permission.destroy',$permission->id) }}')" class="btn btn-danger btn-outline-danger btn-sm">Delete</button>
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
										<div class="float-right" style="padding-top: 10px; padding-bottom: 20px; padding-right: 10px;">
											{{$permissions->links()}}
										</div>
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

				<div class="modal inmodal" id="addPermision" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content animated flipInY">
							<div class="modal-header">
								<h4 class="modal-title">Add Permission</h4>
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							</div>
							<form method="post" role="form" id="addPermissionForm">
								<div class="modal-body">
									<div class="register-form-errors"></div>
									{{csrf_field()}}
									<div class="form-body">
										<div class="form-group">
											<div class="row">
												<label class="col-md-12 "><strong style="text-transform: uppercase;">Name</strong></label>
												<div class="col-md-12">
													<input class="form-control input-lg" name="name" value="{{ old('name') }}" type="text" placeholder="Permission Name" required="">
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
	$('#addPermissionForm').validate({ 
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
				url: "{{route('permission.store')}}",
				type: "POST",
				data: $("#addPermissionForm").serialize(),
				dataType: 'json',
				cache: false,
				processData: false,
				success: function (data) {
					if(data.status==1){
						$( '.register-form-errors' ).html('<div class="alert alert-success">Permissions Add successfully</div>');
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

	function deletePermission(routeUrl){
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
					swal("Deleted!", "Your Permission has been deleted.", "success");
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