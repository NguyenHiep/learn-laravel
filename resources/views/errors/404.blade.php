@extends('manage.master')
@section('title', __('404 Not Found'))
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

      <!-- END PAGE HEADER-->
      <div class="row">
        <div class="col-md-12 page-404">
          <div class="number font-green"> 404 </div>
          <div class="details">
            <h3>Rất tiếc không tìm thấy trang</h3>
            <p> Chúng tôi không tìm thấy trang bạn yêu cầu
              <br/>
              <a href="{{route('manage')}}"> Quay lại trang home </a></p>
          </div>
        </div>
      </div>

    </div>
    <!-- END CONTENT BODY -->
  </div>

@endsection
@section('styles')
  @parent
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="{{ asset('/manages/assets/pages/css/error.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
@stop


