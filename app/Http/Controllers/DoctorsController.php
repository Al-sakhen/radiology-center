<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('Dashboard.Doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except(['image']);
        $path = $request->file('image')->store('doctors', 'public');
        $data['image'] = $path;
        Doctor::create($data);

        toast('Doctor added successfully', 'success');
        return redirect()->route('admin.doctors.index');
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
        $doctor = Doctor::find($id);
        if (!$doctor) {
            toast('Doctor not found', 'error');
            return redirect()->back();
        }
        return view('Dashboard.Doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            toast('Doctor not found', 'error');
            return redirect()->back();
        }
        $data = $request->except(['_token', 'image']);
        $old_image = $doctor->image;
        // if new image uploaded
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('doctors');
            $data['image'] = $path;
        }
        $doctor->update($data);
        // delete old image if new image uploaded
        if ($request->hasFile('image') && $old_image) {
            Storage::delete($old_image);
        }

        toast('Doctor updated successfully', 'success');
        return redirect()->route('admin.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            toast('Doctor not found', 'error');
            return redirect()->back();
        }
        $doctor->delete();
        Storage::delete($doctor->image);

        toast('Doctor deleted successfully', 'success');
        return redirect()->back();
    }
}
