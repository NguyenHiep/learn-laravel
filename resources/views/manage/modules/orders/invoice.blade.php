@extends('manage.master')
@section('title', 'Hóa đơn đơn hàng - ID#'.$record->id)
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content page-content-invoice">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{ route('orders.index') }}">Danh sách đơn hàng</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Xuất hóa đơn</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> Hóa đơn</h3>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="invoice">
        <div class="row invoice-logo">
          <div class="col-xs-6 invoice-logo-space">
            <img src="{{ asset('manages/assets/pages/media/invoice/walmart.png') }}" class="img-responsive" alt="" /> </div>
          <div class="col-xs-6">
            <p> ID#{{ $record->id }} - {{ format_date($record->delivered_at) }}</p>
          </div>
        </div>
        <hr/>
        @php $deliveries = $record->deliveries; @endphp
        <div class="row">
          <div class="col-xs-4">
            <h3>Thông tin thanh toán:</h3>
            <ul class="list-unstyled">
              <li> {{ $deliveries->buyer_name }}</li>
              <li> {{ $deliveries->buyer_email }}</li>
              <li> {{ $deliveries->buyer_phone_1 }}</li>
              <li> {{ $deliveries->buyer_address }}</li>
            </ul>
          </div>
          <div class="col-xs-4">
            <h3>Thông tin giao hàng</h3>
            <ul class="list-unstyled">
              <li> {{ $deliveries->receiver_name }}</li>
              <li> {{ $deliveries->receiver_email }}</li>
              <li> {{ $deliveries->receiver_phone_1 }}</li>
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
                <th> Số lượng </th>
                <th> Thuế </th>
                <th> Giá </th>
                <th> Giá có thuế </th>
                <th> Tổng </th>
              </tr>
              </thead>
              <tbody>
              @if($order_products->count())
                @php $count = 0; @endphp
                @foreach($order_products as $product)
                  @php
                    $count++;
                    $price_include_tax =  $product->price * (($record->tax_rate / 100) + 1);
                    $total_include_tax =  $price_include_tax * $product->quantity;
                  @endphp
                  <tr>
                    <td> {{ $count }} </td>
                    <td> {{ $product->name }} </td>
                    <td> {{ $product->quantity }} </td>
                    <td> {{ $record->tax_rate}}% </td>
                    <td> {{ format_price($product->price) }} </td>
                    <td> {{ format_price($price_include_tax)}} </td>
                    <td> {{ format_price($total_include_tax) }} </td>
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
            @php $grand_total = $record->total + $record->delivery_fee; @endphp
            <ul class="list-unstyled amounts">
              <li><strong>Tổng tiền:</strong> {{ format_price($record->sub_total) }} </li>
              <li><strong>Phí vận chuyển:</strong> {{ format_price($record->delivery_fee) }} </li>
              <li><strong>VAT:</strong> 10%</li>
              <li><strong>Tổng tiền có thuế:</strong> {{ format_price($record->total) }} </li>
              <li><strong>Tổng tiền phải trả:</strong> {{ format_price($grand_total) }} </li>
            </ul>
            <br/>
            <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> In hóa đơn
              <i class="fa fa-print"></i>
            </a>
            <a class="btn btn-lg green hidden-print margin-bottom-5"> Xuất hóa đơn<i class="fa fa-check"></i></a>
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
  <!-- END PAGE LEVEL PLUGINS -->
@stop
@section('scripts')
  @parent
  
@stop