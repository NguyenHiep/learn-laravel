@extends('frontend.theme-phiten.template')

@section('title', 'Nhận xét của tôi - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Nhận xét của tôi -Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Nhận xét của tôi - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('breadcrumb')
    <li><a href="{{ route('customer.profile') }}">Tài khoản của tôi</a></li>
    <li class="active">Nhận xét của tôi</li>
@endsection

@section('content')
    <main id="main" class="page-account">
        <div class="container">
            <div class="content-wrapper clearfix ">

                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        @includeIf('frontend.theme-phiten.customers.sidebar')
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <div class="content-right formaccount">
                            <div class="index-table">
                                <div class="wrap-table">
                                    <table class="table-cart productListCart">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Sản phẩm</th>
                                            <th>Xếp hạng</th>
                                            <th>Ngày</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="image-holder">
                                                    <img src="storage/media/rpxqFY6WAHGQ1Id0i0Ln6CflFZh5KVn1lqr93kZr.jpeg">
                                                </div>
                                            </td>

                                            <td>
                                                <a href="product/phiten-rakuwa-shirt-sport-half-sleeve1">Áo
                                                    thun thể thao Rakuwa Phiten tay ngắn</a>
                                            </td>

                                            <td>
                                    <span class="product-rating">
    <i class="icon icon-star-full rated"></i>
    <i class="icon icon-star-full rated"></i>
    <i class="icon icon-star-full rated"></i>
    <i class="icon icon-star-full rated"></i>
    <i class="icon icon-star-full rated"></i>
</span>
                                            </td>

                                            <td>Oct 28, 2019</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="image-holder">
                                                    <img src="storage/media/rpxqFY6WAHGQ1Id0i0Ln6CflFZh5KVn1lqr93kZr.jpeg">
                                                </div>
                                            </td>

                                            <td>
                                                <a href="product/phiten-rakuwa-shirt-sport-half-sleeve1">Áo
                                                    thun thể thao Rakuwa Phiten tay ngắn</a>
                                            </td>

                                            <td>
                                    <span class="product-rating">
    <i class="icon icon-star-full rated"></i>
    <i class="icon icon-star-full rated"></i>
    <i class="icon icon-star-full rated"></i>
    <i class="icon icon-star-full rated"></i>
    <i class="icon icon-star-full rated"></i>
</span>
                                            </td>

                                            <td>Nov 12, 2019</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="image-holder">
                                                    <img src="storage/media/AlXxQys1glwsefDSiOpeu3Hhqx9yLGmeoFxW0pgk.jpeg">
                                                </div>
                                            </td>

                                            <td>
                                                <a href="product/phiten-rakuwa-necklace-wire-model-air2">Vòng
                                                    cổ Phiten Rakuwa Wire Model Air</a>
                                            </td>

                                            <td>
                                    <span class="product-rating">
    <i class="icon icon-star-full rated"></i>
    <i class="icon icon-star-full rated"></i>
    <i class="icon icon-star-full rated"></i>
    <i class="icon icon-star-full rated"></i>
    <i class="icon icon-star-full rated"></i>
</span>
                                            </td>

                                            <td>Dec 1, 2019</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="pull-right">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
