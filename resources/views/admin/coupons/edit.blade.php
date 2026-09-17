@extends('layouts.admin')

@section('title', 'Edit Coupon')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Edit Coupon</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.coupons.update', $coupon) }}">
      @include('admin.coupons._form')
   </form>
</div>
@endsection
