@extends('manage.master')

@section('title', 'Quản lý nội dung Administrantor')
@section('content')
		<div class="page-content-wrapper">
			<!-- BEGIN CONTENT BODY -->
			<div class="page-content">
				<!-- BEGIN PAGE HEADER-->

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
													<img class="item-pic rounded" src="{{ asset('manages/assets/pages/media/users/avatar4.jpg') }}">
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
													<img class="item-pic rounded" src="{{ asset('manages/assets/pages/media/users/avatar3.jpg') }}">
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
													<img class="item-pic rounded" src="{{ asset('manages/assets/pages/media/users/avatar6.jpg') }}">
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
													<img class="item-pic rounded" src="{{ asset('manages/assets/pages/media/users/avatar7.jpg') }}">
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
													<img class="item-pic rounded" src="{{ asset('manages/assets/pages/media/users/avatar9.jpg') }}">
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
													<img class="item-pic rounded" src="{{ asset('manages/assets/pages/media/users/avatar8.jpg') }}">
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
													<img class="item-pic rounded" src="{{ asset('manages/assets/pages/media/users/avatar2.jpg') }}">
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

			</div>
			<!-- END CONTENT BODY -->
		</div>
@endsection

@section('scripts')
	@parent
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('/manages/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}"
				type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/counterup/jquery.waypoints.min.js')}}"
				type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/counterup/jquery.counterup.min.js')}}"
				type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/flot/jquery.flot.resize.min.js')}}"
				type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/flot/jquery.flot.categories.min.js')}}"
				type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}"
				type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('/manages/assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
@stop