@extends('layouts.admin')

@section('title', 'Edit Chef')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Edit Chef</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.chefs.update', $chef) }}" enctype="multipart/form-data">
      @include('admin.chefs._form')
   </form>
</div>
@endsection
