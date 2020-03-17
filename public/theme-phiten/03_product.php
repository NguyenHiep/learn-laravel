<?php include 'include/index-top.php';?>


<div class="slide-category">
	<div class="owl-carousel s-dots">
      <?php
      for($i=1;$i<=5;$i++){ ?>					

			<div class="item <?php if($i==1) echo 'active'; ?>">
				<div class="img "><img class="owl-lazy"   data-src="assets/images/slide-category.jpg"  alt="" /> </div>

			</div>

      <?php
      } ?>					
	</div>
</div>




<main id="main">
	<div class="container">
		<div class="row end">
			<div class="col-lg-9">


				<div class="topresults clearfix">
					<div class="results">
						Showing <span class="cl1 b">25</span> Results
					</div>
					<div class="orderby">
						<select class="select" name="" id="">
							<option value="Newest">Newest</option>
						</select>						
					</div>
				</div>

				<div class="mainproduct lists-1 lists-1-hover">
				    <div class="row grid-space-0">
				      <?php
				      for($i=1;$i<=9;$i++){ ?>
				        <div class="col-sm-6 col-md-4">
				        	<?php include '_module/product.php';?>
				        </div>
				      <?php
				      } ?>
				    </div>

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
			</div>
			<div class="col-lg-3">
				<?php include '_module/sidebar.php';?>
			</div>
		</div>
	</div>
</main>

    <script type="text/javascript" >
        
    (function($){
        $(document).ready(function(){
        var $window = $(window);

        if ($(window).width() >= 768) {
            $('.equal_1,.equal_2,.equal_3').equal2(0);   
            $('.equal_4,.equal_5,.equal_6').equal2(0);   
            $('.equal_7,.equal_8,.equal_9').equal2(0);   
            $('.equal_10,.equal_11,.equal_12').equal2(0);
        }



        if ($(window).width() > 575 & $(window).width()< 768) {
            $('.equal_1,.equal_2').equal2(0);   
            $('.equal_3,.equal_4').equal2(0);   
            $('.equal_5,.equal_6').equal2(0);   
            $('.equal_7,.equal_8').equal2(0);   
            $('.equal_9,.equal_10').equal2(0);
            $('.equal_11,.equal_12').equal2(0);
        }


        }); 

    })(jQuery); 

    jQuery.fn.extend({
        equal2: function(padding) {
            var tempHeight = 0;
            var here = this;
            here.each(function(){
                tempHeight = tempHeight > this.offsetHeight ? tempHeight : this.offsetHeight;    //kiem chieu cao lon nhat
            }); 
            here.css("height", tempHeight + padding + "px");
        },
    });

    </script>

<?php include 'include/index-bottom.php';?>

