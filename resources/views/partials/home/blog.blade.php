<section id="blog">
   <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
         <span class="slbl">News &amp; Updates</span>
         <h2 class="stitle">Our Latest <span>Blog</span> Posts</h2>
         <div class="sline"></div>
      </div>
      <div class="row g-4">
         @foreach ($blogPosts as $post)
         <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
            <div class="blcard">
               <div class="blimg">
                  <img src="{{ asset($post->image) }}" alt="{{ $post->title }}"/>
                  <div class="bldatebdg"><span class="bd">{{ $post->published_at->format('d') }}</span><span class="bm">{{ $post->published_at->format('M') }}</span></div>
               </div>
               <div class="blbody">
                  <div class="bltag">{{ $post->tag }}</div>
                  <div class="bltit"><a href="#">{{ $post->title }}</a></div>
                  <div class="blmeta"><span><i class="fas fa-user"></i>{{ $post->author }}</span><span><i class="fas fa-comment"></i>{{ $post->comments_count }} Comments</span></div>
                  <a href="#" class="blmore">Read More <i class="fas fa-arrow-right"></i></a>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
