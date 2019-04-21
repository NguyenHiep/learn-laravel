@extends('manage.master')
@section('title', 'Cập nhật thông tin khách hàng')
@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('admins.index')}}">Quản lý tài khoản</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Cập nhật khách hàng</span>
          </li>
        </ul>
      </div>
      <h3 class="page-title"> Cập nhật khách hàng </h3>
      <div class="row">
        <div class="col-md-12">
        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['Manage\CustomersController@update',$user->id] , 'class'=> 'form-horizontal', 'files' => true]) !!}
          <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
              <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Nhập thông tin khách hàng</span>
              </div>
              <div class="actions">
                <a href="{{ route('customers.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
                <button type="submit" name="submit" class="btn green" id="submit_form">{{__('common.buttons.save')}}</button>
              </div>
            </div>
            <div class="portlet-body">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-8">
                    @php $key = 'avatar'; @endphp
                    <div class="form-group @if ($errors->has($key)) has-error  @endif last">
                      <label class="control-label col-md-3">Ảnh đại diện
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                            @php
                              $img_url =  (!empty($user->{$key})) ? Storage::url(UPLOAD_USER_ADMIN.$user->{$key}) : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA';
                              echo '<img src="'.$img_url.'" alt="avatar user" />';
                            @endphp
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"
                               style="max-width: 200px; max-height: 150px;"></div>
                          <div>
                            <span class="btn default btn-file">
                             @php
                               echo (!empty($user->{$key})) ? '<span class="fileinput-new"> Thay đổi ảnh </span>' : '<span class="fileinput-new"> Chọn hình ảnh </span>';
                             @endphp
                              <span class="fileinput-exists"> Ảnh khác </span>
                              {{ Form::file($key) }} </span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Gỡ bỏ </a>
                          </div>
                        </div>
                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                      </div>
                    </div>
                    @php $key = 'username'; @endphp
                    <div class="form-group @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label col-md-3">{{__('common.settings.admins.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        {!! Form::text($key, old($key,$user->{$key}), ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.settings.admins.'.$key.'_placeholder')]) !!}
                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                      </div>
                    </div>
                    @php $key = 'password'; @endphp
                    <div class="form-group @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label col-md-3">{{__('common.settings.admins.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        {!! Form::password($key, ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.settings.admins.'.$key.'_placeholder')]) !!}
                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                      </div>
                    </div>
                    @php $key = 'level'; @endphp
                    <div class="form-group @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label col-md-3">{{__('common.settings.admins.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        {!! Form::select($key, __('selector.levels'), old($key, $user->{$key}),['class' => 'form-control select2me']) !!}
                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                      </div>
                    </div>
                    @php $key = 'status'; @endphp
                    <div class="form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label col-md-3">{{__('common.settings.admins.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        <div class="radio-list">
                          @foreach(__('selector.status') as $k =>$val)
                            @if($k == $user->{$key})
                              <label> {!! Form::radio($key, $k, true) !!}  {{ $val }} </label>
                            @else
                              <label> {!! Form::radio($key, $k) !!}  {{ $val }} </label>
                            @endif
                          @endforeach
                        </div>
                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green">{{__('common.buttons.save')}}</button>
                    <a href="{{ route('customers.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
@section('styles')
  @parent
  <link href="{{ asset('/manages/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css"/>
@stop
@section('scripts')
  @parent
  <script src=" {{ asset('/manages/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@stop