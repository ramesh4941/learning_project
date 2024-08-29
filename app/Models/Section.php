<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    Protected $fillable = [
        'section',
        'status',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'section_id');
    }
}
