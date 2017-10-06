$(window).load(function () {
    var elemBody = $("body"),
        elemArticle = elemBody.find("#article");

    // Create link edit in table list
    $(".js-action-list-rowlink").on("click", "tr:not(:eq(0))", function (e) {
        var self = $(e.target),
            parent = self.parents("tr").eq(0),
            elem = parent.find(".js-action-list-rowlink-val");

        if (elem.length > 0) {
            window.location = elem.attr("href");
        }
        return false;
    })
        .find("tr:not(:eq(0))").css("cursor", "pointer");

    $("input[type='checkbox']").click(function (e) {
        e.stopPropagation();
    });
    $(".js-action-list-rowlink td a").click(function (e) {
        e.stopPropagation();
    });
    $(".js-action-delete").click(function (e) {
        e.stopPropagation();
    });

    $("#title").keyup(function () {
        var str = (document.getElementById("title").value); //Lấy nội dung từ input gốc
        str = str.toLowerCase(); // chuyển chuỗi sang chữ thường để xử lý
        /* tìm kiếm và thay thế tất cả các nguyên âm có dấu sang không dấu*/
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
        /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
        str = str.replace(/-+-/g, "-"); //thay thế 2- thành 1-
        str = str.replace(/^\-+|\-+$/g, "");//cắt bỏ ký tự - ở đầu và cuối chuỗi
        document.getElementById("slug").value = str; // xuất kết quả xữ lý ra input mới
    });

	  // config notification
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "1000",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

});


