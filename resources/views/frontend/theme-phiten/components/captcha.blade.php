<a href="javascript:void(0)" @click="refreshCaptcha()">
  <img src="{{ asset('assets/images/svg/refresh.svg') }}" alt="refresh captcha" style="width: 40px"/>
</a>
<span id="refresh-captcha">
  {!! captcha_img() !!}
</span>
