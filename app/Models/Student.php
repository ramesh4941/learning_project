<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function classSetup()
    {
        return $this->belongsTo(ClassSetup::class, 'class_id', 'class_id')
                    ->where('section_id', $this->section_id);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
