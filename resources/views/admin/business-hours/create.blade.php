@extends('layouts.admin')

@section('title', 'Add Business Hour')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Add Business Hour</h5>
<div class="admin-card">
   <form method="POST" action="{{ route('admin.business-hours.store') }}">
      @include('admin.business-hours._form')
   </form>
</div>
@endsection
