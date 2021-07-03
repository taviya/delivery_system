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
        <h4>Logo & Icon Setting</h4>
      </div>
      <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
         <li class="breadcrumb-item">
          <a href="{{ route('admin.dashboard') }}">
           <i class="icofont icofont-home"></i>
         </a>
       </li>
       <li class="breadcrumb-item"><a href="javascript:;">Logo & Icon</a>
       </li>
     </ul>
   </div>
 </div>
</div>
</div>
<!-- Page header end -->
<!-- Page body start -->
<div class="page-body">
 <div class="row">
  <div class="col-sm-12">

    @include('admin.messages')
    <!-- Product edit card start -->
    <div class="card">
      <div class="card-header">
       <h5>Logo & Icon edit</h5>
     </div>
     <div class="card-block">
       <div class="row">
        <div class="col-sm-12">
         <div class="product-edit">
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="messages7" role="tabpanel">
              <div class="md-float-material card-block">
                <div class="row p-t-10 p-b-10">
                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="{{ asset('assets/images/logo.png') }}">
                      <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid width-100" alt="img-edit">
                    </a>
                  </div>
                  <div class="col-lg-9 col-md-6 col-sm-12">
                   <div class="row">
                    <div class="col-sm-12">
                     <div class="input-group">
                      <span class="input-group-addon"><i class="icofont icofont-all-caps"></i></span>
                      <input type="text" class="form-control" placeholder="Website Logo" disabled="">
                    </div>
                    <div class="col-xs-6 edit-left">
                      <div class="">
                       <form action="{{route('admin.logoIcon.update')}}" method="post" enctype="multipart/form-data">
                         {{csrf_field()}}
                         <div class="">
                           <label>
                            <input name="logo" type="file" id="logo"><i class="helper"></i>Largest Image
                          </label>
                        </div>
                        <div class="col-xs-6 edit-right text-right">
                          <button type="submit" class="btn btn-info waves-effect waves-light">Upload
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row p-t-10 p-b-10">
            <div class="col-lg-3 col-md-6 col-sm-12">
             <a href="{{ asset('assets/images/favicon.png') }}">
              <img src="{{ asset('assets/images/favicon.png') }}" class="img-fluid width-100" alt="img-edit">
            </a>
          </div>
          <div class="col-lg-9 col-md-6 col-sm-12">
           <div class="row">
            <div class="col-sm-12">
             <div class="input-group">
              <span class="input-group-addon"><i class="icofont icofont-all-caps"></i></span>
              <input type="text" class="form-control" placeholder="Favicon Icon" disabled="">
            </div>
            <div class="col-xs-6 edit-left">
              <div class="">
               <form action="{{route('admin.logoIcon.update')}}" method="post" enctype="multipart/form-data">
                 {{csrf_field()}}
                 <div class="">
                   <label>
                    <input name="icon" type="file" id="icon"><i class="helper"></i>Favicon Icon
                  </label>
                </div>
                <div class="col-xs-6 edit-right text-right">
                  <button type="submit" class="btn btn-info waves-effect waves-light">Upload
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Product edit card end -->
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

@endsection
@push('scripts')
<script>
 $(document).ready(function() {

 });
</script>
@endpush