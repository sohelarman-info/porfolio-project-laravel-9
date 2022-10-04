<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Permission;

class UserController extends Controller
{
    function UserList(){
        return view('admin.users.user-list',[
            'users' => User::orderBy('id', 'DESC')->paginate(10),
        ]);
    }
    function AddUser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('AddUser', 'User Added Successfully Done!');
    }
    function UserEdit($id){
        return view('admin.users.user-edit',[
            'user'          => User::findOrFail($id),
        ]);
    }
    function UpdateUser(Request $request){
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('UserUpdate', 'User Updated!');
    }
    function UserDeleted($id){
        User::findOrFail($id)->delete();
        return back()->with('UserDeleted','User Deleted');
    }
}
