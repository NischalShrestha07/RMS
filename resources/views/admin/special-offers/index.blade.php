@extends('layouts.admin')

@section('title', 'Special Offers')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Special Offers</h5>
   <a href="{{ route('admin.special-offers.create') }}" class="btn btn-red">+ Add Special Offer</a>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Image</th><th>Title</th><th>Price</th><th>Ends At</th><th>Active</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($specialOffers as $specialOffer)
         <tr>
            <td><img src="{{ asset($specialOffer->image) }}" alt="" style="width:48px;height:48px;object-fit:cover;border-radius:8px;"></td>
            <td>{{ $specialOffer->title }}</td>
            <td>
               @if ($specialOffer->old_price)
               <span class="text-muted" style="text-decoration:line-through;">${{ number_format($specialOffer->old_price, 2) }}</span>
               @endif
               <strong>${{ number_format($specialOffer->new_price, 2) }}</strong>
            </td>
            <td>{{ $specialOffer->ends_at->format('M d, Y g:i A') }}</td>
            <td>{{ $specialOffer->is_active ? 'Yes' : 'No' }}</td>
            <td class="text-end">
               <a href="{{ route('admin.special-offers.edit', $specialOffer) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
               <form method="POST" action="{{ route('admin.special-offers.destroy', $specialOffer) }}" class="d-inline" onsubmit="return confirm('Delete this special offer?');">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
               </form>
            </td>
         </tr>
         @empty
         <tr><td colspan="6" class="text-muted text-center py-4">No special offers yet.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $specialOffers->links() }}</div>
@endsection
