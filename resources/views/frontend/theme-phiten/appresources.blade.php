@php
    $app = app();
    $wifeCart = $app->make('stdClass');
    $wifeCart->csrfToken = csrf_token();
    $wifeCart->pathImageProduct = UPLOAD_PRODUCT;
    $wifeCart->language = '';
    $wifeCart->currency = '';
    $wifeCart->recaptcha_site_key = config('google.recaptcha_site_key');
    $jsonWifeCart = json_encode($wifeCart, true);
@endphp
(function(WifeCart){
  Object.assign(WifeCart, {!! $jsonWifeCart !!});
}(window.WifeCart = window.WifeCart || {}));
