<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="{{ url('') }}/">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title', 'Admin - Sarab')</title>
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <link rel="stylesheet" href="css/all.min.css"/>
      <link rel="stylesheet" href="css/style.css"/>
      <style>
         body { background: var(--light); font-family: 'Poppins', sans-serif; }
         .admin-shell { display: flex; min-height: 100vh; }
         .admin-sidebar {
            width: 250px; flex-shrink: 0; background: var(--dark); color: #fff;
            min-height: 100vh; position: sticky; top: 0; align-self: flex-start;
         }
         .admin-sidebar .brand {
            font-family: 'Playfair Display', serif; font-weight: 900; font-size: 1.4rem;
            padding: 24px 20px; border-bottom: 1px solid rgba(255,255,255,.08);
         }
         .admin-sidebar .brand span { color: var(--primary); }
         .admin-nav { padding: 16px 0; }
         .admin-nav .nav-section {
            font-size: .72rem; text-transform: uppercase; letter-spacing: .06em; color: rgba(255,255,255,.4);
            padding: 14px 20px 6px;
         }
         .admin-nav a {
            display: block; padding: 10px 20px; color: rgba(255,255,255,.8); text-decoration: none; font-size: .92rem;
            border-left: 3px solid transparent;
         }
         .admin-nav a:hover { background: rgba(255,255,255,.06); color: #fff; }
         .admin-nav a.active { background: rgba(232,40,26,.15); border-left-color: var(--primary); color: #fff; }
         .admin-nav .nav-disabled { display: block; padding: 10px 20px; color: rgba(255,255,255,.3); font-size: .92rem; cursor: default; }
         .admin-main { flex: 1; min-width: 0; }
         .admin-topbar {
            background: #fff; border-bottom: 1px solid #eee; padding: 16px 30px;
            display: flex; align-items: center; justify-content: space-between;
         }
         .admin-content { padding: 30px; }
         .admin-card {
            background: #fff; border-radius: 12px; padding: 24px; box-shadow: var(--shadow);
         }
         .widget-value { font-family: 'Playfair Display', serif; font-weight: 900; font-size: 2rem; color: var(--dark); }
         .widget-label { font-size: .82rem; color: #888; text-transform: uppercase; letter-spacing: .04em; }
      </style>
      @stack('styles')
   </head>
   <body>
      @php
         $adminNav = [
            'Overview' => [
               ['label' => 'Dashboard', 'route' => 'admin.dashboard'],
            ],
            'Content' => [
               ['label' => 'Categories', 'route' => 'admin.categories.index'],
               ['label' => 'Menu Items', 'route' => 'admin.menu-items.index'],
               ['label' => 'Chefs', 'route' => 'admin.chefs.index'],
               ['label' => 'Gallery', 'route' => 'admin.gallery.index'],
               ['label' => 'Testimonials', 'route' => 'admin.testimonials.index'],
               ['label' => 'Blog Posts', 'route' => 'admin.blog-posts.index'],
               ['label' => 'Special Offers', 'route' => 'admin.special-offers.index'],
               ['label' => 'Business Hours', 'route' => 'admin.business-hours.index'],
               ['label' => 'Site Settings', 'route' => 'admin.site-settings.index'],
            ],
            'Operations' => [
               ['label' => 'Orders', 'route' => 'admin.orders.index'],
               ['label' => 'Reservations', 'route' => 'admin.reservations.index'],
               ['label' => 'Messages', 'route' => 'admin.contact-messages.index'],
               ['label' => 'Newsletter', 'route' => 'admin.newsletter-subscribers.index'],
               ['label' => 'Users', 'route' => 'admin.users.index'],
            ],
         ];
      @endphp
      <div class="admin-shell">
         <aside class="admin-sidebar">
            <div class="brand">Sarab<span>Admin</span></div>
            <nav class="admin-nav">
               @foreach ($adminNav as $section => $items)
                  <div class="nav-section">{{ $section }}</div>
                  @foreach ($items as $item)
                     @if (Route::has($item['route']))
                        <a href="{{ route($item['route']) }}" class="{{ request()->routeIs($item['route'].'*') ? 'active' : '' }}">{{ $item['label'] }}</a>
                     @else
                        <span class="nav-disabled">{{ $item['label'] }}</span>
                     @endif
                  @endforeach
               @endforeach
            </nav>
         </aside>
         <div class="admin-main">
            <div class="admin-topbar">
               <div style="font-weight:600;">@yield('title', 'Dashboard')</div>
               <div class="d-flex align-items-center gap-3">
                  <span style="font-size:.88rem;color:#666;">{{ auth()->user()->name }}</span>
                  <a href="{{ route('home') }}" target="_blank" style="font-size:.85rem;color:var(--primary);text-decoration:none;"><i class="fas fa-external-link-alt me-1"></i>View Site</a>
                  <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <button type="submit" class="btn btn-sm btn-outline-secondary">Log Out</button>
                  </form>
               </div>
            </div>
            <div class="admin-content">
               @if (session('status'))
                  <div class="alert alert-success">{{ session('status') }}</div>
               @endif
               @yield('content')
            </div>
         </div>
      </div>
      <script src="js/jquery-3.7.1.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      @stack('scripts')
   </body>
</html>
