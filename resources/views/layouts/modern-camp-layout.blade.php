<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">

    <title>{!! $title !!} | {!! Config::get('customConfig.names.siteName') !!}</title>

    <link rel="icon" type="image/png" href="https://adbirt.com/public/assets-revamp/img/favicon.png">

    <meta name="shortcut icon" content="https://adbirt.com/public/assets-revamp/img/favicon.png">

    <link href="/public/ModernCamp_files/bootstrap.css" rel="stylesheet">
    <link href="/public/ModernCamp_files/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/ModernCamp_files/jquery-ui.css">
    <link href="/public/ModernCamp_files/style.css" rel="stylesheet">
    <link href="/public/ModernCamp_files/responsive.css" rel="stylesheet">

    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="/public/ModernCamp_files/fontawesome-all.css"> --}}
    <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
    <link rel="stylesheet" href="https://adbirt.com/public/assets-revamp/fonts/font-awesome.css">

    {{-- @yield('style') --}}

</head>

<body>
    <div class="preloader-area" style="display: none;">
        <div class="spinner" style="display: none;">
            <img src="/public/ModernCamp_files/logo.svg" alt="">
        </div>
    </div>
    <header class="menu header_navbar header-menu-1">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12 logo-outer">
                    <div class="logo_box">
                        <a
                            href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index-2.html"><img
                                src="/public/ModernCamp_files/logo.svg" alt=""></a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12 text-center nav-outer-responsive">
                    <nav class="navbar navbar-inverse">
                        <div class="navbar-collapse row collapse" id="myNavbar" style="height: 1px;">
                            <div class="col-md-12 zero-padding">
                                <ul class="nav navbar-nav">
                                    <li><a href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index-2.html"
                                            class="active">dashboard</a></li>
                                    <li><a
                                            href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/engage.html">engage</a>
                                    </li>
                                    <li><a
                                            href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/services.html">service</a>
                                    </li>
                                    <li><a
                                            href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/help.html">help</a>
                                    </li>
                                    <li class="dropdown_menu">
                                        <a
                                            href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#"><span
                                                class="header_span"><i class="fas fa-money-bill-alt"></i> $150
                                            </span><span class="fa fa-angle-down"></span></a>
                                        <ul class="dropdown-menu pull-left search-panel">
                                            <li><a
                                                    href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">Add
                                                    Credit</a></li>
                                            <li><a
                                                    href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#">Wallet</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/faq.html"
                                            class="faq_mail"><span class="circle"><i
                                                    class="fas fa-envelope"></i></span></a></li>
                                    <li class="">
                                        <a
                                            href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#"><span
                                                class="header_span"><i class="fas fa-user-circle"></i> John </span><span
                                                class="fa fa-angle-down"></span></a>
                                        <ul class="dropdown-menu pull-left search-panel">
                                            <li><a
                                                    href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/login.html">Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="header_btn">
                                    <a href="{{ url('/campaigns/add-campaigns') }}" class="comp_btn">Create new
                                        campaign</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="col-md-3 col-sm-12 col-xs-12 responsive_logo">
        <div class="logo_box">
            <a
                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index-2.html"><img
                    src="/public/ModernCamp_files/logo.svg" alt=""></a>
        </div>
    </div>
    <div class="responsive_button">
        <p>Dashboard</p>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="responsive_nav collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a
                    href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index-2.html">dashboard</a>
            </li>
            <li><a
                    href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/engage.html">engage</a>
            </li>
            <li><a
                    href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/services.html">service</a>
            </li>
            <li><a
                    href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/help.html">help</a>
            </li>
            <li><a
                    href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/terms.html">Terms
                    &amp; Condition</a></li>
            <li><a
                    href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/faq.html">faq</a>
            </li>
            <li><a
                    href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/login.html">logout</a>
            </li>
        </ul>
    </div>

    <section class="main-section section-margin">
        <div class="container ui-tabs ui-corner-all ui-widget ui-widget-content" id="tabs">
            <div class="row">
                <div class="col-md-12">

                    <?php
                    if (Auth::user()->profile) {
                        $profilePhotoUrl = strip_tags(substr(Auth::user()->profile->propic, 0, 4) == 'http' ? Auth::user()->profile->propic : (substr(Auth::user()->profile->propic, 0, 8) == '/uploads' ? 'https://adbirt.com/public' . Auth::user()->profile->propic : Auth::user()->profile->propic)) . '';
                        if (strlen($profilePhotoUrl) == 0) {
                            $profilePhotoUrl = 'https://adbirt.com/public/assets-revamp/img/avatar.png';
                        }
                    }
                    ?>

                    <div class="col-md-3 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12">
                        <div class="profile">
                            <div class="profile_inner">
                                <img src="{!! $profilePhotoUrl !!}" alt="{!! Auth::user()->name !!}" width="100"
                                    height="100">
                                <h4 class="user_name">{!! Auth::user()->name !!}</h4>
                                <p class="user_credit">Balance : ${!! $currentBalance !!}</p>
                            </div>
                        </div>
                        <div class="options_grp">
                            <ul class="list-group ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header"
                                role="tablist">
                                <li class="list-group-item ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active"
                                    role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1"
                                    aria-selected="true" aria-expanded="true"><a
                                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#tabs-1"
                                        role="presentation" tabindex="-1" class="ui-tabs-anchor"
                                        id="ui-id-1">Overview</a></li>
                                <li class="list-group-item ui-tabs-tab ui-corner-top ui-state-default ui-tab"
                                    role="tab" tabindex="-1" aria-controls="tabs-2" aria-labelledby="ui-id-2"
                                    aria-selected="false" aria-expanded="false"><a
                                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#tabs-2"
                                        role="presentation" tabindex="-1" class="ui-tabs-anchor"
                                        id="ui-id-2">Campaign</a></li>
                                <li class="list-group-item ui-tabs-tab ui-corner-top ui-state-default ui-tab"
                                    role="tab" tabindex="-1" aria-controls="tabs-3" aria-labelledby="ui-id-3"
                                    aria-selected="false" aria-expanded="false"><a
                                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#tabs-3"
                                        role="presentation" tabindex="-1" class="ui-tabs-anchor"
                                        id="ui-id-3">Opportunities</a></li>
                                <li class="list-group-item ui-tabs-tab ui-corner-top ui-state-default ui-tab"
                                    role="tab" tabindex="-1" aria-controls="tabs-4" aria-labelledby="ui-id-4"
                                    aria-selected="false" aria-expanded="false"><a
                                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#tabs-4"
                                        role="presentation" tabindex="-1" class="ui-tabs-anchor"
                                        id="ui-id-4">Reports</a></li>
                            </ul>
                            <a class="log1452" href="{!! route('logout') !!}">Logout</a>
                        </div>
                    </div>

                    @include('includes.alert')

                    @yield('content')

                </div>
            </div>
        </div>
    </section>


    {{-- Begin: back to top --}}
    <a href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#"
        class="cd-top js-cd-top"> <i class="fas fa-angle-up"></i> </a>
    {{-- End: back to top --}}

    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="footer_btm">
                    <div class="col-md-6 col-sm-12 col-xs-12 zero-padding">
                        <div class="navbar-collapse row collapse" id="footer_nav" style="height: 1px;">
                            <ul class="nav navbar-nav">
                                <li><a
                                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/thanks.html">Publishing</a>
                                </li>
                                <li><a
                                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/thanks.html">Analytics</a>
                                </li>
                                <li><a
                                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/terms.html">Term
                                        &amp; Conditions</a></li>
                                <li><a
                                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/thanks.html">Support</a>
                                </li>
                                <li><a
                                        href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/help.html">Help</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                        <p> © Copyright 2020 by <a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#"
                                class="defualt_clr">Mediacamp</a>. All Right Reserved. <a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#"
                                class="defualt_clr">Privacy</a> and <a
                                href="file:///home/danroyal001/websites/Adbirt%20New%20Dashboard/gambolthemes.net/html-items/modernCamp/index.html#"
                                class="defualt_clr">Legal</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="/public/ModernCamp_files/jquery.js"></script>
    <script src="/public/ModernCamp_files/jquery-1.11.1.min.js"></script>
    <script src="/public/ModernCamp_files/jquery.canvasjs.min.js"></script>
    <script src="/public/ModernCamp_files/bootstrap.min.js"></script>
    <script src="/public/ModernCamp_files/jquery-1.12.4.js"></script>
    <script src="/public/ModernCamp_files/jquery-ui.js"></script>

    <script src="/public/ModernCamp_files/canvasjs.min.js"></script>
    <script src="/public/ModernCamp_files/line-chart.js"></script><span
        style="position: absolute; left: 0px; top: -20000px; padding: 0px; margin: 0px; border: none; white-space: pre; line-height: normal; font-family: 'Trebuchet MS', Helvetica, sans-serif; font-size: 10px; font-weight: normal; display: none;">Mpgyi</span>

    <script src="/public/ModernCamp_files/back-to-top.js"></script>
    <script src="/public/ModernCamp_files/custom.js"></script>

    {{-- @yield('script') --}}


</body>

</html>
