"use strict";

let EcommerceProductsEdit = function () {
  let initComponents = function () {
    //init maxlength handler
    $('.maxlength-handler').maxlength({
      limitReachedClass: 'label label-danger',
      alwaysShow: true,
      threshold: 5
    })
  };

  let productAttributesComponents = function () {
    $('.js-action-add-new-attribute').click(function () {
      let lastIndex = parseInt($('#product-attributes tr:last').attr('data-index')) || 0,
        index = lastIndex + 1
      let rowAttribute = '<tr data-index="' + index + '">' +
        '<td class="text-center">' +
        '<input class="form-control text-uppercase" type="text" name="attributes[' + index + '][size]" />' +
        '</td>' +
        '<td><input class="form-control text-uppercase" type="text" name="attributes[' + index + '][sku]" /></td>' +
        '<td>' +
        '<input class="form-control" type="number" name="attributes[' + index + '][price]" min="0" />' +
        '</td>' +
        '<td>' +
        '<input class="form-control" type="number" name="attributes[' + index + '][quantity]" min="0"/>' +
        '</td>' +
        '<td class="text-center">' +
        '<button type="button" class="btn btn-default js-action-delete-attribute-row" data-toggle="tooltip" data-title="Xóa thuộc tính" data-original-title="" title=""><i class="fa fa-trash"></i></button>' +
        '</td>' +
        '</tr>'
      $('#product-attributes').append(rowAttribute)
    })
    $(document).on('click', '.js-action-delete-attribute-row', function () {
      if (confirm('Xóa item này?')) {
        // Check delete item using ajax
        let self = $(this),
          attributeId = self.data('attribute-id') || undefined
        if (attributeId) {
          $.ajax({
            type: 'post',
            dataType: 'json',
            data: {
              id: self.data('attribute-id'),
              _token: ajaxcalls_vars.token,
            },
            url: self.data('url'),
            success: function (data) {
              show_message(data)
              if (data.status === 'success') {
                self.parent().parent('tr').hide('slow')
              }
            },
            error: function (xhr, status, error) {
              show_message(error)
            }
          })
        } else {
          $(this).parent().parent('tr').remove()
        }
      }
    })
  }

  let galleryComponents = function () {
    const GALLERY_LIMIT = 5
    let $i = 1
    for ($i; $i <= GALLERY_LIMIT; $i++) {
      addNewGalleryProduct('#gallery_img_' + $i, $i)
      previewGalleryProduct('#gallery_img_' + $i, $i)
    }
  }

  return {
    //main function to initiate the module
    init: function () {
      initComponents()
      productAttributesComponents();
      galleryComponents()
    }

  }

}();

/****
 * add new gallery product
 *
 * @param selector
 * @param position
 */
function addNewGalleryProduct (selector, position) {
  jQuery(document).ready(function () {
    $('.btn-add-image-' + position).click(function () {
      $(selector).click()
    })
  })
}

/****
 * preview gallery product
 *
 * @param selector
 * @param position
 */
function previewGalleryProduct (selector, position) {
  jQuery(document).ready(function () {
    $(selector).change(function () {
      readURL(this, '.gallery_img_' + position)
      $('.btn-add-image-' + position).hide()
      $('.icon-delete-' + position).show()
    })
  })
}

/****
 * read Url Image
 *
 * @param input
 * @param selector
 */
function readURL (input, selector) {
  jQuery(document).ready(function () {
    if (input.files && input.files[0]) {
      let reader = new FileReader()
      reader.onload = function (e) {
        $(selector).attr('src', e.target.result)
      }
      reader.readAsDataURL(input.files[0]) // convert to base64 string
    }
  })
}

/****
 * remove preview image
 *
 * @param position
 */
function pictureRemove (position) {
  jQuery(document).ready(function () {
    //TODO: Issue remove not delete image tmp
    let isDelete = confirm('Bạn có muốn xóa ảnh này không?')
    let defaultImage = '/manages/assets/imgs/default-product-img.jpg'
    if (isDelete) {
      $('.btn-add-image-' + position).show()
      $('.icon-delete-' + position).hide()
      $('.gallery_img_' + position).attr('src', defaultImage)
    }
  })
}

jQuery(document).ready(function () {
  EcommerceProductsEdit.init()
})