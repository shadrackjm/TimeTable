@component('mail::message')
# Venue Notification

@if ($type == 'new')
A new venue has been added to the system:
**Venue Name:** {{ $venue->venue->name }}

@elseif($type == 'skipped')
A session has been skipped with the following details:<br>
**Venue Name:** {{ $venue->venue->name }}<br>
**Day of a week:** {{ $venue->day_of_week }}<br>
**Availability:** venue will be available, from {{ date('H:i A',strtotime($venue->start_time)) }} to {{ date('H:i A',strtotime($venue->end_time)) }} <br>So you can visit the venue and use it within the mentioned time range
@elseif($type == 'booked')
A session has been booked with the following details:<br>
**Venue Name:** {{ $venue->venue->name }}<br>
**Teacher Name:** {{ $venue->teacher->name }}<br>
**Day of a week:** {{ $venue->day_of_week }}<br>
**Availability:** venue will be Un-available, from {{ date('H:i A',strtotime($venue->start_time)) }} to {{ date('H:i A',strtotime($venue->end_time)) }} <br>

@else
A venue has been updated with the following details:<br>
**Venue Name:** {{ $venue->name }}<br>
@endif

Thank you for using VENUE FINDER system<br>
@endcomponent
