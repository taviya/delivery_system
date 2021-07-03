<?php

namespace App\Http\Controllers\Admin\Configurations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting as GS;
use App\Models\Social;
use Session;

class SocialController extends Controller
{
    public function index() {
      $data['socials'] = Social::all();
      return view('admin.configurations.socialsetting.index', $data);
    }

    public function store(Request $request) {
      $messages = [
        'icon.required' => 'Social Name is required!',
        'title.required' => 'URL field is required',
      ];
      $validatedData = $request->validate([
          'icon' => 'required',
          'title' => 'required',
      ], $messages);
      $social = new Social;
      $social->fontawesome_code = $request->icon;
      $social->url = $request->title;
      $social->save();
      Session::flash('success', 'New social link added successfully!');
      return redirect()->back();
    }

    public function delete(Request $request) {
      $social = Social::find($request->socialID);
      $social->delete();
      Session::flash('error', 'Social Deleted Successfully');
      return redirect()->back();
    }
}
