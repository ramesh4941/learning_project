<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntranceController extends Controller
{
    public function question_create()
    {
        return view('admin.entrance.question_create');
    }
}
