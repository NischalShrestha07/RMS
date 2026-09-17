@extends('layouts.admin')

@section('title', 'Add Gallery Item')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Add Gallery Item</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.gallery-items.store') }}" enctype="multipart/form-data">
      @include('admin.gallery-items._form')
   </form>
</div>
@endsection
