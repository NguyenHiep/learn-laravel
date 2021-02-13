'use strict';
(function ($) {
    $(document).ready(function () {
        var recaptcha = {
            subscribeNewsletter: function () {
                var $formSubscribe = $('form[id="frm-subscribe"]');
                $formSubscribe.submit(function (e) {
                    e.preventDefault();
                    var self = this;
                    window.grecaptcha.ready(function() {
                        var action = 'subscribe';
                        window.grecaptcha.execute(window.WifeCart.recaptcha_site_key, {action: action}).then(function(token) {
                            if (!$('#google_token').length) {
                                $formSubscribe.append('<input type="hidden" id="google_token" name="google_token" value="' + token + '" />');
                            } else {
                                $('#google_token').val(token);
                            }
                            if (!$('#google_action').length) {
                                $formSubscribe.append('<input type="hidden" id="google_action" name="google_action" value="' + action + '" />');
                            } else {
                                $('#google_action').val(action);
                            }

                            var url = $formSubscribe.attr('action');
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: $formSubscribe.serialize(),
                                dataType: 'json'
                            }).done(function (response) {
                                showNotificationMessage(response);
                                self.reset();
                            }).fail(function (jqXHR) {
                                console.log('Error:', jqXHR);
                            });
                            for (var client in window.___grecaptcha_cfg.clients) {
                                window.grecaptcha.reset(client);
                            }
                        });
                    });
                });
            }
        };
        recaptcha.subscribeNewsletter();
    });
})(jQuery);