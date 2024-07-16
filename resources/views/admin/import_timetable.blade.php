@extends('layouts/admin-layout')

@section('space-work')
<div class="pagetitle">
    <h1>Import Timetable</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Import Timetable</li>
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
        <div class="card-header">Import Timetable</div>
        <div class="card-body">
            <form action="{{ route('admin.import-timetable') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="timetable" class="form-label">Timetable File</label>
                    <input type="file" name="timetable" class="form-control" required>
                    @error('timetable')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>
@endsection
