@extends('emails.template')

@php
    $user = $content['user'] ?? null;
@endphp

@section('content')
    @if(!empty($user))
        <div>
            Hello {{ $user->first_name . ' ' . $user->last_name }} <br>
            Cảm ở bạn đã đăng ký là thành viên của: {{ route('home') }} <br/>
            Thông tin đăng nhập của bạn là: {{ $user->email }} <br/>
            Mật khẩu của bạn: {{ $user->password }}
        </div>
    @endif
@endsection