@extends('manage.master')

@section('title', 'Bảng điều khiển - Admin')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <h3 class="page-title"> Bảng điều khiển</h3>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-green-sharp">
                                    <span data-counter="counterup" data-value="10000000">0</span>
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
                                    <span data-counter="counterup" data-value="1349">0</span>
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
                                    <span data-counter="counterup" data-value="567"></span>
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
                                    <span data-counter="counterup" data-value="276"></span>
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
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th> Id</th>
                                        <th> Khách hàng </th>
                                        <th> Trạng thái </th>
                                        <th> Tổng tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for($i = 0; $i < 10; $i++):
                                    ?>
                                    <tr>
                                        <td><?php echo 10 - $i;?></td>
                                        <td>Nguyễn Hiệp </td>
                                        <td> <span class="label label-sm label-warning"> Pending </span></td>
                                        <td> 1.800.000 đ</td>
                                    </tr>
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
    </style>
@stop
@section('scripts')
    @parent
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('/manages/assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/manages/assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/manages/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/manages/assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/manages/assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/manages/assets/pages/scripts/ecommerce-dashboard.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@stop