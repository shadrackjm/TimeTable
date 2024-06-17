@extends('layouts.student-layout')

@section('space-work')
<div class="pagetitle">
    <h1>Home</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/student/home">Dashboard</a></li>
            <li class="breadcrumb-item active">Available venues</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<style>
    .timetable {
        border-collapse: collapse;
        width: 100%;
    }
    .timetable th, .timetable td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }
    .timetable th {
        background-color: #f8f9fa;
    }
    .timetable td {
        height: 60px;
    }
</style>

<div class="container">
    <div class="pagetitle">
    <h1>Timetable for {{ $dayOfWeek }}</h1>
    </div>
    <table class="table table-bordered timetable">
        <thead>
            <tr>
                <th>Time</th>
                <th>Venue</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timetables as $timetable)
                <tr>
                    <td>{{ $timetable->time_slot }}</td>
                    <td>{{ $timetable->venue_data }}</td>
                    <td>{{ $timetable->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
