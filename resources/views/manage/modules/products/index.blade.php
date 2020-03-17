@extends('manage.master')
@section('title', 'Quản lý sản phẩm')

@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li><a href="{{route('products.index')}}">Sản phẩm</a><i class="fa fa-circle"></i></li>
          <li><span>Tất cả sản phẩm</span></li>
        </ul>
      </div>
      <div class="row margin-top-30">
        <div class="col-md-12">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">
                <i class="icon-graph"></i>Tất cả sản phẩm </div>
              <div class="actions">
                <a class="btn green" href="{{ route('products.create') }}">{{__('common.buttons.create')}}
                  <i class="fa fa-plus"></i></a>
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-container">
                <table id="products_table" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Tên sản phẩm</th>
                      <th>Mã</th>
                      <th>Giá bán</th>
                      <th>Số lượng</th>
                      <th>Trạng thái</th>
                      <th>Ngày tạo</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
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
  <link href="{{asset('/manages/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('scripts')
  @parent
  <script src="{{asset('/manages/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
  <script>
    $(function () {
      $('#products_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '',
        columns: [
          { data: 'id', name: 'id' },
          { data: 'name', name: 'name' },
          { data: 'sku', name: 'sku' },
          { data: 'price', name: 'price' },
          { data: 'quantity', name: 'quantity' },
          { data: 'status', name: 'status' },
          { data: 'created_at', name: 'created_at' },
          { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        order : [[ 0, "desc" ]]
      })
    })
  </script>
@endsection
