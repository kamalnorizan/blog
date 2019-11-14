<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('users.index', compact('roles', 'permissions'));
    }

    public function rolepermission(Role $role)
    {
        $permissionOption = Permission::pluck('name','name');
        return view('users.rolepermission', compact('role', 'permissionOption'));
    }

    public function updatepermission(Request $request, Role $role)
    {
        dd($request);
    }
}
