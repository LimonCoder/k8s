<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->latest()->get();

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'role_name' => 'bail|required|unique:roles,name'
            ]);

            $role = Role::create(['name' => $request->role_name, 'guard_name' => 'web']);

            $post_permissions = $request->input('permissions');

            foreach ($post_permissions as $key => $val) {
                $permissions[intval($val)] = intval($val);
            }

            $role->syncPermissions($permissions);

            DB::commit();

            $notify = ['message'=> 'Role Create Successfully', 'alert-type' => 'success'];

        } catch (\Exception $e) {
            DB::rollback();

            $notify = ['message'=> 'Role Creation Failed', 'alert-type' => 'error'];
        }

        return redirect()->back()->with($notify);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        return view('admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permissions = Permission::all();
        $role = Role::with('permissions')->findOrFail($id);

        return view('admin.role.edit', compact('permissions','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'role_name' => "bail|required|unique:roles,name, $role->id"
            ]);

            $role->update(['name' => $request->role_name]);

            $post_permissions = $request->input('permissions');

            foreach ($post_permissions as $key => $val) {
                $permissions[intval($val)] = intval($val);
            }

            $role->syncPermissions($permissions);

            DB::commit();

            $notify = ['message'=> 'Role Update Successfully', 'alert-type' => 'success'];

        } catch (\Exception $e) {
            DB::rollback();
            $notify = ['message'=> 'Role update Failed', 'alert-type' => 'error'];
        }

        return redirect()->back()->with($notify);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $notify = ['message'=> 'Role Delete Successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
    }
}
