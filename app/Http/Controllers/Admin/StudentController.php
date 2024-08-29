<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Guardian;
use App\Models\Admission;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function addStudent($admission_id)
    {
        $admission = Admission::find($admission_id);
        $nextRegistrationNumber = $this->getNextRegistrationNumber();
        $nextRollNumber = $this->getNextRollNumber($admission->class_id, $admission->section_id);
        
        $student = new Student();
        $student->registration_number = $nextRegistrationNumber;
        $student->first_name = $admission->first_name;
        $student->last_name = $admission->last_name;
        $student->roll_number = $nextRollNumber;
        $student->dob = $admission->dob;
        $student->gender = $admission->gender;
        $student->phone = $admission->phone;
        $student->email_address = $admission->email_address;
        $student->password = $admission->password;
        $student->parent_id = $admission->parent_id;
        $student->class_id = $admission->class_id;
        $student->section_id = $admission->section_id;
        $student->address = $admission->address;
        $student->pin_code = $admission->pin_code;
        $student->city = $admission->city;
        $student->state = $admission->state;
        $student->photo = $admission->photo;
        $student->aadhar = $admission->aadhar;
        $student->transfer_certificate = $admission->transfer_certificate;
        $student->save();

        return $student->id;
    }

    public function getNextRollNumber($classId, $sectionId)
    {
        $maxRollNumber = Student::where('class_id', $classId)->where('section_id', $sectionId)->max('roll_number');
        $nextRollNumber = $maxRollNumber ? $maxRollNumber + 1 : 1;
        return $nextRollNumber;
    }

    function getNextRegistrationNumber()
    {
        $currentYear = date('y'); // Get the current year in two-digit format (e.g., 24 for 2024)
        $lastRegistration = Student::orderBy('registration_number', 'desc')->first();

        if ($lastRegistration) {
            // Extract the year and the serial part from the last registration number
            $lastYear = substr($lastRegistration->registration_number, 0, 2);
            $lastSerial = (int) substr($lastRegistration->registration_number, 2);

            // Check if the year has changed
            if ($lastYear == $currentYear) {
                // Increment the serial number by 1
                $nextSerial = $lastSerial + 1;
            } else {
                // If the year has changed, start with 001
                $nextSerial = 1;
            }
        } else {
            // If there is no registration yet, start with 001
            $nextSerial = 1;
        }

        // Format the next serial number with leading zeros for the initial three-digit format
        $nextSerialFormatted = str_pad($nextSerial, 3, '0', STR_PAD_LEFT);

        // Combine the current year with the formatted serial number
        $nextRegistrationNumber = $currentYear . $nextSerialFormatted;
        return $nextRegistrationNumber;
    }

}
