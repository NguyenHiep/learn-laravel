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
    'public/manages/assets/js/action.js'
], 'public/js/manage/app.js');

/** Front End*/
mix.copyDirectory('public/theme-phiten/assets/fonts', 'public/assets/fonts');

mix.copyDirectory('public/theme-phiten/assets/images', 'public/assets/images');

mix.copyDirectory('public/theme-phiten/assets/img', 'public/assets/img');

mix.copyDirectory('public/theme-phiten/assets/js', 'public/assets/js');

mix.styles([
  'public/theme-phiten/assets/css/toastr.min.css',
  'public/theme-phiten/assets/css/main.css',
  'public/theme-phiten/assets/css/style.css'
], 'public/assets/css/app.css');

mix.combine([
  'public/theme-phiten/assets/js/vue.js',
  'public/theme-phiten/assets/js/vee-validate.min.js',
  'public/theme-phiten/assets/js/rules.umd.min.js',
  'public/theme-phiten/assets/js/axios.min.js',
  'public/theme-phiten/assets/js/lodash.min.js',
  'public/theme-phiten/assets/js/jquery.js',
  'public/theme-phiten/assets/js/bootstrap.min.js',
  'public/theme-phiten/assets/js/toastr.min.js',
  'public/theme-phiten/assets/js/script.js',
  'public/theme-phiten/assets/js/action.js'
], 'public/assets/js/app.js');
