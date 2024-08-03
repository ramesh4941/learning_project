<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guardian;
use App\Models\Classes;
use App\Models\Section;
use App\Models\FeeSetup;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'addmission_number',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'phone',
        'email_address',
        'password',
        'parent_id',
        'class_id',
        'section_id',
        'address',
        'pin_code',
        'city',
        'state',
        'photo',
        'aadhar',
        'transfer_certificate',
        'status',
    ];

    public function get_parents()
    {
        return $this->hasOne(Guardian::class, 'id', 'parent_id');
    }

    public function classes()
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }

    public function section()
    {
        return $this->hasOne(Section::class, 'id', 'section_id');
    }

    public function fee_details()
    {
        return $this->hasOne(FeeSetup::class, 'class_id', 'class_id');
    }

}
