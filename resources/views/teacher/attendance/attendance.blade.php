@extends('admin.layout.main')

@section('title','Parent - Create and view')
@section('meta-description','Admin Description')

@section('content')
<style>
    .attendance-radio{
        border: 3px solid #aaaaaa;
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
                    <div>
                        <small id="attendanceSubmit" class="text-primary"></small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Roll No.</th>
                                    <th scope="col">Students</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Present</th>
                                    <th scope="col">Absent</th>
                                    <th scope="col">Late</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                @php
                                    $attendance = $attendances->get($student->id);
                                @endphp
                                    <tr class="invoice-list">
                                        <td><a href="javascript:void(0);" class="fw-semibold text-primary">{{ $student->roll_number }}</a></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2 lh-1">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{ asset($student->photo) }}" alt="">
                                                    </span>
                                                </div>
                                                <div>
                                                    <p class="mb-0 fw-semibold">{{ $student->first_name.' '.$student->last_name }}</p>
                                                    <p class="mb-0 fs-11 text-muted">{{ asset('photo') }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><a href="javascript:void(0);" class="fw-semibold text-primary">9876543223</a></td>
                                        <td class="text-center">
                                            <div class="form-check form-check-md">
                                                <input class="form-check-input form-checked-success attendance-radio" type="radio" data-id="{{ $student->id }}" name="attendance[{{ $student->id }}]" value="Present" id="Present-{{ $student->id }}" @if($attendance && $attendance->status === 'Present') checked @endif>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check form-check-md">
                                                <input class="form-check-input form-checked-warning attendance-radio" type="radio" data-id="{{ $student->id }}" name="attendance[{{ $student->id }}]" value="Absent" id="Absent-{{ $student->id }}" @if($attendance && $attendance->status === 'Absent') checked @endif>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check form-check-md">
                                                <input class="form-check-input form-checked-danger attendance-radio" type="radio" data-id="{{ $student->id }}" name="attendance[{{ $student->id }}]" value="Late" id="Late-{{ $student->id }}" @if($attendance && $attendance->status === 'Late') checked @endif>
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
        <div class="col-xl-3">
            <div class="card custom-card">
                <div class="card-body p-0">
                    
            <div class="position-fixed">
                    @php
                        use Carbon\Carbon;
                        $date = Carbon::now();
                        $formattedDate = $date->format('F j, Y'); // e.g., August 28, 2024
                        $formattedTime = $date->format('h:i:s A'); // e.g., 12:45:30 PM
                    @endphp                 
                    <div class="p-4 border-bottom border-block-end-dashed d-flex align-items-center justify-content-between">
                        <div class="left-content d-flex flex-column">
                            <h1 class="fw-semibold mb-2" style="font-size: 5rem !important;">3A</h1>
                            <span class="badge bg-primary fw-semibold" style="margin-top: -20px;">Class & Section</span>
                        </div>
                        <div class="right-content text-end">
                            <div class="date fs-4 fw-semibold" style="font-size: 2rem;">{{$formattedDate}}</div>
                            <div class="time fs-6 text-muted" style="font-size: 1.5rem;">{{$formattedTime}}</div>
                        </div>
                    </div>
                                      
                    <div class="p-4 border-bottom border-block-end-dashed d-flex align-items-top">
                        <div class="svg-icon-background bg-success-transparent me-4"> 
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="svg-success">
                                <path
                                    d="M11.5,20h-6a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1h5V7a3,3,0,0,0,3,3h3v5a1,1,0,0,0,2,0V9s0,0,0-.06a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.29.29,0,0,0-.1,0A1.1,1.1,0,0,0,11.56,2H5.5a3,3,0,0,0-3,3V19a3,3,0,0,0,3,3h6a1,1,0,0,0,0-2Zm1-14.59L15.09,8H13.5a1,1,0,0,1-1-1ZM7.5,14h6a1,1,0,0,0,0-2h-6a1,1,0,0,0,0,2Zm4,2h-4a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2Zm-4-6h1a1,1,0,0,0,0-2h-1a1,1,0,0,0,0,2Zm13.71,6.29a1,1,0,0,0-1.42,0l-3.29,3.3-1.29-1.3a1,1,0,0,0-1.42,1.42l2,2a1,1,0,0,0,1.42,0l4-4A1,1,0,0,0,21.21,16.29Z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-fill">
                            <h6 class="mb-2 fs-12">
                                Present
                                <span class="badge bg-success fw-semibold float-end"> Yesterday Present: <span id="yesterday-count">{{ $yesterdayPresentCount }}</span> </span>
                            </h6>
                            <div>
                                <h4 class="fs-18 fw-semibold mb-2"><span class="count-up" id="present-count">0</span></h4>
                                <p class="text-muted fs-11 mb-0 lh-1">
                                    <span class="text-danger me-1 fw-semibold">
                                        <i class="ri-arrow-down-s-line me-1 align-middle" id="percentage-icon"></i><span id="attendance-percentage">0%</span>
                                    </span>
                                    <span id="percentage-text">less than yesterday</span>                                    
                                </p>
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
                            <h6 class="mb-2 fs-12">Absent</h6>
                            <div>
                                <h4 class="fs-18 fw-semibold mb-2"><span class="count-up" id="absent-count">0</span></h4>
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
                            <h6 class="mb-2 fs-12">Late Attendance</h6>
                            <div>
                                <h4 class="fs-18 fw-semibold mb-2"><span class="count-up" id="late-count">0</span></h4>
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
                            <h6 class="mb-2 fs-12">Attendance Not Marked</h6>
                            <div>
                                <h4 class="fs-18 fw-semibold mb-2"><span class="count-up" id="not-marked-count">{{ count($students) }}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div><!--End::row-1 -->
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.attendance-radio').change(function() {
            var studentId = $(this).data('id');
            var status = $(this).val();
            var classId = '{{$classId}}';
            var sectionId = '{{$sectionId}}';
            var teacherId = '{{$teacherId}}';
            var date = '{{ now()->toDateString() }}';

            $.ajax({
                url: '{{ route("teacher.attendance.submit") }}',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    student_id: studentId,
                    status: status,
                    class_id: classId,
                    section_id: sectionId,
                    attendance_by: teacherId,
                    date: date
                },
                beforeSend: function() {
                    $('#attendanceSubmit').html(`<i class="fa fa-spin fa-spinner"></i> saving`)
                    .removeClass('text-success')
                    .addClass('text-primary');
                },
                success: function(response) {
                    console.log('Attendance for student ' + studentId + ' updated successfully.');
                },
                complete: function() {
                    $('#attendanceSubmit').html(`<i class="fa fa-cloud"></i> Saved`)
                    .removeClass('text-primary')
                    .addClass('text-success');
                },
                error: function(xhr, status, error) {
                    console.log('An error occurred while updating attendance for student ' + studentId + '.');
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Initialize counts on page load
        updateCounts();

        // Event listener for radio button changes
        $('.attendance-radio').on('change', function() {
            updateCounts();
        });

        function updateCounts() {
            let presentCount = 0;
            let absentCount = 0;
            let lateCount = 0;
            let yesterdayPresentCount = parseInt($('#yesterday-count').text());
            let totalStudents = {{ count($students) }};
            let markedStudents = 0;

            $('.attendance-radio:checked').each(function() {
                markedStudents++;
                let status = $(this).val();
                if (status === 'Present') {
                    presentCount++;
                } else if (status === 'Absent') {
                    absentCount++;
                } else if (status === 'Late') {
                    lateCount++;
                }
            });

            let notMarkedCount = totalStudents - markedStudents;

            // Calculate the percentage difference compared to yesterday
            let percentageDifference = yesterdayPresentCount > 0
                ? ((presentCount - yesterdayPresentCount) / yesterdayPresentCount) * 100
                : presentCount > 0 ? 100 : 0;

            // Remove the minus sign from percentage difference for display
            let displayPercentage = Math.abs(percentageDifference).toFixed(2) + '%';

            // Update the count elements in the DOM
            $('#present-count').text(presentCount);
            $('#absent-count').text(absentCount);
            $('#late-count').text(lateCount);
            $('#not-marked-count').text(notMarkedCount);

            // Update the percentage display
            $('#attendance-percentage').text(displayPercentage);

            // Update icon and text based on percentage difference
            if (percentageDifference > 0) {
                $('#percentage-icon').removeClass('ri-arrow-down-s-line').addClass('ri-arrow-up-s-line');
                $('#percentage-text').text('more than yesterday');
                $('#attendance-percentage').css('color', 'green');
                $('#percentage-icon').css('color', 'green');
            } else if (percentageDifference < 0) {
                $('#percentage-icon').removeClass('ri-arrow-up-s-line').addClass('ri-arrow-down-s-line');
                $('#percentage-text').text('less than yesterday');
                $('#attendance-percentage').css('color', 'red');
                $('#percentage-icon').css('color', 'red');
            } else {
                $('#percentage-icon').removeClass('ri-arrow-down-s-line ri-arrow-up-s-line'); // Remove both arrow icons
                $('#percentage-text').text('same as yesterday');
                $('#attendance-percentage').css('color', 'green');
            }
        }
    });
</script>

<script>
    $(document).ready(function() {
        function updateTime() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';
    
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;
    
            var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
            $('.time').text(strTime);
        }
    
        updateTime(); // Initial call
        setInterval(updateTime, 1000); // Update time every second
    });
</script>
@endsection