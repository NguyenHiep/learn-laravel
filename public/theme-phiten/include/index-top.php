<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Phiten</title>
<link rel="shortcut icon" href="images/favicon.ico">

<link rel='stylesheet'  href='assets/css/main.css' type='text/css' media='all' />

<script type="text/javascript" src="assets/js/jquery.js" ></script>

</head>

<body >
<div id="wrapper">
<span class="menu-btn overlay"> </span>

  <div id="toppanel">
    <div class="container clearfix">
      <div class="group-left">
        <div class="item ilang">
          <div class="dropdown language">
            <div class="title">  Ngôn ngữ :  <span>VI</span> </div>
            <div class="content">
              <div class="inner">
                <ul class="menu">
                  <li class="lang-en"><a href="#" hreflang="en" title="English (en)"><img src="//via.placeholder.com/20x20" alt="" /> <span>English</span></a></li>
                  <li class="lang-vi active"><a href="#" hreflang="vi" title="Tiếng Việt (vi)"><img src="//via.placeholder.com/20x20" alt="" /> <span>Tiếng Việt</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>  
      <div class="group-right">
        <div class="item ">
          <form action="02_index.php" class="form-search-focus">
            <input type="text" placeholder="Necklace Rakuwa…">
            <button><i class="icon-search-2"></i></button>
          </form>
        </div>        
        <div class="item ">
          <a href="#" data-toggle="modal" data-target="#myLogin">Đăng Nhập</a>
        </div>


        <div class="item widget-mini-cart toggleClass">
          <span class="toggle" ><img src="assets/images/svg/cart.svg"  alt="" /> </span>
          <div class="toggle-content">
            <?php include '_module/mini-cart.php';?>
          </div>
        </div>


      </div>  

    </div>
  </div>
  
<header id="header" class="fixe" role="banner">
  <div class="container"> 
    <a href="./" id="logo" > <img  src="assets/images/logo.png" alt=""></a>
    <div class="wrap-menu-header "> <!--Detect only show PC-->
        <ul class="menu-top-header"> 
          <?php include 'include/mainmenu.php';?>
        </ul>
    </div>
    <div class="group-header">




        <div class="item widget-mini-cart toggleClass">
          <span class="toggle" ><img src="assets/images/svg/cart4.svg"  alt="" /> </span>
          <div class="toggle-content">
            <?php include '_module/mini-cart.php';?>
          </div>
        </div>

    </div>  


    <span class="menu-btn x"><span></span></span>
  </div>
</header>

<!-- End Mainmenu --> 

<div class="wrap-menu-mb" data-style="1">
  <div class="wrapul main">
    <div class="menu-head">
      <h3>Mainmenu</h3>
      <span class="menu-btn x"><span></span></span>
    </div>
    <div class="inner">
      <ul class="menu"> 
        <?php include 'include/mainmenu.php';?>
      </ul> 

      <div class="language">
        
      

      <ul class="row">
        <li class="lang-en col-sm-6 col-xs-6"><a href="#" hreflang="en" title="English (en)"><img src="//via.placeholder.com/20x20" alt="" /> <span>English</span></a></li>
        <li class="lang-vi active  col-sm-6 col-xs-6"><a href="#" hreflang="vi" title="Tiếng Việt (vi)"><img src="//via.placeholder.com/20x20" alt="" /> <span>Tiếng Việt</span></a></li>
      </ul>   
      </div> 
        
    </div>
  </div> 
</div>



