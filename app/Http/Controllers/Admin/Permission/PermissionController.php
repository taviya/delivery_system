<?php

namespace App\Http\Controllers\Admin\Permission;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Validator;
/**
 * Class Permission.
 */
Class PermissionController extends Controller
{
	public function index()
	{
		$data['permissions']=Permission::latest()->paginate(10);
		$data['roles']=Role::where('name','!=','Admin')->pluck('name','name')->all();
		return view('admin.permission.index',$data);
	}
	public function create()
	{
		return view('admin.permission.create');
	}
	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|unique:permissions',
		]);
		$permission = Permission::create(['name' => $request->name, 'guard_name' => 'admin']);
		if(isset($request->roles) && count($request->roles)){	
			$permission->syncRoles($request->roles);
		}

		Session::flash('success', 'Permission Added Successfully!');
		return json_encode(array('status'=>1));
	}
	public function edit(Permission $permission)
	{
		$data['permission']= $permission;
		$data['roles']=Role::where('name','!=','Admin')->pluck('name','name')->all();
		$data['permissionRoles']= $permission->roles->pluck('name','name')->all();
		return view('backend.permission.edit',$data);
	}
	public function update(Permission $permission,Request $request)
	{
		$request->validate([
			'name' => 'required|unique:permissions',
		]);
		$permission->update(['name' => $request->name]);
		if(isset($request->roles) && count($request->roles)){	
			$permission->syncRoles($request->roles);
		}
		Session::flash('success', 'Permission Updated Successfully!');
		return redirect()->route('permission.index');
	}
	public function destroy(Permission $permission)
	{
		$permission->delete();
		return json_encode(array('status'=>1));
	}
}