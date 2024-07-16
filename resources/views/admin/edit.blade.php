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
    <div class="container ">
        <div class="card">
            <div class="card-header">header</div>
            <div class="card-body">
                <form method="POST" action="{{ route('venues.update', $venue->id) }}" >
                    @csrf
                    @method('PUT')
                            <div class="form-group my-2">
                                <label for="venue_data">Venue Name</label>
                                <input type="text" class="form-control" id="venue_data" name="venue_data" value="{{ $venue->name }}" >
                                @error('venue_data')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                    <button type="submit" class="btn btn-primary">Update Venue</button>
                </form>
            </div>
        </div>

    </div>
@endsection
