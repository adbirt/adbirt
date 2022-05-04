@extends('layouts.frontend')

@section('style')
    {{-- <style>
        .btn-danger {
            background-color: #ff7c00;
            border: #ff7c00;
        }

        .text_title {
            color: #ff7c00;
            font-family: cursive;
            font-size: 2rem !important;
        }

        .font-size-16 {
            font-size: 16px !important;
        }

        .hero_image {
            width: 300px;
            object-fit: cover;
        }

        .feature_icon {
            width: 75px;
            height: 75px;
        }

        .sub-heads {
            font-family: 'Times New Roman', Times, serif !important;
            font-size: 1.7rem !important;
        }

        .feature_iconWrap {
            background-color: #fff;
            box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
            display: inline-block;
            padding: 20px;
            border-radius: 50%;
            border: #fff;
        }

        .text-custom-color {
            color: #3c404 !important;
        }

        .step-card {
            height: 180px !important;
        }

        .steps_image {
            width: 150px;
        }

        .format_list {
            list-style: none;
        }

        .format_list li {
            margin: 0;
        }

        .custom-clearfix {
            height: 140px !important;
        }

        @media (max-width: 600px) {
            .for-advertisers {
                margin-bottom: 30px !important;
            }
        }

        @media (min-width: 992px) {
            .hero_image {
                width: 600px;
                /* image-rendering: pixelated !important; */
            }

            .steps_image {
                width: 200px;
            }

            .format_list li {
                margin: 0 1.5rem !important;
            }

            .text_title {
                font-size: 2rem !important;
            }
        }

    </style> --}}

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">


    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500,900' rel='stylesheet' type='text/css'>

    <link href="{{ asset('/css/magnific-popup.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
    <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon" />


@stop

@section('content')
    {{-- <!-- Slider Start -->
    <div id="adbirt-slider" class="adbirt-slider slider2">
        <div class="adbirt-carousel owl-carousel" data-loop="true" data-items="1" data-margin="0" data-autoplay="true"
            data-hoverpause="false" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false"
            data-nav-speed="false" data-center-mode="true" data-mobile-device="1" data-mobile-device-nav="false"
            data-mobile-device-dots="false" data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="false"
            data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="1"
            data-lg-device="1" data-md-device-nav="false" data-md-device-dots="true">
            <!-- Slide 1 -->
            <div class="slider slide1">
                <div class="adbirt-home-overlay ">
                    <div class="container">
                        <div class="adbirt-content-part">
                            <div class="adbirt-slider-des">
                                <h2 class="adbirt-subtitle animate__animated animate__fadeInDown">Set the cost</h2>
                                <h2 class="adbirt-subtitle animate__animated animate__fadeInUp">Pay for results</h2>
                            </div>
                            <br>
                            <div class="adbirt-slider-bottom">
                                <ul>
                                    <li>
                                        <a href="/dashboard"
                                            class="adbirt-themes-btn red animate__animated animate__fadeInUp">
                                            @if (Auth::user())
                                            Let's Start @else Sign Up For Free
                                            @endif
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Slide 1 -->

            <!-- Start Slide 2 -->
            <div class="slider slide2">
                <div class="adbirt-home-overlay ">
                    <div class="container">
                        <div class="adbirt-content-part">
                            <div class="adbirt-slider-des">
                                <h2 class="adbirt-subtitle animate__animated animate__fadeInDown">Pay only when you
                                    <wbr /><br>make sales
                                </h2>
                            </div>
                            <br>
                            <div class="adbirt-slider-bottom">
                                <ul>
                                    <li><a href="/dashboard"
                                            class="adbirt-themes-btn red animate__animated animate__fadeInUp">
                                            @if (Auth::user())
                                            Let's Start @else Sign Up For Free
                                            @endif
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Slide 2 -->
        </div>
    </div>
    <!-- Slider End -->

    <!-- Wavify start -->
    <div id="adbirt-wavify" style="position: relative; width: 100%;">
        <svg class="adbirt-wavify-svg" style="width: 100%; position: absolute;" version="1.1"
            xmlns="https://www.w3.org/2000/svg">
            <path id="wave" d="" />
        </svg>
    </div>
    <!-- Wavify end -->

    <br> --}}


    {{-- <!-- About Section Start -->
    <div id="adbirt-about" class="adbirt-about style1 adbirt-section-padding pt-0">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <!-- <div class="row">
                                                                                                                                                    <div class="col-6">
                                                                                                                                                        <img class="mb-3" src="public/assets-revamp/img/about/about-2.jpg" alt="">
                                                                                                                                                        <img src="public/assets-revamp/img/about/about-1.jpg" alt="">
                                                                                                                                                    </div>
                                                                                                                                                    <div class="col-6">
                                                                                                                                                        <img src="public/assets-revamp/img/about/about-3.jpg" alt="">
                                                                                                                                                    </div>
                                                                                                                                                </div> -->
                    <img src="/public/assets-revamp/img/digital-marketing-simplified.png" alt="Digital Marketing"
                        style="margin-top: 4rem !important;" class="wow slideInLeft" data-wow-duration="0.95s"
                        data-wow-delay="0.1s" data-wow-offset="0" />
                </div>
                <div class="col-lg-6 margin-20 animate__animated animate__fadeInUp">
                    <div class="adbirt-section-title">
                        <h2 class="text-primary-color">About Us</h2>
                        <p class="about-us text-black">Adbirt is recognized as the most cost-effective platform
                            in the performance marketing system.</p>
                        <p class="about-us text-black">We help start-up businesses, as well as existing
                            organizations,
                            reach their prospective customers online without breaking the banks
                            with the aid of our innovative technology that allows you to set your
                            budget within your means.</p> <br>
                        <span class="text-black">We are the best for your:</span>

                    </div>
                    <ul class="listing-style text-black">
                        <li><i class="fas fa-check-circle text-primary-color"></i> Cost Per Sales (CPS)</li>
                        <li><i class="fas fa-check-circle text-primary-color"></i> Cost Per Download (CPD)</li>
                        <li><i class="fas fa-check-circle text-primary-color"></i> Cost Per Registration (CPR) </li>
                        <li><i class="fas fa-check-circle text-primary-color"></i> Cost Per Lead (CPL)</li>
                    </ul>
                    <div class="adbirt-about1-btn mt-5">
                        <a class="adbirt-themes-btn red" href="/dashboard">
                            @if (Auth::user())
                            Let's Start @else Sign Up For Free
                            @endif
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- About Section End -->


    <!-- START PROGRAM -->
    <!-- <section id="program" class="adbirt-program-area" data-stellar-background-ratio="0.3"
                                                                                                                           style="background-image:url(public/assets-revamp/img/bg/11.jpg);background-size:cover; background-position: center center">
                                                                                                                           <div class="adbirt-home-overlay adbirt-section-padding">
                                                                                                                            <div class="container">
                                                                                                                             <div class="row clearfix justify-content-left">
                                                                                                                              <div class="col-xl-6 col-lg-6 col-12 mx-auto my-auto wow fadeIn" data-wow-duration="1s"
                                                                                                                               data-wow-delay="0.3s" data-wow-offset="0">
                                                                                                                               <div class="adbirt-section-title text-left">
                                                                                                                                <h5 class="adbirt-sheading text-white">Intro Video</h5>
                                                                                                                                <h2 class="mb-3 text-white">You can It Solution Easy to Learn and Program that you can
                                                                                                                                 easily Develop</h2>
                                                                                                                               </div>
                                                                                                                              </div>
                                                                                                                              <--- END COL --

                                                                                                                              <div class="col-xl-6 col-12 adbirt-program-img">
                                                                                                                               <div class="waves-box">
                                                                                                                                <-- If dont need Video then add class .adbirt-hidden --
                                                                                                                                <a href="https://www.youtube.com/watch?v=Ao2XIhZ0JGs"
                                                                                                                                 class="iq-video popup-video mfp-iframe"> <i class="fa fa-play"></i>
                                                                                                                                </a>
                                                                                                                                <div class="iq-waves">
                                                                                                                                 <div class="waves wave-1"></div>
                                                                                                                                 <div class="waves wave-2"></div>
                                                                                                                                 <div class="waves wave-3"></div>
                                                                                                                                </div>
                                                                                                                               </div>
                                                                                                                              </div>
                                                                                                                              <--- END COL --
                                                                                                                             </div>
                                                                                                                             <--- END ROW --
                                                                                                                            </div>
                                                                                                                            <--- END CONTAINER --
                                                                                                                           </div>
                                                                                                                           <--- END CONTAINER --
                                                                                                                          </section> -->
    <!-- END PROGRAM -->

    <!-- START SERVICE -->
    <section id="best-service" class="adbirt-section-padding- pb-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-xl-6">
                    <div class="adbirt-section-title text-center wow zoomIn" data-wow-duration="0.3s" data-wow-delay="0.1s"
                        data-wow-offset="0">
                        <h2 class="text-primary-color">Our Services</h2>
                    </div>
                </div>
                <!--- END COL -->
            </div>
            <!--- END ROW -->

            <div>
                <div class="row owl-theme d-flex align-items-center justify-content-between p-0 m-0">

                    <div class="col-12 col-md-4 col-lg-4 adbirt-best-service-slide m-0 p-0 wow zoomIn"
                        data-wow-duration="0.45s" data-wow-delay="0.4s" data-wow-offset="0">
                        <div class="adbirt-best-service-img">
                            <img src="public/assets-revamp/img/services//cpa.png" alt="CPA"
                                style="height: 232px !important;">
                        </div>
                        <div class="adbirt-best-service-content">
                            <h3 class="adbirt-best-service-title">CPA</h3>
                            <p class="adbirt-best-service-height adbirt-best-service-description"
                                style="height: 200px !important;">CPA marketing,
                                also known as
                                cost-per-action marketing, is the means of promoting your business online. <br>
                                And only pay when you make a sale or when a specific action occurs on your
                                website.
                            </p>
                            <a href="/actions-and-events" class="adbirt-themes-btn red mt-3">learn more</a>
                        </div>
                    </div>


                    <div class="col-12 col-md-4 col-lg-4 adbirt-best-service-slide m-0 p-0 wow zoomIn"
                        data-wow-duration="0.45s" data-wow-delay="0.4s" data-wow-offset="0">
                        <div class="adbirt-best-service-img">
                            <img src="public/assets-revamp/img/services/cost-per-sale.png" alt="CPC"
                                style="height: 232px !important;">
                        </div>
                        <div class="adbirt-best-service-content">
                            <h3 class="adbirt-best-service-title">CPS</h3>
                            <p class="adbirt-best-service-height adbirt-best-service-description px-1"
                                style="height: 200px !important;">CPS cost-per-sales is a metric used in advertising
                                to determine the amount of money you paid out for every generated sale on your
                                promoted campaign.
                            </p>
                            <a href="/actions-and-events" class="adbirt-themes-btn red mt-3">learn more</a>
                        </div>
                    </div>


                    <div class="col-12 col-md-4 col-lg-4 adbirt-best-service-slide m-0 p-0 wow zoomIn"
                        data-wow-duration="0.45s" data-wow-delay="0.4s" data-wow-offset="0">
                        <div class="adbirt-best-service-img">
                            <img src="public/assets-revamp/img/services/cpd.png" alt="CPD"
                                style="height: 232px !important;">
                        </div>
                        <div class="adbirt-best-service-content">
                            <h3 class="adbirt-best-service-title">CPD</h3>
                            <p class="adbirt-best-service-height adbirt-best-service-description"
                                style="height: 200px !important;">(CPD)
                                cost-per-download is an advertising
                                model that allows advertisers pays for each specified action, typically the
                                downloading of an application or file.
                            </p>
                            <a href="/actions-and-events" class="adbirt-themes-btn red mt-3">learn more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--- END ROW -->
        </div>
        <!--- END CONTAINER -->
    </section>
    <!-- END SERVICE -->

    <br>
    <br>
    <br>

    <div class="new-benefits-container container-fluid pt-5">
        <div class="row">
            <div class="col-lg-6">

                <div>
                    <img src="https://adbirt.com/public/assets-revamp/img/benefits-fg.png" class="img-fluid mt-5 wow zoomIn"
                        alt="" data-wow-duration="0.45s" data-wow-delay="0.4s" data-wow-offset="0">
                </div>
                <!-- Image session ends here -->
            </div>

            <!-- OUR BENEFIT START HERE -->

            <div class="col-lg-6">

                <!-- Grow your + Benefit start here -->
                <div>
                    <h4 class="h2 text-black text-primary-color">
                        Grow your business with Adbirt.
                    </h4>
                    <p>
                        <hr>
                    </p>
                </div>


                <div>
                    <p class="font-weight-semibold">
                        We guarantee 100 % (Return-On-Investment). <br>
                        Of any penny spent on your marketing campaign
                    </p>
                </div>


                <div>
                    <h5 class="h4 benefit-one font-weight-bolder animate__animated animate__fadeInUp">
                        <span class="dot-space">.</span> What you'll benefit
                    </h5>

                    <hr>
                </div>


                <div class="row font-weight-bold">
                    <div class="col-lg-6">
                        <h5 class="pt-2 font-weight-bold">
                            01.
                        </h5>

                        <p>
                        <div>
                            <p class="font-weight-semibold">
                                We offer you the lowest cost for your marketing, and you're in total control of your
                                marketing budget set your cost within your means & only pay for the result.
                            </p>
                        </div>
                        </p>
                    </div>


                    <div class="col-lg-6">
                        <h5 class="pt-2 font-weight-bold">
                            02.
                        </h5>

                        <p class="font-weight-semibold">
                            With the innovation of our technology, We will promote your product or service to the
                            targeted audience who are likely to buy from you only
                        </p>
                    </div>

                    <div class="row pt-3">
                        <div class="col-lg-6">
                            <h5 class="pl-3 pt-2 font-weight-bold">
                                03.
                            </h5>

                            <p class="pl-3 font-weight-semibold">
                                We guarantee our advertisers 100% return on investment from their ads-spend. You
                                don't
                                have to pay a dime if you don't make a sale or get a new lead to your business
                            </p>
                        </div>

                        <div class="col-lg-6">
                            <h5 class="pl-3 pt-2 font-weight-bold">
                                04.
                            </h5>

                            <p class="pl-3 font-weight-semibold">
                                Registration is completely free and it takes less than 3 minutes to sign up, No
                                Credit Card required.
                            </p>
                        </div>
                    </div>


                </div>

            </div>

        </div>



    </div>

    <br />
    <br /> --}}

    {{-- Begin Chilo's design --}}
    {{-- <div class="adbirt-content clearfix">
        <div class="adbirt-page-heading custom-clearfix">
        </div><!-- adbirt-page-heading -->

    </div>

    <br />
    <br />

    <section class="my-5">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <p class="h3 text_title font-weight-bold for-advertisers">FOR ADVERTISERS</p>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col col-12 col-md-6 d-flex align-items-center">
                    <div class="px-0 mx-0 px-md-2 mx-md-2 px-lg-4 mx-lg-5">
                        <div class="px-2 mx-0 px-md-2 mx-md-2 px-xl-4">
                            <h1 class="h2">
                                Increase your sales and generate a new lead with Adbirt Ads
                            </h1>
                            <p class="text-left w-100">
                                Let our technology tailor your products or services in front of prospective
                                customer who is searching for your business online and only pay your desired amount when you
                                make sales or leads. Get started with as low as $5 budget in your wallet. You don't have to
                                break the banks.
                            </p>
                            <br />
                            <a href="/actions-and-events" class="btn btn-danger bg-primary-color">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-6 d-flex justify-content-center">
                    <img src="/public/assets-revamp/img/actions-and-events/second_new.png" class="hero_image" />
                </div>
            </div>
        </div>
    </section>

    <br />
    <h3 class="text-center text-black sub-heads">Get the best result that interest you </h3>


    <!-- FEATURES SECTION  -->
    <section class="mb-5 mx-4 mx-md-5 px-md-5 pt-0">
        <div class="my-5">
            <div class="row mx-2 mx-sm-0 mx-md-5">
                <div class="col col-lg-4 col-md-6 col-12">
                    <div class="feature_card d-flex flex-column align-items-center">
                        <div class="feature_iconWrap">
                            <img src="/public/assets-revamp/img/actions-and-events/double-click.png" class="feature_icon"
                                alt="click" />
                        </div>
                        <div class="my-4 d-flex flex-column align-items-center">
                            <p class="h4 mt-3 open-sans-text text-custom-color">Cost Per Action</p>
                            <p
                                class="mx-0 mx-lg-2 text-center open-sans-text font-size-16 text-custom-color font-weight-bold">
                                Promote your products or service online pay your desired amount when you make a sale
                                or get a new lead to
                                your business.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4 col-md-6 col-12">
                    <div class="feature_card d-flex flex-column align-items-center">
                        <div class="feature_iconWrap">
                            <img src="/public/assets-revamp/img/actions-and-events/acquisition.png" class="feature_icon"
                                alt="click" />
                        </div>
                        <div class="my-4 d-flex flex-column align-items-center">
                            <p class="h4 mt-3 open-sans-text text-custom-color">Cost Per Sales</p>
                            <p
                                class="mx-0 mx-lg-2 text-center open-sans-text font-size-16 text-custom-color font-weight-bold">
                                You're in total control of your ad budget, set the cost within your means and only
                                pay after a successful
                                sales or leads.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4 col-md-6 col-12">
                    <div class="feature_card d-flex flex-column align-items-center">
                        <div class="feature_iconWrap">
                            <img src="/public/assets-revamp/img/actions-and-events/click.png" class="feature_icon"
                                alt="click icon" />
                        </div>
                        <div class="my-4 d-flex flex-column align-items-center">
                            <p class="h4 mt-3 open-sans-text text-custom-color">Cost Per Click</p>
                            <p
                                class="mx-0 mx-lg-2 text-center open-sans-text font-size-16 text-custom-color font-weight-bold">
                                Get unlimited impressions to your business for free and only pay for a valid click
                                when users visit or
                                land on your websites.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="row d-flex justify-content-center">
                <a href="/dashboard" class="btn btn-danger bg-primary-color">Start Now</a>
            </div>
        </div>
    </section>

    <section>
        <div class="d-flex justify-content-center">
            <img src="/public/assets-revamp/img/actions-and-events/adbirt_logo.png" class="" />
        </div>
    </section>

    <!-- FOR PUBLISHER  -->
    <section>
        <div class="d-flex justify-content-center">
            <p class="h3 text_title font-weight-bold">FOR PUBLISHERS</p>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col col-12 col-md-6 d-flex flex-row justify-content-end">
                    <img src="/public/assets-revamp/img/actions-and-events/screen_second.png" class="hero_image"
                        style="height: 550px;object-fit: contain;" />
                </div>
                <div class="col col-12 col-md-6 d-flex align-items-center">
                    <div class="px-0 mx-0 px-md-2 mx-md-2 px-lg-4 mx-lg-5">
                        <div class="px-2 mx-0 px-md-2 mx-md-2">
                            <h2 class="h2">
                                No minimum threshold<br /><wbr />
                                is required and there's
                                no limit to earnings
                            </h2>
                            <p class="mr-5">
                                We acknowledge creating good content is hard. Therefore monetizing it shouldn't be
                                difficult. Join thousands of publishers like yours to Monetize your website traffic and
                                withdraw instantly when you earn as Adbirt Publisher
                            </p>
                            <br />
                            <a href="/actions-and-events" class="btn btn-danger bg-primary-color">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STEPS -->
    <section class="container my-5">
        <div class="row d-flex justify-content-center mx-2">
            <h3 class="text-center text-black sub-heads">Monetize Your Website Traffic With Adbirt</h3>
        </div>

        <div class="mx-4">
            <div class="row">
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <img src="/public/assets-revamp/img/actions-and-events/register.png" class="steps_image" />
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center">
                    <div class="px-1 mx-1 px-sm-5 mx-sm-5">
                        <p class="h3 font-weight-bold open-sans-text text-custom-color">1. Create An Account</p>
                        <p class="open-sans-text font-size-16 text-custom-color font-weight-bold">Set up your publishers
                            account by
                            telling us more
                            about your
                            medium of
                            monetization.</p>
                    </div>
                </div>
            </div>

            <div class="row my-5 d-flex">
                <div class="col-12 col-md-6 d-flex align-items-center order-2 order-sm-1">
                    <div class="px-1 mx-1 px-sm-5 mx-sm-5">
                        <p class="h3 font-weight-bold open-sans-text text-custom-color">2. Choose An Ad Campaign</p>
                        <p class="open-sans-text font-size-16 text-custom-color font-weight-bold">Pick a Campaign that is
                            suitable
                            to
                            the interests of
                            your
                            Audience, i.e
                            email leads or website.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-start order-1 order-sm-2">
                    <img src="/public/assets-revamp/img/actions-and-events/choose-ad.png" class="steps_image" />
                </div>
            </div>

            <div class="row my-5">
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <img src="/public/assets-revamp/img/actions-and-events/upload-ad.png" class="steps_image" />
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center">
                    <div class="px-1 mx-1 px-sm-5 mx-sm-5">
                        <p class="h3 font-weight-bold open-sans-text text-custom-color">3. Place It On Your Website</p>
                        <p class="open-sans-text font-size-16 text-custom-color font-weight-bold">Place it on your website,
                            Email
                            Leads, Social Media
                            handles,Whatsapp
                            group, Blog or other
                            Channels.</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row d-flex justify-content-center">
            <a href="/dashboard" class="btn btn-danger bg-primary-color">Start Earning Now</a>
        </div>
    </section>

    <section class="container my-5">
        <p class="text-center h2">
            <span class="text-primary-color">Best-</span>Converting Ad Formats
        </p>
        <p class="text-center">
            We offer the best-performing Ad formats that match the latest trending technology - choose the best ads
            format that interests you!
        </p>
        <br />
        <br />
        <div class="w-100">
            <p class="w-100 text-center">See all our Ad Formats:</p>
            <ul class="format_list w-100 d-md-flex justify-content-center pl-0">
                <li class="text-center"><a href="#" target="_blank" class="text-primary-color">Display
                        Banner</a></li>
                <li class="text-center"><a href="/native-ads" target="_blank" class="text-primary-color">Native Ads</a>
                </li>
                <li class="text-center"><a href="#" target="_blank" class="text-primary-color">Direct Links</a></li>
                <li class="text-center"><a href="#" target="_blank" class="text-primary-color">Video Ads</a></li>
                <li class="text-center"><a href="#" target="_blank" class="text-primary-color">Push Notifications</a>
                </li>
            </ul>
        </div>
    </section>

    <br />

    <!-- Testimonial page here -->
    <div class="container mt-3">

        <div class="text-center feed-back pt-1">
            <h2 class="text-primary-color font-weight-bold font-size-35 wow zoomIn" data-wow-duration="0.45s"
                data-wow-delay="0.4s" data-wow-offset="0">Our customer's feedback</h2>
            <center>
                <hr>
            </center>
        </div>

        <div class="row">
            <div class="col-md-4 wow zoomIn" data-wow-duration="0.45s" data-wow-delay="0.4s" data-wow-offset="0">
                <center class="feedback-title-wrapper">
                    <img class="paul-one img-fluid feedback-logo" src="public/assets-revamp/img/partners/yaioa-logo.png"
                        alt="YAIOA">
                </center>
                <div>
                    <h3 class="text-align-center">Yaioa</h3>
                </div>

                <div class="all-sentence card px-4 pt-4 feedback-card">
                    My company has been working with Adbirt for years. It's easy to use and it takes less than 3
                    minutes to create or add a new Campaign. Would recommend the platform for anyone who prioritizes
                    return on investment on their ads spend.
                </div>

            </div>

            <div class="col-md-4 wow zoomIn" data-wow-duration="0.45s" data-wow-delay="0.4s" data-wow-offset="0">
                <center class="feedback-title-wrapper">
                    <img class="vascon-sol feedback-logo" src="public/assets-revamp/img/partners/vascon-logo.jpeg"
                        alt="vascon">
                </center>
                <div>
                    <h3 class="text-align-center">Vascon</h3>
                </div>


                <p class="all-sentence  card px-4 pt-4 feedback-card">
                    I worked with this platform for lead generation, the results were impressive and their customer
                    care support is top-notch, I like the fact we only paid for successful leads & their platform
                    allows us to set budget within our means.
                </p>
            </div>


            <div class="col-md-4 wow zoomIn" data-wow-duration="0.45s" data-wow-delay="0.4s" data-wow-offset="0">
                <center class="feedback-title-wrapper">
                    <img class="neg-gas img-fluid feedback-logo" src="public/assets-revamp/img/partners/gasonerg-logo.jpeg"
                        alt="gasonerg">
                </center>
                <div>
                    <h3 class="text-align-center">Gasonerg</h3>
                </div>

                <p class="all-sentence card px-4 pt-4 feedback-card">
                    Excellent communication and a great team to work with! I recommend this ad network highly. The
                    ad works for me on sale and new lead to my business. I had a good experience with the company
                    you may want to give them a trial.
                </p>
            </div>
        </div>
    </div> --}}
    {{-- End Chilo's Design --}}

    {{-- Begin Reverted design --}}
    {{-- <div class="header" id="home">
        <div class="header_top">
            <div class="wrap">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('images/logo.png') }}">
                    </a>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="/" class="scroll">Home</a></li>
                        <li><a href="howitworks" class="scroll">How it works</a></li>
                        <li><a class="" href="pricing">Pricing</a></li>
                        <!-- <li><a href="partners" class="scroll">Partners</a></li> -->
                        <li><a href="support" class="scroll">Support</a></li>
                        <li class="login">
                            <div id="loginContainer"><a href="login" id="loginButton"><span>Login</span></a>

                            </div>
                        </li>
                        <div class="clear"></div>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div> --}}
    <div class="main">
        <div class="content">
            <div class="content_top">
                <div class="wrap">
                    <div class="banner_desc">
                        <h1><small class="set">Set the Cost!</small> <br /><span>Pay for Result!</span></h1>
                        <h3> <small class="set2">You set your Budget (Cost Per Action) and<br /> only pay when
                                your Product is consumed.</small></h3>
                        <a class="play_icon fancybox-media" href="https://vimeo.com/33790882">

                            <!-- <img src="{{ asset('images/play-icon.png') }}"> -->

                        </a>
                        <h3>Signup for <span>FREE</span> today!</h3>
                        <p>No credit card required.</p>
                        <div class="sign_up">
                            <form>
                                <input type="text" value="E-mail address " onFocus="this.value = '';"
                                    onBlur="if (this.value == '') {this.value = 'E-mail address';}">
                                <input type="submit" value="Sign Up">
                            </form>
                        </div>
                    </div>
                    <div class="ipad">
                        <!-- <img src="images/ipad.png" alt="" /> -->
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="features" id="features">
                <div class="wrap">
                    <h2>Adbirt for <span>Advertisers</span></h2>
                    <h4>Signup as an Advertiser within minutes &amp; get your Ads across our Ad Networks</h4>
                    <div class="features_grids">
                        <div class="section group">
                            <div class="grid_1_of_4 images_1_of_4">

                                <img src="{{ asset('images/signup.jpg') }}">


                                <h3>Create an Account</h3>
                                <p>Signing up on Adbirt as an Advertiser is the first step to putting your message across
                                    our Ad Network.</p>
                            </div>
                            <div class="grid_1_of_4 images_1_of_4">

                                <img src="{{ asset('images/fundwallet.jpg') }}">


                                <h3>Fund your Ads Wallet</h3>
                                <p>You can Fund your Wallet with as low as $1 and you can set a CPA (Cost per action) to as
                                    low as $0.01 / Action.</p>
                            </div>
                            <div class="grid_1_of_4 images_1_of_4">

                                <img src="{{ asset('images/createads.jpg') }}">


                                <h3>Create your First Ads</h3>
                                <p>Create a nice and professional looking Ads to capture your Audience using our Ads
                                    Campaign builder .</p>
                            </div>
                            <div class="grid_1_of_4 images_1_of_4">

                                <img src="{{ asset('images/setbudget.jpg') }}">


                                <h3>Set your Budget</h3>
                                <p>Like we made mention earlier, you are in control of the CPA, set your Budget your way,
                                    within your means.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="features" id="features">
                <div class="wrap">
                    <h2>Adbirt for <span class="pub">Publishers</span></h2>
                    <h4>Signup as a Publisher within minutes &amp; start earning</h4>
                    <div class="features_grids">
                        <div class="section group">
                            <div class="grid_1_of_4 images_1_of_4">
                                <img src="{{ asset('images/publisher-signup.jpg') }}">
                                <h3>Create an Account</h3>
                                <p>Setup your Publishers Account by telling us more about your medium of Monetization.</p>
                            </div>
                            <div class="grid_1_of_4 images_1_of_4">
                                <img src="{{ asset('images/choosead.jpg') }}">
                                <h3>Choose an Ad Campaign</h3>
                                <p>Pick a Campaign that is suitable to the interest of your Audience, be it Email list or
                                    website.</p>
                            </div>
                            <div class="grid_1_of_4 images_1_of_4">
                                <img src="{{ asset('images/placeitonyourwebsite.jpg') }}">
                                <h3>Place it on your Website</h3>
                                <p>Place it on your Website, Email list, Social media handles, WhatsApp group, Blog or other
                                    channels.</p>
                            </div>
                            <div class="grid_1_of_4 images_1_of_4">
                                <img
                                    src="{{ asset('images/earn-and-withdraw-instantly-from-adbirt-publisher-account.jpg') }}">
                                <h3>Earn and Withdraw Instantly</h3>
                                <p>Track your earnings and make withdrawal request anytime you earn, No threshold, no limit
                                    to earnings.</p>
                            </div>
                        </div>
                        <div class="button"><a class="" href="/register">Signup Now
                                <img src="{{ asset('images/arrow.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Reverted design --}}

@stop

@section('script')
    {{-- <!-- Wavify JS -->
    <script src="public/assets-revamp/js/wavify.js"></script>
    <script src="public/assets-revamp/js/TweenMax.min.js"></script>
    <!-- jQuery Wavify JS -->
    <script src="public/assets-revamp/js/jquery.wavify.js"></script>

    <script>
        //**===================a Adbirt banner waves ===================**//		
        $('#adbirt-wavify') && $("#adbirt-wavify path#wave").wavify({
            height: 80,
            bones: 2,
            amplitude: 75,
            color: "#fff",
            speed: .45
        });

        $('#adbirt-wavify').length && $('#adbirt-wavify').css({
            width: '100%',
            zIndex: 999
        })
    </script> --}}
@stop
