<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        // $roles = Role::all();
        // No podemos ver el rol de admin, para que no se pudeda editar o eliminar
        $roles = Role::whereNotIn('name', ['admin'])
                        ->orderBy('id')
                        ->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|min:3']);
        Role::create($validated);

        return to_route('admin.roles.index')->with('message', 'New role created successfully!!');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => 'required|min:3']);
        $role->update($validated);

        return to_route('admin.roles.index')->with('message', 'Role updated successfully!!');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('message', 'Role deleted successfully!!');
    }

    public function assignPermissions(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permissions);

        return back()->with('message', 'Permissions assingned to Role successfully!!');
    }
}
