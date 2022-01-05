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

@yield('style')

<body class="layout-container ls-top-navbar">
<!-- <div class="wrapper"> -->

@include('includes.topMenu')
{{-- @include('includes.sideBar') --}}

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
      </div><!-- /.content-wrapper -->

{{-- @include('includes.rightSideBar') --}}
@include('includes.footer')

</div><!-- ./wrapper -->

@yield('script')

</body>
</html>