<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }


    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required', 'min:3']);
        Permission::create($validated);
        return to_route('admin.permissions.index');
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => 'required', 'min:3']);
        $permission->update($validated);
        return to_route('admin.permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('message', ['text' => 'Permission Deleted Successfully', 'data' => 'Permission no longer exist']);
    }

    public function assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return back()->with('message', ['text' => 'Sorry Role Exist', 'data' => 'Sorry you already have this role']);
        }

        $permission->assignRole($request->role);
        return back()->with('message', ['text' => 'Role Assign Successfully', 'data' => 'New Role Attached']);
    }

    public function revokeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('message', ['text' => 'Role Successfully removed', 'data' => 'You no longer have this role']);
        }

        return back()->with('message', ['text' => 'Sorry Role Exist', 'data' => 'Please check you already have this role']);
    }
}
