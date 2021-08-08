'use strict';
(function ($) {
    $(document).ready(function () {
        var recaptcha = {
            /***
             * Execute recaptcha for form
             *
             * @param action
             * @param selectorToken
             * @param selectorAction
             * @param form
             * @param callback
             */
            execute: function(action, selectorToken, selectorAction, form, callback) {
                window.grecaptcha.ready(function() {
                    window.grecaptcha.execute(window.WifeCart.recaptcha_site_key, {action: action}).then(function(token) {
                        var $selectorToken = $('#' + selectorToken);
                        var $selectorAction = $('#' + selectorAction);
                        if (!$selectorToken.length) {
                            form.append('<input type="hidden" id="'+ selectorToken +'" name="google_token" value="' + token + '" />');
                        } else {
                            $selectorToken.val(token);
                        }
                        if (!$selectorAction.length) {
                            form.append('<input type="hidden" id="'+ selectorAction +'" name="google_action" value="' + action + '" />');
                        } else {
                            $selectorAction.val(action);
                        }
                        callback();
                        for (var client in window.___grecaptcha_cfg.clients) {
                            window.grecaptcha.reset(client);
                        }
                    });
                });
            },
            subscribeNewsletter: function () {
                var $formSubscribe = $('form[id="frm-subscribe"]');
                $formSubscribe.submit(function (e) {
                    e.preventDefault();
                    var self = this,
                        $loading = $('body').find('#loading').eq(0);
                    if ($loading) {
                        $loading.show();
                    }
                    var callBack = function () {
                        var url = $formSubscribe.attr('action');
                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: $formSubscribe.serialize(),
                            dataType: 'json'
                        }).done(function (response) {
                            if ($loading) {
                                $loading.hide();
                            }
                            showNotificationMessage(response);
                            self.reset();
                        }).fail(function (jqXHR) {
                            console.log('Error:', jqXHR);
                            if ($loading) {
                                $loading.hide();
                            }
                        });
                    };
                    recaptcha.execute('subscribe', 'subscribeToken', 'subscribeAction', $formSubscribe, callBack);
                });
            },
            contactForm: function () {
                var $formContact = $('form[id="frm-contact"]');
                $formContact.submit(function (e) {
                    e.preventDefault();
                    var self = this,
                        $loading = $('body').find('#loading').eq(0);
                    if ($loading) {
                        $loading.show();
                    }
                    var callBack = function () {
                        var url = $formContact.attr('action');
                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: $formContact.serialize(),
                            dataType: 'json'
                        }).done(function (response) {
                            if ($loading) {
                                $loading.hide();
                            }
                            showNotificationMessage(response);
                            self.reset();
                        }).fail(function (jqXHR) {
                            console.log('Error:', jqXHR);
                            if ($loading) {
                                $loading.hide();
                            }
                        });
                    };
                    recaptcha.execute('contact', 'contactToken', 'contactAction', $formContact, callBack);
                });
            }
        };
        recaptcha.subscribeNewsletter();
        recaptcha.contactForm();
    });
})(jQuery);