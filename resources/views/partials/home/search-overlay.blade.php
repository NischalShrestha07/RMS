<div id="searchOv">
   <button class="sovclose" id="searchClose"><i class="fas fa-times"></i></button>
   <div class="sovbox">
      <h4>What are you craving today?</h4>
      <div class="sovinput">
         <input type="text" id="searchInput" placeholder="Search burgers, pizza, chicken..." autocomplete="off"/>
         <button><i class="fas fa-search"></i></button>
      </div>
      <!-- Categories inside search box -->
      <div class="sovcats">
         <div class="sovcat active" data-cat="all">
            <img src="{{ asset('img/menu/1.jpg') }}" alt=""/>All Items
         </div>
         @foreach ($allCategories as $category)
         <div class="sovcat" data-cat="{{ $category->slug }}">
            <img src="{{ asset($category->image) }}" alt=""/>{{ $category->name }}
         </div>
         @endforeach
      </div>
      <div class="sovtrend">
         <p><i class="fas fa-fire me-1" style="color:var(--secondary);"></i>Trending Searches</p>
         <span class="ttag">Smash Burger</span>
         <span class="ttag">Nashville Chicken</span>
         <span class="ttag">Truffle Pizza</span>
         <span class="ttag">Lava Cake</span>
         <span class="ttag">Loaded Fries</span>
         <span class="ttag">Mango Shake</span>
      </div>
   </div>
</div>
