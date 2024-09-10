@extends('admin.layout.main')

@section('title','Attendance - Create and view')
@section('meta-description','Admin Description')

@section('content')
<style>
    .table .sunday-column {
        background-color: #c5c5c5;
    }

    .table .holiday-column {
        background-color: #d0e7ff; /* Light blue background for holidays */
    }

    /* Sticky table header */
    .table  .sticky-header {
        position: sticky;
        top: 0;
        background-color: white; /* Add a background color to avoid transparency issues */
        z-index: 2;
    }

    /* Sticky first column (student names) */
    .table  .sticky-column {
        position: sticky;
        left: 0;
        background-color: white; /* Add a background color */
        z-index: 1;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>
<div class="container-fluid"> <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Classes</h1>
        <div class="ms-md-1 ms-0">
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Teacher</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                </ol>
            </nav>
        </div>
    </div> <!-- Page Header Close --> <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title"> Manage Class </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="sticky-column">Student Name</th>
                                    @for($day = 1; $day <= $daysInMonth; $day++)
                                        @php
                                            $isSunday = in_array($day, $sundays);
                                            // Format the current date as Y-m-d for comparison
                                            $currentDate = now()->setDay($day)->format('Y-m-d');
                                            // Check if the current day falls within any holiday's start_date and end_date
                                            $holiday = $holidays->first(function($holiday) use ($currentDate) {
                                                return $currentDate >= $holiday->start_date && $currentDate <= $holiday->end_date;
                                            });
                                        @endphp
                                        <th class="sticky-header {{ $isSunday ? 'sunday-column' : '' }} {{ $holiday ? 'holiday-column' : '' }}">
                                            {{ $day }}
                                            @if($isSunday)
                                                <br>Sunday
                                            @elseif($holiday)
                                                <br><span class="text-primary">{{ $holiday->holiday_name }}</span>
                                            @endif
                                        </th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td class="sticky-column">{{ $student->first_name." ".$student->last_name }}</td>
                                    @for($day = 1; $day <= $daysInMonth; $day++)
                                        @php
                                            $isSunday = in_array($day, $sundays);
                                            $currentDate = now()->setDay($day)->format('Y-m-d');
                                            $holiday = $holidays->first(function($holiday) use ($currentDate) {
                                                return $currentDate >= $holiday->start_date && $currentDate <= $holiday->end_date;
                                            });
                                            $attendance = $student->attendances->firstWhere('date', $currentDate);
                                        @endphp
                                        <td class="{{ $isSunday ? 'sunday-column' : '' }} {{ $holiday ? 'holiday-column' : '' }}">
                                            @if($isSunday)
                                                <!-- Blank for Sundays -->
                                            @elseif($holiday)
                                                <!-- Display holiday name and status -->
                                                <span>{{ $attendance ? $attendance->status : 'N/A' }}</span><br>
                                            @else
                                                @if($attendance)
                                                    {{ $attendance->status }}
                                                @else
                                                    N/A
                                                @endif
                                            @endif
                                        </td>
                                    @endfor
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