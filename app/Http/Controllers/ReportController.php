<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Patient;
use PDF;

use App\Models\Register;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function create(Request $request)
    {

        $registerId = $request->route('registerId');
        $register = Register::findOrFail($registerId);
        return view('Dashboard.Report.create', compact('registerId', 'register'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'center_name' => 'required',
            'center_description' => 'required',
            'doctor_name' => 'required',
            'center_address' => 'required',
            'center_phone' => 'required',
            'description' => 'required',
            'register_id' => 'required',
        ]);

        $report = Report::create([
            'center_name' => $request->center_name,
            'center_description' => $request->center_description,
            'doctor_name' => $request->doctor_name,
            'center_address' => $request->center_address,
            'center_phone' => $request->center_phone,
            'description' => $request->description,
            'register_id' => $request->register_id,
        ]);

        if ($report) {
            Register::findOrFail($request->register_id)->update([
                'type' => 'done'
            ]);
        }

        toast('report created succsessfuly!', 'success');
        return redirect()->route('admin.patient.index');
    }

    public function print($id)
    { {
            $data =  Report::with('Register')->where('register_id', $id)->first();
            $pateint = Patient::findOrFail($data->Register->patient_id);
            $admin = Admin::findOrFail($data->Register->admin_id);
            $pdf = PDF::loadView('pdf.test', compact('data', 'pateint', 'admin'));

            return $pdf->stream('document.pdf');
        }
    }
}
