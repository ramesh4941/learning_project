<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Admission;
use Razorpay\Api\Api;
// use Illuminate\Support\Carbon;

class PaymentController extends Controller
{
    public function admission_payment($id)
    {
        $id = Crypt::decrypt($id);
        $admission = Admission::with('fee_details')->where('id',$id)->where('status',0)->first();
        return view('admin.payment.admission_payment',compact('admission'));
    }

    public function generate_payment_link(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $response = $api->paymentLink->create(array(
            'amount' => $request->amount*100,
            'currency' => 'INR',
            'accept_partial' => false,
            'expire_by' => strtotime("+ 20 minutes"),
            'reference_id' => (string)rand(111111, 999999),
            'description'  =>  $request->description,
            'customer'  =>  array(
                'name' => $request->name,
                'email'  =>  $request->email,
                'contact' => '+91'.$request->phone,
            ), 
            'notify' => array(
                'sms' => true,
                'email' => true
            ) ,
            'reminder_enable' => true,
            'notes' => array(
                'admission_id' =>  $request->admission_id,
            ),
            'callback_url'  =>  'https://example-callback-url.com/',
            'callback_method' => 'get'
        ));

        if (isset($response['short_url'])) {
            return $response['short_url'];
        } else {
            return 'Payment link not generated.';
        }
    }
}
