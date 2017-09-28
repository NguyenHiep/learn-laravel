@extends('manage.master')
@section('title', __('static.sidebars.manage.medias.title'))
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->

      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('medias.index')}}">{{__('static.sidebars.manage.medias.title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.sidebars.manage.medias.creates')}}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> Thêm tập tin </h3>
      <!-- END PAGE TITLE-->
      <div class="row">
        <div class="col-md-12">
          <form action="{{route('medias.store')}}" class="dropzone dropzone-file-area" id="my-dropzone"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3 class="sbold">Thả tập tin vào đây</h3>
            <p> Kéo thả tập tin vào đây hoặc click vào đây</p>
          </form>
        </div>
      </div>
    </div>
    <!-- END CONTENT BODY -->
  </div>

@endsection
@section('styles')
  @parent
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="{{ asset('/manages/assets/global/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/dropzone/basic.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
  @stop
@section('scripts')
 @parent
 <!-- BEGIN PAGE LEVEL SCRIPTS -->
 <script src="{{ asset('/manages/assets/global/plugins/dropzone/dropzone.min.js')}}" type="text/javascript"></script>
 <script src="{{ asset('/manages/assets/pages/scripts/form-dropzone.js')}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
@stop