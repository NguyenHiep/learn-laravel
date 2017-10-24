;(function () {
  "use strict";

  $(document).ready(function () {
    var elemBody = $("body"),
        elemArticle = elemBody.find("#article");
    elemArticle.find(".js-action-list-checkboxes").each(function () {
      var self = $(this),
          parent = self.parents("table").eq(0),
          iptstr = 'input[name^="action_ids"]:visible',
          span_parent = $('.checker > span');
      self.on("click", function () {

        if (self.prop("checked")) {
          parent.find(iptstr).prop("checked", true);
          span_parent.addClass("checked");
        } else {
          parent.find(iptstr).prop("checked", false);
          span_parent.removeClass("checked");
        }
      });
      $(parent).on("click", iptstr, function () {
        if ($(this).prop("checked")) {
          if (parent.find(iptstr).not(":checked").length === 0) {
            self.prop("checked", true);
            span_parent.addClass("checked");
          }
        } else {
          self.prop("checked", false);
          span_parent.removeClass("checked");
        }
      });
    });
    
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

    // Insert image post
    elemBody.find(".js-action-insert-image").on('click', function () {
      var id = elemBody.find("li.medias_attachment").filter(".selected").attr('data-id'),
          src = elemBody.find("li.medias_attachment").filter(".selected").attr('data-src');

      if (!empty(id)) {
        if(elemBody.find("#posts_medias_id").length >0 ){
          elemBody.find("#posts_medias_id").val(id);
        }
        
        if(elemBody.find("#page_medias_id").length >0 ){
          elemBody.find("#page_medias_id").val(id);
        }
      }

      if (!empty(src)) {
        var img = '<img src="' + src + '" draggable="false" alt="" class="img-responsive">';
        elemArticle.find("#img_featured").html(img);
      }
      // Close modal :)
      elemBody.find('#medias_libraries').modal('toggle');

    });
  });

})();

/**
 * Check empty value
 * @param str
 * @returns {boolean}
 */
function empty(str) {
  return str === undefined || str === false || str === null || str.length === 0 || typeof(str) === "object" && Object.keys(str).length === 0;
}
