<!-- Filter - start -->
<div class="section-filter">
  <button id="section-filter-toggle" class="section-filter-toggle" data-close="Hide Filter" data-open="Show Filter">
    <span>Show Filter</span> <i class="fa fa-angle-down"></i>
  </button>
  <div class="section-filter-cont">
    <div class="section-filter-price">
      <div class="range-slider section-filter-price" data-min="0" data-max="2000000" data-from="50000" data-to="2000000" data-prefix="vnđ" data-grid="false"></div>
    </div>
    
    <div class="section-filter-item opened">
      <p class="section-filter-ttl">Status <i class="fa fa-angle-down"></i></p>
      <div class="section-filter-fields">
        <p class="section-filter-field">
          <input id="section-filter-checkbox1-1" value="on" type="checkbox">
          <label class="section-filter-checkbox" for="section-filter-checkbox1-1">Còn hàng</label>
        </p>
        <p class="section-filter-field">
          <input id="section-filter-checkbox1-2" value="on" type="checkbox">
          <label class="section-filter-checkbox" for="section-filter-checkbox1-2">Hết hàng</label>
        </p>
        
      </div>
    </div>
    <div class="section-filter-item opened">
      <p class="section-filter-ttl">Màu sắc <i class="fa fa-angle-down"></i></p>
      <div class="section-filter-fields">
        <ul class="section-filter-color">
          <li class="active"><img src="{{ asset('img/color/red.jpg') }}" alt="Red"></li>
          <li><img src="{{ asset('img/color/blue.jpg') }}" alt="Blue"></li>
          <li><img src="{{ asset('img/color/green.jpg') }}" alt="Green"></li>
          <li><img src="{{ asset('img/color/yellow.jpg') }}" alt="Yellow"></li>
          <li><img src="{{ asset('img/color/purple.jpg') }}" alt="Purple"></li>
        </ul>
      </div>
    </div>
    <div class="section-filter-item opened">
      <p class="section-filter-ttl">Size <i class="fa fa-angle-down"></i></p>
      <div class="section-filter-fields">
        <p class="section-filter-field">
          <input id="section-filter-checkbox2-1" value="on" type="checkbox">
          <label class="section-filter-checkbox" for="section-filter-checkbox2-1">M</label>
        </p>
        <p class="section-filter-field">
          <input id="section-filter-checkbox2-2" value="on" type="checkbox">
          <label class="section-filter-checkbox" for="section-filter-checkbox2-2">L</label>
        </p>
        <p class="section-filter-field">
          <input id="section-filter-checkbox2-3" value="on" type="checkbox">
          <label class="section-filter-checkbox" for="section-filter-checkbox2-3">XL</label>
        </p>
      </div>
    </div>
    <div class="section-filter-item opened">
      <p class="section-filter-ttl">Thương hiệu <i class="fa fa-angle-down"></i></p>
      <div class="section-filter-fields">
        <p class="section-filter-field">
          <input id="section-filter-checkbox3-1" value="on" type="checkbox">
          <label class="section-filter-checkbox" for="section-filter-checkbox3-1">Gucci</label>
        </p>
        <p class="section-filter-field">
          <input id="section-filter-checkbox3-2" value="on" type="checkbox">
          <label class="section-filter-checkbox" for="section-filter-checkbox3-2">Jony</label>
        </p>
        <p class="section-filter-field">
          <input id="section-filter-checkbox3-3" value="on" type="checkbox">
          <label class="section-filter-checkbox" for="section-filter-checkbox3-3">Sophia</label>
        </p>
      </div>
    </div>
    
    <div class="section-filter-buttons">
      <input class="btn btn-themes" id="set_filter" name="set_filter" value="Tìm kiếm" type="button">
      <input class="btn btn-link" id="del_filter" name="del_filter" value="Hủy bỏ" type="button">
    </div>
  </div>
</div>
<!-- Filter - end -->