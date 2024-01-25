<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $services = Service::all();
        $doctors = Doctor::all();
        return view('index', compact('services', 'doctors'));
    }
}
