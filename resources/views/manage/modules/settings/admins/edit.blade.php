@extends('manage.master')
@section('title', 'Cài đặt thông tin website')
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->

      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('admins.index')}}">Quản lý tài khoản</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Cập nhật thành viên</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> Cập nhật thành viên </h3>
      <!-- END PAGE TITLE-->

      <div class="row">
        <div class="col-md-12">
        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['Manage\Settings\AdminsController@update',$user->id] , 'class'=> 'form-horizontal', 'files' => true]) !!}

        <!-- BEGIN VALIDATION STATES-->
          <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
              <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Nhập thông tin thành viên</span>
              </div>
              <div class="actions">
                <a href="{{ route('admins.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
                <button type="submit" name="submit" class="btn green" id="submit_form">{{__('common.buttons.save')}}</button>
              </div>
            </div>

            <div class="portlet-body">

              <div class="form-body">
                @if($flash = session('message'))
                  <div class="alert alert-success display-hide" style="display: block;">
                    <button class="close" data-close="alert"></button> {{$flash}}
                  </div>
                @endif
                @include('manage.blocks.errors')
                <div class="row">
                  <div class="col-md-8">
                    @php $key = 'avatar'; @endphp
                    <div class="form-group last">
                      <label class="control-label col-md-3">Ảnh đại diện
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                            <?php
                              if(!empty($user->{$key})){
                            ?>
                              <img src="{{Storage::url(UPLOAD_USER_ADMIN.$user->{$key})}}" height="40px" width="40px" alt="{{$user->{$key} }}"/>
                            <?php
                              }else{
                                echo '<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />';
                              }
                            ?>
                            </div>
                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                          <div>
                            <span class="btn default btn-file">
                             <?php
                                if(!empty($user->{$key})){
                                    echo '<span class="fileinput-new"> Thay đổi ảnh </span>';
                                }else{
                                    echo '<span class="fileinput-new"> Chọn hình ảnh </span>';
                                }
                              ?>
                                <span class="fileinput-exists"> Ảnh khác </span>
                                <input type="file" name="avatar"> </span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Gỡ bỏ </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @php $key = 'username'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.admins.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        {!! Form::text($key, old($key,$user->{$key}), ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.settings.admins.'.$key.'_placeholder')]) !!}
                      </div>
                    </div>
                    @php $key = 'password'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.admins.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        {!! Form::password($key, ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.settings.admins.'.$key.'_placeholder')]) !!}
                      </div>
                    </div>
                    @php $key = 'level'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.admins.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        {!! Form::select($key, __('selector.levels'), old($key, $user->{$key}),['class' => 'form-control select2me']) !!}
                      </div>
                    </div>
                    @php $key = 'status'; @endphp
                    <div class="form-group">
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
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green">{{__('common.buttons.save')}}</button>
                    <a href="{{ route('admins.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- END VALIDATION STATES-->
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <!-- END CONTENT BODY -->
  </div>

@endsection
@section('styles')
  @parent
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="{{ asset('/manages/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}"
        rel="stylesheet" type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
@stop
@section('scripts')
  @parent
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src=" {{ asset('/manages/assets/global/plugins/select2/js/select2.full.min.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-markdown/lib/markdown.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/pages/scripts/form-validation.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"
          type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
@stop