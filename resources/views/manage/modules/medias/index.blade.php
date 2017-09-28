@extends('manage.master')
@section('title', __('static.sidebars.manage.medias.medias'))
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
            <span>{{__('static.sidebars.manage.medias.medias')}}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> {{__('static.sidebars.manage.medias.medias')}}  </h3>
      <!-- END PAGE TITLE-->
      <div class="row">
        <div class="col-md-12">
          <div class="portlet light bordered">
            <div class="portlet-body">
              @if($flash = session('message'))
                <div class="alert alert-success display-hide" style="display: block;">
                  <button class="close" data-close="alert"></button> {{$flash}}
                </div>
              @endif
              <div class="table-scrollable">
                <table class="table table-hover js-action-list-rowlink">
                  <thead>
                  <tr>
                    <th> <!-- <th class="checkbox-list">-->
                      <input class="js-action-list-checkboxes" name="checkboxes" value="Hiep123" type="checkbox" id="form_checkboxes">
                    </th>
                    <th>Tập tin</th>
                    <th> Tác giả</th>
                    <th> Đính kèm</th>
                    <th> Ngày tải lên</th>
                    <th class="text-center"> Hành động</th>
                  </tr>
                  </thead>
                  <tbody>

                  @if (!empty($records))
                    @foreach ($records as $record)
                      <tr>
                        <td> <!--<td class="checkbox-list"> -->
                          <input id="action_ids{{$record->id}}" name="action_ids[]" value="{{$record->id}}" type="checkbox">
                        </td>
                        <td> <img src="{{Storage::url(UPLOAD_MEDIAS.$record->name)}}" height="40px" width="40px" alt="{{$record->posts_medias_info->alt}}"/>
                          {{ $record->name}} </td>
                        <td>{!! $record->users->username !!}</td>
                        <td></td>
                        <td>{{ date('d/m/Y', strtotime($record->created_at)) }}</td>

                        <td class="text-right">
                          <div class="btn-group btn-group-solid">
                            <a href="{{ route('medias.edit',$record->id) }}" class="btn  btn-warning js-action-list-rowlink-val">
                              <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('medias.destroy',$record->id) }}" method="POST" style="display: inline-block">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button class="btn btn-delete js-action-delete" type="submit">
                                <i class="fa fa-trash-o"></i>
                              </button>
                            </form>
                          </div>
                      </tr>
                    @endforeach
                  @endif

                  </tbody>
                  <tfoot>
                  @if (!empty($records))
                    <td colspan="5"> {{ $records->links() }}</td>
                  @endif
                  </tfoot>
                </table>
              </div>
            </div>
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