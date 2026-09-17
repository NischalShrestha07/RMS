<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="{{ url('') }}/">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Server Error - Sarab</title>
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <link rel="stylesheet" href="css/all.min.css"/>
      <link rel="stylesheet" href="css/style.css"/>
   </head>
   <body>
      <div class="d-flex align-items-center justify-content-center text-center" style="min-height:100vh;padding:24px;">
         <div>
            <span class="slbl">500 Error</span>
            <h2 class="stitle">Something <span>Went Wrong</span></h2>
            <div class="sline mx-auto"></div>
            <p class="text-muted mt-4 mb-4">Sorry, an unexpected error occurred on our end. Please try again shortly.</p>
            <a href="{{ url('/') }}" class="btn btn-red">Back to Home</a>
         </div>
      </div>
   </body>
</html>
