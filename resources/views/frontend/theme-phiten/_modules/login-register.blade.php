<!-- Modal -->
<div class="modal fade formpopup" id="myLogin" data-show="flogin" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <span class="close" data-dismiss="modal"><i class="icon-close"></i></span>
      <form class="inner formlogin">
        <h3>Đăng nhập</h3>
        <p class="winput">
          <input class="input" type="text" placeholder="Email">
          <i class="icon-user"></i>
        </p>
        <p class="winput">
          <input class="input" type="password" id="password"  placeholder="Password">
          <i class="icon-lock"></i>
        </p>
        <p class="wremember">
          <label class="remember" ><input type="checkbox"> Remember me</label>
          <a href="javascript:void(0)" class="spass">
            <span class="s">Show</span> <span class="h">Hide</span> password
          </a>
        </p>
        <p class="text-center">
          <button class="btn  noshadow full">Login</button>
        </p>
        <p class="text-center">
          <a href="#" class="switchform" data-form="fforgot">Forgot password?</a>
        </p>
        <div class="logsocial">
          <span class="title">  or continue with</span>
          <div class="row">
            <div class="col-sm-6 col-xs-6">
              <a href="#" class="fb"> <i class="icon-facebook"></i> Facebook</a>
            </div>
            <div class="col-sm-6 col-xs-6">
              <a href="#" class="gg"> <i class="icon-Google"></i> Google</a>
            </div>
          </div>
        </div>

        <div class="resge">Don’t have an account ? <a class="b switchform" data-form="fregister" href="javascript:void(0)">Sign Up</a></div>
      </form>

      <form class="inner formforgot">
        <h3>Forgot Password</h3>
        <p>Please provide your login email or phone number to retrieve your password.</p>
        <p class="winput">
          <input class="input" type="text" placeholder="Enter your email">
          <i class="icon-mail-1"></i>
        </p>
        <p><button class="btn full noshadow"> Send</button></p>
        <p class="text-center"><a class="switchform" data-form="flogin" href="javascript:void(0)">Login</a></p>


      </form>

      <form class="inner formregister">
        <div class="logsocial2">
          <span class="title">or</span>
          Sing up with <a href="#" class="fb">Facebook</a> or <a href="#" class="gg">Google</a>
        </div>
        <h3>Đăng ký</h3>
        <p class="winput">
          <input class="input" type="text" placeholder="Username">
          <i class="icon-user"></i>
        </p>
        <p class="winput">
          <input class="input" type="text" placeholder="Phone">
          <i class="icon-phone-4"></i>
        </p>
        <p class="winput">
          <input class="input" type="text" placeholder="Email">
          <i class="icon-mail-1"></i>
        </p>
        <p class="winput">
          <input class="input" type="password"   placeholder="Password">
          <i class="icon-lock"></i>
        </p>
        <p class="winput">
          <input class="input" type="password"   placeholder="Re-type Password">
          <i class="icon-lock"></i>
        </p>

        <p class="gender">
          <span class="title">Gender : </span>

          <label class="radio ">
            <input name="gender" type="radio" checked="">
            <span></span>
              Male
          </label>
          <label class="radio ">
            <input name="gender" type="radio">
            <span></span>
              Female
          </label>                  
        </p>

        <div>
          <label class="checkbox ">
            <input type="checkbox"  name="receive" checked>
            <span></span>
              Receive information and promotions via email
          </label>          
        </div>
        <p>
          <label class="checkbox ">
            <input type="checkbox" name="agree" checked>
            <span></span>
              I agree to the terms & conditions
          </label>          
        </p>

        <div class="row  mb-20">
          <div class="col-sm-4 col-xs-4">
            <select name="day"  class="select">
              <option value="000">Day</option>
              <?php
              for($i=1;$i<=31;$i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
              } ?>
            </select>
          </div>
          <div class="col-sm-4 col-xs-4">
            <select name="month"  class="select">
              <option value="000">Month</option>
              <?php
              for($i=1;$i<=12;$i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
              } ?>
            </select>
          </div>
          <div class="col-sm-4 col-xs-4">
            <select name="Year"  class="select">
              <option value="000">Year</option>
              <?php
              for($i=1970;$i<=2020;$i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
              } ?>
            </select>
          </div>
        </div>

        <p class="text-center">
          <button class="btn full noshadow    "> Register</button>
        </p>

        <div class="resge">Have an account ? <a class="b switchform" data-form="flogin" href="javascript:void(0)">Login</a></div>
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

        })
      })
    })(jQuery)
  </script>
@endpush