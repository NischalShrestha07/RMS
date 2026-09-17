<footer>
   <div class="container">
      <div class="row g-5">
         <div class="col-lg-4">
            <div class="fnm">Sar<span>ab</span></div>
            <p class="fdesc">{{ $settings['footer_about'] }}</p>
            <div class="fsoc">
               <a href="{{ $settings['social_facebook'] }}"><i class="fab fa-facebook-f"></i></a>
               <a href="{{ $settings['social_instagram'] }}"><i class="fab fa-instagram"></i></a>
               <a href="{{ $settings['social_twitter'] }}"><i class="fab fa-twitter"></i></a>
               <a href="{{ $settings['social_youtube'] }}"><i class="fab fa-youtube"></i></a>
               <a href="{{ $settings['social_tiktok'] }}"><i class="fab fa-tiktok"></i></a>
            </div>
         </div>
         <div class="col-sm-6 col-lg-2">
            <div class="ftit">Quick Links</div>
            <ul class="flinks ps-0">
               <li><a href="#hero"><i class="fas fa-chevron-right"></i>Home</a></li>
               <li><a href="#about"><i class="fas fa-chevron-right"></i>About Us</a></li>
               <li><a href="#menu"><i class="fas fa-chevron-right"></i>Our Menu</a></li>
               <li><a href="#reservation"><i class="fas fa-chevron-right"></i>Reservation</a></li>
               <li><a href="#blog"><i class="fas fa-chevron-right"></i>Blog</a></li>
               <li><a href="#contact-section"><i class="fas fa-chevron-right"></i>Contact</a></li>
            </ul>
         </div>
         <div class="col-sm-6 col-lg-2">
            <div class="ftit">Our Menu</div>
            <ul class="flinks ps-0">
               <li><a href="#menu"><i class="fas fa-chevron-right"></i>Burgers</a></li>
               <li><a href="#menu"><i class="fas fa-chevron-right"></i>Pizza</a></li>
               <li><a href="#menu"><i class="fas fa-chevron-right"></i>Fried Chicken</a></li>
               <li><a href="#menu"><i class="fas fa-chevron-right"></i>Wraps &amp; Rolls</a></li>
               <li><a href="#menu"><i class="fas fa-chevron-right"></i>Pasta</a></li>
               <li><a href="#menu"><i class="fas fa-chevron-right"></i>Desserts</a></li>
            </ul>
         </div>
         <div class="col-lg-4">
            <div class="ftit">Get In Touch</div>
            <div class="fci">
               <div class="fciico"><i class="fas fa-map-marker-alt"></i></div>
               <div class="fciinfo"><strong>Address</strong>{{ $settings['address_full'] }}</div>
            </div>
            <div class="fci">
               <div class="fciico"><i class="fas fa-phone-alt"></i></div>
               <div class="fciinfo"><strong>Phone</strong>{{ $settings['phone'] }}</div>
            </div>
            <div class="fci">
               <div class="fciico"><i class="fas fa-envelope"></i></div>
               <div class="fciinfo"><strong>Email</strong>{{ $settings['email'] }}</div>
            </div>
            <div class="fci">
               <div class="fciico"><i class="fas fa-clock"></i></div>
               <div class="fciinfo"><strong>Hours</strong>Wed - Sun: 09 AM - 11 PM</div>
            </div>
         </div>
      </div>
   </div>
   <div class="fbot">
      <div class="container">
         <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <p>&copy {{ $settings['copyright_year'] }} <span>Sarab Restaurant</span>. All Rights Reserved by <a target="_blank" class="mx-0 fw-bold text-success" href="https://bestwpware.com/">Bestwpware</a>. Made with <span><i class="fas fa-heart"></i></span>  <br>Distributed by <a target="_blank" class="mx-0 fw-bold text-success" href="https://themewagon.com">ThemeWagon</a></p>
            <div><a href="#">Privacy Policy</a><a href="#">Terms</a><a href="#">Cookies</a></div>
         </div>
      </div>
   </div>
</footer>
