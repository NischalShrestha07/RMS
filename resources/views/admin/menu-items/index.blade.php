@extends('layouts.admin')

@section('title', 'Menu Items')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Menu Items</h5>
   <a href="{{ route('admin.menu-items.create') }}" class="btn btn-red">+ Add Menu Item</a>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Image</th><th>Title</th><th>Category</th><th>Price</th><th>Badge</th><th>Active</th><th>Order</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($menuItems as $item)
         <tr>
            <td><img src="{{ asset($item->image) }}" alt="" style="width:48px;height:48px;object-fit:cover;border-radius:8px;"></td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->category->name ?? '—' }}</td>
            <td>${{ number_format($item->price, 2) }}</td>
            <td>{{ $item->badge_label ?: '—' }}</td>
            <td>{{ $item->is_active ? 'Yes' : 'No' }}</td>
            <td>{{ $item->sort_order }}</td>
            <td class="text-end">
               <a href="{{ route('admin.menu-items.edit', $item) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
               <form method="POST" action="{{ route('admin.menu-items.destroy', $item) }}" class="d-inline" onsubmit="return confirm('Delete this menu item?');">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
               </form>
            </td>
         </tr>
         @empty
         <tr><td colspan="8" class="text-muted text-center py-4">No menu items yet.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $menuItems->links() }}</div>
@endsection
