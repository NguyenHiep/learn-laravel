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
                            {!! Form::textarea($key,  old($key), ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Vui lòng nhập mô tả']) !!}
                            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                          </div>
                        </div>

                        @php $key='short_description'; @endphp
                        <div class="form-group @if ($errors->has($key)) has-error  @endif">
                          <label class="col-md-2 control-label">Mô tả ngắn:</label>
                          <div class="col-md-10">
                            {!! Form::textarea($key,  old($key), ['class' => 'form-control', 'rows' => '2', 'placeholder' => 'Vui lòng nhập mô tả ngắn']) !!}
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
                        <div class="form-group">
                          <label class="col-md-2 control-label">Meta Keywords:</label>
                          <div class="col-md-10">
                            {!! Form::textarea($key,  old($key), ['class' => 'form-control maxlength-handler', 'maxlength' => '1000', 'rows' => '3', 'placeholder' => 'Meta Keywords']) !!}
                            <span class="help-block"> tối đa 1000 ký tự</span>
                          </div>
                        </div>
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
                      {{--<div class="alert alert-success margin-bottom-10">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <i class="fa fa-warning fa-lg"></i> Image type and information need to be specified. </div>--}}
                      <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
                        <a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn btn-success">
                          <i class="fa fa-plus"></i> Select Files </a>
                        <a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn btn-primary">
                          <i class="fa fa-share"></i> Upload Files </a>
                      </div>
                      <div class="row">
                        <div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12"> </div>
                      </div>
                      <table class="table table-bordered table-hover">
                        <thead>
                        <tr role="row" class="heading">
                          <th width="8%"> Hình ảnh </th>
                          <th width="25%"> Tiêu đề </th>
                          <th width="8%"> Sort Order </th>
                          <th width="10%"> Base Image </th>
                          <th width="10%"> Small Image </th>
                          <th width="10%"> Thumbnail </th>
                          <th width="10%"> </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>
                            <a href="{{ asset('manages/assets/pages/media/works/img1.jpg') }}" class="fancybox-button" data-rel="fancybox-button">
                              <img class="img-responsive" src="{{ asset('manages/assets/pages/media/works/img1.jpg') }}" alt=""> </a>
                          </td>
                          <td>
                            <input type="text" class="form-control" name="product[images][1][label]" value="Thumbnail image"> </td>
                          <td>
                            <input type="text" class="form-control" name="product[images][1][sort_order]" value="1"> </td>
                          <td>
                            <label>
                              <input type="radio" name="product[images][1][image_type]" value="1"> </label>
                          </td>
                          <td>
                            <label>
                              <input type="radio" name="product[images][1][image_type]" value="2"> </label>
                          </td>
                          <td>
                            <label>
                              <input type="radio" name="product[images][1][image_type]" value="3" checked> </label>
                          </td>
                          <td>
                            <a href="javascript:;" class="btn btn-default btn-sm">
                              <i class="fa fa-times"></i> Remove </a>
                          </td>
                        </tr>

                        </tbody>
                      </table>
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
            <div class="portlet-body" style="display: block;">
            @php $key = 'posts_medias_id'; @endphp
            <!--<a href="javascript:void(0)" class="">Chọn ảnh tiêu biểu</a>-->
              <a class="btn btn-outline btn-block dark" data-toggle="modal" href="#medias_libraries"> Chọn ảnh tiêu biểu</a>
              <div class="clearfix margin-top-15" id="img_featured">
                <!--<img src="http://minhhiep.info/wp-content/uploads/2017/10/cachua-300x300.jpg" draggable="false" alt="" class="img-responsive"> -->
              </div>
              <input type="hidden" name="{{$key}}" value="" id="{{$key}}"/>
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
  <link href="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />

  <!-- END PAGE LEVEL PLUGINS -->
@stop
@section('scripts')
  @parent
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="{{ asset('/manages/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
  <script src="{{  asset('/manages/assets/global/plugins/plupload/js/plupload.full.min.js') }}" type="text/javascript"></script>
  <script src="{{  asset('/manages/assets/pages/scripts/ecommerce-products-edit.js') }}" type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
@stop