$(window).load(function() {
	var elemBody = $("body"),
		elemArticle = elemBody.find("#article");

	$(".js-action-list-rowlink").on("click", "tr:not(:eq(0))", function(e) {
		var self   = $(e.target),
			parent = self.parents("tr").eq(0),
			elem   = parent.find(".js-action-list-rowlink-val");

		if (elem.length > 0) {
			window.location = elem.attr("href");
		}
		return false;
	})
	.find("tr:not(:eq(0))").css("cursor","hand");

	$("input[type='checkbox']").click(function(e) {
		e.stopPropagation();
	});
	$(".js-action-list-rowlink td a").click(function(e) {
		e.stopPropagation();
	});


});

