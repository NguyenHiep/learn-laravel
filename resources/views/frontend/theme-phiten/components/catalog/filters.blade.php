@if(!empty($settings->params['enable_category_filter_attribute']))
    <div class="widget widget-size">
        <div class="widget-title">Kích thước</div>
        <div class="row grid-space-10">
            <?php
            $array_1 = ['14', '15', '16', '17', '18', '19'];
            for($i = 0;$i < 6;$i++) { ?>
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
            $array_2 = ['#000', '#fff', '#D0021B', '#9A0F0E', '#004EA2', '#000080'];
            $array_2_name = ['black', 'white', 'abc', 'xyz', 'aaa', 'fff'];
            for($i = 0;$i < 6;$i++) { ?>
            <div class="col-2">
                <label class="checkbox">
                    <input type="checkbox">
                    <span class="<?php echo $array_2_name[$i]; ?>"
                          style="background-color: <?php echo $array_2[$i]; ?>; border-color: <?php echo $array_2[$i]; ?>"></span>
                </label>
            </div>
            <?php
            } ?>
        </div>

    </div> <!--End widget-->
    <div class="widget widget-star">
        <div class="widget-title">Sao</div>
        <div class="item active">
            <span class="text">(Từ 4 sao)</span>
            <img src="{{ asset('assets/images/star4.svg') }}" alt=""/>
        </div>
        <div class="item">
            <span class="text">(Từ 3 sao)</span>
            <img src="{{ asset('assets/images/star3.svg') }}" alt=""/>
        </div>
        <div class="item"><span class="text">(Từ 2 sao)</span>
            <img src="{{ asset('assets/images/star4.svg') }}" alt=""/>
        </div>
        <div class="item"><span class="text">(Từ 1 sao)</span>
            <img src="{{ asset('assets/images/star1.svg') }}" alt=""/>
        </div>
    </div> <!--End widget-->
@endif
