'use strict'
$(document).ready(function () {
  let elemBody = $('body'),
    datatables = getSelector('datatables'),
    objDataTables = elemBody.find(datatables).eq(0)
  // Call  method using datatable
  ajaxSetup()
  loadDatatables(objDataTables)
})

function ajaxSetup () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
}

function getSelector (str) {
  let selector = '[data-provide~="' + str + '"]'
  if (str.indexOf('$ ') === 0) {
    selector = str.substr(2)
  }
  return selector
}

function loadDatatables (obj) {
  let self = $('#' + obj.attr('id')),
    limit = $(self).data('pagelength'),
    url = $(self).data('ajax')
  if (typeof url != 'undefined') {
    window.Tables = $(self).DataTable({
      pageLength: limit,
      processing: true,
      serverSide: true,
      ajax: url,
      order: [[0, 'desc']]
    })
  } else {
    window.Tables = $(self).DataTable({
      pageLength: 10,
      order: [[0, 'desc']]
    })
  }
}

/***
 * Delete item ajax
 *
 * @param that
 */
function deleteItem (that) {
  let $this = $(that),
    tr = $this.parents('tr'),
    url = $this.data('ajax-url'),
    type = $this.data('type'),
    table = window.Tables,
    mess = 'Are you sure to hide this record?'
  if (typeof type === 'undefined') {
    mess = 'Are you sure to delete this record?'
  }
  if (confirm(mess)) {
    $.ajax({
      type: 'DELETE',
      url: url,
      dataType: 'json',
      success: function (data) {
        show_message(data);
        if (data.status === 'success') {
          table.row(tr).remove().draw()
        } else {
          table.draw()
        }
      },
      error: function (xhr, status, error) {
        show_message(error);
      }
    })
  }
}
