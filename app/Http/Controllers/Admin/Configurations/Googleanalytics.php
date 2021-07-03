<?php

namespace App\Http\Controllers\Admin\Configurations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting as GS;
use Session;

class Googleanalytics extends Controller
{
    public function index() {
      return view('admin.configurations.googlecode.index');
    }

    public function update(Request $request) {

      $messages = [
          'google_analytics.required' => 'Code is required',
      ];
      $validatedRequest = $request->validate([
          'google_analytics' => 'required',
      ], $messages);
      // return $request->all();
      $gs = GS::first();
      $gs->google_analytics = $request->google_analytics;
      $gs->save();
      Session::flash('success', 'Updated successfully!');
      return redirect()->back();
    }
}
