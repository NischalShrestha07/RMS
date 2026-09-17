@extends('layouts.site')

@section('title', 'My Orders - Sarab')

@section('content')
<div class="mb-4">
   <span class="slbl">Order History</span>
   <h2 class="stitle">My <span>Orders</span></h2>
   <div class="sline"></div>
</div>

@include('partials.account.nav')

<div class="fcard">
   @forelse ($orders as $order)
   <div class="d-flex justify-content-between align-items-center mb-3 pb-3" style="border-bottom:1px solid #eee;">
      <div>
         <a href="{{ route('account.orders.show', $order) }}" class="mtit" style="text-decoration:none;">{{ $order->order_number }}</a>
         <div style="font-size:.8rem;color:#888;">{{ $order->created_at->format('M d, Y g:i A') }} · {{ $order->items->count() }} item(s)</div>
      </div>
      <div class="text-end">
         <div class="mprice">${{ number_format($order->total, 2) }}</div>
         <span style="font-size:.78rem;text-transform:capitalize;color:var(--primary);">{{ str_replace('_', ' ', $order->status) }}</span>
      </div>
   </div>
   @empty
   <p class="text-muted mb-0">You haven't placed any orders yet.</p>
   @endforelse
</div>

<div class="mt-4">{{ $orders->links() }}</div>
@endsection
