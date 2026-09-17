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
         .sidebar-toggle {
            display: none; background: none; border: none; font-size: 1.3rem; color: var(--dark);
            padding: 4px 8px; margin-right: 8px; cursor: pointer;
         }
         .sidebar-backdrop { display: none; }
         @media (max-width: 900px) {
            .admin-sidebar {
               position: fixed; left: 0; top: 0; z-index: 1050; height: 100vh;
               transform: translateX(-100%); transition: transform .25s ease; overflow-y: auto;
            }
            .admin-sidebar.open { transform: translateX(0); }
            .sidebar-toggle { display: inline-flex; }
            .sidebar-backdrop.open {
               display: block; position: fixed; inset: 0; background: rgba(0,0,0,.4); z-index: 1040;
            }
            .admin-topbar { padding: 14px 16px; flex-wrap: wrap; gap: 10px; }
            .admin-topbar > div:last-child { flex-wrap: wrap; gap: 10px !important; }
            .admin-content { padding: 16px; }
            .admin-content .d-flex.justify-content-between {
               flex-direction: column; align-items: stretch !important; gap: 10px;
            }
            .admin-content .btn { width: 100%; justify-content: center; }
            .table { display: block; overflow-x: auto; white-space: nowrap; }
         }
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
               ['label' => 'Gallery', 'route' => 'admin.gallery-items.index'],
               ['label' => 'Testimonials', 'route' => 'admin.testimonials.index'],
               ['label' => 'Blog Posts', 'route' => 'admin.blog-posts.index'],
               ['label' => 'Special Offers', 'route' => 'admin.special-offers.index'],
               ['label' => 'Business Hours', 'route' => 'admin.business-hours.index'],
               ['label' => 'Site Settings', 'route' => 'admin.site-settings.index'],
            ],
            'Operations' => [
               ['label' => 'Orders', 'route' => 'admin.orders.index'],
               ['label' => 'Reservations', 'route' => 'admin.reservations.index'],
               ['label' => 'Coupons', 'route' => 'admin.coupons.index'],
               ['label' => 'Reports', 'route' => 'admin.reports.index'],
               ['label' => 'Reviews', 'route' => 'admin.reviews.index'],
               ['label' => 'Activity Log', 'route' => 'admin.activity-logs.index'],
               ['label' => 'Messages', 'route' => 'admin.contact-messages.index'],
               ['label' => 'Newsletter', 'route' => 'admin.newsletter-subscribers.index'],
               ['label' => 'Users', 'route' => 'admin.users.index'],
            ],
         ];
      @endphp
      <div class="admin-shell">
         <div class="sidebar-backdrop" id="sidebarBackdrop"></div>
         <aside class="admin-sidebar" id="adminSidebar">
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
               <div class="d-flex align-items-center" style="font-weight:600;min-width:0;">
                  <button type="button" class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle menu"><i class="fas fa-bars"></i></button>
                  <span class="text-truncate">@yield('title', 'Dashboard')</span>
               </div>
               <div class="d-flex align-items-center gap-3">
                  <span style="font-size:.88rem;color:#666;">{{ auth()->user()->name }}</span>
                  @php $adminAlertsTotal = $adminAlerts['unreadMessages']['count'] + $adminAlerts['pendingReservations']['count'] + $adminAlerts['pendingOrders']['count']; @endphp
                  <div class="dropdown">
                     <button type="button" class="btn btn-sm btn-outline-secondary position-relative" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Alerts">
                        <i class="fas fa-bell"></i>
                        @if($adminAlertsTotal > 0)
                           <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:.6rem;">{{ $adminAlertsTotal }}</span>
                        @endif
                     </button>
                     <ul class="dropdown-menu dropdown-menu-end" style="min-width:280px;font-size:.85rem;">
                        <li><h6 class="dropdown-header" style="color:var(--primary);">Unread Messages ({{ $adminAlerts['unreadMessages']['count'] }})</h6></li>
                        @forelse($adminAlerts['unreadMessages']['items'] as $message)
                           <li><a class="dropdown-item text-truncate" href="{{ route('admin.contact-messages.index') }}">{{ $message->name }} — {{ $message->subject }}</a></li>
                        @empty
                           <li><span class="dropdown-item-text text-muted">No unread messages</span></li>
                        @endforelse
                        <li><hr class="dropdown-divider"></li>
                        <li><h6 class="dropdown-header" style="color:var(--primary);">Pending Reservations ({{ $adminAlerts['pendingReservations']['count'] }})</h6></li>
                        @forelse($adminAlerts['pendingReservations']['items'] as $reservation)
                           <li><a class="dropdown-item text-truncate" href="{{ route('admin.reservations.index', ['status' => 'pending']) }}">{{ $reservation->name }} — {{ $reservation->date }}</a></li>
                        @empty
                           <li><span class="dropdown-item-text text-muted">No pending reservations</span></li>
                        @endforelse
                        <li><hr class="dropdown-divider"></li>
                        <li><h6 class="dropdown-header" style="color:var(--primary);">Pending Orders ({{ $adminAlerts['pendingOrders']['count'] }})</h6></li>
                        @forelse($adminAlerts['pendingOrders']['items'] as $order)
                           <li><a class="dropdown-item text-truncate" href="{{ route('admin.orders.index', ['status' => 'pending']) }}">#{{ $order->order_number }} — {{ number_format($order->total, 2) }}</a></li>
                        @empty
                           <li><span class="dropdown-item-text text-muted">No pending orders</span></li>
                        @endforelse
                     </ul>
                  </div>
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
      <script>
         (function () {
            var sidebar = document.getElementById('adminSidebar');
            var backdrop = document.getElementById('sidebarBackdrop');
            var toggle = document.getElementById('sidebarToggle');
            function close() {
               sidebar.classList.remove('open');
               backdrop.classList.remove('open');
            }
            toggle.addEventListener('click', function () {
               sidebar.classList.toggle('open');
               backdrop.classList.toggle('open');
            });
            backdrop.addEventListener('click', close);
         })();
      </script>
      @stack('scripts')
   </body>
</html>
