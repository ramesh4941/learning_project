<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSetup extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'class_id',
        'section_id',
        'teacher_id',
        'class_strength',
        'status',
    ];
}
