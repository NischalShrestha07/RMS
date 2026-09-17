@extends('layouts.site')

@section('title', 'My Reservations - Sarab')

@section('content')
<div class="mb-4">
   <span class="slbl">Booking History</span>
   <h2 class="stitle">My <span>Reservations</span></h2>
   <div class="sline"></div>
</div>

@include('partials.account.nav')

<div class="fcard">
   @forelse ($reservations as $reservation)
   <div class="d-flex justify-content-between align-items-center mb-3 pb-3" style="border-bottom:1px solid #eee;">
      <div>
         <div class="mtit">{{ $reservation->date->format('M d, Y') }} at {{ $reservation->time }}</div>
         <div style="font-size:.8rem;color:#888;">{{ $reservation->guests }}</div>
      </div>
      <span style="font-size:.78rem;text-transform:capitalize;background:rgba(232,40,26,.1);color:var(--primary);padding:4px 12px;border-radius:20px;">{{ $reservation->status }}</span>
   </div>
   @empty
   <p class="text-muted mb-0">You haven't made any reservations yet.</p>
   @endforelse
</div>

<div class="mt-4">{{ $reservations->links() }}</div>
@endsection
