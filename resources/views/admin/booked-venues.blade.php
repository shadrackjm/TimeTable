@extends('layouts/admin-layout')

@section('space-work')
<div class="pagetitle">
      <h1>Booked Venues</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
          <li class="breadcrumb-item active">Booked Venues</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">


            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a href="/manage/users" class="btn btn-primary btn-sm mx-2">view all</a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Users </h5>
                <table class="table table-sm table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Venue Name</th>
                        <th scope="col">Booked By</th>
                        <th scope="col">Booking Date</th>
                        <th scope="col" colspan="3" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($booked_venues) > 0)
                          @foreach ($booked_venues as $item)
                              <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->venue->venue_data}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <form action="{{ route('un-book', $item->venue->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to un book this venue?');">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-warning btn-sm">Un-Book</button>
                                </form>
                            </td>
                              </tr>
                          @endforeach
                      @else
                          <tr>
                            <td colspan="8">No data found!</td>
                          </tr>
                      @endif

                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
    </section>
@endsection
