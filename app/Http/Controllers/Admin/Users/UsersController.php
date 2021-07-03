<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;
use Validator;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function UserDelete(Request $request){

        $user = User::find($request->id);
        $user->delete();

        Session::flash('error', 'User Deleted successfully!');
        return redirect()->route('users.index');
    }

    public function UserBlock(Request $request){

        $user = User::find($request->id);

        User::where('id', $request->id)->update(['status' => 0]);

        Session::flash('error', 'User Deactive successfully!');
        return redirect()->route('users.index');
    }

    public function UserUnBlock(Request $request){

        $user = User::find($request->id);

        User::where('id', $request->id)->update(['status' => 1]);

        Session::flash('success', 'User Active successfully!');
        return redirect()->route('users.index');
    }

    public function UserView($id){

        $data['user'] = User::where('id', $id)->first();

        return view('admin.users.userview',$data);
    }

    public function userPassword(Request $request,$id) {

        $messages = [
            'password.required' => 'The new password field is required',
            'password.confirmed' => "Password does'nt match"
        ];
        $validator = Validator::make($request->all(), [
            'confirmpassword' => 'required',
            'password' => 'required|confirmed'
        ], $messages);

        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();

        Session::flash('success', 'Password changed successfully!');

        return redirect()->back();
    }

    public function userProfileUpdate(Request $request,$id) 
    {
        if(isset($request->avatar_location)) 
        {
            $destinationPath = './assets/frontend/profiles/';
            $fileName_hover = $request->avatar_location->getClientOriginalName();
            $request->avatar_location->move($destinationPath, $fileName_hover);
        } 

        User::where('id', $id)->update(['avatar_location' => $fileName_hover]);

        Session::flash('success', 'Profile updated successfully!');
        return redirect()->back();

    }

    public function addUsers()
    {
        return view('admin.users.adduser');
    }

    public function storeUsers(Request $request)
    {
        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'mobile_no'  => $request->mobile_no,
            'gender'     => $request->gender,
            'password'   => Hash::make($request->password),
        ]);

        Session::flash('success', 'Profile Add successfully!');
        return redirect()->route('users.index');
    }

    public function Useredit($id)
    {
        $data['users'] = User::where('id',$id)->first();
        return view('admin.users.edit',$data);
    }

    public function userUpdate(Request $request)
    {
        User::where('id', $request->id)->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'mobile_no'  => $request->mobile_no,
            'gender'     => $request->gender,
        ]);
        
        Session::flash('success', 'Profile Update successfully!');
        return redirect()->route('users.index');
    }

}
