<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_id',
        'section_id',
        'attendance_by',
        'date',
        'status',
    ];

    /**
     * Define the relationship with the Student model.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Define the relationship with the Class model.
     */
    public function class()
    {
        return $this->belongsTo(ClassSetup::class, 'class_id');
    }

    /**
     * Define the relationship with the Section model.
     */
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    /**
     * Define the relationship with the Teacher model.
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'attendance_by');
    }
}
