
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
<script src="{{ asset('/manages/assets/global/plugins/tinymce/js/tinymce/jquery.tinymce.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/manages/assets/global/plugins/tinymce/js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
@stack('custom-scripts')
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
  };

  function show_message(data) {
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
  };
  // Config tinymce
  var editor_config = {
    path_absolute : "/",
    selector: ".tinymce_editor",
    theme: "modern",
    height: 250,
    language: 'vi_VN',
    branding: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
      var cmsURL = editor_config.path_absolute + 'manage/filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "no",
        close_previous : "no"
      });
    }
  };
  tinymce.init(editor_config);
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