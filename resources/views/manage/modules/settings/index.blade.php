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
            <a href="{{route('settings.index')}}">{{__('static.sidebars.manage.settings.title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.sidebars.manage.settings.settings')}}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> Quản lý thông tin website  </h3>
      <!-- END PAGE TITLE-->

      <div class="row">
        <div class="col-md-12">
        {!! Form::open(['route' => 'settings.update', 'id' => 'form_sample_3', 'class'=> 'form-horizontal']) !!}
        <!-- BEGIN VALIDATION STATES-->
          <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
              <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">{{__('static.sidebars.manage.settings.settings')}}</span>
              </div>
              <div class="actions">
                <button type="button" class="btn default">{{__('common.buttons.cancel')}}</button>
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
                <h3 class="block-title margin-bottom-15">Thông tin chung</h3>
                @include('manage.blocks.errors')

                <div class="row">
                  <div class="col-md-6">
                    @php $key = 'company_name'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.general.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        {!! Form::text($key, isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.settings.settings.general.'.$key.'_placeholder')]) !!}
                      </div>
                    </div>
                    @php $key = 'company_zip'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.general.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        {!! Form::text($key, isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control', 'data-required' => '1','placeholder' =>  __('common.settings.settings.general.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>
                    @php $key = 'company_address'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.general.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        {!! Form::text($key, isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.settings.settings.general.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>
                    @php $key = 'company_tel'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.general.'.$key.'')}}</label>
                      <div class="col-md-9">
                        {!! Form::text($key,isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control','placeholder' => __('common.settings.settings.general.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>
                    @php $key = 'company_fax'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.general.'.$key.'')}}</label>
                      <div class="col-md-9">
                        {!! Form::text($key, isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control','placeholder' => __('common.settings.settings.general.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>
                    @php $key = 'company_copyright'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.general.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        {!! Form::text($key, isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control','placeholder' => __('common.settings.settings.general.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>
                    @php $key = 'subtitle'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.general.'.$key.'')}}</label>
                      <div class="col-md-9">
                        {!! Form::text($key, isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control','placeholder' => __('common.settings.settings.general.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    @php $key = 'company_lat'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.general.'.$key.'')}}</label>
                      <div class="col-md-9">
                        {!! Form::text($key, isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control','placeholder' => __('common.settings.settings.general.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>
                    @php $key = 'company_lng'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.general.'.$key.'')}}</label>
                      <div class="col-md-9">
                        {!! Form::text($key, isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control','placeholder' => __('common.settings.settings.general.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3"></label>
                      <div class="col-md-9">
                        <iframe
                          src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d22169.609551143207!2d106.61998586636786!3d10.805926814680902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1502727694094"
                          width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="form-body">
                <h3 class="block-title">Các thông tin khác</h3>
                <h4 class="block-title-small">Thông tin email</h4>
                <div class="row">
                  <div class="col-md-6">
                    @php $key = 'email1'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.others.'.$key.'')}}</label>
                      <div class="col-md-9">
                        {!! Form::text($key, isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control','placeholder' => __('common.settings.settings.others.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    @php $key = 'email1_name'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.others.'.$key.'')}}</label>
                      <div class="col-md-9">
                        {!! Form::text($key, isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control','placeholder' => __('common.settings.settings.others.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>
                  </div>
                </div>
                <h4 class="block-title-small margin-top-15">Cấu hình host gửi mail SMTP</h4>
                <div class="row">
                  <div class="col-md-6">
                    @php $key = 'mail_smtp_host'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.others.'.$key.'')}}</label>
                      <div class="col-md-9">
                        {!! Form::text($key, isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control','placeholder' => __('common.settings.settings.others.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>
                    @php $key = 'mail_smtp_port'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.others.'.$key.'')}}</label>
                      <div class="col-md-9">
                        {!! Form::text($key,  isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control','placeholder' => __('common.settings.settings.others.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    @php $key = 'mail_smtp_user'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.others.'.$key.'')}}</label>
                      <div class="col-md-9">
                        {!! Form::text($key, isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control','placeholder' => __('common.settings.settings.others.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>
                    @php $key = 'mail_smtp_pass'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-3">{{__('common.settings.settings.others.'.$key.'')}}</label>
                      <div class="col-md-9">
                        {!! Form::text($key, isset($settings->{$key}) ? $settings->{$key} : old($key), ['class' => 'form-control','placeholder' => __('common.settings.settings.others.'.$key.'_placeholder') ]) !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-body">
                <h3 class="block-title margin-bottom-15">Thông tin cá nhân và Điều khoản sử dụng</h3>
                <div class="row">
                  <div class="col-md-12">
                    @php $key = 'about_privacy'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-2">{{__('common.settings.settings.others.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-10">
                        {!! Form::textarea($key, isset($settings->{$key}) ? $settings->{$key} : old($key) ,
                        [
                            'class' => 'ckeditor form-control',
                            'rows' => 6,
                            'data-error-container' => '#editor2_error'
                        ]) !!}
                        <div id="editor2_error"></div>
                      </div>
                    </div>
                    @php $key = 'about_terms'; @endphp
                    <div class="form-group">
                      <label class="control-label col-md-2">{{__('common.settings.settings.others.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-10">
                        {!! Form::textarea($key, isset($settings->{$key}) ? $settings->{$key} : old($key) ,
                        [
                            'class' => 'ckeditor form-control',
                            'rows' => 6,
                            'data-error-container' => '#editor2_error'
                        ]) !!}
                        <div id="editor2_error"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green">{{__('common.buttons.save')}}</button>
                    <button type="button" class="btn default">{{__('common.buttons.cancel')}}</button>
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
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"
        rel="stylesheet" type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}"
        rel="stylesheet" type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}"
        rel="stylesheet" type="text/css"/>
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
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-markdown/lib/markdown.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/pages/scripts/form-validation.min.js') }}" type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
@stop