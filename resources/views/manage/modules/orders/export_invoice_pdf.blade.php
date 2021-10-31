<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Đơn hàng chi tiết - #{{ format_order_id($record->id) }}</title>
  <link href="{{ asset('/css/manage/app.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/pages/css/invoice.min.css') }}" rel="stylesheet" type="text/css" />
  <style>
    body {
      background: transparent;
    }
    .page-content-wrapper .page-content {
      margin: 0;
    }
    .invoice table {
      margin: 0;
    }

    .border-dotted {
      border-top: 1px dotted #000;
    }
    .invoice .invoice-logo-space {
      margin: 0;
    }
    h3 {
      font-size: 18px;
    }
    @page {
      header: page-header;
      footer: page-footer;
    }
    table tr th {
      font-weight: bold !important;
    }
    table tr th, table tr td {
      padding: 5px;
      line-height: 1.42857;
      vertical-align: top;
    }
    .invoice .invoice-logo p {
      font-size: 13px !important;
      line-height: 20px !important;
      margin: 0;
      text-align: left;
    }
    .invoice .invoice-logo img {
      width: 250px;
      height: 80px;
    }
  </style>
</head>
<body>
<div class="page-content-wrapper">
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content page-content-invoice">
    <div class="invoice">
      <div class="row invoice-logo">
        <div class="col-xs-5 invoice-logo-space">
          @if(!empty($store_info->company_logo))
              <img class="img-responsive" src="{{ Storage::url($store_info->company_logo) }}" alt="{{ $store_info->subtitle }}" style="max-width: 200px" />
          @endif
        </div>
        <div class="col-xs-offset-1 col-xs-5 text-left">
          <img src="{{ asset('/storage/barcode/' . strtolower(format_order_id($record->id).'c128.png')) }}" alt="{{$record->id}}" style="width: 200px; height: 50px"/>
          <p>
            Mã đơn vận: {{ format_order_id($record->id) }} <br/>
            Mã đơn hàng: <strong>{{ format_order_id($record->id) }}</strong>
          </p>
        </div>
      </div>
      <div class="border-dotted"></div>
      @php $deliveries = $record->deliveries; @endphp
      <div class="row">
        <div class="col-xs-5">
          <h3>Thông tin người mua:</h3>
          <ul class="list-unstyled">
            <li> {{ $deliveries->buyer_name }} - {{ $deliveries->buyer_phone_1 }}</li>
            <li> {{ $deliveries->buyer_address }}</li>
          </ul>
        </div>
        <div class="col-xs-offset-1 col-xs-5">
          <h3>Thông tin nhận hàng</h3>
          <ul class="list-unstyled">
            <li> {{ $deliveries->receiver_name }} - {{ $deliveries->receiver_phone_1 }}</li>
            <li> {{ $deliveries->receiver_address_1 }}</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          @php $order_products = $record->products; @endphp
          <table class="table table-striped table-hover"  border="1" autosize="1" style="overflow: wrap">
            <thead>
            <tr>
              <th width="5%" class="text-center">STT</th>
              <th width="40%"> Sản phẩm </th>
              <th width="13%"> Đơn giá </th>
              <th width="10%" class="text-center"> Số lượng </th>
              <th width="15%"> Thành tiền </th>
            </tr>
            </thead>
            <tbody>
            @php $total = 0 @endphp
            @if($order_products->count())
              @php $count = 0; @endphp
              @foreach($order_products as $product)
                @php
                  $count++;
                  $total_include_tax =  $product->price * $product->quantity;
                  $total += $total_include_tax;
                @endphp
                <tr>
                  <td class="text-center"> {{ $count }} </td>
                  <td> {{ $product->name }} </td>
                  <td> {{ format_price($product->price) }} </td>
                  <td class="text-center"> {{ $product->quantity }} </td>
                  <td> {{ format_price($total_include_tax) }} </td>
                </tr>
              @endforeach
            @endif
            </tbody>
            @php $grand_total = $total + $record->delivery_fee; @endphp
            <tfoot>
              <tr>
                <td colspan="4" class="text-right"><strong>Tổng tiền:</strong></td>
                <td>{{format_price($total) }}</td>
              </tr>
              <tr>
                <td colspan="4" class="text-right"><strong>Phí vận chuyển: </strong></td>
                <td>{{format_price($record->delivery_fee) }}</td>
              </tr>
              <tr>
                <td colspan="4" class="text-right"><strong>Tổng thanh toán: </strong></td>
                <td>{{format_price($grand_total) }}</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- END CONTENT BODY -->
</div>
</body>
</html>
