@extends('layouts.staff')

@php $staffPanelName = 'Delivery'; @endphp

@section('title', 'Delivery Dashboard')

@section('content')
<h4 class="mb-4" style="font-family:'Playfair Display',serif;font-weight:900;">My Deliveries</h4>

<div class="row g-3 mb-4">
   @forelse ($active as $order)
   <div class="col-md-6">
      <div class="admin-card">
         <div class="d-flex justify-content-between align-items-center mb-2">
            <strong>{{ $order->order_number }}</strong>
            <span style="font-size:.78rem;text-transform:capitalize;background:rgba(232,40,26,.1);color:var(--primary);padding:4px 12px;border-radius:20px;">{{ str_replace('_', ' ', $order->status) }}</span>
         </div>
         <div style="font-size:.85rem;color:#666;" class="mb-2">
            <div><i class="fas fa-map-marker-alt me-2"></i>{{ $order->delivery_address }}</div>
            <div><i class="fas fa-phone-alt me-2"></i>{{ $order->phone }}</div>
         </div>
         @if ($order->status === 'ready')
         <form method="POST" action="{{ route('delivery.orders.pickup', $order) }}">
            @csrf @method('PUT')
            <button type="submit" class="btn btn-red btn-sm w-100">Mark Out for Delivery</button>
         </form>
         @elseif ($order->status === 'out_for_delivery')
         <form method="POST" action="{{ route('delivery.orders.deliver', $order) }}">
            @csrf @method('PUT')
            <button type="submit" class="btn btn-red btn-sm w-100">Mark Delivered</button>
         </form>
         @endif
      </div>
   </div>
   @empty
   <div class="col-12"><div class="admin-card text-center text-muted py-4">No active deliveries.</div></div>
   @endforelse
</div>

<h5 class="mb-3" style="font-weight:700;">Available for Pickup</h5>
<div class="row g-3 mb-4">
   @forelse ($available as $order)
   <div class="col-md-6">
      <div class="admin-card">
         <div class="d-flex justify-content-between align-items-center mb-2">
            <strong>{{ $order->order_number }}</strong>
            <span style="font-size:.78rem;color:#888;">{{ $order->created_at->diffForHumans() }}</span>
         </div>
         <div style="font-size:.85rem;color:#666;" class="mb-2">
            <div><i class="fas fa-map-marker-alt me-2"></i>{{ $order->delivery_address }}</div>
         </div>
         <form method="POST" action="{{ route('delivery.orders.assign', $order) }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary btn-sm w-100">Self-Assign</button>
         </form>
      </div>
   </div>
   @empty
   <div class="col-12"><div class="admin-card text-center text-muted py-4">No orders waiting for pickup.</div></div>
   @endforelse
</div>

<h5 class="mb-3" style="font-weight:700;">Delivery History</h5>
<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead><tr><th>Order #</th><th>Delivered At</th></tr></thead>
      <tbody>
         @forelse ($history as $delivery)
         <tr>
            <td>{{ $delivery->order->order_number }}</td>
            <td>{{ $delivery->delivered_at->format('M d, Y g:i A') }}</td>
         </tr>
         @empty
         <tr><td colspan="2" class="text-muted text-center py-4">No completed deliveries yet.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>
@endsection

@push('scripts')
<script>
   setTimeout(() => window.location.reload(), 30000);
</script>
@endpush
