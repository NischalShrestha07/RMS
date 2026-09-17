@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<h5 class="mb-3" style="font-weight:700;">Edit User</h5>

<div class="admin-card">
   @if ($errors->any())
   <div class="alert alert-danger">
      <ul class="mb-0">
         @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
      </ul>
   </div>
   @endif

   <form method="POST" action="{{ route('admin.users.update', $user) }}">
      @csrf @method('PUT')
      <div class="row g-3">
         <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control fctrl" value="{{ old('name', $user->name) }}" required>
         </div>
         <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control fctrl" value="{{ old('email', $user->email) }}" required>
         </div>
         <div class="col-md-6">
            <label class="form-label">Role</label>
            <select name="role" class="form-control fctrl" required>
               @foreach ($roles as $role)
               <option value="{{ $role }}" {{ old('role', $user->roles->first()?->name) === $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
               @endforeach
            </select>
         </div>
      </div>
      <div class="mt-4">
         <button type="submit" class="btn btn-red">Update User</button>
         <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Cancel</a>
      </div>
   </form>
</div>
@endsection
