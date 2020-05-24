<div class="personal-information row">
    <div class="col-lg-12">
        <h6>Thông tin thanh toán</h6>
    </div>

    <div class="col-lg-6">
        <div class="item form-group">
            <validation-provider rules="required" v-slot="{ errors }">
                <input type="text" v-model="billing.full_name" :class="errors[0] ? 'has_error' : ''" class="form-control input" name="Tên" placeholder="Tên*"/>
                <span class="error" v-if="errors[0]">@{{ errors[0] }}</span>
            </validation-provider>
        </div>

        <div class="item form-group">
            <validation-provider rules="required|email" v-slot="{ errors }">
                <input type="email" v-model="billing.customer_email" name="Email" :class="errors[0] ? 'has_error' : ''" class="form-control input" placeholder="Email*">
                <span class="error" v-if="errors[0]">@{{ errors[0] }}</span>
            </validation-provider>
        </div>

        <div class="item form-group">
            <validation-provider rules="required|numeric|length:10" v-slot="{ errors }">
                <input type="tel" v-model="billing.customer_phone" name="Điện thoại" :class="errors[0] ? 'has_error' : ''" class="form-control input" placeholder="Điện thoại*" maxlength="10">
                <span class="error" v-if="errors[0]">@{{ errors[0] }}</span>
            </validation-provider>
        </div>

        <div class="item">
            <textarea class="input" v-model="billing.notes" placeholder=" Ghi chú"></textarea>
        </div>
    </div>

    <div class="col-lg-6 col-md-6">
        <div class="billing-address">
            <div class="item form-group ">
                <validation-provider rules="required" v-slot="{ errors }">
                    <input type="text" v-model="billing.address" name="Địa chỉ" :class="errors[0] ? 'has_error' : ''" class="form-control input" placeholder="Địa chỉ*">
                    <span class="error" v-if="errors[0]">@{{ errors[0] }}</span>
                </validation-provider>
            </div>

            <input type="hidden" v-model="billing.zip" value="700000">
            <input type="hidden" v-model="billing.country" value="VN">

            <div class="item form-group">
                <validation-provider rules="required" v-slot="{ errors }">
                    <select name="Tỉnh" v-model="billing.state" class="custom-select-black select select-state" :class="errors[0] ? 'has_error' : ''" placeholder="Tỉnh*">
                        <option value="">Xin hãy lựa chọn</option>
                        <option value="1">Hồ Chí Minh</option>
                        <option value="65">Hà Nội</option>
                    </select>
                    <span class="error" v-if="errors[0]">@{{ errors[0] }}</span>
                </validation-provider>
            </div>

            <div class="item form-group">
                <validation-provider rules="required" v-slot="{ errors }">
                    <select v-model="billing.city" name="Quận/huyện" :class="errors[0] ? 'has_error' : ''" class="custom-select-black select">
                        <option value="">Quận/huyện</option>
                        <option value="Quận 1">Quận 1</option>
                        <option value="Quận 2">Quận 2</option>
                        <option value="Quận 3">Quận 3</option>
                    </select>
                    <span class="error" v-if="errors[0]">@{{ errors[0] }}</span>
                </validation-provider>
            </div>
        </div>
        <div id="payment" class="tab-pane" role="tabpanel">
            <div class="box-wrapper1 payment clearfix">
                <div class="box-header">
                </div>

                <ul class="list-inline payment-method row grid-space-2">
                    <li class="col-4">
                        <div class="item">
                            <label class="form-group radio block" title="Thanh toán bằng tiền mặt">
                                <input type="radio" v-model="billing.payment_method" id="cod" value="cod"/>
                                <span for="cod"></span> Thanh toán bằng tiền mặt
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>