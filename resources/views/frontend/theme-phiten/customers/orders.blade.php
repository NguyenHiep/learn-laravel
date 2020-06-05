@extends('frontend.theme-phiten.template')

@section('title', 'Đơn hàng của tôi - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Đơn hàng của tôi -Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Đơn hàng của tôi - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('content')
    <div class="entry-breadcrumb">
        <div class="container">
            <ul class="list-inline breadcrumbs">
                <li><a href="http://phiten.dev.nguyenhiep"><i class="icon icon-home" aria-hidden="true"></i></a></li>
                <li><a href="account">Tài khoản của tôi</a></li>
                <li class="active">Đơn hàng của tôi</li>
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
                            <div class="index-table">
                                <div class="wrap-table">
                                    <table class="table-cart productListCart">
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
                                                <a href="account/orders/cancel/46"
                                                   class="btn-custom">Hủy đơn</a>
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
                                                <a href="account/orders/cancel/45"
                                                   class="btn-custom">Hủy đơn</a>
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
                                                <a href="account/orders/cancel/44"
                                                   class="btn-custom">Hủy đơn</a>
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
                                                <a href="account/orders/cancel/43"
                                                   class="btn-custom">Hủy đơn</a>
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
                                                <a href="account/orders/cancel/42"
                                                   class="btn-custom">Hủy đơn</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#41</td>
                                            <td>Dec 12, 2019</td>
                                            <td>Đang chờ xử lý</td>
                                            <td>1.300.000&nbsp;₫</td>
                                            <td>
                                                <a href="account/orders/41"
                                                   class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                   rel="tooltip">
                                                    <i class="icon icon-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="account/orders/cancel/41"
                                                   class="btn-custom">Hủy đơn</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#40</td>
                                            <td>Dec 12, 2019</td>
                                            <td>Đang chờ xử lý</td>
                                            <td>4.140.000&nbsp;₫</td>
                                            <td>
                                                <a href="account/orders/40"
                                                   class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                   rel="tooltip">
                                                    <i class="icon icon-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="account/orders/cancel/40"
                                                   class="btn-custom">Hủy đơn</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#39</td>
                                            <td>Dec 12, 2019</td>
                                            <td>Đang chờ xử lý</td>
                                            <td>2.600.000&nbsp;₫</td>
                                            <td>
                                                <a href="account/orders/39"
                                                   class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                   rel="tooltip">
                                                    <i class="icon icon-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="account/orders/cancel/39"
                                                   class="btn-custom">Hủy đơn</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#38</td>
                                            <td>Dec 12, 2019</td>
                                            <td>Đang chờ xử lý</td>
                                            <td>9.660.000&nbsp;₫</td>
                                            <td>
                                                <a href="account/orders/38"
                                                   class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                   rel="tooltip">
                                                    <i class="icon icon-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="account/orders/cancel/38"
                                                   class="btn-custom">Hủy đơn</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#37</td>
                                            <td>Dec 12, 2019</td>
                                            <td>Đang chờ xử lý</td>
                                            <td>1.950.000&nbsp;₫</td>
                                            <td>
                                                <a href="account/orders/37"
                                                   class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                   rel="tooltip">
                                                    <i class="icon icon-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="account/orders/cancel/37"
                                                   class="btn-custom">Hủy đơn</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#36</td>
                                            <td>Dec 12, 2019</td>
                                            <td>Đang chờ xử lý</td>
                                            <td>8.280.000&nbsp;₫</td>
                                            <td>
                                                <a href="account/orders/36"
                                                   class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                   rel="tooltip">
                                                    <i class="icon icon-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="account/orders/cancel/36"
                                                   class="btn-custom">Hủy đơn</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#32</td>
                                            <td>Dec 11, 2019</td>
                                            <td>Đang chờ xử lý</td>
                                            <td>1.300.000&nbsp;₫</td>
                                            <td>
                                                <a href="account/orders/32"
                                                   class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                   rel="tooltip">
                                                    <i class="icon icon-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="account/orders/cancel/32"
                                                   class="btn-custom">Hủy đơn</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#31</td>
                                            <td>Dec 11, 2019</td>
                                            <td>Đang chờ xử lý</td>
                                            <td>1.950.000&nbsp;₫</td>
                                            <td>
                                                <a href="account/orders/31"
                                                   class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                   rel="tooltip">
                                                    <i class="icon icon-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="account/orders/cancel/31"
                                                   class="btn-custom">Hủy đơn</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#29</td>
                                            <td>Nov 30, 2019</td>
                                            <td>Đã hủy</td>
                                            <td>2.030.000&nbsp;₫</td>
                                            <td>
                                                <a href="account/orders/29"
                                                   class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                   rel="tooltip">
                                                    <i class="icon icon-eye" aria-hidden="true"></i>
                                                </a>
                                                <span class="btn-custom">Hủy đơn</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#25</td>
                                            <td>Nov 29, 2019</td>
                                            <td>Đã hoàn thành</td>
                                            <td>3.480.000&nbsp;₫</td>
                                            <td>
                                                <a href="account/orders/25"
                                                   class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                   rel="tooltip">
                                                    <i class="icon icon-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="account/orders/cancel/25"
                                                   class="btn-custom">Hủy đơn</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="pull-right">
                                <ul class="pagination" role="navigation">

                                    <li class="page-item disabled" aria-disabled="true"
                                        aria-label="pagination.previous">
                                        <span class="page-link" aria-hidden="true">‹</span>
                                    </li>


                                    <li class="page-item active" aria-current="page"><span class="page-link">1</span>
                                    </li>
                                    <li class="page-item"><a class="page-link"
                                                             href="account/orders?page=2">2</a>
                                    </li>


                                    <li class="page-item">
                                        <a class="page-link" href="account/orders?page=2"
                                           rel="next" aria-label="pagination.next">›</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
