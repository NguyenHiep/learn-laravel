<div class="row shipping-address clearfix">
    <div class="col-lg-12">
        <h6>Địa chỉ giao hàng</h6>
    </div>

    <div class="col-md-6">
        <div class="item form-group ">
            <label for="shipping-first-name">
                Tên<span>*</span>
            </label>
            <validation-provider rules="required" v-slot="{ errors }">
                <input type="text" v-model="shipping.full_name" name="Tên" :class="errors[0] ? 'has_error' : ''" class="form-control input">
                <span class="error" v-if="errors[0]">@{{ errors[0] }}</span>
            </validation-provider>
        </div>

        <div class="item form-group ">
            <label for="shipping-1">Địa chỉ<span>*</span></label>
            <validation-provider rules="required" v-slot="{ errors }">
                <input type="text" v-model="shipping.address" name="Địa chỉ" :class="errors[0] ? 'has_error' : ''" class="form-control input"/>
                <span class="error" v-if="errors[0]">@{{ errors[0] }}</span>
            </validation-provider>
        </div>

        <div class="item form-group ">
            <label for="shipping-phone">Phone<span>*</span></label>
            <validation-provider rules="required|numeric|length:10" v-slot="{ errors }">
                <input type="phone" v-model="shipping.phone" name="Phone" :class="errors[0] ? 'has_error' : ''" class="form-control input"/>
                <span class="error" v-if="errors[0]">@{{ errors[0] }}</span>
            </validation-provider>
        </div>
    </div>

    <div class="col-md-6">
        <input type="hidden" v-model="shipping.zip" value="700000"/>
        <input type="hidden" v-model="shipping.country" value="VN"/>
        <div class="item form-group ">
            <label for="shipping-state">Bang/Tỉnh<span>*</span></label>
            <validation-provider rules="required" v-slot="{ errors }">
                <select name="Bang/Tỉnh" v-model="shipping.state" :class="errors[0] ? 'has_error' : ''" class="custom-select-black select select-state">
                    <option value="">Xin hãy lựa chọn</option>
                    <option value="1">Hồ Chí Minh</option>
                    <option value="65">Hà Nội</option>
                </select>
                <span class="error" v-if="errors[0]">@{{ errors[0] }}</span>
            </validation-provider>
        </div>

        <div class="item form-group ">
            <label for="shipping-city">Quận/huyện<span>*</span></label>
            <validation-provider rules="required" v-slot="{ errors }">
                <select name="Quận/huyện" v-model="shipping.city" :class="errors[0] ? 'has_error' : ''" class="custom-select-black select">
                    <option value="">Quận/huyện</option>
                    <option value="Quận 1">Quận 1</option>
                    <option value="Quận 2">Quận 2</option>
                    <option value="Quận 3">Quận 3</option>
                </select>
                <span class="error" v-if="errors[0]">@{{ errors[0] }}</span>
            </validation-provider>

        </div>

    </div>
</div>