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
            // Show popup medias
            $('#medias_libraries').modal('toggle');
            //active_items_medias();
            //var src_img = get_items_selected();
            var elemBody = $("body");
            // Begin medias action select image attachment
            elemBody.find(".medias_attachment").on("click", function () {
              var $elem = $(this);
              elemBody.find('.medias_attachment').each(function (i) {
                var $elem = $(this);
                if ($elem.hasClass('selected') || $elem.hasClass('details')) {
                  $elem.removeClass('selected');
                  $elem.removeClass('details');
                }

              });
              $elem.addClass('selected details');
            });
            var src_img = elemBody.find("li.medias_attachment").filter(".selected").attr('data-src');
            if(!empty(src_img)){
              var img_select = ajaxcalls_vars.host + src_img;
              // Insert content to editor
              context.invoke('editor.insertImage', img_select);
            }

          },

        });

        // create jQuery object from button instance.
        var $medias = button.render();
        return $medias;
      });

      // Fuction active item select in medias
      var active_items_medias = function () {
        var elemBody = $("body");
        // Begin medias action select image attachment
        elemBody.find(".medias_attachment").on("click", function () {
          var $elem = $(this);
          elemBody.find('.medias_attachment').each(function (i) {
            var $elem = $(this);
            if ($elem.hasClass('selected') || $elem.hasClass('details')) {
              $elem.removeClass('selected');
              $elem.removeClass('details');
            }

          });
          $elem.addClass('selected details');
        });
      }
    
      // Get items select
      var get_items_selected = function () {
        var elemBody = $("body"),
            src = elemBody.find("li.medias_attachment").filter(".selected").attr('data-src');
        if (!empty(src)) {
          return src;
        }
        return null;
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
