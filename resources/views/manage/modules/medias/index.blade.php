@extends('manage.master')
@section('title', __('static.manage.settings.settings.page_title'))
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->

      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('settings.index')}}">{{__('static.sidebars.manage.settings.title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.manage.settings.settings.page_title')}}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> {{__('static.manage.settings.settings.page_title')}}  </h3>
      <!-- END PAGE TITLE-->
      <div class="portfolio-content portfolio-1">
        <div id="js-filters-juicy-projects" class="cbp-l-filters-button">
          <div data-filter="*" class="cbp-filter-item-active cbp-filter-item btn dark btn-outline uppercase"> All
            <div class="cbp-filter-counter"></div>
          </div>
          <div data-filter=".identity" class="cbp-filter-item btn dark btn-outline uppercase"> Identity
            <div class="cbp-filter-counter"></div>
          </div>
          <div data-filter=".web-design" class="cbp-filter-item btn dark btn-outline uppercase"> Web Design
            <div class="cbp-filter-counter"></div>
          </div>
          <div data-filter=".graphic" class="cbp-filter-item btn dark btn-outline uppercase"> Graphic
            <div class="cbp-filter-counter"></div>
          </div>
          <div data-filter=".logos" class="cbp-filter-item btn dark btn-outline uppercase"> Logo
            <div class="cbp-filter-counter"></div>
          </div>
        </div>
        <div id="js-grid-juicy-projects" class="cbp medias-list">
          @foreach($records as $record)
              <div class="cbp-item graphic media__item">
                <div class="cbp-caption">
                  <div class="cbp-caption-defaultWrap">
                    <img src="{{Storage::url(UPLOAD_MEDIAS.$record->name)}}" alt="{{$record->id}}"/></div>
                  <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                      <div class="cbp-l-caption-body">
                        <a href="#view_detail_ajax" class="cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase" rel="nofollow">more info</a>
                        <a href="{{Storage::url(UPLOAD_MEDIAS.$record->name)}}" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">view larger</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          @endforeach

        </div>
        <div id="js-loadMore-juicy-projects" class="pagination-loading__btn-more cbp-l-loadMore-button">
          <a href="{{$records->nextPageUrl()}}" class="js-action-pagination btn grey-mint btn-outline" rel="nofollow" data-output-target=".medias-list">
            <span class="cbp-l-loadMore-defaultText">LOAD MORE</span>
            <span class="cbp-l-loadMore-loadingText">LOADING...</span>

          </a>
        </div>
      </div>
    </div>
    <!-- END CONTENT BODY -->
  </div>

@endsection
@section('styles')
  @parent
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-summernote/summernote.css') }}"
        rel="stylesheet" type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/cubeportfolio/css/cubeportfolio.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/pages/css/portfolio.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
  @stop
@section('scripts')
 @parent
 <!-- BEGIN PAGE LEVEL SCRIPTS -->
 <script src="{{ asset('/manages/assets/global/plugins/bootstrap-summernote/summernote.min.js') }}"
         type="text/javascript"></script>
 <script src="{{ asset('/manages/assets/pages/scripts/components-editors.min.js') }}"
         type="text/javascript"></script>
 <script src="{{ asset('/manages/assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('/manages/assets/pages/scripts/portfolio-1.min.js') }}" type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
@stop