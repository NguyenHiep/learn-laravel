<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="minhhiep.info" />
    <link rel="stylesheet" href="{{asset('/admin/templates/css/style.css')}}" />
	<title>Admin Area :: @yield('title')</title>
</head>

<body>
<div id="layout">
    <div id="top">
        Admin Area :: @yield('title')
    </div>
	<div id="menu">
		<table width="100%">
			<tr>
				<td>
					<a href="">Trang chính</a> | <a href="">Quản lý user</a> | <a href="">Quản lý danh mục</a> | <a href="">Quản lý tin</a>
				</td>
				<td align="right">
					Xin chào {{Auth::user()->username}} | <a href="{{url('logout')}}">Logout</a>
				</td>
			</tr>
		</table>
	</div>
    <div id="main">
		 @yield('content')
	</div>
    <div id="bottom">
        Copyright © 2016 by minhhiep.info
    </div>
</div>
</body>
</html>