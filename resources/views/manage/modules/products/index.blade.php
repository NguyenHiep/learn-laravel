@extends('manage.master')
@section('title', 'Quản lý sản phẩm')

@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li><a href="{{route('manage.products.index')}}">Sản phẩm</a><i class="fa fa-circle"></i></li>
          <li><span>Tất cả sản phẩm</span></li>
        </ul>
      </div>
      <div class="row margin-top-30">
        <div class="col-md-12">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">
                <i class="icon-graph"></i>Tất cả sản phẩm </div>
              <div class="actions">
                <a class="btn green" href="{{ route('manage.products.create') }}">{{__('common.buttons.create')}}
                  <i class="fa fa-plus"></i></a>
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-container">
                @includeIf('manage.blocks.partials.dataTable', [
                   'id'        => 'products',
                   'routeAjax' => route('manage.products.index'),
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