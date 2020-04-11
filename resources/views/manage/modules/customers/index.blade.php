@extends('manage.master')
@section('title', 'Quản lý thông tin khách hàng')
@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('manage.customers.index')}}">Khách hàng</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Danh sách khách hàng</span>
          </li>
        </ul>
      </div>
      <div class="row margin-top-30">
        <div class="col-md-12">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Danh sách khách hàng</span>
              </div>
              <div class="tools"></div>
              <div class="actions">
                <a class="btn green" href="{{ route('manage.customers.create') }}"> {{__('common.buttons.create')}}
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-container">
                @includeIf('manage.blocks.partials.dataTable', [
                   'id'        => 'customers',
                   'routeAjax' => route('manage.customers.index'),
                   'columns'   => $columns,
                   'fields'    => $fields,
                ])
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection