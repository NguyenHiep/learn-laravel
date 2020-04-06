@extends('manage.master')
@section('title', 'Quản lý vai trò')

@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('manage')}}">{{__('static.sidebars.manage.manage')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.sidebars.manage.customers.roles')}}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title">{{__('static.sidebars.manage.customers.roles')}}</h3>
      <!-- END PAGE TITLE-->
      <div class="row">
        <div class="col-md-12">
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-user font-dark"></i>
                <span class="caption-subject bold uppercase">{{__('static.sidebars.manage.customers.roles')}}</span>
              </div>
              <div class="tools"></div>
              <div class="actions">
                <a class="btn green" href="{{ route('roles.create') }}"> {{__('common.buttons.create')}}
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-container">
                @includeIf('manage.blocks.partials.dataTable', [
                   'id'        => 'roles',
                   'routeAjax' => route('roles.index'),
                   'columns'   => $columns,
                   'fields'    => $fields,
                ])
              </div>
            </div>
          </div>
          <!-- END EXAMPLE TABLE PORTLET-->
        </div>
      </div>
    </div>
  </div>
@endsection