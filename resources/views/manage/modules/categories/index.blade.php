@extends('manage.master')
@section('title', __('static.manage.posts.category.page_title'))
@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <span>{{__('static.sidebars.manage.posts.category')}}</span>
          </li>
        </ul>
      </div>
      <h3 class="page-title"> {{__('static.sidebars.manage.posts.category')}}  </h3>
      <div class="row">
        <div class="col-md-5">
        {!! Form::open(['route' => 'manage.categories.store', 'files' => true]) !!}
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Thêm mới chuyên mục</span>
              </div>
            </div>
            <div class="portlet-body form">
              <div class="form-body">
                @php $key = 'name'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.category.'.$key.'')}}
                    <span class="required"> * </span>
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control', 'required' => 'required','placeholder' => __('common.posts.category.'.$key.'_placeholder')]) !!}
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
                      $html = ''; $text = '&nbsp; &nbsp; &nbsp;';
                      $html .= "<option value='0'>Trống</option>";
                      if(!empty($list_cate_all)){
                        foreach($list_cate_all as $parent){
                          if($parent->parent_id == 0){
                            $html .= "<option value='{$parent->id}' class='level-0' >".$parent->name."</option>";
                            //unset($data[$key]);
                            foreach ($list_cate_all as $child){

                              if($child->parent_id == $parent->id){
                                $html .= "<option value='{$child->id}' class='level-1'>".$text.$child->name."</option>";
                                foreach ($list_cate_all as $child2){
                                  if($child2->parent_id == $child->id){
                                      $html .= "<option value='{$child2->id}' class='level-2'>".$text.$text.$child2->name."</option>";
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
                  {!! Form::textarea($key, old($key),[
                    'class' => 'tinymce_editor form-control',
                    'rows' => 6
                  ]) !!}
                </div>
                @php $key = 'image'; @endphp
                <div class="form-group @if ($errors->has($key)) has-error  @endif last">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                    <div>
                      <span class="btn default btn-file">
                        <span class="fileinput-new"> Chọn hình ảnh </span>
                        <span class="fileinput-exists"> Ảnh khác </span>
                        {{ Form::file($key) }}
                      </span>
                      <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Gỡ bỏ </a>
                    </div>
                  </div>
                  @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
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
                  <a href="{{ route('manage.categories.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
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
                   'id'        => 'categories',
                   'routeAjax' => route('manage.categories.index'),
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
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
  @stop
@section('scripts')
 @parent
 <script src="{{ asset('/manages/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
 <script src="{{  asset('/manages/assets/global/plugins/plupload/js/plupload.full.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('/manages/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@stop