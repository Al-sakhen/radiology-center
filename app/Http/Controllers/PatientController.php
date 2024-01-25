<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePatienRequest;
use App\Models\Admin;
use App\Models\MedicalImage;
use App\Models\Patient;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{

    public function index()
    {

        if (auth()->user()->hasRole('Doctor')) {
            $patients = Register::with('patiants')
                ->where('admin_id', auth()->user()->id)
                ->paginate(10);
        } else if (auth()->user()->hasRole('Radiologist')) {

            $patients = Register::with('patiants')->where('type', 'rays')->paginate(10);
        } else {

            $patients = Patient::where('status', 'active')->paginate(10);
        }

        $admins = Admin::role('Doctor')->get();

        $medicalImages = MedicalImage::all();
        return view('Dashboard.patient.index', compact('patients', 'admins', 'medicalImages'));
    }


    public function showInactivePatients()
    {
        $patients = Patient::where('status', 'not_active')->paginate(10);
        $admins = Admin::role('Doctor')->get();
        $medicalImages = MedicalImage::all();
        return view('Dashboard.Patient.inactiveUsers', compact('patients', 'admins', 'medicalImages'));
    }


    public function edit($id)
    {
        if (!auth()->user()->hasAnyRole('Admin', 'Manager')) {
            toast('you can not edit this patient!', 'error');
            return redirect()->back();
        }


        $patient = Patient::find($id);
        if (!$patient) {
            toast('patient not found!', 'error');
            return redirect()->back();
        }
        return view('Dashboard.Patient.edit', compact('patient'));
    }

    public function update($id, CreatePatienRequest $request)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            toast('patient not found!', 'error');
            return redirect()->back();
        }
        $data = $request->only(['name', 'national_number', 'dob', 'address', 'phone', 'gender']);
        $patient->update($data);

        toast('patient updated succsessfuly!', 'success');
        return redirect()->route('admin.patient.index');
    }

    public function create()
    {

        return view('Dashboard.Patient.create');
    }

    public function store(CreatePatienRequest $request)
    {
        Patient::create([
            'name' => $request->name,
            'national_number' => $request->national_number,
            'DOB' => $request->dob,
            'address' => $request->address,
            'phone' => $request->phone,
            'gender' => $request->gender
        ]);


        toast('patient add succsessfuly!', 'success');

        return redirect()->route('admin.patient.index');
    }

    public function search(Request $request)
    {
        $medicalImages = MedicalImage::all();
        $admins = Admin::role('Doctor')->get();

        $patients = Patient::where('name', 'like', '%' . $request->name . '%')
            ->orWhere('address', 'like', '%' . $request->name . '%')->paginate(10);
        return view('Dashboard.patient.index', compact('patients', 'medicalImages', 'admins'));
    }
    public static function getAge($patientDOB)
    {

        $year = \Carbon\Carbon::parse($patientDOB)->diff(\Carbon\Carbon::now())->format('%y');
        $month = \Carbon\Carbon::parse($patientDOB)->diff(\Carbon\Carbon::now())->format('%m');
        $day = \Carbon\Carbon::parse($patientDOB)->diff(\Carbon\Carbon::now())->format('%d');
        if ($year  == 0 && $month == 0) {
            return  $day . ' day';
        } else if ($year == 0) {
            return $month . ' month';
        } else {
            return $year . ' year';
        }
    }

    public function toggleStatus($id)
    {
        $patient = Patient::find($id);
        // --------- Check if patient not found ------------
        if (!$patient) {
            toast('Patient not found!', 'error');
            return redirect()->back();
        }


        // --------- Toggle patient status ------------
        if ($patient->status == 'active') {
            $patient->update([
                'status' => 'not_active'
            ]);
        } else {
            $patient->update([
                'status' => 'active'
            ]);
        }
        toast('Patient status updated succsessfuly!', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        // --------- Check if patient not found ------------
        if (!$patient) {
            toast('Patient not found!', 'error');
            return redirect()->back();
        }
        // --------- Check if patient not have any register data ------------
        if ($patient->register) {
            toast('Patient can not be deleted, he have registered data!', 'error');
            return redirect()->back();
        }

        // --------- Delete patient ------------
        $patient->delete();
        toast('Patient deleted succsessfuly!', 'success');
        return redirect()->back();
    }
}
