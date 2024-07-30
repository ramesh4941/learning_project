<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function subject()
    {
        $subjects = Subject::get();
        return view('admin.subject.subject',compact('subjects'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'subject' => 'unique:subjects,subject|required|max:30',
        ],
        [
            'subject.unique' => 'subject already has been created',
        ]);

        $subject = new Subject;
        $subject->subject = ucwords($request->subject);
        $subject->save();

        return redirect()->back()->with('success', 'Subject <strong>'.$subject->subject.'</strong> has been created!'); 
    }
}
