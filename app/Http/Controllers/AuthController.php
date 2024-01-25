<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {

        return view('Dashboard.Auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {

            if (auth()->user()->status == 'active') {
                return redirect()->route('admin.index');
            } else {
                auth()->logout();
                return redirect()->back()->with('error', 'Your account is not active');
            }
        } else {

            return redirect()->back()->with('error', 'Email or Password is wrong');
        }
    }

    public function logout()
    {

        Auth::guard('admin')->logout();

        return redirect()->route('home');
    }
}
