@extends('layouts.admin')

@section('title', 'Newsletter Subscribers')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Newsletter Subscribers</h5>
   <a href="{{ route('admin.newsletter-subscribers.export') }}" class="btn btn-outline-secondary"><i class="fas fa-download me-1"></i>Export CSV</a>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Email</th><th>Subscribed At</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($subscribers as $subscriber)
         <tr>
            <td>{{ $subscriber->email }}</td>
            <td>{{ $subscriber->created_at->format('M d, Y g:i A') }}</td>
            <td class="text-end">
               <form method="POST" action="{{ route('admin.newsletter-subscribers.destroy', $subscriber) }}" class="d-inline" onsubmit="return confirm('Remove this subscriber?');">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
               </form>
            </td>
         </tr>
         @empty
         <tr><td colspan="3" class="text-muted text-center py-4">No subscribers yet.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $subscribers->links() }}</div>
@endsection
