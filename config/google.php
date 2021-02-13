<?php

return [
    'recaptcha_site_key'   => env('GOOGLE_RECAPTCHA_SITE_KEY'),
    'recaptcha_secret'     => env('GOOGLE_RECAPTCHA_SECRET'),
    'recaptcha_verify_url' => env('GOOGLE_RECAPTCHA_VERIFY_URL', 'https://www.google.com/recaptcha/api/siteverify')
];