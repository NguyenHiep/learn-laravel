<?php include 'include/index-top.php';?>

	<?php include '_module/breadcrumb.php';?>

	<main id="main" class="page-product-detail">
		<div class="container">
			<div class="row grid-space-80">
				<div class="col-lg-6">

	                <div class="wrap-syn-owl ">
	                    <div class="wrap-syn-1">
	                        <div class="syn-slider-1  owl-carousel  s-loop  "  >
	                            <?php
	                            for($i=0;$i<8;$i++) {
	                            ?>          
	                            <div class="item"> <div class="tRes_80"><img src="assets/images/img-2.jpg" alt=""></div></div> <!-- end item -->
	                            <?php
	                            } ?>
	                        </div>
	                    </div>                            
	                    <div class="wrap-syn-2">
	                        <div class="syn-slider-2  owl-carousel " data-res="4,3,3,3" data-margin="30,30,20,20" >
	                            <?php
	                            for($i=0;$i<8;$i++) {
	                            ?>                                 
	                            <div class="item"> <div class="tRes_80"><img src="assets/images/img-2.jpg" alt=""></div></div> <!-- end item -->
	                            <?php
	                            } ?>
	                        </div>
	                    </div>
	                </div>
					
				</div>
				<div class="col-lg-6">
					<div class="info-detail sec-b">
						
					
						<h3>PHITEN RAKUWA NECKLACE METAX ROUND 40CM</h3>

						<div class="total-rating"><img width="115" src="assets/images/star3.svg" alt="">   </div>

								<p class="price">
								    <span class="price_new">88.80 vnd</span> <span class="price_old">108.80 vnd</span>
								</p>

						<div class="row quan-color-size">
							<div class="col-md-4">
								<div class="title">Số lượng:</div>
								<div class="quality"  data-min="1" data-max="10" > 
									<a href="javascript:void(0)" class="minus"><i class="icon-minus"></i></a> 
									<input type="text"  value="1"> 
									<a href="javascript:void(0)" class="plus"><i class="icon-plus"></i></a>
								</div>								
							</div>
							<div class="col-md-4">
								<div class="title">Màu sắc:</div>

					          <div class="widget-color row">
					            <?php 
					            $array_2=['#fff','#004EA2','#000080'];
					            $array_2_name=['white','abc','xyz'];
					            for($i=0;$i<3;$i++) { ?>
					            	<div class="item col-6">
						              <label class="checkbox">
						                <input type="checkbox">
						                <span class="<?php echo $array_2_name[$i]; ?>" style="background-color: <?php echo $array_2[$i]; ?>; border-color: <?php echo $array_2[$i]; ?>"></span>
						              </label>
					              	</div>

					            <?php
					            } ?>
					          </div>
							
							</div>
							<div class="col-md-4">
								<div class="title">Kích thước:</div>
								<select name="" id="" class="select">
									<option value="">10cm</option>
									<option value="">20cm</option>
									<option value="">30cm</option>

								</select>
															
							</div>
						</div>


		                <div class="desc">
		                	<p>Thiết kế tinh tế tạo nên sự mạnh mẽ nhưng không kém phần trang nhã và sang trọng  </p>
		                	<p>Với kiểu dáng được thiết kế trang nhã và sự kiên định về công nghệ giúp hỗ trợ, tối ưu hóa năng lực con người. Dây chuyền METAX không chỉ tinh tế mà còn rất mạnh mẽ.</p>
	               	
		                </div>

		                <div class="cart-like">
			                <a href="#" class="btn btn1 addtocart">Thêm vào giỏ <span class="icon-cart"></span></a>
			                <span class="like"><i class="icon-like-1"></i></span>
		                </div>
	                </div>

					
				</div>

			</div>




			<div class="row">
				<div class="col-lg-8 col-md-7">

					<div class="acordion box-acordion">
						<div class="tab show">
							<div class="tab-title" >Đặc điểm</div>
							<div class="tab-content entry-content" style="display: block;">
								<p>
									Thiết kế Razor Blade <br>
									AQUA TITANIUM nhúng với nylon mềm ở bên ngoài. <br>
									Phần lõi linh hoạt với hạt micro titanium và carbonized titanium <br>
									Tráng phủ kim loại, dựa dẻo POM chịu nhiệt công nghiệp 
								</p>
								<p>
									* CÔNG NGHỆ & VẬT LIỆU<br>
									Công nghệ AQUA TITANIUM <br>
									Micro Titanium Spheres<br>
									Carbonized Titanium							
								</p>

							</div>
						</div>
						<div class="tab ">
							<div class="tab-title" >Thông Số Kỹ Thuật</div>
							<div class="tab-content entry-content" style="display: none;">
								<p>2222</p>
							</div>
						</div>
						<div class="tab ">
							<div class="tab-title" >Hướng Dẫn Sử Dụng</div>
							<div class="tab-content entry-content" style="display: none;">
								<p>Hướng Dẫn Sử Dụng</p>
							</div>
						</div>				
					</div>
					
				</div>
				<div class="col-lg-4 col-md-5">
					<div class="widget widget-review">
						<h3 class="widget-title">Đánh Giá Khách Hàng</h3>
						<div class="widget-content">
							<div class="owl-carousel s-dots list-commnets">
									<?php 
									for($i=1;$i<=5;$i++) {?>					
								<div class="item">
									<div class="name">
										<span class="img tRes"><img  src="https://via.placeholder.com/50" alt=""></span>
										<div class="text">
											<div class="date">2 days ago</div>
											<div class="title">Louise Frank</div>
											<img width="94" src="assets/images/star3.svg" alt="">
										</div>
									</div>
									<div class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Aenean eu enim justo. Vestibulum aliquam hendrerit molestie. Mauris malesuada nisi sit amet augue accumsan tincidunt. Maecenas tincidunt, velit ac porttitor pulvinar, </div>

								</div>
								<?php 
								} ?>
							</div>							

							<span class="btn btn1 full" data-toggle="modal" data-target="#myReview">Để lại đánh giá</span>

						</div>
						
					</div>




					
				</div>

			</div>











		</div>
	
	</main>


<section class="sec-tb related-products lists-1">
	<div class="container">

		<div class="entry-head">
	        <h2 class="st" data-title="Sản Phẩm Liên Quan">
	          <span>Sản Phẩm Liên Quan</span>
	        </h2>
		</div>


	    <div class="owl-carousel s-auto s-nav nav-1" data-res="5,4,3,1" data-margin="10,10,10,10" >
	      <?php
	      for($i=1;$i<=9;$i++){ ?>
	        	<?php include '_module/product-owl.php';?>
	      <?php
	      } ?>
	    </div>
	
	</div>
</section>

<section class="style-widget-1 sec-tb reviewed-products lists-1">
	<div class="container">
		<div class="widget">
			<h3 class="widget-title">Sản phẩm đã xem</h3>
		    <div class="owl-carousel s-auto s-nav nav-3" data-res="5,4,3,1" data-margin="10,10,10,10" >
		      <?php
		      for($i=1;$i<=9;$i++){ ?>
		        	<?php include '_module/product-owl.php';?>
		      <?php
		      } ?>
		    </div>
		</div>		
	</div>
</section>





<!-- Modal -->
<div class="modal fade " id="myReview"   role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<span class="close" data-dismiss="modal"><i class="icon-close"></i></span>

						<div class="modal-reviews">
							<h2>Đánh Giá Sản Phẩm</h2>
							<div class="top-r">
								<div class="text">Click chọn sao để đánh giá</div>
								<div class="wstar">
									<?php 
									for($i=0;$i<=5;$i++) {
										echo '<img class="s-'.$i.'" src="assets/images/star'.$i.'.svg" alt="">';
									} ?>
									<span class="over">
										<?php 
										for($i=5;$i>=1;$i--) {
											echo '<span data-sync="s-'.$i.'" class="o-'.$i.'" ></span>';
										} ?>						
									</span>
								</div>
							</div>
							<form action="" class="form-comment  ">
								<div>Đánh giá/ Hỏi đáp về sản phẩm</div>
								<div class="mb-30">
									<textarea name="" id="" cols="30" rows="10" placeholder="Type something about this product…"></textarea>
								</div>
								<div >
									<button class="btn full ">Send</button>
								</div>
							</form>

						</div>

		</div>
	</div>
</div>


<?php include 'include/index-bottom-2.php';?>

