@extends('layouts.site')

@section('title', 'Your Cart - Sarab')

@section('content')
<div class="text-center mb-5">
   <span class="slbl">Review Your Order</span>
   <h2 class="stitle">Your <span>Cart</span></h2>
   <div class="sline"></div>
</div>

@if (session('status'))
   <div class="sucmsg" style="display:block;margin-bottom:24px;"><p>{{ session('status') }}</p></div>
@endif

@if ($cart->items->isEmpty())
   <div class="text-center" style="padding:40px 0;">
      <p class="sdesc mb-4">Your cart is empty.</p>
      <a href="{{ url('/#menu') }}" class="btn-red"><i class="fas fa-utensils"></i>Browse Menu</a>
   </div>
@else
   <div class="row g-4">
      <div class="col-lg-8">
         <div class="fcard">
            @foreach ($cart->items as $item)
            <div class="d-flex align-items-center gap-3 mb-3 pb-3" style="border-bottom:1px solid #eee;" data-cart-item="{{ $item->id }}">
               <img src="{{ asset($item->menuItem->image) }}" alt="{{ $item->menuItem->title }}" style="width:72px;height:72px;object-fit:cover;border-radius:12px;">
               <div class="flex-grow-1">
                  <div class="mtit">{{ $item->menuItem->title }}</div>
                  <div class="mdesc">${{ number_format($item->menuItem->price, 2) }} each</div>
               </div>
               <div class="d-flex align-items-center gap-2">
                  <input type="number" min="1" max="20" value="{{ $item->quantity }}" class="fctrl cart-qty" style="width:70px;text-align:center;" data-id="{{ $item->id }}">
                  <button class="btn btn-link text-danger cart-remove" data-id="{{ $item->id }}" title="Remove"><i class="fas fa-trash"></i></button>
               </div>
               <div style="min-width:80px;text-align:right;" class="mprice">${{ number_format($item->quantity * $item->menuItem->price, 2) }}</div>
            </div>
            @endforeach
         </div>
      </div>
      <div class="col-lg-4">
         <div class="fcard">
            <h5 class="mb-3" style="font-family:'Poppins',sans-serif;font-weight:700;">Order Summary</h5>
            <div class="d-flex justify-content-between mb-2"><span>Subtotal</span><strong>${{ number_format($cart->subtotal(), 2) }}</strong></div>
            <div class="d-flex justify-content-between mb-4"><span>Delivery</span><span>Free</span></div>
            <a href="{{ route('checkout.show') }}" class="btn-red w-100 justify-content-center"><i class="fas fa-lock"></i>Proceed to Checkout</a>
         </div>
      </div>
   </div>
@endif
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.querySelectorAll('.cart-qty').forEach(function(input) {
        input.addEventListener('change', function() {
            fetch('cart/' + this.getAttribute('data-id'), {
                method: 'PATCH',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': token },
                body: JSON.stringify({ quantity: this.value })
            }).then(function(res) {
                if (!res.ok) { alert('Could not update quantity. Please try again.'); return; }
                location.reload();
            }).catch(function() { alert('Network error. Please try again.'); });
        });
    });

    document.querySelectorAll('.cart-remove').forEach(function(btn) {
        btn.addEventListener('click', function() {
            fetch('cart/' + this.getAttribute('data-id'), {
                method: 'DELETE',
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': token }
            }).then(function(res) {
                if (!res.ok) { alert('Could not remove item. Please try again.'); return; }
                location.reload();
            }).catch(function() { alert('Network error. Please try again.'); });
        });
    });
});
</script>
@endsection
