@extends('manage.master')
@section('title', __('common.products.comments.title'))
@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('manage.products.comments.index')}}">{{__('static.manage.products.comments.page_title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('common.products.comments.title')}}</span>
          </li>
        </ul>
      </div>
      <h3 class="page-title"> {{__('static.manage.products.comments.edit')}}  </h3>
      <div class="row">
        {!! Form::model($record, ['method' => 'PATCH', 'action' => ['Manage\ProductCommentsController@update', $record->id], 'files' => false]) !!}
        <div class="col-md-9">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">{{ __('static.manage.products.comments.edit') }}</span>
              </div>
            </div>
            <div class="portlet-body form">
              <div class="form-body">
                @php $key = 'name'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.products.comments.'.$key.'')}}
                    <span class="required"> * </span>
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control', 'required' => 'required','placeholder' => __('common.products.comments.'.$key.'_placeholder') ]) !!}
                </div>
                @php $key = 'content'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.products.comments.'.$key.'')}}
                  </label>
                  {!! Form::textarea($key, old($key) ,[
                    'class' => 'tinymce_editor form-control',
                    'rows' => 9
                  ]) !!}
                </div>
              </div> <!-- End .form-body -->
            </div>

          </div>
        </div> <!-- End .col-md-9 -->
        <div class="col-md-3">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Đăng bình luận</div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
              @if(!empty($record->product))
              <div class="form-group clearfix">
                <label>Sản phẩm: <a href="{{ route('product.show', $record->product->slug) }}" target="_blank">{{$record->product->name}}</a></label>
              </div>
              @endif
              @php $key = 'created_at'; @endphp
              <div class="form-group">
                <label>Ngày bình luận: <strong>{{ format_date($record->$key, '%d/%m/%Y@%H:%M') }}</strong> </label>
              </div>
              @php $key = 'ip_user'; @endphp
              <div class="form-group clearfix">
                <label>Ip: {{$record->$key}}</label>
              </div>
              @php $key = 'rate'; @endphp
              <div class="form-group clearfix">
                <label>Số sao: {{$record->$key}}</label>
              </div>
              @php $key='status'; @endphp
              <div class="form-group clearfix">
                <label class="control-label">Trạng thái:</label>
                @if(!empty(__('selector.page_status')))
                  <div class="radio-list">
                    @foreach(__('selector.page_status') as $k => $val)
                      @if($k === $record->$key)
                        <label class="radio-inline"> {!! Form::radio($key, $k, true) !!} {{$val }} </label>
                      @else
                        <label class="radio-inline"> {!! Form::radio($key, $k) !!} {{$val }} </label>
                      @endif
                    @endforeach
                  </div>
                @endif
              </div>
              <div class="form-group clearfix">
                <a href="{{ route('manage.products.comments.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
                <button type="submit" class="btn green pull-right">Đăng bình luận</button>
              </div>
            </div>
          </div>
        </div> <!-- End .col-md-3 -->
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection