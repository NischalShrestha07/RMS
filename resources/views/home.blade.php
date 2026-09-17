<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="{{ url('') }}/">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Sarab">
      <meta name="description" content="Sarab - Fast Food & Restaurant HTML Template">
      <title>Sarab - Fast Food & Restaurant HTML Template</title>
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet"/>
      <!-- Bootstrap 5.3 -->
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <!-- AOS Animate on Scroll -->
      <link href="css/aos.css" rel="stylesheet"/>
      <!-- Swiper -->
      <link href="css/swiper-bundle.min.css" rel="stylesheet"/>
      <!-- all min css -->
      <link rel="stylesheet" href="css/all.min.css"/>
      <!-- magnific CSS -->
      <link rel="stylesheet" href="css/magnific-popup.css"/>
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css" />
   </head>
   <body>
      @include('partials.home.topbar')
      @include('partials.home.nav')
      @include('partials.home.search-overlay')
      @include('partials.home.hero')
      @include('partials.home.marquee')
      @include('partials.home.category')
      @include('partials.home.about')
      @include('partials.home.menu')
      @include('partials.home.special')
      @include('partials.home.gallery')
      @include('partials.home.history')
      @include('partials.home.chefs')
      @include('partials.home.hours')
      @include('partials.home.testimonials')
      @include('partials.home.reservation')
      @include('partials.home.blog')
      @include('partials.home.newsletter')
      @include('partials.home.contact')
      @include('partials.home.footer')
      <!-- Floating cart -->
      <a href="{{ route('cart.index') }}" class="cartfl" style="text-decoration:none;"><i class="fas fa-shopping-cart"></i><span>My Cart</span><div class="ccount" id="cartCount">{{ $cartCount }}</div></a>
      <!-- Back to top -->
      <button id="btt" onclick="window.scrollTo({top:0,behavior:'smooth'})"><i class="fas fa-chevron-up"></i></button>

	<!-- jQuery -->
      <script src="js/jquery-3.7.1.min.js"></script>
      <!-- Bootstrap 5 -->
      <script src="js/bootstrap.bundle.min.js"></script>
      <!-- AOS -->
      <script src="js/aos.js"></script>
      <!-- Swiper -->
      <script src="js/swiper-bundle.min.js"></script>
      <!-- CounterUp -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <!-- Main js -->
      <script src="js/main.js"></script>
   </body>
</html>
