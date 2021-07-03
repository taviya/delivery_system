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
								<h4>Menu Manager</h4>
							</div>
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{ route('admin.dashboard') }}">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Menu Manager</a>
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
											<h5>Menu Manager</h5>
											<div class="card-header-right">
												<i class="icofont icofont-rounded-down"></i>
												<i class="icofont icofont-refresh"></i>
												<i class="icofont icofont-close-circled"></i>
											</div>
										</div>
										<div class="card-block">
											<form action="{{route('admin.menuManager.store')}}" method="post" role="form">
												{{ csrf_field() }}
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Menu Name</label>
													<div class="col-sm-10">
														<input name="name" type="text" class="form-control" id="title" value="{{old('name')}}">
														@if ($errors->has('name'))
														<span style="color:red;">{{$errors->first('name')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Menu Title</label>
													<div class="col-sm-10">
														<input name="title" type="text" class="form-control" id="title" value="{{old('title')}}">
														@if ($errors->has('title'))
														<span style="color:red;">{{$errors->first('title')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Menu Position</label>
													<div class="col-sm-10">
														<div class="radio radio-inline">
															<input type="radio" name="menu_position" value="1">
															Header
														</div>
														<div class="radio radio-inline">
															<input type="radio" name="menu_position" value="2">
															Footer
														</div>
														@if ($errors->has('menu_position'))
														<span style="color:red;">{{$errors->first('menu_position')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Content</label>
													<div class="col-sm-10">
														<textarea name="body" class="form-control" rows="8" id="body">{{old('body')}}</textarea>
														@if ($errors->has('body'))
														<span style="color:red;">{{$errors->first('body')}}</span>
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
									<h5>Menu List</h5>
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
													<th> Menu Name </th>
													<th> Menu Title </th>
													<th> Menu Status </th>
													<th> Action </th>
												</tr>
											</thead>
											<tbody>
												@php
												$i = 1;	
												@endphp
												@foreach($menus as $menu)
												<tr>
													<td>{{$i}}</td>
													<td>{{$menu->name}}</td>
													<td>{{$menu->title}}</td>
													<td>
														@if($menu->menu_status == 1)
														<label class="label label-success">Active</label>
														@else
														<label class="label label-danger">Deactive</label>
														@endif
													</td>
													<td>
														<a class="btn btn-warning btn-sm" href="{{route('admin.menuManager.edit', $menu->id)}}">
															<i class="fa fa-pencil"></i> Edit
														</a>
														<button type="button" class="btn btn-danger btn-sm delete_button" data-toggle="modal" data-target="#DelModal{{$menu->id}}" data-id="2">
															<i class="fa fa-times"></i> DELETE
														</button>
													</td>
												</tr>
												@php
												$i++;	
												@endphp

												<div class="modal fade" id="DelModal{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title text-center" id="exampleModalCenterTitle">
																	Are you sure you want to delete this page?
																</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body text-center">
																<form style="display:inline-block;" class="" action="{{route('admin.menuManager.delete', $menu->id)}}" method="post">
																	{{csrf_field()}}
																	<button type="submit" class="btn btn-success">Yes</button>
																</form>
																<button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
															</div>
														</div>
													</div>
												</div>

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
<script type="text/javascript">
	CKEDITOR.replace( 'body' );
	
</script>
@endpush