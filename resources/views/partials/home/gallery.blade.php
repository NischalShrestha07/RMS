<!-- ============================================================
   GALLERY – FIX 7 (click opens detail popup)
   ============================================================ -->
<section id="gallery">
   <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
         <span class="slbl">Food Showcase</span>
         <h2 class="stitle">Let's See Our <span>Fast Food</span></h2>
         <div class="sline"></div>
      </div>
      <div class="ggrid" data-aos="fade-up">
         @foreach ($galleryItems as $item)
         <div class="gitem"
            data-gi="{{ $loop->index }}"
            data-gimg="{{ asset($item->image) }}"
            data-gtitle="{{ $item->title }}"
            data-gdesc="{{ $item->description }}">
            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}"/>
            <div class="gover"><span><i class="fas fa-expand-alt"></i> {{ $item->title }}</span></div>
         </div>
         @endforeach
      </div>
   </div>
</section>
<!-- FIX 7 – GALLERY POPUP -->
<div id="galPop">
   <div class="gpbox">
      <button class="gpclose" id="gpClose"><i class="fas fa-times"></i></button>
      <img id="gpImg" src="" alt=""/>
      <div class="gpcap">
         <h5 id="gpTitle"></h5>
         <p id="gpDesc"></p>
      </div>
      <div class="gpnav">
         <button id="gpPrev"><i class="fas fa-chevron-left me-1"></i>Prev</button>
         <button id="gpNext">Next <i class="fas fa-chevron-right ms-1"></i></button>
      </div>
   </div>
</div>
