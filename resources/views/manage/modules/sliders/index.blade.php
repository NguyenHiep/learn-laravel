@extends('manage.master')
@section('title', 'Quản lý slider')

@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('manage.sliders.index')}}">Sliders</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Danh sách sliders</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <div class="row margin-top-30">
        <div class="col-md-12">
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Danh sách slider</span>
              </div>
              <div class="tools"></div>
              <div class="actions">
                <a class="btn green" href="{{ route('manage.sliders.create') }}"> {{__('common.buttons.create')}}
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-container">
                @includeIf('manage.blocks.partials.dataTable', [
                   'id'        => 'sliders',
                   'routeAjax' => route('manage.sliders.index'),
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