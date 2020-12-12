@extends('manage.master')
@section('title', __('static.manage.settings.theme_options.page_title'))
@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('manage.settings.theme_options')}}">{{__('static.sidebars.manage.settings.title')}}</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>{{__('static.manage.settings.theme_options.page_title')}}</span>
          </li>
        </ul>
      </div>
      <h3 class="page-title"> {{__('static.manage.settings.theme_options.page_title')}}  </h3>
      <div class="row">
        <div class="col-md-12">
        {!! Form::open(['route' => 'manage.settings.theme_options.stored', 'id' => 'form_sample_3', 'class'=> 'form-horizontal', 'files' => true]) !!}
        <!-- BEGIN VALIDATION STATES-->
          <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
              <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">{{__('static.manage.settings.theme_options.page_title')}}</span>
              </div>
              <div class="actions">
                <button type="button" class="btn default">{{__('common.buttons.cancel')}}</button>
                <button type="submit" name="submit" class="btn green" id="submit_form">{{__('common.buttons.save')}}</button>
              </div>
            </div>

            <div class="portlet-body">
              <div class="form-body">
                <h3 class="block-title margin-bottom-15">{{__('static.manage.settings.theme_options.title_general')}}</h3>
                <div class="row">
                  <div class="col-md-12">
                    @php $key = 'enable_social'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                    @php $key = 'enable_copyright'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                    @php $key = 'enable_subscribe'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                    @php $key = 'enable_checkout_cart'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                    @php $key = 'enable_show_logo_site'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                    @php $key = 'enable_login_facebook'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                    @php $key = 'enable_login_google'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-body">
                <h3 class="block-title margin-bottom-15">{{__('static.manage.settings.theme_options.title_home')}}</h3>
                <div class="row">
                  <div class="col-md-12">
                    @php $key = 'enable_home_slider'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                    @php $key = 'enable_home_category_one'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                    @php $key = 'enable_home_category_two'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                    @php $key = 'enable_home_category_three'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                    @php $key = 'enable_home_category_four'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                    @php $key = 'enable_home_product_related'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                    @php $key = 'enable_home_product_trending'; @endphp
                    <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                      <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                        <span class="required"> * </span>
                      </label>
                      <div class="radio-list">
                        @foreach(__('selector.status') as $k => $val)
                          @if($params[$key] == $k)
                            <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                          @else
                            <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                          @endif
                        @endforeach
                      </div>
                      @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-body">
                <h3 class="block-title margin-bottom-15">{{__('static.manage.settings.theme_options.title_products')}}</h3>
                <div class="row">
                   <div class="col-md-12">
                     <div class="col-md-6">
                       @php $key = 'enable_product_viewed'; @endphp
                       <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                         <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                           <span class="required"> * </span>
                         </label>
                         <div class="radio-list">
                           @foreach(__('selector.status') as $k => $val)
                             @if($params[$key] == $k)
                               <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                             @else
                               <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                             @endif
                           @endforeach
                         </div>
                         @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                       </div>
                       @php $key = 'enable_product_comment'; @endphp
                       <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                         <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                           <span class="required"> * </span>
                         </label>
                         <div class="radio-list">
                           @foreach(__('selector.status') as $k => $val)
                             @if($params[$key] == $k)
                               <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                             @else
                               <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                             @endif
                           @endforeach
                         </div>
                         @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                       </div>
                       @php $key = 'enable_product_related'; @endphp
                       <div class="col-md-6 form-group  @if ($errors->has($key)) has-error  @endif">
                         <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                           <span class="required"> * </span>
                         </label>
                         <div class="radio-list">
                           @foreach(__('selector.status') as $k => $val)
                             @if($params[$key] == $k)
                               <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                             @else
                               <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                             @endif
                           @endforeach
                         </div>
                         @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                       </div>
                       @php $key = 'enable_category_filter_attribute'; @endphp
                       <div class="col-md-12 form-group  @if ($errors->has($key)) has-error  @endif">
                         <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                           <span class="required"> * </span>
                         </label>
                         <div class="radio-list">
                           @foreach(__('selector.status') as $k => $val)
                             @if($params[$key] == $k)
                               <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                             @else
                               <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                             @endif
                           @endforeach
                         </div>
                         @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                       </div>
                     </div>
                     <div class="col-md-6">
                       @php $key = 'limit_number_category'; @endphp
                       <div class="col-md-12 form-group @if ($errors->has($key)) has-error  @endif">
                         <label class="control-label">{{__('common.settings.theme_options.'. $key .'')}} </label>
                         {!! Form::number($key, isset($params[$key]) ? $params[$key] : old($key), ['class' => 'form-control', 'min' => 0]) !!}
                         @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                       </div>
                       @php $key = 'limit_number_product_comment'; @endphp
                       <div class="col-md-12 form-group @if ($errors->has($key)) has-error  @endif">
                         <label class="control-label">{{__('common.settings.theme_options.'. $key .'')}}</label>
                         {!! Form::number($key, isset($params[$key]) ? $params[$key] : old($key), ['class' => 'form-control', 'min' => 0]) !!}
                         @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                       </div>
                     </div>
                   </div>
                </div>
              </div>
              <div class="form-body">
                <h3 class="block-title margin-bottom-15">{{__('static.manage.settings.theme_options.title_posts')}}</h3>
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-6">
                      @php $key = 'enable_post_related'; @endphp
                      <div class="col-md-12 form-group  @if ($errors->has($key)) has-error  @endif">
                        <label class="control-label">{{__('common.settings.theme_options.'.$key.'')}}
                          <span class="required"> * </span>
                        </label>
                        <div class="radio-list">
                          @foreach(__('selector.status') as $k => $val)
                            @if($params[$key] == $k)
                              <label> {!! Form::radio($key, $k, true) !!} {{ $val }} </label>
                            @else
                              <label> {!! Form::radio($key, $k) !!} {{ $val }} </label>
                            @endif
                          @endforeach
                        </div>
                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      @php $key = 'limit_number_post'; @endphp
                      <div class="col-md-12 form-group @if ($errors->has($key)) has-error  @endif">
                        <label class="control-label">{{__('common.settings.theme_options.'. $key .'')}} </label>
                        {!! Form::number($key, isset($params[$key]) ? $params[$key] : old($key), ['class' => 'form-control', 'min' => 0]) !!}
                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                      </div>
                      @php $key = 'limit_number_post_comment'; @endphp
                      <div class="col-md-12 form-group @if ($errors->has($key)) has-error  @endif">
                        <label class="control-label">{{__('common.settings.theme_options.'. $key .'')}}</label>
                        {!! Form::number($key, isset($params[$key]) ? $params[$key] : old($key), ['class' => 'form-control', 'min' => 0]) !!}
                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9 text-right">
                    <button type="submit" class="btn green">{{__('common.buttons.save')}}</button>
                    <button type="button" class="btn default">{{__('common.buttons.cancel')}}</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection