@extends('manage.master')
@section('title', 'Quản lý sản phẩm')

@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('orders.index')}}">Danh sách đơn hàng</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Tất đơn hàng</span>
          </li>
        </ul>
      </div>
      
      <div class="row margin-top-30">
        <div class="col-md-12">
          <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Danh sách đơn hàng</span>
              </div>
              <div class="tools"></div>
            {{--  <div class="actions">
                <a class="btn green" href="{{ route('orders.create') }}"> {{__('common.buttons.create')}}
                  <i class="fa fa-plus"></i>
                </a>
              </div>--}}
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
                    <th> Ngày đặt hàng</th>
                    <th> Họ và tên</th>
                    <th> Điện thoại</th>
                    <th> Email</th>
                    <th> Tiền thanh toán</th>
                    <th class="text-center"> Trạng thái</th>
                    <th class="text-center"> Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
          
                  @if ($records->count())
                    @foreach ($records as $record)
                      <tr>
                        <td> <!--<td class="checkbox-list"> -->
                          <input id="action_ids{{$record->id}}" name="action_ids[]" value="{{$record->id}}" type="checkbox">
                        </td>
                        <td> {{$record->id}} </td>
                        <td> {{format_date($record->ordered_at) }} </td>
                        <td> {{$record->deliveries->buyer_name}} </td>
                        <td> {{$record->deliveries->buyer_phone_1}} </td>
                        <td> {{$record->deliveries->buyer_email}} </td>
                        <td> {{format_price($record->total)}}</td>
                        <td class="text-center">
                          <span class="label label-sm  @if ($record->status === config('define.STATUS_ENABLE')) label-success @else  label-danger @endif margin-right-10"> {{__('selector.orders.status.'.$record->status)}} </span>
                        </td>
                        <td class="text-right">
                          <div class="btn-group btn-group-solid">
                            <a title="{{__('common.buttons.show')}}" href="{{ route('orders.show',$record->id) }}" class="btn  btn-warning js-action-list-rowlink-val">
                              <i class="fa fa-eye"></i>
                            </a>
                            <form action="{{ route('orders.destroy',$record->id) }}" method="POST" style="display: inline-block">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button title="{{__('common.buttons.delete')}}" class="btn btn-delete js-action-delete" type="submit"><i class="fa fa-trash-o"></i></button>
                            </form>
                          </div>
                        </td>

                      </tr>
                    @endforeach
                  @else
                    <tr><td colspan="9" class="text-center">{{ __('common.data_empty') }}</td></tr>
                  @endif
          
                  </tbody>
                  <tfoot>
                  <tr>
                    @if (!empty($records))
                      <td colspan="9"> {{ $records->links() }}</td>
                    @endif
                  </tr>
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
  <link href="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet"
        type="text/css"/>
  <link href="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}"
        rel="stylesheet" type="text/css"/>
  <link href="{{ asset('/manages/ssets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}"
        rel="stylesheet" type="text/css"/>
@stop

@section('scripts')
  @parent
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script src="{{ asset('/manages/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/datatables.min.js')}}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}"
          type="text/javascript"></script>
  <script src="{{ asset('/manages/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"
          type="text/javascript"></script>
  {{--<script src="{{ asset('/manages/assets/pages/scripts/ecommerce-orders.js')}}" type="text/javascript"></script>--}}
  <script>
		var EcommerceOrders = function () {

			var initPickers = function () {
				//init date pickers
				$('.date-picker').datepicker({
					rtl: App.isRTL(),
					autoclose: true
				});
			}

			var handleOrders = function () {

				var grid = new Datatable();

				grid.init({
					src: $("#datatable_orders"),
					onSuccess: function (grid) {
						// execute some code after table records loaded
					},
					onError: function (grid) {
						// execute some code on network or other general error
					},
					loadingMessage: 'Loading...',
					dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options
						// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
						// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js).
						// So when dropdowns used the scrollable div should be removed.
						//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

						"lengthMenu": [
							[10, 20, 50, 100, 150, -1],
							[10, 20, 50, 100, 150, "All"] // change per page values here
						],
						"pageLength": 10, // default record count per page
						"ajax": {
							"url": "../demo/ecommerce_orders.php", // ajax source
						},
						"order": [
							[1, "asc"]
						] // set first column as a default sort by asc
					}
				});

				// handle group actionsubmit button click
				grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
					e.preventDefault();
					var action = $(".table-group-action-input", grid.getTableWrapper());
					if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
						grid.setAjaxParam("customActionType", "group_action");
						grid.setAjaxParam("customActionName", action.val());
						grid.setAjaxParam("id", grid.getSelectedRows());
						grid.getDataTable().ajax.reload();
						grid.clearAjaxParams();
					} else if (action.val() == "") {
						alert({
							type: 'danger',
							icon: 'warning',
							message: 'Please select an action',
							container: grid.getTableWrapper(),
							place: 'prepend'
						});
					} else if (grid.getSelectedRowsCount() === 0) {
						alert({
							type: 'danger',
							icon: 'warning',
							message: 'No record selected',
							container: grid.getTableWrapper(),
							place: 'prepend'
						});
					}
				});

			}

			return {

				//main function to initiate the module
				init: function () {

					initPickers();
					handleOrders();
				}

			};

		}();

		jQuery(document).ready(function() {
			EcommerceOrders.init();
		});
  </script>
@stop