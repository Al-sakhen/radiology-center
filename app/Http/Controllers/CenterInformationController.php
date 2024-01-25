<?php

namespace App\Http\Controllers;

use App\Models\CenterInformation;
use Illuminate\Http\Request;

class CenterInformationController extends Controller
{
    public function index()
    {

        return view('Dashboard.CenterInformation.index',);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => ['required', 'string', 'max:255'],
            'address' => 'required',
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email'],
        ]);

        $data = $request->only(['name', 'description',  'address', 'phone', 'email']);

        $centerInfo = CenterInformation::first();
        if ($centerInfo) {
            $centerInfo->update($data);
        } else {
            CenterInformation::create($data);
        }
        toast('Center Information Updated Successfully', 'success');
        return redirect()->back();
    }
}
