<section id="chefs">
   <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
         <span class="slbl">The Culinary Team</span>
         <h2 class="stitle">Meet Our Expert <span>Chefs</span></h2>
         <div class="sline"></div>
      </div>
      <div class="row g-4">
         @foreach ($chefs as $chef)
         <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
            <div class="chcard">
               <div class="chimg">
                  <img src="{{ asset($chef->image) }}" alt="{{ $chef->name }}"/>
                  <div class="chsoc">
                     <a href="{{ $chef->socials['instagram'] ?? '#' }}"><i class="fab fa-instagram"></i></a>
                     <a href="{{ $chef->socials['facebook'] ?? '#' }}"><i class="fab fa-facebook-f"></i></a>
                     <a href="{{ $chef->socials['twitter'] ?? '#' }}"><i class="fab fa-twitter"></i></a>
                  </div>
               </div>
               <div class="chbody">
                  <div class="chnm">{{ $chef->name }}</div>
                  <div class="chrole">{{ $chef->role }}</div>
                  <div class="chexp">{{ $chef->years_experience }} years experience</div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
