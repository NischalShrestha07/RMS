@extends('layouts.admin')

@section('title', 'Order '.$order->order_number)

@section('content')
<h5 class="mb-3" style="font-weight:700;">Order {{ $order->order_number }}</h5>

<div class="row g-4">
   <div class="col-lg-8">
      <div class="admin-card">
         <div class="mb-3" style="font-size:.85rem;color:#888;">Placed {{ $order->created_at->format('M d, Y g:i A') }} by {{ $order->user->name ?? 'Guest' }}</div>
         @foreach ($order->items as $item)
         <div class="d-flex justify-content-between mb-2" style="font-size:.9rem;">
            <span>{{ $item->quantity }} × {{ $item->title }}</span>
            <span>${{ number_format($item->line_total, 2) }}</span>
         </div>
         @endforeach
         <hr>
         <div class="d-flex justify-content-between mb-3"><strong>Total</strong><strong>${{ number_format($order->total, 2) }}</strong></div>
         <div style="font-size:.85rem;color:#666;">
            <div><i class="fas fa-map-marker-alt me-2"></i>{{ $order->delivery_address }}</div>
            <div><i class="fas fa-phone-alt me-2"></i>{{ $order->phone }}</div>
            <div><i class="fas fa-money-bill-wave me-2"></i>Cash on Delivery</div>
            @if ($order->notes)
            <div><i class="fas fa-sticky-note me-2"></i>{{ $order->notes }}</div>
            @endif
         </div>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="admin-card">
         <h6 class="mb-3" style="font-weight:700;">Update Status</h6>
         <form method="POST" action="{{ route('admin.orders.update', $order) }}">
            @csrf @method('PUT')
            <select name="status" class="form-control fctrl mb-3">
               @foreach ($statuses as $status)
               <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>{{ str_replace('_', ' ', ucfirst($status)) }}</option>
               @endforeach
            </select>
            <button type="submit" class="btn btn-red w-100">Update Status</button>
         </form>
      </div>
   </div>
</div>

<a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary mt-4">Back to Orders</a>
@endsection
