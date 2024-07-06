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
                    <div class="row">
                        <div class="col">
                            <div class="form-group my-2">
                                <label for="venue_data">Venue Name</label>
                                <input type="text" class="form-control" id="venue_data" name="venue_data" value="{{ $venue->venue_data }}" >
                                @error('venue_data')
                                    <span>{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group my-2">
                                <label for="time">Time Range</label>
                                <select name="time_slot" id="" class="form-select">
                                    <option value="">Choose Time Range</option>
                                    <option value="7:00 AM - 8:00 AM">7:00 AM - 8:00 AM</option>
                                    <option value="8:00 AM - 9:00 AM">8:00 AM - 9:00 AM</option>
                                    <option value="9:00 AM - 10:00 AM">9:00 AM - 10:00 AM</option>
                                    <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                    <option value="11:00 AM - 12:00 AM">11:00 AM - 12:00 AM</option>
                                    <option value="12:00 pM - 13:00 pM">12:00 pM - 13:00 pM</option>
                                    <option value="13:00 pM - 14:00 pM">13:00 pM - 14:00 pM</option>
                                    <option value="14:00 pM - 15:00 pM">14:00 pM - 15:00 pM</option>
                                    <option value="15:00 pM - 16:00 pM">15:00 pM - 16:00 pM</option>
                                    <option value="16:00 pM - 17:00 pM">16:00 pM - 17:00 pM</option>
                                </select>
                                @error('time_slot')
                                    <span>{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group my-2">
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
                        </div>
                        <div class="col">
                            <div class="form-group my-2">
                                <label for="status">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="available" {{ $venue->status == 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="occupied" {{ $venue->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                                </select>
                                @error('status')
                                    <span>{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                    </div>


                    <button type="submit" class="btn btn-primary">Update Venue</button>
                </form>
            </div>
        </div>

    </div>
@endsection
