@extends('layouts.site')

@section('title', 'Checkout - Sarab')

@section('content')
<div class="text-center mb-5">
   <span class="slbl">Almost There</span>
   <h2 class="stitle">Checkout</h2>
   <div class="sline"></div>
</div>

<div class="row g-4">
   <div class="col-lg-7">
      <div class="fcard">
         <h5 class="mb-3" style="font-family:'Poppins',sans-serif;font-weight:700;">Delivery Details</h5>
         <form method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <div class="mb-3">
               <label class="flbl">Delivery Address *</label>
               <input type="text" name="delivery_address" value="{{ old('delivery_address') }}" class="fctrl @error('delivery_address') is-invalid @enderror" placeholder="Street, city, apartment/suite">
               @error('delivery_address') <small class="ferr">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
               <label class="flbl">Phone Number *</label>
               <input type="tel" name="phone" value="{{ old('phone') }}" class="fctrl @error('phone') is-invalid @enderror" placeholder="+1 (800) 000-0000">
               @error('phone') <small class="ferr">{{ $message }}</small> @enderror
            </div>
            <div class="mb-4">
               <label class="flbl">Special Requests</label>
               <textarea name="notes" rows="3" class="fctrl" placeholder="Delivery instructions, allergies...">{{ old('notes') }}</textarea>
            </div>
            <div class="mb-4" style="background:rgba(45,106,79,.07);border-radius:10px;padding:14px 18px;font-size:.85rem;">
               <i class="fas fa-money-bill-wave me-2" style="color:var(--green);"></i>Payment: <strong>Cash on Delivery</strong>
            </div>
            <button type="submit" class="btn-red w-100 justify-content-center"><i class="fas fa-check-circle"></i>Place Order</button>
         </form>
      </div>
   </div>
   <div class="col-lg-5">
      <div class="fcard">
         <h5 class="mb-3" style="font-family:'Poppins',sans-serif;font-weight:700;">Order Summary</h5>
         @foreach ($cart->items as $item)
         <div class="d-flex justify-content-between mb-2" style="font-size:.88rem;">
            <span>{{ $item->quantity }} × {{ $item->menuItem->title }}</span>
            <span>${{ number_format($item->quantity * $item->menuItem->price, 2) }}</span>
         </div>
         @endforeach
         <hr>
         <div class="d-flex justify-content-between"><strong>Total</strong><strong>${{ number_format($cart->subtotal(), 2) }}</strong></div>
      </div>
   </div>
</div>
@endsection
