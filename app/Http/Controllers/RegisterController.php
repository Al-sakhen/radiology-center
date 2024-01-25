<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function register(Request $request)
    {
        // --------- Check if patient is already registered and his type is "wait" ---------
        $registeredPatient = Register::where('patient_id', $request->patientId)
            ->where('admin_id', $request->adminId)
            ->where('type', 'wait')->first();
        if ($registeredPatient) {
            toast('patient is already registered!', 'error');
            return redirect()->back();
        }


        Register::create([
            'patient_id' => $request->patientId,
            'admin_id' => $request->adminId,
        ]);

        toast('patient registresion succsessfuly!', 'success');
        return redirect()->route('admin.patient.index');
    }

    public function physician(Request $request)
    {


        $type = $request->exists('rays') ? 'rays' : 'end';

        $register = Register::findOrFail($request->register_id);
        $old_image = $register->image;

        if ($request->image) {
            $filaName = Storage::putFile('image', $request->image);
        }

        if ($old_image) {
            Storage::delete($old_image);
        }
        Register::where('id', $request->register_id)->update([
            'description' => ($request->description) ? $request->description : $register,
            'type' => $type,
            'image' => $filaName ?? null,
            'medical_image_id' => $request->medical_image_id ?? null,
        ]);


        toast('patient registresion succsessfuly!', 'success');
        return redirect()->route('admin.patient.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegisterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegisterRequest $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Register $register)
    {
        //
    }
}
