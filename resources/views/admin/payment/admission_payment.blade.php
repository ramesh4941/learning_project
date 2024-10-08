@extends('admin.layout.main')

@section('title', 'Payment - Create and view')
@section('meta-description', 'Admin Description')

@section('content')
    <div class="container-fluid"> <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Admission Payment</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admission Payment</li>
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
                                        <td>: {{$admission->email_address}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">D.O.B</span> </td>
                                        <td>: {{$admission->dob}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Gender</span> </td>
                                        <td>: {{$admission->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Age</span> </td>
                                        <td>: 22</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Mobile </span> </td>
                                        <td>: +91 9876543223</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Mother Tongue </span> </td>
                                        <td>: Hindi</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Blood Group </span> </td>
                                        <td>: o +ve</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50"> <span class="fw-semibold">Address </span> </td>
                                        <td> {{$admission->address}}</td>
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
                                        <div class="form-check form-check-lg payment-method-container mb-0" onclick="handlePaymentMethodClick('razorpayLink')">
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
                                        {{-- <form action="{{ route('admin.payment.razorpay_callback') }}" method="POST" id="paymentForm">
                                            @csrf
                                            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                        </form>
                                        <button type="button" class="btn btn-success-light" id="personal-details-trigger">
                                            Pay Now<i class="ri-user-3-line ms-2 align-middle d-inline-block"></i>
                                        </button> --}}
                                        <form action="{{ route('admin.payment.razorpay_callback') }}" method="POST" >
                                            @csrf
                                            <input type="hidden" name="admission_id" value="{{$admission->id}}">
                                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                data-key="{{ env('RAZORPAY_KEY') }}"
                                                {{-- data-amount="{{$totalAmount*100}}" --}}
                                                data-amount="10000"
                                                data-name="Edulites"
                                                data-description="{{$admission->first_name}} Admission"
                                                data-image="https://cdn-lightspeed.teamwork.com/tw-icon/tw-icon-192x192.png"
                                                data-prefill.name="{{ $admission->get_parents->single_parent ? (($admission->get_parents->single_parent_relation == 'Father') ? $admission->get_parents->father_name : $admission->get_parents->mother_name ) : $admission->get_parents->father_name }}"
                                                data-prefill.email="{{$admission->get_parents->email_address}}"
                                                data-prefill.contact="{{$admission->get_parents->phone}}"
                                                data-notes.admission_id="{{$admission->id}}"
                                                data-theme.color="#ff7529">
                                            </script>
                                        </form>
                                    </div>
                                    <div class="admission-razorpay-link">
                                        <button type="button" class="btn btn-primary-light" id="sendPaymentLink">
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
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentLinkPopup"> Launch demo modal </button> --}}
    
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="paymentLinkPopup" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel1">
                        Payment Link
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="text-muted mb-1">Send / Receive</label>
                                <div class="input-group">
                                    <input type="text" id="razorpayPaymetLink" aria-label="First name" class="form-control" readonly>
                                    <button id="copyPaymentLinkBtn" class="btn btn-light" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Copy" style="color: #636363">
                                        <i class="fa fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="text-muted mb-1">Send / Receive</label>
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input form-checked-success" type="checkbox" value="" id="checkebox-sm" checked="">
                                    <label class="form-check-label" for="checkebox-sm"> WhatsApp </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input form-checked-success" type="checkbox" value="" id="checkebox-sm" checked="">
                                    <label class="form-check-label" for="checkebox-sm"> SMS </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input form-checked-success" type="checkbox" value="" id="checkebox-sm" checked="">
                                    <label class="form-check-label" for="checkebox-sm"> Email </label>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
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
                "amount": 1000,//"{{$totalAmount * 100}}",
                "currency": "INR",
                "description": "Razorpay payment",
                // "image": "/images/logo-icon.png",
                "prefill": {
                    "name": "TEST11",
                    "email": "test@gmail.com",
                    "contact": "+919661442809"
                },
                "theme": {
                    "color": "#ff7529"
                },
                "handler": function (response){
                    // After the payment is completed, submit the form with payment details
                    console.log(response);
                    document.getElementById('paymentForm').submit();
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        };
    });
</script>
<script>
    $(document).ready(function(){
        $( "#sendPaymentLink" ).on( "click", function() {
            var url = "{{route('admin.payment.generate_payment_link')}}";
            var amount = '{{$totalAmount}}';
            var name = "{{ $admission->get_parents->single_parent ? (($admission->get_parents->single_parent_relation == 'Father') ? $admission->get_parents->father_name : $admission->get_parents->mother_name ) : $admission->get_parents->father_name }}";
            var phone = "{{$admission->get_parents->phone}}";
            var email = "{{$admission->get_parents->email_address}}";
            var studentAdmissionId = "{{$admission->id}}";
            var description = "{{$admission->first_name}} Admission";
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    '_token': csrfToken,
                    'amount': amount, 
                    'name': name, 
                    'phone': phone, 
                    'email': email, 
                    'admission_id': studentAdmissionId, 
                    'description': description
                },
                beforeSend: function() {
                    $('#sendPaymentLink').html(`<i class="fa fa-spin fa-spinner"></i> Generating link...`).attr('disabled', true);
                },
                success: function(response){
                    $('#razorpayPaymetLink').val(response);
                    $('#paymentLinkPopup').modal('show');
                },
                complete: function() {
                    $('#sendPaymentLink').html(`Pay Now <i class="ri-user-3-line ms-2 align-middle d-inline-block"></i>`).attr('disabled', false);
                }
            });
        });
    });
</script>

<script>
    $( "#copyPaymentLinkBtn" ).on( "click", function() {
      var copyPaymentLink = document.getElementById("razorpayPaymetLink");
    
      copyPaymentLink.select();
      copyPaymentLink.setSelectionRange(0, 99999); // For mobile devices

      navigator.clipboard.writeText(copyPaymentLink.value);
    });
</script>
@endsection
