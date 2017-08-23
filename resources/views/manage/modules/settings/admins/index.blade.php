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
              <div class="actions">
                <a class="btn green" href="#"> Thêm mới
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-scrollable">
                <table class="table table-hover js-action-list-rowlink">
                  <thead>
                  <tr>
                    <th> <!-- <th class="checkbox-list">-->
                           <input class="js-action-list-checkboxes" name="checkboxes" value="" type="checkbox" id="form_checkboxes">
                    </th>
                    <th> #ID</th>
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
                          <td> <!--<td class="checkbox-list"> -->
                            <input id="action_ids{{$user_info->id}}" name="action_ids[]" value="{{$user_info->id}}" type="checkbox">
                          </td>
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
                            <span class="label label-sm label-success margin-right-10"> Approved </span>
                            <span class="label label-sm label-danger margin-right-10"> Blocked </span>
                            <a href="/manage/settings/admins/edit/{{$user_info->id}}" class="js-action-list-rowlink-val">
                              <span class="label label-sm label-warning margin-right-10"> Chỉnh sửa </span>
                            </a>
                            <a href="/manage/settings/admins/delete/{{$user_info->id}}" class="">
                              <span class="label label-sm label-info margin-right-10"> Xóa</span>
                            </a>
                        </tr>
                      @endforeach
                    @endif

                  </tbody>
                  <tfoot>
                      <tr>
                        <td colspan="6"> {{ $list_user->links() }}</td>
                      </tr>
                  </tfoot>
                </table>
              </div>
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
  @parent
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script src="{{ asset('/manages/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/pages/scripts/table-datatables-buttons.min.js') }}"
          type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
@stop