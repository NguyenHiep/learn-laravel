<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner text-center"> 2017 &copy; Custom theme by NguyenHiep.</div>
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
<script src="{{asset('/manages/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/uniform/jquery.uniform.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('/manages/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset('/manages/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset('/manages/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/layouts/global/scripts/quick-sidebar.min.js')}}"
        type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
@stack('custom-scripts')
<!-- BEGIN ACTION SCRIPTS -->
<script src="{{asset('/manages/assets/js/layouts.js')}}" type="text/javascript"></script>
<script src="{{asset('/manages/assets/js/action.js')}}" type="text/javascript"></script>
<!-- END ACTION  SCRIPTS -->
@show
</body>

</html>