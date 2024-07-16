@extends('layouts.student-layout')

@section('space-work')
<div class="pagetitle">
    <h1>Student Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/student/home">Dashboard</a></li>
            <li class="breadcrumb-item active">Available Venues</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="container">
    <div class="card">
        <div class="card-header">available Venues <span  style="text-decoration: underline; font-weight:bold; font-size:18px">{{$dayOfWeek}}</span></div>
        <div class="card-body">
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Time Range</th>
                        <th>Venue</th>
                        <th>Subject</th>
                        <th>Teacher</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($dayOfWeek == 'Saturday' || $dayOfWeek == 'Sunday')
                        <tr class="text-center">
                            <td colspan="4">
                                <div class="alert alert-success">
                                    All venues are available in weekends
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($availableSessions as $session)
                            <tr>
                                <td>{{ date('H:i A',strtotime($session->start_time)) }} - {{ date('H:i A',strtotime($session->end_time)) }}</td>
                                <td>{{ $session->venue->name }}</td>
                                <td>{{ $session->subject }}</td>
                                <td>{{ $session->teacher->name }}</td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
