<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Guardian;
use Illuminate\Support\Facades\Hash;

class AdmissionController extends Controller
{
    public function registration()
    {
        $classes = Classes::select('id','class_roman','class_english')->where('status',0)->get();
        $sections = Section::select('id','section')->where('status',0)->get();
        $parents = Guardian::select('id','father_name','mother_name','single_parent','single_parent_relation','phone')->where('status',0)->get();
        return view('admin.admission.registration',compact('classes','sections','parents'));
    }

    public function store(Request $request)
    {
        $student = new Admission();
        $this->save($student, $request);
    }

    public function list()
    {
        $admissions = Admission::get();
        return view('admin.admission.list',compact('admissions'));
    }

    public function save($student, $request)
    {
        $filePath = 'files/student/';

        $student->addmission_number = "123456";
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->email_address = $request->email_address;
        $student->password = Hash::make('123');
        $student->parent_id = $request->parent_id;
        $student->class_id = $request->class_id;
        $student->section_id = $request->section_id;
        $student->address = $request->address;
        $student->pin_code = $request->pin_code;
        $student->city = $request->city;
        $student->state = $request->state;

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            $photoName = 'IMG'.time().'.'.$photo->extension();
            $photo->move(public_path($filePath), $photoName);
            $student->photo = $filePath.$photoName;
        }
        if ($request->file('aadhar')) {
            $aadhar = $request->file('aadhar');
            $aadharName = 'ADHAR'.time().'.'.$aadhar->extension();
            $aadhar->move(public_path($filePath), $aadharName);
            $student->aadhar = $filePath.$aadharName;
        }
        if ($request->file('transfer_certificate')) {
            $degree = $request->file('transfer_certificate');
            $degreeName = 'TC'.time().'.'.$degree->extension();
            $degree->move(public_path($filePath), $degreeName);
            $student->transfer_certificate = $filePath.$degreeName;
        }
        $student->save();
    }
}
