<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_roman',
        'class_english',
        'status',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'class_id');
    }
}
