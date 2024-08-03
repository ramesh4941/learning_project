<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Admission;

class PaymentController extends Controller
{
    public function admission_payment($id)
    {
        $id = Crypt::decrypt($id);
        $admission = Admission::with('fee_details')->where('id',$id)->where('status',0)->first();
        return view('admin.payment.admission_payment',compact('admission'));
    }
}
