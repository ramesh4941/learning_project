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
            <div class="col-xl-5">
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
            <div class="col-xl-7">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title"> Manage Class </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold d-flex align-items-center">Admission Form </div>
                                    <div>₹{{number_format($admission->fee_details->admission_form, 2, '.', ',')}}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold d-flex align-items-center">Admission Form </div>
                                    <div> {{$admission->fee_details->registration_fee}}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold d-flex align-items-center">Admission Form </div>
                                    <div> {{$admission->fee_details->admission_fee}}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold d-flex align-items-center">Admission Form </div>
                                    <div> {{$admission->fee_details->annual_charge}}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold d-flex align-items-center">Admission Form </div>
                                    <div> {{$admission->fee_details->examination_fee}}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold d-flex align-items-center">Admission Form </div>
                                    <div> {{$admission->fee_details->monthly_fee}}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold d-flex align-items-center">Admission Form </div>
                                    <div> {{$admission->fee_details->admission_form}}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold d-flex align-items-center"> <span class="avatar avatar-xs me-2">
                                            <img src="../assets/images/faces/4.jpg" alt=""> </span>Samantha Sams
                                    </div>
                                    <div> <button class="btn btn-sm btn-icon btn-primary-light"> <i class="ri-add-line"></i>
                                        </button> </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--End::row-1 -->
    </div>
@endsection
