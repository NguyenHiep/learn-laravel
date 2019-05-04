var FormDropzone = function () {


	return {
		//main function to initiate the module
		init: function () {

			Dropzone.options.myDropzone = {
				dictDefaultMessage: "",
				init: function () {
					this.on("addedfile", function (file) {
						// Create the remove button
						var removeButton = Dropzone.createElement("<p class='action_preview'><span class='upload_status'></span><a href='javascript:void(0)'' class='btn red js-action-media-delete pull-right' data-id=0><i class='fa fa-trash'></i></a></p>");

						// Capture the Dropzone instance as closure.
						var _this = this;

						// Listen to the click event
						removeButton.addEventListener("click", function (e) {
							// Make sure the button click doesn't submit the form:
							e.preventDefault();
							e.stopPropagation();

							// Remove the file preview.
							_this.removeFile(file);
							// If you want to the delete the file on the server as well,
							// you can do the AJAX request here.
							var id = $(file.previewElement).find('.js-action-media-delete').attr('data-id');
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
									console.log(data.message);
								},
								error: function (xhr, status, error) {
									var err = eval("(" + xhr.responseText + ")");
									alert(err.Message);
								}
							});
						});

						// Add the button to the file preview element.
						file.previewElement.appendChild(removeButton);
					});

					this.on("success", function (file, response) {
						//$('#test').attr('data-id' , 'Next');
						$(file.previewElement).find('.js-action-media-delete').attr('data-id', response.id);
						$(file.previewElement).find('.upload_status').html(response.message);
					});

				}
			}
		}
	};
}();


jQuery(document).ready(function () {
	FormDropzone.init();
});