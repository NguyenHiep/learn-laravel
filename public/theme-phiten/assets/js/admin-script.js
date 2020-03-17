(function($){
    $(document).ready(function(){
        // var block = $('[data-name="block"]');
        // if(block) {
        //     $('#post-body-content #postdivrich').hide();
        // }



        

        // $('.acf-field-select[data-name="layh"]').each(function () {
        //     var s = $(this).find('select'),
        //         p = $(this).parent(),
        //         c = p.children('[data-name="c"]'),
        //         input = c.find('input');
        //     s.change(function () {
        //         var v = s.val(),
        //             vinput = input.val();
        //             console.log(v);
        //         if(v==0) {
        //             vinput = vinput.replace('owl-carousel ', 'row '); 
        //             input.val(vinput);
        //         }else {
        //             vinput = vinput.replace('row ', 'owl-carousel '); 
        //             input.val(vinput);
        //         }
        //     });
        // });
        // Change Class


      
        function rtab(e) {   
            e.each(function () {
                var tab = e.children('.rtab'),
                    itab  = tab.children(),
                    ctab = e.children('.einner');

                tab.children(':eq(0)').addClass('active');
                ctab.children().hide();
                ctab.children(':eq(0)').show();

                itab.each(function () {
                    $(this).click(function () {
                        var index = $(this).index();

                        tab.children().removeClass('active');
                        $(this).addClass('active');

                        ctab.children().hide();
                        ctab.children(':eq('+index+')').show();

             
                    });
                });
            });   
        }



        function value(e,s) {  
            var c = e.find('[data-name="sec_content"] > .acf-input > .acf-fields'),
                v = s.val();
                c.children().hide();
                c.children('[data-name="'+v+'"]').show();
        }

        var section = $(' [data-name="block"]  .acf-input > .acf-repeater > table.acf-table > tbody > tr.acf-row > td.acf-fields');

        if(section.length>0){
            section.each(function () {
                var e = $(this),
                    tx='',
                    s = e.find('[data-name="sec_content"] [data-name="selectc"] select'),
                    t = e.find('[data-name="sec_heading"] [data-name="t"] input').val(),
                    h = $('<h2 class="titleblock"> <span class="text">Input title -> Save (Update) -> Click here -> (:..:)</span>  <div class="sty"><span class="bgimg" data-text="Background image"></span><span class="bgcl" data-text="Background color"></span><span class="cl" data-text="Color"></span><span class="fs" data-text="Font size"></span><span data-text="Status" class="status"></span></div> </h2>').on('click',function(){
                        $(this).parent().toggleClass('hidecontent');
                    });
                    tab = $('<div class="rtab"><div class="item active"><span>Block - Heading</span></div><div class="item"><span>Style block</span></div><div class="item"><span>Content</span></div></div>');
                e.wrapInner('<div class="einner"></div>').prepend(tab);


                e.prepend(h); 

                if(t) {
                    if(t.length>0)  tx=t;         
                    if(tx.length>0){
                        //e.addClass('hidecontent');
                        if(tx.length>50){tx = tx.slice(0, 50)+'...';}
                        h.children('.text').html(tx);
                    }
                }

                value(e,s);
                s.on('change',function() {
                    value(e,s);
                });    

                // Tab
                rtab(e); 
                // Style
                var sh = e.find('[data-name="sec_heading"] [data-name="sh"] .acf-switch'),
                    sty = h.children('.sty'),
                    urlimg = e.find('[data-name="sec_style"] [data-name="bgimg"] [data-name="image"]').attr('src'),
                    bgcl = e.find('[data-name="sec_style"] [data-name="bgcl"] .acf-color-picker > input').attr('value'),
                    color = e.find('[data-name="sec_style"] [data-name="cl"] .acf-color-picker > input').attr('value'),
                    fs = e.find('[data-name="sec_style"] [data-name="fs"] .acf-input-wrap > input').val();

 
                if(sh.hasClass('-on')) 
                    sty.children('.status').addClass('active');
                if(urlimg) 
                    sty.children('.bgimg').addClass('active').css('background-image','url(' + urlimg + ')');
                if(bgcl)
                    sty.children('.bgcl').addClass('active').css('background-color',bgcl);
                if(color)
                    sty.children('.cl').addClass('active').css('background-color',color);
                if(fs)
                    sty.children('.fs').addClass('active').html(fs).css('font-size',fs+'px');


            });
        }

                   
    } );
})( jQuery );
