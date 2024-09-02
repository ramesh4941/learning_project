@extends('admin.layout.main')

@section('title','Parent - Create and view')
@section('meta-description','Admin Description')

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
            <form method="POST" action="{{ route('admin.parents.create')}}">
            @csrf
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title"> Manage Parents </div>
                        <div>
                            <div class="form-check form-check-md d-flex align-items-center"> 
                                <input class="form-check-input" value="1" type="checkbox" name="single_parent" id="single-parent-checkbox"> 
                                <label class="form-check-label" for="single-parent-checkbox"> Single Parent? </label> 
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="parents">
                            <div class="row gy-4">
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
                                    <label for="father_occupation">Father Occupation<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('father_occupation') is-invalid @enderror" id="father_occupation" name="father_occupation" value="{{old('father_occupation')}}" placeholder="Enter Father Occupation">
                                    @error('father_occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="mother_name">Mother Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" value="{{old('mother_name')}}" placeholder="Enter Mother Name">
                                    @error('mother_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="mother_occupation">Mother Occupation<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('mother_occupation') is-invalid @enderror" id="mother_occupation" name="mother_occupation" value="{{old('mother_occupation')}}" placeholder="Enter Mother Occupation">
                                    @error('mother_occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div id="single-parent">
                            <div class="row gy-4">
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="single_parent_relation">Relation<span class="text-danger">*</span></label>
                                    <select class="form-control form-select" name="single_parent_relation" id="single_parent_relation">
                                        <option value="">Choose Reltion</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                    </select>
                                    @error('single_parent_relation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <label for="name"><span class="singleParentLabel"></span>Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Enter Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="occupation"><span class="singleParentLabel"></span>Occupation<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('occupation') is-invalid @enderror" id="occupation" name="occupation" value="{{old('occupation')}}" placeholder="Enter Occupation">
                                    @error('occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4">
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
                        <div class="row">
                            <div class="col-xl-12 mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">Save</button> 
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Parents </div>
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
                                <tr>
                                    <td> 
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-2 avatar-rounded"> 
                                                <img src="../assets/images/faces/10.jpg" alt="img">
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
    <script src="{{ asset('assets/custom/admin/js/parents.js')}}"></script>
@endsection