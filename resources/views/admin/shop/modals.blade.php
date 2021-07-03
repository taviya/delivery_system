<div id="addModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Shop</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" role="form" id="addForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="register-form-errors"></div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Shop Name</label>
                        <div class="col-sm-10">
                            <input name="shop_name" type="text" class="form-control" value="{{ old('shop_name') }}">
                            @if ($errors->has('shop_name'))
                                <span style="color:red;">{{$errors->first('shop_name')}}</span>
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
                        <label class="col-sm-2 col-form-label">Select Turnover</label>
                        <div class="col-sm-10">
                            <select name="turnover" class="form-control">
                                <option value="">Select One Value Only</option>
                                <option value="0-10">0-10 Lacs</option>
                                <option value="10-25">10-25 Lacs</option>
                                <option value="25-50">25-50 Lacs</option>
                                <option value="50-80">50-80 Lacs</option>
                                <option value="> 80">> 80 Lacs</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Shop image</label>
                        <div class="col-sm-10">
                            <input type="file" name="shop_image" class="form-control">
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
