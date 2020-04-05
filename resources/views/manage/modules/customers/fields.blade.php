<div class="row">
    <div class="col-md-8">
        @php $key = 'first_name'; @endphp
        <div class="form-group @if ($errors->has($key)) has-error  @endif">
            <label class="control-label col-md-3">{{__('common.customers.'.$key.'')}}
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                {!! Form::text($key, old($key, $record->{$key} ?? null), ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.customers.'.$key.'_placeholder')]) !!}
                @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
            </div>
        </div>
        @php $key = 'last_name'; @endphp
        <div class="form-group @if ($errors->has($key)) has-error  @endif">
            <label class="control-label col-md-3">{{__('common.customers.'.$key.'')}}
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                {!! Form::text($key, old($key, $record->{$key} ?? null), ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.customers.'.$key.'_placeholder')]) !!}
                @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
            </div>
        </div>
        @php $key = 'username'; @endphp
        <div class="form-group @if ($errors->has($key)) has-error  @endif">
            <label class="control-label col-md-3">{{__('common.customers.'.$key.'')}}
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                {!! Form::text($key, old($key, $record->{$key} ?? null), ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.customers.'.$key.'_placeholder')]) !!}
                @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
            </div>
        </div>
        @php $key = 'password'; @endphp
        <div class="form-group @if ($errors->has($key)) has-error  @endif">
            <label class="control-label col-md-3">{{__('common.customers.'.$key.'')}}
                <span class="required">{{ !empty($record->id) ? '' : '*' }}</span>
            </label>
            <div class="col-md-9">
                {!! Form::password($key, ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.customers.'.$key.'_placeholder')]) !!}
                @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
            </div>
        </div>
        @php $key = 'phone'; @endphp
        <div class="form-group @if ($errors->has($key)) has-error  @endif">
            <label class="control-label col-md-3">{{__('common.customers.'.$key.'')}}
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                {!! Form::tel($key, old($key, $record->{$key} ?? null), ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.customers.'.$key.'_placeholder')]) !!}
                @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
            </div>
        </div>
        @php $key = 'email'; @endphp
        <div class="form-group @if ($errors->has($key)) has-error  @endif">
            <label class="control-label col-md-3">{{__('common.customers.'.$key.'')}}
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                {!! Form::email($key, old($key, $record->{$key} ?? null), ['class' => 'form-control', 'data-required' => '1','placeholder' => __('common.customers.'.$key.'_placeholder')]) !!}
                @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
            </div>
        </div>
        @php $key = 'gender'; @endphp
        <div class="form-group @if ($errors->has($key)) has-error  @endif">
            <label class="control-label col-md-3">{{__('common.customers.'.$key.'')}}
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                <div class="radio-list">
                    @if(!empty(__('selector.gender')))
                        @foreach(__('selector.gender') as $k =>$val)
                           {{-- <label> {!! Form::radio($key, $k, true) !!}  {{ $val }} </label>--}}
                            @if(!empty($record->{$key}) && $k == $record->{$key})
                                <label> {!! Form::radio($key, $k, true) !!}  {{ $val }} </label>
                            @else
                                <label> {!! Form::radio($key, $k) !!}  {{ $val }} </label>
                            @endif
                        @endforeach

                    @endif
                    @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                </div>
            </div>
        </div>
        @php $key = 'birthday'; @endphp
        <div class="form-group @if ($errors->has($key)) has-error  @endif">
            <label class="control-label col-md-3">{{__('common.customers.'.$key.'')}}
            </label>
            <div class="col-md-9">
                {!! Form::date($key, old($key, $record->{$key} ?? null), ['class' => 'form-control']) !!}
                @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
            </div>
        </div>
        @php $key = 'address'; @endphp
        <div class="form-group @if ($errors->has($key)) has-error  @endif">
            <label class="control-label col-md-3">{{__('common.customers.'.$key.'')}}
            </label>
            <div class="col-md-9">
                {!! Form::textarea($key, old($key, $record->{$key} ?? null), ['class' => 'form-control', 'rows' => 3]) !!}
                @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
            </div>
        </div>
        @php $key = 'avatar'; @endphp
        <div class="form-group @if ($errors->has($key)) has-error  @endif  last">
            <label class="control-label col-md-3">Ảnh đại diện</label>
            <div class="col-md-9">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        @php
                            $img_url =  (!empty($record->{$key})) ? Storage::url($record->{$key}) : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA';
                            echo '<img src="'.$img_url.'" alt="avatar user" />';
                        @endphp
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                    <div>
                        <span class="btn default btn-file">
                              @php
                                  echo (!empty($record->{$key})) ? '<span class="fileinput-new"> Thay đổi ảnh </span>' : '<span class="fileinput-new"> Chọn hình ảnh </span>';
                              @endphp
                            <span class="fileinput-exists"> Ảnh khác </span>
                            {{ Form::file($key) }}
                        </span>

                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Gỡ bỏ </a>
                    </div>
                </div>
                @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
            </div>
        </div>
        @php $key = 'status'; @endphp
        <div class="form-group @if ($errors->has($key)) has-error  @endif">
            <label class="control-label col-md-3">{{__('common.customers.'.$key.'')}}
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                <div class="radio-list">
                    @if(!empty(__('selector.status')))
                        @foreach(__('selector.status') as $k => $val)
                            @if(!empty($record->{$key}) && $k == $record->{$key})
                                <label> {!! Form::radio($key, $k, true) !!}  {{ $val }} </label>
                            @else
                                <label> {!! Form::radio($key, $k) !!}  {{ $val }} </label>
                            @endif
                        @endforeach
                    @endif
                    @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                </div>
            </div>
        </div>
    </div>
</div>