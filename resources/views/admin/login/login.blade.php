<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="minhhiep.info" />
    <link rel="stylesheet" href="{{asset('/admin/templates/css/style.css')}}" />
	<title>Admin Area :: Login</title>
</head>
<body>
<div id="layout">
    <div id="top">
        Admin Area :: Login
    </div>
    <div id="main">
    	@include('admin.blocks.errors')        
		<form action="" method="POST" style="width: 650px; margin: 30px auto;" autocomplete="off">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                <legend>Thông Tin Đăng Nhập</legend>                
				<table>
                    <tr>
                        <td class="login_img"></td>
                        <td>
                            <span class="form_label">Username:</span>
                            <span class="form_item">
                                <input type="text" name="txtUser" class="textbox" />
                            </span><br />
                            <span class="form_label">Password:</span>
                            <span class="form_item">
                                <input type="password" name="txtPass" class="textbox" />
                            </span><br />
                            <span class="form_label"></span>
                            <span class="form_item">
                                <input type="submit" name="btnLogin" value="Đăng nhập" class="button" />
                            </span>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
    <div id="bottom">
        Copyright © 2016 by minhhiep.info
    </div>
</div>

</body>
</html>