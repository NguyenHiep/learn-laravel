@extends('manage.master')
@section('title', __('static.manage.posts.tags.page_title'))
@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('manage.posts.index')}}">{{__('static.sidebars.manage.posts.title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <a href="{{route('manage.tags.index')}}">{{__('static.sidebars.manage.posts.tags')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Chỉnh sửa thẻ</span>
          </li>
        </ul>
      </div>
      <h3 class="page-title"> {{__('static.sidebars.manage.posts.tags')}}  </h3>
      <div class="row">
        {!! Form::model($record, ['method' => 'PATCH', 'action' => ['Manage\Posts\TagsController@update',$record->id] , 'files' => true]) !!}
        <div class="col-md-9">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Chỉnh sửa thẻ</span>
              </div>
            </div>
            <div class="portlet-body form">
              <div class="form-body">
                @php $key = 'name'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.tags.'.$key.'')}}
                    <span class="required"> * </span>
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control','placeholder' => __('common.posts.tags.'.$key.'_placeholder')]) !!}
                </div>
                @php $key = 'slug'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.tags.'.$key.'')}}
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.posts.tags.'.$key.'_placeholder')]) !!}
                </div>
                @php $key = 'description'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.tags.'.$key.'')}}
                  </label>
                  {!! Form::textarea($key,old($key, $record->{$key}),[
                  'class' => 'tinymce_editor form-control',
                  'rows' => 6
                  ]) !!}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Đăng bài viết </div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
              @php $key = 'status'; @endphp
              <div class="form-group clearfix">
                @if(!empty(__('selector.post_status')))
                  <div class="radio-list">
                    @foreach(__('selector.post_status') as $k =>$val)
                      @if($k === config('define.STATUS_DISABLE'))
                        <label class="radio-inline"> {!! Form::radio($key, $k, true) !!}    {{$val }} </label>
                      @else
                        <label class="radio-inline"> {!! Form::radio($key, $k) !!}    {{$val }} </label>
                      @endif
                    @endforeach
                  </div>
                @endif
              </div>
              <div class="form-group clearfix">
                <button type="submit" class="btn green">{{__('common.buttons.save')}}</button>
                <a href="{{ route('manage.tags.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
              </div>
            </div>
          </div>
        </div>
        {!! Form::close() !!}
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
  <link href="{{ asset('/manages/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet"
        type="text/css"/>
  <!-- END PAGE LEVEL PLUGINS -->
@stop
@section('scripts')
  @parent
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-summernote/summernote.min.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/pages/scripts/components-editors.min.js') }}"
          type="text/javascript"></script>
  <script src=" {{ asset('/manages/assets/global/plugins/select2/js/select2.full.min.js') }}"
          type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
@stop