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
                    <form method="POST" action="{{ route('admin.academic.store_class_setup')}}">
                    @csrf
                        <div class="row gy-4">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
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
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
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
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <label for="teacher_id">Teacher<span class="text-danger">*</span></label>
                                <select class="form-select dropdown-select-2 @error('teacher_id') is-invalid @enderror" id="teacher_id" name="teacher_id">
                                    @foreach ($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->first_name.' '.$teacher->last_name}}</option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mb-3">
                                <label for="class_strength">Class Strength<span class="text-danger">*</span><small>(Maximum No. of Students)</small></label>
                                <input type="text" class="form-control @error('class_strength') is-invalid @enderror" id="class_strength" name="class_strength" value="{{old('class_strength')}}" placeholder="Enter Maximum number of sutdet in this section">
                                @error('class_strength')
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