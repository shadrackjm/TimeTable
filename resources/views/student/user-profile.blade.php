@extends('layouts/student-layout')
@section('space-work')
<div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/student/home">Dashboard</a></li>
          <li class="breadcrumb-item active">STudent</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
     {{-- here we can check if logged user is the one with the profile then, if yes
    give access to edit otherwise just show a profile only.
    
    this approach seems to have an issue let's sort it out in this way.. --}}
       <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img height="100px" width="100px" class="rounded-circle" src="{{ asset('storage/images/'.$user_data->image) }}" alt="profile image">
              {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
              <h2>{{$user_data->name ?? ''}}</h2>
              <h4 class="text-muted">{{$user_data->job}}</h4>
              <div class="social-links mt-2">
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
           
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{$user_data->name ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Programme</div>
                    <div class="col-lg-9 col-md-8">{{$user_data->programme ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Study Level</div>
                    <div class="col-lg-9 col-md-8">{{$user_data->study_level ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Year of Study</div>
                    <div class="col-lg-9 col-md-8">{{$user_data->job ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Academic Year</div>
                    <div class="col-lg-9 col-md-8">{{$user_data->academic_year ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">(255) {{$user_data->phone ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$user_data->email ?? ''}}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                      <div class="row mb-3">

                    <form action="" method="POST">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                        <img height="100px" width="100px" src="" alt="profile image">
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></button>
                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                              </div>
                          </form>
                      </div>
                    <form method="POST" action="">
    
                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                            <div class="col-md-8 col-lg-9">
                            <input name="fullName" type="text" class="form-control" id="fullName" value="{{$user_data->name}}">
                            @error('fullName')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Programme</label>
                            <div class="col-md-8 col-lg-9">
                            <input name="company" type="text" class="form-control" id="company" value="{{$user_data->programme}}">
                            @error('company')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Study Level</label>
                            <div class="col-md-8 col-lg-9">
                            <input name="job" type="text" class="form-control" id="Job" value="{{$user_data->study_level}}">
                            @error('job')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Year of Study</label>
                            <div class="col-md-8 col-lg-9">
                            <input name="job" type="text" class="form-control" id="Job" value="{{$user_data->study_level}}">
                            @error('job')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Academic Year</label>
                            <div class="col-md-8 col-lg-9">
                            <input name="country" type="text" class="form-control" id="Country" value="{{$user_data->academic_year}}">
                            @error('country')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                            <input name="address" type="text" class="form-control" id="Address" value="{{$user_data->email}}">
                            @error('address')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                            <div class="col-md-8 col-lg-9">
                            <input name="phone" type="text" class="form-control" id="Phone" value="{{$user_data->phone}}">
                            @error('phone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                        </form><!-- End Profile Edit Form -->
                        {{-- this is to pass image from datbase to edit image component --}}
                        {{-- create component for the remaining form --}}
                    <livewire:profile-details-edit :fullName="$user_data->name" />

                </div>

                

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>

@endsection