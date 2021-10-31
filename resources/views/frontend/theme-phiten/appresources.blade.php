@php
    $app = app();
    $wifeCart = $app->make('stdClass');
    $wifeCart->csrfToken = csrf_token();
    $wifeCart->pathImageProduct = Storage::url('/');
    $wifeCart->language = '';
    $wifeCart->currency = '';
    $wifeCart->recaptcha_site_key = config('google.recaptcha_site_key');
    $jsonWifeCart = json_encode($wifeCart, true);
    $jsonResources = json_encode(\App\Utils\Resource::index(), true);
@endphp
(function(WifeCart){
  Object.assign(WifeCart, {!! $jsonWifeCart !!});
}(window.WifeCart = window.WifeCart || {}));

(function(app){
    Object.assign(app, {!! $jsonResources !!});
}(window.app = window.app || {}));
