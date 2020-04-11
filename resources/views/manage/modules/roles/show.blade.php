@extends('manage.master')
@section('title', __('static.manage.roles.show', ['name' => $role->name]))

@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('manage.roles.index')}}">{{__('static.sidebars.manage.customers.roles')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.manage.roles.show', ['name' => $role->name])}}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title">{{__('static.manage.roles.show', ['name' => $role->name])}}</h3>
      <!-- END PAGE TITLE-->
      <div class="row">
        <div class="col-md-12">
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-user font-dark"></i>
                <span class="caption-subject bold uppercase">{{__('static.manage.roles.show', ['name' => $role->name])}}</span>
              </div>
              <div class="tools"></div>
              <div class="actions">
                <a class="btn default" href="{{ route('manage.roles.index') }}">
                  <i class="fa fa-arrow-left"></i> {{__('common.buttons.back')}}
                </a>
              </div>
            </div>
            <div class="portlet-body">
              @if(!empty($rolePermissions))
                @foreach($rolePermissions as $permission)
                  <label class="badge badge-info">{{ $permission->name }}</label>
                @endforeach
              @endif
            </div>
          </div>
          <!-- END EXAMPLE TABLE PORTLET-->
        </div>
      </div>
    </div>
  </div>
@endsection