@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Categories</h5>
   <a href="{{ route('admin.categories.create') }}" class="btn btn-red">+ Add Category</a>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Image</th><th>Name</th><th>Slug</th><th>Items</th><th>Show in Grid</th><th>Order</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($categories as $category)
         <tr>
            <td><img src="{{ asset($category->image) }}" alt="" style="width:48px;height:48px;object-fit:cover;border-radius:8px;"></td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->item_count }}</td>
            <td>{{ $category->show_in_grid ? 'Yes' : 'No' }}</td>
            <td>{{ $category->sort_order }}</td>
            <td class="text-end">
               <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
               <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="d-inline" onsubmit="return confirm('Delete this category?');">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
               </form>
            </td>
         </tr>
         @empty
         <tr><td colspan="7" class="text-muted text-center py-4">No categories yet.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $categories->links() }}</div>
@endsection
