<div class="row shipping-address clearfix">
  <div class="col-lg-12">
    <h6>Địa chỉ giao hàng</h6>
  </div>

  <div class="col-md-6">
    <div class="item form-group ">
      <label for="shipping-first-name">
        Tên<span>*</span>
      </label>

      <input type="text" name="shipping[first_name]" value="" class="form-control input" id="shipping-first-name">
    </div>

    <div class="item form-group ">
      <label for="shipping-1">Địa chỉ<span>*</span></label>
      <input type="text" name="shipping[address_1]" value="" class="form-control input" id="shipping-address-1">
    </div>

    <div class="item form-group ">
      <label for="shipping-phone">Phone<span>*</span></label>
      <input type="phone" name="shipping[phone]" value="" class="form-control input" id="shipping-phone">
    </div>
  </div>

  <div class="col-md-6">
    <input type="hidden" name="shipping[zip]" value="700000">
    <input type="hidden" name="shipping[country]" value="VN">
    <div class="item form-group ">
      <label for="shipping-state">Bang /Tỉnh<span>*</span></label>
      <select name="shipping[state]" class="custom-select-black select select-state" id="shipping-state2">
        <option data-price="0" value="">Xin hãy lựa chọn
        </option>
        <option data-price="0.00" data-contact="0" value="1">Hồ Chí Minh</option>
        <option data-price="0.00" data-contact="0" value="65">Hà Nội</option>
      </select>
    </div>

    <div class="item form-group ">
      <label for="shipping-city">
        Quận/huyện<span>*</span>
      </label>
      <select name="shipping[city]"
              class="custom-select-black select "
              id="shipping-city">
        <option value="">Thành phố</option>
      </select>


    </div>

  </div>
</div>