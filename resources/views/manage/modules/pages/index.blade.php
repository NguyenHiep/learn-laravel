@extends('manage.master')
@section('title', __('static.manage.settings.settings.page_title'))
@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('pages.index')}}">{{__('static.sidebars.manage.pages.title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.sidebars.manage.pages.pages')}}</span>
          </li>
        </ul>
      </div>
      <div class="row margin-top-30">
        <div class="col-md-12">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">{{__('static.sidebars.manage.pages.pages')}}</span>
              </div>
              <div class="tools"></div>
              <div class="actions">
                <a class="btn green" href="{{ route('pages.create') }}"> {{__('common.buttons.create')}}
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-container">
                @includeIf('manage.blocks.partials.dataTable', [
                   'id'        => 'pages',
                   'routeAjax' => route('pages.index'),
                   'columns'   => $columns,
                   'fields'    => $fields
                ])
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection