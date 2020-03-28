<div class="tabbable-bordered">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#tab_general" data-toggle="tab"> Thông tin chung </a>
        </li>
        <li>
            <a href="#tab_description" data-toggle="tab"> Mô tả </a>
        </li>
        <li>
            <a href="#tab_meta" data-toggle="tab"> SEO </a>
        </li>
        <li>
            <a href="#tab_images" data-toggle="tab"> Ảnh gallery </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_general">
            <div class="form-body">
                @php $key='name'; @endphp
                <div class="form-group @if ($errors->has($key)) has-error  @endif">
                    <label class="col-md-2 control-label">Tên sản phẩm:
                        <span class="required"> * </span>
                    </label>
                    <div class="col-md-10">
                        {!! Form::text($key,  old($key, $record->{$key} ?? null), ['class' => 'form-control', 'placeholder' => 'Vui lòng nhập tên sản phẩm']) !!}
                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                </div>
                @php $key='sku'; @endphp
                <div class="form-group @if ($errors->has($key)) has-error  @endif">
                    <label class="col-md-2 control-label">SKU:
                        <span class="required"> * </span>
                    </label>
                    <div class="col-md-10">
                        {!! Form::text($key,  old($key, $record->{$key} ?? null), ['class' => 'form-control text-uppercase', 'placeholder' => 'SKU']) !!}
                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                </div>
                @php $key='price'; @endphp
                <div class="form-group @if ($errors->has($key)) has-error  @endif">
                    <label class="col-md-2 control-label">Giá bán:
                        <span class="required"> * </span>
                    </label>
                    <div class="col-md-10">{!! Form::number($key,  old($key, $record->{$key} ?? null), ['class' => 'form-control', 'placeholder' => 'Nhập giá bán', 'min' => 0]) !!}
                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                </div>
                @php $key='sale_price'; @endphp
                <div class="form-group @if ($errors->has($key)) has-error  @endif">
                    <label class="col-md-2 control-label">Giá khuyến mãi:</label>
                    <div class="col-md-10">{!! Form::number($key,  old($key, $record->{$key} ?? null), ['class' => 'form-control', 'placeholder' => 'Giá khuyến mãi', 'min' => 0]) !!}
                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                </div>
                @php $key='quantity'; @endphp
                <div class="form-group @if ($errors->has($key)) has-error  @endif">
                    <label class="col-md-2 control-label">Số lượng:  <span class="required"> * </span> </label>
                    <div class="col-md-10">{!! Form::number($key,  old($key, $record->{$key} ?? null), ['class' => 'form-control', 'placeholder' => 'Số lượng sản phẩm', 'min' => 0]) !!}
                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="panel-group accordion scrollable" id="product-attributes-wrapper">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#product-attributes-wrapper" href="#collapse_2_1">Thuộc tính sản phẩm</a>
                                </h4>
                            </div>
                            <div id="collapse_2_1" class="panel-collapse collapse in">
                                <div>
                                    <div class="table-responsive">
                                        <table class="options table table-bordered">
                                            <thead class="hidden-xs">
                                            <tr>
                                                <th>Size</th>
                                                <th>Mã</th>
                                                <th>Giá bán</th>
                                                <th>Tồn kho</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="product-attributes">
                                            @if (!empty($record) && !empty($record->productAttributes) &&count($record->productAttributes->toArray()))
                                                @foreach($record->productAttributes as $attributes)
                                                    <tr data-index="{{$loop->index}}">
                                                        @php $key='attributes.'. $loop->index .'.id'; @endphp
                                                        <input type="hidden" name="{{convert_input_name($key)}}" value="{{ old(convert_input_name($key), $attributes->id ?? null) }}"/>

                                                        @php $key='attributes.'. $loop->index .'.size'; @endphp
                                                        <td class="@if($errors->has($key)) has-error @endif">
                                                            <input class="form-control text-uppercase" type="text" name="{{convert_input_name($key)}}" value="{{ old(convert_input_name($key), $attributes->size ?? null) }}"/>
                                                            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                                                        </td>

                                                        @php $key='attributes.'. $loop->index .'.sku'; @endphp
                                                        <td class="@if($errors->has($key)) has-error @endif">
                                                            <input class="form-control text-uppercase" type="text" name="{{convert_input_name($key)}}" value="{{ old(convert_input_name($key), $attributes->sku ?? null) }}" />
                                                            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                                                        </td>

                                                        @php $key='attributes.'. $loop->index .'.price'; @endphp
                                                        <td class="@if($errors->has($key)) has-error @endif">
                                                            <input class="form-control" type="number" name="{{convert_input_name($key)}}" value="{{ old(convert_input_name($key), $attributes->price ?? null) }}" min="0" />
                                                            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                                                        </td>

                                                        @php $key='attributes.'. $loop->index .'.quantity'; @endphp
                                                        <td class="@if($errors->has($key)) has-error @endif">
                                                            <input class="form-control" type="number" name="{{convert_input_name($key)}}" value="{{ old(convert_input_name($key), $attributes->quantity ?? null) }}" min="0"/>
                                                            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                                                        </td>

                                                        <td class="text-center" style="min-width: 60px">
                                                            <button type="button"
                                                                class="btn btn-default js-action-delete-attribute-row"
                                                                data-attribute-id="{{$attributes->id}}"
                                                                data-url="{{ route('products.attributes.delete', $attributes->id) }}"
                                                                title="Xóa thuộc tính">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr data-index="0">
                                                    @php $key='attributes.0.size'; @endphp
                                                    <td class="@if($errors->has($key)) has-error @endif">
                                                        <input class="form-control text-uppercase" type="text" name="{{convert_input_name($key)}}" value="{{ old(convert_input_name($key), $attributes->size ?? null) }}"/>
                                                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                                                    </td>

                                                    @php $key='attributes.0.sku'; @endphp
                                                    <td class="@if($errors->has($key)) has-error @endif">
                                                        <input class="form-control text-uppercase" type="text" name="{{convert_input_name($key)}}" value="{{ old(convert_input_name($key), $attributes->sku ?? null) }}" />
                                                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                                                    </td>

                                                    @php $key='attributes.0.price'; @endphp
                                                    <td class="@if($errors->has($key)) has-error @endif">
                                                        <input class="form-control" type="number" name="{{convert_input_name($key)}}" value="{{ old(convert_input_name($key), $attributes->price ?? null) }}" min="0" />
                                                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                                                    </td>

                                                    @php $key='attributes.0.quantity'; @endphp
                                                    <td class="@if($errors->has($key)) has-error @endif">
                                                        <input class="form-control" type="number" name="{{convert_input_name($key)}}" value="{{ old(convert_input_name($key), $attributes->quantity ?? null) }}" min="0"/>
                                                        @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                                                    </td>

                                                    <td class="text-center" style="min-width: 60px"></td>
                                                </tr>
                                            @endif

                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="btn btn-default js-action-add-new-attribute" id="add-new-attribute">Thêm thuộc tính mới</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_description">
            @php $key='short_description'; @endphp
            <div class="form-group @if ($errors->has($key)) has-error  @endif">
                <label class="col-md-2 control-label">Mô tả ngắn:</label>
                <div class="col-md-10">
                    {!! Form::textarea($key, old($key, $record->{$key} ?? null), ['class' => 'form-control tinymce_editor', 'rows' => '2', 'placeholder' => 'Vui lòng nhập mô tả ngắn']) !!}
                    @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                </div>
            </div>
            @php $key='description'; @endphp
            <div class="form-group @if ($errors->has($key)) has-error  @endif">
                <label class="col-md-2 control-label">Mô tả:
                    <span class="required"> * </span>
                </label>
                <div class="col-md-10">
                    {!! Form::textarea($key, old($key, $record->{$key} ?? null), ['class' => 'form-control tinymce_editor', 'rows' => '3', 'placeholder' => 'Vui lòng nhập mô tả']) !!}
                    @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_meta">
            <div class="form-body">
                @php $key='meta_title'; @endphp
                <div class="form-group">
                    <label class="col-md-2 control-label">Meta Title:</label>
                    <div class="col-md-10">
                        {!! Form::text($key,  old($key, $record->{$key} ?? null), ['class' => 'form-control maxlength-handler', 'maxlength' => '100', 'placeholder' => 'Meta title']) !!}
                        <span class="help-block"> tối đa 100 ký tự </span>
                    </div>
                </div>
                @php $key='meta_keywords'; @endphp
                <div class="form-group">
                    <label class="col-md-2 control-label">Meta Keywords:</label>
                    <div class="col-md-10">
                        {!! Form::textarea($key,  old($key, $record->{$key} ?? null), ['class' => 'form-control maxlength-handler', 'maxlength' => '1000', 'rows' => '3', 'placeholder' => 'Meta Keywords']) !!}
                        <span class="help-block"> tối đa 1000 ký tự</span>
                    </div>
                </div>
                @php $key='meta_description'; @endphp
                <div class="form-group">
                    <label class="col-md-2 control-label">Meta Description:</label>
                    <div class="col-md-10">
                        {!! Form::textarea($key,  old($key, $record->{$key} ?? null), ['class' => 'form-control maxlength-handler', 'maxlength' => '255', 'rows' => '4', 'placeholder' => 'Meta Description']) !!}
                        <span class="help-block"> tối đa 255 ký tự </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_images">
        @if(!empty($record->galary_img) && count($record->galary_img) > 0)
            <ul class="list-inline upload-gallery clearfix">
            @foreach($record->galary_img as $item)
                <li>
                    <label>
                        @php
                            $urlImage = empty($item) ? '/manages/assets/imgs/default-product-img.jpg' : UPLOAD_PRODUCT . $item;
                            $displayDel = empty($item) ? 'none' : 'block';
                            $displayAdd = empty($item) ? 'block' : 'none';
                        @endphp
                        <span class="btn-add-image-{{$loop->iteration}}" style="display: {{ $displayAdd }}">+ Thêm</span>
                        <img src="{{asset($urlImage)}}" alt="image gallery" class="product-gallery-item gallery_img_{{$loop->iteration}}"/>
                        <a style="display: {{$displayDel}}" class="deleteImage icon-delete-{{$loop->iteration}}" title="Xóa ảnh" onclick="pictureRemove({{$loop->iteration}})"> <i class="fa fa-minus-circle text-danger"></i> </a>
                    </label>
                </li>
                <input type="file" id="gallery_img_{{$loop->iteration}}" style="display: none" name="gallery_img[]"/>
            @endforeach
            </ul>
        @endif
        </div>
    </div>
</div>