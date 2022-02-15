<!DOCTYPE html>
<html lang="en" data-lt-installed="true" style="height: auto;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{!! $title !!} - {!! Config::get('customConfig.names.siteName') !!}</title>

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    {{-- <meta name="robots" content="noindex"> --}}

    <!--Main bootstrap-->
    <link rel="stylesheet" href="https://adbirt.com/public/assets-revamp/bootstrap/css/bootstrap.css">



    <meta name="shortcut icon" content="https://adbirt.com/public/assets-revamp/img/favicon.png">

    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Roboto Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
        rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
    <link rel="stylesheet" href="https://adbirt.com/public/assets-revamp/fonts/font-awesome.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="https://adbirt.com/public/assets-revamp/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet"
        href="https://adbirt.com/public/assets-revamp/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="https://adbirt.com/public/assets-revamp/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://adbirt.com/public/assets-revamp/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="https://adbirt.com/public/assets-revamp/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="https://adbirt.com/public/assets-revamp/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="https://adbirt.com/public/assets-revamp/plugins/summernote/summernote-bs4.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&family=Roboto:wght@100&display=swap');

        .open-sans-text {
            font-family: 'Open Sans', sans-serif;
        }

        .roboto-text {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Roboto', sans-serif;
        }

    </style>

    <style type="text/css">
        /* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }

    </style>

    <!-- <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css"> -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128688871-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-128688871-1');
    </script>

    <!-- <link rel="stylesheet" type="text/css" href="https://www.adbirt.com/public/assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://www.adbirt.com/public/assets/font-awesome/css/font-awesome.min.css"> -->


    @yield('style')

    <!-- 462D25FB-0903-4C3D-8CCB-635AC4D09247 -->
</head>


<body class="sidebar-mini layout-fixed gorgias-loaded" style="height: auto;" data-new-gr-c-s-check-loaded="14.1039.0"
    data-gr-ext-installed="">

    <main class="wrapper main">


        @include('includes.header-new')


        <!-- Begin Main content -->
        <section class="content">
            <div class="container-fluid yield-content">

                <!-- Begin yield content -->
                @yield('content')
                <!-- End yield content -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- # End Main content -->


        @include('includes.footer-new')

    </main>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://adbirt.com/public/assets-revamp/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://adbirt.com/public/assets-revamp/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="https://adbirt.com/public/assets-revamp/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="https://adbirt.com/public/assets-revamp/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="https://adbirt.com/public/assets-revamp/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="https://adbirt.com/public/assets-revamp/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="https://adbirt.com/public/assets-revamp/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="https://adbirt.com/public/assets-revamp/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="https://adbirt.com/public/assets-revamp/plugins/moment/moment.min.js"></script>
    <script src="https://adbirt.com/public/assets-revamp/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script
        src="https://adbirt.com/public/assets-revamp/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="https://adbirt.com/public/assets-revamp/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="https://adbirt.com/public/assets-revamp/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
    </script>
    <!-- AdminLTE App -->
    <script src="https://adbirt.com/public/assets-revamp/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="https://adbirt.com/public/assets-revamp/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="https://adbirt.com/public/assets-revamp/dist/js/pages/dashboard.js"></script>

    <!-- Begin yield script -->
    @yield('script')
    <!-- End yield script -->


    {{-- <svg id="zcomponents__svg" style="display: none;"></svg>
    <div class="betternet-wrapper"></div><span id="texmage-extension-is-installed"></span>
    <div class="daterangepicker ltr show-ranges opensright">
        <div class="ranges">
            <ul>
                <li data-range-key="Today">Today</li>
                <li data-range-key="Yesterday">Yesterday</li>
                <li data-range-key="Last 7 Days">Last 7 Days</li>
                <li data-range-key="Last 30 Days">Last 30 Days</li>
                <li data-range-key="This Month">This Month</li>
                <li data-range-key="Last Month">Last Month</li>
                <li data-range-key="Custom Range">Custom Range</li>
            </ul>
        </div>
        <div class="drp-calendar left">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-calendar right">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default"
                type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled"
                type="button">Apply</button> </div>
    </div>
    <div class="jqvmap-label" style="display: none;"></div><iframe id="nr-ext-rsicon"
        style="position: absolute; display: none; width: 50px; height: 50px; z-index: 2147483647; border-style: none; background: transparent; top: 341px; left: 518px;"></iframe> --}}

</body>

<!--<div class="qt-dropdown ">
    <div class="qt-info">
        Please
        <a href="#" class="js-gorgias-signin">
            Sign in
        </a>

        or
        <a href="https://www.briskine.com/signup" target="_blank">
            Create a free account
        </a>

    </div>

    <input type="search" class="qt-dropdown-search" value="" placeholder="Search templates...">
    <ul class="qt-dropdown-content">

    </ul>
    <div class="g-dropdown-toolbar">
        <button class="g-new-template">New Template</button>
    </div>
</div>-->
<!-- #End footer -->

</html>
