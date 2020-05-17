@extends('frontend.theme-phiten.template')

@section('title', 'Thanh toán - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="hanh toán - Shop chuyên cung cấp sỉ và lẻ quần áo">
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
                        <li role="presentation" class="address-tab active">
                            <h3>
                                <a href="#address" data-toggle="tab" aria-controls="step1" role="tab" data-step="1">
                                    <img src="{{ asset('theme-phiten/assets/images/svg/shipping-address.svg') }}" alt="">Địa chỉ
                                </a>
                            </h3>
                        </li>
                        <li role="presentation" class="disabled confirm-tab">
                            <h3>
                                <a href="#confirm" data-toggle="tab" aria-controls="step3" role="tab" data-step="3">
                                    <img src="{{ asset('theme-phiten/assets/images/svg/review-order.svg') }}" alt="review-order.svg">Xác nhận
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
                            <form method="POST" action="/checkout/stored" id="checkout-form">
                                <input type="hidden" name="_token" value="GoSbuZ5t3bUpRtLcZmMSF77iPxLhkHcSWwVTm2yX">
                                <div class="row ">
                                    <!-- end sidebar right -->
                                    <div class="col-md-8 col-sm-6">
                                        <div class="tab-content">
                                            <div id="address" class="tab-pane active" role="tabpanel">
                                                @includeIf('frontend.theme-phiten.checkout._includes.shipping')
                                            </div>

                                            <div id="confirm" class="tab-pane" role="tabpanel">
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
                        </div>
                    </section>
                </div>
            </div>

        </main>
    </div>
@endsection