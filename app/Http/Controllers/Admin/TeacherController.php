<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;

class TeacherController extends Controller
{
    public function index()
    {
        $subjects = Subject::where('status',0)->get();
        return view('admin.teacher.create', compact('subjects'));
    }

    public function save(Request $request)
    {
        // $request->validate([
        //     'first_name' => 'required|max:30',
        //     'last_name' => 'required|max:30',
        //     'subject' => 'required'
        // ],
        // [
        //     'section.unique' => 'Section already has been created',
        // ]);

        $teacher = new Teacher();
        $this->store($teacher, $request);
        // return redirect()->back()->with('success', 'Teacher has been created!'); 
    }

    public function store($teacher, $request)
    {
        $filePath = 'files/teacher/';

        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->father_name = $request->father_name;
        $teacher->dob = $request->dob;
        $teacher->gender = $request->gender;
        $teacher->phone = $request->phone;
        $teacher->email_address = $request->email_address;
        $teacher->password = $request->password;
        $teacher->subject = implode(',', $request->subject);
        $teacher->experience = $request->experience_year.' Year '.($request->experience_month == 0 ? '' : $request->experience_month.' Months');
        $teacher->highest_degree = $request->highest_degree;
        $teacher->address = $request->address;
        $teacher->pin_code = $request->pin_code;
        $teacher->city = $request->city;
        $teacher->state = $request->state;
        $teacher->ifsc = $request->ifsc;
        $teacher->account_number = $request->account_number;

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            $photoName = 'IMG'.time().'.'.$photo->extension();
            $photo->move(public_path($filePath), $photoName);
            $teacher->photo = $filePath.$photoName;
        }
        if ($request->file('aadhar')) {
            $aadhar = $request->file('aadhar');
            $aadharName = 'ADHAR'.time().'.'.$aadhar->extension();
            $aadhar->move(public_path($filePath), $aadharName);
            $teacher->aadhar = $filePath.$aadharName;
        }
        if ($request->file('degree_attachment')) {
            $degree = $request->file('degree_attachment');
            $degreeName = 'EDU'.time().'.'.$degree->extension();
            $degree->move(public_path($filePath), $degreeName);
            $teacher->degree_attachment = $filePath.$degreeName;
        }
        $teacher->save();
    }
}
