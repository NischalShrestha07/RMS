@extends('layouts.admin')

@section('title', 'Message from '.$message->name)

@section('content')
<h5 class="mb-3" style="font-weight:700;">Message from {{ $message->name }}</h5>

<div class="admin-card">
   <div class="mb-3" style="font-size:.85rem;color:#888;">
      {{ $message->email }} @if($message->phone) · {{ $message->phone }} @endif · {{ $message->created_at->format('M d, Y g:i A') }}
   </div>
   <div class="mb-3"><strong>Subject:</strong> {{ $message->subject }}</div>
   <p style="white-space:pre-line;">{{ $message->message }}</p>
</div>

<a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-secondary mt-3">Back to Messages</a>
@endsection
