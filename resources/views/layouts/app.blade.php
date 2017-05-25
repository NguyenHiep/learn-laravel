<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!--meta-->
		<meta  charset="utf-8" />
		<title>EAST-WEST SEEDS</title>
		<meta name="description" content="wim" />
		<meta name="keywords" content="" />
		<meta name="author" content="wim" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		 <!-- CSRF Token -->
    	 <meta name="csrf-token" content="{{ csrf_token() }}">
		
		<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<!-- jQuery javascript -->
		<script type="text/javascript" src="/assets/js/jquery-1.11.3.min.js"></script>
		
		<!-- Google font -->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
		
		<!-- Bootstrap v3.3.1 stylesheet -->
		<link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap/css/bootstrap.min.css" />	
			
		<!-- Font Awesome 4.3.0 stylesheet -->
		<link rel="stylesheet" type="text/css" href="/assets/plugins/awesome/css/font-awesome.min.css" />	
		
		<!-- slick stylesheet -->
		<link rel="stylesheet" type="text/css" href="/assets/plugins/slick/slick/slick.css" />
		<link rel="stylesheet" type="text/css" href="/assets/plugins/slick/slick/slick-theme.css" />
				
		<!-- Main stylesheet-->
		<link rel="stylesheet" type="text/css" href="/assets/css/theme.css" />
		
		<!-- Reponsive stylesheet-->
		<link rel="stylesheet" type="text/css" href="/assets/css/reponsive.css" />
		 <!-- Scripts -->
	    <script>
	        window.Laravel = <?php echo json_encode([
	            'csrfToken' => csrf_token(),
	        ]); ?>
	    </script>
	</head>
	<body>
		<div class="ew-site container-fluid">
			<header class="ew-header">
				<div class="container">
					<div class="header-top clearfix ">
						<div class="logo col-md-6 clearfix">
							<a href="index.html"><img src="/images/logo.png" alt="logo"/></a>
							<p class="ew-slogan">Better Seeds for Better Yield</p>
						</div>
						<div class="menu-header col-md-6">			
							<div class=" form-language ">
								Language: 
								<select class="chevron-down-icon">							
									<option>Việt Nam</option>
									<option>English</option>							
								</select>
							</div>
							<ul class="menu  ">
								<li class="item"><a href="#">EWS Group</a></li>
								<li class="item"><a href="#">About EWS Group</a></li>
								<li class="item"><a href="#"> Contact EWS Group</a></li>							
								<li class="item"><a href="#"> Sitemap</a></li>
							</ul>
							<form class=" navbar-right formsearch">
								<div class="form-group">						
									<input type="text" class="form-control" placeholder="Tìm kiếm...">
								</div>						
							</form>							
						</div>
					</div><!-- End header-top-->
					<div class="header-bottom ">
						<div class="col-md-3">
							<div class="menu-left clearfix">	
								<div class="EWS-logo">		
									<a href="#"><img src="/images/vn.png"/></a>
									<span>EW Vietnam</span>
								</div>
								<div class="paint "></div>								
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">		
									<ul class="menu-main ">
										<li class="dropdown"><a href="#">TRANG CHỦ </a></li>																	
										<li class="dropdown">
											<a href="cate.html" >SẢN PHẨM</a>
											<ul>
												<li><a href="">SẢN PHẨM</a></li>
												<li><a href="">SẢN PHẨM</a></li>
												<li><a href="">SẢN PHẨM</a></li>
											</ul>
										</li>
										<li class="dropdown" ><a href="#">THÔNG TIN</a></li>
										<li class="dropdown"><a href="#">HOẠT ĐỘNG</a></li>
										<li class="dropdown"><a href="#">LIÊN HỆ</a>
										
										</li>
										<li class="dropdown"><a href="#">HỎI ĐÁP</a></li>
									</ul>
								</div>								
								<div class="icon-share clearfix">
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
									<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
									<a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a>
									<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
								</div>					
							</div>
						</div>	
						<div class="col-md-9">
							<div class="slideshow">						
								<img src="/images/Demo.png" class="img-responsive"/>
								<img src="/images/Demo.png" class="img-responsive"/>
								<img src="/images/Demo.png" class="img-responsive"/>
								<img src="/images/Demo.png" class="img-responsive"/>
							</div>				
						</div>
					</div><!-- End header-bottom-->
				</div><!-- End container-->
			</header><!-- End Header-->
			 @yield('content')
		<footer >
			<div class="container ">
				<div class=" ew-footer">
					<div class="col-md-3 ew-about item-footer">
						<h4 class="title-footer">East-west seed vietnam</h4>
						<p>Là công ty hạt giống rau tích hợp đầu tiên ở Việt Nam trong đó sản xuất hạt giống rau thông qua nhân giống cây trồng. </p>
						<h4 class="title-email " >Nhận tin mới từ East-west</h4>				
						<form class=" navbar-left formsearch  ">
							<div class="form-group">						
								<input type="text" class="form-control form-email" placeholder="Địa Chỉ Email">
							</div>				
						</form>		
						<p class="clearfix text-email">Theo dõi tin mới nhất của chúng tôi.</p>						
					</div><!-- End ew-about-->
					<div class="col-md-3 blog-new item-footer">
						<h4 class="title-footer">Tin mới</h4>
						<div class="media">
							<div class="media-left">
								<a href="#">
								<img class="media-object " src="/images/pr10.png"  alt=""/>
								</a>
							</div>
							<div class="media-body">
								<p>Nông sản tại Việt Nam được xuất khẩu...</p>
								<span class="cl-green">04/11/2015</span>
							</div>
						</div>
						<div class="media">
							<div class="media-left">
								<a href="#">
								<img class="media-object" src="/images/pr11.png"  alt=""/>
								</a>
							</div>
							<div class="media-body">
								<p>Nông sản tại Việt Nam được xuất khẩu...</p>
								<span class="cl-green">04/11/2015</span>
							</div>
						</div>
						<div class="media">
							<div class="media-left">
								<a href="#">
								<img class=" media-object " src="/images/pr12.png" alt=""/>
								</a>
							</div>
							<div class="media-body">
								<p>Nông sản tại Việt Nam được xuất khẩu...</p>
								<span class="cl-green">04/11/2015</span>
							</div>
						</div>				
					</div><!-- End blog-new-->
					<div class="col-md-3 item-footer ew-gallery">
						<h4 class="title-footer">Thư viện hình ảnh</h4>
						<div class="row">
							<div class="pic-product col-xs-4">
								<a href="#" class="thumbnail">
									<img src="/images/cachua.jpg" class="img-responsive" alt=""/>
								</a>
								<a href="#" class="thumbnail">
									<img src="/images/Super 241.jpg" class="img-responsive" alt=""/>
								</a>
								<a href="#" class="thumbnail">
									<img src="/images/Super 241.jpg" class="img-responsive" alt=""/>
								</a>
							</div>	
							<div class="pic-product col-xs-4">
								<a href="#" class="thumbnail">
									<img src="/images/Super 241.jpg" class="img-responsive" alt=""/>
								</a>
								<a href="#" class="thumbnail">
									<img src="/images/Super 241.jpg" class="img-responsive" alt=""/>
								</a>
								
								<a href="#" class="thumbnail">
									<img src="/images/cachua.jpg" class="img-responsive" alt=""/>
								</a>
							</div>	
							<div class="pic-product col-xs-4">
								<a href="#" class="thumbnail">
									<img src="/images/cachua.jpg" class="img-responsive" alt=""/>
								</a>
								<a href="#" class="thumbnail">
									<img src="/images/Super 241.jpg" class="img-responsive" alt=""/>
								</a>
								<a href="#" class="thumbnail">
									<img src="/images/cachua.jpg" class="img-responsive" alt=""/>
								</a>
							</div>															
						</div>
					</div><!-- End ew-gallery-->
					<div class="col-md-3 item-footer ew-contact">
						<h4 class="title-footer">Liên hệ</h4>
						<h5 class="cl-green">ĐỊA CHỈ</h5>
						<p >No.1 VSIP II-A Street 14, Vietnam 
						Singapore Industrial Park II-A,  Tan Uyen
						District, Binh Duong Province, Vietnam  </p>
						<div class="paint"></div>	
						<h5 class="cl-green">ĐIỆN THOẠI</h5>
						<p>Tel : 0650. 2220233 </p>					
						<p >Fax : 0650. 2220234</p>	
						<div class="paint"></div>
						<h5 class="cl-green">EMAIL</h5>
						<p>inter@eastwestseed.com</p>											
					</div>	<!-- End ew-contact-->			
				</div>	<!-- End ew-footer-->	
			</div>
			<div class="footer-bottom ">			
				<div class="container">		
					<p class="col-md-6">Bản quyền thuộc về East-West Seed Vietnam © 2015. Thiết kế bởi TrangWebDep.com</p>				
					<ul class="menu pull-right">
						<li class="item"><a href="#">EWS Group</a></li>
						<li class="item"><a href="#">About EWS Group</a></li>
						<li class="item"><a href="#"> Contact EWS Group</a></li>							
						<li class="item"><a href="#"> Sitemap</a></li>
					</ul>
				</div>
				<div class="footer-bg"></div>
			</div>
		</footer>
	</div>	<!--END ew-site-->	
		<!-- Bootstrap v3.3.1 Javascript -->
		<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		
		<!-- Slick Javascript -->
		<script type="text/javascript" src="/assets/plugins/slick/slick/slick.min.js"></script>
		
		<!-- Main Javascript  -->
		<script type="text/javascript" src="/assets/js/script.js"></script>		
	</body>
</html>