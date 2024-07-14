@extends('layouts.admin-layout')
@section('space-work')
<div class="pagetitle">
    <h1>Edit User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit User </li>
        </ol>
    </nav>
</div><!-- End Page Title -->

    <div class="card">
        <div class="card-header">Edit user Details</div>
        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('POST')

                <!-- Add your form fields here -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <!-- Add other fields as needed -->

                <button type="submit" class="btn btn-primary my-2">Update</button>
            </form>
        </div>
    </div>

@endsection
