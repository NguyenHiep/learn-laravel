<script type="text/javascript">
  toastr.options = {
    'closeButton': true,
    'debug': false,
    'positionClass': 'toast-top-right',
    'showDuration': '1000',
    'hideDuration': '5000',
    'timeOut': '5000',
    'extendedTimeOut': '1000',
    'showEasing': 'swing',
    'hideEasing': 'linear',
    'showMethod': 'fadeIn',
    'hideMethod': 'fadeOut'
  }

  function showNotificationMessage (data) {
    switch (data.status) {
      case 'success':
        toastr['success'](data.message, 'Thông báo')
        break
      case 'warning':
        toastr['warning'](data.message, 'Thông báo')
        break
      case 'info':
        toastr['info'](data.message, 'Thông báo')
        break
      default:
        toastr['error'](data.message, 'Thông báo')
    }
  }

  @if(!empty(session('message')) && !empty(session('status')))
  showNotificationMessage({
    status: "@php session('status') @endphp",
    message: "@php session('message') @endphp"
  })
  @endif
</script>
