@extends('manage.master')
@section('title', 'Tạo mới đơn hàng')
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{ route('manage.orders.index') }}">Danh sách đơn hàng</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Tạo mới đơn hàng </span>
          </li>
        </ul>
      
      </div>
      <h3 class="page-title"> Tạo mới đơn hàng</h3>
      <div class="row">
        <div class="col-md-12">
          {!! Form::open(['route' => 'manage.orders.store']) !!}
          <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
              <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase"> Tạo mới đơn hàng</span>
              </div>
              <div class="actions">
                <a href="{{ route('manage.orders.index') }}" class="btn default">{{ __('common.buttons.cancel') }}</a>
                <button type="submit" name="submit" class="btn green" id="submit_form">{{ __('common.buttons.save') }}</button>
              </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line">
                  <div class="tab-pane active" id="tab_1">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <div class="portlet yellow-crusta box">
                          <div class="portlet-title">
                            <div class="caption">
                              <i class="fa fa-cogs"></i>Thông tin đơn hàng </div>
                          </div>
                          <div class="portlet-body">
                            @php $key = 'ordered_at' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Ngày đặt hàng: </div>
                              <div class="col-md-7 value">
                                <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                  {{ Form::text($key, old($key), ['class' => 'form-control form-filter input-sm', 'readonly','placeholder' => 'Ngày đặt hàng'])}}
                                  <span class="input-group-btn">
                                    <button class="btn btn-sm default" type="button">
                                      <i class="fa fa-calendar"></i>
                                    </button>
                                  </span>
                                </div>
                              </div>
                            </div>
                            @php $key = 'delivered_at' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Ngày giao hàng: </div>
                              <div class="col-md-7 value">
                                <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                  {{ Form::text($key, old($key), ['class' => 'form-control form-filter input-sm', 'readonly','placeholder' => 'Ngày giao hàng'])}}
                                  <span class="input-group-btn">
                                    <button class="btn btn-sm default" type="button">
                                      <i class="fa fa-calendar"></i>
                                    </button>
                                  </span>
                                </div>
                              </div>
                            </div>
                            @php $key = 'status' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Trạng thái đơn hàng: </div>
                              <div class="col-md-7 value">
                                {{  Form::select($key, __('selector.default') + __('selector.orders.status'), old($key), [ 'class' => 'form-control form-filter input-sm' ]) }}
                              </div>
                            </div>
                            @php $key = 'payment_id' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Phương thức thanh toán: </div>
                              <div class="col-md-7 value">
                                {{  Form::select($key, __('selector.default') + __('selector.payment'), old($key), [ 'class' => 'form-control form-filter input-sm' ]) }}
                              </div>
                            </div>
                            @php $key = 'note' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Ghi chú đơn hàng: </div>
                              <div class="col-md-7 value">
                                {{  Form::textarea( $key, old($key), [ 'cols'=> 30, 'rows' => 3,'class' => 'form-control', 'placeholder' => 'Ghi chú đơn hàng']) }}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <div class="portlet blue-hoki box">
                          <div class="portlet-title">
                            <div class="caption">
                              <i class="fa fa-cogs"></i>Thông tin khách hàng
                            </div>
                          </div>
                          <div class="portlet-body">
                            @php $key = 'order_customers.name' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Tên khách hàng: </div>
                              <div class="col-md-7 value">
                                {{ Form::text(convert_input_name($key), old(convert_input_name($key)), ['class' => 'form-control input-sm', 'placeholder' => 'VD: Nguyễn Minh Hiệp'])}}
                              </div>
                            </div>
                            @php $key = 'order_customers.email' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Email: </div>
                              <div class="col-md-7 value">
                                {{ Form::email(convert_input_name($key), old(convert_input_name($key)), ['class' => 'form-control input-sm', 'placeholder' => 'VD: customer@gmail.com'])}}
                              </div>
                            </div>
                            @php $key = 'order_customers.phone' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Số điện thoại: </div>
                              <div class="col-md-7 value">
                                {{ Form::text(convert_input_name($key), old(convert_input_name($key)), ['class' => 'form-control input-sm', 'placeholder' => 'VD: 0167 5485 123'])}}
                              </div>
                            </div>
                            @php $key = 'order_customers.address' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Địa chỉ: </div>
                              <div class="col-md-7 value">
                                {{ Form::textarea(convert_input_name($key), old(convert_input_name($key)), ['cols' => 30, 'rows' => 3, 'class' => 'form-control input-sm'])}}
                              </div>
                            </div>
          
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <div class="portlet green-meadow box">
                          <div class="portlet-title">
                            <div class="caption">
                              <i class="fa fa-cogs"></i>Địa chỉ thanh toán </div>
                          </div>
                          <div class="portlet-body">
                            @php $key = 'order_deliveries.delivery_type' @endphp
                            <div class="row static-info">
                              <div class="col-md-12 mt-checkbox-list">
                                <label class="mt-checkbox mt-checkbox-outline">
                                  <input type="checkbox">Địa chỉ nhận hàng khác địa chỉ người mua
                                  <span></span>
                                </label>
                              </div>
                            </div>
                            @php $key = 'order_deliveries.buyer_name' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Tên khách hàng: </div>
                              <div class="col-md-7 value">
                                {{ Form::text(convert_input_name($key), old(convert_input_name($key)), ['class' => 'form-control input-sm', 'placeholder' => 'VD: Nguyễn văn A'])}}
                                
                              </div>
                            </div>
                            @php $key = 'order_deliveries.buyer_email' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Email: </div>
                              <div class="col-md-7 value">
                                {{ Form::email(convert_input_name($key), old(convert_input_name($key)), ['class' => 'form-control input-sm', 'placeholder' => 'VD: email@gmail.com'])}}
                              </div>
                            </div>
                            @php $key = 'order_deliveries.buyer_phone_1' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Số điện thoại: </div>
                              <div class="col-md-7 value">
                                {{ Form::text(convert_input_name($key), old(convert_input_name($key)), ['class' => 'form-control input-sm', 'placeholder' => 'VD: 0167 5485 123'])}}
                              </div>
                            </div>
                            @php $key = 'order_deliveries.buyer_phone_2' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Số điện thoại2: </div>
                              <div class="col-md-7 value">
                                {{ Form::text(convert_input_name($key), old(convert_input_name($key)), ['class' => 'form-control input-sm', 'placeholder' => 'VD: 0167 5485 123'])}}
                              </div>
                            </div>
                            @php $key = 'order_deliveries.buyer_address' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Địa chỉ: </div>
                              <div class="col-md-7 value">
                                {{ Form::textarea(convert_input_name($key), old(convert_input_name($key)), ['cols' => 30, 'rows' => 3, 'class' => 'form-control input-sm'])}}
                              </div>
                            </div>
          
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <div class="portlet red-sunglo box">
                          <div class="portlet-title">
                            <div class="caption">
                              <i class="fa fa-cogs"></i>Địa chỉ giao hàng </div>
                          </div>
                          <div class="portlet-body">
                            @php $key = 'order_deliveries.receiver_name' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Tên khách hàng: </div>
                              <div class="col-md-7 value">
                                {{ Form::text(convert_input_name($key), old(convert_input_name($key)), ['class' => 'form-control input-sm', 'placeholder' => 'VD: Nguyễn văn A'])}}
                              </div>
                            </div>
                            @php $key = 'order_deliveries.receiver_email' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Email: </div>
                              <div class="col-md-7 value">
                                {{ Form::email(convert_input_name($key), old(convert_input_name($key)), ['class' => 'form-control input-sm', 'placeholder' => 'VD: email@gmail.com'])}}
                              </div>
                            </div>
                            @php $key = 'order_deliveries.receiver_phone_1' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Số điện thoại: </div>
                              <div class="col-md-7 value">
                                {{ Form::text(convert_input_name($key), old(convert_input_name($key)), ['class' => 'form-control input-sm', 'placeholder' => 'VD: 0167 5485 123'])}}
                              </div>
                            </div>
                            @php $key = 'order_deliveries.receiver_phone_2' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Số điện thoại 2: </div>
                              <div class="col-md-7 value">
                                {{ Form::text(convert_input_name($key), old(convert_input_name($key)), ['class' => 'form-control input-sm', 'placeholder' => 'VD: 0167 5485 123'])}}
                              </div>
                            </div>
                            @php $key = 'order_deliveries.buyer_address1' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Địa chỉ: </div>
                              <div class="col-md-7 value">
                                {{ Form::textarea(convert_input_name($key), old(convert_input_name($key)), ['cols' => 30, 'rows' => 3, 'class' => 'form-control input-sm'])}}
                              </div>
                            </div>
                            @php $key = 'order_deliveries.receiver_address_2' @endphp
                            <div class="row static-info">
                              <div class="col-md-5 name"> Địa chỉ 2: </div>
                              <div class="col-md-7 value">
                                {{ Form::textarea(convert_input_name($key), old(convert_input_name($key)), ['cols' => 30, 'rows' => 3, 'class' => 'form-control input-sm'])}}
                              </div>
                            </div>
          
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="portlet grey-cascade box">
                          <div class="portlet-title">
                            <div class="caption">
                              <i class="fa fa-cogs"></i>Giỏ hàng </div>
                            <div class="actions">
                              <a href="javascript:;" class="btn btn-default btn-sm">
                                <i class="fa fa-pencil"></i> Sửa </a>
                            </div>
                          </div>
                          <div class="portlet-body">
                            <div class="table-responsive">
                              <table class="table table-hover table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>STT</th>
                                  <th> Tên sản phẩm </th>
                  
                                  <th> Giá tiền </th>
                                  <th> Số lượng </th>
                                  <th> Tiền thuế </th>
                                  <th> Phần trăm thuế </th>
                                  <th> Tổng </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>
                                    <a href="javascript:;"> Product 1 </a>
                                  </td>
                                  <td> 345.50$ </td>
                                  <td> 2 </td>
                                  <td> 2.00$ </td>
                                  <td> 4% </td>
                                  <td> 691.00$ </td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>
                                    <a href="javascript:;"> Product 1 </a>
                                  </td>
                                  <td> 345.50$ </td>
                                  <td> 2 </td>
                                  <td> 2.00$ </td>
                                  <td> 4% </td>
                                  <td> 691.00$ </td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>
                                    <a href="javascript:;"> Product 1 </a>
                                  </td>
                  
                                  <td> 345.50$ </td>
                                  <td> 2 </td>
                                  <td> 2.00$ </td>
                                  <td> 4% </td>
                                  <td> 691.00$ </td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td>
                                    <a href="javascript:;"> Product 1 </a>
                                  </td>
                                  <td> 345.50$ </td>
                                  <td> 2 </td>
                                  <td> 2.00$ </td>
                                  <td> 4% </td>
                                  <td> 691.00$ </td>
                                </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6"> </div>
                      <div class="col-md-6">
                        <div class="well">
                          <div class="row static-info align-reverse">
                            <div class="col-md-8 name"> Tổng tiền: </div>
                            <div class="col-md-3 value"> $1,124.50 </div>
                          </div>
                          <div class="row static-info align-reverse">
                            <div class="col-md-8 name"> Phí vận chuyển: </div>
                            <div class="col-md-3 value"> $40.50 </div>
                          </div>
                          <div class="row static-info align-reverse">
                            <div class="col-md-8 name"> Tổng tiền có thuế: </div>
                            <div class="col-md-3 value"> $1,260.00 </div>
                          </div>
                          <div class="row static-info align-reverse">
                            <div class="col-md-8 name"> Tổng tiền phải trả: </div>
                            <div class="col-md-3 value"> $1,260.00 </div>
                          </div>
                          <div class="row static-info align-reverse">
                            <div class="col-md-8 name"> Tổng số tiền hoàn trả lại: </div>
                            <div class="col-md-3 value"> $0.00 </div>
                          </div>
                          <div class="row static-info align-reverse">
                            <div class="col-md-8 name"> Tổng số nợ: </div>
                            <div class="col-md-3 value"> $1,124.50 </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          {{ Form::close() }}
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