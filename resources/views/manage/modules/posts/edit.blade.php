@extends('manage.master')
@section('title', __('static.manage.posts.posts.edit'))
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
            <span>{{__('static.manage.posts.posts.edit')}}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> {{__('static.manage.posts.posts.edit')}}  </h3>
      <!-- END PAGE TITLE-->
      <div class="row">
        {!! Form::model($record, ['method' => 'PATCH', 'action' => ['Manage\PostsController@update',$record->id], 'files' => true]) !!}
        <div class="col-md-9">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">{{ __('static.manage.posts.posts.edit') }}</span>
              </div>
            </div>
            <div class="portlet-body form">
              <div class="form-body">
                @php $key = 'post_title'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.posts.'.$key.'')}}
                    <span class="required"> * </span>
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control', 'required' => 'required','placeholder' => __('common.posts.posts.'.$key.'_placeholder'), 'id' => 'title' ]) !!}
                </div>

                @php $key = 'post_slug'; @endphp

                <div class="form-group">
                  <label class="control-label">{{__('common.posts.posts.'.$key.'')}} : <a href="#"> {{url('/').'/'.$record->post_slug}} </a>
                  </label>
                  {!! Form::hidden($key, old($key), ['id' => 'slug']) !!}
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
                  'rows' => 3,
                  'placeholder' => __('common.posts.posts.'.$key.'_placeholder')
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
              @php $key='post_status'; @endphp
              <div class="form-group clearfix">
                <label class="control-label">Trạng thái:</label>
                @if(!empty(__('selector.post_status')))
                  <div class="radio-list">
                    @foreach(__('selector.post_status') as $k =>$val)
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
                <a href="{{ route('posts.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
                <button type="submit" class="btn green pull-right">Đăng bài viết</button>
              </div>
            </div>
          </div>
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Định dạng</div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
              @php $key='post_format'; @endphp
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
          </div>
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Chuyên mục</div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
              <div class="form-group">
                <div class="checkbox-list">
                  @php
                    $key = 'post_category.';
                    $html = '<label><input type="checkbox" name="'.convert_input_name($key).'" value="0" id="id-category-0">Không xác định</label>'; $text = '&nbsp;&nbsp;&nbsp;&nbsp;';
                    if(!empty($list_cate_all)){
                      foreach($list_cate_all as $parent){
                        if($parent->parent_id == 0){
                          // Active menu post level 1
                          if(in_array($parent->id, $record->cats, true)){
                            $html .= '<label><input type="checkbox" name="'.convert_input_name($key).'" value="'.$parent->id.'" id="id-category-'.$parent->id.'" checked />'.$parent->name.'</label>';
                          }else{
                            $html .= '<label><input type="checkbox" name="'.convert_input_name($key).'" value="'.$parent->id.'" id="id-category-'.$parent->id.'">'.$parent->name.'</label>';
                          }
                          //unset($data[$key]);
                          foreach ($list_cate_all as $child){
                            if($child->parent_id == $parent->id){
                              // Active menu post level 2
                              if(in_array($child->id, $record->cats, true)){
                                $html .= '<label>'.$text.'<input type="checkbox" name="'.convert_input_name($key).'" value="'.$child->id.'" id="id-category-'.$child->id.'" checked />'.$child->name.'</label>';
                              }else{
                                $html .= '<label>'.$text.'<input type="checkbox" name="'.convert_input_name($key).'" value="'.$child->id.'" id="id-category-'.$child->id.'">'.$child->name.'</label>';
                              }

                              foreach ($list_cate_all as $child2){
                                if($child2->parent_id == $child->id){
                                  // Active menu post level 2
                                  if(in_array($child2->id, $record->cats, true)){
                                  $html .= '<label>'.$text.$text.'<input type="checkbox" name="'.convert_input_name($key).'" value="'.$child2->id.'" id="id-category-'.$child2->id.'" checked />'.$child2->name.'</label>';
                                  }else{
                                  $html .= '<label>'.$text.$text.'<input type="checkbox" name="'.convert_input_name($key).'" value="'.$child2->id.'" id="id-category-'.$child2->id.'">'.$child2->name.'</label>';
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

                </div>
              </div>
            </div>
          </div>
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Ảnh tiêu biểu</div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
            @php $key = 'posts_medias_id'; @endphp
            <!--<a href="javascript:void(0)" class="">Chọn ảnh tiêu biểu</a>-->
              <a class="btn btn-outline btn-block dark" data-toggle="modal" href="#medias_libraries"> Chọn ảnh tiêu biểu</a>
              <div class="clearfix margin-top-15" id="img_featured">
                @if(!empty($record->{$key}))
                <img src="{{Storage::url(UPLOAD_MEDIAS.$record->post_featured)}}" draggable="false" alt="" class="img-responsive">
                @endif
              </div>
              <input type="hidden" name="{{$key}}" value="{{ $record->{$key} }}" id="{{ $key }}"/>
            </div>
          </div>
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Thẻ</div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
              @php $key = 'posts_tags'; @endphp
              <div class="input-group clearfix">
                <input type="text"  value="{{$record->tags}}" name="{{$key}}" data-role="tagsinput">
                <button id="add_tags" class="btn btn-success" type="button">Thêm</button>
              </div>
              <p class="margin-top-15">Phân cách các thẻ bằng dấu phẩy (,).</p>
              <p class="margin-top-15">
                <a href="#">Chọn từ những thẻ được dùng nhiều nhất</a>
              </p>
            </div>
          </div>
        </div> <!-- End .col-md-3 -->
        {!! Form::close() !!}
      </div>
      <!-- END CONTENT BODY -->
    </div>
  @include('manage.blocks.medias.modal', ['medias' => $medias, 'id' => $record->posts_medias_id])
  @endsection
  @section('styles')
    @parent
    <!-- BEGIN PAGE LEVEL PLUGINS -->
      <link href="{{ asset('/manages/assets/global/plugins/bootstrap-summernote/summernote.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('/manages/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('/manages/assets/global/plugins/typeahead/typeahead.css') }}" rel="stylesheet" type="text/css" />
      <!-- END PAGE LEVEL PLUGINS -->
  @stop
  @section('scripts')
    @parent
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
      <script src="{{ asset('/manages/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('/manages/assets/global/plugins/typeahead/handlebars.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('/manages/assets/global/plugins/typeahead/typeahead.bundle.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('/manages/assets/pages/scripts/components-bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('/manages/assets/global/plugins/bootstrap-summernote/summernote.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('/manages/assets/pages/scripts/components-editors.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('/manages/assets/js/posts/posts.js')}}" type="text/javascript"></script>
      <!-- END PAGE LEVEL SCRIPTS -->
@stop
