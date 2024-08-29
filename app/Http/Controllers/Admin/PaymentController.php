<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Admission;
use Exception;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\StudentController;
// use Illuminate\Support\Carbon;

class PaymentController extends Controller
{
    public function admission_payment($id)
    {
        $id = Crypt::decrypt($id);
        $admission = Admission::with('fee_details')->where('id',$id)->first();
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

    public function razorpay_callback(Request $request)
    {
        $razorpay_payment_id = $request->razorpay_payment_id;
        $admission_id = $request->admission_id;

        $api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($razorpay_payment_id);
        if($razorpay_payment_id != null && !empty($razorpay_payment_id)) {
            try {
                $response = $api->payment->fetch($razorpay_payment_id)->capture(array('amount' => $payment['amount']));
                // echo "<pre>";
                // print_r($response);
                // die;
                /*$payment = Payment::create([
                    'r_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => $response['email'],
                    'amount' => $response['amount']/100,
                    'json_response' => json_encode((array)$response)
                ]);*/

                $student = new StudentController();
                $studentId = $student->addStudent($admission_id);

                

                Admission::where('id', $admission_id)->update(['student_id' => $studentId, 'status' => 1]);

            } catch(Exception $e) {
                return $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        echo "Payment done";
        // Session::put('success',('Payment Successful'));
        // return redirect()->back();
    }
}
