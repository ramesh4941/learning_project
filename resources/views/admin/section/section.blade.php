@extends('admin.layout.main')

@section('title','Section - Create and view')
@section('meta-description','Admin Description')

@section('content')
<div class="container-fluid"> <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Section</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Section</li>
                </ol>
            </nav>
        </div>
    </div> <!-- Page Header Close --> <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-5">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Create Section </div>
                </div>
                <div class="card-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            {!! \Session::get('success') !!}</li>
                        </div>
                    @endif
                    <div class="row gy-3">
                        <form method="POST" action="{{ route('admin.section.create') }}">
                        @csrf
                            <div class="col-xl-12 mb-3">
                                <label for="section" class="form-label text-default">Section<span class="text-danger">*</span></label>
                                <input id="section" type="text" class="form-control form-control-lg @error('section') is-invalid @enderror" value="{{ old('section') }}" name="section" required placeholder="Enter Section">
                                @error('section')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-12 d-grid mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">Save Section</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Section </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">S No.</th>
                                    <th scope="col">section</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $section)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$section->section}}</td>
                                    <td>
                                        <span class="badge bg-{{($section->status==0)?"success":"danger"}}-transparent">
                                            {{($section->status==0)?"Active":"Deactive"}}
                                        </span>
                                    </td>
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