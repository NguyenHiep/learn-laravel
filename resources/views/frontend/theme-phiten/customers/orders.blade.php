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
                        <div class="content-right formaccount clearfix">
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
                                        @if($listOrders->total() > 1)
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
                                        @foreach($listOrders as $order)
                                            <tr>
                                                <td>#{{ format_order_id($order->id)}}</td>
                                                <td>{{ format_date($order->ordered_at) }}</td>
                                                <td> {{ __('selector.orders.status.' . $order->status) }}</td>
                                                <td> {{ format_price($order->total) }}</td>
                                                <td>
                                                    <a href="{{ route('customer.orders.detail', $order->id) }}"
                                                       class="btn-view" data-toggle="tooltip" title="Xem đơn hàng"
                                                       rel="tooltip">
                                                        <i class="icon icon-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="{{ route('customer.orders.cancel', $order->id) }}"
                                                       class="btn-custom">Hủy đơn</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="pull-right">
                                @if($listOrders->lastPage() > 1)
                                    {{ $listOrders->appends(request()->query())->links('vendor.pagination.bootstrap-4')  }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
