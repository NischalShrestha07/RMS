@extends('layouts.admin')

@section('title', 'Edit Business Hour')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Edit Business Hour</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.business-hours.update', $businessHour) }}">
      @include('admin.business-hours._form')
   </form>
</div>
@endsection
