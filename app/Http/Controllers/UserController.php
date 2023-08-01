<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $allUsers = User::with('roles')->get();
        // dd($allUsers->roles);
        return view('dashboard.users.index',compact('allUsers'));
    }
    public function userView(){
        $role = Role::all();
        return view('dashboard.users.crteateForm',compact('role'));
    }

    public function store(Request $request){
       $request->validate([
        'name'=>'required ',
        'email'=>'required | email | unique:users,email',
        'password'=>'required | min:9',
        'roles'=>'required'

       ]);
       $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => bcrypt(($request->password))
       ]);

       $user->syncRoles($request->roles);

       return redirect('/all-users')->with('success', 'Role with permissions updated successfully');
    }

    public function editUser($id){
        $user= User::with('roles')->find($id);
        $data=$user->roles->pluck('id')->toArray();
        // dd($data);
        $role = Role::all();
        return view('dashboard.users.editUser',compact(['user','role','data']));
    }

    public function updateUser(Request $request,$id){
        $user = User::find($id);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email
        ]);
        $user->syncRoles($request->roles);

       return redirect('/all-users')->with('success','User Update Successfully');
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        return back()->with('success','User Delete Successfully ');

    }


}
