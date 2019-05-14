const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
/** Manage */
mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'public/manages/assets/global/plugins/bootstrap/css/bootstrap.min.css',
    'public/manages/assets/global/plugins/uniform/css/uniform.default.css',
    'public/manages/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
    'public/manages/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css',
    'public/manages/assets/global/plugins/morris/morris.css',
    'public/manages/assets/global/plugins/fullcalendar/fullcalendar.min.css',
    'public/manages/assets/global/plugins/jqvmap/jqvmap/jqvmap.cs',
    'public/manages/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css',
    'public/manages/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.cs',
    'public/manages/assets/global/plugins/dropzone/dropzone.min.css',
    'public/manages/assets/global/plugins/dropzone/basic.min.css',
    'public/manages/assets/global/plugins/bootstrap-toastr/toastr.min.css',
    'public/manages/assets/global/css/components.min.css',
    'public/manages/assets/global/css/plugins.min.css',
    'public/manages/assets/layouts/layout/css/layout.min.css',
    'public/manages/assets/layouts/layout/css/themes/darkblue.min.css',
    'public/manages/assets/layouts/layout/css/custom.min.css'
], 'public/css/manage/app.css');

mix.combine([
    'public/manages/assets/global/plugins/jquery.min.js',
    'public/manages/assets/global/plugins/bootstrap/js/bootstrap.min.js',
    'public/manages/assets/global/plugins/bootstrap-toastr/toastr.min.js',
    'public/manages/assets/global/plugins/js.cookie.min.js',
    'public/manages/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
    'public/manages/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
    'public/manages/assets/global/plugins/jquery.blockui.min.js',
    'public/manages/assets/global/plugins/uniform/jquery.uniform.min.js',
    'public/manages/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
    'public/manages/assets/global/scripts/app.min.js',
    'public/manages/assets/layouts/layout/scripts/layout.min.js',
    'public/manages/assets/layouts/layout/scripts/demo.min.js',
    'public/manages/assets/layouts/global/scripts/quick-sidebar.min.js',
    'public/manages/assets/js/layouts.js',
    'public/manages/assets/js/action.js',
], 'public/js/manage/app.js');

/** Front End*/
mix.styles([
    'public/theme-onetech/styles/bootstrap4/bootstrap.min.css',
    'public/theme-onetech/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css',
    'public/theme-onetech/plugins/OwlCarousel2-2.2.1/owl.carousel.css',
    'public/theme-onetech/plugins/OwlCarousel2-2.2.1/owl.theme.default.css',
    'public/theme-onetech/plugins/OwlCarousel2-2.2.1/animate.css',
    'public/theme-onetech/plugins/slick-1.8.0/slick.css',
    'public/theme-onetech/styles/main_styles.css',
    'public/theme-onetech/styles/responsive.css',
], 'public/theme-onetech/styles/styles.css');

mix.combine([
      'public/theme-onetech/js/jquery-3.3.1.min.js',
      'public/theme-onetech/styles/bootstrap4/popper.js',
      'public/theme-onetech/styles/bootstrap4/bootstrap.min.js',
      'public/theme-onetech/plugins/greensock/TweenMax.min.js',
      'public/theme-onetech/plugins/scrollmagic/ScrollMagic.min.js',
      'public/theme-onetech/plugins/greensock/animation.gsap.min.js',
      'public/theme-ecommerce/js/toastr.min.js',
      'public/theme-onetech/plugins/greensock/ScrollToPlugin.min.js',
      'public/theme-onetech/plugins/OwlCarousel2-2.2.1/owl.carousel.js',
      'public/theme-onetech/plugins/slick-1.8.0/slick.js',
      'public/theme-onetech/plugins/easing/easing.js',
      'public/theme-onetech/js/custom.js'
   /* 'public/theme-ecommerce/js/frontend.js',
    'public/theme-ecommerce/js/gmap.js'*/
], 'public/theme-onetech/js/main.js');