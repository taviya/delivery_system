@extends('backend.layouts.app')
@section('content')
@include('backend.include.sidebar')
<div id="page-wrapper" class="gray-bg">
	@include('backend.include.header')
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-lg-10">
			<h2>Add Permission</h2>
		</div>
	</div>
	<div class="wrapper wrapper-content animated fadeInRight">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox ">
					<div class="ibox-content">
						<form action="{{route('permission.store')}}" method="post" role="form">
							{{csrf_field()}}
							<div class="form-body">
								<div class="form-group">
									<div class="row">
										<label class="col-md-12 "><strong style="text-transform: uppercase;">Name</strong></label>
										<div class="col-md-12">
											<input class="form-control input-lg" name="name" value="{{ old('name') }}" type="text" placeholder="Permission Name">
											@if ($errors->has('name'))
											<p style="color:red;">{{$errors->first('name')}}</p>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-info">Submit</button>
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
