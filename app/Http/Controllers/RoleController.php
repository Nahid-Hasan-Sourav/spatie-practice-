<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::with('permissions')->get();
        // return $roles;
        return view('dashboard.roles.index',compact('roles'));
    }
    public function rolesView(){
        $permission = Permission::all();

        return view('dashboard.roles.createForm',compact('permission'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required | unique:roles,name'
        ]);
        // 1.first create a role then
        // 2.assign permission
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
        $role->syncPermissions($request->permission);
        return redirect('/all-roles')->with('success','role created successfully');
    }
    public function editRole($id){
        // return $id;
        $role = Role::with(['permissions'])->findOrFail($id);
        $permissions = Permission::all();
        return view('dashboard.roles.editRole',compact('role','permissions'));
    }

    public function updateRole(Request $request, $id)
{
    // dd($request->all());
    $role = Role::find($id); // Find the role first.

    $request->validate([
        'name' => "required|unique:roles,name,$role->id"
    ]);

    // Update the role using the update() method.
    $role->update(['name' => $request->name]);

    // Sync permissions for the updated role.
    $role->syncPermissions($request->permissions);

    return redirect('/all-roles')->with('success', 'Role with permissions updated successfully');
}

public function deleteRole($id){
    $role = Role::find($id);

    $role->delete();

    return back()->with('success','Role delete successfully');
}

}
