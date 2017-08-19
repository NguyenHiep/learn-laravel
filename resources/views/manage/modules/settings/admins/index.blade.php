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
                                <span class="caption-subject bold uppercase">Danh sách tài khoản</span>
                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Tên tài khoản </th>
                                    <th> Địa chỉ email</th>
                                    <th> Trạng thái </th>
                                    <th> Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> Trident </td>
                                    <td> Internet Explorer 4.0 </td>
                                    <td> Win 95+ </td>
                                    <td> 4 </td>
                                    <td> X </td>
                                </tr>
                                <tr>
                                    <td> Trident </td>
                                    <td> Internet Explorer 5.0 </td>
                                    <td> Win 95+ </td>
                                    <td> 5 </td>
                                    <td> C </td>
                                </tr>
                                <tr>
                                    <td> Trident </td>
                                    <td> Internet Explorer 5.5 </td>
                                    <td> Win 95+ </td>
                                    <td> 5.5 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Trident </td>
                                    <td> Internet Explorer 6 </td>
                                    <td> Win 98+ </td>
                                    <td> 6 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Trident </td>
                                    <td> Internet Explorer 7 </td>
                                    <td> Win XP SP2+ </td>
                                    <td> 7 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Trident </td>
                                    <td> AOL browser (AOL desktop) </td>
                                    <td> Win XP </td>
                                    <td> 6 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Firefox 1.0 </td>
                                    <td> Win 98+ / OSX.2+ </td>
                                    <td> 1.7 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Firefox 1.5 </td>
                                    <td> Win 98+ / OSX.2+ </td>
                                    <td> 1.8 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Firefox 2.0 </td>
                                    <td> Win 98+ / OSX.2+ </td>
                                    <td> 1.8 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Firefox 3.0 </td>
                                    <td> Win 2k+ / OSX.3+ </td>
                                    <td> 1.9 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Camino 1.0 </td>
                                    <td> OSX.2+ </td>
                                    <td> 1.8 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Camino 1.5 </td>
                                    <td> OSX.3+ </td>
                                    <td> 1.8 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Netscape 7.2 </td>
                                    <td> Win 95+ / Mac OS 8.6-9.2 </td>
                                    <td> 1.7 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Netscape Browser 8 </td>
                                    <td> Win 98SE+ </td>
                                    <td> 1.7 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Netscape Navigator 9 </td>
                                    <td> Win 98+ / OSX.2+ </td>
                                    <td> 1.8 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Mozilla 1.0 </td>
                                    <td> Win 95+ / OSX.1+ </td>
                                    <td> 1 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Mozilla 1.1 </td>
                                    <td> Win 95+ / OSX.1+ </td>
                                    <td> 1.1 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Mozilla 1.2 </td>
                                    <td> Win 95+ / OSX.1+ </td>
                                    <td> 1.2 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Mozilla 1.3 </td>
                                    <td> Win 95+ / OSX.1+ </td>
                                    <td> 1.3 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Mozilla 1.4 </td>
                                    <td> Win 95+ / OSX.1+ </td>
                                    <td> 1.4 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Mozilla 1.5 </td>
                                    <td> Win 95+ / OSX.1+ </td>
                                    <td> 1.5 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Mozilla 1.6 </td>
                                    <td> Win 95+ / OSX.1+ </td>
                                    <td> 1.6 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Mozilla 1.7 </td>
                                    <td> Win 98+ / OSX.1+ </td>
                                    <td> 1.7 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Mozilla 1.8 </td>
                                    <td> Win 98+ / OSX.1+ </td>
                                    <td> 1.8 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Seamonkey 1.1 </td>
                                    <td> Win 98+ / OSX.2+ </td>
                                    <td> 1.8 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Gecko </td>
                                    <td> Epiphany 2.20 </td>
                                    <td> Gnome </td>
                                    <td> 1.8 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Webkit </td>
                                    <td> Safari 1.2 </td>
                                    <td> OSX.3 </td>
                                    <td> 125.5 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Webkit </td>
                                    <td> Safari 1.3 </td>
                                    <td> OSX.3 </td>
                                    <td> 312.8 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Webkit </td>
                                    <td> Safari 2.0 </td>
                                    <td> OSX.4+ </td>
                                    <td> 419.3 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Webkit </td>
                                    <td> Safari 3.0 </td>
                                    <td> OSX.4+ </td>
                                    <td> 522.1 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Webkit </td>
                                    <td> OmniWeb 5.5 </td>
                                    <td> OSX.4+ </td>
                                    <td> 420 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Webkit </td>
                                    <td> iPod Touch / iPhone </td>
                                    <td> iPod </td>
                                    <td> 420.1 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Webkit </td>
                                    <td> S60 </td>
                                    <td> S60 </td>
                                    <td> 413 </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Presto </td>
                                    <td> Opera 7.0 </td>
                                    <td> Win 95+ / OSX.1+ </td>
                                    <td> - </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Presto </td>
                                    <td> Opera 7.5 </td>
                                    <td> Win 95+ / OSX.2+ </td>
                                    <td> - </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Presto </td>
                                    <td> Opera 8.0 </td>
                                    <td> Win 95+ / OSX.2+ </td>
                                    <td> - </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Presto </td>
                                    <td> Opera 8.5 </td>
                                    <td> Win 95+ / OSX.2+ </td>
                                    <td> - </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Presto </td>
                                    <td> Opera 9.0 </td>
                                    <td> Win 95+ / OSX.3+ </td>
                                    <td> - </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Presto </td>
                                    <td> Opera 9.2 </td>
                                    <td> Win 88+ / OSX.3+ </td>
                                    <td> - </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Presto </td>
                                    <td> Opera 9.5 </td>
                                    <td> Win 88+ / OSX.3+ </td>
                                    <td> - </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Presto </td>
                                    <td> Opera for Wii </td>
                                    <td> Wii </td>
                                    <td> - </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Presto </td>
                                    <td> Nokia N800 </td>
                                    <td> N800 </td>
                                    <td> - </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td> Presto </td>
                                    <td> Nintendo DS browser </td>
                                    <td> Nintendo DS </td>
                                    <td> 8.5 </td>
                                    <td> C/A
                                        <sup>1</sup>
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
    <script src="{{ asset('/manages/assets/pages/scripts/table-datatables-buttons.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ asset('/manages/assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
@stop