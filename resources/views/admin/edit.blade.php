@extends('layouts.admin-layout')

@section('space-work')
<div class="pagetitle">
    <h1>Venues</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit venue</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
    <div class="container">
        <h1>Edit Venue</h1>
        <form method="POST" action="{{ route('venues.update', $venue->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="venue_data">Venue Name</label>
                <input type="text" class="form-control" id="venue_data" name="venue_data" value="{{ $venue->venue_data }}" >
                @error('venue_data')
                    <span>{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="time">Time Range</label>
                <input type="text" class="form-control" id="time_slot" name="time_slot" value="{{ $venue->time_slot }}" >
                @error('time_slot')
                    <span>{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="day">Day</label>
                <select name="day" class="form-select">
                    <option value="">choose availability day</option>
                    <option value="Monday" {{ $venue->day == 'Monday' ? 'selected' : '' }}>Monday</option>
                    <option value="Tuesday" {{ $venue->day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday" {{ $venue->day == 'Wednesday' ? 'selected' : '' }}>WednesDay</option>
                    <option value="Thursday" {{ $venue->day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ $venue->day == 'Friday' ? 'selected' : '' }}>Friday</option>
                </select>
                @error('day')
                    <span>{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="available" {{ $venue->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="occupied" {{ $venue->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                </select>
                @error('status')
                    <span>{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Venue</button>
        </form>
    </div>
@endsection
