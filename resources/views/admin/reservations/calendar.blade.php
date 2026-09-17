@extends('layouts.admin')

@section('title', 'Reservations Calendar')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Reservations Calendar</h5>
   <a href="{{ route('admin.reservations.index') }}" class="btn btn-sm btn-outline-secondary">List View</a>
</div>

<div class="admin-card">
   <div id="calendar"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script>
   const calendarDataUrl = @json(route('admin.reservations.calendar-data'));
   document.addEventListener('DOMContentLoaded', function () {
      new FullCalendar.Calendar(document.getElementById('calendar'), {
         initialView: 'dayGridMonth',
         events: calendarDataUrl,
      }).render();
   });
</script>
@endsection
