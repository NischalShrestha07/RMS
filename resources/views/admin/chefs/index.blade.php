@extends('layouts.admin')

@section('title', 'Chefs')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Chefs</h5>
   <a href="{{ route('admin.chefs.create') }}" class="btn btn-red">+ Add Chef</a>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Image</th><th>Name</th><th>Role</th><th>Years Exp.</th><th>Order</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($chefs as $chef)
         <tr>
            <td><img src="{{ asset($chef->image) }}" alt="" style="width:48px;height:48px;object-fit:cover;border-radius:8px;"></td>
            <td>{{ $chef->name }}</td>
            <td>{{ $chef->role }}</td>
            <td>{{ $chef->years_experience }}</td>
            <td>{{ $chef->sort_order }}</td>
            <td class="text-end">
               <a href="{{ route('admin.chefs.edit', $chef) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
               <form method="POST" action="{{ route('admin.chefs.destroy', $chef) }}" class="d-inline" onsubmit="return confirm('Delete this chef?');">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
               </form>
            </td>
         </tr>
         @empty
         <tr><td colspan="6" class="text-muted text-center py-4">No chefs yet.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $chefs->links() }}</div>
@endsection
