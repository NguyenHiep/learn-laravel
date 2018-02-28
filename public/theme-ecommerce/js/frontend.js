"use strict";
$(document).ready(function () {
  $('.qview-btn').click(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    var product_id = $(this).attr('data-id');
    if (typeof product_id !== 'undefined') {
      
      $.ajax({
        type: "GET",
        url: ajaxcalls_vars.host + '/product/quick-view/' + product_id,
        success: function (data) {
          console.log(data);
          
          $("#task" + task_id).remove();
        },
        error: function (data) {
          console.log('Error:', data);
        }
      });
    }
    
  });
});