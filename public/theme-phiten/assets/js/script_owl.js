'use strict';

(function($) {
  $(document).ready(function() {
    function itemOwl(owl, responsive, margin, autoSpeed, dataOut, dataIn) {
      owl.owlCarousel({
        navText: [
          '<i class=\'icon-arrow-1\'></i>',
          '<i class=\'icon-arrow-2\'></i>'],
        nav: !!owl.hasClass('s-nav'),
        dots: !!owl.hasClass('s-dots'),
        loop: !!owl.hasClass('s-loop'),
        autoplay: !!owl.hasClass('s-auto'),
        autoplayHoverPause: true,
        center: !!owl.hasClass('s-center'),
        autoWidth: !!owl.hasClass('s-width'),
        autoHeight: !!owl.hasClass('s-height'),
        lazyLoad: true,
        video: !!owl.hasClass('s-video'),
        mouseDrag: !owl.hasClass('s-drag'),
        autoplayTimeout: (autoSpeed ? parseInt(autoSpeed) : 5000),
        animateOut: dataOut,
        animateIn: dataIn,
        margin: parseInt(margin),
        responsive: {
          0 : {
            items: parseInt(responsive[3]),
          },
          576: {
            items: parseInt(responsive[2]),
          },
          768: {
            items: parseInt(responsive[1]),
          },
          992: {
            items: parseInt(responsive[0]),
          },
        },
      });
    }

    // Responsive OWL
    function resOwlSlider() {
      $('.owl-carousel').each(function() {
        var owl = $(this),
            responsive = owl.attr('data-res'),
            margin = owl.attr('data-margin'),
            autoSpeed = owl.attr('data-autospeed'),
            dataOut = owl.attr('data-out'),
            dataIn = owl.attr('data-in');
        if (!responsive) { responsive = '1,1,1,1'; }
        responsive = responsive.split(',');
        if (!margin) { margin = '0'; }
        owl.imagesLoaded(function() {
          itemOwl(owl, responsive, margin, autoSpeed, dataOut, dataIn);
        });
      });
    }

    resOwlSlider();

    // Responsive OWL
    function synOwlSlider() {
      $('.wrap-syn-owl').each(function() {
        var $this = $(this);
        var sync1 = $this.find('.syn-slider-1');
        var sync2 = $this.find('.syn-slider-2');
        sync1.on('changed.owl.carousel', syncPosition);

        function syncPosition(el) {
          var count = el.item.count - 1;
          var current = Math.round(el.item.index - (el.item.count / 2) - 0.5);

          if (current < 0) {
            current = count;
          }
          if (current > count) {
            current = 0;
          }
          //end block
          sync2.find('.owl-item').removeClass('current').eq(current).addClass('current');
          var owlItemActive = '.owl-item.active';
          var onscreen = sync2.find(owlItemActive).length - 1;
          var start = sync2.find(owlItemActive).first().index();
          var end = sync2.find(owlItemActive).last().index();

          if (current.length > 0 && current > end) { // current.length>0 &&
            sync2.data('owl.carousel').to(current, 100, true);
          }
          if (current.length > 0 && current < start) { // current.length>0 &&
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
          }
        }

        sync2.on('click', '.owl-item', function(e) {
          e.preventDefault();
          var number = $(this).index();
          sync1.data('owl.carousel').to(number, 300, true);
        });
      });
    }

    $(window).bind('load', function() {
      synOwlSlider();
    });
  });
})(jQuery);
