@extends('manage.master')
@section('title', __('static.manage.products.edit'))
@section('content')
  <div class="page-content-wrapper products">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('manage.products.index')}}">Sản phẩm</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Cập nhật sản phẩm</span>
          </li>
        </ul>
      </div>
      <h3 class="page-title"> Cập nhật sản phẩm </h3>
      <div class="row">
        {!! Form::model($record, ['method' => 'PATCH', 'action' => ['Manage\ProductsController@update', $record->id], 'files' => true, 'class' => 'form-horizontal form-row-seperated']) !!}
        <div class="col-md-9">
          <div class="portlet">
            <div class="portlet-title">
              <div class="actions btn-set">
                <button type="button" name="back" class="btn btn-secondary-outline">
                  <i class="fa fa-angle-left"></i> Back</button>
                <button class="btn btn-success">
                  <i class="fa fa-check"></i> Save</button>
                <button class="btn btn-success">
                  <i class="fa fa-check-circle"></i> Save & Continue Edit</button>
              </div>
            </div>
            <div class="portlet-body">
              @includeIf('manage.modules.products.fields', ['record' => $record])
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
              @php $key='status'; @endphp
              <div class="form-group clearfix">
                <label class="control-label">Trạng thái:</label>
                @if(!empty(__('selector.post_status')))
                  <div class="radio-list">
                    @foreach(__('selector.post_status') as $k => $val)
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
                <a href="{{ route('manage.products.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
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
              @includeIf('manage.modules.products.categories', ['record' => $record])
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
              @php $key='pictures' @endphp
              <div class="portlet-body" style="display: block;">
                <div class="form-group @if ($errors->has($key)) has-error  @endif last">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                      @php
                        $img_url =  (!empty($record->{$key})) ? asset(UPLOAD_PRODUCT.$record->{$key}) : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA';
                        echo '<img src="'.$img_url.'" alt="product" />';
                      @endphp
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                    <div>
                  <span class="btn default btn-file">
                     @php
                       echo (!empty($record->{$key})) ? '<span class="fileinput-new"> Thay đổi ảnh </span>' : '<span class="fileinput-new"> Chọn hình ảnh </span>';
                     @endphp
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
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
@stop
@section('scripts')
  @parent
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
  <script src="{{  asset('/manages/assets/pages/scripts/ecommerce-products-edit.js') }}" type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
@stop