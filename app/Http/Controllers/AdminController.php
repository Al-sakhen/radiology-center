<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\createAdminRequest;
use App\Http\Requests\Admin\updateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
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

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,

        ]);

        foreach ($request->role_ids as $role_id) {
            $role = Role::find($role_id);
            $admin->assignRole($role);
        }
        toast('admin add succsessfuly!', 'success');

        return redirect()->route('admin.create');
    }

    public function edit($id)
    {
        if (auth()->user()->id != $id) {
            toast('you can not edit this user!', 'error');
            return redirect()->back();
        }

        $admin = Admin::findOrFail($id);
        return view('Dashboard.Admin.edit', compact('admin'));
    }

    public function update(updateAdminRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,

        ]);
        toast('admin updated succsessfuly!', 'success');

        return redirect()->route('admin.index');
    }
    public function destroy($id)
    {

        $admin = Admin::findOrFail($id);
        $admin->delete();
        toast('admin deleted succsessfuly!', 'success');

        return redirect()->route('admin.index');
    }
}
