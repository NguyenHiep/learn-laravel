;(function (window) {
	"use strict";
	window.ready = function (){
		var elemBody    = $("body"),
			elemArticle = elemBody.find("#article");

		elemArticle.find(".js-action-list-checkboxes").each(function () {
			var self   = $(this),
				parent = self.parents("table").eq(0),
				iptstr = 'input[name^="action_ids"]:visible';
			self.on("click", function () {
				if (self.prop("checked")) {
					parent.find(iptstr).prop("checked", true);
				} else {
					parent.find(iptstr).prop("checked", false);
				}
			});
			$(parent).on("click", iptstr, function() {
				if ($(this).prop("checked")) {
					if (parent.find(iptstr).not(":checked").length === 0) {
						self.prop("checked", true);
					}
				} else {
					self.prop("checked", false);
				}
			});
		});
	}
})(window);
