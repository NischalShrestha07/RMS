<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="{{ url('') }}/">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title', 'Staff - Sarab')</title>
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <link rel="stylesheet" href="css/all.min.css"/>
      <link rel="stylesheet" href="css/style.css"/>
      <style>
         body { background: var(--light); font-family: 'Poppins', sans-serif; }
         .staff-topbar {
            background: var(--dark); color: #fff; padding: 16px 30px;
            display: flex; align-items: center; justify-content: space-between;
         }
         .staff-topbar .brand { font-family: 'Playfair Display', serif; font-weight: 900; font-size: 1.3rem; }
         .staff-topbar .brand span { color: var(--primary); }
         .staff-content { padding: 30px; max-width: 1100px; margin: 0 auto; }
         .admin-card { background: #fff; border-radius: 12px; padding: 24px; box-shadow: var(--shadow); }
         @media (max-width: 600px) {
            .staff-topbar { padding: 14px 16px; flex-wrap: wrap; gap: 8px; }
            .staff-content { padding: 16px; }
            .staff-content .d-flex.justify-content-between {
               flex-direction: column; align-items: stretch !important; gap: 10px;
            }
            .table { display: block; overflow-x: auto; white-space: nowrap; }
         }
      </style>
      @stack('styles')
   </head>
   <body>
      <div class="staff-topbar">
         <div class="brand">Sarab<span>{{ $staffPanelName ?? 'Staff' }}</span></div>
         <div class="d-flex align-items-center gap-3">
            <span style="font-size:.88rem;">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
               @csrf
               <button type="submit" class="btn btn-sm btn-outline-light">Log Out</button>
            </form>
         </div>
      </div>
      <div class="staff-content">
         @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
         @endif
         @yield('content')
      </div>
      <script src="js/jquery-3.7.1.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      @stack('scripts')
   </body>
</html>
