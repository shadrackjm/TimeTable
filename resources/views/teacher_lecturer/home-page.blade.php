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
                        <button class="nav-link" id="{{ strtolower($day) }}-tab" data-bs-toggle="tab" data-bs-target="#{{ strtolower($day) }}" type="button" role="tab" aria-controls="{{ strtolower($day) }}" aria-selected="false">{{ $day }}</button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                    <div class="tab-pane fade" id="{{ strtolower($day) }}" role="tabpanel" aria-labelledby="{{ strtolower($day) }}-tab">
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
                                @if ($dayOfWeek == 'Saturday' || $dayOfWeek == 'Sunday')
                                <tr class="text-center">
                                    <td colspan="4">
                                        <div class="alert alert-success">
                                            All venues are available in weekends
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($timetables[$day] as $session)
                                    <tr>
                                        <td>{{ date('h:i A', strtotime($session->start_time)) }} - {{ date('h:i A', strtotime($session->end_time)) }}</td>
                                        <td>{{ $session->venue->name }}</td>
                                        <td>{{ $session->subject }}</td>
                                        <td>{{ $session->teacher->name ?? '' }}</td>
                                        <td>
                                            @if ($session->teacher_id == auth()->user()->id)
                                                @if ($session->is_skipped == true)
                                                    <button type="button" class="btn btn-success btn-sm">Available</button>
                                                @else
                                                    @if ($session->is_booked)
                                                        <button type="button" class="btn btn-secondary btn-sm">Booked</button>
                                                    @else
                                                        <form action="{{ route('teacher.mark-skipped', $session->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning btn-sm">Make available</button>
                                                        </form>
                                                    @endif

                                                @endif
                                            @else
                                                @if ($session->is_skipped == true)
                                                        <button type="button" class="btn btn-success btn-sm">Available</button>
                                                @else
                                                    @if ($session->is_booked)
                                                        <button type="button" class="btn btn-secondary btn-sm">Booked</button>
                                                        @else
                                                        <form action="{{ route('teacher.book-session', $session->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary btn-sm">Book Session</button>
                                                        </form>
                                                    @endif

                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        const today = new Date().getDay();
        const activeTab = document.getElementById(days[today] + '-tab');
        const activeContent = document.getElementById(days[today]);

        if (activeTab) {
            // Deactivate all tabs and content
            document.querySelectorAll('#myTab .nav-link').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('#myTabContent .tab-pane').forEach(pane => pane.classList.remove('show', 'active'));

            // Activate today's tab and content
            activeTab.classList.add('active');
            activeContent.classList.add('show', 'active');
        }
    });
</script>
@endsection
