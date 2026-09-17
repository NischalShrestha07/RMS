@extends('layouts.site')

@section('title', 'Page Not Found - Sarab')

@section('content')
<div class="text-center py-5">
   <span class="slbl">404 Error</span>
   <h2 class="stitle">Page <span>Not Found</span></h2>
   <div class="sline mx-auto"></div>
   <p class="text-muted mt-4 mb-4">Sorry, the page you're looking for doesn't exist or has been moved.</p>
   <a href="{{ route('home') }}" class="btn btn-red">Back to Home</a>
</div>
@endsection
