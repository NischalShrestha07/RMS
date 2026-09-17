<section id="hero">
   <div class="hs hs1"></div>
   <div class="hs hs2"></div>
   <div class="hbgtxt">FOOD</div>
   <div class="container">
      <div class="row align-items-center g-5" style="min-height:88vh;">
         <div class="col-lg-6">
            <div class="hbadge">
               <div class="hbi"><i class="fas fa-star"></i></div>
               <span>{{ $settings['hero_badge'] }}</span>
            </div>
            <h1 class="htitle">{!! $settings['hero_title'] !!}</h1>
            <p class="hdesc">{{ $settings['hero_description'] }}</p>
            <div class="d-flex flex-wrap gap-3 mb-2">
               <a href="#menu" class="btn-red"><i class="fas fa-utensils"></i>Explore Menu</a>
               <!-- FIX 2: Magnific popup video trigger -->
               <a href="{{ $settings['hero_video_url'] }}" class="magnific_popup btn-play popup-youtube">
                  <div class="pico"><i class="fas fa-play"></i></div>
                  <span>Watch Our Story</span>
               </a>
            </div>
            <div class="hstats d-flex gap-3 flex-wrap mt-4">
               <div class="hstat"><span class="snum">{{ $settings['stat_happy_customers'] }}<em>+</em></span><small>Happy Customers</small></div>
               <div class="sdiv"></div>
               <div class="hstat"><span class="snum">{{ $settings['stat_menu_items'] }}<em>+</em></span><small>Menu Items</small></div>
               <div class="sdiv"></div>
               <div class="hstat"><span class="snum">{{ $settings['stat_expert_chefs'] }}<em>+</em></span><small>Expert Chefs</small></div>
               <div class="sdiv"></div>
               <div class="hstat"><span class="snum">{{ $settings['stat_experience_years'] }}<em>yr</em></span><small>Experience</small></div>
            </div>
         </div>
         <div class="col-lg-6">
            <div style="position:relative;text-align:center;">
               <div class="hcircle">
                  <img src="{{ asset('img/banner-img.jpg') }}" alt="Burger"/>
               </div>
               <div class="fcard fc1">
                  <div class="fcoi r"><i class="fas fa-fire"></i></div>
                  <div><span class="fcnum">Hot Deal</span><span class="fcsm">30% off today</span></div>
               </div>
               <div class="fcard fc2">
                  <div class="fcoi y"><i class="fas fa-star"></i></div>
                  <div><span class="fcnum">4.9/5</span><span class="fcsm">2k+ reviews</span></div>
               </div>
               <div class="fcard fc3">
                  <div class="fcoi g"><i class="fas fa-clock"></i></div>
                  <div><span class="fcnum">20 min</span><span class="fcsm">Fast delivery</span></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
