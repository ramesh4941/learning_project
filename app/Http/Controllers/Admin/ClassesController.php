<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;

class ClassesController extends Controller
{
    public function classes()
    {
        $classes = Classes::get();
        return view('admin.classes.classes',compact('classes'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'class_roman' => 'unique:classes,class_roman|required|max:10',
            'class_english' => 'unique:classes,class_english|required|min:3|max:20',
        ],
        [
            'class_roman.unique' => 'Class already has been created',
            'class_english.unique' => 'Class (in english) already has been created',
        ]);

        $class = new Classes;
        $class->class_roman = strtoupper($request->class_roman);
        $class->class_english = ucwords($request->class_english);
        $class->save();

        return redirect()->back()->with('success', 'Class <strong>'.$class->class_roman.' ('.$class->class_english.')</strong> has been created!'); 
    }
}
