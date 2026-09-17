@extends('layouts.admin')

@section('title', 'Edit Menu Item')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Edit Menu Item</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.menu-items.update', $menuItem) }}" enctype="multipart/form-data">
      @include('admin.menu-items._form')
   </form>
</div>
@endsection
