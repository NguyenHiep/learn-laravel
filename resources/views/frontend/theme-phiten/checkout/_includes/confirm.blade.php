<div class="sidebar sidebar-content">
    <div class="widget widget-address">
        <div class="widget-title"> Địa chỉ thanh toán</div>
        <div class="widget-content">
            <div class="rowlabel label-150">
                <div class="item">
                    <div class="title">Tên:</div>
                    <div class="text text_name">@{{ billing.full_name }}</div>
                </div>
                <div class="item">
                    <div class="title">Email:</div>
                    <div class="text text_email">@{{ billing.customer_email }}</div>
                </div>
                <div class="item">
                    <div class="title">Điện thoại:</div>
                    <div class="text text_phone">@{{ billing.customer_phone }}</div>
                </div>
                <div class="item">
                    <div class="title">Địa chỉ:</div>
                    <div class="text text_address">@{{ billing.address }}</div>
                </div>
                <div class="item">
                    <div class="title">Quận/huyện:</div>
                    <div class="text text_billing_district">@{{ billing.city }}</div>
                </div>
                <div class="item">
                    <div class="title">Bang /Tỉnh:</div>
                    <div class="text text_billing_state">@{{ billing.state }}</div>
                </div>

            </div>
        </div>
    </div>
    <!--End widget-->
    <div class="widget widget-address confirm-shipping-address" :class="!different_address ? 'hide' : ''">
        <div class="widget-title"> Địa chỉ giao hàng</div>
        <div class="widget-content">
            <div class="rowlabel label-150">
                <div class="item">
                    <div class="title">Tên:</div>
                    <div class="text shipping_text_firstname">@{{ shipping.full_name }}</div>
                </div>
                <div class="item">
                    <div class="title">Địa chỉ:</div>
                    <div class="text shipping_text_address">@{{ shipping.address }}</div>
                </div>
                <div class="item">
                    <div class="title">Phone:</div>
                    <div class="text shipping_text_phone">@{{ shipping.phone }}</div>
                </div>

                <div class="item">
                    <div class="title">Quận/huyện:</div>
                    <div class="text shipping_text_city">@{{ shipping.city }}</div>
                </div>

                <div class="item">
                    <div class="title">Thành phố:</div>
                    <div class="text shipping_text_state">@{{ shipping.state }}</div>
                </div>
            </div>
        </div>
    </div>
    <!--End widget-->
    <div class="widget widget-address">
        <div class="widget-title">Phương thức thanh toán</div>
        <div class="widget-content text_payment">@{{ billing.payment_method }}</div>
    </div> <!--End widget-->
</div>

<div class="paging-cart hidden-xs">
    <a class="prev prev-step" @click="redirectStepOrder(STEP_REGISTER)">
        <i class="icon-arrow-14"></i>Quay trở lại
    </a>
</div>