<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::withCount('users')->get();
        return view('Dashboard.Roles.index', compact('roles'));
    }

    public function create()
    {

        $permissions = Permission::get();
        return view('Dashboard.Roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|unique:roles,name',
            'permission_ids' => 'required|array|min:1'
        ], [
            'name.required' => 'name is required',
            'name.unique' => 'name is already exists',
            'permission_ids.required' => 'permission are required',
            'permission_ids.array' => 'permissions are required',
            'permission_ids.min' => 'permission must be at least one',
        ]);


        DB::beginTransaction();
        try {
            $role = Role::create([
                'name' => $request->name,
                'guard_name' => 'admin'
            ]);

            foreach ($request->permission_ids as $permission_id) {
                $permission = Permission::find($permission_id);
                $permission->guard_name = 'admin';
                $role->givePermissionTo($permission);
            }

            toast('role add succsessfuly!', 'success');
            DB::commit();
            return redirect()->route('admin.role.index');
        } catch (\Exception $e) {
            DB::rollback();
            toast('error in add role!', 'error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        return view('Dashboard.Roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->syncPermissions($request->permission_ids);
        $role->update([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);
        toast('role update succsessfuly!', 'success');
        return redirect()->route('admin.role.index');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role->users->count() > 0) {
            toast('role has users!', 'error');
            return redirect()->back();
        }
        $role->delete();
        toast('role delete succsessfuly!', 'success');
        return redirect()->route('admin.role.index');
    }
}
