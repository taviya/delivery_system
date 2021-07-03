<?php

namespace App\Http\Controllers\Admin\Configurations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting as GS;
use Session;
use Image;

class LogoIconController extends Controller
{
    public function index() {
      return view('admin.configurations.logoIcon.index');
    }

    public function update(Request $request) {

      $gs = GS::first();
      if($request->hasFile('logo')) {
        $logoImagePath = './assets/images/logo.png';
        @unlink($logoImagePath);
        $request->file('logo')->move('assets/images/','logo.png');
      }
      if($request->hasFile('icon')) {
        $iconImagePath = './assets/images/favicon.png';
        @unlink($iconImagePath);
        $request->file('icon')->move('assets/images/','favicon.png');
      }
      Session::flash('success', 'Logo updated successfully!');
      return redirect()->back();

    }
}
