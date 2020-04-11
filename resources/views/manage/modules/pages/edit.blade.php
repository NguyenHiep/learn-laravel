@extends('manage.master')
@section('title', __('static.manage.pages.edit'))
@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('manage.pages.index')}}">{{__('static.sidebars.manage.pages.title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.manage.pages.edit')}}</span>
          </li>
        </ul>
      </div>
      <h3 class="page-title"> {{__('static.manage.pages.edit')}}  </h3>
      <div class="row">
        {!! Form::model($record, ['method' => 'PATCH', 'action' => ['Manage\PagesController@update',$record->id], 'files' => true]) !!}
        <div class="col-md-9">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">{{ __('static.manage.pages.edit') }}</span>
              </div>
            </div>
            <div class="portlet-body form">
              <div class="form-body">
                @php $key = 'page_title'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.pages.'.$key.'')}}
                    <span class="required"> * </span>
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control', 'required' => 'required','placeholder' => __('common.pages.'.$key.'_placeholder'), 'id' => 'title' ]) !!}
                </div>

                @php $key = 'page_slug'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.pages.'.$key.'')}} : <a href="{{url($record->page_slug)}}" target="_blank"> {{url('/')}}<span class="change_slug">{{'/'.$record->page_slug}}</span></a>
                    {{ Form::hidden($key,old($key), array('id' => 'slug')) }}
                  </label>
                </div>
                @php $key = 'page_full'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.pages.'.$key.'')}}
                  </label>
                  {!! Form::textarea($key, old($key) ,[
                    'class' => 'tinymce_editor form-control',
                    'rows' => 9
                  ]) !!}
                </div>

                @php $key = 'page_keyword'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.pages.'.$key.'')}}
                  </label>
                  {!! Form::text($key, old($key), ['class' => 'form-control','placeholder' => __('common.pages.'.$key.'_placeholder')]) !!}
                </div>

                @php $key = 'page_intro'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.pages.'.$key.'')}}
                  </label>
                  {!! Form::textarea($key, old($key) ,[
                    'class' => 'form-control',
                    'rows' => 3,
                    'placeholder' => __('common.pages.'.$key.'_placeholder')
                  ]) !!}
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End .col-md-9 -->
        <div class="col-md-3">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Đăng bài viết</div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
            <!--
              <div class="form-group">
                <label>Ngày đăng: <strong>29/09/2017@11:58</strong> </label>
              </div>
              -->
              @php $key='page_status'; @endphp
              <div class="form-group clearfix">
                <label class="control-label">Trạng thái:</label>
                @if(!empty(__('selector.page_status')))
                  <div class="radio-list">
                    @foreach(__('selector.page_status') as $k =>$val)
                      @if($k === 2)
                        <label class="radio-inline"> {!! Form::radio($key, $k, true) !!}    {{$val }} </label>
                      @else
                        <label class="radio-inline"> {!! Form::radio($key, $k) !!}    {{$val }} </label>
                      @endif
                    @endforeach
                  </div>
                @endif
              </div>
              <!--
              <div class="form-group">
                <label>Ngôn ngữ: </label>
              </div>
              -->
              <div class="form-group clearfix">
                <a href="{{ route('manage.pages.index') }}" class="btn default">{{__('common.buttons.cancel')}}</a>
                <button type="submit" class="btn green pull-right">Đăng bài viết</button>
              </div>
            </div>
          </div>
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Định dạng</div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
              @php $key='page_attribute'; @endphp
              @if(!empty(__('selector.format')))
                <div class="radio-list">
                  @foreach(__('selector.format') as $k =>$val)
                    <label> {{ Form::radio($key, $k, ($k == old($key, 'standard')) ? true : null) }}    {!! __('selector.icons.'.$k).'&nbsp;&nbsp;'.$val !!} </label>
                  @endforeach
                </div>
              @endif
            </div>
          </div>
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Ảnh tiêu biểu</div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block;">
            @php $key = 'page_medias_id'; @endphp
            <!--<a href="javascript:void(0)" class="">Chọn ảnh tiêu biểu</a>-->
              <a class="btn btn-outline btn-block dark" data-toggle="modal" href="#medias_libraries"> Chọn ảnh tiêu biểu</a>
              <div class="clearfix margin-top-15" id="img_featured">
                @if(!empty($record->{$key}))
                  <img src="{{Storage::url(UPLOAD_MEDIAS.$record->media->name)}}" draggable="false" alt="" class="img-responsive">
                  {{ Form::hidden($key, old($key, $record->{$key}),['id' => $key]) }}
                @else
                  <input type="hidden" name="{{$key}}" value="0" id="{{$key}}"/>
                @endif
              </div>

            </div>
          </div>
        </div> <!-- End .col-md-3 -->
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  @include('manage.blocks.medias.modal', [
      'medias' => $medias,
      'class' => 'page-modal',
      'id' => $record->page_medias_id
    ])
  @include('manage.blocks.medias.content', [
    'medias' => $medias,
    'class' => 'page-content',
  ])
@endsection
