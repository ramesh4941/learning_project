@extends('admin.layout.main')

@section('title','Attendance - Create and view')
@section('meta-description','Admin Description')

@section('content')
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
                    <h1>Attendance Details for {{ $student->first_name." ".$student->last_name }}</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Status</th>
                                    <th>Marked by Teacher</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($day = 1; $day <= $daysInMonth; $day++)
                                    @php
                                        $currentDate = \Carbon\Carbon::create($today->year, $today->month, $day);
                                        $attendance = $student->attendances->firstWhere('date', $currentDate->format('Y-m-d'));
                                        $isSunday = $currentDate->isSunday();
                                        $holiday = $holidays->first(function($holiday) use ($currentDate) {
                                            return $currentDate->between($holiday->start_date, $holiday->end_date);
                                        });
                                    @endphp
                                    <tr>
                                        <td>{{ $currentDate->format('Y-m-d') }}</td>
                                        <td>{{ $currentDate->format('l') }}</td> <!-- Display day of the week -->
                                        <td>
                                            @if($isSunday)
                                                Sunday
                                            @elseif($holiday)
                                                <span class="text-primary">{{ $holiday->holiday_name }}</span>
                                            @else
                                                {{ $attendance ? $attendance->status : 'N/A' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($attendance)
                                                {{ $attendance->teacher ? $attendance->teacher->first_name : 'N/A' }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>        
    </div><!--End::row-1 -->
</div>
@endsection