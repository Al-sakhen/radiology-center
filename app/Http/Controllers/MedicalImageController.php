<?php

namespace App\Http\Controllers;

use App\Models\MedicalImage;
use App\Http\Requests\StoreMedicalImageRequest;
use App\Http\Requests\UpdateMedicalImageRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MedicalImageController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicalImages = MedicalImage::all();
        return view('Dashboard.MedicalImage.index',compact('medicalImages'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        MedicalImage::create([
            'name'=>$request->name
        ]);
        toast('patient add succsessfuly!','success');

        return redirect()->route('admin.medicalImage.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalImage $medicalImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalImage $medicalImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicalImageRequest $request, MedicalImage $medicalImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalImage $medicalImage)
    {
        //
    }
}
