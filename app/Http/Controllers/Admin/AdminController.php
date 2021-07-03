<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Session;
use Validator;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.admin');
    }

    public function adminProfile()
    {
        $data['adminDetails'] = Admin::where('id',auth()->user()->id)->first();
        return view('admin.adminprofile.profile',$data);
    }

    public function updateAdminProfile(Request $request)
    {
        $admin = Admin::where('id',auth()->user()->id)->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        Session::flash('success', 'Admin Details Update successfully!');
        return redirect()->back();
    }

    public function updatePassword(Request $request) {

        $messages = [
            'password.required' => 'The new password field is required',
            'password.confirmed' => "Password does'nt match"
        ];
        $validator = Validator::make($request->all(), [
            'confirmpassword' => 'required',
            'password' => 'required|confirmed'
        ], $messages);

        $user = Admin::find(auth()->user()->id);
        $user->password = bcrypt($request->password);
        $user->save();

        Session::flash('success', 'Password changed successfully!');

        return redirect()->back();
    }

    public function updateprofile(Request $request) {

        if($request->hasFile('admin_image')) {

            $logoImagePath = './assets/images/user.png';
            @unlink($logoImagePath);
            $request->file('admin_image')->move('assets/images/','user.png');
        }
        Session::flash('success', 'Admin Image Updated Successfully!');
        return redirect()->back();
    }

    public function adminUser(){
        $data['adminUsers'] = Admin::with('roles')->get();
        $data['roles'] = Role::orderby('name','asc')->pluck('name','name')->all();
        $data['permissions']=Permission::orderby('name','asc')->pluck('name','name')->all();
        return view('admin.admin-user.index', $data);
    }

    public function addadminUser(){
        $data['adminUsers'] = Admin::with('roles')->get();
        $data['roles'] = Role::orderby('name','asc')->pluck('name','name')->all();
        $data['permissions']=Permission::orderby('name','asc')->pluck('name','name')->all();
        return view('admin.admin-user.adduser', $data);
    }

    public function adminUserEdit($id){
        $data['admin'] = Admin::with('roles')->find($id);
        $data['roles'] = Role::orderby('name','asc')->pluck('name','name')->all();
        $data['permissions']=Permission::orderby('name','asc')->pluck('name','name')->all();
        $data['userRole'] = $data['admin']->roles->pluck('name','name')->all();
        $data['userPermissions'] = $data['admin']->permissions->pluck('name','name')->all();
        return view('admin.admin-user.edit', $data);
    }

    public function adminUserchange($id){
        $data['admin'] = Admin::with('roles')->find($id);
        $data['roles'] = Role::orderby('name','asc')->pluck('name','name')->all();
        $data['permissions']=Permission::orderby('name','asc')->pluck('name','name')->all();
        $data['userRole'] = $data['admin']->roles->pluck('name','name')->all();
        $data['userPermissions'] = $data['admin']->permissions->pluck('name','name')->all();
        return view('admin.admin-user.changepassword', $data);
    }
    
    public function adminUserCreate(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:admins,email,'.$request->id,
            'username' => 'required|unique:admins,username,'.$request->id,
            'roles' => 'required',
            'password' => 'required|min:8'
        ]);

        $user=Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
        ]);
        
        $user->assignRole($request->roles);
        $user->syncPermissions($request->permissions);

        Session::flash('success', 'User Added successfully!');
        return redirect()->route('admin.users');
    }

    public function adminUserUpdate(Request $request){
        $this->validate($request, [
            'name' => 'required',
            //'username' => 'required|unique:admins,username,'.$request->id,
        ]);

        $admin = Admin::with('roles')->find($request->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->password){
            $admin->password = bcrypt($request->password);
        }
        if($request->phone){
            $admin->phone = $request->phone;
        }
        $admin->save();

        $data['permissions'] = Permission::orderby('name','asc')->pluck('name','name')->all();
    
        if(in_array("All", $request->permissions))
        {
            DB::table('model_has_roles')->where('model_id',$request->id)->delete();
            if(isset($request->roles)){
                $admin->assignRole($request->roles);
            }
            if(isset($data['permissions'])){
                $admin->syncPermissions($data['permissions']);
            }
        }
        else
        {
            DB::table('model_has_roles')->where('model_id',$request->id)->delete();
            if(isset($request->roles)){
                $admin->assignRole($request->roles);
            }
            if(isset($request->permissions)){
                $admin->syncPermissions($request->permissions);
            }
        }

        Session::flash('success', 'User updated successfully!');
        return redirect()->route('admin.users');
    }
    public function adminUserDelete(Request $request){


        $user = Admin::with('roles')->find($request->id);
        $user->delete();

        Session::flash('success', 'User Deleted successfully!');
        return redirect()->route('admin.users');
    }
}
