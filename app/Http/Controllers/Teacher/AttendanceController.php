<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Holiday;
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

    public function viewAttendance()
    {
        // Get the current year and month
        $year = now()->year;
        $month = now()->month;

        // Get the number of days in the current month
        $daysInMonth = Carbon::create($year, $month)->daysInMonth;

        // Calculate which days are Sundays in the month
        $sundays = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::create($year, $month, $day);
            if ($date->isSunday()) {
                $sundays[] = $day;
            }
        }

        // Get the currently authenticated teacher
        $teacher = Auth::user();

        // Retrieve class setup details for the teacher
        $classSetup = $teacher->classSetup;
        $classId = $classSetup->class_id;
        $sectionId = $classSetup->section_id;

        // Retrieve students based on the class_id and section_id
        $students = Student::where('class_id', $classId)
            ->where('section_id', $sectionId)
            ->with(['attendances' => function($query) use ($year, $month) {
                $query->whereYear('date', $year)
                      ->whereMonth('date', $month);
            }])
            ->get();

        // Retrieve holidays that intersect with the current month
        $holidays = Holiday::whereYear('start_date', '<=', $year)
            ->whereYear('end_date', '>=', $year)
            ->whereMonth('start_date', '<=', $month)
            ->whereMonth('end_date', '>=', $month)
            ->get();

        // Pass data to the view
        return view('teacher.attendance.list', compact('students', 'daysInMonth', 'sundays', 'holidays'));
    }

    public function viewAttendanceByStudent($studentId)
    {
        $student = Student::with(['attendances' => function($query) {
            $query->orderBy('date', 'asc'); // Order attendance records by date
        }, 'attendances.teacher'])->findOrFail($studentId);

        // Get the current date
        $today = Carbon::now();
        // Get the number of days in the current month
        $daysInMonth = $today->daysInMonth;

        // Fetch holidays for the current month
        $holidays = Holiday::whereMonth('start_date', $today->month)
                            ->whereYear('start_date', $today->year)
                            ->orWhere(function ($query) use ($today) {
                                $query->whereMonth('end_date', $today->month)
                                      ->whereYear('end_date', $today->year);
                            })
                            ->get();

        return view('teacher.attendance.details', compact('student', 'holidays', 'today', 'daysInMonth'));
    }
}
