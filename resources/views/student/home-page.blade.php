@extends('layouts.student-layout')

@section('space-work')
<div class="pagetitle">
    <h1>Home</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/student/home">Dashboard</a></li>
            <li class="breadcrumb-item active">Available venues </li>
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
    .badge-available {
        background-color: green;
        color: white;
        padding: 3px 7px;
        border-radius: 5px;
    }
    .badge-unavailable {
        background-color: red;
        color: white;
        padding: 3px 7px;
        border-radius: 5px;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">Timetable for {{ $dayOfWeek }}</div>
        <div class="card-body">

    <!-- Search Form -->
    <form method="GET" action="{{ route('home-student') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search for venue or time" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered timetable">
        <thead>
            <tr>
                <th>Time</th>
                <th>Venues</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($groupedTimetables as $time_slot => $venues)
                <tr>
                    <td rowspan="{{ $venues->count() }}">{{ $time_slot }}</td>
                    @foreach ($venues as $index => $venue)
                        @if ($index > 0)
                            <tr>
                        @endif
                        <td>
                            {{ $venue->venue_data }} <br>
                            <span class="badge {{ $venue->status == 'available' ? 'badge-available' : 'badge-unavailable' }}">
                                {{ ucfirst($venue->status) }}
                            </span>
                        </td>
                        </tr>
                    @endforeach
                @empty
                        @if ($dayOfWeek == 'Saturday' || $dayOfWeek == 'Sunday')
                            <td colspan="2"><div class="alert alert-success">All Venues Are Available in Weekends</div></td>
                        @else
                            <td colspan="2">No Available Venue Added</td>
                        @endif
                    <tr>
                    </tr>
                @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $timetables->links() }}
        </div>
    </div>


</div>
@endsection
