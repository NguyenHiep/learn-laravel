@extends('manage.master')
@section('title', __('static.manage.settings.settings.page_title'))
@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('settings.index')}}">{{__('static.sidebars.manage.pages.title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.sidebars.manage.pages.pages')}}</span>
          </li>
        </ul>
      </div>
      <div class="row margin-top-30">
        <div class="col-md-12">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">{{__('static.sidebars.manage.pages.pages')}}</span>
              </div>
              <div class="tools"></div>
              <div class="actions">
                <a class="btn green" href="{{ route('pages.create') }}"> {{__('common.buttons.create')}}
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
                      <input class="js-action-list-checkboxes" name="checkboxes" value="all" type="checkbox" id="form_checkboxes">
                    </th>
                    <th><i class="icon-picture"></i></th>
                    <th>Tiêu đề</th>
                    <th>Tác giả</th>
                    <th>Ngày</th>
                    <th>Status</th>
                    <th class="text-center width-110"> Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if (!empty($records) > 0)
                    @foreach ($records as $record)
                      <tr>
                        <td> <!--<td class="checkbox-list"> -->
                          <input id="action_ids{{$record->id}}" name="action_ids[]" value="{{$record->id}}" type="checkbox">
                        </td>
                        <td>
                          @if(!empty($record->page_medias_id))
                            <img src="{{Storage::url(UPLOAD_MEDIAS.$record->page_featured)}}" draggable="false" alt="" class="img-thumbnail" width="80" height="40">
                          @endif
                        </td>
                        <td> {{$record->page_title}} </td>
                        <td> {!! $record->username !!} </td>
                        <td> {!! format_date($record->created_at) !!} </td>
                        <td>
                          <span class="label label-sm @if($record->page_status === STATUS_ENABLE) label-success @else label-danger @endif  margin-right-10"> {{ __('selector.status.'.$record->page_status) }} </span>
                        </td>
                        <td class="text-right ">
                          <div class="btn-group btn-group-solid">
                            <a title="{{__('common.buttons.edit')}}" href="{{ route('pages.edit',$record->id) }}"
                               class="btn  btn-warning js-action-list-rowlink-val">
                              <i class="fa fa-edit"></i>
                            </a>
                            <a title="{{__('common.buttons.delete')}}" href="{{ route('pages.destroy',$record->id) }}" data-method="delete" class="btn btn-default btn-delete js-action-delete-record"><i class="fa fa-trash-o"></i></a>
                          </div>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="7"> Không có dữ liệu</td>
                    </tr>
                  @endif
                  </tbody>
                  <tfoot>
                  @if (!empty($records))
                    {{--<td colspan="8"> {{ $records->links() }}</td>--}}
                  @endif
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