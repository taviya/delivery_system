<?php

namespace App\Http\Controllers\Admin\Role;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Validator;
/**
 * Class RoleController.
 */
class RoleController extends Controller
{
	public function index()
	{
		$data['roles']=Role::all();
		$data['permissions']=Permission::pluck('name','name')->all();
		return view('admin.role.index',$data);
	}

	public function create()
	{
		return view('backend.role.create');
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|unique:roles',
		]);
		$role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);
		// $role = Role::create(['name' => ]);
		if(isset($request->permissions) && count($request->permissions)){	
			$role->syncPermissions($request->permissions);
		}
		return json_encode(array('status'=>1));
	}
	public function edit(Role $role)
	{
		$data['role']= $role;
		$data['permissions']= Permission::pluck('name','name')->all();
		$data['rolePermissions']= $role->permissions->pluck('name','name')->all();
		return view('admin.role.edit',$data);
	}
	public function update(Role $role,Request $request)
	{

		$request->validate([
			'name' => 'required|unique:roles,name,'.$request->id,
		]);
		$role->update(['name' => $request->name]);
		if(isset($request->permissions) && count($request->permissions)){	
			$role->syncPermissions($request->permissions);
		}
		Session::flash('success', 'Role Updated Successfully!');
		return redirect()->route('role.index');
	}
	public function destroy(Role $role)
	{
		$role = $role->delete();
		return json_encode(array('status'=>1));
	}
}