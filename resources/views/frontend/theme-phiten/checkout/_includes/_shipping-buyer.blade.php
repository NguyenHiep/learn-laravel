<div class="personal-information row">
  <div class="col-lg-12">
    <h6>Thông tin thanh toán</h6>
  </div>

  <div class="col-lg-6">
    <div class="item form-group ">
      <input type="text" name="billing[first_name]" value="" class="form-control input" id="billing-first-name" placeholder="Tên*" />
    </div>

    <div class="item form-group ">
      <input type="email" name="customer_email" class="form-control input" id="customer-email" value="" placeholder="Email*">
    </div>

    <div class="item form-group ">
      <input type="tel" name="customer_phone" class="form-control input" id="customer-phone" value="" placeholder="Điện thoại*">
    </div>

    <div class="item ">
      <textarea class="input" name="billing[notes]" value="" id="billing-notes" placeholder=" Ghi chú"></textarea>
    </div>
  </div>

  <div class="col-lg-6 col-md-6">
    <div class="billing-address ">
      <div class="item form-group ">
        <input type="text" name="billing[address_1]" value="" class="form-control input" id="billing-address-1" placeholder=" Địa chỉ*">
      </div>
      <input type="hidden" name="billing[zip]" value="700000">
      <input type="hidden" name="billing[country]" value="VN">

      <div class="item form-group ">
        <select name="billing[state]" class="custom-select-black select select-state" id="billing-state2" placeholder="Quốc gia*">
          <option data-price="0" value="">Xin hãy lựa chọn</option>
          <option data-price="0.00" data-contact="0" value="1">Hồ Chí Minh</option>
          <option data-price="0.00" data-contact="0" value="65">Hà Nội</option>
        </select>
      </div>

      <div class="item form-group ">
        <select name="billing[city]" class="custom-select-black  select" id="billing-city2">
          <option value="" data-price="0">Quận/huyện</option>
          <option data-price="0" data-contact="0" value="Quận 1">Quận 1</option>
          <option data-price="0" data-contact="0" value="Quận 2">Quận 2</option>
          <option data-price="0" data-contact="0" value="Quận 3">Quận 3</option>
        </select>
      </div>
    </div>
    <div id="payment" class="tab-pane " role="tabpanel">
      <div class="box-wrapper1 payment clearfix">
        <div class="box-header">
        </div>

        <ul class="list-inline payment-method row grid-space-2">
          <li class="col-4">
            <div class="item">
              <label class="form-group radio block" title="Thanh toán bằng tiền mặt">
                <input type="radio" name="payment_method" value="cod" id="cod" checked="" data-title="Thanh toán bằng tiền mặt">
                <span for="cod"></span> Thanh toán bằng tiền mặt
              </label>
            </div>
          </li>

        </ul>
      </div>

    </div>
  </div>
</div>