<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- The above 3 meta tags *must* come fiatft in the head; any other head content must come *after* these tags -->

    <!-- SITE TITLE -->
    <title>{{ $title ?? 'Adbirt - Online CPA on a Budget: Advertise at your own Cost &amp; Pace' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="public/assets-revamp/img/favicon.png" type="image/png">

    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="public/assets-revamp/bootstrap/css/bootstrap.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind:500,600,700" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="public/assets-revamp/fonts/font-awesome.css">
    <!--magnific-popup Css-->
    <link rel="stylesheet" href="public/assets-revamp/css/magnific-popup.css">
    <!--- owl carousel Css-->
    <link rel="stylesheet" href="public/assets-revamp/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/assets-revamp/owlcarousel/css/owl.theme.default.min.css">
    <!--animate Css-->
    <link rel="stylesheet" href="public/assets-revamp/css/animate.css">
    <!-- Mean Menu CSS -->
    <link rel="stylesheet" href="public/assets-revamp/css/meanmenu.css">
    <!--odometer.min Css-->
    <link rel="stylesheet" href="public/assets-revamp/css/odometer.min.css">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" type="text/css" href="public/assets-revamp/nivoslider/css/nivo-slider.css">
    <link rel="stylesheet" type="text/css" href="public/assets-revamp/nivoslider/css/default.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="public/assets-revamp/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="public/assets-revamp/css/responsive.css">

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

    @yield('style')
</head>

<body>

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- START PRELOADER -->
        <div class="adbirt-preloader">
            <div class="adbirt-status">
                <div class="adbirt-status-mes"></div>
            </div>
        </div>
        <!--  END PRELOADER -->

        <!-- START back-to-top button -->
        <button class="adbirt-scroll-top adbirt-back-to-top" data-targets="html">
            <i class="fas fa-long-arrow-alt-up adbirt-scrollup-icon"></i>
        </button>
        <!-- END back-to-top button -->

        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="adbirt-top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-8">
                            <div class="adbirt-top-header-in">
                                <ul class="adbirt-top-header-list">
                                    <li><i class="fas fa-envelope"></i> <a target="_blank" href="mailto:info@adbirt.com">info@adbirt.com</a></li>
                                    <li><i class="fas fa-phone-volume"></i><a target="_blank" href="https://wa.me/447312906574">+44-7312-906574 </a></li>
                                    <li><i class="fas fa-map-marker-alt"></i><a href="#map">United Kingdom</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="adbirt-top-social">
                                <div class="adbirt-top-social-icon">
                                    <a target="_blank" href="https://facebook.com/AdbirtHQ" class="icon"> <i class="fab fa-facebook"></i>
                                    </a>

                                    <a target="_blank" href="https://www.instagram.com/adbirthq/" class="icon"> <i class="fab fa-instagram"></i>
                                    </a>

                                    <a target="_blank" href="https://twitter.com/Adbirt_HQ" class="icon"> <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="adbirt-main-responsive-nav">
                <div class="container">
                    <div class="adbirt-main-responsive-menu">
                        <div class="logo">
                            <!-- <a href="/"> -->
                            <img src="public/assets-revamp/img/logo.png" class="logo" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="adbirt-main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="/">
                            <img src="public/assets-revamp/img/logo.png" class="logo animate__animated animate__fadeInDown" alt="logo">
                        </a>
                        @if (Request::segment(1) != 'contact')
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto animate__animated animate__fadeInDown">
                                <li class="nav-item">
                                    <a href="/" class="nav-link">Home</a>

                                <li class="nav-item">
                                    <a href="/how-it-works" class="nav-link">How it works</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/pricing" class="nav-link">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/blog" class="nav-link">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/contact" class="nav-link">Contact</a>
                                </li>
                                <li class="nav-item text-white">
                                    <a href="/dashboard" class="nav-link rounded-lg bg-primary-color px-3 py-1">
                                        @if (Auth::user())
                                        Dashboard
                                        @else
                                        Login
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->


        @yield('content')

        <br />
        <br />
        <br />
        <!-- FOOTER SECTION START-->
        <footer id="footer" class="adbirt-footer-area">
            <div class="pt-5 pb-0">
                <div class="container">
                    <div class="row adbirt-mailchamp-border clearfix">
                        <div class="col-lg-6 col-md-6 col-12 adbirt-mailchamp-headding">
                            <h2>Subcribe to Newsletter Now</h2>
                        </div>
                        <!--- END COL -->
                        <div class="col-lg-6 col-md-6 col-12 adbirt-mailchamp-subscribe">
                            <form class="form-group" id="mc-form">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required="required">
                                <button type="submit" id="subscribe-button" class="btn">Subcribe</button>
                                <!-- SUBSCRIPTION SUCCESSFUL OR ERROR MESSAGES -->
                                <br>
                                <label class="adbirt-subscription-label" for="email"></label>
                            </form>
                        </div>
                        <!--- END COL -->
                    </div>
                    <!--- END COL -->

                    <div class="adbirt-footer-top mt-5">
                        <div class="row">
                            <div class="col-lg-5 col-md-4 col-12 adbirt-footer-link">
                                <div class="adbirt-footer-box">
                                    <h5>About Adbirt</h5>
                                    <p class="mt-3 pr-3"> Join the ad network that works for Advertisers and start
                                        booming in sales.
                                        <br>
                                        Monetize your website Traffic and withdraw instantly when you earn as Adbirt
                                        Publishers.
                                    </p>
                                    <div class="adbirt-footer-social-icon mt-3">

                                        <a target="_blank" href="https://facebook.com/AdbirtHQ" class="icon">
                                            <i class="fab fa-facebook"></i>
                                        </a>

                                        <a target="_blank" href="https://www.instagram.com/adbirthq/" class="icon"> <i class="fab fa-instagram"></i>
                                        </a>

                                        <a target="_blank" href="https://twitter.com/Adbirt_HQ" class="icon">
                                            <i class="fab fa-twitter"></i> </a>

                                    </div>
                                </div>
                            </div>
                            <!--- END COL -->

                            <div class="col-lg-2 col-md-3 col-12 adbirt-footer-link">
                                <h5>Quick Links</h5>
                                <ul class="adbirt-list-menu">
                                    <li> <a href="/blog"><i class="fas fa-long-arrow-alt-right mr-2"></i>Blog</a></li>
                                    <li> <a href="/pricing"><i class="fas fa-long-arrow-alt-right mr-2"></i>Pricing</a>
                                    </li>
                                    <li> <a href="/contact"><i class="fas fa-long-arrow-alt-right mr-2"></i>Contact
                                            us</a></li>
                                    <li> <a href="/privacy"><i class="fas fa-long-arrow-alt-right mr-2"></i>Privacy
                                            policy</a></li>
                                    <li> <a href="/actions-and-events"><i class="fas fa-long-arrow-alt-right mr-2"></i>Actions And Events</a></li>
                                </ul>
                            </div>
                            <!--- END COL -->

                            <div class="col-lg-5 col-md-5 col-12 adbirt-footer-link">
                                <h5>Map </h5>
                                <!-- Google Map start-->
                                <div id="adbirt-map-area">
                                    <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1192.4978464340093!2d-2.9155465418515525!3d53.2896121983381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487adfa45defb54f%3A0x8624a28bde8082f4!2sAdbirt!5e0!3m2!1sen!2sng!4v1628345267368!5m2!1sen!2sng" style="border: 1px solid #000;" allowfullscreen="true" loading="lazy"></iframe>
                                </div>
                                <!-- Google Map end -->
                            </div>
                            <!--- END COL -->
                        </div>
                        <!--- END ROW -->
                    </div>
                    <!--- END SINGLE FOOTER -->
                </div>
                <!--- END CONTAINER -->

                <div class="adbirt-footer-boottom text-center mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $year = date('Y');
                            ?>
                            <p>&copy; 2017 - {!! $year !!} Adbirt, Inc. All Rights Reserved</a> </p>
                        </div>
                        <!--- END COL -->
                    </div>
                    <!--- END ROW -->
                </div>
                <!-- FOOTER SECTION END-->
            </div>
            <!--- END OVERLAY -->
        </footer>
        <!--- END FOOTER -->
    </div>
    <!-- PAGE WRAPPER END-->

    <!-- Latest jQuery -->
    <script src="public/assets-revamp/js/jquery-1.12.4.min.js"></script>
    <!-- Latest compiled and minified Bootstrap -->
    <script src="public/assets-revamp/bootstrap/js/bootstrap.js"></script>
    <!-- modernizer JS -->
    <script src="public/assets-revamp/js/modernizr.custom.js"></script>
    <!-- imagesloaded JS -->
    <script src="public/assets-revamp/js/imagesloaded.pkgd.js"></script>
    <!-- isotope.pkgd JS -->
    <script src="public/assets-revamp/js/isotope.pkgd.min.js"></script>
    <!-- stellar JS -->
    <script src="public/assets-revamp/js/jquery.stellar.min.js"></script>
    <!-- magnific-popup js -->
    <script src="public/assets-revamp/js/jquery.magnific-popup.js"></script>
    <!-- owl-carousel min js  -->
    <script src="public/assets-revamp/owlcarousel/js/owl.carousel.min.js"></script>
    <!-- tilt js -->
    <script src="public/assets-revamp/js/tilt.jquery.js"></script>
    <!-- Counter js -->
    <script src="public/assets-revamp/js/jquery.counterup.js"></script>
    <!-- waypoints js -->
    <script src="public/assets-revamp/js/waypoints.min.js"></script>
    <!-- odometer js -->
    <script src="public/assets-revamp/js/odometer.min.js"></script>
    <!-- jquery.appear js -->
    <script src="public/assets-revamp/js/jquery.appear.min.js"></script>
    <!-- easing js -->
    <script src="public/assets-revamp/js/easing.min.js"></script>
    <!-- wow js -->
    <script src="public/assets-revamp/js/wow.min.js"></script>
    <!-- MeanMenu JS  -->
    <script src="public/assets-revamp/js/jquery.meanmenu.js"></script>
    <!-- Nivo slider js -->
    <script src="public/assets-revamp/nivoslider/js/jquery.nivo.slider.js"></script>
    <!-- ajaxchimp js -->
    <script src="public/assets-revamp/js/ajaxchimp.min.js"></script>

    @yield('script')

    <!-- main js -->
    <script src="public/assets-revamp/js/main.js"></script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6255f1eb7b967b11798a716f/1g0fri0ct';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

</body>

</html>