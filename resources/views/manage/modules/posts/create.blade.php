@extends('manage.master')
@section('title', __('static.sidebars.manage.posts.creates'))
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->

      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('posts.index')}}">{{__('static.sidebars.manage.posts.title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.sidebars.manage.posts.creates')}}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> {{__('static.sidebars.manage.posts.creates')}}  </h3>
      <!-- END PAGE TITLE-->
      <div class="row">
        <div class="col-md-9">
          {!! Form::open(['route' => 'category.store', 'files' => true]) !!}
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Thêm bài viết</span>
              </div>
            </div>
            <div class="portlet-body form">
              <div class="form-body">
                @if($flash = session('message'))
                  <div class="alert alert-success display-hide" style="display: block;">
                    <button class="close" data-close="alert"></button> {{$flash}}
                  </div>
                @endif
                @include('manage.blocks.errors')
                @php $key = 'post_title'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.posts.'.$key.'')}}
                    <span class="required"> * </span>
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control', 'required' => 'required','placeholder' => __('common.posts.posts.'.$key.'_placeholder')]) !!}
                </div>

                @php $key = 'slug'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.posts.'.$key.'')}}
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control', 'placeholder' => __('common.posts.posts.'.$key.'_placeholder')]) !!}
                </div>

                @php $key = 'post_full'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.posts.'.$key.'')}}
                  </label>
                  {!! Form::textarea($key, old($key) ,
                  [
                  'class' => 'summernote_editor form-control',
                  'rows' => 9
                  ]) !!}
                </div>

                @php $key = 'post_keyword'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.posts.'.$key.'')}}
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control','placeholder' => __('common.posts.posts.'.$key.'_placeholder')]) !!}
                </div>

                @php $key = 'post_intro'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.posts.'.$key.'')}}
                  </label>
                  {!! Form::textarea($key, old($key) ,
                  [
                  'class' => 'form-control',
                  'rows' => 3
                  ]) !!}
                </div>
              <div class="form-actions">
                <button type="submit" class="btn green">{{__('common.buttons.save')}}</button>
                <a href="{{ route('posts.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
              </div>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div> <!-- End .col-md-9 -->
        <div class="col-md-3">
          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption">Đăng bài viết </div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">

            </div>
          </div>

          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption">Định dạng </div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
              <ul>
                <li>Chuẩn</li>
                <li>Video</li>
                <li>Audio</li>
                <li>Bộ sưu tập</li>
              </ul>
            </div>
          </div>

          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption">Chuyên mục </div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">

            </div>
          </div>

          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption">Ảnh tiêu biểu </div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">

            </div>
          </div>

          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption">Thẻ </div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">

            </div>
          </div>

        </div> <!-- End .col-md-3 -->
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