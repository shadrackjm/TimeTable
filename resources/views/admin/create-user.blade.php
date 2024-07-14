@extends('layouts.admin-layout')

@section('space-work')
<div class="pagetitle">
    <h1>Venues</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
            <li class="breadcrumb-item active">add user</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
    <div class="container">
        <div class="card">
            <div class="card-header">add user</div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="form-group my-3">
                        <label for="venue_data">User Fullname</label>
                        <input type="text" class="form-control" id="venue_data" name="name" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="venue_data">Email</label>
                        <input type="email" class="form-control" id="venue_data" name="email" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="venue_data">User Role</label>
                        <select name="role" id="" class="form-select">
                            <option value="">Choose Role</option>
                            <option value="1">Lecturer/Teacher</option>
                            <option value="0">Student</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Add User</button>
                </form>
            </div>

        </div>

    </div>
@endsection
