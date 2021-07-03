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
								<h4>Ajax Users Management</h4>
							</div>
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{ route('admin.dashboard') }}">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Ajax Users Management</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- Page-header end -->
						<!-- Page-body start -->
						<div class="page-body">
							<!-- Table header styling table start -->
							@include('admin.messages')
							<!-- Users Management table start -->
							<div class="card">
								<div class="card-header table-card-header">
									<h5>Ajax Users Management</h5>
									<div class="float-right">
										<a href="javascript:;" class="btn btn-primary" id="addAjaxUser"><i class="fa fa-plus"></i> Add Ajax User </a>
									</div>
								</div>
								<div class="card-block">
									<div class="dt-responsive table-responsive">
										<table id="users-table" class="table table-striped table-bordered nowrap">
											<thead>
												<tr>
													<th>ID</th>
													<th>Image</th>
													<th>Name</th>
													<th>Email</th>
													<th>Mobile No</th>
													<th>Gender</th>
													<th>Status</th>
													<th>Created At</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
											<tfoot>
												<tr>
													<th>ID</th>
													<th>Image</th>
													<th>Name</th>
													<th>Email</th>
													<th>Mobile No</th>
													<th>Gender</th>
													<th>Status</th>
													<th>Created At</th>
													<th>Actions</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
							<!-- Users Management end -->
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
@include('admin.ajaxmodule.modals')
@endsection

@push('scripts')

<script type="text/javascript">
	$('#addAjaxUser').click(function(event) {
		$('.modal-body').find("input,textarea,select").val('').end();
		$('.register-form-errors' ).html('');
		$('#addModal').modal('show');
	})

	$('#addForm').validate({
		rules: {
			first_name: {
				required: true,
			},
			last_name: {
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
			last_name: {
				required: 'Please Enter Last Name',
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
		submitHandler: function(form) {
			$('#loading').show();
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{route('ajaxmodule.store')}}",
				type: "POST",
				data: new FormData(form),
				dataType: 'json',
				contentType: false,
				cache: false,
				processData:false,
				success: function (data) {
					$('#loading').hide();
					if(data.status==1){
						$('.register-form-errors').html('');
						$( '.register-form-errors' ).html('<div class="alert alert-success">User Add Successfully</div>');
						setTimeout(function() {
							$('#addModal').modal('hide');
							window.location.reload();
						}, 3000);
					}
				},
				error: function (data) {
					$('#loading').hide();
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

<script>
	(function() {
		$('[data-toggle="tooltip"]').tooltip();
		var dataTable = $('#users-table').dataTable({
			processing: true,
			serverSide: true,
			dom: 'Bfrtip',
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			ajax: {
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: '{{ route("users.get") }}',
				type: 'post',
			},
			columns: [
			{data: null, searchable: false, sortable: false},
			{data: 'avatar_location', name: 'avatar_location', sortable: false},
			{data: 'name', name: 'name', sortable: false},
			{data: 'email', name: 'email', sortable: false},
			{data: 'mobile_no', name: 'mobile_no', sortable: false},
			{data: 'gender', name: 'gender',sortable: true},
			{data: 'status', name: 'status',sortable: true},
			{data: 'created_at', name: 'created_at',sortable: false},
			{data: 'actions', name: 'actions', searchable: false, sortable: false,"width": "15%"}
			],
			order: [[5, "desc"]],
			searchDelay: 500,
			"fnRowCallback": function (nRow, aData, iDisplayIndex) {
				$("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
				return nRow;
			}
		});

		Backend.DataTableSearch.init(dataTable);
	})();
</script>

@endpush