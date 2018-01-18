@extends('manage.master')
@section('title', 'Thêm mới sản phẩm')
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->

      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('customers.index')}}">Sản phẩm</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Thêm mới sản phẩm</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> Thêm mới sản phẩm </h3>
      <!-- END PAGE TITLE-->
      <div class="row">
        <div class="col-md-12">
          {!! Form::open(['route' => 'products.store', 'files' => true, 'class' => 'form-horizontal form-row-seperated']) !!}
            <div class="portlet">
              <div class="portlet-title">
                <div class="actions btn-set">
                  <button type="button" name="back" class="btn btn-secondary-outline">
                    <i class="fa fa-angle-left"></i> Back</button>
                  <button class="btn btn-secondary-outline">
                    <i class="fa fa-reply"></i> Reset</button>
                  <button class="btn btn-success">
                    <i class="fa fa-check"></i> Save</button>
                  <button class="btn btn-success">
                    <i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                  <div class="btn-group">
                    <a class="btn btn-success dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                      <i class="fa fa-share"></i> More
                      <i class="fa fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu pull-right">
                      <li>
                        <a href="javascript:;"> Duplicate </a>
                      </li>
                      <li>
                        <a href="javascript:;"> Delete </a>
                      </li>
                      <li class="dropdown-divider"> </li>
                      <li>
                        <a href="javascript:;"> Print </a>
                      </li>
                    </div>
                  </div>
                </div>
              </div>
              <div class="portlet-body">
                <div class="tabbable-bordered">
                  <ul class="nav nav-tabs">
                    <li class="active">
                      <a href="#tab_general" data-toggle="tab"> Thông tin sản phẩm </a>
                    </li>
                    <li>
                      <a href="#tab_meta" data-toggle="tab"> SEO </a>
                    </li>
                    <li>
                      <a href="#tab_images" data-toggle="tab"> Hình ảnh sản phẩm </a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_general">
                      <div class="form-body">
                        <div class="form-group">
                          <label class="col-md-2 control-label">Tên sản phẩm:
                            <span class="required"> * </span>
                          </label>
                          <div class="col-md-10">
                            <input type="text" class="form-control" name="product[name]" placeholder=""> </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Mô tả sản phẩm:</label>
                          <div class="col-md-10">
                            <textarea class="form-control" name="product[description]"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Mô tả ngắn sản phẩm:</label>
                          <div class="col-md-10">
                            <textarea class="form-control" name="product[short_description]"></textarea>
                            <span class="help-block">Hiển thị trong danh sách sản phẩm</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Thể loại sản phẩm:
                            <span class="required"> * </span>
                          </label>
                          <div class="col-md-10">
                            <div class="form-control height-auto">
                              <div class="scroller" style="height:275px;" data-always-visible="1">
                                <ul class="list-unstyled">
                                  <li>
                                    <label>
                                      <input type="checkbox" name="product[categories][]" value="1">Mens</label>
                                    <ul class="list-unstyled">
                                      <li>
                                        <label>
                                          <input type="checkbox" name="product[categories][]" value="1">Footwear</label>
                                      </li>
                                      <li>
                                        <label>
                                          <input type="checkbox" name="product[categories][]" value="1">Clothing</label>
                                      </li>
                                      <li>
                                        <label>
                                          <input type="checkbox" name="product[categories][]" value="1">Accessories</label>
                                      </li>
                                      <li>
                                        <label>
                                          <input type="checkbox" name="product[categories][]" value="1">Fashion Outlet</label>
                                      </li>
                                    </ul>
                                  </li>
                                  <li>
                                    <label>
                                      <input type="checkbox" name="product[categories][]" value="1">Football Shirts</label>
                                    <ul class="list-unstyled">
                                      <li>
                                        <label>
                                          <input type="checkbox" name="product[categories][]" value="1">Premier League</label>
                                      </li>
                                      <li>
                                        <label>
                                          <input type="checkbox" name="product[categories][]" value="1">Football League</label>
                                      </li>
                                      <li>
                                        <label>
                                          <input type="checkbox" name="product[categories][]" value="1">Serie A</label>
                                      </li>
                                      <li>
                                        <label>
                                          <input type="checkbox" name="product[categories][]" value="1">Bundesliga</label>
                                      </li>
                                    </ul>
                                  </li>
                                  <li>
                                    <label>
                                      <input type="checkbox" name="product[categories][]" value="1">Brands</label>
                                    <ul class="list-unstyled">
                                      <li>
                                        <label>
                                          <input type="checkbox" name="product[categories][]" value="1">Adidas</label>
                                      </li>
                                      <li>
                                        <label>
                                          <input type="checkbox" name="product[categories][]" value="1">Nike</label>
                                      </li>
                                      <li>
                                        <label>
                                          <input type="checkbox" name="product[categories][]" value="1">Airwalk</label>
                                      </li>
                                      <li>
                                        <label>
                                          <input type="checkbox" name="product[categories][]" value="1">Kangol</label>
                                      </li>
                                    </ul>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <span class="help-block"> Chọn một hoặc nhiều thể loại </span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-2 control-label">SKU:
                            <span class="required"> * </span>
                          </label>
                          <div class="col-md-10">
                            <input type="text" class="form-control" name="product[sku]" placeholder=""> </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Giá bán:
                            <span class="required"> * </span>
                          </label>
                          <div class="col-md-10">
                            <input type="text" class="form-control" name="product[price]" placeholder=""> </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Giá khuyến mãi:</label>
                          <div class="col-md-10">
                            <input type="text" class="form-control" name="product[sale_price]" placeholder=""> </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-2 control-label">Status:
                            <span class="required"> * </span>
                          </label>
                          <div class="col-md-10">
                            <select class="table-group-action-input form-control input-medium" name="product[status]">
                              <option value="">Chọn...</option>
                              <option value="1">Hiển thị</option>
                              <option value="0">Không hiển thị</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab_meta">
                      <div class="form-body">
                        <div class="form-group">
                          <label class="col-md-2 control-label">Meta Title:</label>
                          <div class="col-md-10">
                            <input type="text" class="form-control maxlength-handler" name="product[meta_title]" maxlength="100" placeholder="">
                            <span class="help-block"> tối đa 100 ký tự </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Meta Keywords:</label>
                          <div class="col-md-10">
                            <textarea class="form-control maxlength-handler" rows="8" name="product[meta_keywords]" maxlength="1000"></textarea>
                            <span class="help-block"> tối đa 1000 ký tự</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Meta Description:</label>
                          <div class="col-md-10">
                            <textarea class="form-control maxlength-handler" rows="8" name="product[meta_description]" maxlength="255"></textarea>
                            <span class="help-block"> tối đa 255 ký tự </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab_images">
                      <div class="alert alert-success margin-bottom-10">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <i class="fa fa-warning fa-lg"></i> Image type and information need to be specified. </div>
                      <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
                        <a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn btn-success">
                          <i class="fa fa-plus"></i> Select Files </a>
                        <a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn btn-primary">
                          <i class="fa fa-share"></i> Upload Files </a>
                      </div>
                      <div class="row">
                        <div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12"> </div>
                      </div>
                      <table class="table table-bordered table-hover">
                        <thead>
                        <tr role="row" class="heading">
                          <th width="8%"> Hình ảnh </th>
                          <th width="25%"> Tiêu đề </th>
                          <th width="8%"> Sort Order </th>
                          <th width="10%"> Base Image </th>
                          <th width="10%"> Small Image </th>
                          <th width="10%"> Thumbnail </th>
                          <th width="10%"> </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>
                            <a href="{{ asset('manages/assets/pages/media/works/img1.jpg') }}" class="fancybox-button" data-rel="fancybox-button">
                              <img class="img-responsive" src="{{ asset('manages/assets/pages/media/works/img1.jpg') }}" alt=""> </a>
                          </td>
                          <td>
                            <input type="text" class="form-control" name="product[images][1][label]" value="Thumbnail image"> </td>
                          <td>
                            <input type="text" class="form-control" name="product[images][1][sort_order]" value="1"> </td>
                          <td>
                            <label>
                              <input type="radio" name="product[images][1][image_type]" value="1"> </label>
                          </td>
                          <td>
                            <label>
                              <input type="radio" name="product[images][1][image_type]" value="2"> </label>
                          </td>
                          <td>
                            <label>
                              <input type="radio" name="product[images][1][image_type]" value="3" checked> </label>
                          </td>
                          <td>
                            <a href="javascript:;" class="btn btn-default btn-sm">
                              <i class="fa fa-times"></i> Remove </a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="{{ asset('manages/assets/pages/media/works/img2.jpg') }}" class="fancybox-button" data-rel="fancybox-button">
                              <img class="img-responsive" src="{{ asset('manages/assets/pages/media/works/img2.jpg') }}" alt=""> </a>
                          </td>
                          <td>
                            <input type="text" class="form-control" name="product[images][2][label]" value="Product image #1"> </td>
                          <td>
                            <input type="text" class="form-control" name="product[images][2][sort_order]" value="1"> </td>
                          <td>
                            <label>
                              <input type="radio" name="product[images][2][image_type]" value="1"> </label>
                          </td>
                          <td>
                            <label>
                              <input type="radio" name="product[images][2][image_type]" value="2" checked> </label>
                          </td>
                          <td>
                            <label>
                              <input type="radio" name="product[images][2][image_type]" value="3"> </label>
                          </td>
                          <td>
                            <a href="javascript:;" class="btn btn-default btn-sm">
                              <i class="fa fa-times"></i> Remove </a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="{{ asset('manages/assets/pages/media/works/img3.jpg') }}" class="fancybox-button" data-rel="fancybox-button">
                              <img class="img-responsive" src="{{ asset('manages/assets/pages/media/works/img3.jpg') }}" alt=""> </a>
                          </td>
                          <td>
                            <input type="text" class="form-control" name="product[images][3][label]" value="Product image #2"> </td>
                          <td>
                            <input type="text" class="form-control" name="product[images][3][sort_order]" value="1"> </td>
                          <td>
                            <label>
                              <input type="radio" name="product[images][3][image_type]" value="1" checked> </label>
                          </td>
                          <td>
                            <label>
                              <input type="radio" name="product[images][3][image_type]" value="2"> </label>
                          </td>
                          <td>
                            <label>
                              <input type="radio" name="product[images][3][image_type]" value="3"> </label>
                          </td>
                          <td>
                            <a href="javascript:;" class="btn btn-default btn-sm">
                              <i class="fa fa-times"></i> Remove </a>
                          </td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
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
@section('styles')
  @parent
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/manages/assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />

  <!-- END PAGE LEVEL PLUGINS -->
@stop
@section('scripts')
  @parent
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="{{ asset('/manages/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
  <script src="{{  asset('/manages/assets/global/plugins/plupload/js/plupload.full.min.js') }}" type="text/javascript"></script>
  <script src="{{  asset('/manages/assets/pages/scripts/ecommerce-products-edit.min.js') }}" type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
@stop