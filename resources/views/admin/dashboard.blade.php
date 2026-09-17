@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
   <div class="col-md-3 col-6">
      <div class="admin-card">
         <div class="widget-label">Today's Orders</div>
         <div class="widget-value">{{ $todayOrdersCount }}</div>
      </div>
   </div>
   <div class="col-md-3 col-6">
      <div class="admin-card">
         <div class="widget-label">Today's Revenue</div>
         <div class="widget-value">${{ number_format($todayRevenue, 2) }}</div>
      </div>
   </div>
   <div class="col-md-3 col-6">
      <div class="admin-card">
         <div class="widget-label">Pending Reservations</div>
         <div class="widget-value">{{ $pendingReservations }}</div>
      </div>
   </div>
   <div class="col-md-3 col-6">
      <div class="admin-card">
         <div class="widget-label">Unread Messages</div>
         <div class="widget-value">{{ $unreadMessages }}</div>
      </div>
   </div>
</div>

<div class="admin-card">
   <h5 class="mb-3" style="font-family:'Poppins',sans-serif;font-weight:700;">Recent Orders</h5>
   @forelse ($recentOrders as $order)
   <div class="d-flex justify-content-between align-items-center mb-2 pb-2" style="border-bottom:1px solid #eee;">
      <div>
         <strong>{{ $order->order_number }}</strong>
         <div style="font-size:.8rem;color:#888;">{{ $order->user->name ?? 'Guest' }} · {{ $order->created_at->format('M d, Y g:i A') }}</div>
      </div>
      <div class="text-end">
         <div>${{ number_format($order->total, 2) }}</div>
         <span style="font-size:.78rem;text-transform:capitalize;color:var(--primary);">{{ str_replace('_', ' ', $order->status) }}</span>
      </div>
   </div>
   @empty
   <p class="text-muted mb-0">No orders yet.</p>
   @endforelse
</div>
@endsection
