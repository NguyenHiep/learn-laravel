@extends('manage.master')
@section('title', 'Quản lý thông tin thành viên')
@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('customers.index')}}">Thành viên</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Danh sách thành viên</span>
          </li>
        </ul>
      </div>
      <div class="row margin-top-30">
        <div class="col-md-12">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Danh sách thành viên</span>
              </div>
              <div class="tools"></div>
              <div class="actions">
                <a class="btn green" href="{{ route('customers.create') }}"> {{__('common.buttons.create')}}
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
                           <input class="js-action-list-checkboxes" name="checkboxes" value="Hiep123" type="checkbox" id="form_checkboxes">
                    </th>
                    <th> #ID</th>
                    <th> Ảnh đại diện</th>
                    <th> Tên tài khoản</th>
                    <th> Cấp bậc</th>
                    <th class="text-center"> Trạng thái</th>
                    <th class="text-center"> Hành động</th>
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
                          <td class="text-center">
                            @if ($user_info->status === 1)
                              <span class="label label-sm label-success margin-right-10"> <i class="fa fa-check-circle"></i> Kích hoạt </span>
                            @else
                              <span class="label label-sm label-danger margin-right-10"> <i class="fa fa-close"></i> Blocked </span>
                            @endif
                          </td>
                          <td class="text-right">
                            <div class="btn-group btn-group-solid">
                              <a title="{{__('common.buttons.edit')}}" href="{{ route('admins.edit',$user_info->id) }}" class="btn  btn-warning js-action-list-rowlink-val">
                                <i class="fa fa-edit"></i>
                              </a>
                              <form action="{{ route('admins.destroy',$user_info->id) }}" method="POST" style="display: inline-block">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button title="{{__('common.buttons.delete')}}" class="btn btn-delete js-action-delete" type="submit">
                                  <i class="fa fa-trash-o"></i>
                                </button>
                              </form>
                            </div>

                        </tr>
                      @endforeach
                    @endif

                  </tbody>
                  <tfoot>
                      <tr>
                        @if (!empty($list_user))
                        <td colspan="8"> {{ $list_user->links() }}</td>
                        @endif
                      </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection