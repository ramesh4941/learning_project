<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeSetup extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'registration_fee',
        'admission_form',
        'admission_fee',
        'annual_charge',
        'examination_fee',
        'monthly_fee',
        'monthly_late_fine',
        'late_fine_date',
        'status',
    ];
}
