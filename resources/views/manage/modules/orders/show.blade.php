@extends('manage.master')
@section('title', 'Chi tiết đơn hàng')
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{ route('orders.index') }}">Danh sách đơn hàng</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Đơn hàng chi tiết </span>
          </li>
        </ul>

      </div>
      <h3 class="page-title"> Đơn hàng chi tiết</h3>
      <div class="row">
        <div class="col-md-12">
          <!-- Begin: life time stats -->
          <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
              <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase"> Đơn hàng #{{ $record->id }}
                  <span class="hidden-xs">| {{ format_date($record->ordered_at) }} </span>
                 </span>
              </div>
              <div class="actions">
                <div class="btn-group btn-group-devided">
                  <a href="{{ route('orders.index') }}" class="btn default btn-circle">{{ __('common.buttons.cancel') }}</a>
                  <a class="btn green btn-circle " href="{{ route('orders.edit', ['id' => $record->id]) }}">Cập nhật đơn hàng</a>
                  <a  href="{{ route('orders.index') }}"  class="btn green btn-circle ">Gửi lại email</a>
                </div>
                <div class="btn-group">
                  <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                    <i class="fa fa-share"></i>
                    <span class="hidden-xs"> Công cụ </span>
                    <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                    <li>
                      <a href="{{ route('orders.invoice', ['id' => $record->id]) }}"> In hóa đơn</a>
                    </li>
                    <li class="divider"> </li>
                    <li>
                      <a href="javascript:;"> Xuất ra Excel </a>
                    </li>
                    <li>
                      <a href="javascript:;"> Xuất ra CSV </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="portlet-body">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="portlet yellow-crusta box">
                      <div class="portlet-title">
                        <div class="caption">
                          <i class="fa fa-cogs"></i>Đơn hàng chi tiết
                        </div>
                      </div>
                      <div class="portlet-body">
                        <div class="row static-info">
                          <div class="col-md-5 name"> Order id#: </div>
                          <div class="col-md-7 value"> {{ $record->id }}
                            <span class="label label-info label-sm"> Xác nhận email đã được gửi </span>
                          </div>
                        </div>
                        <div class="row static-info">
                          <div class="col-md-5 name"> Thời gian đặt hàng: </div>
                          <div class="col-md-7 value"> {{ format_date($record->ordered_at ) }} </div>
                        </div>
                        <div class="row static-info">
                          <div class="col-md-5 name"> Trạng thái đơn hàng: </div>
                          <div class="col-md-7 value">
                            <span class="label label-success label-sm">{{ __('selector.orders.status.'.$record->status) }}</span>
                          </div>
                        </div>
                        <div class="row static-info">
                          <div class="col-md-5 name"> Tổng cộng: </div>
                          <div class="col-md-7 value"> {{ format_price($record->total) }} </div>
                        </div>
                        <div class="row static-info">
                          <div class="col-md-5 name"> Phương thức thanh toán: </div>
                          <div class="col-md-7 value">{{ __('selector.payment.'.$record->payment_id) }}</div>
                        </div>
                        <div class="row static-info">
                          <div class="col-md-5 name"> Ghi chú đơn hàng: </div>
                          <div class="col-md-7 value"> {{ $record->note }} </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{--<div class="col-md-6 col-sm-12">
                    <div class="portlet blue-hoki box">
                      <div class="portlet-title">
                        <div class="caption">
                          <i class="fa fa-cogs"></i>Thông tin khách hàng </div>
                        <div class="actions">
                          <a href="javascript:;" class="btn btn-default btn-sm">
                            <i class="fa fa-pencil"></i> Sửa </a>
                        </div>
                      </div>
                      <div class="portlet-body">
                        <div class="row static-info">
                          <div class="col-md-5 name"> Tên khách hàng: </div>
                          <div class="col-md-7 value"> Jhon Doe </div>
                        </div>
                        <div class="row static-info">
                          <div class="col-md-5 name"> Email: </div>
                          <div class="col-md-7 value"> jhon@doe.com </div>
                        </div>
                        <div class="row static-info">
                          <div class="col-md-5 name"> Địa chỉ: </div>
                          <div class="col-md-7 value"> New York </div>
                        </div>
                        <div class="row static-info">
                          <div class="col-md-5 name"> Số điện thoại: </div>
                          <div class="col-md-7 value"> 12234389 </div>
                        </div>
                      </div>
                    </div>
                  </div>--}}
                </div>
                @php $deliveries = $record->deliveries; @endphp
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="portlet green-meadow box">
                      <div class="portlet-title">
                        <div class="caption">
                          <i class="fa fa-cogs"></i>Thông tin thanh toán
                        </div>
                      </div>
                      <div class="portlet-body">
                        <div class="row static-info">
                          <div class="col-md-5 name"> Tên khách hàng: </div>
                          <div class="col-md-7 value"> {{ $deliveries->buyer_name }} </div>
                        </div>
                        <div class="row static-info">
                          <div class="col-md-5 name"> Email: </div>
                          <div class="col-md-7 value"> {{ $deliveries->buyer_email }} </div>
                        </div>

                        <div class="row static-info">
                          <div class="col-md-5 name"> Số điện thoại: </div>
                          <div class="col-md-7 value">
                            {{ $deliveries->buyer_phone_1 }}
                            <br>{{ $deliveries->buyer_phone_2 }}
                          </div>
                        </div>
                        <div class="row static-info">
                          <div class="col-md-5 name"> Địa chỉ: </div>
                          <div class="col-md-7 value">
                            {{ nl2br($deliveries->buyer_address) }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="portlet red-sunglo box">
                      <div class="portlet-title">
                        <div class="caption">
                          <i class="fa fa-cogs"></i>Địa chỉ giao hàng
                        </div>
                      </div>
                      <div class="portlet-body">
                        <div class="row static-info">
                          <div class="col-md-5 name"> Tên khách hàng: </div>
                          <div class="col-md-7 value"> {{ $deliveries->receiver_name }} </div>
                        </div>
                        <div class="row static-info">
                          <div class="col-md-5 name"> Email: </div>
                          <div class="col-md-7 value"> {{ $deliveries->receiver_email }} </div>
                        </div>

                        <div class="row static-info">
                          <div class="col-md-5 name"> Số điện thoại: </div>
                          <div class="col-md-7 value">
                            {{ $deliveries->receiver_phone_1 }}
                            <br>{{ $deliveries->receiver_phone_2 }}
                          </div>
                        </div>
                        <div class="row static-info">
                          <div class="col-md-5 name"> Địa chỉ: </div>
                          <div class="col-md-7 value">
                            {{ nl2br($deliveries->receiver_address_1) }}
                          </div>
                        </div>
                        <div class="row static-info">
                          <div class="col-md-5 name"> Địa chỉ công ty: </div>
                          <div class="col-md-7 value">
                            {{ nl2br($deliveries->receiver_address_2) }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @php $order_products = $record->products; @endphp
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="portlet grey-cascade box">
                      <div class="portlet-title">
                        <div class="caption">
                          <i class="fa fa-cogs"></i>Giỏ hàng
                        </div>
                      </div>
                      <div class="portlet-body">
                        <div class="table-responsive">
                          <table class="table table-hover table-bordered table-striped">
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
                                  <td>{{ $count }}</td>
                                  <td>
                                    <a href="{{ route('products.edit', ['id' => $product->product_id]) }}" target="_blank"> {{ $product->name }} </a>
                                  </td>
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
                    </div>
                  </div>
                </div>
                @php $grand_total = $record->total + $record->delivery_fee; @endphp
                <div class="row">
                  <div class="col-md-6"> </div>
                  <div class="col-md-6">
                    <div class="well">
                      <div class="row static-info align-reverse">
                        <div class="col-md-8 name"> Tổng tiền: </div>
                        <div class="col-md-3 value"> {{ format_price($record->sub_total) }} </div>
                      </div>
                      <div class="row static-info align-reverse">
                        <div class="col-md-8 name"> Phí vận chuyển: </div>
                        <div class="col-md-3 value"> {{ format_price($record->delivery_fee) }} </div>
                      </div>
                      <div class="row static-info align-reverse">
                        <div class="col-md-8 name"> Tổng tiền có thuế: </div>
                        <div class="col-md-3 value"> {{ format_price($record->total) }} </div>
                      </div>
                      <div class="row static-info align-reverse">
                        <div class="col-md-8 name"> Tổng tiền phải trả: </div>
                        <div class="col-md-3 value"> {{ format_price($grand_total) }} </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End: life time stats -->
        </div>
      </div>
    </div>
    <!-- END CONTENT BODY -->
  </div>
@endsection
@section('styles')
  @parent
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />

  <link href="{{ asset('/manages/assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/js/plugin/summernote-0.7.0/dist/summernote.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
@stop
@section('scripts')
  @parent
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="{{ asset('/manages/assets/js/plugin/summernote-0.7.0/dist/summernote.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/js/plugin/medias/summernote-ext-medias.js')}}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/pages/scripts/components-editors.min.js') }}" type="text/javascript"></script>

  <script src="{{ asset('/manages/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
  <script src="{{  asset('/manages/assets/global/plugins/plupload/js/plupload.full.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
  <script src="{{  asset('/manages/assets/pages/scripts/ecommerce-products-edit.js') }}" type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
@stop