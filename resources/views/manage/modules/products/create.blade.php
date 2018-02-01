@extends('manage.master')
@section('title', 'Thêm mới sản phẩm')
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->

      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('customers.index')}}">Sản phẩm</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Thêm mới sản phẩm</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> Thêm mới sản phẩm </h3>
      <!-- END PAGE TITLE-->
      <div class="row">
        {!! Form::open(['route' => 'products.store', 'files' => true, 'class' => 'form-horizontal form-row-seperated']) !!}
        <div class="col-md-9">
            <div class="portlet">
              <div class="portlet-title">
                <div class="actions btn-set">
                  <button type="button" name="back" class="btn btn-secondary-outline">
                    <i class="fa fa-angle-left"></i> Back</button>
                  <button class="btn btn-secondary-outline">
                    <i class="fa fa-reply"></i> Reset</button>
                  <button class="btn btn-success">
                    <i class="fa fa-check"></i> Save</button>
                  <button class="btn btn-success">
                    <i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                </div>
              </div>
              <div class="portlet-body">
                <div class="tabbable-bordered">
                  <ul class="nav nav-tabs">
                    <li class="active">
                      <a href="#tab_general" data-toggle="tab"> Thông tin sản phẩm </a>
                    </li>
                    <li>
                      <a href="#tab_meta" data-toggle="tab"> SEO </a>
                    </li>
                    <li>
                      <a href="#tab_images" data-toggle="tab"> Ảnh galary </a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_general">
                      <div class="form-body">
                        @php $key='name'; @endphp
                        <div class="form-group @if ($errors->has($key)) has-error  @endif">
                          <label class="col-md-2 control-label">Tên sản phẩm:
                            <span class="required"> * </span>
                          </label>
                          <div class="col-md-10">
                            {!! Form::text($key,  old($key), ['class' => 'form-control', 'placeholder' => 'Vui lòng nhập tên sản phẩm']) !!}
                            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                          </div>
                        </div>
                        @php $key='description'; @endphp
                        <div class="form-group @if ($errors->has($key)) has-error  @endif">
                          <label class="col-md-2 control-label">Mô tả:
                            <span class="required"> * </span>
                          </label>
                          <div class="col-md-10">
                            {!! Form::textarea($key,  old($key), ['class' => 'form-control summernote_editor', 'rows' => '3', 'placeholder' => 'Vui lòng nhập mô tả']) !!}
                            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                          </div>
                        </div>

                        @php $key='short_description'; @endphp
                        <div class="form-group @if ($errors->has($key)) has-error  @endif">
                          <label class="col-md-2 control-label">Mô tả ngắn:</label>
                          <div class="col-md-10">
                            {!! Form::textarea($key,  old($key), ['class' => 'form-control summernote_editor', 'rows' => '2', 'placeholder' => 'Vui lòng nhập mô tả ngắn']) !!}
                            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                          </div>
                        </div>
                        @php $key='sku'; @endphp
                        <div class="form-group @if ($errors->has($key)) has-error  @endif">
                          <label class="col-md-2 control-label">SKU:
                            <span class="required"> * </span>
                          </label>
                          <div class="col-md-10">
                            {!! Form::text($key,  old($key), ['class' => 'form-control', 'placeholder' => 'SKU']) !!}
                            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                          </div>
                        </div>
                        @php $key='price'; @endphp
                        <div class="form-group @if ($errors->has($key)) has-error  @endif">
                          <label class="col-md-2 control-label">Giá bán:
                            <span class="required"> * </span>
                          </label>
                          <div class="col-md-10">{!! Form::number($key,  old($key), ['class' => 'form-control', 'placeholder' => 'Nhập giá bán']) !!}
                            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                          </div>
                        </div>
                        @php $key='sale_price'; @endphp
                        <div class="form-group @if ($errors->has($key)) has-error  @endif">
                          <label class="col-md-2 control-label">Giá khuyến mãi:</label>
                          <div class="col-md-10">{!! Form::number($key,  old($key), ['class' => 'form-control', 'placeholder' => 'Giá khuyến mãi']) !!}
                            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                          </div>
                        </div>
                        @php $key='quantity'; @endphp
                        <div class="form-group @if ($errors->has($key)) has-error  @endif">
                          <label class="col-md-2 control-label">Số lượng:  <span class="required"> * </span> </label>
                          <div class="col-md-10">{!! Form::number($key,  old($key), ['class' => 'form-control', 'placeholder' => 'Số lượng sản phẩm']) !!}
                            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab_meta">
                      <div class="form-body">
                        @php $key='meta_title'; @endphp
                        <div class="form-group">
                          <label class="col-md-2 control-label">Meta Title:</label>
                          <div class="col-md-10">
                            {!! Form::text($key,  old($key), ['class' => 'form-control maxlength-handler', 'maxlength' => '100', 'placeholder' => 'Meta title']) !!}
                            <span class="help-block"> tối đa 100 ký tự </span>
                          </div>
                        </div>
                        @php $key='meta_keywords'; @endphp
                        <div class="form-group">
                          <label class="col-md-2 control-label">Meta Keywords:</label>
                          <div class="col-md-10">
                            {!! Form::textarea($key,  old($key), ['class' => 'form-control maxlength-handler', 'maxlength' => '1000', 'rows' => '3', 'placeholder' => 'Meta Keywords']) !!}
                            <span class="help-block"> tối đa 1000 ký tự</span>
                          </div>
                        </div>
                        @php $key='meta_description'; @endphp
                        <div class="form-group">
                          <label class="col-md-2 control-label">Meta Description:</label>
                          <div class="col-md-10">
                            {!! Form::textarea($key,  old($key), ['class' => 'form-control maxlength-handler', 'maxlength' => '1000', 'rows' => '4', 'placeholder' => 'Meta Description']) !!}
                            <span class="help-block"> tối đa 255 ký tự </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab_images">
                      @php $key='galary_img[]'; @endphp
                      {{ Form::file($key, ['multiple']) }}
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
        <div class="col-md-3">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Đăng sản phẩm</div>
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
              @php $key='status'; @endphp
              <div class="form-group clearfix">
                <label class="control-label">Trạng thái:</label>
                @if(!empty(__('selector.post_status')))
                  <div class="radio-list">
                    @foreach(__('selector.post_status') as $k =>$val)
                      @if($k === DISABLE)
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
                <a href="{{ route('products.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
                <button type="submit" class="btn green pull-right">Đăng sản phẩm</button>
              </div>
            </div>
          </div>
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Thể loại sản phẩm</div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
              <div class="form-group">
                <div class="checkbox-list">
                  @php
                    $key = 'category_id.';
                    $html = '<label><input type="checkbox" name="'.convert_input_name($key).'" value="0" id="id-category-0">Không xác định</label>'; $text = '&nbsp;&nbsp;&nbsp;&nbsp;';
                    if(!empty($list_cate_all)){
                      foreach($list_cate_all as $parent){
                        if($parent->parent_id == 0){
                          $html .= '<label><input type="checkbox" name="'.convert_input_name($key).'" value="'.$parent->id.'" id="id-category-'.$parent->id.'">'.$parent->name.'</label>';
                          //unset($data[$key]);
                          foreach ($list_cate_all as $child){

                            if($child->parent_id == $parent->id){
                              $html .= '<label>'.$text.'<input type="checkbox" name="'.convert_input_name($key).'" value="'.$child->id.'" id="id-category-'.$child->id.'">'.$child->name.'</label>';
                              foreach ($list_cate_all as $child2){
                                if($child2->parent_id == $child->id){
                                     $html .= '<label>'.$text.$text.'<input type="checkbox" name="'.convert_input_name($key).'" value="'.$child2->id.'" id="id-category-'.$child2->id.'">'.$child2->name.'</label>';
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
              <div class="caption">Ảnh sản phẩm</div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            @php $key='pictures' @endphp
            <div class="portlet-body" style="display: block;">
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
            </div>
          </div>

        </div>
        {!! Form::close() !!}
      </div>
    </div>
    <!-- END CONTENT BODY -->
  </div>
  <div class="product">
    @include('manage.blocks.medias.modal', ['medias' => $medias])
    @include('manage.blocks.medias.content', ['medias' => $medias])
  </div>
@endsection
@section('styles')
  @parent
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />

  <link href="{{ asset('/manages/assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/js/plugin/summernote-0.7.0/dist/summernote.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />

  <!-- END PAGE LEVEL PLUGINS -->
@stop
@section('scripts')
  @parent
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="{{ asset('/manages/assets/js/plugin/summernote-0.7.0/dist/summernote.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/js/plugin/medias/summernote-ext-medias.js')}}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/pages/scripts/components-editors.min.js') }}" type="text/javascript"></script>

  <script src="{{ asset('/manages/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
  <script src="{{  asset('/manages/assets/global/plugins/plupload/js/plupload.full.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
  <script src="{{  asset('/manages/assets/pages/scripts/ecommerce-products-edit.js') }}" type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
@stop