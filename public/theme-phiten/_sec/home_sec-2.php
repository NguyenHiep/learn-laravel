<?php
for($i=1;$i<=4;$i++){ ?>
<section class=" sec-product sec-product-<?php echo $i; ?>" >
    <div class="row grid-space-0 <?php if($i%2==0) echo 'end'; ?>">
      <div class="col-md-4">
          <div class="item_intro">
              <img class="img lazy-hidden " data-lazy-type="image" src="assets/images/image.svg" data-lazy-src="assets/images/sec-product-<?php echo $i; ?>.jpg"  alt="" />
            <div class="divtext ">
              <div class="title2">Phiten</div>
              <h2 class="title">Bracelet</h2>
              <div class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Aenean eu enim justo. </div>
            </div>
          </div>        
      </div>
      <div class="col-md-8">
        <div class="widget lists-1 lists-1-hover">
          <h3 class="widget-title">Gợi ý cho bạn</h3>
          <div class="owl-carousel s-auto_ s-nav nav-3" data-res="3,2,2,1" data-margin="30,20,20,0">
            <?php
            for($j=1;$j<=14;$j++){ ?>
                <?php include '_module/product-owl.php';?> 
            <?php
            } ?>
          </div>
        </div>
      </div>
    </div>
</section>  
<?php
} ?>