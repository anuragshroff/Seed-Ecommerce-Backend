<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RollPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Role::query();
        $roles = $query->paginate(20);
        return view('admin.accessManagement.role-permission.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all()->groupBy('group');
        return view('admin.accessManagement.role-permission.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50', 'unique:roles,name']
        ]);
        /** create role */
        $role = Role::create(['guard_name' => 'web', 'name' => $request->name]);
        /** assign permissions to the role */
        $role->syncPermissions($request->permissions);
        return to_route('role-permission.index')->with('success', 'New role permission created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all()->groupBy('group');
        $rolePermissions = $role->permissions;
        $rolePermissions = $rolePermissions->pluck('name')->toArray();

        return view('admin.accessManagement.role-permission.edit', compact('permissions', 'role', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:50', 'unique:roles,name,'.$id]
        ]);

        /** create role */
        $role = Role::findOrFail($id);
        $role->update(['guard_name' => 'web', 'name' => $request->name]);

        /** assign permissions to the role */
        $role->syncPermissions($request->permissions);

        return to_route('role-permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
