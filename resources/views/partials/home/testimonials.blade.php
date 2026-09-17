<section id="testimonials">
   <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
         <span class="slbl">What People Say</span>
         <h2 class="stitle">Our Customers <span>Feedback</span></h2>
         <div class="sline"></div>
      </div>
      <div class="swiper tesSwiper" data-aos="fade-up">
         <div class="swiper-wrapper">
            @foreach ($testimonials as $testimonial)
            <div class="swiper-slide">
               <div class="tescard">
                  <div class="tesq">"</div>
                  <div class="tess">
                     @for ($i = 1; $i <= 5; $i++)
                        <i class="fa-star {{ $i <= $testimonial->rating ? 'fas' : 'far' }}"></i>
                     @endfor
                  </div>
                  <p class="testxt">{{ $testimonial->message }}</p>
                  <div class="tesauth">
                     <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}"/>
                     <div>
                        <div class="tesnm">{{ $testimonial->name }}</div>
                        <div class="tesrl">{{ $testimonial->role }}</div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
         <div class="swiper-pagination mt-4" style="position:static;"></div>
      </div>
   </div>
</section>
