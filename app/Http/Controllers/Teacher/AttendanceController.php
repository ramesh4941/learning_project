<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Support\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        $teacher = Auth::user();
        $classSetup = $teacher->classSetup;
        $classId = $classSetup->class_id;
        $sectionId = $classSetup->section_id;
        $teacherId = $teacher->id;
        $today = Carbon::today()->toDateString();

        if ($classSetup){
            $students = Student::where('class_id', $classId)
                               ->where('section_id', $sectionId)
                               ->orderBy('roll_number', 'asc')
                               ->get();

            // Retrieve attendance records for today
            $attendances = Attendance::where('class_id', $classId)
                                     ->where('section_id', $sectionId)
                                     ->where('date', $today)
                                     ->get()
                                     ->keyBy('student_id'); 

            $yesterdayPresentCount = Attendance::where('class_id', $classId)
                                     ->where('section_id', $sectionId)
                                     ->where('date', now()->subDay()->toDateString())
                                     ->where('status', 'Present')
                                     ->count();
        } else {
            $students = collect();
            $attendances = collect();
            $yesterdayPresentCount = 0;
        }
        return view('teacher.attendance.attendance',compact('students','classId','sectionId','teacherId','attendances','yesterdayPresentCount'));
    }

    public function submitAttendance(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'status' => 'required|in:Present,Absent,Late',
            'class_id' => 'required|exists:class_setups,id',
            'section_id' => 'required|exists:sections,id',
            'attendance_by' => 'required|exists:teachers,id',
            'date' => 'required|date'
        ]);

        Attendance::updateOrCreate(
            [
                'student_id' => $validatedData['student_id'],
                'date' => $validatedData['date']
            ],
            $validatedData
        );

        return response()->json(['success' => true]);
    }

}
