<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function index()
    {
        $records = ContactUs::all();

        return view('Dashboard.ContactUs.index', compact('records'));
    }


    public function  store(Request $request)
    {

        $inputDate = $request->input('dob');

        $carbonDate = Carbon::createFromFormat('d.m.Y', $inputDate);
        $timestamp = $carbonDate->format('Y-m-d');

        $data = $request->except('dob');
        $data['dob'] = $timestamp;
        ContactUs::create($data);

        toast('Message sent successfully!', 'success');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $record = ContactUs::find($id);
        if (!$record) {
            toast('Message not found!', 'error');
            return redirect()->back();
        }

        $record->delete();
        toast('Message deleted successfully!', 'success');
        return redirect()->back();
    }
}
