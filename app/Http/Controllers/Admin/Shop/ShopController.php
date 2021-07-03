<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Image;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            return Datatables::of($user)
                    ->addIndexColumn()
                    ->addColumn('status', function($row) {
                        $id = $row->id;
                        $route = 'user_status_change';
                        $status = $row->is_active;
                        $permissions = array(
                            'edit' => 'edit_user',
                        );
                        return view('admin.datatable.status', compact('id', 'route', 'status', 'permissions'));
                    })
                    ->addColumn('action', function($row) {
                        $id = $row->id;
                        $edit_route = 'user_edit';
                        $status = $row->is_active;
                        $permissions = array(
                            'edit' => 'edit_user',
                            'delete' => 'delete_user'
                        );
                        return view('admin.datatable.action', compact('id', 'edit_route', 'status', 'permissions'));
                    })
                    ->rawColumns(['status', 'action'])
                    ->make(true);
        }else{
            return view('admin.shop.shop_list');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $originalImage = $request->file('shop_image');
        $imageName = '';
        if ($originalImage) {
            $imageName = time().$originalImage->getClientOriginalName();
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/upload/shop/thumbnail/';
            $originalPath = public_path().'/upload/shop/';
            $thumbnailImage->save($originalPath.$imageName);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$imageName);
        }

        $addArray = [
            'shop_name' => $request->shop_name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'turnover' => $request->turnover,
            'shop_image' => $imageName,
            'is_active' => $request->status ? $request->status : 0,
        ];

        $addShop = Shop::create($addArray);
        $shop = Shop::find($addShop->id);
        if ($shop) {
            return response()->json(['status' => TRUE, 'message' => 'Shop create successfully.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
