@extends('manage.master')
@section('title', __('static.manage.posts.tags.page_title'))
@section('content')

  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('posts.index')}}">{{__('static.sidebars.manage.posts.title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.sidebars.manage.posts.tags')}}</span>
          </li>
        </ul>
      </div>
      <h3 class="page-title"> {{__('static.sidebars.manage.posts.tags')}}  </h3>
      <div class="row">
        <div class="col-md-5">
          {!! Form::open(['route' => 'tags.store', 'files' => true]) !!}
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Thêm mới thẻ</span>
              </div>
            </div>
            <div class="portlet-body form">
              <div class="form-body">
                @php $key = 'name'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.tags.'.$key.'')}}
                    <span class="required"> * </span>
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control', 'required' => 'required','placeholder' => __('common.posts.tags.'.$key.'_placeholder')]) !!}
                </div>
                @php $key = 'slug'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.tags.'.$key.'')}}
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.posts.tags.'.$key.'_placeholder')]) !!}
                </div>
                @php $key = 'description'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.tags.'.$key.'')}}
                  </label>
                  {!! Form::textarea($key, old($key),[
                    'class' => 'tinymce_editor form-control',
                    'rows' => 6
                  ]) !!}
                </div>
                @php $key = 'status'; @endphp
                @if(!empty(__('selector.post_status')))
                  <div class="radio-list">
                    @foreach(__('selector.post_status') as $k =>$val)
                      @if($k === STATUS_DISABLE)
                        <label class="radio-inline"> {!! Form::radio($key, $k, true) !!}    {{$val }} </label>
                      @else
                        <label class="radio-inline"> {!! Form::radio($key, $k) !!}    {{$val }} </label>
                      @endif
                    @endforeach
                  </div>
                @endif
              </div>
              <div class="form-actions">
                <button type="submit" class="btn green">{{__('common.buttons.save')}}</button>
                <a href="{{ route('tags.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
              </div>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
        <div class="col-md-7">
          <div class="portlet light bordered">
            <div class="portlet-body">
              <div class="table-scrollable">
                <table class="table table-hover js-action-list-rowlink">
                  <thead>
                  <tr>
                    <th> <!-- <th class="checkbox-list">-->
                      <input class="js-action-list-checkboxes" name="checkboxes" value="Hiep123" type="checkbox" id="form_checkboxes">
                    </th>
                    <th>Tên thẻ</th>
                    <th> Trạng thái</th>
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
                          <td> {{$record->name}} </td>
                          <td class="text-center">
                            <span class="label label-sm  @if ($record->status === STATUS_ENABLE) label-success @else  label-danger @endif margin-right-10"> {{__('selector.post_status.'.$record->status)}} </span>
                          </td>
                          <td class="text-right">
                            <div class="btn-group btn-group-solid">
                              <a title="{{__('common.buttons.edit')}}" href="{{ route('tags.edit',$record->id) }}" class="btn  btn-warning js-action-list-rowlink-val">
                                <i class="fa fa-edit"></i>
                              </a>
                              <form action="{{ route('tags.destroy',$record->id) }}" method="POST" style="display: inline-block">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button title="{{__('common.buttons.delete')}}" class="btn btn-delete js-action-delete" type="submit">
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
                    <td colspan="8"> {{ $records->links() }}</td>
                  @endif
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('styles')
  @parent
  <link href="{{ asset('/manages/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
@stop
@section('scripts')
  @parent
   <script src=" {{ asset('/manages/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
@stop