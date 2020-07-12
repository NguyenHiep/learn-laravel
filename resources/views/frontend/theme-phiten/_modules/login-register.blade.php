<!-- Modal -->
<div class="modal fade formpopup" id="myLogin" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="close" data-dismiss="modal"><i class="icon-close"></i></span>
            <form v-if="screenDisplay === 'login'" class="inner formlogin" method="POST" action="{{ route('login') }}">
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
                    <a href="javascript:void(0)" class="spass show-hide-password">
                        <span class="s">Hiển thị</span> <span class="h">Ẩn</span> Mật khẩu
                    </a>
                </p>
                <p class="text-center">
                    <button type="submit" class="btn noshadow">Đăng nhập</button>
                </p>
                <p class="text-center">
                    <a href="javascript:void(0)" @click="screenDisplay = 'forgotPassword'" class="switchform">Quên mật khẩu?</a>
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
                  <a class="b switchform" @click="screenDisplay = 'register'" href="javascript:void(0)">Đăng ký</a>
                </div>
            </form>

            <form v-if="screenDisplay === 'forgotPassword'" class="inner formforgot" method="POST" action="">
                @csrf
                <h3>Đặt lại mật khẩu</h3>
                <p>Nhập email tài khoản của bạn để nhận liên kết cho phép bạn đặt lại mật khẩu của mình.</p>
                <p class="winput">
                    <input class="input" type="email" placeholder="Email" required/>
                    <i class="icon-mail-1"></i>
                </p>
                <p class="text-center">
                    <button type="submit" class="btn noshadow"> Đặt lại mật khẩu</button>
                </p>
                <p class="text-center">
                    <a class="switchform" @click="screenDisplay = 'login'" href="javascript:void(0)">Đăng nhập</a>
                </p>
            </form>
            <validation-observer v-slot="{ invalid }" ref="registerForm">
                <form @submit.prevent="registerCustomer" v-if="screenDisplay === 'register'" class="inner formregister" method="POST" action="">
                    @csrf
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
                    <validation-provider name="Họ" rules="required" v-slot="{ errors }">
                        <p class="winput">
                                <input v-model.trim="customer.last_name" type="text" name="last_name" :class="errors[0] ? 'has_error' : ''" class="input" id="last-name" placeholder="Họ" autofocus="" required="">
                            <i class="icon-user"></i>
                        </p>
                        <div class="error" v-if="errors[0]">@{{ errors[0] }}</div>
                    </validation-provider>
                    <validation-provider name="Tên" rules="required" v-slot="{ errors }">
                        <p class="winput">
                            <input v-model="customer.first_name" type="text" name="first_name" :class="errors[0] ? 'has_error' : ''" class="input" id="first-name" placeholder="Tên" autofocus="" required="">
                            <i class="icon-user"></i>
                        </p>
                        <div class="error" v-if="errors[0]">@{{ errors[0] }}</div>
                    </validation-provider>
                    {{--<validation-provider name="Tên đăng nhập" rules="required" v-slot="{ errors }">
                        <p class="winput">
                            <input v-model="customer.username" type="text" name="username" :class="errors[0] ? 'has_error' : ''" class="input" id="first-name" placeholder="Tên đăng nhập" autofocus="" required>
                            <i class="icon-user"></i>
                        </p>
                        <div class="error" v-if="errors[0]">@{{ errors[0] }}</div>
                    </validation-provider>--}}
                    <validation-provider name="Email" rules="required|email" v-slot="{ errors }">
                        <p class="winput">
                            <input v-model.trim="customer.email" type="text" name="email" :class="errors[0] ? 'has_error' : ''" class="input" id="email" placeholder="Email" required="">
                            <i class="icon-mail-1"></i>
                        </p>
                        <div class="error" v-if="errors[0]">@{{ errors[0] }}</div>
                    </validation-provider>
                    <validation-provider name="Điện thoại" rules="required" v-slot="{ errors }">
                        <p class="winput">
                            <input v-model.trim="customer.phone" type="text" name="phone" :class="errors[0] ? 'has_error' : ''" class="input" id="phone" placeholder="Điện thoại" required="">
                            <i class="icon-phone-4"></i>
                        </p>
                        <div class="error" v-if="errors[0]">@{{ errors[0] }}</div>
                    </validation-provider>
                    <validation-provider name="Địa chỉ" rules="required" v-slot="{ errors }">
                        <p class="winput">
                            <input v-model.trim="customer.address" type="text" name="address" :class="errors[0] ? 'has_error' : ''" class="input" id="address" placeholder="Địa chỉ" required="">
                            <i class="icon-home3"></i>
                        </p>
                        <div class="error" v-if="errors[0]">@{{ errors[0] }}</div>
                    </validation-provider>
                    <validation-provider name="Mật khẩu" rules="required" v-slot="{ errors }">
                        <p class="winput">
                            <input v-model.trim="customer.password" type="password" name="password" :class="errors[0] ? 'has_error' : ''" class="form-control input" id="register_password" placeholder="Mật khẩu" required>
                            <i class="icon-lock"></i>
                        </p>
                        <div class="error" v-if="errors[0]">@{{ errors[0] }}</div>
                    </validation-provider>
                    <validation-provider name="Xác nhận mật khẩu" rules="required" v-slot="{ errors }">
                        <p class="winput">
                            <input v-model.trim="customer.password_confirmation" type="password" name="password_confirmation" :class="errors[0] ? 'has_error' : ''" class="input" placeholder="Xác nhận mật khẩu" id="confirm-password">
                            <i class="icon-lock"></i>
                        </p>
                        <div class="error" v-if="errors[0]">@{{ errors[0] }}</div>
                    </validation-provider>
                    <div class="row mb-20">
                        <div class="col-sm-6 col-xs-6">
                            <validation-provider name="Mã captcha" rules="required" v-slot="{ errors }">
                                <input v-model.trim="customer.captcha" type="text" name="captcha" :class="errors[0] ? 'has_error' : ''" class="input" id="captcha" placeholder="Mã captcha" required />
                                <div class="error" v-if="errors[0]">@{{ errors[0] }}</div>
                            </validation-provider>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            @includeIf('frontend.theme-phiten.components.captcha')
                        </div>
                    </div>
{{--                    <validation-provider name="Giới tính" rules="required" v-slot="{ errors }">--}}
{{--                        <p class="gender">--}}
{{--                            <span class="title">Giới tính : </span>--}}
{{--                            <label class="radio ">--}}
{{--                                <input v-model="customer.gender" name="gender" type="radio" :class="errors[0] ? 'has_error' : ''" value="1" checked />--}}
{{--                                <span></span>Nam--}}
{{--                            </label>--}}
{{--                            <label class="radio ">--}}
{{--                                <input v-model="customer.gender" name="gender" type="radio" :class="errors[0] ? 'has_error' : ''" value="2" />--}}
{{--                                <span></span>Nữ--}}
{{--                            </label>--}}
{{--                        </p>--}}
{{--                        <div class="error" v-if="errors[0]">@{{ errors[0] }}</div>--}}
{{--                    </validation-provider>--}}
{{--                    <validation-provider name="Birthday" rules="required" v-slot="{ errors }">--}}
{{--                        <p class="winput">--}}
{{--                            <input v-model="customer.birthday" type="date" name="birthday" :class="errors[0] ? 'has_error' : ''" class="form-control input"/>--}}
{{--                            <i class="icon-calendar"></i>--}}
{{--                        </p>--}}
{{--                        <div class="error" v-if="errors[0]">@{{ errors[0] }}</div>--}}
{{--                    </validation-provider>--}}
                    <div>
                        <label class="checkbox ">
                            <input v-model="customer.receive" type="checkbox" name="receive" />
                            <span></span>Theo dõi để nhận thêm ưu đãi!
                        </label>
                    </div>
                    <p>
                        <label class="checkbox ">
                            <input v-model="customer.agree" type="checkbox" name="agree" />
                            <span></span>
                            Tôi đồng ý với <a href="/page/chinh-sach-bao-mat" target="_blank">Chính sách bảo mật</a>
                        </label>
                    </p>
                    <p class="text-center">
                        <button class="btn noshadow"> Đăng ký</button>
                    </p>

                    <div class="resge">
                        Bạn có tài khoản? Vui lòng <a class="b switchform" @click="screenDisplay = 'login'" href="javascript:void(0)">Đăng nhập</a>
                    </div>
                </form>
            </validation-observer>
        </div>

    </div>
</div>
@push('scripts')
    <script>
      (function ($) {
        $(document).ready(function () {
          $('.show-hide-password').click(function () {
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