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
         .simplepage { padding: 160px 0 100px; min-height: 60vh; }
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
