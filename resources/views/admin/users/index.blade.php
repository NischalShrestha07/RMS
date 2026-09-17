@extends('layouts.admin')

@section('title', 'Users')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Users</h5>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Name</th><th>Email</th><th>Role</th><th>Joined</th><th></th></tr>
      </thead>
      <tbody>
         @forelse ($users as $user)
         <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><span style="text-transform:capitalize;">{{ $user->roles->pluck('name')->join(', ') ?: '—' }}</span></td>
            <td>{{ $user->created_at->format('M d, Y') }}</td>
            <td class="text-end">
               <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
            </td>
         </tr>
         @empty
         <tr><td colspan="5" class="text-muted text-center py-4">No users found.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $users->links() }}</div>
@endsection
