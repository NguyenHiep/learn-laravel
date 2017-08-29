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
            <span>Thêm mới thành viên</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> Thêm mới thành viên </h3>
      <!-- END PAGE TITLE-->

      <div class="row">
        <div class="col-md-12">
        {!! Form::open(['route' => 'settings.update', 'id' => 'form_sample_3', 'class'=> 'form-horizontal']) !!}
        <!-- BEGIN VALIDATION STATES-->
          <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
              <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Nhập thông tin thành viên</span>
              </div>
              <div class="actions">
                <button type="button" class="btn default">Cancel</button>
                <button type="submit" name="submit" class="btn green" id="submit_form">Save data</button>
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
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3">Tên tài khoản
                        <span class="required"> * </span>
                      </label>
                      <div class="col-md-9">
                        {!! Form::text('company_name', isset($settings->company_name) ? $settings->company_name : old('company_name'), ['class' => 'form-control', 'data-required' => '1','placeholder' => 'VD: TNHH Giadinhit.com']) !!}
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3">Vĩ độ</label>
                      <div class="col-md-9">
                        {!! Form::text('company_lat', isset($settings->company_lat) ? $settings->company_lat : old('company_lat'), ['class' => 'form-control','placeholder' => 'VD: 34.395353']) !!}
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green">Save data</button>
                    <button type="button" class="btn default">Cancel</button>
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
  <!-- END PAGE LEVEL SCRIPTS -->
@stop