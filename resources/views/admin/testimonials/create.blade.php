@extends('layouts.admin')

@section('title', 'Add Testimonial')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Add Testimonial</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
      @include('admin.testimonials._form')
   </form>
</div>
@endsection
