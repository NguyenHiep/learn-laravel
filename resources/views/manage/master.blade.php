@include('manage.blocks.header')

@include('manage.blocks.navigation')

<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="page-container">

  <aside id="left_sidebar">
    @include('manage.blocks.sidebar')
  </aside>

  <article id="article">
    @yield('content')
  </article>

 {{--<aside id="right_sidebar">
   @include('manage.blocks.quicksidebar')
 </aside>--}}
</div>
<!-- END CONTAINER -->
@include('manage.blocks.footer')