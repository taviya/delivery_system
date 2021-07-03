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
								<h4>General SEO</h4>
							</div>
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="{{ route('admin.dashboard') }}">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">General SEO</a>
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
											<h5>General SEO</h5>
											<div class="card-header-right">
												<i class="icofont icofont-rounded-down"></i>
												<i class="icofont icofont-refresh"></i>
												<i class="icofont icofont-close-circled"></i>
											</div>
										</div>
										<div class="card-block">
											{!! Form::model($generalseo, ['route' => ['admin.general.update', $generalseo->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'files' => true]) !!}
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Page Title</label>
												<div class="col-sm-10">
													{{ Form::text('page_title', null, ['class' => 'form-control', 'placeholder' => 'Page Title'])}}
													@if ($errors->has('page_title'))
													<span style="color:red;">{{$errors->first('page_title')}}</span>
													@endif
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-2 col-form-label">SEO Title</label>
												<div class="col-sm-10">
													{{ Form::text('seo_title', null, ['class' => 'form-control', 'placeholder' => 'SEO Title'])}}
													@if ($errors->has('seo_title'))
													<span style="color:red;">{{$errors->first('seo_title')}}</span>
													@endif
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-2 col-form-label">SEO Keyword</label>
												<div class="col-sm-10">
													{{ Form::textarea('seo_keyword', null,['class' => 'form-control', 'placeholder' =>'SEO Keyword','rows' => 2]) }}
													@if ($errors->has('seo_keyword'))
													<span style="color:red;">{{$errors->first('seo_keyword')}}</span>
													@endif
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-2 col-form-label">SEO Description</label>
												<div class="col-sm-10">

													{{ Form::textarea('seo_description', null,['class' => 'form-control', 'placeholder' =>'SEO Description','rows' => 2]) }}
													@if ($errors->has('seo_description'))
													<span style="color:red;">{{$errors->first('seo_description')}}</span>
													@endif
												</div>
											</div>

											<div class="row">
												<label class="col-sm-2"></label>
												<div class="col-sm-10">
													{{ Form::submit('Update', ['class' => 'btn btn-primary m-b-0']) }}
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

</script>
@endpush