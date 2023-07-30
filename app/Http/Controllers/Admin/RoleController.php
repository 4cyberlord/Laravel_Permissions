<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('admin.roles.edit', compact("role"));
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
}
