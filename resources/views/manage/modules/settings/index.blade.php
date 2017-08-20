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
                        <a href="{{route('settings.index')}}">Cài đặt</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Cấu hình website</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Quản lý thông tin website </h3>
            <!-- END PAGE TITLE-->

            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['route' => 'settings.update', 'id' => 'form_sample_3', 'class'=> 'form-horizontal']) !!}
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject font-dark sbold uppercase">Cài đặt thông tin</span>
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
                                <h3 class="block-title margin-bottom-15">Thông tin chung</h3>
                                @include('manage.blocks.errors')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tên công ty
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-9">
                                                {!! Form::text('company_name', isset($settings->company_name) ? $settings->company_name : old('company_name'), ['class' => 'form-control', 'data-required' => '1','placeholder' => 'VD: TNHH Giadinhit.com']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Mã bưu chính
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-9">
                                                {!! Form::text('company_zip', isset($settings->company_zip) ? $settings->company_zip : old('company_zip'), ['class' => 'form-control', 'data-required' => '1','placeholder' => 'VD: 700000']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Địa chỉ
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-9">
                                                {!! Form::text('company_address', isset($settings->company_address) ? $settings->company_address : old('company_address'), ['class' => 'form-control', 'data-required' => '1','placeholder' => 'VD: 42/11/2 Hồ Đắc Di, Tây Thạnh, Tân Phú']) !!}
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-md-3">Số điện thoại</label>
                                            <div class="col-md-9">
                                                {!! Form::text('company_tel',isset($settings->company_tel) ? $settings->company_tel : old('company_tel'), ['class' => 'form-control','placeholder' => 'VD: 0167-6542-578']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Số fax</label>
                                            <div class="col-md-9">
                                                {!! Form::text('company_fax', isset($settings->company_fax) ? $settings->company_fax : old('company_fax'), ['class' => 'form-control','placeholder' => 'VD: 082-246-9202']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Bản quyền website
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-9">
                                                {!! Form::text('company_copyright', isset($settings->company_copyright) ? $settings->company_copyright : old('company_copyright'), ['class' => 'form-control','placeholder' => 'VD: Giadinhit.com']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tiêu đề website</label>
                                            <div class="col-md-9">
                                                {!! Form::text('subtitle', isset($settings->subtitle) ? $settings->subtitle : old('subtitle'), ['class' => 'form-control','placeholder' => 'VD: Thiết kế website chất lượng']) !!}
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
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Kinh độ</label>
                                            <div class="col-md-9">
                                                {!! Form::text('company_lng', isset($settings->company_lng) ? $settings->company_lng : old('company_lng'), ['class' => 'form-control','placeholder' => 'VD: 132.45482']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-9">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d22169.609551143207!2d106.61998586636786!3d10.805926814680902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1502727694094" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Email người gửi</label>
                                            <div class="col-md-9">
                                                {!! Form::text('email1', isset($settings->email1) ? $settings->email1 : old('email1'), ['class' => 'form-control','placeholder' => 'VD: minhhiep.q@gmail.com']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tên hiển thị khi gửi email</label>
                                            <div class="col-md-9">
                                                {!! Form::text('email1_name', isset($settings->email1_name) ? $settings->email1_name : old('email1_name'), ['class' => 'form-control','placeholder' => 'VD: Nguyễn Minh Hiệp']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="block-title-small margin-top-15">Cấu hình host gửi mail SMTP</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Host SMTP</label>
                                            <div class="col-md-9">
                                                {!! Form::text('mail_smtp_host', isset($settings->mail_smtp_host) ? $settings->mail_smtp_host : old('mail_smtp_host'), ['class' => 'form-control','placeholder' => 'VD: smtp.gmail.com']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Port SMTP</label>
                                            <div class="col-md-9">
                                                {!! Form::text('mail_smtp_port',  isset($settings->mail_smtp_port) ? $settings->mail_smtp_port : old('mail_smtp_port'), ['class' => 'form-control','placeholder' => 'VD: 465 hoặc 587']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tài khoản SMTP</label>
                                            <div class="col-md-9">
                                                {!! Form::text('mail_smtp_user', isset($settings->mail_smtp_user) ? $settings->mail_smtp_user : old('mail_smtp_user'), ['class' => 'form-control','placeholder' => 'VD: nguyenhiep']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Mật khẩu SMTP</label>
                                            <div class="col-md-9">
                                                {!! Form::text('mail_smtp_pass', isset($settings->mail_smtp_pass) ? $settings->mail_smtp_pass : old('mail_smtp_pass'), ['class' => 'form-control','placeholder' => 'VD: nguyenhiep']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <h3 class="block-title margin-bottom-15">Thông tin cá nhân và Điều khoản sử dụng</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Bảo mật
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="ckeditor form-control" name="about_privacy" rows="6" data-error-container="#editor2_error">{{ isset($settings->about_privacy) ? $settings->about_privacy : old('about_privacy') }}</textarea>
                                                <div id="editor2_error"> </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-2">Điều khoản
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="ckeditor form-control" name="about_terms" rows="6" data-error-container="#editor2_error" >{{ isset($settings->about_terms) ? $settings->about_terms : old('about_terms') }}</textarea>
                                                <div id="editor2_error"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Submit</button>
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
    <link href="{{ asset('/manages/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/manages/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/manages/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/manages/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/manages/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
@stop
@section('scripts')
     <!--[if lt IE 9]>
        <script src="{{ asset('/manages/assets/global/plugins/respond.min.js') }}"></script>
        <script src="{{ asset('/manages/assets/global/plugins/excanvas.min.js') }}"></script>
    <![endif]-->

    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ asset('/manages/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <script src=" {{ asset('/manages/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/bootstrap-markdown/lib/markdown.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('/manages/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('/manages/assets/pages/scripts/form-validation.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ asset('/manages/assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/manages/assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
@stop