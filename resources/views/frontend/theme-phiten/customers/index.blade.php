@extends('frontend.theme-phiten.template')

@section('title', 'Bảng điều khiển - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Bảng điều khiển -Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Bảng điều khiển - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush
@section('breadcrumb')
    <li class="active">Tài khoản của tôi</li>
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
                            <div class="my-dashboard">
                                <div class="recent-orders index-table">
                                    <h5 class="section-header">
                                        Những đơn đặt hàng gần đây
                                        <a href="{{ route('customer.orders') }}" class="pull-right">
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
                                            @if($listOrders->isNotEmpty())
                                                @foreach($listOrders as $order)
                                                    <tr>
                                                        <td>#{{ format_order_id($order->id)}}</td>
                                                        <td>{{ format_date($order->ordered_at) }}</td>
                                                        <td> {{ __('selector.orders.status.' . $order->status) }}</td>
                                                        <td> {{ format_price($order->total) }}</td>
                                                        <td>
                                                            <a href="{{ route('customer.orders.detail', $order->id) }}"
                                                               class="btn-view" data-toggle="tooltip"
                                                               title="Xem đơn hàng"
                                                               rel="tooltip">
                                                                <i class="icon icon-eye" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
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
                                                <span>{{ $customer->full_name }}</span>
                                                <span>{{ $customer->email }}</span>
                                                <a href="{{ route('customer.profile') }}">Chỉnh sửa</a>
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
