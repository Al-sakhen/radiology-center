<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('Dashboard.Services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except(['image']);
        $path = $request->file('image')->store('services', 'public');
        $data['image'] = $path;
        Service::create($data);

        toast('Service created successfully', 'success');
        return redirect()->route('admin.services.index');
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
        $service = Service::find($id);
        if (!$service) {
            toast('Service not found', 'error');
            return redirect()->back();
        }
        return view('Dashboard.Services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::find($id);
        if (!$service) {
            toast('Service not found', 'error');
            return redirect()->back();
        }
        $data = $request->except(['_token', 'image']);
        $old_image = $service->image;
        // if new image uploaded
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services');
            $data['image'] = $path;
        }
        $service->update($data);
        // delete old image if new image uploaded
        if ($request->hasFile('image') && $old_image) {
            Storage::delete($old_image);
        }

        toast('Service updated successfully', 'success');
        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        if (!$service) {
            toast('Service not found', 'error');
            return redirect()->back();
        }
        $service->delete();
        Storage::delete($service->image);

        toast('Service deleted successfully', 'success');
        return redirect()->back();
    }
}
