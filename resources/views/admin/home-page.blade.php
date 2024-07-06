@extends('layouts/admin-layout')

@section('space-work')
<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <a href="/manage/users">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{count($recent_users)}}</h6>

                    </div>
                  </div>
                </div>

              </div>
              </a>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <a href="/admin/blood-requests">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Venues</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bank"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$venues}}</h6>

                    </div>
                  </div>
                </div>

              </div>
              </a>
            </div><!-- End Revenue Card -->


              </div>

            </div>
          </div>

            </div>

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">This Week</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Users </h5>
                <table class="table table-sm table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Request Date</th>
                        <th scope="col" colspan="3" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($recent_users) > 0)
                          @foreach ($recent_users as $item)
                              <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->Name}}</td>
                                <td>{{$item->blood_group}}</td>
                                <td>{{$item->amount}}</td>
                                <td>{{$item->price}}</td>
                                <td>@if ($item->status == 1)
                                     <span class="badge bg-success">approved</span>
                                @endif
                                @if ($item->status == 0)
                                  <span class="badge bg-warning">pending</span></td>
                                @endif
                                @if ($item->status == 2)
                                  <span class="badge bg-danger">failed</span></td>
                                @endif
                                <td>{{$item->created_at}}</td>
                                <td><a href="/admin/edit/{{$item->id}}" class="btn btn-primary btn-sm">Edit</a></td>
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

          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>
@endsection
