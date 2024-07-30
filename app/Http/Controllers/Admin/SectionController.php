<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function section()
    {
        $sections = Section::get();
        return view('admin.section.section',compact('sections'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'section' => 'unique:sections,section|required|max:5',
        ],
        [
            'section.unique' => 'Section already has been created',
        ]);

        $section = new Section;
        $section->section = strtoupper($request->section);
        $section->save();

        return redirect()->back()->with('success', 'Section <strong>'.$section->class_roman.'</strong> has been created!'); 
    }
}
