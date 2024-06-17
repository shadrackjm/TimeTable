 @extends('layouts/student-layout')
@section('space-work')
<div class="pagetitle">
      <h1>Home</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/student/home">Dashboard</a></li>
          <li class="breadcrumb-item active">Available venues</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
 <style>
        .timetable {
            border-collapse: collapse;
            width: 100%;
        }
        .timetable th, .timetable td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .timetable th {
            background-color: #f8f9fa;
        }
        .timetable td {
            height: 60px;
        }
    </style>
<div class="container">
    <table class="table table-bordered timetable">
        <thead>
            <tr>
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>8:00 AM - 9:00 AM</td>
                <td>Math</td>
                <td>English</td>
                <td>Science</td>
                <td>History</td>
                <td>PE</td>
            </tr>
            <tr>
                <td>9:00 AM - 10:00 AM</td>
                <td>Science</td>
                <td>Math</td>
                <td>English</td>
                <td>Geography</td>
                <td>Art</td>
            </tr>
            <tr>
                <td>10:00 AM - 11:00 AM</td>
                <td>History</td>
                <td>PE</td>
                <td>Math</td>
                <td>Science</td>
                <td>Music</td>
            </tr>
            <tr>
                <td>11:00 AM - 12:00 PM</td>
                <td>Geography</td>
                <td>Art</td>
                <td>PE</td>
                <td>English</td>
                <td>Math</td>
            </tr>
            <tr>
                <td>12:00 PM - 1:00 PM</td>
                <td colspan="5" class="bg-light">Lunch Break</td>
            </tr>
            <tr>
                <td>1:00 PM - 2:00 PM</td>
                <td>Music</td>
                <td>History</td>
                <td>Geography</td>
                <td>Art</td>
                <td>Science</td>
            </tr>
            <tr>
                <td>2:00 PM - 3:00 PM</td>
                <td>PE</td>
                <td>Science</td>
                <td>Music</td>
                <td>Math</td>
                <td>English</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
