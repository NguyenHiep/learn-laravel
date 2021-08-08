(function ($) {
    $(document).ready(function () {
        var $window = $(window);


/*
$('.custom_paging').slick({
    autoplay: true,
    dots: true,
    dotsClass: 'custom_paging',
    customPaging: function (slider, i) {
        console.log(slider);
        return (i + 1) + '/' + slider.slideCount;
    }    
});

*/


    // Responsive Slick    
    function ResSlickSlider() {
        $(".SlickSlider").each(function () {
            var $slider = $(this),
                responsive =  $slider.attr('data-res'),
                speed = $slider.attr('data-speed'),
                autospeed = $slider.attr('data-autospeed');
            if(!responsive) { responsive = '1,1,1,1,1'; }
            responsive = responsive.split(',');
            $slider.imagesLoaded(function(){    
                $slider.slick({
                    nextArrow: '<span class="nextArrow"><i class="icon-arrow-2"></i></span>',
                    prevArrow: '<span class="prevArrow"><i class="icon-arrow-3"></i></span>',    
                    infinite: $slider.hasClass('s-loop') ? true : false,
                    fade: ($slider.hasClass('s-fade') ? true : false),                                   
                    adaptiveHeight: ($slider.hasClass('s-height') ? true : false),
                    arrows: ($slider.hasClass('s-nav') ? true : false),
                    dots: ($slider.hasClass('s-dots') ? true : false),
                    speed: (speed ? parseInt(speed) : 400),
                    variableWidth: ($slider.hasClass('s-width') ? true : false),
                    autoplaySpeed: (autospeed ? parseInt(autospeed) : 5000),
                    autoplay: $slider.hasClass('s-auto') ? true : false,
                    centerMode: $slider.hasClass('s-center') ? true : false,
                    lazyLoad:($slider.hasClass('s-lazy') ? 'ondemand' : false),
                    rtl: $slider.hasClass('s-rtl') ? true : false,


                    slidesToShow: parseInt(responsive[0]),
                      responsive: [
                        {
                          breakpoint: 1200,
                          settings: {
                            slidesToShow: parseInt(responsive[1]),
                            arrows: false,
                            autoplay:true
                          }
                        },
                        {
                          breakpoint: 992,
                          settings: {
                            slidesToShow: parseInt(responsive[2]),
                            arrows: false,
                            autoplay:true
                          }
                        },                        
                        {
                          breakpoint: 768,
                          settings: {
                            slidesToShow: parseInt(responsive[3]),
                            arrows: false,
                            autoplay:true   
                          }
                        },
                        {
                          breakpoint: 480,
                          settings: {
                            slidesToShow: parseInt(responsive[4]),
                            arrows: false,
                            autoplay:true     
                          }
                        }
                      ]
                });
            });
        });    
    }        
    ResSlickSlider();    


    // Sync Slick
    function OsProductThumbnailSlider() {
        $(".wrap-syn-slick").each(function () {
            var $this = $(this),
                $slider01 = $this.find(".syn-slider-1"),
                $slider02 = $this.find(".syn-slider-2");


            var s02responsive =  $slider02.attr('data-res').split(',');
            var s02autospeed = $slider02.attr('data-autospeed');
            var s02speed = $slider02.attr('data-speed');
            var s01autospeed = $slider01.attr('data-autospeed');
            var s01speed = $slider01.attr('data-speed');
            
            $slider01.imagesLoaded(function(){    
                $slider01.slick({
                    swipeToSlide: true,
                     nextArrow: '<span class="nextArrow"><i class="icon-arrow-2"></i></span>',
                    prevArrow: '<span class="prevArrow"><i class="icon-arrow-3"></i></span>',    
                    infinite: $slider01.hasClass('s-loop') ? true : false,
                    fade: ($slider01.hasClass('s-fade') ? true : false),                                   
                    adaptiveHeight: ($slider01.hasClass('s-height') ? true : false),
                    arrows: ($slider01.hasClass('s-nav') ? true : false),
                    dots: ($slider01.hasClass('s-dots') ? true : false),
                    speed: (s01speed ? parseInt(s01speed) : 400),
                    variableWidth: ($slider01.hasClass('s-width') ? true : false),
                    autoplaySpeed: (s01autospeed ? parseInt(s01autospeed) : 5000),
                    autoplay: $slider01.hasClass('s-auto') ? true : false,
                    vertical: ($slider01.hasClass('s-vertical') ? true : false),
                    verticalSwiping: ($slider01.hasClass('s-vertical') ? true : false),
                    infinite:  true,
                    lazyLoad:($slider01.hasClass('s-lazy') ? 'ondemand' : false),
                    asNavFor: $slider02
                });
            });
            $slider02.slick({
                    swipeToSlide: true,
                    nextArrow: '<span class="nextArrow"><i class="icon-arrow-2"></i></span>',
                    prevArrow: '<span class="prevArrow"><i class="icon-arrow-3"></i></span>',    
                    infinite: $slider02.hasClass('s-loop') ? true : false,
                    fade: ($slider02.hasClass('s-fade') ? true : false),                                   
                    adaptiveHeight: ($slider02.hasClass('s-height') ? true : false),
                    arrows: ($slider02.hasClass('s-nav') ? true : false),
                    dots: ($slider02.hasClass('s-dots') ? true : false),
                    speed: (s02speed ? parseInt(s02speed) : 400),
                    variableWidth: ($slider02.hasClass('s-width') ? true : false),
                    autoplaySpeed: (s02autospeed ? parseInt(s02autospeed) : 5000),
                    autoplay: $slider02.hasClass('s-auto') ? true : false,
                    vertical: ($slider02.hasClass('s-vertical') ? true : false),
                    verticalSwiping: ($slider02.hasClass('s-vertical') ? true : false),
                    centerMode: $slider02.hasClass('s-center') ? true : false,
                    slidesToShow: parseInt(s02responsive[0]),
                    lazyLoad:($slider02.hasClass('s-lazy') ? 'ondemand' : false), 
                    asNavFor: $slider01,
                    focusOnSelect: true,
                      responsive: [
                        {
                          breakpoint: 1200,
                          settings: {
                            slidesToShow: parseInt(s02responsive[1]),
                            arrows: false,
                            autoplay:true
                          }
                        },
                        {
                          breakpoint: 992,
                          settings: {
                            slidesToShow: parseInt(s02responsive[2]),
                            arrows: false,
                            autoplay:true
                          }
                        },                        
                        {
                          breakpoint: 768,
                          settings: {
                            slidesToShow: parseInt(s02responsive[3]),
                            arrows: false,
                            autoplay:true 
                          }
                        },
                        {
                          breakpoint: 480,
                          settings: {
                            slidesToShow: parseInt(s02responsive[4]),
                            arrows: false,
                            autoplay:true,
                            vertical: false,
                            verticalSwiping: false  
                          }
                        }
                      ]                
            });


        });
    }

    OsProductThumbnailSlider();     

    });
})(jQuery); 