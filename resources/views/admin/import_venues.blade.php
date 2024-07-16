@extends('layouts/admin-layout')

@section('space-work')
<div class="pagetitle">
    <h1>Import Venues</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Import Venues</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">Import Venues</div>
        <div class="card-body">
            <form action="{{ route('admin.import-venue') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="venue" class="form-label">Timetable File</label>
                    <input type="file" name="venue" class="form-control" required>
                    @error('venue')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>
@endsection
