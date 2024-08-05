@extends('admin.layout.main')

@section('title', 'Payment - Create and view')
@section('meta-description', 'Admin Description')

@section('content')
    <div class="container-fluid"> <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Classes</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Class</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->
        <!-- Start::row -->
        <div class="row">
            <div class="col-xl-4">
                <div class="card custom-card">
                    <div class="card-body p-0">
                        <div class="text-center mb-4 mt-4">
                            <div class="mb-3">
                                <span class="avatar avatar-xxl avatar-rounded circle-progress p-1"
                                    style="width: 138px; height: 138px;">
                                    <img src="{{ asset($admission->photo) }}" alt="">
                                </span>
                            </div>
                            <div>
                                <h5 class="fw-semibold mb-0">{{$admission->first_name}} {{$admission->last_name}}</h5>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-responsive table-border">
                                <tbody>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Full Name</span> </td>
                                        <td>: {{$admission->first_name}} {{$admission->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Email</span> </td>
                                        <td>: {{$admission->first_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">D.O.B</span> </td>
                                        <td>: {{$admission->first_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Gender</span> </td>
                                        <td>: {{$admission->first_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Age</span> </td>
                                        <td>: 35</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Mobile </span> </td>
                                        <td>: +91 {{$admission->first_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Mother Tongue </span> </td>
                                        <td>: Telugu</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Marital Status </span> </td>
                                        <td>: Unmarried</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Blood Group </span> </td>
                                        <td>: o +ve</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Address </span> </td>
                                        <td> {{$admission->first_name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title"> Manage Class </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fw-semibold d-flex align-items-center">Admission Form Charge</div>
                                            <div>₹{{number_format($admission->fee_details->admission_form, 2, '.', ',')}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fw-semibold d-flex align-items-center">Registration Fee </div>
                                            <div>₹{{number_format($admission->fee_details->registration_fee, 2, '.', ',')}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fw-semibold d-flex align-items-center">Admission Fee </div>
                                            <div>₹{{number_format($admission->fee_details->admission_fee, 2, '.', ',')}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fw-semibold d-flex align-items-center">Annual Fee </div>
                                            <div>₹{{number_format($admission->fee_details->annual_charge, 2, '.', ',')}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fw-semibold d-flex align-items-center">Examination Fee </div>
                                            <div>₹{{number_format($admission->fee_details->examination_fee, 2, '.', ',')}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fw-semibold d-flex align-items-center">Monthly Fee ({{\Carbon\Carbon::now()->format('F')}})</div>
                                            <div>₹{{number_format($admission->fee_details->monthly_fee, 2, '.', ',')}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between admission-total-amount">
                                            <div class="fw-semibold d-flex align-items-center">
                                                Total
                                            </div>
                                            <div>
                                                <?php
                                                    $amountAry = array($admission->fee_details->admission_form,$admission->fee_details->registration_fee,$admission->fee_details->admission_fee,$admission->fee_details->annual_charge,$admission->fee_details->examination_fee,$admission->fee_details->monthly_fee);
                                                    $totalAmount = array_sum($amountAry);
                                                ?>
        
                                                ₹<span class="total-Amount">{{number_format($totalAmount, 2, '.', ',')}}</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title"> Payment Methords: </div>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-xl-6">
                                        <div class="form-check form-check-lg payment-method-container mb-0" onclick="handlePaymentMethodClick('razorpayGateway')">
                                            <input id="razorpayGateway" name="payment-methods" value="razorpayGateway" type="radio" class="form-check-input">
                                            <div class="form-check-label">
                                                <div class="d-sm-flex align-items-center justify-content-between">
                                                    <div class="me-2">
                                                        <span class="avatar avatar-md">
                                                            <img src="{{asset('assets/images/payment-icon/razorpay.png')}}" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="shipping-partner-details me-sm-5 me-0">
                                                        <p class="mb-0 fw-semibold">RazorPay Gateway</p>
                                                        <p class="text-muted fs-11 mb-0">UPI, QR, Wallet, Credit/Debit Card</p>
                                                    </div>
                                                    <div class="fw-semibold me-sm-5 me-0"> ₹<span class="pay-amount">0</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-check payment-method-container mb-0" onclick="handlePaymentMethodClick('razorpayLink')">
                                            <input id="razorpayLink" name="payment-methods" value="razorpayLink" type="radio" class="form-check-input">
                                            <div class="form-check-label">
                                                <div class="d-sm-flex align-items-center justify-content-between">
                                                    <div class="me-2">
                                                        <span class="avatar avatar-md">
                                                            <img src="{{asset('assets/images/payment-icon/link.png')}}" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="shipping-partner-details me-sm-5 me-0">
                                                        <p class="mb-0 fw-semibold">RazorPay Link</p>
                                                        <p class="text-muted fs-11 mb-0">Send Link on Parent Phone</p>
                                                    </div>
                                                    <div class="fw-semibold me-sm-5 me-0"> ₹<span class="pay-amount">0</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 pt-3 mt-3 border-top border-block-start-dashed d-sm-flex justify-content-center">
                                    <div class="admission-razorpay-gateway">
                                        <form action="{{ route('razorpay.payment.store') }}" method="POST" id="paymentForm">
                                            @csrf
                                            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                        </form>
                                        <button type="button" class="btn btn-success-light" id="personal-details-trigger">
                                            Pay Now<i class="ri-user-3-line ms-2 align-middle d-inline-block"></i>
                                        </button>
                                    </div>
                                    <div class="admission-razorpay-link">
                                        <button type="button" class="btn btn-primary-light">
                                            Pay Now<i class="ri-user-3-line ms-2 align-middle d-inline-block"></i>
                                        </button>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div><!--End::row-1 -->
    </div>
@endsection

@section('js')
<script>
    function handlePaymentMethodClick(id) {
        document.getElementById(id).checked = true;

        if (id === 'razorpayGateway') {
            $('.admission-razorpay-gateway').show();
            $('.admission-razorpay-link').hide();
        } else if (id === 'razorpayLink') {
            $('.admission-razorpay-link').show();
            $('.admission-razorpay-gateway').hide();
        }else{
            $('.admission-razorpay-link').hide();
            $('.admission-razorpay-gateway').hide();
        }
    }

    $(document).ready(function(){
        var totalAmount = $('.total-Amount').text();
        $('.pay-amount').text(totalAmount);


        document.getElementById('personal-details-trigger').onclick = function(e) {
            e.preventDefault();

            var options = {
                "key": "{{ env('RAZORPAY_KEY') }}",
                "amount": "{{$totalAmount * 100}}",
                "currency": "INR",
                "description": "Razorpay payment",
                // "image": "/images/logo-icon.png",
                "prefill": {
                    "name": "TEST1",
                    "email": "test@gmail.com"
                },
                "theme": {
                    "color": "#ff7529"
                },
                "handler": function (response){
                    // After the payment is completed, submit the form with payment details
                    document.getElementById('paymentForm').submit();
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        };
    });
</script>
@endsection
