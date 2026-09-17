<section id="menu">
   <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
         <span class="slbl">What's Cooking</span>
         <h2 class="stitle">Our Delicious <span>Menu</span></h2>
         <div class="sline"></div>
      </div>
      <!-- FIX 3 – filter buttons -->
      <div class="text-center mb-4" data-aos="fade-up">
         <button class="filtbtn active" data-f="all">All</button>
         @foreach ($allCategories as $category)
         <button class="filtbtn" data-f="{{ $category->slug }}">{{ $category->short_name }}</button>
         @endforeach
      </div>
      <div class="row g-4" id="mgrid">
         @foreach ($menuItems as $item)
         <div class="col-sm-6 col-lg-4 mwrap" data-c="{{ $item->category->slug }}" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 80 }}">
            <div class="mcard"
               data-id="{{ $item->id }}"
               data-img="{{ asset($item->image) }}"
               data-title="{{ $item->title }}"
               data-cat="{{ $item->category->short_name }}"
               data-price="${{ number_format($item->price, 2) }}" data-old="{{ $item->old_price ? '$'.number_format($item->old_price, 2) : '' }}"
               data-rating="{{ $item->rating }}" data-reviews="{{ $item->reviews_count }}"
               data-cal="{{ $item->calories }}" data-time="{{ $item->prep_time_minutes }}"
               data-desc="{{ $item->description }}"
               data-tags="{{ implode(',', $item->tags ?? []) }}">
               <div class="mimg">
                  <img src="{{ asset($item->image) }}" alt="{{ $item->title }}"/>
                  @if ($item->badge_label)
                  <div class="mbdg{{ $item->badge_type ? ' '.$item->badge_type : '' }}"><i class="fas fa-star"></i> {{ $item->badge_label }}</div>
                  @endif
                  <div class="mhrt"><i class="far fa-heart"></i></div>
               </div>
               <div class="mbody">
                  <div class="mcat">{{ $item->category->short_name }}</div>
                  <div class="mtit">{{ $item->title }}</div>
                  <div class="mdesc">{{ $item->short_description }}</div>
                  <div class="mfoot">
                     <div>
                        <div class="mprice">${{ number_format($item->price, 2) }} @if ($item->old_price)<small>${{ number_format($item->old_price, 2) }}</small>@endif</div>
                        <div class="mstars"><i class="fas fa-star"></i> <span style="color:#bbb;font-size:.7rem;">({{ $item->reviews_count }})</span></div>
                     </div>
                     <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <!-- end #mgrid -->
      <div class="text-center mt-5"><a href="#" class="btn-red"><i class="fas fa-th-large"></i>View Full Menu</a></div>
   </div>
</section>

<!-- ============================================================
   FIX 4 – MENU DETAIL POPUP MODAL
   ============================================================ -->
<div id="menuPop">
   <div class="mpbox">
      <button class="mpclose" id="mpClose"><i class="fas fa-times"></i></button>
      <div class="mpimg"><img id="mpImg" src="" alt=""/></div>
      <div class="mpbody">
         <div id="mpCat"></div>
         <div id="mpTitle"></div>
         <div id="mpStars"></div>
         <div id="mpDesc"></div>
         <div id="mpPrice"></div>
         <div class="mpmeta" id="mpMeta"></div>
         <div class="mpqty">
            <button class="mpqbtn" id="mpMinus">-</button>
            <span class="mpqnum" id="mpQnum">1</span>
            <button class="mpqbtn" id="mpPlus">+</button>
            <span style="font-size:.82rem;color:#aaa;margin-left:9px;">portion</span>
         </div>
         <div class="mptags" id="mpTags"></div>
         <button class="mpaddcart" id="mpAddCart"><i class="fas fa-shopping-cart"></i>Add to Cart</button>
      </div>
   </div>
</div>
