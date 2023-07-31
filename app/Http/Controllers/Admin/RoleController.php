<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate(['name' => ['required', 'min:3']]);
        Role::create($validated);

        return to_route('admin.role.index')->with('message', [
            'text' => 'Role Created Successfully',
            'data' => 'Welcome on board ' . $validated['name'],
        ]);
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact("role", "permissions"));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role->update($validated);
        return to_route('admin.role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }

    public function assignPermissions(Request $request, Role  $role)
    {
        $user = Auth::user()->name;
        if ($role->hasPermissionTo($request->permission)) {
            return back()->with('message', [

                'text' => 'Permission already granted',
                'data' => 'You already have this permission ' . $user
            ]);
        }
        $role->givePermissionTo($request->permission);

        return back()->with('message', [
            'text' => 'Congratulations new permission assigned',
            'data' =>  'Enjoy your new permission ' . $user
        ]);
    }


    public function revokePermissions(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with('message', ['text' => 'Permission Revoked Successfully', 'data' => 'Successfully revoke this permission']);
        }
        return back()->with('message', [
            'text' => 'Permission does not exist',
            'data' => 'Error Permission Found'
        ]);
    }
}
