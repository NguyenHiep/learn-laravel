"use strict";
$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    },
    beforeSend: function (xhr) {
      $("#page-preloader").show();
    }
  });
  
  quick_view_product();
  compare_product();
});

function quick_view_product() {
  $('.qview-btn').click(function () {
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
          helpers : {
            overlay : {
              locked  : false
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
        
      }).fail(function (jqXHR, textStatus) {
        console.log('Error:', jqXHR);
      });
    }
    
  });
}

function compare_product() {
  $('.prod-i-compare').click(function (event) {
    
    event.preventDefault();
    
    var product_id = $(this).attr('data-id');
    if (typeof product_id !== 'undefined') {
      $.ajax({
        cache: false,
        type: "GET",
        url: ajaxcalls_vars.host + '/product/add-compare/',
        data: { product_id: product_id }
      }).done(function (data) {
        console.log(data);
        $("#page-preloader").hide();
        $("#total_compare").html(data.total_items);
        show_message(data);
      }).fail(function (jqXHR, textStatus) {
        console.log('Error:', jqXHR);
      });
      
    }
    
  });
}