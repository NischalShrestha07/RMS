<!-- ============================================================
   HISTORY – FIX 8 (alternating left/right text)
   ============================================================ -->
<section id="history">
   <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
         <span class="slbl">Our Journey</span>
         <h2 class="stitle">A History of <span>Restaurant</span></h2>
         <div class="sline"></div>
         <p class="sdesc mx-auto" style="max-width:480px;">From humble beginnings to the city's most beloved restaurant - every chapter written with passion.</p>
      </div>
      <div class="timeline" data-aos="fade-up">
         @foreach ($timelineEvents as $event)
         <div class="tli">
            <div class="tl-left">
               <div class="tlyear">{{ $event->year }}</div>
               <h5>{{ $event->title }}</h5>
               <p>{{ $event->description }}</p>
            </div>
            <div class="tl-center">
               <div class="tldot"></div>
            </div>
            <div class="tl-right">
               <div class="tlyear">{{ $event->year }}</div>
               <h5>{{ $event->title }}</h5>
               <p>{{ $event->description }}</p>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
