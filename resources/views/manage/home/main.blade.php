@extends('manage.master')

@section('title', 'Trang chính')
@section('content')
		<div class="page-content-wrapper">
			<!-- BEGIN CONTENT BODY -->
			<div class="page-content">
				<!-- BEGIN PAGE HEADER-->
				<!-- BEGIN THEME PANEL -->
				<div class="theme-panel hidden-xs hidden-sm">
					<div class="toggler"> </div>
					<div class="toggler-close"> </div>
					<div class="theme-options">
						<div class="theme-option theme-colors clearfix">
							<span> THEME COLOR </span>
							<ul>
								<li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
								<li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
								<li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
								<li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
								<li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
								<li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
							</ul>
						</div>
						<div class="theme-option">
							<span> Theme Style </span>
							<select class="layout-style-option form-control input-sm">
								<option value="square" selected="selected">Square corners</option>
								<option value="rounded">Rounded corners</option>
							</select>
						</div>
						<div class="theme-option">
							<span> Layout </span>
							<select class="layout-option form-control input-sm">
								<option value="fluid" selected="selected">Fluid</option>
								<option value="boxed">Boxed</option>
							</select>
						</div>
						<div class="theme-option">
							<span> Header </span>
							<select class="page-header-option form-control input-sm">
								<option value="fixed" selected="selected">Fixed</option>
								<option value="default">Default</option>
							</select>
						</div>
						<div class="theme-option">
							<span> Top Menu Dropdown</span>
							<select class="page-header-top-dropdown-style-option form-control input-sm">
								<option value="light" selected="selected">Light</option>
								<option value="dark">Dark</option>
							</select>
						</div>
						<div class="theme-option">
							<span> Sidebar Mode</span>
							<select class="sidebar-option form-control input-sm">
								<option value="fixed">Fixed</option>
								<option value="default" selected="selected">Default</option>
							</select>
						</div>
						<div class="theme-option">
							<span> Sidebar Menu </span>
							<select class="sidebar-menu-option form-control input-sm">
								<option value="accordion" selected="selected">Accordion</option>
								<option value="hover">Hover</option>
							</select>
						</div>
						<div class="theme-option">
							<span> Sidebar Style </span>
							<select class="sidebar-style-option form-control input-sm">
								<option value="default" selected="selected">Default</option>
								<option value="light">Light</option>
							</select>
						</div>
						<div class="theme-option">
							<span> Sidebar Position </span>
							<select class="sidebar-pos-option form-control input-sm">
								<option value="left" selected="selected">Left</option>
								<option value="right">Right</option>
							</select>
						</div>
						<div class="theme-option">
							<span> Footer </span>
							<select class="page-footer-option form-control input-sm">
								<option value="fixed">Fixed</option>
								<option value="default" selected="selected">Default</option>
							</select>
						</div>
					</div>
				</div>
				<!-- END THEME PANEL -->
				<!-- BEGIN PAGE BAR -->
				<div class="page-bar">
					<ul class="page-breadcrumb">
						<li>
							<a href="index.html">Home</a>
							<i class="fa fa-circle"></i>
						</li>
						<li>
							<span>Dashboard</span>
						</li>
					</ul>
					<div class="page-toolbar">
						<div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
							<i class="icon-calendar"></i>&nbsp;
							<span class="thin uppercase hidden-xs"></span>&nbsp;
							<i class="fa fa-angle-down"></i>
						</div>
					</div>
				</div>
				<!-- END PAGE BAR -->
				<!-- BEGIN PAGE TITLE-->
				<h3 class="page-title"> Dashboard 2
					<small>dashboard & statistics</small>
				</h3>
				<!-- END PAGE TITLE-->
				<!-- END PAGE HEADER-->
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat2 ">
							<div class="display">
								<div class="number">
									<h3 class="font-green-sharp">
										<span data-counter="counterup" data-value="7800">0</span>
										<small class="font-green-sharp">$</small>
									</h3>
									<small>TOTAL PROFIT</small>
								</div>
								<div class="icon">
									<i class="icon-pie-chart"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
                                        <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                            <span class="sr-only">76% progress</span>
                                        </span>
								</div>
								<div class="status">
									<div class="status-title"> progress </div>
									<div class="status-number"> 76% </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat2 ">
							<div class="display">
								<div class="number">
									<h3 class="font-red-haze">
										<span data-counter="counterup" data-value="1349">0</span>
									</h3>
									<small>NEW FEEDBACKS</small>
								</div>
								<div class="icon">
									<i class="icon-like"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
                                        <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                            <span class="sr-only">85% change</span>
                                        </span>
								</div>
								<div class="status">
									<div class="status-title"> change </div>
									<div class="status-number"> 85% </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat2 ">
							<div class="display">
								<div class="number">
									<h3 class="font-blue-sharp">
										<span data-counter="counterup" data-value="567"></span>
									</h3>
									<small>NEW ORDERS</small>
								</div>
								<div class="icon">
									<i class="icon-basket"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
                                        <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                            <span class="sr-only">45% grow</span>
                                        </span>
								</div>
								<div class="status">
									<div class="status-title"> grow </div>
									<div class="status-number"> 45% </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat2 ">
							<div class="display">
								<div class="number">
									<h3 class="font-purple-soft">
										<span data-counter="counterup" data-value="276"></span>
									</h3>
									<small>NEW USERS</small>
								</div>
								<div class="icon">
									<i class="icon-user"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
                                        <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                            <span class="sr-only">56% change</span>
                                        </span>
								</div>
								<div class="status">
									<div class="status-title"> change </div>
									<div class="status-number"> 57% </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption font-green">
									<span class="caption-subject bold uppercase">Revenue</span>
									<span class="caption-helper">distance stats...</span>
								</div>
								<div class="actions">
									<a class="btn btn-circle btn-icon-only btn-default" href="#">
										<i class="icon-cloud-upload"></i>
									</a>
									<a class="btn btn-circle btn-icon-only btn-default" href="#">
										<i class="icon-wrench"></i>
									</a>
									<a class="btn btn-circle btn-icon-only btn-default" href="#">
										<i class="icon-trash"></i>
									</a>
									<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
								</div>
							</div>
							<div class="portlet-body">
								<div id="dashboard_amchart_1" class="CSSAnimationChart"></div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption font-red">
									<span class="caption-subject bold uppercase">Finance</span>
									<span class="caption-helper">distance stats...</span>
								</div>
								<div class="actions">
									<a href="#" class="btn btn-circle green btn-outline btn-sm">
										<i class="fa fa-pencil"></i> Export </a>
									<a href="#" class="btn btn-circle green btn-outline btn-sm">
										<i class="fa fa-print"></i> Print </a>
								</div>
							</div>
							<div class="portlet-body">
								<div id="dashboard_amchart_3" class="CSSAnimationChart"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption caption-md">
									<i class="icon-bar-chart font-red"></i>
									<span class="caption-subject font-red bold uppercase">Member Activity</span>
									<span class="caption-helper">weekly stats...</span>
								</div>
								<div class="actions">
									<div class="btn-group btn-group-devided" data-toggle="buttons">
										<label class="btn btn-transparent green btn-outline btn-circle btn-sm active">
											<input type="radio" name="options" class="toggle" id="option1">Today</label>
										<label class="btn btn-transparent green btn-outline btn-circle btn-sm">
											<input type="radio" name="options" class="toggle" id="option2">Week</label>
										<label class="btn btn-transparent green btn-outline btn-circle btn-sm">
											<input type="radio" name="options" class="toggle" id="option2">Month</label>
									</div>
								</div>
							</div>
							<div class="portlet-body">
								<div class="row number-stats margin-bottom-30">
									<div class="col-md-6 col-sm-6 col-xs-6">
										<div class="stat-left">
											<div class="stat-chart">
												<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
												<div id="sparkline_bar"></div>
											</div>
											<div class="stat-number">
												<div class="title"> Total </div>
												<div class="number"> 2460 </div>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6">
										<div class="stat-right">
											<div class="stat-chart">
												<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
												<div id="sparkline_bar2"></div>
											</div>
											<div class="stat-number">
												<div class="title"> New </div>
												<div class="number"> 719 </div>
											</div>
										</div>
									</div>
								</div>
								<div class="table-scrollable table-scrollable-borderless">
									<table class="table table-hover table-light">
										<thead>
										<tr class="uppercase">
											<th colspan="2"> MEMBER </th>
											<th> Earnings </th>
											<th> CASES </th>
											<th> CLOSED </th>
											<th> RATE </th>
										</tr>
										</thead>
										<tr>
											<td class="fit">
												<img class="user-pic rounded" src="../assets/pages/media/users/avatar4.jpg"> </td>
											<td>
												<a href="javascript:;" class="primary-link">Brain</a>
											</td>
											<td> $345 </td>
											<td> 45 </td>
											<td> 124 </td>
											<td>
												<span class="bold theme-font">80%</span>
											</td>
										</tr>
										<tr>
											<td class="fit">
												<img class="user-pic rounded" src="../assets/pages/media/users/avatar5.jpg"> </td>
											<td>
												<a href="javascript:;" class="primary-link">Nick</a>
											</td>
											<td> $560 </td>
											<td> 12 </td>
											<td> 24 </td>
											<td>
												<span class="bold theme-font">67%</span>
											</td>
										</tr>
										<tr>
											<td class="fit">
												<img class="user-pic rounded" src="../assets/pages/media/users/avatar6.jpg"> </td>
											<td>
												<a href="javascript:;" class="primary-link">Tim</a>
											</td>
											<td> $1,345 </td>
											<td> 450 </td>
											<td> 46 </td>
											<td>
												<span class="bold theme-font">98%</span>
											</td>
										</tr>
										<tr>
											<td class="fit">
												<img class="user-pic rounded" src="../assets/pages/media/users/avatar7.jpg"> </td>
											<td>
												<a href="javascript:;" class="primary-link">Tom</a>
											</td>
											<td> $645 </td>
											<td> 50 </td>
											<td> 89 </td>
											<td>
												<span class="bold theme-font">58%</span>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption caption-md">
									<i class="icon-bar-chart font-green"></i>
									<span class="caption-subject font-green bold uppercase">Customer Support</span>
									<span class="caption-helper">45 pending</span>
								</div>
								<div class="inputs">
									<div class="portlet-input input-inline input-small ">
										<div class="input-icon right">
											<i class="icon-magnifier"></i>
											<input type="text" class="form-control form-control-solid input-circle" placeholder="search..."> </div>
									</div>
								</div>
							</div>
							<div class="portlet-body">
								<div class="scroller" style="height: 338px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
									<div class="general-item-list">
										<div class="item">
											<div class="item-head">
												<div class="item-details">
													<img class="item-pic rounded" src="../assets/pages/media/users/avatar4.jpg">
													<a href="" class="item-name primary-link">Nick Larson</a>
													<span class="item-label">3 hrs ago</span>
												</div>
												<span class="item-status">
                                                        <span class="badge badge-empty badge-success"></span> Open</span>
											</div>
											<div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
										</div>
										<div class="item">
											<div class="item-head">
												<div class="item-details">
													<img class="item-pic rounded" src="../assets/pages/media/users/avatar3.jpg">
													<a href="" class="item-name primary-link">Mark</a>
													<span class="item-label">5 hrs ago</span>
												</div>
												<span class="item-status">
                                                        <span class="badge badge-empty badge-warning"></span> Pending</span>
											</div>
											<div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat tincidunt ut laoreet. </div>
										</div>
										<div class="item">
											<div class="item-head">
												<div class="item-details">
													<img class="item-pic rounded" src="../assets/pages/media/users/avatar6.jpg">
													<a href="" class="item-name primary-link">Nick Larson</a>
													<span class="item-label">8 hrs ago</span>
												</div>
												<span class="item-status">
                                                        <span class="badge badge-empty badge-primary"></span> Closed</span>
											</div>
											<div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh. </div>
										</div>
										<div class="item">
											<div class="item-head">
												<div class="item-details">
													<img class="item-pic rounded" src="../assets/pages/media/users/avatar7.jpg">
													<a href="" class="item-name primary-link">Nick Larson</a>
													<span class="item-label">12 hrs ago</span>
												</div>
												<span class="item-status">
                                                        <span class="badge badge-empty badge-danger"></span> Pending</span>
											</div>
											<div class="item-body"> Consectetuer adipiscing elit Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
										</div>
										<div class="item">
											<div class="item-head">
												<div class="item-details">
													<img class="item-pic rounded" src="../assets/pages/media/users/avatar9.jpg">
													<a href="" class="item-name primary-link">Richard Stone</a>
													<span class="item-label">2 days ago</span>
												</div>
												<span class="item-status">
                                                        <span class="badge badge-empty badge-danger"></span> Open</span>
											</div>
											<div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, ut laoreet dolore magna aliquam erat volutpat. </div>
										</div>
										<div class="item">
											<div class="item-head">
												<div class="item-details">
													<img class="item-pic rounded" src="../assets/pages/media/users/avatar8.jpg">
													<a href="" class="item-name primary-link">Dan</a>
													<span class="item-label">3 days ago</span>
												</div>
												<span class="item-status">
                                                        <span class="badge badge-empty badge-warning"></span> Pending</span>
											</div>
											<div class="item-body"> Lorem ipsum dolor sit amet, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
										</div>
										<div class="item">
											<div class="item-head">
												<div class="item-details">
													<img class="item-pic rounded" src="../assets/pages/media/users/avatar2.jpg">
													<a href="" class="item-name primary-link">Larry</a>
													<span class="item-label">4 hrs ago</span>
												</div>
												<span class="item-status">
                                                        <span class="badge badge-empty badge-success"></span> Open</span>
											</div>
											<div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-cursor font-purple"></i>
									<span class="caption-subject font-purple bold uppercase">General Stats</span>
								</div>
								<div class="actions">
									<a href="javascript:;" class="btn btn-sm btn-circle red easy-pie-chart-reload">
										<i class="fa fa-repeat"></i> Reload </a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="row">
									<div class="col-md-4">
										<div class="easy-pie-chart">
											<div class="number transactions" data-percent="55">
												<span>+55</span>% </div>
											<a class="title" href="javascript:;"> Transactions
												<i class="icon-arrow-right"></i>
											</a>
										</div>
									</div>
									<div class="margin-bottom-10 visible-sm"> </div>
									<div class="col-md-4">
										<div class="easy-pie-chart">
											<div class="number visits" data-percent="85">
												<span>+85</span>% </div>
											<a class="title" href="javascript:;"> New Visits
												<i class="icon-arrow-right"></i>
											</a>
										</div>
									</div>
									<div class="margin-bottom-10 visible-sm"> </div>
									<div class="col-md-4">
										<div class="easy-pie-chart">
											<div class="number bounce" data-percent="46">
												<span>-46</span>% </div>
											<a class="title" href="javascript:;"> Bounce
												<i class="icon-arrow-right"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-equalizer font-yellow"></i>
									<span class="caption-subject font-yellow bold uppercase">Server Stats</span>
									<span class="caption-helper">monthly stats...</span>
								</div>
								<div class="tools">
									<a href="" class="collapse"> </a>
									<a href="#portlet-config" data-toggle="modal" class="config"> </a>
									<a href="" class="reload"> </a>
									<a href="" class="remove"> </a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="row">
									<div class="col-md-4">
										<div class="sparkline-chart">
											<div class="number" id="sparkline_bar5"></div>
											<a class="title" href="javascript:;"> Network
												<i class="icon-arrow-right"></i>
											</a>
										</div>
									</div>
									<div class="margin-bottom-10 visible-sm"> </div>
									<div class="col-md-4">
										<div class="sparkline-chart">
											<div class="number" id="sparkline_bar6"></div>
											<a class="title" href="javascript:;"> CPU Load
												<i class="icon-arrow-right"></i>
											</a>
										</div>
									</div>
									<div class="margin-bottom-10 visible-sm"> </div>
									<div class="col-md-4">
										<div class="sparkline-chart">
											<div class="number" id="sparkline_line"></div>
											<a class="title" href="javascript:;"> Load Rate
												<i class="icon-arrow-right"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<!-- BEGIN REGIONAL STATS PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-share font-red-sunglo"></i>
									<span class="caption-subject font-red-sunglo bold uppercase">Regional Stats</span>
								</div>
								<div class="actions">
									<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
										<i class="icon-cloud-upload"></i>
									</a>
									<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
										<i class="icon-wrench"></i>
									</a>
									<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
									<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
										<i class="icon-trash"></i>
									</a>
								</div>
							</div>
							<div class="portlet-body">
								<div id="region_statistics_loading">
									<img src="../assets/global/img/loading.gif" alt="loading" /> </div>
								<div id="region_statistics_content" class="display-none">
									<div class="btn-toolbar margin-bottom-10">
										<div class="btn-group btn-group-circle" data-toggle="buttons">
											<a href="" class="btn grey-salsa btn-sm active"> Users </a>
											<a href="" class="btn grey-salsa btn-sm"> Orders </a>
										</div>
										<div class="btn-group pull-right">
											<a href="" class="btn btn-circle grey-salsa btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Select Region
												<span class="fa fa-angle-down"> </span>
											</a>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;" id="regional_stat_world"> World </a>
												</li>
												<li>
													<a href="javascript:;" id="regional_stat_usa"> USA </a>
												</li>
												<li>
													<a href="javascript:;" id="regional_stat_europe"> Europe </a>
												</li>
												<li>
													<a href="javascript:;" id="regional_stat_russia"> Russia </a>
												</li>
												<li>
													<a href="javascript:;" id="regional_stat_germany"> Germany </a>
												</li>
											</ul>
										</div>
									</div>
									<div id="vmap_world" class="vmaps display-none"> </div>
									<div id="vmap_usa" class="vmaps display-none"> </div>
									<div id="vmap_europe" class="vmaps display-none"> </div>
									<div id="vmap_russia" class="vmaps display-none"> </div>
									<div id="vmap_germany" class="vmaps display-none"> </div>
								</div>
							</div>
						</div>
						<!-- END REGIONAL STATS PORTLET-->
					</div>
					<div class="col-md-6 col-sm-6">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title tabbable-line">
								<div class="caption">
									<i class="icon-globe font-green-sharp"></i>
									<span class="caption-subject font-green-sharp bold uppercase">Feeds</span>
								</div>
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#tab_1_1" class="active" data-toggle="tab"> System </a>
									</li>
									<li>
										<a href="#tab_1_2" data-toggle="tab"> Activities </a>
									</li>
								</ul>
							</div>
							<div class="portlet-body">
								<!--BEGIN TABS-->
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1_1">
										<div class="scroller" style="height: 339px;" data-always-visible="1" data-rail-visible="0">
											<ul class="feeds">
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-success">
																	<i class="fa fa-bell-o"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> You have 4 pending tasks.
																	<span class="label label-sm label-info"> Take action
                                                                            <i class="fa fa-share"></i>
                                                                        </span>
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> Just now </div>
													</div>
												</li>
												<li>
													<a href="javascript:;">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc"> New version v1.4 just lunched! </div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date"> 20 mins </div>
														</div>
													</a>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-danger">
																	<i class="fa fa-bolt"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> Database server #12 overloaded. Please fix the issue. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 24 mins </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 30 mins </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-success">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 40 mins </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-warning">
																	<i class="fa fa-plus"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New user registered. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 1.5 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-success">
																	<i class="fa fa-bell-o"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> Web server hardware needs to be upgraded.
																	<span class="label label-sm label-default "> Overdue </span>
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 2 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 3 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-warning">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 5 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 18 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 21 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 22 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 21 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 22 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 21 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 22 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 21 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 22 hours </div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="tab-pane" id="tab_1_2">
										<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
											<ul class="feeds">
												<li>
													<a href="javascript:;">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc"> New user registered </div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date"> Just now </div>
														</div>
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc"> New order received </div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date"> 10 mins </div>
														</div>
													</a>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-danger">
																	<i class="fa fa-bolt"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> Order #24DOP4 has been rejected.
																	<span class="label label-sm label-danger "> Take action
                                                                            <i class="fa fa-share"></i>
                                                                        </span>
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 24 mins </div>
													</div>
												</li>
												<li>
													<a href="javascript:;">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc"> New user registered </div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date"> Just now </div>
														</div>
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc"> New user registered </div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date"> Just now </div>
														</div>
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc"> New user registered </div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date"> Just now </div>
														</div>
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc"> New user registered </div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date"> Just now </div>
														</div>
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc"> New user registered </div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date"> Just now </div>
														</div>
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc"> New user registered </div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date"> Just now </div>
														</div>
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc"> New user registered </div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date"> Just now </div>
														</div>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!--END TABS-->
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
				</div>
			</div>
			<!-- END CONTENT BODY -->
		</div>
@endsection
