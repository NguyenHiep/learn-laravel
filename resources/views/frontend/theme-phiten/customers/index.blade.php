@extends('frontend.theme-phiten.template')

@section('title', 'Bảng điều khiển - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Bảng điều khiển -Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Bảng điều khiển - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('content')
    <div class="entry-breadcrumb">
        <div class="container">
            <ul class="list-inline breadcrumbs">
                <li><a href="{{ route('home') }}"><i class="icon icon-home" aria-hidden="true"></i></a></li>
                <li class="active">Tài khoản của tôi</li>
            </ul>
        </div>
    </div>
    <main id="main" class="page-account">
        <div class="container">
            <div class="content-wrapper clearfix ">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        @includeIf('frontend.theme-phiten.customers.sidebar')
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <div class="content-right formaccount">
                            <div class="my-dashboard">
                                <div class="recent-orders index-table">
                                    <h5 class="section-header">
                                        Những đơn đặt hàng gần đây

                                        <a href="account/orders" class="pull-right">
                                            Xem tất cả
                                        </a>
                                    </h5>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>ID đơn hàng</th>
                                                <th>Ngày</th>
                                                <th>Trạng thái</th>
                                                <th>Tổng cộng</th>
                                                <th></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>#46</td>
                                                <td>Mar 12, 2020</td>
                                                <td>Đã hoàn thành</td>
                                                <td>6.900.000&nbsp;₫</td>
                                                <td>
                                                    <a href="account/orders/46"
                                                       class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                       rel="tooltip">
                                                        <i class="icon icon-eye" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#45</td>
                                                <td>Dec 12, 2019</td>
                                                <td>Đang chờ xử lý</td>
                                                <td>5.400.000&nbsp;₫</td>
                                                <td>
                                                    <a href="account/orders/45"
                                                       class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                       rel="tooltip">
                                                        <i class="icon icon-eye" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#44</td>
                                                <td>Dec 12, 2019</td>
                                                <td>Đang chờ xử lý</td>
                                                <td>1.760.000&nbsp;₫</td>
                                                <td>
                                                    <a href="account/orders/44"
                                                       class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                       rel="tooltip">
                                                        <i class="icon icon-eye" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#43</td>
                                                <td>Dec 12, 2019</td>
                                                <td>Đang chờ xử lý</td>
                                                <td>1.950.000&nbsp;₫</td>
                                                <td>
                                                    <a href="account/orders/43"
                                                       class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                       rel="tooltip">
                                                        <i class="icon icon-eye" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#42</td>
                                                <td>Dec 12, 2019</td>
                                                <td>Đang chờ xử lý</td>
                                                <td>650.000&nbsp;₫</td>
                                                <td>
                                                    <a href="account/orders/42"
                                                       class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                       rel="tooltip">
                                                        <i class="icon icon-eye" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="account-information clearfix ">
                                    <h5>Thông tin tài khoản</h5>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="contact-information">
                                                <span>Agency MangoAds</span>
                                                <span>info@mangoads.vn</span>

                                                <a href="account/profile">
                                                    Chỉnh sửa
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
