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
											<form action="{{route('admin.menuManager.update', $menu->id)}}" method="post" role="form">
												{{ csrf_field() }}
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Menu Name</label>
													<div class="col-sm-10">
														<input name="name" type="text" class="form-control" id="title" value="{{ $menu->name }}">
														@if ($errors->has('name'))
														<span style="color:red;">{{$errors->first('name')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Menu Title</label>
													<div class="col-sm-10">
														<input name="title" type="text" class="form-control" id="title" value="{{ $menu->title }}">
														@if ($errors->has('title'))
														<span style="color:red;">{{$errors->first('title')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Menu Position</label>
													<div class="col-sm-10">
														<div class="radio radio-inline">
															<input type="radio" name="menu_position" value="1" @if($menu->menu_position == 1) checked @endif>
															Header
														</div>
														<div class="radio radio-inline">
															<input type="radio" name="menu_position" value="2" @if($menu->menu_position == 2) checked @endif>
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
														<textarea name="body" class="form-control" rows="8" id="body">{{$menu->body}}</textarea>
														@if ($errors->has('body'))
														<span style="color:red;">{{$errors->first('body')}}</span>
														@endif
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Menu Status</label>
													<div class="col-sm-10">
														<div class="radio radio-inline">
															<input type="radio" name="menu_status" value="1" @if($menu->menu_status == 1) checked @endif>
															Active
														</div>
														<div class="radio radio-inline">
															<input type="radio" name="menu_status" value="0" @if($menu->menu_status == 0) checked @endif>
															Deactive
														</div>
														@if ($errors->has('menu_status'))
														<span style="color:red;">{{$errors->first('menu_status')}}</span>
														@endif
													</div>
												</div>


												<div class="row">
													<label class="col-sm-2"></label>
													<div class="col-sm-10">
														<button type="submit" class="btn btn-primary m-b-0">Update</button>
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
<script type="text/javascript">
		CKEDITOR.replace( 'body' );
	
</script>
@endpush