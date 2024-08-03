@extends('admin.layout.main')

@section('title','Admission list - Create and view')
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
                                @foreach ($admissions as $admission)
                                    <tr>
                                        <td> 
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-2 avatar-rounded"> 
                                                    <img src="{{asset($admission->photo)}}" alt="img">
                                                </div> 
                                                <div> 
                                                    <div class="lh-1"> 
                                                        <span>{{$admission->first_name}} {{$admission->last_name}}</span> 
                                                    </div> 
                                                    <div class="lh-1">
                                                        <span class="fs-11 text-muted">{{ $admission->get_parents->single_parent ? (($admission->get_parents->single_parent_relation == 'Father') ? $admission->get_parents->father_name : $admission->get_parents->mother_name ) : $admission->get_parents->father_name }}</span>
                                                    </div> 
                                                </div> 
                                            </div> 
                                        </td>
                                        <td>
                                            <div> 
                                                <div class="lh-1"> 
                                                    <span>{{$admission->phone}}</span> 
                                                </div> 
                                                <div class="lh-1">
                                                    <span class="fs-11 text-muted">{{ $admission->email_address}}</span>
                                                </div> 
                                            </div> 
                                        </td>
                                        <td>{{$admission->classes->class_roman}} ({{$admission->section->section}})</td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="{{route('admin.payment.admission',Crypt::encrypt($admission->id))}}" class="btn btn-icon btn-sm btn-success-transparent rounded-pill">
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
    <script src="{{ asset('assets/custom/admin/js/parents.js')}}"></script>
@endsection