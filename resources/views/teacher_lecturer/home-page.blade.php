@extends('layouts.teacher-layout')

@section('space-work')
<div class="pagetitle">
    <h1>Teacher Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/teacher/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Timetable</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="container">
    <div class="card">
        <div class="card-header">Timetable</div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($loop->first) active @endif" id="{{ strtolower($day) }}-tab" data-bs-toggle="tab" data-bs-target="#{{ strtolower($day) }}" type="button" role="tab" aria-controls="{{ strtolower($day) }}" aria-selected="true">{{ $day }}</button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                    <div class="tab-pane fade @if($loop->first) show active @endif" id="{{ strtolower($day) }}" role="tabpanel" aria-labelledby="{{ strtolower($day) }}-tab">
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>Time Range</th>
                                    <th>Venue</th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($timetables[$day] as $session)
                                    <tr>
                                        <td>{{ $session->start_time }} - {{ $session->end_time }}</td>
                                        <td>{{ $session->venue->name }}</td>
                                        <td>{{ $session->subject }}</td>
                                        <td>{{ $session->teacher->name }}</td>
                                        <td>
                                            @if ($session->teacher_id == auth()->id())
                                                @if ($session->is_skipped == true)
                                                    <button type="button" class="btn btn-success btn-sm">Marked Skipped</button>
                                                @else
                                                    <form action="{{ route('teacher.mark-skipped', $session->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning btn-sm">Mark as Skipped</button>
                                                    </form>
                                                @endif

                                            @else
                                                <form action="{{ route('teacher.book-session', $session->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm">Book Session</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
