@extends('layouts.admin-layout')

@section('space-work')
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
    <div class="pagetitle">
        <h1>Venues</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Venues</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <a href="{{ route('venues.create') }}" class="btn btn-success mb-3">Add Venue</a>
                <a href="{{ route('venues.create') }}" class="btn btn-primary mb-3 mx-3">Import Venues</a>

                <div class="mb-3">
                    <form action="{{ route('venues.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search by Venue Name" value="{{ request()->query('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>


                @if ($venues->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Venue</th>
                                <th colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($venues as $venue)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $venue->name }}</td>
                                    <td><a href="{{ route('venues.edit', $venue->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><form action="{{ route('venues.destroy', $venue->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this venue?')">Delete</button>
                                    </form></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $venues->onEachSide(5)->links() }}
                @else
                    <p>No venues found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
