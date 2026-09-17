@extends('layouts.staff')

@php $staffPanelName = 'Kitchen'; @endphp

@section('title', 'Kitchen Queue')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
   <h4 style="font-family:'Playfair Display',serif;font-weight:900;">Kitchen Queue</h4>
   <a href="{{ route('kitchen.dashboard') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-sync-alt me-1"></i>Refresh</a>
</div>

@php
   $nextLabel = ['pending' => 'Confirm', 'confirmed' => 'Start Preparing', 'preparing' => 'Mark Ready'];
@endphp

<div class="row g-3">
   @forelse ($orders as $order)
   <div class="col-md-6 col-lg-4">
      <div class="admin-card">
         <div class="d-flex justify-content-between align-items-center mb-2">
            <strong>{{ $order->order_number }}</strong>
            <span style="font-size:.78rem;text-transform:capitalize;background:rgba(232,40,26,.1);color:var(--primary);padding:4px 12px;border-radius:20px;">{{ str_replace('_', ' ', $order->status) }}</span>
         </div>
         <div style="font-size:.78rem;color:#888;" class="mb-2">{{ $order->created_at->diffForHumans() }}</div>
         @foreach ($order->items as $item)
         <div style="font-size:.88rem;">{{ $item->quantity }} × {{ $item->title }}</div>
         @endforeach
         <form method="POST" action="{{ route('kitchen.orders.advance', $order) }}" class="mt-3">
            @csrf @method('PUT')
            <button type="submit" class="btn btn-red btn-sm w-100">{{ $nextLabel[$order->status] ?? 'Advance' }}</button>
         </form>
      </div>
   </div>
   @empty
   <div class="col-12">
      <div class="admin-card text-center text-muted py-5">No orders in the kitchen queue.</div>
   </div>
   @endforelse
</div>
@endsection

@push('scripts')
<script>
   setTimeout(() => window.location.reload(), 30000);
</script>
@endpush
