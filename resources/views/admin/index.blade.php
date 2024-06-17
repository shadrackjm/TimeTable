@extends('layouts.admin-layout')

@section('space-work')
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
                <h1>Venues</h1>
            </div>
            <div class="card-body">
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

                <a href="{{ route('venues.create') }}" class="btn btn-success mb-3">Add Venue</a>

                @if ($venues->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Venue</th>
                                <th>Status</th>
                                <th>Day of a week</th>
                                <th>Time Slot</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($venues as $venue)
                                <tr>
                                    <td>{{ $venue->id }}</td>
                                    <td>{{ $venue->venue_data }}</td>
                                    <td>{{ $venue->day }}</td>
                                    <td>{{ $venue->time_slot }}</td>
                                    <td>{{ ucfirst($venue->status) }}</td>
                                    <td>
                                        <a href="{{ route('venues.edit', $venue->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('venues.destroy', $venue->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this venue?')">Delete</button>
                                        </form>
                                    </td>
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
