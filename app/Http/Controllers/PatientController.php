<?php

namespace App\Http\Controllers;

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

        //  Auth::guard('admin')->user()->hasRole('Doctor')

        if (Auth::guard('admin')->user()->hasRole('Doctor'))
            $patients = Register::with('patiants')->where('admin_id', Auth::guard('admin')->user()->id)->paginate(10);
        else if (Auth::guard('admin')->user()->hasRole('Radiologist'))
            $patients = Register::with('patiants')->where('type', 'rays')->paginate(10);
        else
            $patients = Patient::paginate(10);

        $admins = Admin::role('Doctor')->get();

        $medicalImages = MedicalImage::all();
        return view('Dashboard.patient.index', compact('patients', 'admins', 'medicalImages'));
    }
    public function create()
    {

        return view('Dashboard.Patient.create');
    }

    public function store(Request $request)
    {

        Patient::create([
            'name' => $request->name,
            'national_number' => $request->national_number,
            'DOB' => $request->dob,
            'address' => $request->address,
            'phone' => $request->phone,

        ]);


        toast('patient add succsessfuly!', 'success');

        return redirect()->route('admin.patient.create');
    }

    public function search(Request $request)
    {

        $patients = Patient::where('name', 'like', '%' . $request->name . '%')
            ->orWhere('address', 'like', '%' . $request->name . '%')->paginate(10);
        return view('Dashboard.patient.index', compact('patients'));
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
}
