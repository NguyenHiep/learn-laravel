"use strict";

let Actions = function () {
  let elemBody = $("body"),
    elemArticle = elemBody.find("#article");
  let handleActiveCheckBox = function () {
    elemArticle.find(".js-action-list-checkboxes").each(function () {
      let self = $(this),
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
  };
  
  // Begin medias action select image attachment
  let handleMediasAttachment = function () {
    elemBody.find(".medias_attachment").on("click", function () {
      let $elem = $(this);
      elemBody.find('.medias_attachment').each(function (i) {
        let $elem = $(this);
        if ($elem.hasClass('selected') || $elem.hasClass('details')) {
          $elem.removeClass('selected');
          $elem.removeClass('details');
        }
        
      });
      $elem.addClass('selected details');
    });
  };
  
  // Insert image post
  let handleInsertImageAttachment = function () {
    elemBody.find(".js-action-insert-image").on('click', function () {
      let id = elemBody.find("li.medias_attachment").filter(".selected").attr('data-id'),
        src = elemBody.find("li.medias_attachment").filter(".selected").attr('data-src');
      
      if (!empty(id)) {
        if (elemBody.find("#posts_medias_id").length > 0) {
          elemBody.find("#posts_medias_id").val(id);
        }
        
        if (elemBody.find("#page_medias_id").length > 0) {
          elemBody.find("#page_medias_id").val(id);
        }
      }
      
      if (!empty(src)) {
        let img = '<img src="' + src + '" draggable="false" alt="" class="img-responsive">';
        elemArticle.find("#img_featured").html(img);
      }
      // Close modal :)
      elemBody.find('#medias_libraries').modal('toggle');
      
    });
  };

  let handleSearchKeyword = function () {
    elemArticle.find("input[name=search_keyword]").on("change", function () {
      let self = $(this),
        val_text = self.val(),
        button = elemBody.find(".js-action-search");
      if (!empty(val_text)) {
        button.removeAttr("disabled");
      } else {
        button.attr("disabled", "disabled");
      }
    });
    
  };
  let handleDeleteRecord = function () {
    $(document).ready(function () {
      elemArticle.find(".js-action-delete-record").on("click", function (e) {
        e.preventDefault(); // does not go through with the link.
        let result = confirm('Want to delete?')
        if (!result) {
          return
        }
        let self = $(this);
        $.ajax({
          type: "post",
          cache: false,
          data: {
            _method: self.data('method'),
            _token: ajaxcalls_lets.token,
          },
          url: self.attr('href'),
          success: function (data) {
            show_message(data);
            if (data.status === "success") {
              self.parent().parent().parent().hide("slow");
            }
          },
          error: function (xhr, status, error) {
            show_message(error);
          }
        });

      });
    });
  };
  
  return {
    initCheckBox: function () {
      handleActiveCheckBox(); // handles horizontal menu
    },
    initMedias: function () {
      handleMediasAttachment();
      handleInsertImageAttachment();
    },
    initFilter:function () {
      handleSearchKeyword();
      handleDeleteRecord();
    },
    init: function () {
      this.initCheckBox();
      this.initFilter();
      this.initMedias();
    },
  };
}();

/**
 * Check empty value
 * @param str
 * @returns {boolean}
 */
function empty(str) {
  return str === undefined || str === false || str === null || str.length === 0 || typeof(str) === "object" && Object.keys(str).length === 0;
}

/**
 * URL Interpret and return its components
 *
 * @param  string url       The URL to parse
 * @param  string component The URL component
 * @return mixed  Returns the components.
 */
function parse_url(url, component) {
  let elem = document.createElement("a");
  
  elem.href = url;
  
  let searches = elem.search.substring(1).split("&"),
    queries = {}, pair;
  for (let i = 0, len = searches.length; i < len; i++) {
    pair = searches[i].split("=");
    queries[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
  }
  
  if (component) {
    return component === "queries" ? queries : elem[component];
  } else {
    return {
      protocol: elem.protocol,
      hostname: elem.hostname,
      port: elem.port,
      pathname: (elem.pathname.indexOf("/") === 0 ? "" : "/") + elem.pathname,
      search: elem.search,
      hash: elem.hash,
      host: elem.host,
      queries: queries
    };
  }
}
  
$(document).ready(function () {
  Actions.init();
});

