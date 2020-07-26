@extends('frontend.theme-phiten.template')

@section('title', 'Đặt lại mật khẩu')

@push('meta')
    <meta name="title" content="Đặt lại mật khẩu - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Đặt lại mật khẩu - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Đặt lại mật khẩu - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Đặt lại mật khẩu - Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('breadcrumb')
    <li><a href="{{ route('home') }}">Trang chủ</a></li>
    <li class="active"><a href="javascript:void(0)">Đặt lại mật khẩu</a></li>
@endsection

@section('content')
    <main id="main">
        <div class="container">
            <div class="content-wrapper clearfix">
                <div class="page-wrapper clearfix">
                    <div class="page-content">
                        <h1 class="text-center page-title">Đặt lại mật khẩu</h1>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ url('/password/reset') }}" method="POST" class="form-full">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <p class="winput{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email"
                                       type="email"
                                       name="email"
                                       value="{{ $email ?? old('email') }}"
                                       placeholder="{{ __('Email') }}"
                                       class="input"
                                       required="required"
                                       autofocus
                                />
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <p class="winput{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input name="password" type="password" id="password" placeholder="{{ __('Mật khẩu') }}" required="required" class="input" />
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <p class="winput{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input name="password_confirmation" type="password" id="password_confirmation" placeholder="{{ __('Xác nhận mật khẩu') }}" required="required" class="input" />
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </p>

                            <p class="text-center">
                                <button type="submit" class="btn full noshadow">Đặt lại mật khẩu</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
