@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Edit Category</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data">
      @include('admin.categories._form')
   </form>
</div>
@endsection
