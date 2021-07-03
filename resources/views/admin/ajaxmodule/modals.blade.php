<div id="addModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Ajax User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" role="form" id="addForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="register-form-errors"></div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
              <input name="first_name" type="text" class="form-control" value="{{ old('first_name') }}">
              @if ($errors->has('first_name'))
              <span style="color:red;">{{$errors->first('first_name')}}</span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
              <input name="last_name" type="text" class="form-control" value="{{ old('last_name') }}">
              @if ($errors->has('last_name'))
              <span style="color:red;">{{$errors->first('last_name')}}</span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">E-Mail Address</label>
            <div class="col-sm-10">
              <input name="email" type="email" class="form-control" value="{{ old('email') }}">
              @if ($errors->has('email'))
              <span style="color:red;">{{$errors->first('email')}}</span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mobile No</label>
            <div class="col-sm-10">
              <input name="mobile_no" type="number" class="form-control" value="{{ old('mobile_no') }}">
              @if ($errors->has('mobile_no'))
              <span style="color:red;">{{$errors->first('mobile_no')}}</span>
              @endif
            </div>
          </div>

          

          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">{{ __('Password') }}</label>

            <div class="col-sm-10">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="password-confirm" class="col-sm-2 col-form-label">{{ __('Confirm Password') }}</label>

            <div class="col-sm-10">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>