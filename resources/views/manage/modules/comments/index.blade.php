@extends('manage.master')
@section('title', __('static.manage.comments.page_title'))
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->

      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('manage')}}">{{__('static.sidebars.manage.manage')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.sidebars.manage.comments')}}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> {{__('static.sidebars.manage.comments')}}  </h3>
      <!-- END PAGE TITLE-->
      <div class="row">
        <form action="{{route('comments.search')}}" method="POST" class="form-inline">
          {{ csrf_field() }}
          <div class="clearfix paging-wrap margin-bottom-10">
              <div class=" col-md-8">
                <div class="pull-left">
                  <div class="form-group">
                    <select name="batch_actions" id="batch_actions" class="form-control">
                      <option value="">Tác vụ</option>
                      <option value="approve">Duyệt</option>
                      <option value="delete">Xóa</option>
                    </select>
                  </div>
                  <button class="btn btn-delete js-action-batch" type="submit">Áp dụng</button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="pull-right">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nhập từ khóa" name="search_keyword">
                  </div>
                  <button class="btn btn-delete js-action-search" type="submit">Tìm kiếm</button>
                </div>
              </div>
          </div>
          <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
              <div class="portlet-body">
                <div class="table-scrollable">
                  <table class="table table-hover js-action-list-rowlink">
                    <thead>
                    <tr>
                      <th> <!-- <th class="checkbox-list">-->
                        <input class="js-action-list-checkboxes" name="checkboxes" value="Hiep123" type="checkbox"
                               id="form_checkboxes">
                      </th>
                      <th>Email</th>
                      <th>Nội dung</th>
                      <th>Ngày bình luận</th>
                      <th>IP</th>
                      <th class="text-center width-110"> Hành động</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if (count($records)>0)
                      @foreach ($records as $record)
                        <tr>
                          <td> <!--<td class="checkbox-list"> -->
                            <input id="action_ids{{$record->id}}" name="action_ids[]" value="{{$record->id}}"
                                   type="checkbox">
                          </td>

                          <td>{!! $record->email !!}</td>
                          <td>
                            {!! $record->content !!}
                          </td>
                          <td>{!! date('d/m/Y H:i', strtotime($record->created_at)) !!}</td>
                          <td>{!! $record->ip_user !!}</td>

                          <td class="text-right ">
                            <div class="btn-group btn-group-solid">
                              <a href="{{ route('comments.edit',$record->id) }}"
                                 class="btn  btn-warning js-action-list-rowlink-val">
                                <i class="fa fa-edit"></i>
                              </a>
                              <a href="{{ route('comments.destroy',$record->id) }}" data-method="delete" class="btn btn-default btn-delete js-action-delete-record"><i class="fa fa-trash-o"></i></a>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="6" class="text-center"> Không có dữ liệu</td>
                      </tr>
                    @endif
                    </tbody>
                    <tfoot>
                    @if (count($records) > 0)
                      {{--<td colspan="8"> {{ $records->links() }}</td>--}}
                    @endif
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
          </div>
        </form>
      </div>
    </div>
    <!-- END CONTENT BODY -->
  </div>

@endsection
@section('styles')
  @parent
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-summernote/summernote.css') }}"
        rel="stylesheet" type="text/css"/>
  <!-- END PAGE LEVEL PLUGINS -->
@stop
@section('scripts')
  @parent
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-summernote/summernote.min.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/pages/scripts/components-editors.min.js') }}"
          type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
@stop
