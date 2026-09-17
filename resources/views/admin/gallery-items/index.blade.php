@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Gallery</h5>
   <a href="{{ route('admin.gallery-items.create') }}" class="btn btn-red">+ Add Gallery Item</a>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Image</th><th>Title</th><th>Description</th><th>Order</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($galleryItems as $galleryItem)
         <tr>
            <td><img src="{{ asset($galleryItem->image) }}" alt="" style="width:48px;height:48px;object-fit:cover;border-radius:8px;"></td>
            <td>{{ $galleryItem->title }}</td>
            <td>{{ \Illuminate\Support\Str::limit($galleryItem->description, 60) }}</td>
            <td>{{ $galleryItem->sort_order }}</td>
            <td class="text-end">
               <a href="{{ route('admin.gallery-items.edit', $galleryItem) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
               <form method="POST" action="{{ route('admin.gallery-items.destroy', $galleryItem) }}" class="d-inline" onsubmit="return confirm('Delete this gallery item?');">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
               </form>
            </td>
         </tr>
         @empty
         <tr><td colspan="5" class="text-muted text-center py-4">No gallery items yet.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $galleryItems->links() }}</div>
@endsection
