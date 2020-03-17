(function ($) {
    $(document).ready(function () {
        function itemOwl(owl,responsive,margin,autospeed,dataout,datain) {
            owl.owlCarousel({
                navText: ["<i class='icon-arrow-1'></i>","<i class='icon-arrow-2'></i>"],
                nav:(owl.hasClass('s-nav') ? true : false),
                dots:(owl.hasClass('s-dots') ? true : false),
                loop: owl.hasClass('s-loop') ? true : false,
                autoplay: owl.hasClass('s-auto') ? true : false,
                autoplayHoverPause:true,
                center: owl.hasClass('s-center') ? true : false,
                autoWidth: (owl.hasClass('s-width') ? true : false),
                autoHeight: (owl.hasClass('s-height') ? true : false),
                lazyLoad:true,
                video:(owl.hasClass('s-video') ? true : false),
                mouseDrag:(owl.hasClass('s-drag') ? false :true),                
                autoplayTimeout: (autospeed ? parseInt(autospeed) : 5000),                
                animateOut: dataout,
                animateIn: datain,       
                margin: parseInt(margin),
                responsive:{
                    0:{
                        items:parseInt(responsive[3])
                    },
                    576:{
                        items:parseInt(responsive[2])
                    },
                    768:{
                        items:parseInt(responsive[1])
                    },
                    992:{
                        items:parseInt(responsive[0])
                    }
                }
            })            
        }
        // Responsive OWL    
        function ResOwlSlider() {
            $(".owl-carousel").each(function () {
                var owl = $(this),
                    responsive =  owl.attr('data-res'),
                    margin =  owl.attr('data-margin'),  
                    autospeed = owl.attr('data-autospeed'), 
                    dataout = owl.attr('data-out'),
                    datain = owl.attr('data-in'); 
                if(!responsive) { responsive = '1,1,1,1'; }
                responsive = responsive.split(',');
                if(!margin) { margin = '0'; }
                owl.imagesLoaded(function(){    
                    itemOwl(owl,responsive,margin,autospeed,dataout,datain);
                });
            });    
        }        
        ResOwlSlider();    


        // Responsive OWL    
        function SynOwlSlider() {
            $(".wrap-syn-owl").each(function () {
                var $this = $(this);
                var sync1 = $this.find(".syn-slider-1");
                var sync2 = $this.find(".syn-slider-2");
                //var syncedSecondary = false;
                  sync1.on('changed.owl.carousel', syncPosition);
                  // sync2.on('initialized.owl.carousel', function () {
                  //     sync2.find(".owl-item").eq(0).addClass("current");
                  //   }).on('changed.owl.carousel', syncPosition2);

                  function syncPosition(el) {
                    var count = el.item.count-1;
                    var current = Math.round(el.item.index - (el.item.count/2) - .5);
                    
                    if(current < 0) {
                      current = count;
                    }
                    if(current > count) {
                      current = 0;
                    }
                    //end block
                    sync2
                      .find(".owl-item")
                      .removeClass("current")
                      .eq(current)
                      .addClass("current");
                    var onscreen = sync2.find('.owl-item.active').length - 1;
                    var start = sync2.find('.owl-item.active').first().index();
                    var end = sync2.find('.owl-item.active').last().index();
                    
                    if (current.length>0 && current > end) { // current.length>0 && 
                      sync2.data('owl.carousel').to(current, 100, true);
                    }
                    if (current.length>0 && current < start) { // current.length>0 && 
                      sync2.data('owl.carousel').to(current - onscreen, 100, true);
                    }
                  }
                  // function syncPosition2(el) {
                  //     var number = el.item.index;
                  //     sync1.data('owl.carousel').to(number, 100, true);
                  // }

                  sync2.on("click", ".owl-item", function(e){
                    e.preventDefault();
                    var number = $(this).index();
                    sync1.data('owl.carousel').to(number, 300, true);
                  });
            });    
        }        
        $(window).bind("load", function() {
           SynOwlSlider();   
            $(".nav-middle-img").each(function () {  
                var h = $(this).find('.owl-item:first-child .img').outerHeight();
                $(this).find('.owl-nav').css('top',h/2);         
            });              
        });     
    });
})(jQuery); 