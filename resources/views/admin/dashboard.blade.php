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

<div class="row g-4 mt-1">
   <div class="col-lg-8">
      <div class="admin-card h-100">
         <h5 class="mb-3" style="font-family:'Poppins',sans-serif;font-weight:700;">Revenue Trend (14 Days)</h5>
         <canvas id="revenueTrendChart" height="90"></canvas>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="admin-card h-100">
         <h5 class="mb-3" style="font-family:'Poppins',sans-serif;font-weight:700;">Order Status (30 Days)</h5>
         <canvas id="statusBreakdownChart"></canvas>
      </div>
   </div>
</div>

<div class="admin-card mt-4">
   <h5 class="mb-3" style="font-family:'Poppins',sans-serif;font-weight:700;">Top 5 Menu Items</h5>
   @forelse ($topMenuItems as $item)
   <div class="d-flex justify-content-between align-items-center mb-2 pb-2" style="border-bottom:1px solid #eee;">
      <div>
         <strong>{{ $item->title }}</strong>
         <div style="font-size:.8rem;color:#888;">{{ $item->quantity_sold }} sold</div>
      </div>
      <div class="text-end">${{ number_format($item->revenue, 2) }}</div>
   </div>
   @empty
   <p class="text-muted mb-0">No sales yet.</p>
   @endforelse
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
<script>
   (function () {
      const style = getComputedStyle(document.documentElement);
      const primary = style.getPropertyValue('--primary').trim() || '#e8281a';
      const dark = style.getPropertyValue('--dark').trim() || '#1a1a1a';

      new Chart(document.getElementById('revenueTrendChart'), {
         type: 'line',
         data: {
            labels: @json(collect($revenueTrend)->pluck('date')),
            datasets: [{
               label: 'Revenue',
               data: @json(collect($revenueTrend)->pluck('revenue')),
               borderColor: primary,
               backgroundColor: primary + '22',
               tension: 0.3,
               fill: true,
            }],
         },
         options: {
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } },
         },
      });

      new Chart(document.getElementById('statusBreakdownChart'), {
         type: 'doughnut',
         data: {
            labels: @json($statusBreakdown->keys()->map(fn ($s) => str_replace('_', ' ', $s))),
            datasets: [{
               data: @json($statusBreakdown->values()),
               backgroundColor: ['#e8281a', '#f0a500', '#3a86ff', '#8338ec', '#2ec4b6', '#ff6b6b', dark],
            }],
         },
         options: {
            plugins: { legend: { position: 'bottom', labels: { boxWidth: 12 } } },
         },
      });
   })();
</script>
@endpush
