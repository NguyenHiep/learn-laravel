@extends('manage.master')
@section('title', __('static.sidebars.manage.pages.creates'))
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->

      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('pages.index')}}">{{__('static.sidebars.manage.pages.title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.sidebars.manage.pages.creates')}}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> {{__('static.sidebars.manage.pages.creates')}}  </h3>
      <!-- END PAGE TITLE-->
      <div class="row">
        {!! Form::open(['route' => 'pages.store', 'files' => true]) !!}
        <div class="col-md-9">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">{{__('static.sidebars.manage.pages.creates')}}</span>
              </div>
            </div>
            <div class="portlet-body form">
              <div class="form-body">
                @php $key = 'page_title'; @endphp
                <div class="form-group @if ($errors->has($key)) has-error  @endif">
                  <label class="control-label">{{__('common.pages.'.$key.'')}}
                    <span class="required"> * </span>
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control', 'required' => 'required','placeholder' => __('common.pages.'.$key.'_placeholder'), 'id' => 'title' ]) !!}
                  @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                </div>

                @php $key = 'page_slug'; @endphp
                <div class="form-group">
                  {!! Form::hidden($key, old($key), ['class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => __('common.pages.'.$key.'_placeholder'), 'id' => 'slug']) !!}
                </div>

                @php $key = 'page_full'; @endphp
                <div class="form-group @if ($errors->has($key)) has-error  @endif">
                  <label class="control-label">{{__('common.pages.'.$key.'')}}
                    <span class="required"> * </span>
                  </label>
                  {!! Form::textarea($key, old($key) ,
                  [
                  'class' => 'summernote_editor form-control',
                  'rows' => 9
                  ]) !!}
                  @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                </div>

                @php $key = 'page_keyword'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.pages.'.$key.'')}}
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control','placeholder' => __('common.pages.'.$key.'_placeholder')]) !!}
                </div>

                @php $key = 'page_intro'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.pages.'.$key.'')}}
                  </label>
                  {!! Form::textarea($key, old($key) ,
                  [
                  'class' => 'form-control',
                  'rows' => 3,
                  'placeholder' => __('common.pages.'.$key.'_placeholder')
                  ]) !!}
                </div>

              </div>
            </div>

          </div>
        </div> <!-- End .col-md-9 -->
        <div class="col-md-3">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Đăng bài viết</div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
              <!--
              <div class="form-group">
                <label>Ngày đăng: <strong>29/09/2017@11:58</strong> </label>
              </div>
              -->
                @php $key='page_status'; @endphp
                <div class="form-group clearfix">
                  <label class="control-label">Trạng thái:</label>
                  @if(!empty(__('selector.page_status')))
                    <div class="radio-list">
                      @foreach(__('selector.page_status') as $k =>$val)
                        @if($k === 2)
                          <label class="radio-inline"> {!! Form::radio($key, $k, true) !!}    {{$val }} </label>
                        @else
                          <label class="radio-inline"> {!! Form::radio($key, $k) !!}    {{$val }} </label>
                        @endif
                      @endforeach
                    </div>
                  @endif
              </div>
              <!--
              <div class="form-group">
                <label>Ngôn ngữ: </label>
              </div>
              -->
              <div class="form-group clearfix">
                <a href="{{ route('pages.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
                <button type="submit" class="btn green pull-right">Đăng bài viết</button>
              </div>
            </div>
          </div>
          {{--<div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Định dạng</div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
              @php $key='page_attribute'; @endphp
              @if(!empty(__('selector.format')))
                <div class="radio-list">
                  @foreach(__('selector.format') as $k =>$val)
                    @if($k === 0)
                      <label> {!! Form::radio($key, $k, true) !!}    {!! __('selector.icons.'.$k).'&nbsp;&nbsp;'.$val !!} </label>
                    @else
                      <label> {!! Form::radio($key, $k) !!}    {!! __('selector.icons.'.$k).'&nbsp;&nbsp;'.$val !!} </label>
                    @endif
                  @endforeach
                </div>
              @endif
            </div>
          </div>--}}
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Ảnh tiêu biểu</div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
              @php $key = 'page_medias_id'; @endphp
              <!--<a href="javascript:void(0)" class="">Chọn ảnh tiêu biểu</a>-->
              <a class="btn btn-outline btn-block dark" data-toggle="modal" href="#medias_libraries"> Chọn ảnh tiêu biểu</a>
                <div class="clearfix margin-top-15" id="img_featured">
                  <!--<img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="" class="img-responsive"> -->
                </div>
                <input type="hidden" name="{{$key}}" value="" id="{{$key}}"/>
            </div>
          </div>

        </div> <!-- End .col-md-3 -->
        {!! Form::close() !!}
      </div>
      <!-- END CONTENT BODY -->
    </div>
  @include('manage.blocks.medias.modal', [
     'medias' => $medias,
     'class' => 'posts-modal'
   ])
  @include('manage.blocks.medias.content', [
    'medias' => $medias,
    'class' => 'posts-content'
  ])
  @endsection
  @section('styles')
    @parent
    <!-- BEGIN PAGE LEVEL PLUGINS -->
      {{--<link href="{{ asset('/manages/assets/global/plugins/bootstrap-summernote/summernote.css') }}" rel="stylesheet" type="text/css"/>--}}
      <link href="{{ asset('/manages/assets/js/plugin/summernote-0.7.0/dist/summernote.css') }}" rel="stylesheet" type="text/css"/>

      <!-- END PAGE LEVEL PLUGINS -->
  @stop
  @section('scripts')
    @parent
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
      <script src="{{ asset('/manages/assets/js/plugin/summernote-0.7.0/dist/summernote.min.js')}}" type="text/javascript"></script>
      <script src="{{ asset('/manages/assets/js/plugin/medias/summernote-ext-medias.js')}}" type="text/javascript"></script>
      <script src="{{ asset('/manages/assets/pages/scripts/components-editors.min.js') }}" type="text/javascript"></script>
      <!-- END PAGE LEVEL SCRIPTS -->
  @stop

  {{-- Include for media uploads --}}
  @push('custom-scripts')
    <script src="{{ asset('/manages/assets/global/plugins/dropzone/dropzone.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/pages/scripts/form-dropzone.js')}}" type="text/javascript"></script>
    <script src="{{ URL::asset ('manages/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}"
            type="text/javascript"></script>
    <script src="{{ URL::asset ('manages/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}"
            type="text/javascript"></script>
    <script src="{{ URL::asset ('manages/assets/pages/scripts/ui-extended-modals.min.js')}}"
            type="text/javascript"></script>
  @endpush
