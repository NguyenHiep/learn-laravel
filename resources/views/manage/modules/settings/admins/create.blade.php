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
              <div class="tools"></div>
            </div>
            <div class="portlet-body">
              <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                <tr>
                  <th> ID</th>
                  <th> Tên tài khoản</th>
                  <th> Cấp bậc</th>
                  <th> Trạng thái</th>
                  <th> Hành động</th>
                </tr>
                </thead>
                <tbody>

                @if (!empty($list_user))
                  @foreach ($list_user as $user_info)
                    <tr>
                      <td> {{$user_info->id}} </td>
                      <td> {{$user_info->username}} </td>
                      <td>
                        @if ($user_info->level === 1)
                          <span class="font-red-thunderbird bold">
                              {{__("selector.levels.$user_info->level")}}
                          </span>
                        @elseif($user_info->level === 2)
                          <span class="font-green-dark bold">
                            {{__("selector.levels.$user_info->level")}}
                          </span>
                        @else
                          {{__("selector.levels.$user_info->level")}}
                        @endif
                         </td>
                      <td>  </td>
                      <td>
                        <div class="btn-group">
                          <a class="btn dark" href="javascript:;" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user"></i>
                            Action
                            <i class="fa fa-angle-down"></i>
                          </a>
                          <ul class="dropdown-menu">
                            <li>
                              <a href="javascript:;"><i class="fa fa-pencil"></i> Edit </a>
                            </li>
                            <li>
                              <a href="javascript:;"><i class="fa fa-trash-o"></i> Delete </a>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                @endif
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
  <link href="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}"
        rel="stylesheet" type="text/css"/>
  <!-- END PAGE LEVEL PLUGINS -->
  @stop
@section('scripts')
     <!--[if lt IE 9]>
  <script src="{{ asset('/manages/assets/global/plugins/respond.min.js') }}"></script>
  <script src="{{ asset('/manages/assets/global/plugins/excanvas.min.js') }}"></script>
  <![endif]-->

  <!-- BEGIN CORE PLUGINS -->
  <script src="{{ asset('/manages/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/uniform/jquery.uniform.min.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"
          type="text/javascript"></script>
  <!-- END CORE PLUGINS -->

  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script src="{{ asset('/manages/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"
          type="text/javascript"></script>
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN THEME GLOBAL SCRIPTS -->
  <script src="{{ asset('/manages/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
  <!-- END THEME GLOBAL SCRIPTS -->
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="{{ asset('/manages/assets/pages/scripts/table-datatables-buttons.min.js') }}"
          type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->

  <!-- BEGIN THEME LAYOUT SCRIPTS -->
  <script src="{{ asset('/manages/assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/layouts/global/scripts/quick-sidebar.min.js') }}"
          type="text/javascript"></script>
  <!-- END THEME LAYOUT SCRIPTS -->
@stop