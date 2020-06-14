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
    let status = data.status || null;
    switch (status) {
      case 'success':
        toastr['success'](data.message, 'Thông báo')
        break
      case 'warning':
        toastr['warning'](data.message, 'Thông báo')
        break
      case 'info':
        toastr['info'](data.message, 'Thông báo')
        break
      case 'error':
        toastr['error'](data.message, 'Thông báo')
        break
      default:
        break
    }
  }

  @if(!empty(session('message')) && !empty(session('status')))
  showNotificationMessage({
    status: '{{ session('status') }}',
    message: '{{ session('message') }}'
  })
  @endif
</script>
