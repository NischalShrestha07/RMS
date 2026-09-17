@extends('layouts.site')

@section('title', 'My Account - Sarab')

@section('content')
<div class="mb-4">
   <span class="slbl">My Account</span>
   <h2 class="stitle">Welcome, <span>{{ auth()->user()->name }}</span></h2>
   <div class="sline"></div>
</div>

@include('partials.account.nav')

<div class="row g-4">
   <div class="col-lg-6">
      <div class="fcard">
         <h5 class="mb-3" style="font-family:'Poppins',sans-serif;font-weight:700;">Recent Orders</h5>
         @forelse ($recentOrders as $order)
         <div class="d-flex justify-content-between align-items-center mb-2 pb-2" style="border-bottom:1px solid #eee;">
            <div>
               <a href="{{ route('account.orders.show', $order) }}">{{ $order->order_number }}</a>
               <div style="font-size:.78rem;color:#888;text-transform:capitalize;">{{ str_replace('_', ' ', $order->status) }}</div>
            </div>
            <strong>${{ number_format($order->total, 2) }}</strong>
         </div>
         @empty
         <p class="text-muted" style="font-size:.88rem;">No orders yet.</p>
         @endforelse
      </div>
   </div>
   <div class="col-lg-6">
      <div class="fcard">
         <h5 class="mb-3" style="font-family:'Poppins',sans-serif;font-weight:700;">Upcoming Reservations</h5>
         @forelse ($upcomingReservations as $reservation)
         <div class="d-flex justify-content-between align-items-center mb-2 pb-2" style="border-bottom:1px solid #eee;">
            <div>{{ $reservation->date->format('M d, Y') }} at {{ $reservation->time }}</div>
            <span style="font-size:.78rem;text-transform:capitalize;">{{ $reservation->status }}</span>
         </div>
         @empty
         <p class="text-muted" style="font-size:.88rem;">No upcoming reservations.</p>
         @endforelse
      </div>
   </div>
</div>
@endsection
