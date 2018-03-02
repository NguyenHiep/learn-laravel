"use strict";
/***
 * Object products js
 * @type {{elemBody: (*), setup: Products.setup, quick_view_product: Products.quick_view_product, compare_product: Products.compare_product, remove_item_compare: Products.remove_item_compare, init: Products.init}}
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
          url: ajaxcalls_vars.host + '/product/add-compare/',
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
          url: ajaxcalls_vars.host + '/product/remove-compare/',
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
  
  init: function () {
    this.setup();
    this.quick_view_product();
    this.compare_product();
    this.remove_item_compare();
  }
}


$(document).ready(function () {
  Products.init();
});