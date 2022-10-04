<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    function Role(){
        return view('admin.users.role',[
            'roles' => Role::orderBy('id', 'DESC')->paginate(10),
        ]);
    }
    function AddRole(Request $request){
        $role = new Role;
        $role->name = $request->name;
        $role->save();
        return back()->with('RoleAdd', $request->name.' Role added successfully done!');
    }
    function RoleDelete($id){
        Role::findOrFail($id)->delete();
        return back()->with('RoleDelete', 'Role Deleted');
    }
    function RoleEdit($id){
        return view('admin.users.role-edit',[
            'role' => Role::findOrFail($id),
        ]);
    }
    function UpdateRole(Request $request){
        $role = Role::findOrFail($request->id);
        $role->name = $request->name;
        $role->save();
        return back()->with('UpdateRole', $role->name.' Updated!');
    }
    function Permission(){
        return view('admin.users.persmission',[
            'permissions' => Permission::orderBy('id', 'DESC')->paginate(10),
        ]);
    }
    function PermissionEdit($id){
        return view('admin.users.permission-edit',[
            'permission' => Permission::findOrFail($id),
        ]);
    }
    function UpdatePermission(Request $request){
        $permission_update          = Permission::findOrFail($request->id);
        $permission_update->name    = $request->name;
        $permission_update->save();
        return back()->with('UpdatePermission', $permission_update->name.' Updated!');
    }
    function AddPermission(Request $request){
        $permission             = new Permission();
        $permission->name       = $request->name;
        $permission->guard_name = 'web';
        $permission->save();
        return back()->with('AddPermission', $request->name.' Permission added successfully done!');
    }
    function DeletePermission($id){
        Permission::findOrFail($id)->delete();
        return back()->with('DeletePermission', 'Permission Deleted');
    }
    function RolePermission(){
        return view('admin.users.role-permission',[
            'permissions' => Permission::orderBy('name', 'ASC')->paginate(10),
            'roles' => Role::orderBy('name', 'ASC')->paginate(10),
        ]);
    }
    function RoletoPermission(Request $request){
        $role_name          = $request->role_name;
        $permission_name    = $request->permission_name;
        $role               = Role::where('name', $role_name)->first();
        // $role->syncPermissions($permission_name); Only 01 permission add
        $role->givePermissionTo($permission_name); //Multiple Role Permission
        return back()->with('RoleAddToPermission', 'Permission Added To Role Successfully !');
    }
    function RolePermissionEdit($id){
        $role = Role::findOrFail($id);
        return view('admin.users.role-permission-edit',[
            'role' =>$role,
        ]);
    }
    function UpdateRolePermissions(Request $request){
        $role = Role::findOrFail($request->role_id);
        $role->syncPermissions($request->permission);
        return redirect()->route('RolePermission')->with('UpdateRolePermissions','Role Permission Updated!');
    }
    function UserRole(){
        return view('admin.users.user-role',[
            'permissions'   => Permission::orderBy('name', 'ASC')->paginate(10),
            'roles'         => Role::orderBy('name', 'ASC')->paginate(10),
            'users'         => User::orderBy('name', 'ASC')->paginate(10),
        ]);
    }
    function RoletoUser(Request $request){
        $user_id            = $request->user_id;
        $role_name          = $request->role_name;
        $user               = User::findOrFail($user_id);
        $user->syncRoles($role_name);
        return back()->with('RoletoUser', 'Role Added To user Successfully !');
    }
    function UserRoleEdit($id){
        $user = User::findOrFail($id);
        return view('admin.users.user-role-edit',[
            'user'          => $user,
            'roles'         => Role::all(),
            'permissions'   => Permission::all(),
            'role_select'   => $user->getRoleNames(),
        ]);
    }
    function UserRoleUpdate(Request $request){
        $user = User::findOrFail($request->user_id);
        $user->syncRoles($request->role);
        return redirect()->route('UserRole')->with('RoletoUser', 'User Role Updated');
    }
    function UserPermission(){
        return view('admin.users.user-permission',[
            'permissions'   => Permission::orderBy('name', 'ASC')->paginate(10),
            'roles'         => Role::orderBy('name', 'ASC')->paginate(10),
            'users'         => User::orderBy('name', 'ASC')->paginate(10),
        ]);
    }
    function UserPermissionAdd(Request $request){
        $user = User::findOrFail($request->user_id);
        $user->syncPermissions($request->permission);
        return back()->with('UserPermissionAdd', 'User Permission Added');
    }
    function UserPermissionEdit($id){
        return view('admin.users.user-permission-edit',[
            'permissions'   => Permission::orderBy('name', 'ASC')->paginate(10),
            'roles'         => Role::orderBy('name', 'ASC')->paginate(10),
            'user'          => User::findOrFail($id),
        ]);
    }
    function UpdateUserPermissions(Request $request){
        $user = User::findOrFail($request->user_id);
        $user->syncPermissions($request->permission);
        return redirect()->route('UserPermission')->with('UserPermissionAdd', 'User Permission Updated');
    }
    function UserPermissionClean($id){
        $user = User::findOrFail($id);
        $user->revokePermissionTo($user);
        return back();
    }
}
