<!-- Filter - start -->
<div class="section-filter">
  <form action="" method="GET">
    @if(request()->has('q'))
      <input type="hidden" name="q" value="{{request()->query('q')}}"/>
    @endif
    @if(request()->has('sort'))
      <input type="hidden" name="sort" value="{{request()->query('sort')}}"/>
    @endif
    @if(request()->has('limit'))
      <input type="hidden" name="limit" value="{{request()->query('limit')}}"/>
    @endif
    <button id="section-filter-toggle" class="section-filter-toggle" data-close="Hide Filter" data-open="Show Filter">
      <span>Show Filter</span> <i class="fa fa-angle-down"></i>
    </button>
    <div class="section-filter-cont">
      @php
        $price_from = 0;
        $price_to   = 2000000;
        if(request()->has('price_from')){
          $price_from = request()->query('price_from');
        }
        if(request()->has('price_to')){
          $price_to = request()->query('price_to');
        }
      @endphp
      <div class="section-filter-price">
        <div class="range-slider section-filter-price" data-min="0" data-max="2000000" data-from="{{$price_from}}" data-to="{{$price_to}}" data-prefix="vnđ" data-grid="false"></div>
        <input type="hidden" name="price_from" />
        <input type="hidden" name="price_to" />
      </div>
      @php
        $inStock  = '';
        $outStock = '';
          if(request()->has('status')){
            if(in_array('in_stock', request()->query('status'))){
              $inStock = 'checked';
            }
            if(in_array('out_stock', request()->query('status'))){
              $outStock = 'checked';
            }
          }
      @endphp
      <div class="section-filter-item opened">
        <p class="section-filter-ttl">Status <i class="fa fa-angle-down"></i></p>
        <div class="section-filter-fields">
          <p class="section-filter-field">
            <input class="stocks" id="in_stock" value="in_stock" type="checkbox" name="status[]" {{$inStock}}/>
            <label class="section-filter-checkbox" for="in_stock">Còn hàng</label>
          </p>
          <p class="section-filter-field">
            <input class="stocks" id="out_stock" value="out_stock" type="checkbox" name="status[]" {{$outStock}}/>
            <label class="section-filter-checkbox" for="out_stock">Hết hàng</label>
          </p>
        </div>
      </div>
      {{--<div class="section-filter-item opened">
        <p class="section-filter-ttl">Màu sắc <i class="fa fa-angle-down"></i></p>
        <div class="section-filter-fields">
          <ul class="section-filter-color">
            <li class="active"><img src="{{ asset('img/color/red.jpg') }}" alt="Red"></li>
            <li class="active"><img src="{{ asset('img/color/blue.jpg') }}" alt="Blue"></li>
            <li class="active"><img src="{{ asset('img/color/green.jpg') }}" alt="Green"></li>
            <li class="active"><img src="{{ asset('img/color/yellow.jpg') }}" alt="Yellow"></li>
            <li class="active"><img src="{{ asset('img/color/purple.jpg') }}" alt="Purple"></li>
          </ul>
        </div>
      </div>
      <div class="section-filter-item opened">
        <p class="section-filter-ttl">Size <i class="fa fa-angle-down"></i></p>
        <div class="section-filter-fields">
          <p class="section-filter-field">
            <input class="sizes" id="size_m" value="M" type="checkbox" name="sizes[]"/>
            <label class="section-filter-checkbox" for="size_m">M</label>
          </p>
          <p class="section-filter-field">
            <input class="sizes" id="size_l" value="L" type="checkbox" name="sizes[]"/>
            <label class="section-filter-checkbox" for="size_l">L</label>
          </p>
          <p class="section-filter-field">
            <input class="sizes" id="size_xl" value="XL" type="checkbox" name="sizes[]"/>
            <label class="section-filter-checkbox" for="size_xl">XL</label>
          </p>
        </div>
      </div>
      <div class="section-filter-item opened">
        <p class="section-filter-ttl">Thương hiệu <i class="fa fa-angle-down"></i></p>
        <div class="section-filter-fields">
          <p class="section-filter-field">
            <input class="brands" id="brand_gucci" value="gucci" type="checkbox" name="brands[]"/>
            <label class="section-filter-checkbox" for="brand_gucci">Gucci</label>
          </p>
          <p class="section-filter-field">
            <input class="brands" id="brand_jony" value="jony" type="checkbox" name="brands[]"/>
            <label class="section-filter-checkbox" for="brand_jony">Jony</label>
          </p>
          <p class="section-filter-field">
            <input class="brands" id="brand_sophia" value="sophia" type="checkbox" name="brands[]"/>
            <label class="section-filter-checkbox" for="brand_sophia">Sophia</label>
          </p>
        </div>
      </div>--}}
      <div class="section-filter-buttons">
        <input class="btn btn-themes" id="set_filter" value="Lọc" type="submit"/>
        <input class="btn btn-link" id="del_filter" value="Hủy bỏ" type="button" onclick="clearFilter()"/>
      </div>
    </div>
  </form>
</div>
<!-- Filter - end -->