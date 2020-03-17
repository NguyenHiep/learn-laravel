<?php include 'include/index-top.php';?>
<div class="page-payment">
	<div class="entry-heading">
	  <div class="container">
	        <h1>Payment</h1>
	  </div>
	</div>
	<div class="entry-heading2">
	  <div class="container">
	        <h3><img src="assets/images/svg/shipping-address.svg"   alt="" /> Shipping Address</h3>
	  </div>
	</div>

	<main id="main" >
		<div class="container">

			<div class="row">
				<div class="col-md-8 col-sm-6">
					



					<form class="form-address">
						<div class="row ">
							<div class="col-lg-6">
								<div class="item"><input type="text" class="input" placeholder="Name*"></div>
								<div class="item"><input type="email" class="input" placeholder="Email*"></div>
								<div class="item"><input type="tel" class="input" placeholder="Phone Number*"></div>
								<div class="item"><textarea class="input"  name="" placeholder="Note"></textarea></div>


							</div>					
							<div class="col-lg-6">
								
								<div class="item">
									<select name="" id="" class="select">
										<option value="">City*</option>
									</select>							
								</div>	
								<div class="item">
									<select name="" id="" class="select">
										<option value="">District*</option>
									</select>							
								</div>	
								<div class="item">
									<select name="" id="" class="select">
										<option value="">Ward*</option>
									</select>							
								</div>	
								<div class="item"><input type="text" class="input" placeholder="Address*"></div>
								<div class="row grid-space-2">
									<div class="col-4">
										<div class="item">
									        <label class="radio block">
									          <input name="radio" type="radio" checked="" >
									          <span></span>
									            Tiền mặt/ COD
									        </label>										
										</div>
									</div>
									<div class="col-4">
										<div class="item">
									        <label class="radio block">
									          <input name="radio" type="radio" >
									          <span></span>
									            Paypal
									        </label>										
										</div>
									</div>
									<div class="col-4">
										<div class="item">
									        <label class="radio block">
									          <input name="radio" type="radio" >
									          <span></span>
									            Ipay88
									        </label>										
										</div>
									</div>

								</div>

												
							</div>					
					
						</div>
					</form>

					<div class="paging-cart">
						<a href="05_payment.php" class="prev"><i class="icon-arrow-14"></i> Quay lại</a>
						<a href="07_review-order.php" class="next">Tiếp theo <i class="icon-arrow-14"></i></a>
					</div>


				</div>
				<div class="col-md-4  col-sm-6">
					<?php include '_module/sidebar-shop.php';?>
				</div>
			</div>

		</div>

	</main>
</div>





<?php include 'include/index-bottom.php';?>

