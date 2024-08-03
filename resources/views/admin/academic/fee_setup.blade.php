@extends('admin.layout.main')

@section('title','Parent - Create and view')
@section('meta-description','Admin Description')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('content')
<div class="container-fluid"> <!-- Page Header -->
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
    </div> <!-- Page Header Close --> <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Invoices </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.academic.store_fee_setup')}}">
                    @csrf
                        <div class="row gy-4">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
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
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                <label for="registration_fee">Registration Fee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('registration_fee') is-invalid @enderror" id="registration_fee" name="registration_fee" value="{{old('registration_fee')}}" placeholder="Enter Registration Fee">
                                @error('registration_fee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                <label for="admission_form">Admissin Form Charge<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('admission_form') is-invalid @enderror" id="admission_form" name="admission_form" value="{{old('admission_form')}}" placeholder="Enter Admissin Form Charge">
                                @error('admission_form')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                <label for="admission_fee">Admission Fee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('admission_fee') is-invalid @enderror" id="admission_fee" name="admission_fee" value="{{old('admission_fee')}}" placeholder="Enter Admission Fee">
                                @error('admission_fee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                <label for="annual_charge">Annual Charge<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('annual_charge') is-invalid @enderror" id="annual_charge" name="annual_charge" value="{{old('annual_charge')}}" placeholder="Enter Annual Charge">
                                @error('annual_charge')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                <label for="examination_fee">Examination Fee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('examination_fee') is-invalid @enderror" id="examination_fee" name="examination_fee" value="{{old('examination_fee')}}" placeholder="Enter Examination Fee">
                                @error('examination_fee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                <label for="monthly_fee">Monthly/Tution Fee<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('monthly_fee') is-invalid @enderror" id="monthly_fee" name="monthly_fee" value="{{old('monthly_fee')}}" placeholder="Enter Monthly/Tution Fee">
                                @error('monthly_fee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                <label for="monthly_late_fine">Monthly/Tution Late Fine<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('monthly_late_fine') is-invalid @enderror" id="monthly_late_fine" name="monthly_late_fine" value="{{old('monthly_late_fine')}}" placeholder="Enter Monthly/Tution Late Fine Amount">
                                @error('monthly_late_fine')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                <label for="late_fine_date">Late Fine Charge Date<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select class="form-control form-select" name="late_fine_date" id="late_fine_date">
                                        <option value="">Select Date</option>
                                        <option value="1">1st</option>
                                        <option value="2">2nd</option>
                                        <option value="3">3rd</option>
                                        <option value="4">4th</option>
                                        <option value="5">5th</option>
                                        <option value="6">6th</option>
                                        <option value="7">7th</option>
                                        <option value="8">8th</option>
                                        <option value="9">9th</option>
                                        <option value="10">10th</option>
                                        <option value="11">11th</option>
                                        <option value="12">12th</option>
                                        <option value="13">13th</option>
                                        <option value="14">14th</option>
                                        <option value="15">15th</option>
                                    </select>
                                    <label class="input-group-text" for="experience_month">of every month</label>
                                </div>
                                @error('late_fine_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">Sign In</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Invoices </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Product Manager</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Team</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classSetups as $classSetup)
                                    <tr>
                                        <td> 
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-2 avatar-rounded"> 
                                                    <img src="{{asset('assets/images/faces/10.jpg')}}" alt="img">
                                                </div> 
                                                <div> 
                                                    <div class="lh-1"> 
                                                        <span>Joanna Smith</span> 
                                                    </div> 
                                                    <div class="lh-1">
                                                        <span class="fs-11 text-muted">joannasmith14@gmail.com</span>
                                                    </div> 
                                                </div> 
                                            </div> 
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success-transparent rounded-pill">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info-transparent rounded-pill">
                                                    <i class="ri-edit-line"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-danger-transparent rounded-pill">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </div> 
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>        
    </div><!--End::row-1 -->
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