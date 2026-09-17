@if ($specialOffer)
<section id="special">
   <div class="spbg"></div>
   <div class="container" style="position:relative;z-index:2;">
      <div class="row align-items-center g-5">
         <div class="col-lg-6" data-aos="fade-right">
            <div class="sptag"><i class="fas fa-bolt me-1"></i>Limited Time Offer</div>
            <h2 class="sptitle">Get 30% Off<br/>Our Signature<br/><span>Burger</span> Meal</h2>
            <p class="spdesc">{{ $specialOffer->description }}</p>
            <div class="cdwrap">
               <div class="cditem"><span class="cdnum" id="cdH">00</span><span class="cdlbl">Hours</span></div>
               <div class="cditem"><span class="cdnum" id="cdM">00</span><span class="cdlbl">Minutes</span></div>
               <div class="cditem"><span class="cdnum" id="cdS">00</span><span class="cdlbl">Seconds</span></div>
            </div>
            <a href="#menu" class="btn-red"><i class="fas fa-shopping-cart"></i>Grab the Deal</a>
         </div>
         <div class="col-lg-6" data-aos="fade-left">
            <div class="spimgw">
               <div class="spglow"></div>
               <div class="sppbdg"><span class="old">${{ number_format($specialOffer->old_price, 2) }}</span><span class="np">${{ number_format($specialOffer->new_price, 2) }}</span></div>
               <img src="{{ asset($specialOffer->image) }}" alt="Special Offer"/>
            </div>
         </div>
      </div>
   </div>
</section>
<script>window.SARAB_OFFER_ENDS_AT = "{{ $specialOffer->ends_at->toIso8601String() }}";</script>
@endif
