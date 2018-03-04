"use strict";
/**
 * Object product js
 * @type {{elemBody: (*), setup: Products.setup, quick_view_product: Products.quick_view_product, compare_product: Products.compare_product, remove_item_compare: Products.remove_item_compare, change_quantity: Products.change_quantity, plus_quantity: Products.plus_quantity, minus_quantity: Products.minus_quantity, check_number_input: Products.check_number_input, init: Products.init}}
 */
var Products = {
  elemBody: $('body'),
  setup: function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      },
      beforeSend: function (xhr) {
        $("#page-preloader").show();
      }
    });
  },
  
  quick_view_product : function () {
    this.elemBody.find('.qview-btn').on("click", function (e) {
      e.preventDefault();
      var product_id = $(this).attr('data-id');
      if (typeof product_id !== 'undefined') {
        $.ajax({
          cache: false,
          type: "GET",
          url: ajaxcalls_vars.host + '/product/quick-view/',
          data: {product_id: product_id}
        }).done(function (data) {
          $("#page-preloader").hide();
          $('.qview-modal').html(data);
          $('.qview-btn').fancybox({
            content: $('.qview-modal'),
            padding: 0,
            helpers: {
              overlay: {
                locked: false
              }
            }
          });
          if ($('.prod-slider-car').length > 0) {
            $('.prod-slider-car').each(function () {
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
        }).fail(function (jqXHR, textStatus) {
          console.log('Error:', jqXHR);
        });
      }
    
    });
  },
  
  compare_product : function () {
    this.elemBody.find('.prod-i-compare').on("click", function (e) {
      e.preventDefault();
      var product_id = $(this).attr('data-id');
      if (typeof product_id !== 'undefined') {
        $.ajax({
          cache: false,
          type: "GET",
          url: ajaxcalls_vars.host + '/compares/add/',
          data: {product_id: product_id}
        }).done(function (data) {
          $("#page-preloader").hide();
          $("#total_compare").html(data.total_items);
          show_message(data);
        }).fail(function (jqXHR, textStatus) {
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
          url: ajaxcalls_vars.host + '/compares/remove/',
          data: {product_id: product_id}
        }).done(function (data) {
          $("#page-preloader").hide();
          show_message(data);
          if (typeof(data.redirect) !== 'undefined') {
            window.location.href = data.redirect;
          }
        }).fail(function (jqXHR, textStatus) {
          console.log('Error:', jqXHR);
        })
      }
    });
  },

	change_quantity: function () {
		this.elemBody.find('.quantity_item').on("change", function (e) {
			e.preventDefault();
			var quantity = $(this).val();
			if (Products.check_number_input(quantity)) { // Nếu ký tự là số thì thực hiện
				if (quantity > 0) {
					//TODO: Begin code change quantity items

					console.log(quantity);
				} else {
					$(this).focus();
					show_message({
						'status': 'error',
						'message': 'Số lượng phải > 0'
					});
				}
			} else {
				$(this).focus();
				show_message({
					'status': 'error',
					'message': 'Chỉ chấp nhận giá trị là chữ số'
				});
			}  // End if (result)

		});
	},

	plus_quantity: function () {
		this.elemBody.find('.cart-plus').on("click", function (e) {
				var quantity = $(this).prev().val();
				if(Products.check_number_input(quantity) && quantity > 0){
					quantity++;
					$(this).prev().val(quantity);
					$('.quantity_item').trigger("change");
				}

		});
	},

	minus_quantity: function () {
		this.elemBody.find('.cart-minus').on("click", function (e) {
			var quantity = $(this).prev().prev().val();
			if(Products.check_number_input(quantity) && quantity > 1){
				quantity--;
				$(this).prev().prev().val(quantity);
				$('.quantity_item').trigger("change");
			}
		});
	},

	check_number_input: function (val) {
		var reg = new RegExp('^\\d+$'); // Link ex: https://www.w3schools.com/jsref/jsref_regexp_test.asp
		return reg.test(val);
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
  }
}

var Checkout = {
	elemBody: $('body'),
	setup: function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			},
			beforeSend: function (xhr) {
				$("#page-preloader").show();
			}
		});
	},

  add_to_cart : function () {
		//TODO: Check lại trường hợp add sản phẩm có số lượng --> hiện tại bị sai
		this.elemBody.find('.prod-i-buy').on("click", function (e) {
			e.preventDefault();
			var product_id = $(this).attr('data-id');
			var quantity   = Checkout.elemBody.find("quantity_item").val();
			if (typeof quantity !== 'undefined') {
				quantity   = Checkout.elemBody.find("quantity_item").val();
			}else{
				quantity = 1;
			}
			if (typeof product_id !== 'undefined') {
				$.ajax({
					cache: false,
					type: "POST",
					url: ajaxcalls_vars.host + '/checkout/addtocart/',
					data: {
						_token			: ajaxcalls_vars.token,
						product_id	: product_id,
						quantity		: quantity
					}
				}).done(function (data) {
					$("#page-preloader").hide();
					$("#total_cart").html(data.total_items);
					show_message(data);
				}).fail(function (jqXHR, textStatus) {
					console.log('Error:', jqXHR);
				});

			}

		});
	},
  remove_item_cart : function () {
		this.elemBody.find('.cart-remove').on("click", function (e) {
			e.preventDefault();
			var product_id = $(this).attr('data-id'),
			parent_item_tr = $(this).parent().parent();

			if (typeof product_id !== 'undefined' && Products.check_number_input(product_id)) {
				$.ajax({
					cache: false,
					type: "POST",
					url: ajaxcalls_vars.host + '/checkout/removecart/',
					data: {
						_token			: ajaxcalls_vars.token,
						product_id	: product_id,
					}
				}).done(function (data) {
					console.log(parent_item_tr);
					$("#page-preloader").hide();
					show_message(data);
					parent_item_tr.remove();
					if (typeof(data.redirect) !== 'undefined') {
						window.location.href = data.redirect;
					}
				}).fail(function (jqXHR, textStatus) {
					console.log('Error:', jqXHR);
				})
			}

		});
	},
  removeall_item_cart : function () {
		this.elemBody.find('.cart-clear').on("click", function (e) {
			e.preventDefault();
				$.ajax({
					cache: false,
					type: "POST",
					url: ajaxcalls_vars.host + '/checkout/removeallcart/',
					data: {
						_token			: ajaxcalls_vars.token,
						delete_all	: true,
					}
				}).done(function (data) {
					$("#page-preloader").hide();
					show_message(data);
					if (typeof(data.redirect) !== 'undefined') {
						window.location.href = data.redirect;
					}
				}).fail(function (jqXHR, textStatus) {
					console.log('Error:', jqXHR);
				})

		});
	},

	init: function () {
		this.setup();
		this.add_to_cart();
		this.remove_item_cart();
		this.removeall_item_cart()
	}
}

function change_cal_sum() {

}
$(document).ready(function () {
  Products.init();
	Checkout.init();
});