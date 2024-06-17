@extends('layouts.admin-layout')

@section('space-work')
<div class="pagetitle">
    <h1>Venues</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
            <li class="breadcrumb-item active">add venue</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
    <div class="container">
        <h1>Add Venue</h1>
        <form method="POST" action="{{ route('venues.store') }}">
            @csrf
            <div class="form-group">
                <label for="venue_data">Venue Name</label>
                <input type="text" class="form-control" id="venue_data" name="venue_data" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Venue</button>
        </form>
    </div>
@endsection
