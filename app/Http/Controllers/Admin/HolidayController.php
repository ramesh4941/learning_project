<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holiday;

class HolidayController extends Controller
{
    public function create()
    {
        return view('admin.holiday.create');
    }

    public function store(Request $request)
    {
        Holiday::create($request->except('_token'));
    }
}
