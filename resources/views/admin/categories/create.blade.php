@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Add Category</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
      @include('admin.categories._form')
   </form>
</div>
@endsection
