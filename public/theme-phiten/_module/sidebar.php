<div class="sidebar-filter">
  <div class="inner">
        <div class="widget widget-price">
          <div class="widget-title"> Price</div>

          <div class="rangeprice">

            <div id="slider-range"></div>    

            <div class="gprice">
              <span class="amount1">
                <span class="val1"></span>
              </span>
              <span class="amount2">
                <span class="val2"></span>
              </span>

            </div>  
            <input type="hidden" id="amount1" name="amount1" >  
            <input type="hidden" id="amount2" name="amount2" >


            <script src="assets/js/jquery-ui.js"></script>
            <script>
            (function($){
                $(document).ready(function(){

                  $( "#slider-range" ).slider({
                    range: true,
                    min: 0,
                    max: 500,
                    values: [ 100, 300 ],
                    slide: function( event, ui ) {
                      //$( "#amount" ).html( "Price Range : $" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                      //$( "#amount" ).html( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                    $( "#amount1" ).val(ui.values[ 0 ]);
                    $( "#amount2" ).val(ui.values[ 1 ]);
                    $( ".gprice .val1" ).html(ui.values[ 0 ]);
                    $( ".gprice .val2" ).html(ui.values[ 1 ]);

                    }
                  });
                  //$( "#amount" ).html( $( "#slider-range" ).slider( "values", 0 ) +    " - " + $( "#slider-range" ).slider( "values", 1 ) );
                  $( "#amount1" ).val($( "#slider-range" ).slider( "values", 0 ));
                  $( "#amount2" ).val($( "#slider-range" ).slider( "values", 1 ));

                  $( ".gprice .val1" ).html($( "#slider-range" ).slider( "values", 0 ));
                  $( ".gprice .val2" ).html($( "#slider-range" ).slider( "values", 1 ));

              
                }); 
            })(jQuery); 
            </script>
          </div>
        </div> <!--End widget-->
  
        <div class="widget widget-category">
          <div class="widget-title"> Bracelet</div>

          <label class="checkbox ">
            <input type="checkbox">
            <span></span>
              RIKUWA Bracelet
          </label>
          <label class="checkbox ">
            <input type="checkbox" checked="">
            <span></span>
              TITANIUM Bracelet
          </label>

        </div> <!--End widget-->  


        <div class="widget widget-size">
          <div class="widget-title">Kích thước</div>
          <div class="row grid-space-10">
            <?php 
            $array_1=['L','M','S'];
            for($i=0;$i<3;$i++) { ?>
            <div class="col-4">
              <label class="checkbox ">
                <input type="checkbox">
                <span></span>
                  <?php echo $array_1[$i]; ?>
              </label>
            </div>
            <?php
            } ?>
          </div>
        </div> <!--End widget-->  

        <div class="widget widget-size">
          <div class="widget-title">Kích thước</div>
          <div class="row grid-space-10">
            <?php 
            $array_1=['14','15','16','17','18','19'];
            for($i=0;$i<6;$i++) { ?>
            <div class="col-6">
              <label class="checkbox ">
                <input type="checkbox">
                <span></span>
                  <?php echo $array_1[$i]; ?> cm
              </label>
            </div>
            <?php
            } ?>
          </div>
        </div> <!--End widget-->  

        <div class="widget widget-color">
          <div class="widget-title">Màu sắc</div>

          <div class="row cols-5 grid-space-10">
            <?php 
            $array_2=['#000','#fff','#D0021B','#9A0F0E','#004EA2','#000080'];
            $array_2_name=['black','white','abc','xyz','aaa','fff'];
            for($i=0;$i<6;$i++) { ?>
            <div class="col-2">
              <label class="checkbox">
                <input type="checkbox">
                <span class="<?php echo $array_2_name[$i]; ?>" style="background-color: <?php echo $array_2[$i]; ?>; border-color: <?php echo $array_2[$i]; ?>"></span>
              </label>
            </div>
            <?php
            } ?>
          </div>
          
        </div> <!--End widget-->  

        <div class="widget widget-star">
          <div class="widget-title"> Star</div>

          <div class="item active"><span class="text">(Từ 4 sao)</span> <img src="assets/images/star4.svg"   alt="" />   </div>
          <div class="item"><span class="text">(Từ 3 sao)</span> <img src="assets/images/star3.svg"   alt="" />   </div>
          <div class="item"><span class="text">(Từ 2 sao)</span> <img src="assets/images/star2.svg"   alt="" />   </div>
          <div class="item"><span class="text">(Từ 1 sao)</span> <img src="assets/images/star1.svg"   alt="" />   </div>
        </div> <!--End widget-->     


  </div>
</div>