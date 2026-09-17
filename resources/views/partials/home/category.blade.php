<section id="category">
   <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
         <span class="slbl">What We Offer</span>
         <h2 class="stitle">Browse by <span>Category</span></h2>
         <div class="sline"></div>
         <p class="sdesc mx-auto" style="max-width:480px;">From sizzling burgers to exotic world cuisines - find your favourite in our menu</p>
      </div>
      <div class="row g-3 justify-content-center">
         <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="0">
            <div class="catcard active" data-filter="all">
               <img class="catimg" src="{{ asset('img/category/1.jpg') }}" alt=""/>
               <div class="catnm">All Items</div>
               <div class="catct">{{ $menuItems->count() }} items</div>
            </div>
         </div>
         @foreach ($categories as $category)
         <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 70 }}">
            <div class="catcard" data-filter="{{ $category->slug }}">
               <img class="catimg" src="{{ asset($category->image) }}" alt=""/>
               <div class="catnm">{{ $category->name }}</div>
               <div class="catct">{{ $category->item_count }} items</div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
