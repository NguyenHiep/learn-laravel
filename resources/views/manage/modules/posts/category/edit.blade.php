@extends('manage.master')
@section('title', __('static.manage.posts.category.page_title'))
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
            <a href="{{route('category.index')}}">{{__('static.sidebars.manage.posts.category')}}</a>
            <i class="fa fa-circle"></i>
          </li>

          <li>
            <span>Chỉnh sửa chuyên mục</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> {{__('static.sidebars.manage.posts.category')}}  </h3>
      <!-- END PAGE TITLE-->
      <div class="row">
        <div class="col-md-9">
          {!! Form::model($record, ['method' => 'PATCH', 'action' => ['Manage\Posts\CategoryController@update',$record->id] , 'class'=> 'form-horizontal', 'files' => true]) !!}

          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Chỉnh sửa chuyên mục</span>
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
                @php $key = 'name'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.category.'.$key.'')}}
                    <span class="required"> * </span>
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control','placeholder' => __('common.posts.category.'.$key.'_placeholder')]) !!}
                </div>
                @php $key = 'slug'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.category.'.$key.'')}}
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.posts.category.'.$key.'_placeholder')]) !!}
                </div>
                @php $key = 'parent_id'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.category.'.$key.'')}}
                  </label>

                  <select name="{{$key}}" id="{{$key}}" class="form-control select2me">
                    @php
                    echo $record->id;
                      $html = ''; $text = '&nbsp; &nbsp; &nbsp;';
                      $html .= "<option value='0'>Trống</option>";
                      $select ='selected="selected"';
                      if(!empty($list_cate_all)){
                        foreach($list_cate_all as $parent){
                          if($parent->parent_id == 0){
                            // Active edit level 0
                            if($record->parent_id == $parent->id){
                               $html .= "<option value='{$parent->id}' class='level-0' {$select}>".$parent->name."</option>";
                            }else{
                              $html .= "<option value='{$parent->id}' class='level-0'>".$parent->name."</option>";
                            }

                            //unset($data[$key]);
                            foreach ($list_cate_all as $child){

                              if($child->parent_id == $parent->id){
                                // Active edit level 1
                                if($record->parent_id == $child->id){
                                  $html .= "<option value='{$child->id}' class='level-1' {$select}>".$text.$child->name."</option>";
                                }else{
                                  $html .= "<option value='{$child->id}' class='level-1'>".$text.$child->name."</option>";
                                }

                                foreach ($list_cate_all as $child2){
                                  // Active edit level 2
                                  if($child2->parent_id == $child->id){
                                    if($record->parent_id == $child2->id){
                                      $html .= "<option value='{$child2->id}' class='level-2' {$select}>".$text.$text.$child2->name."</option>";
                                    }else{
                                      $html .= "<option value='{$child2->id}' class='level-2'>".$text.$text.$child2->name."</option>";
                                    }

                                  }
                                } // End loop level 3

                              }
                            } // End loop level 2

                          }

                        } // End loop level 1
                      }
                      echo $html;
                    @endphp

                  </select>

                </div>
                @php $key = 'description'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.category.'.$key.'')}}
                  </label>
                  {!! Form::textarea($key, isset($record->{$key}) ? $record->{$key} : old($key) ,
                  [
                  'class' => 'summernote_editor form-control',
                  'rows' => 6
                  ]) !!}

                </div>

              </div>
              <div class="form-actions">
                <button type="submit" class="btn green">{{__('common.buttons.save')}}</button>
                <a href="{{ route('category.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
              </div>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
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
              <div class="caption">Ảnh tiêu biểu </div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">

            </div>
          </div>
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