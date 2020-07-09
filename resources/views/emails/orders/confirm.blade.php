@extends('emails.template')
@php
    $order = $content['order'] ?? null;
@endphp
@section('styles')
    <style>
        .wrap-table {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px
        }

        table#order_confirm {
            background-color: #f2f2f2;
            width: 600px !important;
            color: #444;
            line-height: 18px
        }

        table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        table, td, th {
            border: 0
        }

        table td, table th {
            padding: 0
        }

        td.td-custom {
            color: #444;
            line-height: 18px;
            font-weight: 400
        }

        .text-right {
            text-align: right !important
        }

        .title {
            text-align: left;
            background-color: #02acea;
            padding: 6px 9px;
            color: #fff;
            line-height: 14px
        }

        td.item-product {
            text-align: left;
            padding: 3px 9px;
            vertical-align: top
        }

        .address-info {
            text-align: left;
            padding: 6px 9px 0 9px;
            color: #444;
            font-weight: 700;
            width: 50%
        }

        tr.total-summary {
            background-color: #eee;
            font-size: larger
        }

        tr.total-item td {
            padding: 7px 9px;
            text-align: right
        }

        .tfoot-table {
            color: #444;
            line-height: 18px
        }

        .price-item {
            text-align: right;
            vertical-align: top;
            padding: 3px 9px
        }

        .note {
            margin: 4px 0;
            color: #444;
            line-height: 18px;
            font-weight: 400;
            font-style: italic
        }

        .tbody-table {
            color: #444;
            line-height: 18px;
            background-color: #eee
        }

        table.order-detail {
            background: #f5f5f5;
            width: 100%
        }

        .title-heading {
            text-align: left;
            margin: 10px 0;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
            font-size: 13px;
            color: #02acea;
            text-transform: uppercase
        }

        .line-border {
            border-bottom: 3px solid #00b7f1;
            padding-bottom: 10px;
            background-color: #fff
        }

        .info-additional, .info-payment, .info-shipping {
            padding: 3px 9px 9px 9px;
            border-top: 0;
            color: #444;
            line-height: 18px;
            font-weight: 400;
            vertical-align: top
        }

        .create-order {
            font-size: 12px;
            color: #777;
            text-transform: none;
            font-weight: normal
        }
    </style>
@endsection
@section('content')
    @if(!empty($order))
        <section class="wrap-table">
            <table id="order_confirm">
                <tbody>
                <tr>
                    <td align="center" valign="top" class="td-custom">
                        <table style="margin-top:15px">
                            <tbody>
                            <tr style="background:#fff">
                                <td align="left" height="auto" style="padding:15px" width="600">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td>
                                                @if(!empty($settings) && !empty($settings->company_logo) && !empty($settings->params['enable_show_logo_site']))
                                                    <a href="{{ route('home') }}" id="logo" target="_blank"><img width="40%" src="{{ asset(UPLOAD_SETTING . $settings->company_logo) }}" alt="{{ $settings->subtitle }}"></a>
                                                @endif
                                                <div class="line-border"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h1 class="title-heading">
                                                    Thông tin đơn hàng #{{ format_order_id($order->id) }}
                                                    {{--                                                <span class="create-order">(Ngày 16 Tháng 03 Năm 2020 14:37:47)</span>--}}
                                                    <span class="create-order">({{ format_date($order->ordered_at) }})</span>
                                                </h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th class="address-info">Thông tin thanh toán</th>
                                                        <th class="address-info"> Địa chỉ giao hàng</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="info-payment">
                                                            <span style="text-transform:capitalize">{{ $order->deliveries->buyer_name }}</span><br>
                                                            @if(!empty( $order->deliveries->buyer_email))
                                                                <a href="mailto:{{ $order->deliveries->buyer_email }}" target="_blank">{{ $order->deliveries->buyer_email }}</a>
                                                                <br/>
                                                            @endif
                                                            @if(!empty($order->deliveries->buyer_phone_1))
                                                                {{ $order->deliveries->buyer_phone_1 }}
                                                            @endif
                                                        </td>
                                                        <td class="info-shipping">
                                                            <span style="text-transform:capitalize">{{ $order->deliveries->receiver_name }}</span><br>
                                                            <br>
                                                            @if(!empty( $order->deliveries->receiver_address_1))
                                                                {{ $order->deliveries->receiver_address_1 }}<br/>
                                                            @endif
                                                            @if(!empty( $order->deliveries->receiver_phone_1))
                                                                T: {{ $order->deliveries->receiver_phone_1 }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="info-additional">
                                                            <p>
                                                                <strong>Phương thức thanh toán: </strong>{{ __('selector.payment.' . $order->payment_id) }}<br>
                                                                <strong>Thời gian giao hàng dự kiến:</strong> {{ format_date($order->delivered_at) }}<br>
                                                                <strong>Phí vận chuyển: </strong> {{ format_price($order->delivery_fee) }}<br>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="note">
                                                <p>Lưu ý: Đối với đơn hàng đã được thanh toán trước, nhân viên giao nhận có
                                                    thể yêu cầu người nhận hàng cung cấp CMND / giấy phép lái xe để chụp ảnh
                                                    hoặc ghi lại thông tin.
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="title-heading">CHI TIẾT ĐƠN HÀNG</h2>
                                                <table class="order-detail">
                                                    <thead>
                                                    <tr>
                                                        <th class="title">Sản phẩm</th>
                                                        <th class="title">Đơn giá</th>
                                                        <th class="title">Số lượng</th>
                                                        <th class="title">Giảm giá</th>
                                                        <th class="title text-right">Tổng tạm</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="tbody-table">
                                                    @if($order->products->isNotEmpty())
                                                        @foreach($order->products as $product)
                                                            <tr>
                                                                <td class="item-product">
                                                                    <span>{{ $product->name }}</span>
                                                                </td>
                                                                <td class="item-product">
                                                                    <span>{{ format_price($product->price) }}</span>
                                                                </td>
                                                                <td class="item-product">{{ $product->quantity }}</td>
                                                                <td class="item-product">
                                                                    <span>0đ</span>
                                                                </td>
                                                                <td class="price-item">
                                                                    <span>{{ format_price($product->price * $product->quantity) }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                    <tfoot class="tfoot-table">
                                                    <tr class="total-item">
                                                        <td colspan="4">Tạm tính</td>
                                                        <td><span>{{ format_price($order->sub_total) }}</span></td>
                                                    </tr>
                                                    <tr class="total-item">
                                                        <td colspan="4">Phí vận chuyển
                                                        </td>
                                                        <td><span>{{ format_price($order->delivery_fee) }}</span></td>
                                                    </tr>
                                                    <tr class="total-item total-summary">
                                                        <td colspan="4">
                                                            <strong>Tổng giá trị đơn hàng</strong></td>
                                                        <td>
                                                            <strong><span>{{ format_price($order->total) }}</span></strong>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>
    @endif
@endsection