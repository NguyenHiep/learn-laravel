"use strict";
$(document).ready(function () {
  $('.qview-btn').click(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      },
      beforeSend: function(xhr) {
        $("#page-preloader").show();
      }
    });
    var product_id = $(this).attr('data-id');
    if (typeof product_id !== 'undefined') {
      
      $.ajax({
        type: "GET",
        url: ajaxcalls_vars.host + '/product/quick-view/' + product_id,
        success: function (result) {
          $('.qview-modal').html(result);
          $("#page-preloader").hide();
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
        },
        error: function (result) {
          console.log('Error:', result);
        }
      });
    }
    
  });
});