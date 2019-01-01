@extends('manage.master')
@section('title', __('static.manage.settings.settings.page_title'))
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->

      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('settings.index')}}">{{__('static.sidebars.manage.posts.title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.sidebars.manage.posts.posts')}}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <div class="row margin-top-30">
        <div class="col-md-12">
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">{{__('static.sidebars.manage.posts.posts')}}</span>
              </div>
              <div class="tools"></div>
              <div class="actions">
                <a class="btn green" href="{{ route('posts.create') }}"> {{__('common.buttons.create')}}
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
                    <th><i class="icon-picture"></i></th>
                    <th>Tiêu đề</th>
                    <th>Tác giả</th>
                    <th>Chuyên mục</th>
                    <th>Thẻ</th>
                    <th>Ngày</th>
                    <th>Views</th>
                    <th>Post Style</th>
                    <th class="text-center width-110"> Hành động</th>
                  </tr>
                  </thead>
                  <tbody>

                  @if (!empty($records))
                    @foreach ($records as $record)
                        <tr>
                          <td> <!--<td class="checkbox-list"> -->
                            <input id="action_ids{{$record->id}}" name="action_ids[]" value="{{$record->id}}" type="checkbox">
                          </td>
                          <td>
                            @if(!empty($record->posts_medias_id))
                              <img src="{{Storage::url(UPLOAD_MEDIAS.$record->post_featured)}}" draggable="false" alt="" class="img-thumbnail" width="80" height="40">
                            @endif
                          </td>
                          <td> {{$record->post_title}} </td>
                          <td>{!! $record->username !!}</td>
                          <td>{!! $record->categories !!}</td>
                          <td>{!! $record->tags !!}</td>
                          <td>{!! date('d/m/Y', strtotime($record->created_at)) !!}</td>
                          <td>{!! $record->visit !!}</td>
                          <td>{!! __('selector.format.'.$record->post_format) !!}</td>

                          <td class="text-right ">
                            <div class="btn-group btn-group-solid">
                              <a title="{{__('common.buttons.edit')}}" href="{{ route('posts.edit',$record->id) }}" class="btn  btn-warning js-action-list-rowlink-val">
                                <i class="fa fa-edit"></i>
                              </a>
                              <form action="{{ route('posts.destroy',$record->id) }}" method="POST" style="display: inline-block">
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
                  @if (!empty($records))
                    {{--<td colspan="8"> {{ $records->links() }}</td>--}}
                  @endif
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <!-- END EXAMPLE TABLE PORTLET-->
        </div>
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
