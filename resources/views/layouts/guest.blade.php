<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Sarab') }}</title>
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet"/>
      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>
      <link rel="stylesheet" href="{{ asset('css/all.min.css') }}"/>
      <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
      <style>
         body.authbody { background: var(--dark, #1b1b1f); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px; }
         .authbox { width: 100%; max-width: 440px; }
         .authbox .fcard { padding: 40px; }
      </style>
   </head>
   <body class="authbody">
      <div class="authbox">
         <div class="text-center mb-4">
            <a href="{{ url('/') }}" class="text-decoration-none">
               <div class="blogo justify-content-center" style="display:inline-flex;">
                  <div class="bico"><i class="fas fa-utensils"></i></div>
                  <div>
                     <div class="bname" style="color:#fff;">Sar<span>ab</span></div>
                  </div>
               </div>
            </a>
         </div>
         <div class="fcard">
            {{ $slot }}
         </div>
      </div>
   </body>
</html>
