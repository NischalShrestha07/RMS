@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Orders</h5>
   <form method="GET" class="d-flex gap-2">
      <select name="status" class="form-control fctrl" onchange="this.form.submit()">
         <option value="">All Statuses</option>
         @foreach ($statuses as $status)
         <option value="{{ $status }}" {{ $statusFilter === $status ? 'selected' : '' }}>{{ str_replace('_', ' ', ucfirst($status)) }}</option>
         @endforeach
      </select>
   </form>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Order #</th><th>Customer</th><th>Total</th><th>Status</th><th>Placed</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($orders as $order)
         <tr>
            <td>{{ $order->order_number }}</td>
            <td>{{ $order->user->name ?? 'Guest' }}</td>
            <td>${{ number_format($order->total, 2) }}</td>
            <td><span style="text-transform:capitalize;">{{ str_replace('_', ' ', $order->status) }}</span></td>
            <td>{{ $order->created_at->format('M d, Y g:i A') }}</td>
            <td class="text-end">
               <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-secondary">View</a>
            </td>
         </tr>
         @empty
         <tr><td colspan="6" class="text-muted text-center py-4">No orders found.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $orders->links() }}</div>
@endsection
