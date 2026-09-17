@extends('layouts.admin')

@section('title', 'Activity Log')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
   <h5 class="mb-0" style="font-weight:700;">Activity Log</h5>
   <form method="GET" class="d-flex gap-2">
      <input type="text" name="action" class="form-control fctrl" placeholder="Filter by action" value="{{ $actionFilter }}">
      <button type="submit" class="btn btn-outline-secondary">Filter</button>
   </form>
</div>

<div class="admin-card">
   <table class="table align-middle mb-0">
      <thead>
         <tr><th>Time</th><th>User</th><th>Action</th><th>Description</th></tr>
      </thead>
      <tbody>
         @forelse ($logs as $log)
         <tr>
            <td>{{ $log->created_at->format('M d, Y g:i A') }}</td>
            <td>{{ $log->user->name ?? 'System' }}</td>
            <td>{{ $log->action }}</td>
            <td>{{ $log->description }}</td>
         </tr>
         @empty
         <tr><td colspan="4" class="text-muted text-center py-4">No activity recorded.</td></tr>
         @endforelse
      </tbody>
   </table>
</div>

<div class="mt-3">{{ $logs->links() }}</div>
@endsection
