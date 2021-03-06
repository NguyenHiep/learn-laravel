"use strict";

/**
 * Number.prototype.format(n, x, s, c)
 * @param n Length of decimal
 * @param x Length of whole part
 * @param s Sections delimiter
 * @param c Decimal delimiter
 * @returns {string}
 */
Number.prototype.format = function (n, x, s, c) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
        num = this.toFixed(Math.max(0, ~~n));

    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
};

/***
 * Object product js
 * @type {{elemBody: (jQuery|HTMLElement), remove_item_compare: Products.remove_item_compare, init: Products.init, confirm_checkout: Products.confirm_checkout, change_quantity: Products.change_quantity, plus_quantity: Products.plus_quantity, check_number_input: (function(*=): boolean), minus_quantity: Products.minus_quantity, setup: Products.setup, quick_view_product: Products.quick_view_product, compare_product: Products.compare_product}}
 */
var Products = {
    elemBody: $('body'),
    setup: function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $("#page-preloader").show();
            }
        });
    },

    quick_view_product: function () {
        this.elemBody.find('.qview-btn').on("click", function (e) {
            e.preventDefault();
            var product_id = $(this).attr('data-id');
            if (typeof product_id !== 'undefined') {
                $.ajax({
                    cache: false,
                    type: "GET",
                    url: ajaxcalls_vars.host + '/product/quick-view',
                    data: {product_id: product_id}
                }).done(function (data) {
                    var qviewModel = $('.qview-modal');
                    $("#page-preloader").hide();
                    qviewModel.html(data);
                    $('.qview-btn').fancybox({
                        content: qviewModel,
                        padding: 0,
                        helpers: {
                            overlay: {
                                locked: false
                            }
                        }
                    });
                    var prodSliderCar = $('.prod-slider-car');
                    if (prodSliderCar.length > 0) {
                        prodSliderCar.each(function () {
                            $(this).bxSlider({
                                pagerCustom: $(this).parents('.prod-slider-wrap').find('.prod-thumbs-car'),
                                adaptiveHeight: true,
                                infiniteLoop: false,
                            });
                            $(this).parents('.prod-slider-wrap').find('.prod-thumbs-car').bxSlider({
                                slideWidth: 5000,
                                slideMargin: 8,
                                moveSlides: 1,
                                infiniteLoop: false,
                                minSlides: 5,
                                maxSlides: 5,
                                pager: false,
                            });
                        });
                    }
                    Products.compare_product();
                    Checkout.add_to_cart();
                    Products.plus_quantity();
                    Products.minus_quantity();
                }).fail(function (jqXHR) {
                    console.log('Error:', jqXHR);
                });
            }

        });
    },

    compare_product: function () {
        this.elemBody.find('.compare_product').on("click", function (e) {
            e.preventDefault();
            var product_id = $(this).attr('data-id');
            if (typeof product_id !== 'undefined') {
                $.ajax({
                    cache: false,
                    type: "GET",
                    url: ajaxcalls_vars.host + '/compares/add',
                    data: {product_id: product_id}
                }).done(function (data) {
                    $("#page-preloader").hide();
                    $("#total_compare").html(data.total_items);
                    show_message(data);
                }).fail(function (jqXHR) {
                    console.log('Error:', jqXHR);
                });

            }

        });
    },

    remove_item_compare: function () {
        this.elemBody.find('.remove-compare-item').on("click", function (e) {
            e.preventDefault();
            var product_id = $(this).attr('data-id');
            if (typeof product_id !== 'undefined') {
                $.ajax({
                    cache: false,
                    type: "GET",
                    url: ajaxcalls_vars.host + '/compares/remove',
                    data: {product_id: product_id}
                }).done(function (data) {
                    $("#page-preloader").hide();
                    show_message(data);
                    if (typeof (data.redirect) !== 'undefined') {
                        window.location.href = data.redirect;
                    }
                }).fail(function (jqXHR) {
                    console.log('Error:', jqXHR);
                })
            }
        });
    },

    change_quantity: function () {
        if (typeof page !== 'undefined' && page === 'cart') {
            this.elemBody.find('.quantity_item').on("change", function (e) {
                e.preventDefault();
                var quantity = $(this).val();
                var price = $(this).next().next().next().val();
                var product_id = $(this).next().next().next().next().val();
                var total_item = 0;
                var parent = $(this).parents("tr").eq(0);
                var elemTotal = parent.find('.cart-summ b').eq(0);

                if (Products.check_number_input(quantity)) { // Nếu ký tự là số thì thực hiện
                    if (quantity > 0 && typeof price !== 'undefined' && typeof product_id !== 'undefined') {
                        total_item = parseInt(quantity * price);
                        var total_item_format = (total_item.format(0, 3, '.', ',')) + '&nbsp;vnđ';
                        elemTotal.html(total_item_format);
                        Checkout.calc_total_price();
                    } else {
                        $(this).focus();
                        show_message({
                            'status': 'error',
                            'message': 'Số lượng phải > 0'
                        });
                        console.log("quantity:", quantity);
                        console.log("price:", price);
                        console.log("product_id:", product_id);
                        console.log("total_item:", total_item);
                    }
                } else {
                    $(this).focus();
                    show_message({
                        'status': 'error',
                        'message': 'Chỉ chấp nhận giá trị là chữ số'
                    });
                }  // End if (result)

            });
        }
    },

    plus_quantity: function () {
        this.elemBody.find('.plus_quantity').on("click", function (e) {
            e.preventDefault();
            var quantity = $(this).prev().val();
            if (Products.check_number_input(quantity) && quantity > 0) {
                quantity++;
                $(this).prev().val(quantity);
                $('.quantity_item').trigger("change");
                $('.cart-submit-btn').attr('data-update', true); // Change status button update
            }

        });
    },

    minus_quantity: function () {
        this.elemBody.find('.minus_quantity').on("click", function (e) {
            e.preventDefault();
            var quantity = $(this).prev().prev().val();
            if (Products.check_number_input(quantity) && quantity > 1) {
                quantity--;
                $(this).prev().prev().val(quantity);
                $('.quantity_item').trigger("change");
                $('.cart-submit-btn').attr('data-update', true); // Change status button update
            }
        });
    },

    check_number_input: function (val) {
        var reg = new RegExp('^\\d+$'); // Link ex: https://www.w3schools.com/jsref/jsref_regexp_test.asp
        return reg.test(val);
    },

    confirm_checkout: function () {
        this.elemBody.find('.cart-submit-btn').eq(0).on('click', function () {
            var status_update = $(this).attr('data-update');

            if (status_update === "true") {
                show_message({
                    status: 'error',
                    message: 'Vui lòng cập nhật giỏ hàng'
                });
                return false;
            }
        });
    },

    init: function () {
        this.setup();
        this.quick_view_product();
        this.compare_product();
        this.remove_item_compare();
        this.check_number_input();
        this.change_quantity();
        this.plus_quantity();
        this.minus_quantity();
        this.confirm_checkout();
    }
};

/***
 * Object Checkout js
 * @type {{elemBody: (jQuery|HTMLElement), init: Checkout.init, setup: Checkout.setup, removeall_item_cart: Checkout.removeall_item_cart, remove_item_cart: Checkout.remove_item_cart, calc_total_price: Checkout.calc_total_price, update_cart: Checkout.update_cart, add_to_cart: Checkout.add_to_cart}}
 */
var Checkout = {
    elemBody: $('body'),
    setup: function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $("#page-preloader").show();
            }
        });
    },

    add_to_cart: function () {
        this.elemBody.find('.add_to_cart').on("click", function (e) {
            var product_id = $(this).attr('data-id');
            var quantity = Checkout.elemBody.find(".quantity_item").val();
            if (typeof quantity !== 'undefined') {
                quantity = Checkout.elemBody.find(".quantity_item").val();
            } else {
                quantity = 1;
            }
            if (typeof product_id !== 'undefined') {
                let url = ajaxcalls_vars.host + '/checkout/addtocart';
                let dataSend = {
                    _token: ajaxcalls_vars.token,
                    product_id: product_id,
                    quantity: quantity
                }

               $.ajax({
                    type: "POST",
                    url: url,
                    data: dataSend,
                    dataType: "json",
                }).done(function (data) {
                    console.log(data)
                    $("#page-preloader").hide();
                    $("#total_cart").html(data.total_items);
                    show_message(data);
                }).fail(function (jqXHR) {
                    console.log('Error:', jqXHR);
                });

            }
            e.preventDefault();

        });
    },
    update_cart: function () {
        this.elemBody.find('.update_cart').eq(0).on('click', function (event) {
            event.preventDefault();
            var form = $('form');
            $.ajax({
                cache: false,
                type: "POST",
                contentType: "application/json",
                url: ajaxcalls_vars.host + '/checkout/update',
                data: {
                    _token: ajaxcalls_vars.token,
                    carts: form.serializeArray(),
                }
            }).done(function (data) {
                $("#page-preloader").hide();
                show_message(data);
                $('.cart-submit-btn').attr('data-update', false);
            }).fail(function (jqXHR) {
                console.log('Error:', jqXHR);
            });

        });
    },
    remove_item_cart: function () {
        this.elemBody.find('.cart-remove').on("click", function (e) {
            e.preventDefault();
            var product_id = $(this).attr('data-id'),
                parent_item_tr = $(this).parent().parent();

            if (typeof product_id !== 'undefined' && Products.check_number_input(product_id)) {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: ajaxcalls_vars.host + '/checkout/removecart',
                    data: {
                        _token: ajaxcalls_vars.token,
                        product_id: product_id,
                    }
                }).done(function (data) {
                    console.log(parent_item_tr);
                    $("#page-preloader").hide();
                    show_message(data);
                    parent_item_tr.remove();
                    Checkout.calc_total_price();
                    if (typeof (data.redirect) !== 'undefined') {
                        window.location.href = data.redirect;
                    }
                }).fail(function (jqXHR) {
                    console.log('Error:', jqXHR);
                })
            }

        });
    },
    removeall_item_cart: function () {
        this.elemBody.find('.cart-clear').on("click", function (e) {
            e.preventDefault();
            $.ajax({
                cache: false,
                type: "POST",
                url: ajaxcalls_vars.host + '/checkout/removeallcart',
                data: {
                    _token: ajaxcalls_vars.token,
                    delete_all: true,
                }
            }).done(function (data) {
                $("#page-preloader").hide();
                show_message(data);
                if (typeof (data.redirect) !== 'undefined') {
                    window.location.href = data.redirect;
                }
            }).fail(function (jqXHR) {
                console.log('Error:', jqXHR);
            })

        });
    },
    calc_total_price: function () {
        if (typeof page !== 'undefined' && page === 'cart') {
            var quantity = 0,
                price = 0,
                total_item = 0;
            this.elemBody.find('.quantity_item').each(function () {
                quantity = $(this).val();
                price = $(this).next().next().next().val();
                total_item += parseInt(quantity * price)
            });
            var summary_total = (total_item.format(0, 3, '.', ',')) + '&nbsp;vnđ';
            this.elemBody.find('.cart-total .cart-summ b').eq(0).html(summary_total); // Render summary price
        }
    },

    init: function () {
        this.setup();
        this.add_to_cart();
        this.update_cart();
        this.remove_item_cart();
        this.removeall_item_cart();
        this.calc_total_price();
    }
};

/***
 *
 * @type {{pageContact: Layout.pageContact, elemBody: (jQuery|HTMLElement), init: Layout.init}}
 */
var Layout = {
    elemBody: $('body'),
    pageContact: function () {
        Layout.elemBody.find('.prod-rating .fa-star-o').on('click', function () {
            var self = $(this),
                rate = self.attr('title');
            $('.prod-rating .fa-star-o').each(function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                }
            });
            self.addClass('active');
            Layout.elemBody.find("#rate_select").eq(0).val(rate);

        });
    },
    init: function () {
        this.pageContact();
    }

};
$(document).ready(function () {
    Products.init();
    Checkout.init();
    Layout.init();
});

function insertParam(key, value)
{
    key   = encodeURI(key);
    value = encodeURI(value);

    var kvp = document.location.search.substr(1).split('&');

    var i = kvp.length;
    var x;
    while (i--) {
        x = kvp[i].split('=');

        if (x[0] == key) {
            x[1]   = value;
            kvp[i] = x.join('=');
            break;
        }
    }

    if (i < 0) {kvp[kvp.length] = [key, value].join('=');}

    //this will reload the page, it's likely better to store this until finished
    document.location.search = kvp.join('&');
}

function get_filter(class_name)
{
    var filter = [];
    $('.' + class_name + ':checked').each(function() {
        filter.push($(this).val());
    });
    return filter;
}
function filterProducts() {
    // Get params
    let price_from = $("input[name='price_from']").val();
    let price_to   = $("input[name='price_to']").val();
    let stocks     = get_filter('stocks');
    let sizes      = get_filter('sizes');
    let brands     = get_filter('brands');
    let PATH_FILTER_SEARCH = ajaxcalls_vars.host + '/tim-kiem' + window.location.search;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            $("#page-preloader").show();
        }
    });
    $.ajax({
        type: 'POST',
        url : PATH_FILTER_SEARCH,
        data: {
            price_from: price_from,
            price_to  : price_to,
            stocks    : stocks,
            sizes     : sizes,
            brands    : brands
        },
        success: function (html) {
            console.log(html);
            $('#page-preloader').hide();
        }
    });
    return false; // Not redirect
}

function clearFilter() {

}