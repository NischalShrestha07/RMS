@extends('layouts.admin')

@section('title', 'Reports')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Orders &amp; Revenue Report</h5>
   <a href="{{ route('admin.reports.export', ['from' => $from, 'to' => $to]) }}" class="btn btn-outline-secondary"><i class="fas fa-download me-1"></i>Export CSV</a>
</div>

<div class="admin-card mb-4">
   <form method="GET" class="row g-3 align-items-end">
      <div class="col-md-3">
         <label class="form-label">From</label>
         <input type="date" name="from" class="form-control fctrl" value="{{ $from }}">
      </div>
      <div class="col-md-3">
         <label class="form-label">To</label>
         <input type="date" name="to" class="form-control fctrl" value="{{ $to }}">
      </div>
      <div class="col-md-3">
         <button type="submit" class="btn btn-primary">Filter</button>
      </div>
   </form>
</div>

<div class="row g-4 mb-4">
   <div class="col-md-3 col-6">
      <div class="admin-card">
         <div class="widget-label">Orders</div>
         <div class="widget-value">{{ $orderCount }}</div>
      </div>
   </div>
   <div class="col-md-3 col-6">
      <div class="admin-card">
         <div class="widget-label">Total Revenue</div>
         <div class="widget-value">${{ number_format($totalRevenue, 2) }}</div>
      </div>
   </div>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Order Number</th><th>Date</th><th>Customer</th><th>Status</th><th>Total</th></tr>
      </thead>
      <tbody>
         @forelse ($orders as $order)
         <tr>
            <td>{{ $order->order_number }}</td>
            <td>{{ $order->created_at->format('M d, Y g:i A') }}</td>
            <td>{{ $order->user->name ?? 'Guest' }}</td>
            <td><span style="text-transform:capitalize;">{{ str_replace('_', ' ', $order->status) }}</span></td>
            <td>${{ number_format($order->total, 2) }}</td>
         </tr>
         @empty
         <tr><td colspan="5" class="text-muted text-center py-4">No orders found for this range.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $orders->links() }}</div>
@endsection
