@extends('admin.layout.main')

@section('content')
<style>
    .attandance-radio{
        border: 2px solid #aaaaaa;
    }
</style>
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
        <div class="col-xl-9">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Invoices </div>
                    <div class="d-flex"> <button
                            class="btn btn-sm btn-primary btn-wave waves-light waves-effect waves-light"><i
                                class="ri-add-line fw-semibold align-middle me-1"></i> Create Invoice</button>
                        <div class="dropdown ms-2"> <button
                                class="btn btn-icon btn-secondary-light btn-sm btn-wave waves-light waves-effect waves-light"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false"> <i
                                    class="ti ti-dots-vertical"></i> </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">All Invoices</a></li>
                                <li><a class="dropdown-item" href="#">Paid Invoices</a></li>
                                <li><a class="dropdown-item" href="#">Pending Invoices</a></li>
                                <li><a class="dropdown-item" href="#">Overdue Invoices</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Students</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Present</th>
                                    <th scope="col">Late</th>
                                    <th scope="col">Absent</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $students = [1,1,1,1,1,1,1,1,1,11,1,1,1,1,1,1,1,]; ?>
                                @foreach ($students as $key=>$student)
                                <tr class="invoice-list">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2 lh-1"> <span class="avatar avatar-sm avatar-rounded"> <img
                                                        src="../assets/images/faces/11.jpg" alt=""> </span> </div>
                                            <div>
                                                <p class="mb-0 fw-semibold">Json Taylor</p>
                                                <p class="mb-0 fs-11 text-muted">Father name</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td> <a href="javascript:void(0);" class="fw-semibold text-primary"> 9876543223 </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check form-check-md"> 
                                            <input class="form-check-input form-checked-success attandance-radio" type="radio" name="Radio{{$key}}" id="Radio-sm">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input form-checked-warning attandance-radio" type="radio" name="Radio{{$key}}" id="Radio-md">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input form-checked-danger attandance-radio" type="radio" name="Radio{{$key}}" id="Radio-lg" checked="">
                                        </div>
                                    </td>
                                </tr>   
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <nav aria-label="Page navigation">
                        <ul class="pagination mb-0 float-end">
                            <li class="page-item disabled"> <a class="page-link">Previous</a> </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page"> <a class="page-link" href="#">2</a> </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card custom-card">
                <div class="card-body p-0">
                    <div class="p-4 border-bottom border-block-end-dashed d-flex align-items-top">
                        <div class="svg-icon-background bg-primary-transparent me-4"> <svg
                                xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"
                                class="svg-primary">
                                <path
                                    d="M13,16H7a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,10h2a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Zm12,2H18V3a1,1,0,0,0-.5-.87,1,1,0,0,0-1,0l-3,1.72-3-1.72a1,1,0,0,0-1,0l-3,1.72-3-1.72a1,1,0,0,0-1,0A1,1,0,0,0,2,3V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM5,20a1,1,0,0,1-1-1V4.73L6,5.87a1.08,1.08,0,0,0,1,0l3-1.72,3,1.72a1.08,1.08,0,0,0,1,0l2-1.14V19a3,3,0,0,0,.18,1Zm15-1a1,1,0,0,1-2,0V14h2Zm-7-7H7a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z">
                                </path>
                            </svg> </div>
                        <div class="flex-fill">
                            <h6 class="mb-2 fs-12">Total Invoices Amount <span
                                    class="badge bg-primary fw-semibold float-end"> 12,345 </span> </h6>
                            <div class="pb-0 mt-0">
                                <div>
                                    <h4 class="fs-18 fw-semibold mb-2">$<span class="count-up"
                                            data-count="192">193</span>.87K</h4>
                                    <p class="text-muted fs-11 mb-0 lh-1"> <span class="text-success me-1 fw-semibold"> <i
                                                class="ri-arrow-up-s-line me-1 align-middle"></i>3.25% </span> <span>this
                                            month</span> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 border-bottom border-block-end-dashed d-flex align-items-top">
                        <div class="svg-icon-background bg-success-transparent me-4"> <svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="svg-success">
                                <path
                                    d="M11.5,20h-6a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1h5V7a3,3,0,0,0,3,3h3v5a1,1,0,0,0,2,0V9s0,0,0-.06a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.29.29,0,0,0-.1,0A1.1,1.1,0,0,0,11.56,2H5.5a3,3,0,0,0-3,3V19a3,3,0,0,0,3,3h6a1,1,0,0,0,0-2Zm1-14.59L15.09,8H13.5a1,1,0,0,1-1-1ZM7.5,14h6a1,1,0,0,0,0-2h-6a1,1,0,0,0,0,2Zm4,2h-4a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2Zm-4-6h1a1,1,0,0,0,0-2h-1a1,1,0,0,0,0,2Zm13.71,6.29a1,1,0,0,0-1.42,0l-3.29,3.3-1.29-1.3a1,1,0,0,0-1.42,1.42l2,2a1,1,0,0,0,1.42,0l4-4A1,1,0,0,0,21.21,16.29Z">
                                </path>
                            </svg> </div>
                        <div class="flex-fill">
                            <h6 class="mb-2 fs-12">Total Paid Invoices <span class="badge bg-success fw-semibold float-end">
                                    4,176 </span> </h6>
                            <div>
                                <h4 class="fs-18 fw-semibold mb-2">$<span class="count-up" data-count="68.83">68</span>K
                                </h4>
                                <p class="text-muted fs-11 mb-0 lh-1"> <span class="text-danger me-1 fw-semibold"> <i
                                            class="ri-arrow-down-s-line me-1 align-middle"></i>1.16% </span> <span>this
                                        month</span> </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-top p-4 border-bottom border-block-end-dashed">
                        <div class="svg-icon-background bg-warning-transparent me-4"> <svg
                                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"
                                class="svg-warning">
                                <path
                                    d="M19,12h-7V5c0-0.6-0.4-1-1-1c-5,0-9,4-9,9s4,9,9,9s9-4,9-9C20,12.4,19.6,12,19,12z M12,19.9c-3.8,0.6-7.4-2.1-7.9-5.9C3.5,10.2,6.2,6.6,10,6.1V13c0,0.6,0.4,1,1,1h6.9C17.5,17.1,15.1,19.5,12,19.9z M15,2c-0.6,0-1,0.4-1,1v6c0,0.6,0.4,1,1,1h6c0.6,0,1-0.4,1-1C22,5.1,18.9,2,15,2z M16,8V4.1C18,4.5,19.5,6,19.9,8H16z">
                                </path>
                            </svg> </div>
                        <div class="flex-fill">
                            <h6 class="mb-2 fs-12">Pending Invoices <span class="badge bg-warning fw-semibold float-end">
                                    7,064 </span> </h6>
                            <div>
                                <h4 class="fs-18 fw-semibold mb-2">$<span class="count-up" data-count="81.57">81</span>K
                                </h4>
                                <p class="text-muted fs-11 mb-0 lh-1"> <span class="text-success me-1 fw-semibold"> <i
                                            class="ri-arrow-up-s-line me-1 align-middle"></i>0.25% </span> <span>this
                                        month</span> </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-top p-4 border-bottom border-block-end-dashed">
                        <div class="svg-icon-background bg-light me-4"> <svg xmlns="http://www.w3.org/2000/svg"
                                enable-background="new 0 0 24 24" viewBox="0 0 24 24" class="svg-dark">
                                <path
                                    d="M19,12h-7V5c0-0.6-0.4-1-1-1c-5,0-9,4-9,9s4,9,9,9s9-4,9-9C20,12.4,19.6,12,19,12z M12,19.9c-3.8,0.6-7.4-2.1-7.9-5.9C3.5,10.2,6.2,6.6,10,6.1V13c0,0.6,0.4,1,1,1h6.9C17.5,17.1,15.1,19.5,12,19.9z M15,2c-0.6,0-1,0.4-1,1v6c0,0.6,0.4,1,1,1h6c0.6,0,1-0.4,1-1C22,5.1,18.9,2,15,2z M16,8V4.1C18,4.5,19.5,6,19.9,8H16z">
                                </path>
                            </svg> </div>
                        <div class="flex-fill">
                            <h6 class="mb-2 fs-12">Overdue Invoices <span
                                    class="badge bg-light text-default fw-semibold float-end"> 1,105 </span> </h6>
                            <div>
                                <h4 class="fs-18 fw-semibold mb-2">$<span class="count-up" data-count="32.47">33</span>K
                                </h4>
                                <p class="text-muted fs-11 mb-0 lh-1"> <span class="text-success me-1 fw-semibFold"> <i
                                            class="ri-arrow-down-s-line me-1 align-middle"></i>0.46% </span> <span>this
                                        month</span> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End::row-1 -->
</div>
@endsection