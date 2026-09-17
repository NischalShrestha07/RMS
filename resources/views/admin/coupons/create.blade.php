@extends('layouts.admin')

@section('title', 'Add Coupon')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Add Coupon</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.coupons.store') }}">
      @include('admin.coupons._form')
   </form>
</div>
@endsection
