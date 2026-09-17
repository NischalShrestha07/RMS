@extends('layouts.site')

@section('title', 'Access Denied - Sarab')

@section('content')
<div class="text-center py-5">
   <span class="slbl">403 Error</span>
   <h2 class="stitle">Access <span>Denied</span></h2>
   <div class="sline mx-auto"></div>
   <p class="text-muted mt-4 mb-4">Sorry, you don't have permission to access this page.</p>
   <a href="{{ route('home') }}" class="btn btn-red">Back to Home</a>
</div>
@endsection
