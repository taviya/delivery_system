<?php

namespace App\Http\Controllers\Admin\Seo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSeos;
use Session;
use Image;

class GeneralController extends Controller
{
   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
   {
   	$generalseo = GeneralSeos::find(1);
   	if(!isset($generalseo) && empty($generalseo))
   	{
   		GeneralSeos::insertGetId([
   			'id'    => 1
   		]);
   		$generalseo = GeneralSeos::find(1);
   		return view('admin.SEO.generalseo',compact('generalseo'));
   	}
   	else
   	{
   		return view('admin.SEO.generalseo',compact('generalseo'));
   	}
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	$input=$request->except('_token','_method');
    	$validatedRequest = $request->validate([
        'page_title' => 'required',
        'seo_title' => 'required',
        'seo_keyword' => 'required',
        'seo_description' => 'required',
      ]);
    	GeneralSeos::where('id','1')->update($input);
    	return redirect()->route('admin.general.edit',1)->with('success', 'Updated Successfully.');
    }
  }
