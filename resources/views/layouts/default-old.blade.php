<!DOCTYPE html>
<html class="bootstrap-layout" lang="en">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128688871-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128688871-1');
</script>


@include('includes.header')
<link rel="stylesheet" type="text/css" href="https://www.adbirt.com/public/assets/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="https://www.adbirt.com/public/assets/font-awesome/css/font-awesome.min.css">

<!-- <link rel="stylesheet" type="text/css" href="https://www.adbirt.com/public/assets/sparken_custom_styles.css"> -->

<link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">

<style type="text/css">
	div#sidebarLeft {border-right: 1px solid #e5e5e5;}
</style>
@yield('style')
<body class="layout-container ls-top-navbar si-l3-md-up">
<!-- <div class="wrapper"> -->
@include('includes.topMenu')
@include('includes.sideBar')
    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
      </div><!-- /.content-wrapper -->
{{-- @include('includes.rightSideBar') --}}
@include('includes.footer')
</div><!-- ./wrapper -->
@yield('script')
<script type="text/javascript">
	setTimeout(function() {
        $('#msg').fadeOut('slow');
      }, 240000);
</script>
</body>
</html>
