@extends('frontend.theme-phiten.template')

@section('title', 'Thông tin của tôi - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Thông tin của tôi -Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Thông tin của tôi - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('breadcrumb')
    <li><a href="{{ route('customer.profile') }}">Tài khoản của tôi</a></li>
    <li class="active">Thông tin của tôi</li>
@endsection

@section('content')
    <main id="main" class="page-account">
        <div class="container">
            <div class="content-wrapper clearfix ">

                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        @includeIf('frontend.theme-phiten.customers.sidebar')
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <div class="content-right formaccount">
                            <form method="POST" action="{{ route('customer.profile.update') }}" autocomplete="off">
                                @csrf
                                @method('put')
                                <div class="account-details inner">
                                    <div class="account rowlabel label-150 mb-30">
                                        <h4>Tài khoản</h4>
                                        <div class="item form-group ">
                                            <label class="title" for="first-name">
                                                Tên<span>*</span>
                                            </label>
                                            <span class="text">
                                                <input type="text" name="first_name" id="first-name" class="form-control input" value="{{ old('first_name', $customer->first_name) }}">
                                            </span>
                                        </div>

                                        <div class="item form-group ">
                                            <label class="title" for="last-name">
                                                Họ<span>*</span>
                                            </label>
                                            <span class="text">
                                                <input type="text" name="last_name" id="last-name" class="form-control input" value="{{ old('first_name', $customer->last_name) }}">
                                            </span>
                                        </div>

                                        <div class="item form-group ">
                                            <label class="title" for="">
                                                Phone<span>*</span>
                                            </label>
                                            <span class="text">
                                                <input type="text" name="phone" id="phone" class="form-control input" value="{{ old('phone', $customer->phone) }}">
                                            </span>
                                        </div>

                                        <div class="item form-group ">
                                            <label class="title">
                                                Email<span>*</span>
                                            </label>
                                            <span class="text">
                                                <input type="email" name="email" id="email" class="form-control input" value="{{ old('email', $customer->email) }}">
                                            </span>
                                        </div>

                                        <div class="item form-group ">
                                            <label class="title">
                                                Địa chỉ
                                            </label>
                                            <span class="text">
                                                <input type="text" name="address" id="address" class="form-control input" value="{{ old('email', $customer->address) }}">
                                            </span>
                                        </div>

                                        <div class="item form-group gender">
                                            <label class="title">
                                                Giới tính
                                            </label>
                                            <span class="text">
                                              <label class="radio">
                                                <input name="gender" type="radio" value="1" {{ (old('gender', $customer->gender) == 1) ? "checked" : "" }}>
                                                <span></span>
                                                  {{ __('selector.gender.1') }}
                                              </label>
                                              <label class="radio">
                                                <input name="gender" type="radio" value="2" {{ (old('gender', $customer->gender) == 2) ? "checked" : "" }}>
                                                <span></span>
                                                 {{ __('selector.gender.2') }}
                                              </label>
                                            </span>
                                        </div>

                                        <div class="item form-group">
                                            <label class="title">Birthday</label>
                                            <div class="text">
                                                <input type="date" name="birthday" class="form-control input" value="{{ old('birthday', $customer->birthday) }}"/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="password rowlabel label-150 ">
                                        <h4>Mật khẩu</h4>
                                        <div class="item form-group ">
                                            <label for="new-password" class="title">
                                                Mật khẩu mới
                                            </label>
                                            <span class="text">
                                                <input type="password" name="password" id="new-password" class="form-control input" autocomplete="off">
                                            </span>
                                        </div>

                                        <div class="item form-group ">
                                            <label for="confirm-password" class="title">
                                                Xác nhận mật khẩu
                                            </label>
                                            <span class="text">
                                                <input type="password" name="password_confirmation" id="confirm-password" class="form-control input">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="item btnsubmit">
                                    <button type="submit" class="btn btn-primary">
                                        Lưu thay đổi
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
