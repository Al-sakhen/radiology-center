<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function create(){

        return view('Dashboard.Permission.create');
    }

    public function store(Request $request){

        Permission::create([
            'name'=>$request->name,
            'guard_name'=>'admin'
        ]);

        toast('permission add succsessfuly!','success');

        return redirect()->route('admin.permission.create');

    }
}
