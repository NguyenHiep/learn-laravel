;(function () {
	"use strict";

	$(document).ready(function () {
        var elemBody    = $("body"),
            elemArticle = elemBody.find("#article");
        elemArticle.find(".js-action-list-checkboxes").each(function () {
            var self   = $(this),
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
            $(parent).on("click", iptstr, function() {
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

        // Pagination

		elemArticle.find(".pagination-loading__btn-more a").on("click", function () {
			var $elem = $(this);
			$elem.children("span.cbp-l-loadMore-loadingText").show();
			$.ajax({
				type: "GET",
				url: $elem.attr("href"),
				dataType: 'html',
				success: function(data) {
					var dom_nodes = $($.parseHTML(data)),
						outputTarget = $elem.data("outputTarget");
					$(outputTarget).append(dom_nodes.find(outputTarget).find('div.media__item'));
					if (dom_nodes.find('.js-action-pagination').length > 0) {
						$elem.prop('href', dom_nodes.find('.js-action-pagination').attr("href"));
						$elem.children("span.cbp-l-loadMore-loadingText").hide();
					} else {
						$elem.remove();
					}
				},
				error:function() {
					console.log("Error loading");
					$elem.children("span.cbp-l-loadMore-loadingText").hide();
				}
			});
			return false;
		});

    });

})();
