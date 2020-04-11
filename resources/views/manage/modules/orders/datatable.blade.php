@extends('manage.master')
@section('title', 'Quản lý sản phẩm')

@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{route('manage.orders.index')}}">Danh sách đơn hàng</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Tất đơn hàng</span>
          </li>
        </ul>
      </div>
      
      <h1 class="page-title">Danh sách đơn hàng</h1>
      
      <div class="row">
        <div class="col-md-12">
          
          <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
              <div class="caption">
                <i class="icon-settings font-green"></i>
                <span class="caption-subject font-green sbold uppercase"> Danh sách đơn hàng </span>
              </div>
              <div class="actions">
                <div class="btn-group btn-group-devided" data-toggle="buttons">
                  <label class="btn btn-transparent green btn-outline btn-outline btn-circle btn-sm active">
                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                  <label class="btn btn-transparent blue btn-outline btn-circle btn-sm">
                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                </div>
                <div class="btn-group">
                  <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                    <i class="fa fa-share"></i>
                    <span class="hidden-xs"> Tools </span>
                    <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                    <li>
                      <a href="javascript:;"> Export to Excel </a>
                    </li>
                    <li>
                      <a href="javascript:;"> Export to CSV </a>
                    </li>
                    <li>
                      <a href="javascript:;"> Export to XML </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="javascript:;"> Print Invoices </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-container">
                <div class="table-actions-wrapper">
                  <span> </span>
                  <select class="table-group-action-input form-control input-inline input-small input-sm">
                    <option value="">Select...</option>
                    <option value="Cancel">Cancel</option>
                    <option value="Cancel">Hold</option>
                    <option value="Cancel">On Hold</option>
                    <option value="Close">Close</option>
                  </select>
                  <button class="btn btn-sm btn-default table-group-action-submit">
                    <i class="fa fa-check"></i> Submit
                  </button>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_orders">
                  <thead>
                  <tr role="row" class="heading">
                    <th width="2%">
                      <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                        <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes"/>
                        <span></span>
                      </label>
                    </th>
                    <th width="5%"> Order&nbsp;#</th>
                    <th width="15%"> Purchased&nbsp;On</th>
                    <th width="15%"> Customer</th>
                    <th width="10%"> Ship&nbsp;To</th>
                    <th width="10%"> Base&nbsp;Price</th>
                    <th width="10%"> Purchased&nbsp;Price</th>
                    <th width="10%"> Status</th>
                    <th width="10%"> Actions</th>
                  </tr>
                  <tr role="row" class="filter">
                    <td></td>
                    <td>
                      <input type="text" class="form-control form-filter input-sm" name="order_id"></td>
                    <td>
                      <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                        <input type="text" class="form-control form-filter input-sm" readonly name="order_date_from" placeholder="From">
                        <span class="input-group-btn">
                          <button class="btn btn-sm default" type="button">
                            <i class="fa fa-calendar"></i>
                          </button>
                        </span>
                      </div>
                      <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                        <input type="text" class="form-control form-filter input-sm" readonly name="order_date_to" placeholder="To">
                        <span class="input-group-btn">
                          <button class="btn btn-sm default" type="button">
                            <i class="fa fa-calendar"></i>
                          </button>
                        </span>
                      </div>
                    </td>
                    <td>
                      <input type="text" class="form-control form-filter input-sm" name="order_customer_name"></td>
                    <td>
                      <input type="text" class="form-control form-filter input-sm" name="order_ship_to"></td>
                    <td>
                      <div class="margin-bottom-5">
                        <input type="text" class="form-control form-filter input-sm" name="order_base_price_from"
                               placeholder="From"/></div>
                      <input type="text" class="form-control form-filter input-sm" name="order_base_price_to"
                             placeholder="To"/></td>
                    <td>
                      <div class="margin-bottom-5">
                        <input type="text" class="form-control form-filter input-sm margin-bottom-5 clearfix"
                               name="order_purchase_price_from" placeholder="From"/></div>
                      <input type="text" class="form-control form-filter input-sm" name="order_purchase_price_to"
                             placeholder="To"/></td>
                    <td>
                      <select name="order_status" class="form-control form-filter input-sm">
                        <option value="">Select...</option>
                        <option value="pending">Pending</option>
                        <option value="closed">Closed</option>
                        <option value="hold">On Hold</option>
                        <option value="fraud">Fraud</option>
                      </select>
                    </td>
                    <td>
                      <div class="margin-bottom-5">
                        <button class="btn btn-sm btn-success filter-submit margin-bottom">
                          <i class="fa fa-search"></i> Search
                        </button>
                      </div>
                      <button class="btn btn-sm btn-default filter-cancel">
                        <i class="fa fa-times"></i> Reset
                      </button>
                    </td>
                  </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- End: life time stats -->
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