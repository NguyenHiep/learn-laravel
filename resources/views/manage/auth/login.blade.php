<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Đăng nhập quản trị hệ thống</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Administrantor area" name="description" />
    <meta content="nguyenhiep" name="author" />
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="/assets/manage/css/login.css" rel="stylesheet" type="text/css" />
</head>
<!-- END HEAD -->

<body class=" login">
<div class="menu-toggler sidebar-toggler"></div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="{{route('home')}}"><img src="{{asset('manages/assets/pages/img/logo-big.png')}}" alt="" /> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form action="{{ route('manage.login') }}" method="POST" class="login-form">
        @csrf

        <h3 class="form-title font-green">Đăng nhập</h3>
        @php $key = 'email'; @endphp
        <div class="form-group @if ($errors->has($key)) has-error  @endif">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Tài khoản</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Vui lòng nhập tài khoản" name="email" value="{{ old('email') }}" required/>
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
        </div>

        @php $key = 'password'; @endphp
        <div class="form-group @if ($errors->has($key)) has-error  @endif">
            <label class="control-label visible-ie8 visible-ie9">Mật khẩu</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Vui lòng nhập mật khẩu" name="password" required/>
            @if ($errors->has($key)) <span class="help-block">{{$errors->first($key)}}</span>  @endif
        </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase" name="btnLogin">Đăng nhập</button>
            <label class="rememberme check">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}/>Ghi nhớ
            </label>
        </div>
    </form>
    <!-- END LOGIN FORM -->

</div>
<div class="copyright">  Copyright © <?php echo date('Y')?> by <a href="https://minhhiep.info" target="_blank">minhhiep.info</a></div>
<script src="/assets/manage/js/login.js"></script>
</body>

</html>
