@extends('layouts.site')

@section('title', 'Order Confirmed - Sarab')

@section('content')
<div class="text-center" style="max-width:560px;margin:0 auto;">
   <div class="sucmsg" style="display:block;">
      <i class="fas fa-check-circle"></i>
      <p>Thank you! Your order <strong>{{ $order->order_number }}</strong> has been placed.</p>
   </div>

   <div class="fcard text-start mt-4">
      @include('partials.order-status-tracker', ['order' => $order])
      <h5 class="mb-3" style="font-family:'Poppins',sans-serif;font-weight:700;">Order #{{ $order->order_number }}</h5>
      @foreach ($order->items as $item)
      <div class="d-flex justify-content-between mb-2" style="font-size:.88rem;">
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
      </div>
   </div>

   <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
      <a href="{{ route('account.orders.index') }}" class="btn-red"><i class="fas fa-receipt"></i>View My Orders</a>
      @include('partials.whatsapp-order-button', ['order' => $order])
   </div>
</div>
@endsection
