@extends('layouts.admin')

@section('title', 'Add Menu Item')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Add Menu Item</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.menu-items.store') }}" enctype="multipart/form-data">
      @include('admin.menu-items._form')
   </form>
</div>
@endsection
