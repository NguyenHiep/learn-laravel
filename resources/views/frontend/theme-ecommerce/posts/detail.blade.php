@extends('frontend.theme-ecommerce.template')

@section('title', 'Chào mừng bạn đến với CMS E-commerce laravel Nguyễn Hiệp')
@section('description', 'Cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo online, áo thun online, quần kaki online')

@section('content')
  <!-- Main Content - start -->
  <main>
    <section class="container">
      
      
      <ul class="b-crumbs">
        <li>
          <a href="index.html">
            Home
          </a>
        </li>
        <li>
          <a href="blog.html">
            Blog
          </a>
        </li>
        <li>
          <a href="blog.html">
            News
          </a>
        </li>
        <li>
          <span>Hic quod maxime deserunt</span>
        </li>
      </ul>
      <h1 class="main-ttl"><span>Hic quod maxime deserunt</span></h1>
      <!-- Blog Post - start -->
      <div class="post-wrap stylization">
        <img class="post-img" src="http://placehold.it/1140x580" alt="">
        <p>Pariatur, corrupti, officia, molestias consectetur nesciunt ratione nihil fugiat eveniet nisi quia reiciendis dolor soluta vero autem nemo reprehenderit mollitia deserunt iste quae necessitatibus dolores a atque iure ipsa voluptatum nobis saepe temporibus error corporis minus assumenda nam ullam praesentium harum enim tempora et excepturi.</p>
        <p>Quod soluta corrupti earum officia vel inventore vitae quidem, consequuntur odit impedit, eaque dolorem odio praesentium iusto amet voluptatum distinctio iste dicta maiores doloremque porro. Ipsa doloremque illum animi laborum quo in nemo delectus veritatis, amet numquam doloribus a iure sequi nobis vero facere necessitatibus ipsam</p>
        
        <!-- Slider -->
        <div class="flexslider post-slider" id="post-slider-car">
          <ul class="slides">
            <li>
              <a data-fancybox-group="fancy-img" class="fancy-img" href="img/post/post1.jpg"><img src="http://placehold.it/1140x450" alt=""></a>
            </li>
            <li>
              <a data-fancybox-group="fancy-img" class="fancy-img" href="img/post/post2.jpg"><img src="http://placehold.it/1140x450" alt=""></a>
            </li>
            <li>
              <a data-fancybox-group="fancy-img" class="fancy-img" href="img/post/post3.jpg"><img src="http://placehold.it/1140x450" alt=""></a>
            </li>
          </ul>
        </div>
        
        <p>Minima, earum fuga maiores unde quod quae aspernatur magnam quis adipisci ipsum maxime iusto quidem? Recusandae dolore ipsam eius alias quidem. Dignissimos, recusandae, saepe, omnis, non totam vero unde mollitia natus aliquam magni qui quibusdam incidunt ea nihil error facere ut libero blanditiis accusamus quasi facilis animi repellat consequuntur in sit rerum atque voluptatibus ipsa ullam voluptatum laborum praesentium nesciunt est iusto nulla earum ab tenetur!</p>
        
        <!-- Share Links -->
        <div class="post-share-wrap">
          <ul class="post-share">
            <li>
              <a onclick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[url]=http://allstore-html.real-web.pro','sharer', 'toolbar=0,status=0,width=620,height=280');" data-toggle="tooltip" title="Share on Facebook" href="javascript:">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li>
              <a onclick="popUp=window.open('http://twitter.com/home?status=Post with Shortcodes http://allstore-html.real-web.pro','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="Share on Twitter" href="javascript:;">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li>
              <a onclick="popUp=window.open('http://vk.com/share.php?url=http://allstore-html.real-web.pro','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="Share on VK" href="javascript:;">
                <i class="fa fa-vk"></i>
              </a>
            </li>
            <li>
              <a data-toggle="tooltip" title="Share on Pinterest" onclick="popUp=window.open('http://pinterest.com/pin/create/button/?url=http://allstore-html.real-web.pro&amp;description=AllStore HTML Template&amp;media=http://discover.real-web.pro/wp-content/uploads/2016/09/insect-1130497_1920.jpg','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                <i class="fa fa-pinterest"></i>
              </a>
            </li>
            <li>
              <a data-toggle="tooltip" title="Share on Google +1" href="javascript:;" onclick="popUp=window.open('https://plus.google.com/share?url=http://allstore-html.real-web.pro','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;">
                <i class="fa fa-google-plus"></i>
              </a>
            </li>
            <li>
              <a data-toggle="tooltip" title="Share on Linkedin" onclick="popUp=window.open('http://linkedin.com/shareArticle?mini=true&amp;url=http://allstore-html.real-web.pro&amp;title=AllStore HTML Template','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
            <li>
              <a data-toggle="tooltip" title="Share on Tumblr" onclick="popUp=window.open('http://www.tumblr.com/share/link?url=http://allstore-html.real-web.pro&amp;name=AllStore HTML Template&amp;description=Aliquam%2C+consequuntur+laboriosam+minima+neque+nesciunt+quod+repudiandae+rerum+sint.+Accusantium+adipisci+aliquid+architecto+blanditiis+dolorum+excepturi+harum+ipsa%2C+ipsam%2C...','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                <i class="fa fa-tumblr"></i>
              </a>
            </li>
          </ul>
          <ul class="post-info">
            <li><time datetime="2016-11-09 22:00:32">09 Nov, 2017</time></li>
            <li><a href="blog.html" class="blog-i-categ">News</a></li>
            <li>Comments: <a href="#">3</a></li>
          </ul>
        </div>
        
        <!-- Related Posts -->
        <div class="flexslider post-rel-wrap" id="post-rel-car">
          <ul class="slides">
            <li class="posts-i">
              <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/354x236)"></span></a>
              <time class="posts-i-date" datetime="2017-01-01 12:19:46"><span>09</span> Feb</time>
              <div class="posts-i-info">
                <a class="posts-i-ctg" href="blog.html">Articles</a>
                <h3 class="posts-i-ttl"><a href="post.html">Adipisci corporis velit</a></h3>
              </div>
            </li>
            <li class="posts-i">
              <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/360x203)"></span></a>
              <time class="posts-i-date" datetime="2017-01-01 12:19:46"><span>05</span> Jan</time>
              <div class="posts-i-info">
                <a class="posts-i-ctg" href="blog.html">Reviews</a>
                <h3 class="posts-i-ttl"><a href="post.html">Excepturi ducimus recusandae</a></h3>
              </div>
            </li>
            <li class="posts-i">
              <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/360x224)"></span></a>
              <time class="posts-i-date" datetime="2017-01-01 12:19:46"><span>17</span> Apr</time>
              <div class="posts-i-info">
                <a class="posts-i-ctg" href="blog.html">Reviews</a>
                <h3 class="posts-i-ttl"><a href="post.html">Consequuntur minus numquam</a></h3>
              </div>
            </li>
            <li class="posts-i">
              <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/314x236)"></span></a>
              <time class="posts-i-date" datetime="2017-01-01 12:19:46"><span>21</span> May</time>
              <div class="posts-i-info">
                <a class="posts-i-ctg" href="blog.html">Articles</a>
                <h3 class="posts-i-ttl"><a href="post.html">Non ex sapiente excepturi</a></h3>
              </div>
            </li>
            <li class="posts-i">
              <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/318x236)"></span></a>
              <time class="posts-i-date" datetime="2017-01-01 12:19:46"><span>24</span> Jan</time>
              <div class="posts-i-info">
                <a class="posts-i-ctg" href="blog.html">Articles</a>
                <h3 class="posts-i-ttl"><a href="post.html">Veritatis officiis</a></h3>
              </div>
            </li>
            <li class="posts-i">
              <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/354x236)"></span></a>
              <time class="posts-i-date" datetime="2017-01-01 12:19:46"><span>08</span> Sep</time>
              <div class="posts-i-info">
                <a class="posts-i-ctg" href="blog.html">Reviews</a>
                <h3 class="posts-i-ttl"><a href="post.html">Ratione magni laudantium</a></h3>
              </div>
            </li>
          </ul>
        </div>
      
      </div>
      <!-- Blog Post - end -->
      
      <!-- Related Products - start -->
      <div class="prod-related">
        <h2><span>Related products</span></h2>
        <div class="prod-related-car" id="prod-related-car">
          <ul class="slides">
            <li class="prod-rel-wrap">
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x311" alt="Adipisci aperiam commodi">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Adipisci aperiam commodi</a></h3>
                  <p class="prod-rel-price">
                    <b>$59</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x366" alt="Nulla numquam obcaecati">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Nulla numquam obcaecati</a></h3>
                  <p class="prod-rel-price">
                    <b>$48</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/370x300" alt="Dignissimos eaque earum">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Dignissimos eaque earum</a></h3>
                  <p class="prod-rel-price">
                    <b>$37</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x345" alt="Porro quae quasi">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Porro quae quasi</a></h3>
                  <p class="prod-rel-price">
                    <b>$85</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
            
            
            <li class="prod-rel-wrap">
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/378x300" alt="Sunt temporibus velit">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Sunt temporibus velit</a></h3>
                  <p class="prod-rel-price">
                    <b>$115</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x394" alt="Harum illum incidunt">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Harum illum incidunt</a></h3>
                  <p class="prod-rel-price">
                    <b>$130</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x303" alt="Reprehenderit rerum">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Reprehenderit rerum</a></h3>
                  <p class="prod-rel-price">
                    <b>$210</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x588" alt="Quae quasi adipisci alias">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Quae quasi adipisci alias</a></h3>
                  <p class="prod-rel-price">
                    <b>$85</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
            
            
            <li class="prod-rel-wrap">
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x416" alt="Maxime molestias necessitatibus nobis">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Maxime molestias necessitatibus nobis</a></h3>
                  <p class="prod-rel-price">
                    <b>$95</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
              
              
              
              <div class="prod-rel">
                <a href="product.html" class="prod-rel-img">
                  <img src="http://placehold.it/300x480" alt="Facilis illum">
                </a>
                <div class="prod-rel-cont">
                  <h3><a href="product.html">Facilis illum</a></h3>
                  <p class="prod-rel-price">
                    <b>$150</b>
                  </p>
                  <div class="prod-rel-actions">
                    <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                    <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                    <p class="prod-i-addwrap">
                      <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                    </p>
                  </div>
                </div>
              </div>
            
            </li>
          </ul>
        </div>
      </div>
      <!-- Related Products - end -->
      
      <!-- Comments - start -->
      <ul class="reviews-list">
        <li class="reviews-i existimg">
          <div class="reviews-i-img">
            <img src="http://placehold.it/120x120" alt="Jeni Margie">
            <div class="reviews-i-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <time datetime="2017-12-21 12:19:46" class="reviews-i-date">21 May 2017</time>
          </div>
          <div class="reviews-i-cont">
            <p>Eveniet nobis minus possimus eius, doloribus ex similique debitis nihil at facere delectus unde, commodi, alias. <br>Eius facilis, dolore officia veritatis, doloribus voluptatem aliquid rem corporis quam officiis at dignissimos dolorum, velit assumenda facere necessitatibus doloremque quos. Laudantium velit architecto ipsum nulla</p>
            <span class="reviews-i-margin"></span>
            <h3 class="reviews-i-ttl">Jeni Margie</h3>
          </div>
        </li>
        <li class="reviews-i existimg">
          <div class="reviews-i-img">
            <img src="http://placehold.it/120x120" alt="Brigham Murphy">
            <div class="reviews-i-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
            <time datetime="2017-12-21 12:19:46" class="reviews-i-date">12 March 2017</time>
          </div>
          <div class="reviews-i-cont">
            <p>Ipsa doloremque illum animi laborum quo in nemo delectus veritatis, amet numquam doloribus a iure sequi nobis vero facere necessitatibus ipsam dolorem magnam? Tempora ea ratione vel nisi, qui perferendis nulla. <br>Minus sequi iste, nam nobis, excepturi nihil consequuntur reprehenderit ipsam, quam consequatur in. <br>Esse, doloremque consectetur veniam quo ut voluptas necessitatibus quae quis iusto quod optio eligendi distinctio dicta, nihil impedit officia aspernatur tenetur saepe expedita, odio vitae reprehenderit pariatur!</p>
            <span class="reviews-i-margin"></span>
            <h3 class="reviews-i-ttl">Brigham Murphy</h3>
          </div>
        </li>
        <li class="reviews-i existimg">
          <div class="reviews-i-img">
            <img src="http://placehold.it/120x120" alt="Barrie Roderick">
            <div class="reviews-i-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <time datetime="2017-12-21 12:19:46" class="reviews-i-date">07 June 2017</time>
          </div>
          <div class="reviews-i-cont">
            <p>Perferendis recusandae consequuntur quasi, non culpa. Minus porro officiis veniam facilis praesentium expedita doloribus, recusandae aut dolore autem, modi consequuntur rem perferendis dolores quisquam, sequi quas. <br>Iusto et, eius laboriosam beatae, cupiditate officiis! Iure iste, voluptate non accusamus quis, dolor quo quam dolore pariatur enim molestias rerum minima veritatis. <br>Officiis nihil culpa architecto repudiandae magni quo, ipsa nam omnis, laborum minus debitis impedit, alias eum non magnam veritatis animi.</p>
            <span class="reviews-i-margin"></span>
            <h3 class="reviews-i-ttl">Barrie Roderick</h3>
          </div>
        </li>
        <li class="reviews-i existimg">
          <div class="reviews-i-img">
            <img src="http://placehold.it/120x120" alt="Edweena Chelsea">
            <div class="reviews-i-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <time datetime="2017-01-01 12:19:46" class="reviews-i-date">18 March 2017</time>
          </div>
          <div class="reviews-i-cont">
            <p>Corrupti velit, vero esse, aperiam error magni illum quos, accusantium debitis et possimus recusandae tempora ad itaque dolorem veniam non voluptatem impedit iste? Dicta doloremque hic porro aspernatur. Dolores eligendi similique, cumque, eius veritatis recusandae quos dignissimos libero molestias perspiciatis.</p>
            <span class="reviews-i-margin"></span>
            <h3 class="reviews-i-ttl">Edweena Chelsea</h3>
          </div>
        </li>
      </ul>
      <!-- Comments - end -->
      
      <!-- Comment Form - start -->
      <div class="prod-comment-form post-form">
        <h3>Add your comment</h3>
        <form method="POST" action="#">
          <input type="text" placeholder="Name">
          <input type="text" placeholder="E-mail">
          <textarea placeholder="Your comment"></textarea>
          <div class="prod-comment-submit">
            <input type="submit" value="Submit">
            <div class="prod-rating">
              <i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o" title="4"></i><i class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i class="fa fa-star-o" title="1"></i>
            </div>
          </div>
        </form>
      </div>
      <!-- Comment Form - end -->
    
    </section>
  </main>
  <!-- Main Content - end -->
@endsection