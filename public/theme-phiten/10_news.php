<?php include 'include/index-top.php';?>

<?php include '_module/breadcrumb.php';?>
<main id="main" class="page-footer-2 page-news">
	<div class="container">

		<div class="row grid-space-60 end">

			<div class="col-md-8 col-lg-9">

		        <ul class="list-news">
		          <?php for($i=1;$i<=4;$i++){?>
		          <li class="item">
		            <div class=" row grid-space-20">
		              <div class="col-sm-3">
		                <a href="11_news_detail.php" class="img tRes">
		                  <img class="lazy-hidden" data-lazy-type="image" data-lazy-src="assets/images/img-1.jpg"   alt="" /> 
		                </a>
		              </div>
		              <div class="col-sm-9">
		                <a href="11_news_detail.php" class="title h4">Cosmetic Surgery A Review Of Facial Surgery With Personal Experiences</a>
		                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		                <div class="date"><img src="assets/images/svg/time.svg"   alt="" />  2 hours ago</div>
		              </div>
		            </div>
		          </li>
		          <?php
		          } ?>
		        </ul>

					<div class="pages">
						<ul class="page-numbers pagination">
							<li><a class="prev page-numbers " href="javascript:void(0)"><i class="icon-arrow-1"></i></a></li>
							<li><a class="page-numbers" data-page="1" href="javascript:void(0)">1</a></li>
							<li class=" active"><span class="page-numbers current  active">2</span></li>
							<li><a class="page-numbers"  href="javascript:void(0)">3</a></li>
							<li><a class="page-numbers  next"  href="javascript:void(0)"><i class="icon-arrow-2"></i></a></li>
						</ul>
					</div>
				
			</div>
			<div class="col-md-4 col-lg-3">
				<?php include '_module/sidebar-news.php';?>
			</div>			
		</div>


	</div>
</main>

<?php include 'include/index-bottom-2.php';?>

