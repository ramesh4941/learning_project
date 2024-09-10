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
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Parents </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.holiday.store')}}">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="start_date">Start Date<span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{old('start_date')}}">
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="end_date">End Date<span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{old('end_date')}}">
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="type">Holiday Type<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{old('type')}}" placeholder="Enter Holiday Type Occupation">
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="holiday_name">Holiday Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('holiday_name') is-invalid @enderror" id="holiday_name" name="holiday_name" value="{{old('holiday_name')}}" placeholder="Enter Holiday Name">
                                @error('holiday_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-3">
                                <label for="note">Note<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('note') is-invalid @enderror" id="note" name="note" value="{{old('note')}}" placeholder="Enter Notes">
                                @error('note')
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
                    </form>
                </div>
            </div>
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