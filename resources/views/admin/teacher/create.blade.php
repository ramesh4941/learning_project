@extends('admin.layout.main')

@section('title', 'Class - Create and view')
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
        <form method="POST" action="{{route('admin.teacher.save')}}" enctype="multipart/form-data">
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
                                    <label for="father_name">Father Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" value="{{old('father_name')}}" placeholder="Enter Father Name">
                                    @error('father_name')
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
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="password">Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{old('password')}}" placeholder="Enter Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="confirm_password">Confirm Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password" value="{{old('confirm_password')}}" placeholder="Enter Confirm Password">
                                    @error('confirm_password')
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
                            <div class="card-title"> Education & Professional Details </div>
                        </div>
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="subject">Subject<span class="text-danger">*</span> <small>(You can teach)</small></label>
                                    <select class="form-select subject-dropdown-select-2 @error('subject') is-invalid @enderror" id="subject" name="subject[]" multiple="multiple">
                                        @foreach ($subjects as $subject)
                                            <option value="{{$subject->id}}" {{ in_array($subject->id, old('subject', [])) ? 'selected' : '' }}>{{$subject->subject}}</option>
                                        @endforeach
                                    </select>
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="experience_year">Experience<span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-lx-6 col-md-6 col-lg-6 col-sm-6 col-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Year" id="experience_year" name="experience_year" aria-label="experience_year" aria-describedby="experience_year">
                                                <span class="input-group-text" id="experience_year">Years</span>
                                            </div>
                                        </div>
                                        <div class="col-lx-6 col-md-6 col-lg-6 col-sm-6 col-6">
                                            <div class="input-group">
                                                <select class="form-control form-select" name="experience_month" id="experience_month">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                </select>
                                                <label class="input-group-text" for="experience_month">Month(s)</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="highest_degree">Highest Qualification<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('highest_degree') is-invalid @enderror" id="highest_degree" name="highest_degree" value="{{old('highest_degree')}}" placeholder="Enter Highesr Qualification">
                                    @error('highest_degree')
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
                            <div class="card-title"> Address </div>
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
                            <div class="card-title"> Bank Details </div>
                        </div>
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 mb-3">
                                            <label for="ifsc">IFSC Code<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('ifsc') is-invalid @enderror" id="ifsc" name="ifsc" value="{{old('ifsc')}}" placeholder="Enter IFSC Code">
                                            @error('ifsc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-3">
                                            <label for="account_number">Account Number<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control @error('account_number') is-invalid @enderror" id="account_number" name="account_number" value="{{old('account_number')}}" placeholder="Enter Account Number">
                                            @error('account_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <label for="confirm_account_number">Confirm Account Number<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('confirm_account_number') is-invalid @enderror" id="confirm_account_number" name="confirm_account_number" value="{{old('confirm_account_number')}}" placeholder="Enter Confirm Account Number">
                                            @error('confirm_account_number')
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
                                    <label for="aadhar">Aadhar<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control @error('aadhar') is-invalid @enderror" id="aadhar" name="aadhar">
                                    @error('aadhar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="degree_attachment">Qualification<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control @error('degree_attachment') is-invalid @enderror" id="degree_attachment" name="degree_attachment">
                                    @error('degree_attachment')
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
            $('.dropdown-select-2').select2();

            $('.subject-dropdown-select-2').select2({
                placeholder: "Select a state"
            });
        });
    </script>
@endsection
