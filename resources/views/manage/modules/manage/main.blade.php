@extends('manage.master')

@section('title', 'Bảng điều khiển - Admin')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <h1 class="page-title"> Ngày hiển thị <span class="font-weight-bold"><input type="text" name="selected_date" value="2020-04-13" style="background: transparent; border: 0; outline: none; font-weight: 400"/></span></h1>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-green-sharp">
                                    <span data-counter="counterup" data-value="{{$totalSales->total_sales}}">0</span>
                                    <small class="font-green-sharp">đ</small>
                                </h3>
                                <small>Tổng Doanh thu</small>
                            </div>
                            <div class="icon">
                                <i class="icon-pie-chart"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-red-haze">
                                    <span data-counter="counterup" data-value="{{$commentTotal}}">0</span>
                                </h3>
                                <small>Bình luận</small>
                            </div>
                            <div class="icon">
                                <i class="icon-like"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-blue-sharp">
                                    <span data-counter="counterup" data-value="{{$totalSales->total_order}}"></span>
                                </h3>
                                <small>Tổng Đơn hàng</small>
                            </div>
                            <div class="icon">
                                <i class="icon-basket"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-purple-soft">
                                    <span data-counter="counterup" data-value="{{$customerTotal}}"></span>
                                </h3>
                                <small>Tổng Thành viên</small>
                            </div>
                            <div class="icon">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- Begin: life time stats -->
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class="icon-globe font-red"></i>
                                <span class="caption-subject font-red bold uppercase">Doanh thu</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#portlet_ecommerce_tab_1" data-toggle="tab">Tiền sau thuế</a>
                                </li>
                                <li>
                                    <a href="#portlet_ecommerce_tab_2" id="statistics_orders_tab" data-toggle="tab">Tiền trước thuế</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="portlet_ecommerce_tab_1">
                                    <div id="statistics_1" class="chart"> </div>
                                </div>
                                <div class="tab-pane" id="portlet_ecommerce_tab_2">
                                    <div id="statistics_2" class="chart"> </div>
                                </div>
                            </div>
                            <div class="well margin-top-20">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                        <span class="label label-success"> Tiền lời: </span>
                                        <h3>20.000.000 đ</h3>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                        <span class="label label-info"> Tiền thuế: </span>
                                        <h3>1.000.000 đ</h3>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                        <span class="label label-danger"> Phí vận chuyển: </span>
                                        <h3>3.000.000 đ</h3>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                        <span class="label label-warning"> Tiền gốc: </span>
                                        <h3>24.000.000 đ</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End: life time stats -->
                </div>
                <div class="col-md-6">
                    <!-- Begin: life time stats -->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-shopping-cart font-blue"></i>
                                <span class="caption-subject font-blue bold uppercase">Đơn hàng mới nhất</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered js-action-list-rowlink">
                                    <thead>
                                    <tr>
                                        <th> Id</th>
                                        <th> Khách hàng </th>
                                        <th> Trạng thái </th>
                                        <th> Tổng tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($latestOrder) > 0)
                                        @foreach($latestOrder as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->deliveries->buyer_name }}</td>
                                                <td>
                                                    @php
                                                        $status = $order->status;
                                                        $statusText =__('selector.orders.status.'.$status);
                                                        if ($status === 1) {
                                                            $statusText =  '<span class="font-red-thunderbird">' . $statusText . '</span>';
                                                        }
                                                        if ($status === 2) {
                                                            $statusText = '<span class="font-green-dark">' . $statusText . '</span>';
                                                        }
                                                        if ($status === 3) {
                                                            $statusText = '<span class="font-yellow-gold">' . $statusText . '</span>';
                                                        }
                                                    @endphp
                                                    {!! $statusText !!}
                                                </td>
                                                <td>
                                                    {{ format_price($order->total) }}
                                                    <a href="{{ route('manage.orders.show', ['id' => $order->id]) }}" class="js-action-list-rowlink-val"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">{{ __('common.data_empty') }}</td>
                                        </tr>
                                    @endif
                                    <?php
                                    for($i = 0; $i < 10; $i++):
                                    ?>

                                    <?php
                                    endfor
                                    ?>
                                    </tbody>
                                </table>
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
    <style>
        .dashboard-stat2 .display .number h3 {
            font-size: 25px;
        }
        .page-content-white .page-title {
            margin-top: 0
        }
        .text-stat h3 {
            font-size: 13px;
        }
        .dashboard-stat2 {
            padding: 15px 15px 5px
        }
    </style>
@stop
@section('scripts')
    @parent
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('/manages/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/manages/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/manages/assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/manages/assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/manages/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/manages/assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/manages/assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/manages/assets/pages/scripts/ecommerce-dashboard.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
      function dashboardDateRange() {
        if (!jQuery().daterangepicker) {
          return;
        }
        $('input[name="selected_date"]').daterangepicker({
          singleDatePicker: true,
          minYear: 1901,
          locale: {
            "format": "YYYY-MM-DD",
            "daysOfWeek": [
              "Su",
              "Mo",
              "Tu",
              "We",
              "Th",
              "Fr",
              "Sa"
            ],
            "monthNames": [
              "January",
              "February",
              "March",
              "April",
              "May",
              "June",
              "July",
              "August",
              "September",
              "October",
              "November",
              "December"
            ],
            "firstDay": 1
          }
        });
      }
      dashboardDateRange();
    </script>
@stop