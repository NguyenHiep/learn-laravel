@extends('frontend.theme-phiten.template')

@section('title', 'Thanh toán - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Thanh toán - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('content')
    <div class="page-payment">
        <div class="entry-heading">
            <div class="container">
                <h1>Thanh toán</h1>
            </div>
        </div>
        <div class="entry-heading2">
            <div class="container">
                <div class="wizard">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" :class="step_process === STEP_REGISTER ? 'active' : ''" class="address-tab">
                            <h3>
                                <a href="#address" data-toggle="tab" aria-controls="step1" role="tab" data-step="1">
                                    <img src="{{ asset('theme-phiten/assets/images/svg/shipping-address.svg') }}" alt="shipping address"> Địa chỉ
                                </a>
                            </h3>
                        </li>
                        <li role="presentation" :class="step_process === STEP_CONFIRM ? 'active' : ''" class="confirm-tab">
                            <h3>
                                <a href="#confirm" data-toggle="tab" aria-controls="step3" role="tab" data-step="3">
                                    <img src="{{ asset('theme-phiten/assets/images/svg/review-order.svg') }}" alt="review order"> Xác nhận
                                </a>
                            </h3>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <main id="main">
            <div class="container">
                <div class="content-wrapper clearfix ">
                    <section class="checkout cart-index section">
                        <div class="container">
                            <validation-observer ref="formProcessOrder" v-slot="{ handleSubmit }">
                                <form method="POST" @submit.prevent="handleSubmit(checkoutCart)" id="checkout-form">
                                    @csrf
                                    <div class="row ">
                                        <!-- end sidebar right -->
                                        <div class="col-md-8 col-sm-6">
                                            <div class="tab-content">
                                                <div id="address" v-if="step_process === STEP_REGISTER" class="tab-pane" :class="step_process === STEP_REGISTER ? 'active' : ''" role="tabpanel">
                                                    @includeIf('frontend.theme-phiten.checkout._includes.shipping')
                                                </div>

                                                <div id="confirm" v-if="step_process === STEP_CONFIRM" class="tab-pane" :class="step_process === STEP_CONFIRM ? 'active' : ''" role="tabpanel">
                                                    @includeIf('frontend.theme-phiten.checkout._includes.confirm')
                                                </div>
                                                @includeIf('frontend.theme-phiten.checkout._includes.sidebar-mobile')
                                            </div>
                                        </div>

                                        <!-- sidebar right -->
                                        <div class="col-md-4 col-sm-6">
                                            @includeIf('frontend.theme-phiten.checkout._includes.sidebar')
                                        </div>

                                    </div>
                                </form>
                            </validation-observer>
                        </div>
                    </section>
                </div>
            </div>

        </main>
    </div>
@endsection

@push('scripts')
    <script>
      const STEP_REGISTER = 'register';
      const STEP_CONFIRM = 'confirm';
      const ORDER_URL = '@php echo route('checkout.save') @endphp';
      const STATE_URL = '@php echo route('checkout.state') @endphp';
      new Vue({
        el: '#wrapper',
        data: {
          locations: @json($locations),
          provinces: @json($provinces),
          shipping_provinces: @json($provinces),
          paymentOptions: @json($paymentOptions),
          different_address: false,
          billing: {
            payment_method: 1,
            state: '',
            city: '',
            notes: ''
          },
          shipping: {
            state: '',
            city: ''
          },
          step_process: STEP_REGISTER,
          checkout: false
        },
        created () {
          this.getListItemCart()
          @if(!empty($customer))
            this.getAddressCustomer()
          @endif
        },
        methods: {
          checkoutCart () {
            let self = this;
            self.step_process = STEP_CONFIRM
            if (self.checkout) {
              self.loading = true;
              let dataSend = {
                billing: self.billing,
                different_address: self.different_address,
                shipping: self.shipping
              }
              axios.post(ORDER_URL, dataSend).then(response => {
                let responseData = response.data
                self.loading = false
                showNotificationMessage(response.data)
                if (!_.isEmpty(responseData.data) && !_.isEmpty(responseData.data.redirectUrl)) {
                  window.location.href = responseData.data.redirectUrl
                }
              }).catch(error => {
                console.log(error)
                self.errored = true
              }).finally(() => self.loading = false)
            }
          },
          redirectStepOrder(stepName) {
            this.step_process = stepName;
          },
          changeState (stateId, action) {
            let self = this
            action = action || null
            if (!self.billing.state && !action) {
              return
            }

            if (!self.shipping.state && action && action !== 'customer') {
              return
            }
            let dataSend = { id: stateId }
            self.loading = true
            axios.post(STATE_URL, dataSend).then(response => {
              let responseData = response.data
              self.loading = false
              if (!_.isEmpty(responseData.data) && _.isArray(responseData.data.listState)) {
                if (_.isEmpty(action)) {
                  self.billing.city = ''
                  self.provinces = responseData.data.listState
                } else if (action === 'customer') {
                  console.log(self.billing);
                  self.provinces = responseData.data.listState
                } else if (action === 'shipping') {
                  self.shipping.city = ''
                  self.shipping_provinces = responseData.data.listState
                }
              }
            }).catch(error => {
              console.log(error)
              self.errored = true
            }).finally(() => self.loading = false)
          },
          getLocationName (key) {
            if (_.isEmpty(key)) {
              return
            }
            let currentLocation = _.find(this.locations, { 'code': key })
            if (!_.isEmpty(currentLocation) && _.isObject(currentLocation)) {
              return currentLocation.name
            }
          },
          getBillingStateName (key) {
            if (_.isEmpty(key)) {
              return
            }
            let currentState = _.find(this.provinces, { 'code': key })
            if (!_.isEmpty(currentState) && _.isObject(currentState)) {
              return currentState.name
            }
          },
          getShippingStateName (key) {
            if (_.isEmpty(key)) {
              return
            }
            let currentState = _.find(this.shipping_provinces, { 'code': key })
            if (!_.isEmpty(currentState) && _.isObject(currentState)) {
              return currentState.name
            }
          },
          getPaymentName (key) {
            if (!_.isInteger(key)) {
              return
            }
            let currentPayment = _.find(this.paymentOptions, { 'id': key })
            if (!_.isEmpty(currentPayment) && _.isObject(currentPayment)) {
              return currentPayment.name
            }
          },
          @if(!empty($customer))
          getAddressCustomer () {
            let customerInfo = {
              customer_email: '{{ $customer->email }}',
              full_name: '{{ $customer->last_name }} {{ $customer->first_name }}',
              address: '{{ $customer->address }}',
              customer_phone: '{{ $customer->phone }}',
              state: '{{ $customer->city_id }}',
              city: '{{ $customer->district_id }}'
            }
            this.billing = Object.assign(this.billing, customerInfo)
            this.changeState(customerInfo.state, 'customer')
          }
          @endif
        }
      })
    </script>
@endpush