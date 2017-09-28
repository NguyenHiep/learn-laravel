;(function () {
	"use strict";

	$(document).ready(function () {
		var elemBody = $("body"),
			elemArticle = elemBody.find("#article");
		elemArticle.find(".js-action-medias").on("click", function () {
			var id = elemArticle.find(".js-action-medias").attr('data-id'),
					url_redirect = elemArticle.find(".js-action-medias").attr('data-url');
			// Delete image in edit
			$.ajax({
				type: "post",
				cache: false,
				data: {
					_method: 'DELETE',
					_token: ajaxcalls_vars.token,
					ajax: true
				},
				url: ajaxcalls_vars.host + '/manage/medias/' + id,
				success: function (data) {
					alert('Delete ' + data.message);
					window.location.replace(url_redirect);
				},
				error: function (xhr, status, error) {
					//var err = eval(""+xhr.responseText+"");
					alert('Delete image failed');
				}
			});
		});


	});
})();

