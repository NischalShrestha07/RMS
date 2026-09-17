@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Contact Messages</h5>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th></th><th>Name</th><th>Subject</th><th>Received</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($messages as $message)
         <tr style="{{ $message->is_read ? '' : 'font-weight:700;' }}">
            <td>@unless($message->is_read)<span style="width:8px;height:8px;border-radius:50%;background:var(--primary);display:inline-block;"></span>@endunless</td>
            <td><a href="{{ route('admin.contact-messages.show', $message) }}">{{ $message->name }}</a><br><span style="font-size:.78rem;color:#888;font-weight:400;">{{ $message->email }}</span></td>
            <td>{{ $message->subject }}</td>
            <td style="font-weight:400;">{{ $message->created_at->format('M d, Y g:i A') }}</td>
            <td class="text-end">
               <form method="POST" action="{{ route('admin.contact-messages.destroy', $message) }}" class="d-inline" onsubmit="return confirm('Delete this message?');">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
               </form>
            </td>
         </tr>
         @empty
         <tr><td colspan="5" class="text-muted text-center py-4">No messages yet.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $messages->links() }}</div>
@endsection
