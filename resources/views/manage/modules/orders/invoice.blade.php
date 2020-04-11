@extends('manage.master')
@section('title', 'Đơn hàng chi tiết - #' . format_order_id($record->id))
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content page-content-invoice">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{ route('manage.orders.index') }}">Danh sách đơn hàng</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Đơn hàng chi tiết - #{{ format_order_id($record->id) }}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- END PAGE HEADER-->
      <div class="invoice">
        <div class="row invoice-logo">
          <div class="col-xs-6 invoice-logo-space">
            @if(!empty($store_info->company_logo))
              <img class="img-responsive" src="{{ asset(UPLOAD_SETTING . $store_info->company_logo) }}" alt="{{ $store_info->subtitle }}" style="max-width: 200px" />
            @endif
          </div>
          <div class="col-xs-6">
            <p>Mã đơn hàng: #{{ format_order_id($record->id) }}</p>
            <p>Đặt hàng: {{ format_date($record->delivered_at, '%d/%m/%Y') }}</p>
          </div>
        </div>
        <hr/>
        @php $deliveries = $record->deliveries; @endphp
        <div class="row">
          <div class="col-xs-4">
            <h3>Thông tin người mua:</h3>
            <ul class="list-unstyled">
              <li> {{ $deliveries->buyer_name }} - <strong>{{ $deliveries->buyer_phone_1 }}</strong></li>
              <li> {{ $deliveries->buyer_address }}</li>
            </ul>
          </div>
          <div class="col-xs-4">
            <h3>Thông tin nhận hàng</h3>
            <ul class="list-unstyled">
              <li> {{ $deliveries->receiver_name }} - <strong>{{ $deliveries->receiver_phone_1 }}</strong></li>
              <li> {{ $deliveries->receiver_address_1 }}</li>
            </ul>
          </div>
          <div class="col-xs-4 invoice-payment">
            <h3>Phương thức thanh toán</h3>
            <ul class="list-unstyled">
              <li><strong>{{ __('selector.payment.'.$record->payment_id) }}</strong></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            @php $order_products = $record->products; @endphp
            <table class="table table-striped table-hover">
              <thead>
              <tr>
                <th>STT</th>
                <th> Sản phẩm </th>
                <th> Đơn giá </th>
                <th> Số lượng </th>
                <th> Thành tiền </th>
              </tr>
              </thead>
              <tbody>
              @php $totalPrice = 0 @endphp
              @if($order_products->count())
                @php $count = 0; @endphp
                @foreach($order_products as $product)
                  @php
                    $count++;
                    $total_include_tax =  $product->price * $product->quantity;
                    $totalPrice += $total_include_tax;
                  @endphp
                  <tr>
                    <td> {{ $count }} </td>
                    <td> {{ $product->name }} </td>
                    <td> {{ format_price($product->price) }} </td>
                    <td> {{ $product->quantity }} </td>
                    <td> {{ format_price($total_include_tax)}} </td>
                  </tr>
                @endforeach
              @endif
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <div class="well">
              <address>
                <strong>Thông tin cửa hàng</strong> <br/>
                {{ $store_info->company_name }}
                <br/> {{ $store_info->company_address }}
                <br/> <a href="mailto:{{ $store_info->email1 }}"> {{ $store_info->email1 }} </a>
                <br/><abbr title="Phone">P:</abbr> {{ $store_info->company_tel }}
              </address>
            </div>
          </div>
          <div class="col-xs-8 invoice-block">
            @php $grand_total = $totalPrice + $record->delivery_fee; @endphp
            <ul class="list-unstyled amounts">
              <li><strong>Tổng tiền:</strong> {{ format_price($totalPrice) }} </li>
              <li><strong>Phí vận chuyển:</strong> {{ format_price($record->delivery_fee) }} </li>
              <li><strong>Tổng thanh toán:</strong> {{ format_price($grand_total) }} </li>
            </ul>
            <br/>
            <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> In hóa đơn
              <i class="fa fa-print"></i>
            </a>
            <a class="btn btn-lg green hidden-print margin-bottom-5" href="{{ route('manage.orders.invoice.pdf', ['id' => $record->id]) }}"> Xuất hóa đơn Pdf<i class="fa fa-check"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- END CONTENT BODY -->
  </div>

@endsection
@section('styles')
  @parent
  <link href="{{ asset('/manages/assets/pages/css/invoice.min.css') }}" rel="stylesheet" type="text/css" />
@stop