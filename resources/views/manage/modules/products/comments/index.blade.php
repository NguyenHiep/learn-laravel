@extends('manage.master')
@section('title', __('static.manage.products.comments.page_title'))
@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('manage.dashboard')}}">{{__('static.sidebars.manage.manage')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.sidebars.manage.comments')}}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> {{__('static.sidebars.manage.comments')}}  </h3>
      <!-- END PAGE TITLE-->
      <div class="row">
          <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
              <div class="portlet-body">
                <div class="table-container">
                  @includeIf('manage.blocks.partials.dataTable', [
                     'id'        => 'product_comments',
                     'routeAjax' => route('manage.products.comments.index'),
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