@component('mail::message')
# Venue Notification

@if ($type == 'new')
A new venue has been added to the system:
**Venue Name:** {{ $venue->venue_data }}

@else
A venue has been updated with the following details:<br>
**Venue Name:** {{ $venue->venue_data }}<br>
**Occupied:** {{ $venue->day }} {{ $venue->time_slot }}<br>
**Availability:** (venue will be available, out of this time {{ $venue->day }} {{ $venue->time_slot }} so you can use it after or before that time)
@endif

Thanks,<br>
@endcomponent
