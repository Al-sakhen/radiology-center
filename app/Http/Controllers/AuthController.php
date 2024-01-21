<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage(){

        return view('Dashboard.Auth.login');
    }

    public function login(Request $request  ){

        $credentials = $request->only('email','password');

        if(Auth::guard('admin')->attempt($credentials)){

            return redirect()->route('admin.index');

        }else{

            return redirect()->back();
        }
    }

    public function logout(){

        Auth::guard('admin')->logout();

        return redirect()->route('home');
    }
}
