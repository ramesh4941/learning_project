<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Admission;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function admission_payment($id)
    {
        $id = Crypt::decrypt($id);
        $admission = Admission::with('fee_details')->where('id',$id)->where('status',0)->first();
        return view('admin.payment.admission_payment',compact('admission'));
    }

    public function generate_payment_link()
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $response = $api->paymentLink->create(array(
            'amount'=>500,
            'currency'=>'INR',
            'accept_partial'=>false,
            'expire_by'=>1722892188,
            'reference_id'=> '123456789990',
            'description' => 'For XYZ purpose',
            'customer' => array(
                'name'=>'Gaurav Kumar',
                'email' => 'gaurav.kumar@example.com',
                'contact'=>'+919000090000'
            ), 
            'notify'=>array(
                'sms'=>true,
                'email'=>true
            ) ,
            'reminder_enable'=>true,
            'notes'=>array(
                'policy_name'=> 'Jeevan Bima'
            ),
            'callback_url' => 'https://example-callback-url.com/',
            'callback_method'=>'get'
        ));

        if (isset($response['short_url'])) {
            echo 'Payment Link: ' . $response['short_url'];
        } else {
            echo 'Payment link not generated.';
        }
    }
}
