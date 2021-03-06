@extends('layouts.frontend')

@section('style')
    <style>
        .join-free-feature-img {
            transform: scale(1);
            transition: 1.5s all;
            object-position: 50px 0;
        }

        .join-free-feature-img:hover {
            transform: scale(1.2);
        }

        .adbirt-best-service-slide .adbirt-best-service-img:before {
            background: none !important;
        }

        .adbirt-best-service-img>img {
            width: 145px !important;
        }

        .serif-font {
            font-family: sans-serif;
        }

        {{-- .cursive-font {
            font-family: cursive;
        } --}} .times-roman-font {
            font-family: 'Times New Roman', Times, serif;
        }

        .adbirt-best-service-height {
            height: 150px !important;
            transition: 1.5s all;
        }

        .adbirt-best-service-height:hover {
            transform: scale(1.23);
        }

        @media screen (max-width: 600px) {
            .cursive-font {
                font-family: verdana !important;
            }
        }
    </style>
@stop

@section('content')
    <div class="adbirt-content clearfix">
        <div class="adbirt-page-heading adbirt-size-md adbirt-dynamic-bg"
            style="background-image: url(public/assets-revamp/img/blog/5.jpg); background-size:cover; background-position: center center;">
            <div class="container">
                <div class="adbirt-page-heading-in text-center">
                    <h1 class="adbirt-page-heading-title">How it works</h1>
                    <div class="adbirt-post-label">
                        <span><a href="/">Home</a></span>
                        <span>How it works</span>
                    </div>
                </div>
            </div>
        </div><!-- .adbirt-page-heading -->

    </div>




    <!-- Begin Adbirt for Advertisers -->
    {{-- <div class="container my-3">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-6">
                <div class="adbirt-section-title text-center wow zoomIn" data-wow-duration="0.3s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <h2 class="text-primary-color font-weight-bold cursive-font">For Advertisers</h2>
                </div>
            </div>
            <!--- END COL -->
        </div>
        <!--- END ROW -->

        <br>

        <div class="row">

            <div class="col-12 col-md-6 w-100 d-flex flex-column justify-content-center">
                <div class="">
                    <h3 style="font-size: 35px !important; line-height: 1.3 !important;"
                        class="font-weight-bold text-left w-75">Increase your sales
                        and generate new leads with Adbirt Ads.</h3>

                    <p class="serif-font">With our robust technology, we'll tailor your product
                        or service in front of the prospective customer who is
                        searching for your business online. And pay your desired amount only when you make sale or leads.
                    </p>

                    <br />

                    <a href="/dashboard" class="btn bg-primary-color text-white font-weight-bold serif-font">Learn More</a>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div style="overflow: hidden !important;">
                    <img src="/public/assets-revamp/img/phone-join-free.png" alt="Join Adbirt for free"
                        class="img-fluid join-free-feature-img" />
                </div>
            </div>

            <br />
            <br />
            <br />

            <h3 style="font-size: 30px !important;" class="text-center w-100 times-roman-font">Get the best results that
                interest you</h3>

            <br />
            <br />
            <br />

            <div class="row owl-theme d-flex align-items-center justify-content-between p-0 m-0">

                <div class="col-12 col-md-4 col-lg-4 adbirt-best-service-slide m-0 p-0 wow zoomIn p-3"
                    data-wow-duration="0.45s" data-wow-delay="0.4s" data-wow-offset="0">
                    <div class="">
                        <div class="adbirt-best-service-img d-flex flex-row justify-content-center">
                            <img src="/public/assets-revamp/img/services/shopping-action.jpg" alt="CPA">
                        </div>
                        <div class="adbirt-best-service-content p-2">
                            <h3 class="adbirt-best-service-title">Cost Per Action</h3>
                            <p
                                class="shadow-lg p-3 adbirt-best-service-height adbirt-best-service-description cursive-font">
                                Promote your
                                products or service online pay your
                                desired
                                amount when you make a sale or get a new lead to your business.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-4 col-lg-4 adbirt-best-service-slide m-0 p-0 wow zoomIn p-3"
                    data-wow-duration="0.45s" data-wow-delay="0.4s" data-wow-offset="0">
                    <div class="">

                        <div class="adbirt-best-service-img d-flex flex-row justify-content-center">
                            <img src="/public/assets-revamp/img/services/cost-per-sale.png" alt="CPC">
                        </div>
                        <div class="adbirt-best-service-content p-2">
                            <h3 class="adbirt-best-service-title">Cost per Sales</h3>
                            <p
                                class="shadow-lg p-3 adbirt-best-service-height adbirt-best-service-description px-1 cursive-font">
                                You're
                                in total control of your ad budget, set the
                                cost
                                within your means and only pay after a successful sales or leads.
                            </p>
                        </div>

                    </div>
                </div>


                <div class="col-12 col-md-4 col-lg-4 adbirt-best-service-slide m-0 p-0 wow zoomIn p-3"
                    data-wow-duration="0.45s" data-wow-delay="0.4s" data-wow-offset="0">
                    <div class="">
                        <div class="adbirt-best-service-img d-flex flex-row justify-content-center">
                            <img src="/public/assets-revamp/img/services/click-action.jpeg" alt="CPD">
                        </div>
                        <div class="adbirt-best-service-content p-2">
                            <h3 class="adbirt-best-service-title">Cost Per Click</h3>
                            <p
                                class="shadow-lg p-3 adbirt-best-service-height adbirt-best-service-description cursive-font">
                                Get unlimited
                                impressions to your business for free
                                and
                                only pay for a valid click when users visit or land on your websites.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column align-items-center justify-content-center w-100">
                    <a href="/dashboard" class="adbirt-themes-btn red mt-3">Start now for free</a>
                </div>
            </div>

            <br />
            <br />
            <br />
            <!--- END ROW -->


        </div>
        <!--- END ROW -->
    </div> --}}
    <!-- End Adbirt for Advertisers -->

    {{-- <div class="d-flex flex-row align-items-center justify-content-center w-100">
        <img src="/public/assets-revamp/img/adbirt-plus.png" alt="" />
    </div> --}}

    <!-- Begin Adbirt for Publishers -->
    {{-- <div class="container my-3">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-6">
                <div class="adbirt-section-title text-center wow zoomIn" data-wow-duration="0.3s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <h2 class="text-primary-color font-weight-bold cursive-font">For Publishers</h2>
                </div>
            </div>
            <!--- END COL -->
        </div>
        <!--- END ROW -->

        <br>

        <div class="row">

            <div class="col-12 col-md-6 w-100 d-flex flex-column justify-content-center">
                <div class="">
                    <h3 style="font-size: 35px !important; line-height: 1.3 !important;"
                        class="font-weight-bold text-left w-75">No minimum threshold
                        is required and there's
                        no limit to earnings.</h3>

                    <p class="serif-font">We acknowledge creating good content is hard. Therefore monetizing it
                        shouldn't be difficult. Join
                        thousands of pub
                        lishers like yours to Monetize your website traffic and with
                        draw instantly when you earn as Adbirt Publisher.
                    </p>

                    <br />

                    <a href="/dashboard" class="btn bg-primary-color text-white font-weight-bold">Learn More</a>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div style="overflow: hidden !important;">
                    <img src="/public/assets-revamp/img/phone-monetize.png" alt="Join Adbirt for free"
                        class="img-fluid join-free-feature-img" />
                </div>
            </div>

            {{-- <div class="adbirt-best-service-slide">
                        <div class="adbirt-best-service-img">
                            <img src="public/assets-revamp/img/how-it-works/signup.png" alt="Sign up" height="232">
                        </div>
                        <div class="adbirt-best-service-content">
                            <h3 class="adbirt-best-service-title">1. Create an Account</h3>
                            <p class="adbirt-best-service-description">Signing up on Adbirt as an Advertiser is the
                                first step to putting your message across our Ad Network.
                            </p>
                        </div>
                    </div> --}

            <br />
            <br />
            <br />
            <br />
            <br />

            <h3 style="font-size: 30px !important;" class="text-center w-100 times-roman-font">Monetize Your Website Traffic
                With Adbirt</h3>

            <br />
            <br />
            <br />

            <div class="row owl-theme d-flex align-items-center justify-content-between p-0 m-0">

                <div class="col-12 col-md-4 col-lg-4 adbirt-best-service-slide m-0 p-0 wow zoomIn p-3"
                    data-wow-duration="0.45s" data-wow-delay="0.4s" data-wow-offset="0">
                    <div class="">
                        <div class="adbirt-best-service-img d-flex flex-row justify-content-center">
                            <img src="/public/assets-revamp/img/create-account.jpg" alt="">
                        </div>
                        <div class="adbirt-best-service-content p-2">
                            <h3 class="adbirt-best-service-title">Create Account</h3>
                            <p
                                class="shadow-lg p-3 adbirt-best-service-height adbirt-best-service-description cursive-font">
                                Setup your
                                publishers account by telling us more about
                                your medium of monetization.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-4 col-lg-4 adbirt-best-service-slide m-0 p-0 wow zoomIn p-3"
                    data-wow-duration="0.45s" data-wow-delay="0.4s" data-wow-offset="0">
                    <div class="">

                        <div class="adbirt-best-service-img d-flex flex-row justify-content-center">
                            <img src="/public/assets-revamp/img/choose-campaign.png" alt="">
                        </div>
                        <div class="adbirt-best-service-content p-2">
                            <h3 class="adbirt-best-service-title">Choose Campaign Type</h3>
                            <p
                                class="shadow-lg p-3 adbirt-best-service-height adbirt-best-service-description px-1 cursive-font">
                                Pick a
                                Campaign that is suitable to the interests of your
                                Audience, i.e email leads or website.
                            </p>
                        </div>

                    </div>
                </div>


                <div class="col-12 col-md-4 col-lg-4 adbirt-best-service-slide m-0 p-0 wow zoomIn p-3"
                    data-wow-duration="0.45s" data-wow-delay="0.4s" data-wow-offset="0">
                    <div class="">
                        <div class="adbirt-best-service-img d-flex flex-row justify-content-center">
                            <img src="/public/assets-revamp/img/place-on-website.png" alt="">
                        </div>
                        <div class="adbirt-best-service-content p-2">
                            <h3 class="adbirt-best-service-title">Put it on your website</h3>
                            <p
                                class="shadow-lg p-3 adbirt-best-service-height adbirt-best-service-description cursive-font">
                                Place it on
                                your website, Email Leads, Social Media
                                handles,Whatsapp group, Blog or other Channels.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column align-items-center justify-content-center w-100">
                    <a href="/dashboard" class="adbirt-themes-btn red mt-3">Start earning now</a>
                </div>
            </div>

            <br />
            <br />
            <br />
            <!--- END ROW -->


        </div>
        <!--- END ROW -->
    </div> --}}
    <!-- End Adbirt for Publishers -->


    {{-- <div class="container mt-3 mb-2">
        <h3 class="text-center" style="font-size: 30px !important;">
            <span class="text-primary-color times-roman-font" style="font-size: 30px !important;">Best-</span>Converting Ad
            formats
        </h3>

        <p class="text-center cursive-font">
            We offer the best-performing Ad formats that match the latest trending technology - choose the best ads format
            that interests you!
        </p>

        <p style="font-size: 20px !important;" class="text-center times-roman-font">See all our Ad Formats:</p>

        <br />
        <br />

        <ul class="w-100 p-2 d-flex flex-row flex-wrap align-items-center justify-content-center text-primary-color">
            <li class="p-3"> <a class="no-text-decoration" href="/dashboard">DISPLAY BANNER</a></li>
            <li class="p-3"> <a class="no-text-decoration" href="/dashboard">NATIVE ADS</a>
            </li>
            <li class="p-3"> <a class="no-text-decoration" href="/dashboard">DIRECT LINKS</a></li>
            <li class="p-3"> <a class="no-text-decoration" href="/dashboard">VIDEO ADS</a></li>
            <li class="p-3"> <a class="no-text-decoration" href="/dashboard">PUSH NOTIFICATIONS</a></li>
        </ul>
    </div> --}}
    {{-- end: new home page --}}


    {{-- begin: old how it works --}}
    <!-- Begin Adbirt for Advertisers -->
    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-6">
                <div class="adbirt-section-title text-center wow zoomIn" data-wow-duration="0.3s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <h2 class="text-primary-color font-weight-bold">Adbirt for Advertisers</h2>
                    <p class="text-black">Signup as an Advertiser within minutes & get your Ads across our Ad
                        Networks.</p>
                </div>
            </div>
            <!--- END COL -->
        </div>
        <!--- END ROW -->

        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme adbirt-main-testimonials adbirt-testimonial-slider">

                    <div class="adbirt-best-service-slide">
                        <div class="adbirt-best-service-img">
                            <img src="public/assets-revamp/img/how-it-works/signup.png" alt="Sign up" height="232">
                        </div>
                        <div class="adbirt-best-service-content">
                            <h3 class="adbirt-best-service-title">1. Create an Account</h3>
                            <p class="adbirt-best-service-description">Signing up on Adbirt as an Advertiser is the
                                first step to putting your message across our Ad Network.
                            </p>
                        </div>
                    </div>

                    <div class="adbirt-best-service-slide px-1">
                        <div class="adbirt-best-service-img">
                            <img src="public/assets-revamp/img/how-it-works/fundwallet.jpg" alt="Sign up" height="232">
                        </div>
                        <div class="adbirt-best-service-content">
                            <h3 class="adbirt-best-service-title">2. Fund your Ads Wallet</h3>
                            <p class="adbirt-best-service-description">You can Fund your Wallet with as low as $5
                                and you can set a CPA (Cost per action) to as low as $0.02/Action.
                            </p>
                        </div>
                    </div>

                    <div class="adbirt-best-service-slide px-1">
                        <div class="adbirt-best-service-img">
                            <img src="public/assets-revamp/img/how-it-works/createads.jpg" alt="Sign up" height="232">
                        </div>
                        <div class="adbirt-best-service-content">
                            <h3 class="adbirt-best-service-title">3. Create your First Ads</h3>
                            <p class="adbirt-best-service-description">Create a nice and professional looking Ads
                                to
                                capture your Audience using our Ads Campaign builder.
                            </p>
                        </div>
                    </div>

                    <div class="adbirt-best-service-slide px-1">
                        <div class="adbirt-best-service-img">
                            <img src="public/assets-revamp/img/how-it-works/setbudget.jpg" alt="Sign up" height="232">
                        </div>
                        <div class="adbirt-best-service-content">
                            <h3 class="adbirt-best-service-title">4. Set your Budget</h3>
                            <p class="adbirt-best-service-description">Like we made mention earlier, you are in
                                control of the CPA, set your Budget your way, within your means.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--- END ROW -->
    </div>
    <!-- End Adbirt for Advertisers -->

    <!-- Begin Adbirt for Publishers -->
    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-6">
                <div class="adbirt-section-title text-center wow zoomIn" data-wow-duration="0.3s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <h2 class="text-primary-color font-weight-bold">Adbirt for Publishers</h2>
                    <p class="text-black">Signup as a Publisher within minutes & start earning.</p>
                </div>
            </div>
            <!--- END COL -->
        </div>
        <!--- END ROW -->

        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme adbirt-main-testimonials adbirt-testimonial-slider">

                    <div class="adbirt-best-service-slide">
                        <div class="adbirt-best-service-img">
                            <img src="public/assets-revamp/img/how-it-works/signup.png" alt="Sign up" height="232">
                        </div>
                        <div class="adbirt-best-service-content">
                            <h3 class="adbirt-best-service-title">1. Create an Account</h3>
                            <p class="adbirt-best-service-description">Setup your Publishers Account by telling us
                                more about your medium of Monetization.
                            </p>
                        </div>
                    </div>

                    <div class="adbirt-best-service-slide">
                        <div class="adbirt-best-service-img">
                            <img src="public/assets-revamp/img/how-it-works/choose-campaign.png" alt="Sign up" height="232">
                        </div>
                        <div class="adbirt-best-service-content">
                            <h3 class="adbirt-best-service-title">2. Choose an Ad Campaign</h3>
                            <p class="adbirt-best-service-description">Pick a Campaign that is suitable to the
                                interest of your Audience, be it Email list or website.
                            </p>
                        </div>
                    </div>

                    <div class="adbirt-best-service-slide">
                        <div class="adbirt-best-service-img">
                            <img src="public/assets-revamp/img/how-it-works/place-on-website.png" alt="Sign up"
                                height="232">
                        </div>
                        <div class="adbirt-best-service-content">
                            <h3 class="adbirt-best-service-title">3. Place it on your Website</h3>
                            <p class="adbirt-best-service-description">Place it on your Website, Email list, Social
                                media handles, WhatsApp group, Blog or other channels.
                            </p>
                        </div>
                    </div>

                    <div class="adbirt-best-service-slide">
                        <div class="adbirt-best-service-img">
                            <img src="public/assets-revamp/img/how-it-works/setbudget.jpg" alt="Sign up" height="232">
                        </div>
                        <div class="adbirt-best-service-content">
                            <h3 class="adbirt-best-service-title">4. Earn and Withdraw Instantly</h3>
                            <p class="adbirt-best-service-description">Track your earnings and make withdrawal
                                request anytime you earn, No threshold, no limit to earnings.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--- END ROW -->
    </div>
    <!-- End Adbirt for Publishers -->

    {{-- <div class="container pt-1 pb-4">
        <br>
        <div class="d-flex align-items-center justify-content-center">
            <a href="/dashboard" class="text-white font-weight-bold bg-primary-color btn">Let's Start</a>
        </div>
        <br>
    </div>
    {{-- end: old how it works --}}

@stop
