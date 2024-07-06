@extends('layouts.teacher-layout')

@section('space-work')
<div class="pagetitle">
    <h1>Book a Venue</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/lecturer/home">Dashboard</a></li>
            <li class="breadcrumb-item active">Book a Venue </li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">Edit user Details</div>
    <div class="card-body">
        <form action="{{ route('book.venue', $venue->id) }}" method="POST">
            @csrf
            @method('POST')

            <!-- Add your form fields here -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" readonly class="form-control" value="{{ $venue->venue_data }}" >
            </div>
            <div class="form-group">
                <label for="name">Availability time</label>
                <input type="text" name="time_slot" readonly class="form-control" value="{{ $venue->time_slot }}" >
            </div>
            <button type="submit" class="btn btn-success mt-2">Book</button>
        </form>
    </div>
</div>
@endsection
