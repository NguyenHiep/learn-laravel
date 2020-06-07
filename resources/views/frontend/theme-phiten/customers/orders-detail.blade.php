@extends('frontend.theme-phiten.template')

@section('title', 'Xem đơn hàng - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Xem đơn hàng -Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Xem đơn hàng - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('breadcrumb')
    <li><a href="{{ route('customer.profile') }}">Tài khoản của tôi</a></li>
    <li><a href="{{ route('customer.orders') }}">Đơn hàng của tôi</a></li>
    <li class="active">Xem đơn hàng</li>
@endsection

@section('content')
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
                                                    <td>{{ $order->deliveries->buyer_phone_1 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email:</td>
                                                    <td>{{ $order->deliveries->buyer_email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ngày:</td>
                                                    <td>{{ format_date($order->ordered_at) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Phương thức thanh toán:</td>
                                                    <td>{{ __('selector.payment.' . $order->payment_id) }}</td>
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
                                        <span>{{ $order->deliveries->buyer_address }}</span>
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="order-address">
                                    <h5><b>Địa chỉ giao hàng</b></h5>
                                    <p>
                                        <span>{{ $order->deliveries->receiver_address_1 }}</span>
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
                                            <th>Thành tiền</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->products as $product)
                                            <tr>
                                                <td>
                                                    <h6>
                                                        <a href="{{ route('product.show', ['slug' => \Illuminate\Support\Str::slug($product->name)]) }}">{{ $product->name }}</a>
                                                    </h6>
                                                </td>

                                                <td>
                                                    <label class="visible-xs">Đơn giá:</label>
                                                    <span class="price">{{ format_price($product->price) }}</span>
                                                </td>

                                                <td>
                                                    <label class="visible-xs">Số lượng:</label>
                                                    <span>{{ $product->quantity }}</span>
                                                </td>

                                                <td>
                                                    <label class="visible-xs">Thành tiền:</label>
                                                    <span class="price">
                                                        @php $price = $product->price * $product->quantity @endphp
                                                        {{ format_price($price) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="total-wrapper col-12 col-lg-3 pull-right">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td><b>Tổng tiền</b></td>
                                        <td><span class="price">{{ format_price($order->sub_total) }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Phí vận chuyển</td>
                                        <td><span class="price">{{ format_price($order->delivery_fee) }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tổng thanh toán</b></td>
                                        <td><span class="price">{{ format_price($order->total) }}</span></td>
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
