@extends('layouts.admin')

@section('title', 'Reservations')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Reservations</h5>
   <form method="GET" class="d-flex gap-2">
      <select name="status" class="form-control fctrl" onchange="this.form.submit()">
         <option value="">All Statuses</option>
         @foreach (['pending', 'confirmed', 'cancelled'] as $status)
         <option value="{{ $status }}" {{ $statusFilter === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
         @endforeach
      </select>
   </form>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Name</th><th>Contact</th><th>Guests</th><th>Date/Time</th><th>Status</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($reservations as $reservation)
         <tr>
            <td>{{ $reservation->name }}</td>
            <td>{{ $reservation->phone }}<br><span style="font-size:.78rem;color:#888;">{{ $reservation->email }}</span></td>
            <td>{{ $reservation->guests }}</td>
            <td>{{ $reservation->date->format('M d, Y') }} at {{ $reservation->time }}</td>
            <td><span style="text-transform:capitalize;">{{ $reservation->status }}</span></td>
            <td class="text-end">
               @if ($reservation->status !== 'confirmed')
               <form method="POST" action="{{ route('admin.reservations.update', $reservation) }}" class="d-inline">
                  @csrf @method('PUT')
                  <input type="hidden" name="status" value="confirmed">
                  <button type="submit" class="btn btn-sm btn-outline-success">Confirm</button>
               </form>
               @endif
               @if ($reservation->status !== 'cancelled')
               <form method="POST" action="{{ route('admin.reservations.update', $reservation) }}" class="d-inline">
                  @csrf @method('PUT')
                  <input type="hidden" name="status" value="cancelled">
                  <button type="submit" class="btn btn-sm btn-outline-danger">Cancel</button>
               </form>
               @endif
            </td>
         </tr>
         @empty
         <tr><td colspan="6" class="text-muted text-center py-4">No reservations found.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $reservations->links() }}</div>
@endsection
