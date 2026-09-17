@extends('layouts.site')

@section('title', 'Order '.$order->order_number.' - Sarab')

@section('content')
<div class="mb-4">
   <span class="slbl">Order Detail</span>
   <h2 class="stitle">Order <span>{{ $order->order_number }}</span></h2>
   <div class="sline"></div>
</div>

@include('partials.account.nav')

<div class="fcard">
   <div class="d-flex justify-content-between align-items-center mb-3">
      <span style="font-size:.85rem;color:#888;">Placed {{ $order->created_at->format('M d, Y g:i A') }}</span>
      <span style="font-size:.8rem;text-transform:capitalize;background:rgba(232,40,26,.1);color:var(--primary);padding:4px 12px;border-radius:20px;">{{ str_replace('_', ' ', $order->status) }}</span>
   </div>

   @include('partials.order-status-tracker', ['order' => $order])

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

<div class="d-flex flex-wrap gap-3 mt-4">
   <a href="{{ route('account.orders.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i>Back to Orders</a>
   @include('partials.whatsapp-order-button', ['order' => $order])
</div>
@endsection
