var EcommerceOrders = function() {

  var initPickers = function() {
    //init date pickers
    $('.date-picker').datepicker({
      rtl       : App.isRTL(),
      autoclose : true,
      dateFormat: 'yy-mm-dd',
    });
  };

  return {
    init: function() {
      initPickers();
    },
  };

}();

jQuery(document).ready(function() {
  EcommerceOrders.init();
});