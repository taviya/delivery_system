<?php

namespace App\Http\Controllers\Admin\Configurations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Session;
use Auth;
use Validator;

class GeneralSettingController extends Controller
{
  public function GenSetting(){
    return view('admin.configurations.general-setting.index');
  }

  public function UpdateGenSetting(Request $request){
    $messages = [
      'websiteTitle.required' => 'Website Title is required',
    ];

    $validator = Validator::make($request->all(), [
      'websiteTitle' => 'required',
      
    ], $messages);

    if ($validator->fails()) {
      return redirect()->route('admin.GenSetting')
      ->withErrors($validator);
    }

    $generalSettings = GeneralSetting::first();

    $generalSettings->website_title = $request->websiteTitle;
    $generalSettings->footer        = $request->footer;
    $generalSettings->address        = $request->address;
    $generalSettings->email         = $request->email;
    $generalSettings->phone         = $request->phone;


    $generalSettings->save();

    Session::flash('success', 'Successfully Updated!');

    return redirect()->route('admin.GenSetting');
  }
}
