
(function (factory) {
  /* global define */
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define(['jquery'], factory);
  } else if (typeof module === 'object' && module.exports) {
    // Node/CommonJS
    module.exports = factory(require('jquery'));
  } else {
    // Browser globals
    factory(window.jQuery);
  }
}(function ($) {
  
  // Extends plugins for adding hello.
  //  - plugin is external module for customizing.
  $.extend($.summernote.plugins, {
    /**
     * @param {Object} context - context object has status of editor.
     */
    'medias': function (context) {
      var self = this;
      
      // ui has renders to build ui elements.
      //  - you can create a button with `ui.button`
      var ui = $.summernote.ui;
      
      // add hello button
      context.memo('button.medias', function () {
        // create button
        var button = ui.button({
          contents: '<i class="fa fa-picture-o"/> Thư viện ảnh',
          tooltip: 'Medias',
          click: function () {
            
            active_items_medias();
            
          },
          
        });
        
        // create jQuery object from button instance.
        var $medias = button.render();
        return $medias;
      });
  
      // Fuction active item select in medias
      var active_items_medias = function () {
        var elemBody = $("body");
    
        // Show popup medias
        $('#medias_contents_libraries').modal('toggle');
        
        // Begin medias action select image attachment
        elemBody.find(".medias_attachment_content").unbind('click').click(function () {
          var $elem = $(this);
          $elem.addClass('selected details').siblings().removeClass('selected details');
          // get image select
          var src_img = $elem.attr('data-src');
          
          if (!empty(src_img)) {
            var img_select = ajaxcalls_vars.host + src_img;
            
            elemBody.find(".js-action-insert-content-image").on('click', function () {
              // Insert content to editor
              context.invoke('editor.insertImage', img_select);
  
              // Insert done --> reset list items
              src_img = null;
              $elem.removeClass('selected details');
              return false;
            })
            
          }
        });
      }
      
      //
      
      // This events will be attached when editor is initialized.
      this.events = {
        // This will be called after modules are initialized.
        'summernote.init': function (we, e) {
          console.log('summernote initialized', we, e);
        },
        // This will be called when user releases a key on editable.
        'summernote.keyup': function (we, e) {
          console.log('summernote keyup', we, e);
        }
      };
      
      // This methods will be called when editor is destroyed by $('..').summernote('destroy');
      // You should remove elements on `initialize`.
      this.destroy = function () {
        this.$panel.remove();
        this.$panel = null;
      };
      
      
    }
  });
  
  function empty(str) {
    return str === undefined || str === false || str === null || str.length === 0 || typeof(str) === "object" && Object.keys(str).length === 0;
  }
}));
