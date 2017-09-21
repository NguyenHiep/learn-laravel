@extends('manage.master')
@section('title', 'Quản lý thông tin tài khoản')

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
                <a class="btn green" href="{{ route('admins.create') }}"> {{__('common.buttons.create')}}
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="portlet-body">
              @if($flash = session('message'))
                <div class="alert alert-success display-hide" style="display: block;">
                  <button class="close" data-close="alert"></button> {{$flash}}
                </div>
              @endif
              <div class="table-scrollable">
                <table class="table table-hover js-action-list-rowlink">
                  <thead>
                  <tr>
                    <th> <!-- <th class="checkbox-list">-->
                           <input class="js-action-list-checkboxes" name="checkboxes" value="Hiep123" type="checkbox" id="form_checkboxes">
                    </th>
                    <th> #ID</th>
                    <th> Ảnh đại diện</th>
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
                          <td>
                            <img src="{{Storage::url(UPLOAD_USER_ADMIN.$user_info->avatar)}}" height="40px" width="40px" alt="{{$user_info->avatar}}"/>
                          </td>
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
                          <td>
                            @if ($user_info->status === 1)
                              <span class="label label-sm label-success margin-right-10"> <i class="fa fa-check-circle"></i> Kích hoạt </span>
                            @else
                              <span class="label label-sm label-danger margin-right-10"> <i class="fa fa-close"></i> Blocked </span>
                            @endif
                          </td>
                          <td>
                            <div class="btn-group btn-group-solid">
                              <a href="{{ route('admins.edit',$user_info->id) }}" class="btn  btn-warning js-action-list-rowlink-val">
                                <i class="fa fa-edit"></i> {{__('common.buttons.edit')}}
                              </a>
                              <form action="{{ route('admins.destroy',$user_info->id) }}" method="POST" style="display: inline-block">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-delete js-action-delete" type="submit">
                                  <i class="fa fa-trash-o"></i> {{__('common.buttons.delete')}}
                                </button>
                              </form>
                            </div>

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