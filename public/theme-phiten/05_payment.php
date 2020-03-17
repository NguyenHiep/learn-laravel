<?php include 'include/index-top.php';?>
<div class="page-payment">
	<div class="entry-heading">
	  <div class="container">
	        <h1>Payment</h1>
	  </div>
	</div>
	<div class="entry-heading2">
	  <div class="container">
	        <h3><img src="assets/images/svg/list-cart.svg"   alt="" />  List Cart</h3>
	  </div>
	</div>

	<main id="main" >
		<div class="container">

			<div class="wrap-table">
				<table class="table-cart productListCart">
					<tr>
						<th class="delete"><span class="delete-all"><img src="assets/images/svg/remove.svg"   alt="" /></span> All</th>
						<th class="image">Image</th>
						<th class="product">Product</th>
						<th class="price">Price</th>
						<th class="number">Number</th>
						<th class="subtotal">Subtotal</th>
					</tr>

					<?php
					for($i=1;$i<=5;$i++){ ?>
					<tr class="item-cart">
						<td class="delete"><span class="remove"><i class="icon-close"></i></span></td>
						<td class="image">
							<a href="#"><img src="assets/images/product-1.jpg"   alt="" /></a>
						</td>
						<td class="product">
							<a href="#" class="title">Aishitoto Uruoi Sengen (Yuzu Flavour) – 30 sachets</a>
						</td>
						<td class="price">
							<span class="product-price">178.00</span> vnd
						</td>
						<td class="number">
		                      <div class="qualitys"   > 
		                        <a href="javascript:void(0)" class="minus"><i class="icon-minus"></i></a> 
		                        <input type="text" maxvalue="6"  value="1">
		                        <a href="javascript:void(0)" class="plus"><i class="icon-plus"></i></a>
		                      </div>
						</td>
						<td class="subtotal">
							<span class="finalPrice">100</span> vnd
						</td>
					</tr>
					<?php
					} ?>


				</table>
			</div>


			<div class="promotion-total">
				<div class="row end">
					<div class="col-md-5">
						<div class=" final-price">Total : <span class="wtotal"><span class="total-price">890.00</span> vnd</span></div>
					</div>					
					<div class="col-md-7">
						<div class="promotion">
							Promotion Code : 
							<form action="" class="code">
								<input type="text" placeholder="Type coupon here">
								<button>Apply</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="paging-cart">
				<a href="#" class="prev"><i class="icon-arrow-14"></i> Quay lại</a>
				<a href="06_shipping_address.php" class="next">Tiếp theo <i class="icon-arrow-14"></i></a>
			</div>



			






		</div>

	</main>
</div>



<script>
    (function ($) {
        $(document).ready(function () {


            $('table.productListCart tr.item-cart').each(function () {
                var input = $(this).find('.qualitys input'),
                    plus = $(this).find('.qualitys .plus'),
                    minus = $(this).find('.qualitys .minus'),
                    price = parseFloat($(this).find('.product-price').html()),
                    finalPrice = $(this).find('.finalPrice'),
                    qtyAlert = $(this).find('.qtyAlert'),
                    maxNum = parseFloat(input.attr("maxvalue")),
                    remove = $(this).find('.remove');
                finalPrice.html(input.val() * price);

                function changeInput(index) {
                    input.val(index);
                    finalPrice.html(index * price);
                }
                input.on("change", function () {
                    var change = input.val();
                    if (change > maxNum) {
                        change = maxNum;
                        $(qtyAlert).show();
                    }
                    else {
                        $(qtyAlert).hide();
                    }
                    if (change < 1) change = 1;

                    changeInput(change);
                    totalPrice();

                });

                $(plus).click(function () {
                    SelQtyValue = parseFloat(input.val()),
                        SelQtyValue++;
                    if (SelQtyValue > maxNum) {
                        SelQtyValue = maxNum;
                        $(qtyAlert).show();
                    }
                    changeInput(SelQtyValue);
                    totalPrice();
                });
                $(minus).click(function () {
                    SelQtyValue = parseFloat(input.val()),
                        SelQtyValue--;
                    if (SelQtyValue < 1) SelQtyValue = 1;
                    if (SelQtyValue <= maxNum) {
                        $(qtyAlert).hide();
                    }
                    changeInput(SelQtyValue);
                    totalPrice();
                });

                $(remove).click(function () {
                    if (confirm('Bạn muốn xoá sản phẩm này ?')) {
                        $(this).parents('table.productListCart tbody > tr').remove();
                        changeInput(0);
                        totalPrice();
                    }
                });
            });

            function totalPrice() {
                var numbCart =  $('table.productListCart  tr.item-cart').length;
                var totalCart = 0;

                $('table.productListCart  tr.item-cart').each(function(){
                    var priceItem = parseFloat($(this).find('.finalPrice').html());


                    totalCart = totalCart + priceItem;
                   
                    
                });

                
                $('.final-price .total-price').html(totalCart);
            }
            totalPrice();



        });
    })(jQuery);
</script>



<?php include 'include/index-bottom.php';?>

