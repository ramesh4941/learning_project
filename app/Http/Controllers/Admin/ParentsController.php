<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guardian;
use Illuminate\Support\Facades\Hash;

class ParentsController extends Controller
{
    public function index()
    {
        return view('admin.parents.parents');
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $parent = new Guardian();
        $this->save($parent, $request);
    }

    public function save($parent, $request)
    {
        if($request->single_parent_relation != null && $request->single_parent == 1)
        {
            $parent->single_parent_relation = $request->single_parent_relation;
            $parent->single_parent = $request->single_parent;

            if($request->single_parent_relation == 'Father')
            {
                $parent->father_name = $request->name;
                $parent->father_occupation = $request->occupation;
            }else{
                $parent->mother_name = $request->name;
                $parent->mother_occupation = $request->occupation;
            }
        }else{
            $parent->father_name = $request->father_name;
            $parent->father_occupation = $request->father_occupation;
            $parent->mother_name = $request->mother_name;
            $parent->mother_occupation = $request->mother_occupation;
        }
        $parent->phone = $request->phone;
        $parent->email_address = $request->email_address;
        $parent->password = Hash::make($request->password);
        $parent->address = $request->address;
        $parent->pin_code = $request->pin_code;
        $parent->city = $request->city;
        $parent->state = $request->state;
        $parent->save();
    }
}
