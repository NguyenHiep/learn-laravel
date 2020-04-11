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
            <span>{{__('static.sidebars.manage.posts.tags')}}</span>
          </li>
        </ul>
      </div>
      <h3 class="page-title"> {{__('static.sidebars.manage.posts.tags')}}  </h3>
      <div class="row">
        <div class="col-md-5">
          {!! Form::open(['route' => 'manage.tags.store', 'files' => true]) !!}
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Thêm mới thẻ</span>
              </div>
            </div>
            <div class="portlet-body form">
              <div class="form-body">
                @php $key = 'name'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.tags.'.$key.'')}}
                    <span class="required"> * </span>
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control', 'required' => 'required','placeholder' => __('common.posts.tags.'.$key.'_placeholder')]) !!}
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
                  {!! Form::textarea($key, old($key),[
                    'class' => 'tinymce_editor form-control',
                    'rows' => 6
                  ]) !!}
                </div>
                @php $key = 'status'; @endphp
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
              <div class="form-actions">
                <button type="submit" class="btn green">{{__('common.buttons.save')}}</button>
                <a href="{{ route('manage.tags.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
              </div>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
        <div class="col-md-7">
          <div class="portlet light bordered">
            <div class="portlet-body">
              <div class="table-container">
                @includeIf('manage.blocks.partials.dataTable', [
                   'id'        => 'tags',
                   'routeAjax' => route('manage.tags.index'),
                   'columns'   => $columns,
                   'fields'    => $fields,
                ])
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('styles')
  @parent
  <link href="{{ asset('/manages/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
@stop
@section('scripts')
  @parent
   <script src=" {{ asset('/manages/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
@stop