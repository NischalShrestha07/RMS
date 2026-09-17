@extends('layouts.admin')

@section('title', 'Add Special Offer')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Add Special Offer</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.special-offers.store') }}" enctype="multipart/form-data">
      @include('admin.special-offers._form')
   </form>
</div>
@endsection
