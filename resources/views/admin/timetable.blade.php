@extends('layouts.admin-layout')

@section('space-work')

    <div class="pagetitle">
        <h1>TimeTable</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Time Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <form action="{{ route('timetable.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search by Venue Name" value="{{ request()->query('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>


                @if ($sessions->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Day of week</th>
                                <th>Time Range</th>
                                    <th>Venue</th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                <th colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sessions as $session)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $session->day_of_week }}</td>
                                    <td>{{ date('h:i A', strtotime($session->start_time)) }} - {{ date('h:i A', strtotime($session->end_time)) }}</td>
                                        <td>{{ $session->venue->name }}</td>
                                        <td>{{ $session->subject ?? '-' }}</td>
                                        <td>{{ $session->teacher->name ?? '-' }}</td>
                                    <td><a href="{{ route('timetable.edit', $session->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><form action="{{ route('timetable.destroy', $session->venue->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this venue?')">Delete</button>
                                    </form></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $sessions->onEachSide(5)->links() }}
                @else
                    <p>No venues found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
