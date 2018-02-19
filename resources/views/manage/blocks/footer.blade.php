
<!-- BEGIN FOOTER -->
<div class="page-footer">
  <div class="page-footer-inner text-center display-block"> 2017 &copy; CMS NguyenHiep - Framework Laravel.</div>
  <div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
  </div>
</div>
<!-- END FOOTER -->
@section('scripts')
<!--[if lt IE 9]>
<script src="{{asset('/manages/assets/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('/manages/assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('js/manage/app.js') }}"> </script>

@stack('custom-scripts')
<!-- BEGIN ACTION SCRIPTS -->
<script src="{{asset('/manages/assets/js/layouts.js?v='.VERSION)}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/js/action.js?v='.VERSION)}}" type="text/javascript"></script>
<!-- END ACTION  SCRIPTS -->
<script type="text/javascript">
  // Config notifation
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "positionClass": "toast-top-right",
    "showDuration": "1000",
    "hideDuration": "5000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

  function show_message(data) {
    console.log(data.status);
    var status = data.status;
    switch (status) {
      case 'success':
        toastr["success"](data.message, "Thông báo")
        break;
      case 'warning':
        toastr["warning"](data.message, "Thông báo")
        break;
      case 'info':
        toastr["info"](data.message, "Thông báo")
        break;
      default:
        toastr["error"](data.message, "Thông báo")
    }

  }
</script>
@show

@if(!empty(session('message')) && !empty(session('status')))
  @php echo '<script>
              var messages = {
                status: "'.session('status').'",
                message: "'.session('message').'"
                }
              show_message(messages);
            </script>';
  @endphp
@endif
@include('manage.blocks.errors')
</body>

</html>