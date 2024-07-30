@extends('admin.layout.main')

@section('title','Class - Create and view')
@section('meta-description','Admin Description')

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
    </div> <!-- Page Header Close --> <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-5">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Create Class </div>
                </div>
                <div class="card-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            {!! \Session::get('success') !!}</li>
                        </div>
                    @endif
                    <div class="row gy-3">
                        <form method="POST" action="{{ route('admin.class.create') }}">
                        @csrf
                            <div class="col-xl-12 mb-3">
                                <label for="class_roman" class="form-label text-default">Class<span class="text-danger">*</span> <small>(In Roman)</small></label>
                                <input id="class_roman" type="text" class="form-control form-control-lg @error('class_roman') is-invalid @enderror" value="{{ old('class_roman') }}" name="class_roman" required placeholder="Class in roman">
                                @error('class_roman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="class_english" class="form-label text-default">Class<span class="text-danger">*</span> <small>(In English)</small></label>
                                <input id="class_english" type="text" class="form-control form-control-lg @error('class_english') is-invalid @enderror" value="{{ old('class_english') }}" name="class_english" required placeholder="Class in english">
                                @error('class_english')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-12 d-grid mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">Save Class</button> 
                            </div>
                        </form>
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
                    <div class="table-responsive">
                        <table class="table text-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">S No.</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Class <small>(In English)</small></th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classes as $class)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$class->class_roman}}</td>
                                    <td>{{$class->class_english}}</td>
                                    <td>
                                        <span class="badge bg-{{($class->status==0)?"success":"danger"}}-transparent">
                                            {{($class->status==0)?"Active":"Deactive"}}
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