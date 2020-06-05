<!-- Modal -->
<div class="modal fade formpopup" id="myLogin" data-show="flogin" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="close" data-dismiss="modal"><i class="icon-close"></i></span>
            <form class="inner formlogin" method="POST" action="{{ route('login') }}">
                @csrf
                <h3>Đăng nhập</h3>
                @if ($errors->has('email'))
                    <span class="help-block error">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                @if ($errors->has('password'))
                    <span class="help-block error">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <p class="winput">
                    <input name="email" class="input{{ $errors->has('email') ? ' has-error' : '' }}" type="email" placeholder="Email" required/>
                    <i class="icon-user"></i>
                </p>

                <p class="winput">
                    <input name="password" class="input{{ $errors->has('password') ? ' has-error' : '' }}" type="password" id="password" placeholder="Mật khẩu"  required/>
                    <i class="icon-lock"></i>
                </p>
                <p class="wremember">
                    <label class="remember">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Nhớ đến tôi</label>
                    <a href="javascript:void(0)" class="spass">
                        <span class="s">Hiển thị</span> <span class="h">Ẩn</span> Mật khẩu
                    </a>
                </p>
                <p class="text-center">
                    <button type="submit" class="btn noshadow">Đăng nhập</button>
                </p>
                <p class="text-center">
                    <a href="#" class="switchform" data-form="fforgot">Quên mật khẩu?</a>
                </p>
                <div class="logsocial">
                    <span class="title">  Hoặc tiếp tục với</span>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <a href="#" class="fb"> <i class="icon-facebook"></i> Đăng nhập Facebook</a>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <a href="#" class="gg"> <i class="icon-Google"></i> Đăng nhập Google</a>
                        </div>
                    </div>
                </div>

                <div class="resge">Bạn không có tài khoản?
                  <a class="b switchform" data-form="fregister" href="javascript:void(0)">Đăng ký</a>
                </div>
            </form>

            <form class="inner formforgot">
                <h3>Đặt lại mật khẩu</h3>
                <p>Nhập email tài khoản của bạn để nhận liên kết cho phép bạn đặt lại mật khẩu của mình.</p>
                <p class="winput">
                    <input class="input" type="email" placeholder="Email" required/>
                    <i class="icon-mail-1"></i>
                </p>
                <p class="text-center">
                    <button class="btn noshadow"> Đặt lại mật khẩu</button>
                </p>
                <p class="text-center"><a class="switchform" data-form="flogin" href="javascript:void(0)">Đăng nhập</a></p>
            </form>

            <form class="inner formregister">
                <div class="logsocial2">
                    <span class="title">Hoặc tiếp tục với</span>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <a href="/login/facebook" class="fb"> <i class="icon-facebook"></i>  Đăng nhập Facebook</a>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <a href="/login/google" class="gg"> <i class="icon-google"></i> Đăng nhập Google</a>
                        </div>
                    </div>
                </div>
                <h3>Đăng ký</h3>
                <p class="winput">
                    <input type="text" name="first_name" value="" class="input" id="first-name" placeholder="Tên" autofocus="" required="">
                    <i class="icon-user"></i>
                </p>
                <p class="winput">
                    <input type="text" name="last_name" value="" class="input" id="last-name" placeholder="Họ" autofocus="" required="">
                    <i class="icon-user"></i>
                </p>
                <p class="winput">
                    <input type="text" name="email" value="" class="input" id="email" placeholder="Email" required="">
                    <i class="icon-mail-1"></i>
                </p>
                <p class="winput">
                    <input type="number" name="phone" value="" class="input" id="phone" placeholder="Điện thoại" required="">
                    <i class="icon-phone-4"></i>
                </p>
                <p class="winput">
                    <input type="text" name="address" value="" class="input" id="address" placeholder="Địa chỉ" required="">
                    <i class="icon-home3"></i>
                </p>
                <p class="winput">
                    <input type="password" name="register_password" class="form-control input" id="register_password" placeholder="Mật khẩu" required="">
                    <i class="icon-lock"></i>

                </p>
                <p class="winput">
                    <input type="password" name="password_confirmation" class="input" placeholder="Xác nhận mật khẩu" id="confirm-password">
                    <i class="icon-lock"></i>
                </p>

                <p class="gender">
                    <span class="title">Giới tính : </span>
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
                </p>
                <div class="row mb-20">
                    <div class="col-sm-4 col-xs-4">
                        <select name="day" class="select">
                            <option value="000">Day</option>
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="col-sm-4 col-xs-4">
                        <select name="month" class="select">
                            <option value="000">Month</option>
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="col-sm-4 col-xs-4">
                        <select name="Year" class="select">
                            <option value="000">Year</option>
                            <?php
                            for ($i = 1970; $i <= 2020; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            } ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="checkbox ">
                        <input type="checkbox" name="receive" checked>
                        <span></span>
                        Theo dõi để nhận thêm ưu đãi!
                    </label>
                </div>
                <p>
                    <label class="checkbox ">
                        <input type="checkbox" name="agree" checked="" value="1">
                        <span></span>
                        Tôi đồng ý với <a href="/page/privacy-policy">Chính sách bảo mật</a>
                    </label>
                </p>

                <p class="text-center">
                    <button class="btn noshadow">  Đăng ký</button>
                </p>

                <div class="resge">
                    Bạn có tài khoản? Vui lòng <a class="b switchform" data-form="flogin" href="javascript:void(0)">Đăng nhập</a>
                </div>
            </form>

        </div>

    </div>
</div>
@push('scripts')
    <script>
      (function ($) {
        $(document).ready(function () {
          $('.switchform').click(function () {
            var f = $(this).data('form')
            $('.formpopup').attr('data-show', f)
          })
          $('.formpopup .spass').click(function () {
            if ($(this).hasClass('ac')) {
              $(this).removeClass('ac')
              $('#password').attr('type', 'password')
            } else {
              $(this).addClass('ac')
              $('#password').attr('type', 'text')
            }

          });
        @if($errors->has('email') || $errors->has('password'))
            $('#myLogin').modal({
              show: true
            });
        @endif
        })
      })(jQuery)
    </script>
@endpush