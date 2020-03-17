<div class="minicart">
  <div class="total">
    Total : <span>12.000.000 </span> <span>vnd</span>
  </div>
  <h4 class="title-cart">Giỏ hàng</h4>
  <ul class="list-mini-product">
    <?php for($i=1;$i<=5;$i++){?>
    <li class="item">
      <div class="row grid-space-20">
        <div class="col-5">
          <a href="04_product_detail.php" class="img">
            <img src="assets/images/product-1.jpg"   alt="" /> 
          </a>
        </div>
        <div class="col-7">
          <a href="04_product_detail.php" class="title">Aishitoto Uruoi Sengen (Yuzu Flavour) – 30 sachets</a>
          <div class="number">Number: 1</div>
          <div class="price">178.00 vnd</div>
        </div>
      </div>
    </li>
    <?php
    } ?>
  </ul>
  <div class="groupbtn">
    <p><a href="05_payment.php" class="btn btn1 noshadow">Thanh toán</a></p>
    <p><a href="02_product.php" class="btn btn1 noshadow">Tiếp tục mua sắm</a></p>
  </div>
</div>