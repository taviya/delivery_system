<div class="modal fade in" id="delete_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" style="width: 400px;">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Confirm Delete</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<p>Are You Sure You Want To Delete This User?</p>
				<div class="text-right">
					<form action="{{ route('users.delete') }}" method="POST">
						@csrf
						<input type="hidden" name="id" id="deleteid">
						<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
						<input type="submit" name="delete" class="btn btn-danger btn-sm" value="Delete">
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="modal fade in" id="verify_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" style="width: 400px;">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Confirm Your Action</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<p>Are You Sure You Want To "Approve" This User??</p>
				<div class="text-right">
					<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
					<button class="btn btn-primary btn-sm" id="verify_member">Confirm</button>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="modal fade in" id="package_modal" role="dialog" tabindex="-1" aria-labelledby="package_modal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Package Information</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<div class="modal-body" id="package_modal_body">  
				<div class="row">
					<div class="col-md-6">
						<div class="block">
							<h5>Your Current Package</h5>
							<div class="text-left">
								<div class="px-2 py-2">
									<table class="table table-condensed table-bordered">
										<tbody>
											<tr>
												<th>User Package</th>
												<td id="package_name"></td>
											</tr>
											<tr>
												<th>Package Price</th>
												<td id="package_price">$0</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="block">
							<h5>Remaining Package</h5>
							<div class="text-left">
								<div class="px-2 py-2">
									<table class="table table-condensed table-bordered">
										<tbody>
											<tr>
												<th>Features</th>
												<th>Unit Left</th>
											</tr>
											<tr>
												<td>View Contact</td>
												<td id="contactLeft"></td>
											</tr>
											<tr>
												<td>Shortlist Profiles</td>
												<td id="shortlistLeft"></td>
											</tr>
											<tr>
												<td>Photo Gallery</td>
												<td id="galleryLeft"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="text-right">
					<button data-target="#upgrade_modal" data-toggle="modal" class="btn btn-primary add-tooltip" id="upgrade_btn">Upgrade Package</button>
					<button data-dismiss="modal" class="btn btn-warning" type="button" id="modal_close">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade in" id="block_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" style="width: 400px;">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Confirm Your Action</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<p>Are You Sure You Want To <b>Deactive</b> This User??</p>
				<div class="text-right">
					<form action="{{ route('users.block') }}" method="POST">
						@csrf
						<input type="hidden" name="id" id="blockid">
						<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
						<input type="submit" name="delete" class="btn btn-danger btn-sm" value="Confirm">
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
<div class="modal fade in" id="unblock_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" style="width: 400px;">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Confirm Your Action</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<p>Are You Sure You Want To <b>Active</b> This User??</p>
				<div class="text-right">
					<form action="{{ route('users.unblock') }}" method="POST">
						@csrf
						<input type="hidden" name="id" id="unblockid">
						<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
						<input type="submit" name="delete" class="btn btn-danger btn-sm" value="Confirm">
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="modal fade in" id="block_image_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" style="width: 400px;">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Are You Sure You Want To "Block" This Image??</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<form method="post" id="block_image_form">
					<input type="hidden" name="id" value="" id="block_image_btn">
					<div class="form-group">
						<div class="col-md-12">
							<label for="">Comment</label>
							<textarea class="form-control" id="message" name="comment" rows="5"></textarea>
						</div>
					</div>
					<div class="row" style="text-align: center;">
						<div class="col-md-12">
							<button type="button" onclick="blockImage()" class="btn btn-info">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade in" id="unBlock_image_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" style="width: 400px;">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Confirm Your Action</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<p>Are You Sure You Want To "Unblock" This Image??</p>
				<div class="text-right">
					<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
					<button type="button" class="btn btn-primary btn-sm" id="unBlock_image_btn">Confirm</button>
				</div>
			</div>

		</div>
	</div>
</div>


<div class="modal fade in" id="block_picture_image_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" style="width: 400px;">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Are You Sure You Want To "Block" This Profile Picture??</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<form method="post" id="block_picture_image_form">
					<input type="hidden" name="id" value="" id="block_picture_image_btn">
					<div class="form-group">
						<div class="col-md-12">
							<label for="">Comment</label>
							<textarea class="form-control" id="message" name="pro_pic_block_comment" rows="5"></textarea>
						</div>
					</div>
					<div class="row" style="text-align: center;">
						<div class="col-md-12">
							<button type="button" onclick="blockProfileImage()" class="btn btn-info">Submit</button>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
<div class="modal fade in" id="unBlock_picture_image_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" style="width: 400px;">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Confirm Your Action</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<p>Are You Sure You Want To "Unblock" This Profile Picture??</p>
				<div class="text-right">
					<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
					<button class="btn btn-primary btn-sm" id="unBlock_picture_image_btn">Confirm</button>
				</div>
			</div>

		</div>
	</div>
</div>


<div class="modal fade in" id="add_member_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Add New member</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<div class="register-form-errors"></div>
				<form id="addMember" method="post" role="form">
					{{csrf_field()}}
					<div class="form-body">
						<div class="form-group">
							<div class="row">
								<label class="col-md-12 "><strong style="text-transform: uppercase;">First Name</strong></label>
								<div class="col-md-12">

									<input name="created_by" value="{{ auth()->user()->id }}" type="hidden">
									<input class="form-control" name="first_name" value="{{ old('first_name') }}" type="text" placeholder="Enter First Name">
									@if ($errors->has('first_name'))
									<p style="color:red;">{{$errors->first('first_name')}}</p>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-12 "><strong style="text-transform: uppercase;">Last Name</strong></label>
								<div class="col-md-12">
									<input class="form-control" name="last_name" value="{{ old('last_name') }}" type="text" placeholder="Enter Last Name">
									@if ($errors->has('last_name'))
									<p style="color:red;">{{$errors->first('last_name')}}</p>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-12 "><strong style="text-transform: uppercase;">Profile For</strong></label>
								<div class="col-md-12">
									<select name="profile_for" class="form-control" id="profile_for">
										<option value="">Select</option>
										<option {{(old('profile_for') == 'Self') ? 'selected' : ''}} value="Self">Self</option>
										<option {{(old('profile_for') == 'Son') ? 'selected' : ''}} value="Son">Son</option>
										<option {{(old('profile_for') == 'Daughter') ? 'selected' : ''}} value="Daughter">Daughter</option>
										<option {{(old('profile_for') == 'Brother') ? 'selected' : ''}} value="Brother">Brother</option>
										<option {{(old('profile_for') == 'Sister') ? 'selected' : ''}} value="Sister">Sister</option>
										<option {{(old('profile_for') == 'Friend') ? 'selected' : ''}} value="Friend">Friend</option>
										<option {{(old('profile_for') == 'Relative') ? 'selected' : ''}} value="Relative">Relative</option>
									</select>
									@if ($errors->has('profile_for'))
									<p style="color:red;">{{$errors->first('profile_for')}}</p>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-12 "><strong style="text-transform: uppercase;">Looking for</strong></label>
								<div class="col-md-12">
									<div class="radio radio-success">
										<input type="radio" name="looking_for" id="radio1" value="1">
										<label for="radio1">
											Male
										</label>
									</div>
									<div class="radio radio-success">
										<input type="radio" name="looking_for" id="radio2" value="2">
										<label for="radio2">
											Female
										</label>
									</div>
									<span id="looking_for_radio-error"></span>
									@if ($errors->has('looking_for'))
									<p style="color:red;">{{$errors->first('looking_for')}}</p>
									@endif
								</div>
							</div>
						</div> 
						<div class="form-group">
							<div class="row">
								<label class="col-md-12 "><strong style="text-transform: uppercase;">Mobile No</strong></label>
								<div class="col-md-12">
									<input class="form-control" name="phone" value="{{ old('phone') }}" type="text" placeholder="Enter Mobile No">
									@if ($errors->has('phone'))
									<p style="color:red;">{{$errors->first('phone')}}</p>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-12 "><strong style="text-transform: uppercase;">Country</strong></label>
								<div class="col-md-12">
									<select name="country" class="form-control select2_demo_1" id="country">
										<option value="101">India</option>
										@if(!empty($allcountries))
										@foreach($allcountries as $row)
										<option value="{{ $row->id }}" name="{{ $row->name }}" {{(old('country') == $row->id ) ? 'selected' : ''}} >{{ $row->name }}</option>
										@endforeach
										@else
										<option value="">Country Not Available</option>
										@endif
									</select>
									@if ($errors->has('country'))
									<span class="invalid-feedbacks" role="alert">
										<strong>{{$errors->first('country')}}</strong>
									</span>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-12 "><strong style="text-transform: uppercase;">Email</strong></label>
								<div class="col-md-12">
									<input class="form-control" name="email" value="{{ old('email') }}" type="text" placeholder="Enter Email">
									@if ($errors->has('email'))
									<p style="color:red;">{{$errors->first('email')}}</p>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-12 "><strong style="text-transform: uppercase;">Password</strong></label>
								<div class="col-md-12">
									<input class="form-control" name="password" type="password" placeholder="Enter Password">
									@if ($errors->has('password'))
									<p style="color:red;">{{$errors->first('password')}}</p>
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


<div class="modal fade in" id="add_gallery_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Add Image</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<div class="row">
					<input type="hidden" name="user_id" id="add_user_id">
					<div class="col-md-6">
						<input type="file" name="image"  class="inputfile inputfile-1" id="add_gallery_image_field">
					</div>
				</div>
				<div class="text-right">
					<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="modal fade in" id="edit_gallery_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Edit Image</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div id="image_div"></div>
						<input type="hidden" name="image_id" id="image_id">
						<input type="hidden" name="user_id" id="user_id">
					</div>
					<div class="col-md-6">
						<input type="file" name="image"  class="inputfile inputfile-1 edit_gallery_image_field">
					</div>
				</div>
				<div class="text-right">
					<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="modal ga_profile-image-preview" id="gallery_crop">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Upload Image</h4>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<div id="loading" style="display: none;">
					<img src="{{ URL::asset('public/build/images/loading-profile.gif') }}" style=" z-index: +1;" width="150" height="150" alt="loader"/>

				</div>
				<div class="image-wrap">
					<div id="ga_upload-demo"></div>
					<div id="ga_preview-crop-image"></div>
				</div>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="ga_cropimage">Crop & Submit</button>
				<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="close_ga__crop">Close</button>
			</div>

		</div>
	</div>
</div>

<div class="modal fade in" id="delete_image_gallery_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" style="width: 400px;">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Confirm Delete</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<p>Are You Sure You Want To Delete This Image?</p>
				<div class="text-right">
					<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
					<button class="btn btn-danger btn-sm" id="delete_image_gallery_btn">Delete</button>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="modal fade in" id="otp_verify_modal" role="dialog" tabindex="-1" aria-labelledby="otp_verify_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" style="width: 400px;">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Confirm OTP</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<form  method="post" accept-charset="utf-8" id="otp_verify_form">
								<input type="hidden" name="userid" id="userid">
								<input type="hidden" name="mobile" id="mobile">
								<input class="form-control" name="otp" value="{{ old('otp') }}" type="text" placeholder="OTP" id="otp" required="">
								<p style="color:red;display: none;" id="error_otp"></p>
								<p style="color:green;display: none;" id="success_otp"></p>
								@if ($errors->has('otp'))
								<p style="color:red;">{{$errors->first('otp')}}</p>
								@endif
							</form>
						</div>
					</div>
				</div>
				<div class="text-right">
					<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
					<button class="btn btn-danger btn-sm" id="otp_verify_btn">Verify</button>
				</div>
			</div>

		</div>
	</div>
</div>
<div class="modal fade in" id="reset_password_modal" role="dialog" tabindex="-1" aria-labelledby="reset_password_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" style="width: 400px;">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Reset Password</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<div id="register-form-reset"></div>
							<form  method="post" accept-charset="utf-8" id="reset_password_form">
								<input type="hidden" name="userid" id="reset_userid">
								<input class="form-control" name="password" value="{{ old('password') }}" type="password" placeholder="Password" id="otp" required="" autocomplete="new-password">
								<p style="color:red;display: none;" id="error_otp"></p>
								<p style="color:green;display: none;" id="success_otp"></p>
								@if ($errors->has('otp'))
								<p style="color:red;">{{$errors->first('password')}}</p>
								@endif
							</form>
						</div>
					</div>
				</div>
				<div class="text-right">
					<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
					<button class="btn btn-success btn-sm" id="reset_password_btn">Reset</button>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="modal fade in" id="user_stats_modal" role="dialog" tabindex="-1" aria-labelledby="user_stats_modal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">User Stats Information</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<div class="modal-body" id="package_modal_body">  
				<div class="row">
					<div class="col-md-12">
						<div class="block">
							<div class="text-left">
								<div class="px-2 py-2" id="user_stats"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="text-right">
					<button data-dismiss="modal" class="btn btn-warning" type="button" id="modal_close">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade in" id="login_modal" role="dialog" tabindex="-1" aria-labelledby="login_modal" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" style="width: 400px;">
		<div class="modal-content">
			<!--Modal header-->
			<div class="modal-header">
				<h4 class="modal-title">Login Details</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<span id="messaaaaaa"></span>
				<div id="allcopy">
					<div>
						<span>Url : <span id="url"><b>https://brahmavedi.in/login</b></span></span>
					</div>
					<div>
						<span>Email : <span id="email"><b></b></span></span>
					</div>
					<div>
						<span>Password : <span id="password"><b></b></span></span>
					</div>
				</div>
				<input type="text" id="copyTarget" value="Text to Copy" > 
				<div class="text-right">
					<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
					<button class="btn btn-info btn-sm copyButton" id="copyButton">Copy</button>
				</div>
			</div>

		</div>
	</div>
</div>