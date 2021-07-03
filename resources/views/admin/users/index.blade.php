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
								<h4>Users Management</h4>
							</div>
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{ route('admin.dashboard') }}">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Users Management</a>
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
									<h5>Users Management</h5>
									<div class="float-right">
										<a href="{{ route('add.newuser') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New User</a>
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
@include('admin.users.user-modals')
@endsection

@push('scripts')
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

<script type="text/javascript">

	function deleteUserModel($id)
	{
		$('#deleteid').val($id);
		$('#delete_modal').modal('show');
	}

	function UserBlockModal($id)
	{
		$('#blockid').val($id);
		$('#block_modal').modal('show');
	}

	function UserUnblockModal($id)
	{
		$('#unblockid').val($id);
		$('#unblock_modal').modal('show');
	}

</script>

@endpush