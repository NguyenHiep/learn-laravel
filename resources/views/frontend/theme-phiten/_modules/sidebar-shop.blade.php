<div class="sidebar">
  <div class="inner">

  
    <div class="widget widget-cart">
      <div class="widget-title"> List of cart</div>
      <div class="widget-content">

        <ul class="list-mini-product">
          <?php for($i=1;$i<=2;$i++){?>
          <li class="item">
            <div class=" row grid-space-20">
              <div class="col-5">
                <a href="04_product_detail.php" class="img">
                  <img src="{{ asset('theme-phiten/assets/images/product-1.jpg') }}"   alt="" />
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

        <div class="text-center viewall">
          <a href="#">View more</a>
        </div>
      </div>

    </div> <!--End widget-->  

    <div class="widget widget-summary">
      <div class="widget-title"> Order Summary</div>
      <div class="widget-content">
        <ul>
          <li class="item">
            <span class="pull-left">Subtotal:</span>
            <span class="pull-right price">890.00 vnd</span>
          </li>
          <li class="item">
            <span class="pull-left">Shipping:</span>
            <span class="pull-right price">10.00 vnd</span>
          </li>
          <li class="item">
            <span class="pull-left">Tax:</span>
            <span class="pull-right price">90.00 vnd</span>
          </li>
          <li class="item total">
            <span class="pull-left">Total:</span>
            <span class="pull-right price">990.00 vnd</span>
          </li>

        </ul>
      </div>


    </div> <!--End widget-->     


  </div>
</div>