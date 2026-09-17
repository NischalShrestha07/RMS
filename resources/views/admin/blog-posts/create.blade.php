@extends('layouts.admin')

@section('title', 'Add Blog Post')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Add Blog Post</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.blog-posts.store') }}" enctype="multipart/form-data">
      @include('admin.blog-posts._form')
   </form>
</div>
@endsection
