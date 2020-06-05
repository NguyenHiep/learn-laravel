@extends('frontend.theme-phiten.template')

@section('title', 'Thông tin của tôi - Shop chuyên cung cấp sỉ và lẻ quần áo')

@push('meta')
    <meta name="title" content="Thông tin của tôi -Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta name="keywords" content="Quần áo giá sỷ, Quần áo online, áo thun online, quần kaki online">
    <meta name="description" content="Thông tin của tôi - Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:title" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
    <meta property="og:description" content="Shop chuyên cung cấp sỉ và lẻ quần áo">
@endpush

@section('content')
    <div class="entry-breadcrumb">
        <div class="container">
            <ul class="list-inline breadcrumbs">
                <li><a href="#"><i class="icon icon-home" aria-hidden="true"></i></a></li>
                <li><a href="/account">Tài khoản của tôi</a></li>
                <li class="active">Thông tin của tôi</li>
            </ul>
        </div>
    </div>
    <main id="main" class="page-account">
        <div class="container">
            <div class="content-wrapper clearfix ">

                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        @includeIf('frontend.theme-phiten.customers.sidebar')
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <div class="content-right formaccount">
                            <form method="POST" action="account/profile" autocomplete="off">
                                <input type="hidden" name="_token" value="iPMkB0RDPHoMJRVDLFbDUzmeZTXMZLX3L3tE0IjK">
                                <input type="hidden" name="_method" value="put">

                                <div class="account-details inner">
                                    <div class="account rowlabel label-150 mb-30">
                                        <h4>Tài khoản</h4>

                                        <div class="item form-group ">
                                            <label class="title" for="first-name">
                                                Tên<span>*</span> </label>
                                            <span class="text">  <input type="text" name="first_name" id="first-name" class="form-control input" value="Agency"></span>
                                        </div>

                                        <div class="item form-group ">
                                            <label class="title" for="last-name">
                                                Họ<span>*</span>
                                            </label>

                                            <span class="text"><input type="text" name="last_name" id="last-name" class="form-control input" value="MangoAds"></span>


                                        </div>

                                        <div class="item form-group ">
                                            <label class="title" for="">
                                                Phone<span>*</span>
                                            </label>
                                            <span class="text"> <input type="text" name="phone" id="phone" class="form-control input" value="0923457672711111"></span>


                                        </div>
                                        <div class="item form-group ">
                                            <label class="title" foritem="" form-group="">
                                                Email<span>*</span>
                                            </label>

                                            <span class="text"> <input type="text" name="email" id="email" class="form-control input" value="info@mangoads.vn"></span>


                                        </div>

                                        <div class="item form-group ">
                                            <label class="title" for="">
                                                Địa chỉ
                                            </label>
                                            <span class="text"> <input type="text" name="address" id="address" class="form-control input" value="123 abc"></span>


                                        </div>

                                        <div class="item form-group gender">
                                            <label class="title" for="">
                                                Giới tính
                                            </label>
                                            <span class="text">
                      <label class="radio ">
                        <input name="gender" type="radio" checked="" value="1">
                        <span></span>
                          Nam
                      </label>
                      <label class="radio ">
                        <input name="gender" type="radio" value="2">
                        <span></span>
                          Nữ
                      </label>
                    </span>
                                        </div>

                                        <div class="item form-group">
                                            <label class="title" for="">
                                                Birthday
                                            </label>
                                            <div class="text">
                                                <div class=" row grid-space-0">
                                                    <div class="col-sm-4 col-xs-4">
                                                        <select name="day" class="select">
                                                            <option value="000">Ngày</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                            <option value="23">23</option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                            <option value="28">28</option>
                                                            <option value="29">29</option>
                                                            <option value="30">30</option>
                                                            <option value="31">31</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 col-xs-4">
                                                        <select name="month" class="select">
                                                            <option value="000">Tháng</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 col-xs-4">
                                                        <select name="year" class="select">
                                                            <option value="000">Năm</option>
                                                            <option value="1970">1970</option>
                                                            <option value="1971">1971</option>
                                                            <option value="1972">1972</option>
                                                            <option value="1973">1973</option>
                                                            <option value="1974">1974</option>
                                                            <option value="1975">1975</option>
                                                            <option value="1976">1976</option>
                                                            <option value="1977">1977</option>
                                                            <option value="1978">1978</option>
                                                            <option value="1979">1979</option>
                                                            <option value="1980">1980</option>
                                                            <option value="1981">1981</option>
                                                            <option value="1982">1982</option>
                                                            <option value="1983">1983</option>
                                                            <option value="1984">1984</option>
                                                            <option value="1985">1985</option>
                                                            <option value="1986">1986</option>
                                                            <option value="1987">1987</option>
                                                            <option value="1988">1988</option>
                                                            <option value="1989">1989</option>
                                                            <option value="1990">1990</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1999">1999</option>
                                                            <option value="2000">2000</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="password rowlabel label-150 ">
                                        <h4>Mật khẩu</h4>

                                        <div class="item form-group ">
                                            <label for="new-password" class="title">
                                                Mật khẩu mới
                                            </label>

                                            <span class="text">  <input type="password" name="password" id="new-password" class="form-control input" autocomplete="off"></span>


                                        </div>

                                        <div class="item form-group ">
                                            <label for="confirm-password" class="title">
                                                Xác nhận mật khẩu
                                            </label>

                                            <span class="text"><input type="password" name="password_confirmation" id="confirm-password" class="form-control input"></span>


                                        </div>
                                    </div>
                                </div>

                                <div class="item btnsubmit">
                                    <button type="submit" class="btn btn-primary" data-loading="">
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
