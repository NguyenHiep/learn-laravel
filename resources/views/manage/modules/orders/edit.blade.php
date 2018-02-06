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
                <span class="caption-subject font-dark sbold uppercase"> Đơn hàng #12313232
                  <span class="hidden-xs">| Dec 27, 2013 7:16:25 </span>
                 </span>
              </div>
              <div class="actions">
                <div class="btn-group btn-group-devided" data-toggle="buttons">
                  <label class="btn btn-transparent green btn-outline btn-circle btn-sm active">
                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                  <label class="btn btn-transparent blue btn-outline btn-circle btn-sm">
                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                </div>
                <div class="btn-group">
                  <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                    <i class="fa fa-share"></i>
                    <span class="hidden-xs"> Tools </span>
                    <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                    <li>
                      <a href="javascript:;"> Export to Excel </a>
                    </li>
                    <li>
                      <a href="javascript:;"> Export to CSV </a>
                    </li>
                    <li>
                      <a href="javascript:;"> Export to XML </a>
                    </li>
                    <li class="divider"> </li>
                    <li>
                      <a href="javascript:;"> Print Invoices </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="portlet-body">
              <div class="tabbable-line">
                <ul class="nav nav-tabs nav-tabs-lg">
                  <li class="active">
                    <a href="#tab_1" data-toggle="tab"> Chi tiết </a>
                  </li>
                  <li>
                    <a href="#tab_2" data-toggle="tab"> Hóa đơn
                      <span class="badge badge-success">4</span>
                    </a>
                  </li>
                  <li>
                    <a href="#tab_3" data-toggle="tab"> Bảng ghi tín dụng </a>
                  </li>
                  <li>
                    <a href="#tab_4" data-toggle="tab"> Đơn hàng đang vận chuyển
                      <span class="badge badge-danger"> 2 </span>
                    </a>
                  </li>
                  <li>
                    <a href="#tab_5" data-toggle="tab"> Lịch sử </a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <div class="portlet yellow-crusta box">
                          <div class="portlet-title">
                            <div class="caption">
                              <i class="fa fa-cogs"></i>Đơn hàng chi tiết </div>
                            <div class="actions">
                              <a href="javascript:;" class="btn btn-default btn-sm">
                                <i class="fa fa-pencil"></i> Sửa </a>
                            </div>
                          </div>
                          <div class="portlet-body">
                            <div class="row static-info">
                              <div class="col-md-5 name"> Order id#: </div>
                              <div class="col-md-7 value"> 12313232
                                <span class="label label-info label-sm"> Email confirmation was sent </span>
                              </div>
                            </div>
                            <div class="row static-info">
                              <div class="col-md-5 name"> Thời gian đặt hàng: </div>
                              <div class="col-md-7 value"> Dec 27, 2013 7:16:25 PM </div>
                            </div>
                            <div class="row static-info">
                              <div class="col-md-5 name"> Trạng thái đơn hàng: </div>
                              <div class="col-md-7 value">
                                <span class="label label-success"> Closed </span>
                              </div>
                            </div>
                            <div class="row static-info">
                              <div class="col-md-5 name"> Tổng cộng: </div>
                              <div class="col-md-7 value"> $175.25 </div>
                            </div>
                            <div class="row static-info">
                              <div class="col-md-5 name"> Phương thức thanh toán: </div>
                              <div class="col-md-7 value"> Credit Card </div>
                            </div>
                            <div class="row static-info">
                              <div class="col-md-5 name"> Ghi chú đơn hàng: </div>
                              <div class="col-md-7 value"> Giao hàng vào ngày mai </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
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
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <div class="portlet green-meadow box">
                          <div class="portlet-title">
                            <div class="caption">
                              <i class="fa fa-cogs"></i>Địa chỉ thanh toán </div>
                            <div class="actions">
                              <a href="javascript:;" class="btn btn-default btn-sm">
                                <i class="fa fa-pencil"></i> Sửa </a>
                            </div>
                          </div>
                          <div class="portlet-body">
                            <div class="row static-info">
                              <div class="col-md-12 value"> Jhon Done
                                <br> #24 Park Avenue Str
                                <br> New York
                                <br> Connecticut, 23456 New York
                                <br> United States
                                <br> T: 123123232
                                <br> F: 231231232
                                <br> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <div class="portlet red-sunglo box">
                          <div class="portlet-title">
                            <div class="caption">
                              <i class="fa fa-cogs"></i>Địa chỉ giao hàng </div>
                            <div class="actions">
                              <a href="javascript:;" class="btn btn-default btn-sm">
                                <i class="fa fa-pencil"></i> Sửa </a>
                            </div>
                          </div>
                          <div class="portlet-body">
                            <div class="row static-info">
                              <div class="col-md-12 value"> Jhon Done
                                <br> #24 Park Avenue Str
                                <br> New York
                                <br> Connecticut, 23456 New York
                                <br> United States
                                <br> T: 123123232
                                <br> F: 231231232
                                <br> </div>
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
                  <div class="tab-pane" id="tab_2">
                    <div class="table-container">
                      <div class="table-actions-wrapper">
                        <span> </span>
                        <select class="table-group-action-input form-control input-inline input-small input-sm">
                          <option value="">Select...</option>
                          <option value="pending">Pending</option>
                          <option value="paid">Paid</option>
                          <option value="canceled">Canceled</option>
                        </select>
                        <button class="btn btn-sm yellow table-group-action-submit">
                          <i class="fa fa-check"></i> Submit</button>
                      </div>
                      <table class="table table-striped table-bordered table-hover" id="datatable_invoices">
                        <thead>
                        <tr role="row" class="heading">
                          <th width="5%">
                            <input type="checkbox" class="group-checkable"> </th>
                          <th width="5%"> Invoice&nbsp;# </th>
                          <th width="15%"> Bill To </th>
                          <th width="15%"> Invoice&nbsp;Date </th>
                          <th width="10%"> Amount </th>
                          <th width="10%"> Status </th>
                          <th width="10%"> Actions </th>
                        </tr>
                        <tr role="row" class="filter">
                          <td> </td>
                          <td>
                            <input type="text" class="form-control form-filter input-sm" name="order_invoice_no"> </td>
                          <td>
                            <input type="text" class="form-control form-filter input-sm" name="order_invoice_bill_to"> </td>
                          <td>
                            <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                              <input type="text" class="form-control form-filter input-sm" readonly name="order_invoice_date_from" placeholder="From">
                              <span class="input-group-btn">
                                <button class="btn btn-sm default" type="button">
                                  <i class="fa fa-calendar"></i>
                                </button>
                              </span>
                          </div>
                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                              <input type="text" class="form-control form-filter input-sm" readonly name="order_invoice_date_to" placeholder="To">
                              <span class="input-group-btn">
                                <button class="btn btn-sm default" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>
                            </div>
                          </td>
                          <td>
                            <div class="margin-bottom-5">
                              <input type="text" class="form-control form-filter input-sm" name="order_invoice_amount_from" placeholder="From" /> </div>
                            <input type="text" class="form-control form-filter input-sm" name="order_invoice_amount_to" placeholder="To" /> </td>
                          <td>
                            <select name="order_invoice_status" class="form-control form-filter input-sm">
                              <option value="">Select...</option>
                              <option value="pending">Pending</option>
                              <option value="paid">Paid</option>
                              <option value="canceled">Canceled</option>
                            </select>
                          </td>
                          <td>
                            <div class="margin-bottom-5">
                              <button class="btn btn-sm yellow filter-submit margin-bottom">
                                <i class="fa fa-search"></i> Search</button>
                            </div>
                            <button class="btn btn-sm red filter-cancel">
                              <i class="fa fa-times"></i> Reset</button>
                          </td>
                        </tr>
                        </thead>
                        <tbody> </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_3">
                    <div class="table-container">
                      <table class="table table-striped table-bordered table-hover" id="datatable_credit_memos">
                        <thead>
                        <tr role="row" class="heading">
                          <th width="5%"> Credit&nbsp;Memo&nbsp;# </th>
                          <th width="15%"> Bill To </th>
                          <th width="15%"> Created&nbsp;Date </th>
                          <th width="10%"> Status </th>
                          <th width="10%"> Actions </th>
                        </tr>
                        </thead>
                        <tbody> </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_4">
                    <div class="table-container">
                      <table class="table table-striped table-bordered table-hover" id="datatable_shipment">
                        <thead>
                        <tr role="row" class="heading">
                          <th width="5%"> Shipment&nbsp;# </th>
                          <th width="15%"> Ship&nbsp;To </th>
                          <th width="15%"> Shipped&nbsp;Date </th>
                          <th width="10%"> Quantity </th>
                          <th width="10%"> Actions </th>
                        </tr>
                        <tr role="row" class="filter">
                          <td>
                            <input type="text" class="form-control form-filter input-sm" name="order_shipment_no"> </td>
                          <td>
                            <input type="text" class="form-control form-filter input-sm" name="order_shipment_ship_to"> </td>
                          <td>
                            <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                              <input type="text" class="form-control form-filter input-sm" readonly name="order_shipment_date_from" placeholder="From">
                              <span class="input-group-btn">
                                <button class="btn btn-sm default" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                              </span>
                            </div>
                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                              <input type="text" class="form-control form-filter input-sm" readonly name="order_shipment_date_to" placeholder="To">
                              <span class="input-group-btn">
                                <button class="btn btn-sm default" type="button">
                                <i class="fa fa-calendar"></i>
                                </button>
                              </span>
                            </div>
                          </td>
                          <td>
                            <div class="margin-bottom-5">
                              <input type="text" class="form-control form-filter input-sm" name="order_shipment_quantity_from" placeholder="From" /> </div>
                            <input type="text" class="form-control form-filter input-sm" name="order_shipment_quantity_to" placeholder="To" /> </td>
                          <td>
                            <div class="margin-bottom-5">
                              <button class="btn btn-sm yellow filter-submit margin-bottom">
                                <i class="fa fa-search"></i> Search</button>
                            </div>
                            <button class="btn btn-sm red filter-cancel">
                              <i class="fa fa-times"></i> Reset</button>
                          </td>
                        </tr>
                        </thead>
                        <tbody> </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_5">
                    <div class="table-container">
                      <table class="table table-striped table-bordered table-hover" id="datatable_history">
                        <thead>
                        <tr role="row" class="heading">
                          <th width="25%"> Datetime </th>
                          <th width="55%"> Description </th>
                          <th width="10%"> Notification </th>
                          <th width="10%"> Actions </th>
                        </tr>
                        <tr role="row" class="filter">
                          <td>
                            <div class="input-group date datetime-picker margin-bottom-5" data-date-format="dd/mm/yyyy hh:ii">
                              <input type="text" class="form-control form-filter input-sm" readonly name="order_history_date_from" placeholder="From">
                              <span class="input-group-btn">
                                                                            <button class="btn btn-sm default date-set" type="button">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </button>
                                                                        </span>
                            </div>
                            <div class="input-group date datetime-picker" data-date-format="dd/mm/yyyy hh:ii">
                              <input type="text" class="form-control form-filter input-sm" readonly name="order_history_date_to" placeholder="To">
                              <span class="input-group-btn">
                                                                            <button class="btn btn-sm default date-set" type="button">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </button>
                                                                        </span>
                            </div>
                          </td>
                          <td>
                            <input type="text" class="form-control form-filter input-sm" name="order_history_desc" placeholder="To" /> </td>
                          <td>
                            <select name="order_history_notification" class="form-control form-filter input-sm">
                              <option value="">Select...</option>
                              <option value="pending">Pending</option>
                              <option value="notified">Notified</option>
                              <option value="failed">Failed</option>
                            </select>
                          </td>
                          <td>
                            <div class="margin-bottom-5">
                              <button class="btn btn-sm yellow filter-submit margin-bottom">
                                <i class="fa fa-search"></i> Search</button>
                            </div>
                            <button class="btn btn-sm red filter-cancel">
                              <i class="fa fa-times"></i> Reset</button>
                          </td>
                        </tr>
                        </thead>
                        <tbody> </tbody>
                      </table>
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