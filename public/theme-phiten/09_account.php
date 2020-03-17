<?php include 'include/index-top.php';?>

<?php include '_module/breadcrumb.php';?>
<main id="main" class="page-account">
	<div class="container">

		<div class="row">
			<div class="col-md-4 col-lg-3">

				<div class="uname">
					<span class="img">
						<img width="15" height="20" src="assets/images/svg/user.svg" alt="">
					</span>
					<div class="text">
						<span class="t1">Tài khoản của</span>
						<span class="t2">Lê Nhất Nam</span>
					</div>
				</div>

				<ul class="menu-account">
					<li class="active"><a href="#"><img src="assets/images/svg/ac-1.svg"   alt="" /> Thông tin tài khoản</a></li>
					<li><a href="#"><img src="assets/images/svg/ac-2.svg"   alt="" /> Quản lý đơn hàng</a></li>
					<li><a href="#"><img src="assets/images/svg/ac-3.svg"   alt="" /> Sản phẩm đã xem</a></li>
					<li><a href="#"><img src="assets/images/svg/ac-4.svg"   alt="" /> Sản phẩm yêu thích</a></li>
				</ul>
				
			</div>
			<div class="col-md-8 col-lg-9">
				<h1 class="h4">Thông tin tài khoản</h1>

			      <form class="formaccount">
			      	<div class="inner">
				      	<div class="rowlabel label-150">
					      	<label class="item">
					      		<span class="title">Họ và tên</span>
					      		<span class="text"><input class="input" type="text" value="Username"></span>
					      	</label>
					      	<label class="item">
					      		<span class="title">Số điện thoại</span>
					      		<span class="text"><input class="input" type="text" value="0123456789"></span>
					      	</label>
					      	<label class="item">
					      		<span class="title">Email</span>
					      		<span class="text"><input class="input" type="text" value="email@gmail.com"></span>
					      	</label>
					      	<div class="item gender">
					      		<span class="title">Giới tính</span>
					      		<span class="text">

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

					      		</span>
					      	</div>
					      	<div class="item">
					      		<span class="title">Ngày sinh</span>
					      		<span class="text">

							        <div class="row grid-space-10">
							          <div class="col-sm-4 col-xs-4">
							            <select name="day"  class="select">
							              <option value="000">Ngày</option>
							              <?php
							              for($i=1;$i<=31;$i++){
							                echo '<option value="'.$i.'">'.$i.'</option>';
							              } ?>
							            </select>
							          </div>
							          <div class="col-sm-4 col-xs-4">
							            <select name="month"  class="select">
							              <option value="000">Tháng</option>
							              <?php
							              for($i=1;$i<=12;$i++){
							                echo '<option value="'.$i.'">'.$i.'</option>';
							              } ?>
							            </select>
							          </div>
							          <div class="col-sm-4 col-xs-4">
							            <select name="Year"  class="select">
							              <option value="000">Năm</option>
							              <?php
							              for($i=1970;$i<=2020;$i++){
							                echo '<option value="'.$i.'">'.$i.'</option>';
							              } ?>
							            </select>
							          </div>
							        </div>

					      		</span>
					      	</div>

					      	<div class="item">
					      		<span class="title"></span>
					      		<span class="text">

						          <label class="checkbox ">
						            <input type="checkbox" class="input-change-password"  name="change-password" >
						            <span></span>
						              Thay đổi mật khẩu
						          </label>   

					      		</span>
					      	</div>
					      	<label class="item password">
					      		<span class="title">Password</span>
					      		<span class="text"><input class="input" type="password" value="xxxxxx"></span>
					      	</label>

					      	<label class="item password">
					      		<span class="title">Re-type Password</span>
					      		<span class="text"><input class="input" type="password" value="xxxxxx"></span>
					      	</label>	



					      	<div class="item btnsubmit">
					      		<span class="title"></span>
					      		<span class="text">

						          <button class="btn noshadow">Update</button>

					      		</span>
					      	</div>
				      	</div>


					</div>
			      </form>
				
			</div>
		</div>


	</div>
</main>


<script>
(function($){
    $(document).ready(function(){
            $(".formaccount  .input-change-password").on('change',function () {

                    $(".formaccount").toggleClass('edit-pass');

            }); 
    });
})(jQuery);   
</script>


<?php include 'include/index-bottom.php';?>

