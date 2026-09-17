@extends('layouts.admin')

@section('title', 'Coupons')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Coupons</h5>
   <a href="{{ route('admin.coupons.create') }}" class="btn btn-red">+ Add Coupon</a>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Code</th><th>Type</th><th>Value</th><th>Uses</th><th>Expires At</th><th>Active</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($coupons as $coupon)
         <tr>
            <td>{{ $coupon->code }}</td>
            <td>{{ ucfirst($coupon->type) }}</td>
            <td>{{ $coupon->type === 'percent' ? $coupon->value.'%' : '$'.number_format($coupon->value, 2) }}</td>
            <td>{{ $coupon->used_count }}{{ $coupon->max_uses ? ' / '.$coupon->max_uses : '' }}</td>
            <td>{{ $coupon->expires_at?->format('M d, Y g:i A') ?? '—' }}</td>
            <td>{{ $coupon->is_active ? 'Yes' : 'No' }}</td>
            <td class="text-end">
               <a href="{{ route('admin.coupons.edit', $coupon) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
               <form method="POST" action="{{ route('admin.coupons.destroy', $coupon) }}" class="d-inline" onsubmit="return confirm('Delete this coupon?');">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
               </form>
            </td>
         </tr>
         @empty
         <tr><td colspan="7" class="text-muted text-center py-4">No coupons yet.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $coupons->links() }}</div>
@endsection
