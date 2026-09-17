<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="{{ url('') }}/">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title', 'Sarab - Fast Food & Restaurant')</title>
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet"/>
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <link rel="stylesheet" href="css/all.min.css"/>
      <link rel="stylesheet" href="css/style.css"/>
      <style>
         .simplepage { padding: 60px 0 80px; min-height: 60vh; }
         .simplepage .fcard { position: static; display: block; }
         @media (max-width: 767px) {
            .simplepage { padding: 30px 0 50px; }
         }
         @media (max-width: 576px) {
            .simplepage [data-cart-item] { flex-wrap: wrap; }
            .simplepage [data-cart-item] .mprice { min-width: auto; width: 100%; text-align: left; margin-top: 4px; }
         }

         .simplepage .order-track { display: flex; justify-content: space-between; align-items: flex-start; position: relative; margin: 4px 0 28px; }
         .simplepage .order-track::before { content: ''; position: absolute; top: 17px; left: 0; right: 0; height: 2px; background: #eee; z-index: 0; }
         .simplepage .order-track-step { flex: 1; text-align: center; position: relative; z-index: 1; }
         .simplepage .order-track-dot { width: 34px; height: 34px; line-height: 34px; border-radius: 50%; background: #eee; color: #aaa; margin: 0 auto 8px; font-size: .8rem; }
         .simplepage .order-track-step.done .order-track-dot { background: var(--green); color: #fff; }
         .simplepage .order-track-step.active .order-track-dot { background: var(--primary); color: #fff; box-shadow: 0 0 0 4px rgba(232,40,26,.15); }
         .simplepage .order-track-label { font-size: .72rem; color: #888; }
         .simplepage .order-track-step.done .order-track-label,
         .simplepage .order-track-step.active .order-track-label { color: #222; font-weight: 600; }
         .simplepage .order-track-cancelled { background: rgba(220,53,69,.08); color: #dc3545; padding: 12px 16px; border-radius: 10px; font-size: .9rem; margin-bottom: 20px; }
         .simplepage .btn-whatsapp { background: #25D366; color: #fff; border: none; border-radius: 50px; padding: 14px 32px; font-weight: 600; font-size: .93rem; box-shadow: 0 8px 24px rgba(37,211,102,.35); transition: .3s; display: inline-flex; align-items: center; gap: 9px; font-family: 'Poppins', sans-serif; text-decoration: none; }
         .simplepage .btn-whatsapp:hover { transform: translateY(-3px); box-shadow: 0 14px 34px rgba(37,211,102,.45); color: #fff; }
         @media (max-width: 576px) {
            .simplepage .order-track { flex-direction: column; align-items: flex-start; gap: 14px; }
            .simplepage .order-track::before { display: none; }
            .simplepage .order-track-step { display: flex; align-items: center; gap: 10px; text-align: left; }
            .simplepage .order-track-dot { margin: 0; flex-shrink: 0; }
         }
      </style>
   </head>
   <body>
      @include('partials.home.topbar')
      @include('partials.home.nav')

      <div class="simplepage">
         <div class="container">
            @yield('content')
         </div>
      </div>

      @include('partials.home.footer')

      <button id="btt" onclick="window.scrollTo({top:0,behavior:'smooth'})" class="show"><i class="fas fa-chevron-up"></i></button>

      <script src="js/jquery-3.7.1.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      @yield('scripts')
   </body>
</html>
