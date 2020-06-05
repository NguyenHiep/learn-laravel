@extends('frontend.theme-phiten.template')

@section('title', 'Xem đơn hàng - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Xem đơn hàng -Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Xem đơn hàng - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('content')
    <div class="entry-breadcrumb">
        <div class="container">
            <ul class="list-inline breadcrumbs">
                <li><a href="http://phiten.dev.nguyenhiep"><i class="icon icon-home" aria-hidden="true"></i></a></li>
                <li><a href="account">Tài khoản của tôi</a></li>
                <li><a href="account/orders">Đơn hàng của tôi</a></li>
                <li class="active">Xem đơn hàng</li>
            </ul>
        </div>
    </div>
    <main id="main">
        <div class="container">
            <div class="content-wrapper clearfix ">

                <div class="container">
                    <div class="orders-view-wrapper clearfix">
                        <div class="row">


                            <div class="col-md-6 col-sm-6">
                                <div class="order-details">
                                    <h5><b>Chi tiết đặt hàng</b></h5>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>Điện thoại:</td>
                                                <td>0923457673</td>
                                            </tr>

                                            <tr>
                                                <td>Email:</td>
                                                <td>info@mangoads.vn</td>
                                            </tr>

                                            <tr>
                                                <td>Ngày:</td>
                                                <td>Mar 12, 2020</td>
                                            </tr>

                                            <tr>
                                                <td>Phương thức thanh toán:</td>
                                                <td>Thanh toán bằng tiền mặt</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="order-address">
                                    <h5><b>Địa chỉ thanh toán</b></h5>
                                    <p>
                                        <span>Agency Agency</span>
                                        <span>123 abc</span>
                                        <span>123 abc</span>
                                        <span>Quận 5,  700000</span>
                                        <span>Vietnam</span>
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="order-address">
                                    <h5><b>Địa chỉ giao hàng</b></h5>
                                    <p>
                                        <span>Agency Agency</span>
                                        <span>123 abc</span>
                                        <span></span>
                                        <span>Quận 5,  700000</span>
                                        <span>Vietnam</span>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="row end">

                            <div class="cart-list col-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="hidden-xs">
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <h6>
                                                    <a href="product">
                                                        Tất bọc ống chân Phiten X30 (1 cặp)
                                                    </a>
                                                </h6>

                                            </td>

                                            <td>
                                                <label class="visible-xs">Đơn giá:</label>
                                                <span class="price">1.380.000&nbsp;₫</span>
                                            </td>

                                            <td>
                                                <label class="visible-xs">Số lượng:</label>
                                                <span>5</span>
                                            </td>

                                            <td>
                                                <label class="visible-xs">Đơn giá:</label>
                                                <span class="price">6.900.000&nbsp;₫</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="total-wrapper col-12 col-lg-3 pull-right">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td><b>Thành tiền</b></td>
                                        <td><span class="price">6.900.000&nbsp;₫</span></td>
                                    </tr>

                                    <tr>
                                        <td>Phí vận chuyển</td>
                                        <td><span class="price">0&nbsp;₫</span></td>
                                    </tr>


                                    <tr>
                                        <td><b>Tổng cộng</b></td>
                                        <td><span class="price">6.900.000&nbsp;₫</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
