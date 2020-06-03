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
                    <select @change="changeState()" name="Tỉnh" v-model="billing.state" class="custom-select-black select select-state" :class="errors[0] ? 'has_error' : ''" placeholder="Tỉnh*">
                        <option value="">Xin hãy lựa chọn</option>
                        <option v-for="(location, index) in locations" :key="index" :value="location.code">@{{ location.name }}</option>
                    </select>
                    <span class="error" v-if="errors[0]">@{{ errors[0] }}</span>
                </validation-provider>
            </div>

            <div class="item form-group">
                <validation-provider rules="required" v-slot="{ errors }">
                    <select v-model="billing.city" name="Quận/huyện" :class="errors[0] ? 'has_error' : ''" class="custom-select-black select">
                        <option value="">Quận/huyện</option>
                        <option v-for="(province, index) in provinces" :key="index" :value="province.code">@{{ province.name }}</option>
                    </select>
                    <span class="error" v-if="errors[0]">@{{ errors[0] }}</span>
                </validation-provider>
            </div>
        </div>
        <div id="payment" class="tab-pane" role="tabpanel">
            <div class="box-wrapper1 payment clearfix">
                <div class="box-header">
                </div>
                <ul class="list-inline payment-method row grid-space-2" v-if="paymentOptions.length > 0">
                    <li class="col-4" v-for="(payment, index) in paymentOptions" :key="index">
                        <div class="item">
                            <label class="form-group radio block" data-toggle="tooltip" data-placement="top" :title="payment.description">
                                <input type="radio" :value="payment.id" v-model.number="billing.payment_method" :id="'payment' + payment.id"/>
                                <span :for="'payment' + payment.id"></span> @{{ payment.name }}
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>