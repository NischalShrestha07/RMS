@extends('layouts.admin')

@section('title', 'Business Hours')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Business Hours</h5>
   <a href="{{ route('admin.business-hours.create') }}" class="btn btn-red">+ Add Row</a>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Day</th><th>Open</th><th>Close</th><th>Closed</th><th>Order</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($businessHours as $hour)
         <tr>
            <td>{{ $hour->day_label }}</td>
            <td>{{ $hour->open_time ?: '—' }}</td>
            <td>{{ $hour->close_time ?: '—' }}</td>
            <td>{{ $hour->is_closed ? 'Yes' : 'No' }}</td>
            <td>{{ $hour->sort_order }}</td>
            <td class="text-end">
               <a href="{{ route('admin.business-hours.edit', $hour) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
               <form method="POST" action="{{ route('admin.business-hours.destroy', $hour) }}" class="d-inline" onsubmit="return confirm('Delete this row?');">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
               </form>
            </td>
         </tr>
         @empty
         <tr><td colspan="6" class="text-muted text-center py-4">No business hours set.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>
@endsection
