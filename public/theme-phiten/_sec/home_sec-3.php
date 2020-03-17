<section class=" sec-tb sec-3 lists-1 lists-1-hover" >
  <div class="container">
    <div class="entry-head">
        <h2 class="st" data-title="Trending">
          <span>Top Trending</span>
        </h2>
    </div>
    <div class="sec-b">
        <div class="owl-carousel s-nav nav-1" data-res="5,3,2,1" data-margin="0,0,0,0">
          <?php
          for($i=1;$i<=14;$i++){ ?>
              <?php include '_module/product.php';?>
          <?php
          } ?>
        </div>
    </div>      

    <div class="row ">
      <div class="col-lg-7">
        <div class="widget">
          <h3 class="widget-title">Sản phẩm đề xuất</h3>
          <div class="owl-carousel s-nav nav-3" data-res="3,3,2,1" data-margin="20,20,20,0">
            <?php
            for($i=1;$i<=14;$i++){ ?>

                <?php include '_module/product.php';?>
            <?php
            } ?>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="widget">
          <h3 class="widget-title">Sản phẩm đã xem</h3>
          <div class="owl-carousel s-nav nav-3" data-res="2,3,2,1" data-margin="20,20,20,0">
            <?php
            for($i=1;$i<=14;$i++){ ?>
                <?php include '_module/product.php';?>
            <?php
            } ?>
          </div>
        </div>
      </div>
    </div>

  </div>    
</section>  
