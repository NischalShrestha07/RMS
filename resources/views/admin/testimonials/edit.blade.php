@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Edit Testimonial</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data">
      @include('admin.testimonials._form')
   </form>
</div>
@endsection
