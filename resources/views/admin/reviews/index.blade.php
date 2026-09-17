@extends('layouts.admin')

@section('title', 'Reviews')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Reviews</h5>
   <div class="d-flex gap-2">
      <a href="{{ route('admin.reviews.index', ['status' => 'pending']) }}" class="btn btn-sm {{ $statusFilter === 'pending' ? 'btn-secondary' : 'btn-outline-secondary' }}">Pending</a>
      <a href="{{ route('admin.reviews.index', ['status' => 'approved']) }}" class="btn btn-sm {{ $statusFilter === 'approved' ? 'btn-secondary' : 'btn-outline-secondary' }}">Approved</a>
   </div>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Customer</th><th>Order</th><th>Rating</th><th>Comment</th><th>Date</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($reviews as $review)
         <tr>
            <td>{{ $review->user->name }}</td>
            <td>{{ $review->order->order_number }}</td>
            <td>{{ $review->rating }}/5</td>
            <td style="max-width:280px;white-space:normal;">{{ $review->comment }}</td>
            <td>{{ $review->created_at->format('M d, Y') }}</td>
            <td class="text-end">
               @if (! $review->is_approved)
               <form method="POST" action="{{ route('admin.reviews.approve', $review) }}" class="d-inline">
                  @csrf @method('PUT')
                  <button type="submit" class="btn btn-sm btn-outline-success">Approve</button>
               </form>
               @endif
               <form method="POST" action="{{ route('admin.reviews.destroy', $review) }}" class="d-inline" onsubmit="return confirm('Remove this review?');">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Reject</button>
               </form>
            </td>
         </tr>
         @empty
         <tr><td colspan="6" class="text-muted text-center py-4">No reviews found.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $reviews->links() }}</div>
@endsection
