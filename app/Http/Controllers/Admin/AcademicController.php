<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Section;
Use App\Models\Teacher;
use App\Models\ClassSetup;
use App\Models\FeeSetup;

class AcademicController extends Controller
{
    public function class_setup()
    {
        $classes = Classes::select('id','class_roman','class_english')->where('status',0)->get();
        $sections = Section::select('id','section')->where('status',0)->get();
        $teachers = Teacher::select('id','first_name','last_name')->where('status',0)->get();
        $classSetups = ClassSetup::where('status',0)->get();
        return view('admin.academic.class_setup',compact('classes','sections','teachers','classSetups'));
    }

    public function store_class_setup(Request $request)
    {
        $data = $request->except('_token');
        ClassSetup::create($data);

        return redirect()->back()->with('success', 'Setup has been created!');
    }

    public function fee_setup()
    {
        $classes = Classes::select('id','class_roman','class_english')->where('status',0)->get();
        $sections = Section::select('id','section')->where('status',0)->get();
        $teachers = Teacher::select('id','first_name','last_name')->where('status',0)->get();
        $classSetups = ClassSetup::where('status',0)->get();
        return view('admin.academic.fee_setup',compact('classes','sections','teachers','classSetups'));
    }

    public function store_fee_setup(Request $request)
    {
        $data = $request->except('_token');
        FeeSetup::create($data);

        return redirect()->back()->with('success', 'Setup has been created!');
    }
}
