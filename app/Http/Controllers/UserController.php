<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $limit = 5;
        // $users = User::paginate($limit);
        // $roles = Role::all();
        // $permissions = Permission::all();
        // return view('users.index', compact('roles', 'permissions', 'users', 'limit'));
        return redirect('/user/indexfilter/5');
    }

    public function indexfilter(Request $request)
    {
        return redirect('/user/indexfilter/'.$request->limit);
    }

    public function indexfilterget($limit)
    {
        $users = User::paginate($limit);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('users.index', compact('roles', 'permissions', 'users', 'limit'));
    }

    public function rolepermission(Role $role)
    {
        $permissionOption = Permission::pluck('name','name');
        return view('users.rolepermission', compact('role', 'permissionOption'));
    }

    public function updatepermission(Request $request, Role $role)
    {
        $role->syncPermissions($request->permission);
        return redirect('/user');
    }

    public function createrole(Request $request)
    {
        Role::create(['name'=>$request->role]);
        flash('New Role: '.$request->role.' Created Successfully')->success()->important();
        return back();
    }
}
