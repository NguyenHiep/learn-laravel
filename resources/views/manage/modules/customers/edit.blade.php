@extends('manage.master')
@section('title', 'Cập nhật thông tin khách hàng')
@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('customers.index')}}">Khách hàng</a>
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
                <span class="caption-subject font-dark sbold uppercase">Cập nhật thông tin khách hàng</span>
              </div>
              <div class="actions">
                <a href="{{ route('customers.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
                <button type="submit" name="submit" class="btn green" id="submit_form">{{__('common.buttons.save')}}</button>
              </div>
            </div>
            <div class="portlet-body">
              <div class="form-body">
                @includeIf('manage.modules.customers.fields', ['record' => $user])
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