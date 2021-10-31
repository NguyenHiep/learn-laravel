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
            <a href="{{route('manage.settings.index')}}">{{__('static.sidebars.manage.medias.title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.manage.medias.edit')}}</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> {{__('static.manage.medias.edit')}}  </h3>
      <!-- END PAGE TITLE-->
      <div class="row">
        {!! Form::model($record, ['method' => 'PATCH', 'action' => ['Manage\MediasController@update',$record->id] ,'files' => true]) !!}
        <div class="col-md-9">
          <div class="portlet light bordered">
            <div class="portlet-body" style="display: block; overflow: hidden">
              <div class="form-group">
                <img src="{{Storage::url($record->name)}}" alt="{{$record->name}}" class="img-responsive" />
              </div>
              <!--
              <div class="form-group">
                <a href="#" class="btn btn-primary">Sửa ảnh</a>
              </div>
              -->
              @php $key = 'mediasinfo.caption'; @endphp
              <div class="form-group">
                <label class="control-label">{{__('common.posts.medias.'.$key.'')}}
                </label>
                {!! Form::textarea(convert_input_name($key), old($key, $record->posts_medias_info->caption),
                  ['class' => 'form-control',
                  'placeholder' => __('common.posts.medias.'.$key.'_placeholder'),
                  'rows' => 3
                  ])
                !!}
              </div>
              @if($record->types == 'image')
                @php $key = 'mediasinfo.alt'; @endphp
                <div class="form-group">
                  <label class="control-label">{{__('common.posts.medias.'.$key.'')}}
                  </label>
                  {!! Form::text(convert_input_name($key), old(convert_input_name($key), $record->posts_medias_info->alt),
                    ['class' => 'form-control',
                    'placeholder' => __('common.posts.medias.'.$key.'_placeholder'),
                    ])
                  !!}
                </div>
              @endif
              @php $key = 'mediasinfo.description'; @endphp
              <div class="form-group">
                <label class="control-label">{{__('common.posts.medias.'.$key.'')}}
                </label>
                {!! Form::textarea(convert_input_name($key), old(convert_input_name($key), $record->posts_medias_info->description),
                  ['class' => 'form-control',
                  'placeholder' => __('common.posts.medias.'.$key.'_placeholder'),
                  'rows' => 3
                  ])
                !!}
              </div>
              @php $key = 'mediasinfo.lightbox'; @endphp
              <div class="form-group">
                <label class="control-label">{{__('common.posts.medias.'.$key.'')}}
                </label>
                @foreach(__('selector.status') as $k =>$val)
                  @if($k == $record->posts_medias_info->lightbox)
                    <label> {!! Form::radio(convert_input_name($key), $k, true) !!}  {{ $val }} </label>
                  @else
                    <label> {!! Form::radio(convert_input_name($key), $k) !!}  {{ $val }} </label>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">Lưu thay đổi </div>
              <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body" style="display: block; overflow: hidden">
              <ul class="list-unstyled clearfix">
                <!-- General-->
                <li><i class="fa fa-calendar-plus-o"></i> Được tải lên ngày: <b>{{date('d/m/Y @ H:i:s', strtotime($record->created_at)) }}</b></li>
                <li>
                  <lable>Liên Kết Tới Tập Tin:</lable>
                  <input type="text" readonly value="{{Storage::url($record->name)}}" class="form-control"/></li>
                <li><label for="">Tên tập tin:</label> <strong>{{$record->name}}</strong></li>
                <li><label for="">Loại tập tin:</label> <strong>{{$record->posts_medias_info->extension}}</strong></li>
                <li><label for="">Dung lượng tệp:</label> <strong>{{round(($record->posts_medias_info->size / 1024/ 1024),2).' MB' }}</strong></li>

                <!-- image -->
                <!--
                <li><label for="">Kích thước</label> <strong>580 </strong> × <strong> 870</strong></li>
                -->
                <!-- Video -->
                <!--
                <li><label for="">Độ dài: </label> <strong>0:05</strong></li>
                <li><label for="">Định Dạng Âm Thanh: </label> <strong>mp4</strong></li>
                <li><label for="">Bộ Mã Hóa Âm Thanh: </label> <strong>iISO/IEC 14496-3 AAC</strong></li>
                <li><label for="">Kích thước</label> <strong>1280 </strong> × <strong> 720</strong></li>
                -->
              </ul>
              <div class="button-actions clearfix">
                <a href="javascript:void(0)" data-url="{{route('manage.medias.index')}}" data-id="{{$record->id}}" onclick="return confirm('Bạn thật sự muốn xóa');" class="pull-left text-left js-action-medias">Xóa vĩnh viễn</a>
                <button type="submit"  class="btn btn-danger pull-right text-right">Cập nhật</button>
              </div>
            </div>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
    </div>
    <!-- END CONTENT BODY -->
  </div>

@endsection

@section('scripts')
 @parent
 <script src="{{ asset('/manages/assets/js/medias/medias.js')}}" type="text/javascript"></script>
@stop
