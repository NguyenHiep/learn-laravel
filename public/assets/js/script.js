'use strict';

window.lazyLoadPost = function () {
    var offdefault = 50;  //BJLL.threshold;
    var BJLL_options = BJLL_options || {},
      BJLL = {
          _ticking: !1,
          check: function() {
              if (!BJLL._ticking) {
                  BJLL._ticking = !0, void 0 === BJLL.threshold && (void 0 !== BJLL_options.threshold ? BJLL.threshold = parseInt(BJLL_options.threshold) : BJLL.threshold = 200);
                  var e = document.documentElement.clientHeight || body.clientHeight,
                    t = !1,
                    n = document.getElementsByClassName("lazy-hidden");
                  [].forEach.call(n, function(n, a, i) {
                      var s = n.getBoundingClientRect(),
                        offset = parseFloat(n.getAttribute('offset'));
                      if(offset) o = 0 - offset;
                      else o = offdefault;
                      e - s.top + o > 0 && (BJLL.show(n), t = !0);
                  }), BJLL._ticking = !1, t && BJLL.check();
              }
          },
          show: function(e) {
              e.className = e.className.replace(/(?:^|\s)lazy-hidden(?!\S)/g, ""), e.addEventListener("load", function() {
                  e.className += " lazy-loaded", BJLL.customEvent(e, "lazyloaded");
              }, !1);
              var t = e.getAttribute("data-lazy-type");
              e.className += ' loaded';
              if ("image" === t) null !== e.getAttribute("data-lazy-srcset") && e.setAttribute("srcset", e.getAttribute("data-lazy-srcset")), null !== e.getAttribute("data-lazy-sizes") && e.setAttribute("sizes", e.getAttribute("data-lazy-sizes")), e.setAttribute("src", e.getAttribute("data-lazy-src"));

              else if ("bg" === t) {
                  var n = e.getAttribute("data-lazy-src");
                  e.style.backgroundImage = 'url(' + n + ')';
              } else if ("iframe" === t) {
                  var n = e.getAttribute("data-lazy-src");

                  e.setAttribute('src', n);
              } else if ("mp4" === t) {
                  var n = e.getAttribute("data-lazy-src"),
                    a = '<source src="' + n + '" type="video/mp4">';
                  e.innerHTML += a;
              }
          },
          customEvent: function(e, t) {
              var n;
              document.createEvent ? (n = document.createEvent("HTMLEvents")).initEvent(t, !0, !0) : (n = document.createEventObject()).eventType = t, n.eventName = t, document.createEvent ? e.dispatchEvent(n) : e.fireEvent("on" + n.eventType, n);
          }
      };
    window.addEventListener("load", BJLL.check, !1);
    window.addEventListener("scroll", BJLL.check, !1);
    window.addEventListener("resize", BJLL.check, !1);
    document.getElementsByTagName("body").item(0).addEventListener('post-load', BJLL.check, !1);
};

(function($){
    $(document).ready(function(){
        let $window = $(window);
        let hd = $('#header');
        let hh = hd.outerHeight();

        // FIXED HEADER
        /*-----------------------------------------------------------------*/
        function headerSingle() {
            var p;
            if ($('#toppanel').length >0){
                p = $('#toppanel').height();
            }else{
                p = 0;
            }
            if(hd.hasClass('fixe')){
                var ah = $('<div class="afterHeader"> ');
                hd.after(ah.height(hh));
                $(window).scroll(function() {
                    if ($(window).scrollTop() > p) $('#header').addClass('sticky');
                    else $('#header').removeClass('sticky');
                });
            }
        }
        headerSingle();
        // TOGGLECLASS
        /*-----------------------------------------------------------------*/
        $('.toggleClass > .toggle').each(function () {
            $(this).click(function () {
                $(this).parent().toggleClass('active');
            });
        });

        // VIDEO BG
        /*-----------------------------------------------------------------*/
        function resv (l) {
            var w = parseInt(l.width()),
              h = parseInt(l.height()),
              f = l.children(),
              dw = f.attr('width'),
              dh = f.attr('height');
            if (w > h && (h / w < dh / dw)) {
                var hf = (w * dh) / dw;
                var tf = -((hf - h) / 2);
                f.css({ 'width': '', 'height': hf, 'top': tf, 'left': '' });
            } else {
                var wf = (h * dw) / dh;
                var lf = -((wf - w) / 2);
                f.css({ 'width': wf, 'height': '', 'top': '', 'left': lf });
            }
        }

        function resVideo() {
            $(".wrapVideoBg").each(function () {
                resv($(this));
            });
        }

        // MENU MOBILE
        /*-----------------------------------------------------------------*/
        $('.menu-btn').click(function(){
            $('body').toggleClass('showMenu');
        });

        $('.menu-top-header li[class*="children"]').each(function(){
            $(this).children('ul').wrap('<div class="wrapul"></div>');
        });

        var wrapmb = $('.wrap-menu-mb'),
            smb = wrapmb.data('style');
            wrapmb.find('li[class*="children"]').each(function(){
                var p = $(this),
                  idli = p.attr('id'),
                  ul = p.children('ul');
                var btn = $('<span>',{'class':'showsubmenu icon-arrow-3', text : '' });
                p.children('ul').children('li').children('ul').attr('data-parent', idli);
                if(smb === 1){
                    btn.click(function(){
                    if(p.hasClass('parent-showsub')){
                        ul.slideUp(300,function(){
                            p.removeClass('parent-showsub');
                        });
                    }else{
                        ul.slideDown(300,function(){
                            p.addClass('parent-showsub');
                        });
                    }
                    }); p.prepend(btn);
                }else if(smb === 2){
                    btn.click(function(){
                        p.toggleClass('activesubmenu');
                    }); p.prepend(btn);
                    var text = p.children('a').html();
                    var head = $('<div class="menu-head"><h3>'+text+'</h3><span class="back"><i class="icon-arrow-3"></i></span></div>');

                    ul.wrap('<div class="wrapul"></div>');

                    p.children('.wrapul').prepend(head);
                    $('.back').click(function(){
                        $(this).parent().parent().parent().removeClass('activesubmenu');
                    });
                }else {
                    var text = p.children('a').html();
                    var head = $('<div class="menu-head"><h3>'+text+'</h3><span class="back"><i class="icon-arrow-3"></i></span></div>');

                    var id = p.attr('id');

                    var ulp = ul.data('parent');
                    ul.wrap('<div id="w-'+id+'" data-parent="w-'+ulp+'"  class="wrapul"></div>');
                    var wrap = p.children('.wrapul');
                    wrap.prepend(head);


                    wrapmb.append(wrap);

                    btn.click(function(){
                        id = $(this).parent().attr('id');
                        var a = p.closest(".wrapul");
                        if (a.hasClass('outactive')){
                            a.removeClass('outactive').addClass('outactive2');
                        }else{
                            a.addClass('outactive');
                        }
                        wrapmb.children('#w-'+id+'').addClass('outactive');
                    }); p.prepend(btn);


                    $('.back').click(function(){
                        var pr = $(this).parent().parent();
                        id = pr.data('parent');
                        pr.removeClass('outactive');
                        var a = wrapmb.children('#'+id+'');
                        if (id === 'w-undefined'){
                            $('.wrapul.main').removeClass('outactive');
                        }else{
                            a.addClass('outactive').removeClass('outactive2');
                        }

                    });
                }
            });    // append - prepend - after - before

        // EQUAL HEIGHT
        /*-----------------------------------------------------------------*/
            // equalHeight
            function equal() {
                $(".equalHeight").each(function () {
                    var $this = $(this),
                        $equal = $this.find(".equal"),
                        padding = $this.attr('data-padding');
                    if(!padding)   padding = 0 ;
                    if ($this.length > 0) {
                      $equal.imagesLoaded(function () {
                        equalHeight($equal, parseInt(padding));
                      });
                    }
                });
            }
            /* Equal Height good*/
            function equalHeight(className, padding) {
              var tempHeight = 0;
              $(className).each(function () {
                var current = $(this).height();
                if (parseInt(tempHeight) < parseInt(current)) {
                  tempHeight = current;
                }
              });
              $(className).css("height", tempHeight + padding + "px");
            }

        // CLICK SCROLL
        /*-----------------------------------------------------------------*/
            // Click scroll a
              $("a.scrollspy").click(function (event) {
                event.preventDefault();
                var id  = $(this).attr('href'),
                    top = $(id).offset().top;
                $('html, body').animate({
                  scrollTop: top - hh
                  }, 1000);
              });

            // Back-top
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('#back-top').addClass('show');
                } else {
                    $('#back-top').removeClass('show');
                }
            });
            $('#back-top').click(function() {
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });

            $(".like").each(function () {
                $(this).click(function(){
                    $(this).toggleClass('active');
                });
            });

            $(".wstar .over span").each(function () {
                $(this).hover(function(){
                    var s = $(this).data('sync');
                    $('.wstar').children('img').removeClass('active');
                    $('.wstar').children('img.' + s + '').addClass('active');
                });
            });

            $('.box-collapse > .tab > .tab-title').each(function() {
                var btnInfo = $(this).click(function() {
                    btnInfo.next().slideToggle(300);
                    btnInfo.parent().toggleClass('show');
                });
            });

            $('.box-acordion > .tab > .tab-title').each(function(){
                $(this).click(function(){
                    var parent = $(this).parent(),
                        acordion = $(this).parent().parent(),
                        tab = acordion.children('.tab');
                    if (parent.hasClass('show')) {
                        $(this).next().slideToggle(300);
                        parent.removeClass('show');
                    } else {
                        //hide
                        acordion.children('.tab').children('.tab-content').slideUp(300);
                        tab.removeClass('show');
                        //show
                        $(this).next().slideDown(300);
                        parent.addClass('show');
                    }
                });
            });


        // LAZYLOAD
        /*-----------------------------------------------------------------*/
        window.lazyLoadPost();
        // RESPONSIVE
        /*-----------------------------------------------------------------*/

        $window.bind("load", function() {
            equal();
            resVideo();
            $window.resize(function(){
                resVideo();
            });
        });

        $window.resize(function(){
            equal();
        });
    });
})(jQuery);
