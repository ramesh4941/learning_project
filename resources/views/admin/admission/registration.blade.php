@extends('admin.layout.main')

@section('title', 'Student - Create and view')
@section('meta-description', 'Admin Description')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Empty</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Empty</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->
        <form method="POST" action="{{route('admin.admission.store')}}" enctype="multipart/form-data">
        @csrf
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title"> Personal Details </div>
                        </div>
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="first_name">First Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{old('first_name')}}" placeholder="Enter First Name">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="last_name">Last Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{old('last_name')}}" placeholder="Enter Last Name">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="dob">Date Of Bith<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{old('dob')}}">
                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="gender">Gender<span class="text-danger">*</span></label>
                                    <select class="form-select dropdown-select-2 @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="">Choose Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="phone">Phone Number<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{old('phone')}}" placeholder="Enter Phone Number">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="email_address">Email Address<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('email_address') is-invalid @enderror" id="email_address" name="email_address" value="{{old('email_address')}}" placeholder="Enter Email Address">
                                    @error('email_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title"> Parent Details </div>
                        </div>
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="parent_id">Parents<span class="text-danger">*</span></label>
                                            <select class="form-select dropdown-select-2 @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id">
                                                <option value="">Select Parents</option>
                                                @foreach ($parents as $parent)
                                                    <option value="{{$parent->id}}">{{ $parent->single_parent ? (($parent->single_parent_relation == 'Father') ? $parent->father_name : $parent->mother_name ) : $parent->father_name }} - {{$parent->phone}}</option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6 ifsc-section-alignment">
                                    <div class="fetch-teacher-ifsc">
                                        <div class="fetching-ifsc">
                                            <i class="fa fa-spin fa-spinner"></i> Fetching details...
                                        </div>
                                    </div>
                                    {{-- <div class="ifsc-details-success">
                                        <table class="teacherBankDetails">
                                            <tr>
                                                <td><strong>Bank Name :</strong></td>
                                                <td>HDFC Bank</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Bank Name :</strong></td>
                                                <td>HDFC Bank</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Bank Name :</strong></td>
                                                <td>HDFC Bank</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Bank Name :</strong></td>
                                                <td>HDFC Bank</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="ifsc-details-failed">
                                        
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title"> Address </div>
                            <div>
                                <div class="form-check form-check-md d-flex align-items-center"> 
                                    <input class="form-check-input" value="1" type="checkbox" name="single_parent" id="single-parent-checkbox"> 
                                    <label class="form-check-label" for="single-parent-checkbox"> Same as Parent Address? </label> 
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="address">Address<span class="text-danger">*</span> <small>(with landmark)</small></label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="1" placeholder="Enter Address with Landmark">{{old('first_name')}}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="pin_code">Pin Code<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('pin_code') is-invalid @enderror" id="pin_code" name="pin_code" value="{{old('pin_code')}}" placeholder="Enter Pin Code">
                                    @error('pin_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="city">City<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{old('city')}}" placeholder="Enter City">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="state">State<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{old('state')}}" placeholder="Enter State">
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title"> Academic Details</div>
                        </div>
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="class_id">Admission Class<span class="text-danger">*</span></label>
                                    <select class="form-select dropdown-select-2 @error('class_id') is-invalid @enderror" id="class_id" name="class_id">
                                        <option value="">Select Class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{$class->id}}">{{$class->class_english.' ('.$class->class_roman.')'}}</option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="section_id">Section<span class="text-danger">*</span></label>
                                    <select class="form-select dropdown-select-2 @error('section_id') is-invalid @enderror" id="section_id" name="section_id">
                                        @foreach ($sections as $section)
                                            <option value="{{$section->id}}">{{$section->section}}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="highest_degree"><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('highest_degree') is-invalid @enderror" id="highest_degree" name="highest_degree" value="{{old('highest_degree')}}" placeholder="Enter Highesr Qualification">
                                    @error('highest_degree')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title"> Photos & Attachmets </div>
                        </div>
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="photo">Photo<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="aadhar">Aadhar <small>(if any)</small></label>
                                    <input type="file" class="form-control @error('aadhar') is-invalid @enderror" id="aadhar" name="aadhar">
                                    @error('aadhar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="transfer_certificate">Transfer Certificate (TC) <small>(if any)</small></label>
                                    <input type="file" class="form-control @error('transfer_certificate') is-invalid @enderror" id="transfer_certificate" name="transfer_certificate">
                                    @error('transfer_certificate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropdown-select-2').select2({
                placeholder: "Select..."
            });
        });
    </script>
@endsection
