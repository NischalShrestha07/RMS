@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Testimonials</h5>
   <a href="{{ route('admin.testimonials.create') }}" class="btn btn-red">+ Add Testimonial</a>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Image</th><th>Name</th><th>Role</th><th>Rating</th><th>Message</th><th>Order</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($testimonials as $testimonial)
         <tr>
            <td><img src="{{ asset($testimonial->image) }}" alt="" style="width:48px;height:48px;object-fit:cover;border-radius:8px;"></td>
            <td>{{ $testimonial->name }}</td>
            <td>{{ $testimonial->role }}</td>
            <td>{{ $testimonial->rating }}</td>
            <td>{{ \Illuminate\Support\Str::limit($testimonial->message, 60) }}</td>
            <td>{{ $testimonial->sort_order }}</td>
            <td class="text-end">
               <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
               <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" class="d-inline" onsubmit="return confirm('Delete this testimonial?');">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
               </form>
            </td>
         </tr>
         @empty
         <tr><td colspan="7" class="text-muted text-center py-4">No testimonials yet.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $testimonials->links() }}</div>
@endsection
