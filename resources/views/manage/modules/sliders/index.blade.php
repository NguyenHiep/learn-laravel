@extends('manage.master')
@section('title', 'Quản lý slider')

@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('sliders.index')}}">Sliders</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Danh sách sliders</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <div class="row margin-top-30">
        <div class="col-md-12">
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Danh sách slidersn</span>
              </div>
              <div class="tools"></div>
              <div class="actions">
                <a class="btn green" href="{{ route('sliders.create') }}"> {{__('common.buttons.create')}}
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-scrollable">
                <table class="table table-hover js-action-list-rowlink">
                  <thead>
                  <tr>
                    <th> <!-- <th class="checkbox-list">-->
                           <input class="js-action-list-checkboxes" name="checkboxes" value="Hiep123" type="checkbox" id="form_checkboxes">
                    </th>
                    <th> #ID</th>
                    <th> Hình ảnh</th>
                    <th> Tiêu đề</th>
                    <th> Nội dung</th>
                    <th class="text-center"> Trạng thái</th>
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
                          <td> {{$record->id}} </td>
                          <td>
                            @if(!empty($record->slider_img))
                              <img src="{{ asset(UPLOAD_SLIDER.$record->slider_img)}}" alt="slider img" width="40" height="40" />
                            @else
    
                            @endif
                          </td>
                          </td>
                          <td> {{$record->slider_title}} </td>
                          <td> {{$record->slider_content}} </td>
                          <td class="text-center">
                              <span class="label label-sm  @if ($record->slider_status === STATUS_ENABLE) label-success @else label-danger @endif margin-right-10"> <i class="fa fa-check-circle"></i> {{__('selector.post_status.'.$record->slider_status)}} </span>
                           
                          </td>
                          <td class="text-right">
                            <div class="btn-group btn-group-solid">
                              <a href="{{ route('sliders.edit',$record->id) }}" class="btn  btn-warning js-action-list-rowlink-val"><i class="fa fa-edit"></i></a>
                              <form action="{{ route('sliders.destroy',$record->id) }}" method="POST" style="display: inline-block">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-delete js-action-delete" type="submit"><i class="fa fa-trash-o"></i></button>
                              </form>
                            </div>

                        </tr>
                      @endforeach
                    @endif

                  </tbody>
                  <tfoot>
                      <tr>
                        @if (!empty($records))
                        <td colspan="8"> {{ $records->links() }}</td>
                        @endif
                      </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <!-- END EXAMPLE TABLE PORTLET-->
        </div>
      </div>
    </div>
  </div>
@endsection