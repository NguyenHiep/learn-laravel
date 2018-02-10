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
], 'public/css/app.css');