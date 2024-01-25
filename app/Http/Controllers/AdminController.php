<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\createAdminRequest;
use App\Http\Requests\Admin\updateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function index()
    {
        // dd(auth()->user()->roles);
        $admins = Admin::with(['roles'])->where('id', '!=', auth()->user()->id)->get();
        return view('Dashboard.Admin.index', compact('admins'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('Dashboard.Admin.create', compact('roles'));
    }

    public function store(createAdminRequest $request)
    {
        DB::beginTransaction();
        try {

            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,

            ]);

            foreach ($request->role_ids as $role_id) {
                $role = Role::find($role_id);
                $admin->roles()->attach($role, ['model_type' => 'App\Models\Admin']);
            }

            DB::commit();
            toast('admin add succsessfuly!', 'success');
            return redirect()->route('admin.create');
        } catch (\Exception $ex) {
            DB::rollback();
            toast('something went wrong!', 'error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if (!auth()->user()->hasRole('Manager') || !auth()->user()->id == $id) {
            toast('you can not edit this user!', 'error');
            return redirect()->back();
        }
        $roles = Role::all();
        $admin = Admin::findOrFail($id);
        return view('Dashboard.Admin.edit', compact('admin', 'roles'));
    }

    public function update(updateAdminRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $admin = Admin::findOrFail($id);
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,

            ]);

            $admin->roles()->detach();
            foreach ($request->role_ids as $role_id) {
                $role = Role::find($role_id);
                $admin->roles()->attach($role, ['model_type' => 'App\Models\Admin']);
            }

            DB::commit();
            toast('admin updated succsessfuly!', 'success');
            return redirect()->route('admin.index');
        } catch (\Exception $ex) {
            DB::rollback();
            toast('something went wrong!', 'error');
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        if (!auth()->user()->hasRole('Manager|Admin')) {
            toast('you can not delete this user!', 'error');
            return redirect()->back();
        }

        $admin = Admin::findOrFail($id);
        $admin->delete();
        toast('admin deleted succsessfuly!', 'success');

        return redirect()->route('admin.index');
    }

    public function toggleStatus($id)
    {
        $employee = Admin::find($id);
        // --------- Check if employee not found ------------
        if (!$employee) {
            toast('employee not found!', 'error');
            return redirect()->back();
        }


        // --------- Toggle employee status ------------
        if ($employee->status == 'active') {
            $employee->update([
                'status' => 'not_active'
            ]);
        } else {
            $employee->update([
                'status' => 'active'
            ]);
        }
        toast('admin status updated succsessfuly!', 'success');
        return redirect()->route('admin.index');
    }
}
