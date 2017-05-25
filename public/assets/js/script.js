var $ = jQuery.noConflict();
$(function () {
	/** ====================
	 * #.# Plugin Slick
	 * Note: "Chefsay"
	 ** ====================
	 */
	$('.slideshow').slick({
      dots: true,  
	  infinite: false,
	  autoplay: true,
	  speed: 300,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    
  ]
  });
  
  
  /** ====================
	 * #.# Plugin Slick
	 * Note: "Chefsay"
	 ** ====================
	 */
	$('.slide-product').slick({
       dots: false,  
	  infinite: false,
	  autoplay: true,
	  speed: 300,
	  slidesToShow: 6,
	  slidesToScroll: 6,
	  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    
  ]
  });
  
  

   



	/** ====================
	 * #.# Back to top
	 * Note: "footer index"
	 ** ====================
	 */ 
	$(window).scroll(function() {
		if ($(this).scrollTop() > 250) {
			$('#gototop').fadeIn(500); 
		} else {
			$('#gototop').fadeOut(500); 
		}
	});
	$('#gototop').on('click',function(e) {
		e.preventDefault();
		$('html, body').animate({scrollTop: 0}, 'slow');
	})

  
  /** ====================
	 * #.# Back to top
	 * Note: "footer index"
	 ** ====================
	 */ 
	$.fn.showMap = function(options, addr){
	  options = $.extend({
		navigationControl: false,
		mapTypeControl: false,
		scaleControl: false,
		draggable: false,
		scrollwheel: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	  }, options);
	  var map = new google.maps.Map(document.getElementById($(this).attr('id')), options);
	  // code cut from this example as not relevant
	};
  
  
  
  
 
  
  
  
});	