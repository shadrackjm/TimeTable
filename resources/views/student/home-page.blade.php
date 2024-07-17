@extends('layouts.student-layout')

@section('space-work')
<div class="pagetitle">
    <h1>Available Venues</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/student/home">Dashboard</a></li>
            <li class="breadcrumb-item active">Available Venues</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="container">
    <div class="card">
        <div class="card-header">Available Venues</div>
        <div class="card-body">
            <div class="mb-3">
                <form action="{{ route('home-student') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search by Venue Name" value="{{ request()->query('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
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
                            <td colspan="5">
                                <div class="alert alert-success">
                                    All venues are available on weekends
                                </div>
                            </td>
                        </tr>
                    @else
                        @php
                            $currentDay = null;
                        @endphp
                        @foreach ($availableSessions as $session)
                            @if ($currentDay != $session->day_of_week)
                                @php
                                    $currentDay = $session->day_of_week;
                                @endphp
                                <tr>
                                    <td colspan="5" class="table-secondary text-center">{{ $currentDay }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>{{ date('h:i A', strtotime($session->start_time)) }} - {{ date('h:i A', strtotime($session->end_time)) }}</td>
                                <td>{{ $session->venue->name }}</td>
                                <td>{{ $session->subject }}</td>
                                <td>{{ $session->teacher->name ?? ''}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
