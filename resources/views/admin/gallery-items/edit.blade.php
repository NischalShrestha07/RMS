@extends('layouts.admin')

@section('title', 'Edit Gallery Item')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Edit Gallery Item</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.gallery-items.update', $galleryItem) }}" enctype="multipart/form-data">
      @include('admin.gallery-items._form')
   </form>
</div>
@endsection
