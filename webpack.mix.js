const { mix } = require('laravel-mix');

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
	'public/manages/assets/layouts/layout/css/custom.min.css',
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
], 'public/js/manage/app.js');

/** Front End*/
mix.styles([
	  'public/theme-ecommerce/css/font-awesome.min.css',
	  'public/theme-ecommerce/css/bootstrap.min.css',
		'public/theme-ecommerce/css/ion.rangeSlider.css',
		'public/theme-ecommerce/css/ion.rangeSlider.skinFlat.css',
		'public/theme-ecommerce/css/jquery.bxslider.css',
		'public/theme-ecommerce/css/jquery.fancybox.css',
		'public/theme-ecommerce/css/flexslider.css',
		'public/theme-ecommerce/css/swiper.css',
		'public/theme-ecommerce/css/toastr.min.css',
		'public/theme-ecommerce/css/style.css',
		'public/theme-ecommerce/css/css/media.css',
		'public/theme-ecommerce/css/custom.css',
], 'public/theme-ecommerce/css/theme-ecommerce.css');

mix.combine([
	'public/theme-ecommerce/js/jquery-1.11.2.min.js',
	'public/theme-ecommerce/js/jquery.bxslider.min.js',
	'public/theme-ecommerce/js/fancybox/fancybox.js',
	'public/theme-ecommerce/js/fancybox/helpers/jquery.fancybox-thumbs.js',
	'public/theme-ecommerce/js/jquery.flexslider-min.js',
	'public/theme-ecommerce/js/swiper.jquery.min.js',
	'public/theme-ecommerce/js/jquery.waypoints.min.js',
	'public/theme-ecommerce/js/progressbar.min.js',
	'public/theme-ecommerce/js/ion.rangeSlider.min.js',
	'public/theme-ecommerce/js/chosen.jquery.min.js',
	'public/theme-ecommerce/js/jQuery.Brazzers-Carousel.js',
	'public/theme-ecommerce/js/toastr.min.js',
	'public/theme-ecommerce/js/plugins.js',
	'public/theme-ecommerce/js/main.js',
	'public/theme-ecommerce/js/frontend.js',
	'public/theme-ecommerce/js/gmap.js',

], 'public/theme-ecommerce/js/theme-ecommerce.js');