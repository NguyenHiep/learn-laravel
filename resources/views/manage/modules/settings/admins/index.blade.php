@extends('manage.master')
@section('title', 'Quản trị tài khoản')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{route('admins.index')}}">Quản trị tài khoản</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Danh sách tài khoản quản trị</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Quản lý thông tin tài khoản </h3>
            <!-- END PAGE TITLE-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Managed Table</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                        <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                        <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-print"></i> Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /> </th>
                                    <th> Username </th>
                                    <th> Email </th>
                                    <th> Points </th>
                                    <th> Joined </th>
                                    <th> Status </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> shuxer </td>
                                    <td>
                                        <a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a>
                                    </td>
                                    <td> 120 </td>
                                    <td class="center"> 12 Jan 2012 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> looper </td>
                                    <td>
                                        <a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
                                    </td>
                                    <td> 120 </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 12.12.2012 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> user1wow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 12.12.2012 </td>
                                    <td>
                                        <span class="label label-sm label-default"> Blocked </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> restest </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 12.12.2012 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> foopl </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 19.11.2010 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> weep </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 19.11.2010 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> coop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 19.11.2010 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> pppol </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 19.11.2010 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 19.11.2010 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 12.12.2012 </td>
                                    <td>
                                        <span class="label label-sm label-default"> Blocked </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 12.12.2012 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> goop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 12.11.2010 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> weep </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 15.11.2011 </td>
                                    <td>
                                        <span class="label label-sm label-default"> Blocked </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> toopl </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 16.11.2010 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 9.12.2012 </td>
                                    <td>
                                        <span class="label label-sm label-default"> Blocked </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> tes21t </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 14.12.2012 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> fop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 13.11.2010 </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> kop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 17.11.2010 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> vopl </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 19.11.2010 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 12.12.2012 </td>
                                    <td>
                                        <span class="label label-sm label-default"> Blocked </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> wap </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 12.12.2012 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 19.12.2010 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> toop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 17.12.2010 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1" /> </td>
                                    <td> weep </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> 20 </td>
                                    <td class="center"> 15.11.2011 </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    @parent
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
@stop
@section('scripts')
     <!--[if lt IE 9]>
        <script src="{{ asset('/manages/assets/global/plugins/respond.min.js') }}"></script>
        <script src="{{ asset('/manages/assets/global/plugins/excanvas.min.js') }}"></script>
    <![endif]-->

    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ asset('/manages/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('/manages/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('/manages/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('/manages/assets/pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script>
    <!--<script src="{{ asset('/manages/assets/pages/scripts/table-datatables-buttons.min.js') }}" type="text/javascript"></script> -->
    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ asset('/manages/assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
@stop