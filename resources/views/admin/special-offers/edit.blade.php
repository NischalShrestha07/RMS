@extends('layouts.admin')

@section('title', 'Edit Special Offer')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Edit Special Offer</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.special-offers.update', $specialOffer) }}" enctype="multipart/form-data">
      @include('admin.special-offers._form')
   </form>
</div>
@endsection
