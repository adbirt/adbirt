@extends('layouts.frontend')

@section('style')
    <style>
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

        .adbirt-page-heading {
            height: 140px !important;
        }

        @media (min-width: 992px) {
            .hero_image {
                width: 600px;
                image-rendering: pixelated !important;
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

    </style>
@stop

@section('content')

    <div class="adbirt-content clearfix">
        <div class="adbirt-page-heading">
        </div><!-- adbirt-page-heading -->

    </div>

    <br />
    <br />

    <section class="my-5">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <p class="h3 text_title font-weight-bold">FOR ADVERTISERS</p>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col col-12 col-md-6 d-flex align-items-center">
                    <div class="px-0 mx-0 px-md-2 mx-md-2 px-lg-4 mx-lg-5">
                        <div class="px-2 mx-0 px-md-2 mx-md-2 px-xl-4 mx-xl-5">
                            <h1 class="h2">
                                Increase your sales and generate a new lead with Adbirt Ads
                            </h1>
                            <p class="">
                                With our robust technology, we'll tailor your product
                                or service in front of the prospective customer who is
                                searching for your business online. And pay your des
                                ired amount only when you make sale or leads.
                            </p>
                            <br />
                            <button class="btn btn-danger bg-primary-color">Learn More</button>
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
                <button class="btn btn-danger bg-primary-color">Learn More</button>
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
                                No minimum threshold
                                is required and there's
                                no limit to earnings.
                            </h2>
                            <p class="mr-5">
                                We acknowledge creating good content is hard. Therefore monetizing it shouldn't be
                                difficult. Join thousands of pub
                                lishers like yours to Monetize your website traffic and with
                                draw instantly when you earn as Adbirt Publisher.
                            </p>
                            <br />
                            <button class="btn btn-danger bg-primary-color">Learn More</button>
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

        {{-- <div class="m-4 row">
            <div class="col-12 col-md-4 d-flex-flex-row align-items-center justify-content-center text-center">
                <div>
                    <img src="/public/assets-revamp/img/actions-and-events/register.png" class="steps_image" />
                </div>
                <div class="text-custom-color text-center p-3 shadow step-card">
                    <p class="h3 font-weight-bold">1. Create An Account</p>
                    <p>Set up your publishers account by telling us more about your medium of monetization.</p>
                </div>
            </div>

            <div class="col-12 col-md-4 d-flex-flex-row align-items-center justify-content-center text-center">
                <div>
                    <img src="/public/assets-revamp/img/actions-and-events/choose-ad.png" class="steps_image" />
                </div>
                <div class="text-custom-color text-center p-3 shadow step-card">
                    <p class="h3 font-weight-bold">2. Choose An Ad Campaign</p>
                    <p>Pick a Campaign that is suitable to the interests of your Audience, i.e email leads or
                        website.</p>
                </div>
            </div>

            <div class="col-12 col-md-4 d-flex-flex-row align-items-center justify-content-center text-center">
                <div>
                    <img src="/public/assets-revamp/img/actions-and-events/upload-ad.png" class="steps_image" />
                </div>
                <div class="text-custom-color text-center p-3 shadow step-card">
                    <p class="h3 font-weight-bold">3. Place It On Your Website</p>
                    <p>Place it on your website, Email Leads, Social Media handles,Whatsapp group, Blog or other
                        Channels.</p>
                </div>
            </div>

        </div> --}}

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
            <button class="btn btn-danger bg-primary-color">Start Earning Now</button>
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
            <ul class="format_list w-100 d-md-flex justify-content-center pl-0 text-primary-color">
                <li class="text-center">Display Banner</li>
                <li class="text-center">Native Ads</li>
                <li class="text-center">Direct Links</li>
                <li class="text-center">Video Ads</li>
                <li class="text-center">Push Notifications</li>
            </ul>
        </div>
    </section>

    {{-- demarcation --}}

    <div class="adbirt-content clearfix">
        <div class="adbirt-page-heading adbirt-size-md adbirt-dynamic-bg"
            style="background-image: url(public/assets-revamp/img/blog/5.jpg); background-size:cover; background-position: center center;">
            <div class="container">
                <div class="adbirt-page-heading-in text-center">
                    <h1 class="adbirt-page-heading-title">Actions and events</h1>
                    <div class="adbirt-post-label">
                        <span><a href="/">Home</a></span>
                        <span>Actions and events</span>
                    </div>
                </div>
            </div>
        </div><!-- adbirt-page-heading -->

    </div>

    <!-- Begin Adbirt for Advertisers -->
    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-6">
                <div class="adbirt-section-title text-center wow zoomIn" data-wow-duration="0.3s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <p class="text-custom-color">Advertise your Products & Services and only pay when any of these Events
                        or Actions occur</p>
                </div>
            </div>
            <!--- END COL -->
        </div>
        <!--- END ROW -->

        <br>

        <div class="row m-0 p-0">

            <div class="adbirt-best-service-slide px-2 m-0 col-12 col-lg-3 col-md-3 py-4">
                <div class="adbirt-best-service-img">
                    <img src="public/assets-revamp/img/misc/download.jpg" alt="Cost per download"
                        style="height: 100px !important; object-fit: contain;">
                </div>
                <div class="adbirt-best-service-content">
                    <h3 class="adbirt-best-service-title">1. Cost Per Download (CPD)</h3>
                    <p class="adbirt-best-service-description">Cost Per Download (CPD) If you have a piece of eBook
                        or software that you want to promote, you can create an Ad and promote it across our Ad
                        network. You set your Cost Per Download (CPD). You will be charged that amount for every
                        download. NO Download, No Charge from your Account.
                    </p>
                </div>
            </div>

            <div class="adbirt-best-service-slide px-2 m-0 col-12 col-lg-3 col-md-3 py-4">
                <div class="adbirt-best-service-img">
                    <img src="public/assets-revamp/img/misc/cart.png" alt="Cost per sale"
                        style="height: 100px !important; object-fit: contain;">
                </div>
                <div class="adbirt-best-service-content">
                    <h3 class="adbirt-best-service-title">2. Cost per sale</h3>
                    <p class="adbirt-best-service-description">Cost Per Sales (CPS) If you have a Products that you
                        want to promote and Sell, you can create an Ad for this Product and add the Cost you are
                        willing to Pay per Sale. Once it's Live across our Ad Network, users will start seeing it
                        and click on it to buy. If they buy, we charge you the amount you set. If they don't buy,
                        your Money remains intact.
                    </p>
                </div>
            </div>

            <div class="adbirt-best-service-slide px-2 m-0 col-12 col-lg-3 col-md-3 py-4">
                <div class="adbirt-best-service-img">
                    <img src="public/assets-revamp/img/misc/signup.png" alt="Sign up"
                        style="height: 100px !important; object-fit: contain;">
                </div>
                <div class="adbirt-best-service-content">
                    <h3 class="adbirt-best-service-title">3. Cost Per Registration (CPR)</h3>
                    <p class="adbirt-best-service-description">Do you want New Customers to Register on your
                        Website? Create an Ad and set the amount you wish to pay per Signup. Only Pay when a user
                        successfully signs up on your site.
                    </p>
                </div>
            </div>

            <div class="adbirt-best-service-slide px-2 m-0 col-12 col-lg-3 col-md-3 py-4">
                <div class="adbirt-best-service-img">
                    <img src="public/assets-revamp/img/misc/email-lead.png" alt="Cost Per Email Lead"
                        style="height: 100px !important; object-fit: contain;">
                </div>
                <div class="adbirt-best-service-content">
                    <h3 class="adbirt-best-service-title">4. Cost Per Email Lead (CPEL)</h3>
                    <p class="adbirt-best-service-description">Do you want to capture Emails for your Email list or
                        you want to capture a certain data through form submmission? Create an Ad for this, set your
                        cost per submmission and start capturing your data across our Ad networks. Your Account will
                        only get charged on every successful submmission
                    </p>
                </div>
            </div>

            <div class="adbirt-best-service-slide px-1 m-0 col-12 col-lg-3 col-md-3 py-4">
                <div class="adbirt-best-service-img">
                    <img src="public/assets-revamp/img/misc/click.png" alt="Cost per click"
                        style="height: 100px !important; object-fit: contain;">
                </div>
                <div class=" adbirt-best-service-content">
                    <h3 class="adbirt-best-service-title">5. Cost Per Click (CPC)</h3>
                    <p class="adbirt-best-service-description">Do you need Traffic to your Website or Landing Page,
                        create an Ad and set your Cost Per Click. Anytime users successfully clicks that link to
                        land on your website, you get charged, else your money remains intact.
                    </p>
                </div>
            </div>

            <div class="adbirt-best-service-slide px-1 m-0 col-12 col-lg-3 col-md-3 py-4">
                <div class="adbirt-best-service-img">
                    <img src="public/assets-revamp/img/misc/call.png" alt="Sign up"
                        style="height: 100px !important; object-fit: contain;">
                </div>
                <div class="adbirt-best-service-content">
                    <h3 class="adbirt-best-service-title">6. Cost Per Call (Cost Per Call)</h3>
                    <p class="adbirt-best-service-description">PDo you have an Offer where you need interested
                        Prospect to Call you for negotiation and more details. Create an Ad about this Offer, set
                        your Cost Per call and go Live across our Ad network. Once a Customer clicks the button and
                        call you, you get charged, else your money remains intact. Learn more on integrating the
                        Call functionality on your website.
                    </p>
                </div>
            </div>

            <div class="adbirt-best-service-slide px-1 m-0 col-12 col-lg-3 col-md-3 py-4">
                <div class="adbirt-best-service-img">
                    <img src="public/assets-revamp/img/misc/install.png" alt="Sign up"
                        style="height: 100px !important; object-fit: contain;">
                </div>
                <div class="adbirt-best-service-content">
                    <h3 class="adbirt-best-service-title">7. Cost Per Install (Coming Soon)</h3>
                    <p class="adbirt-best-service-description">Only Pay for Successful Installations.
                    </p>
                </div>
            </div>

            <div class="adbirt-best-service-slide px-1 m-0 col-12 col-lg-3 col-md-3 py-4">
                <div class="adbirt-best-service-img">
                    <img src="public/assets-revamp/img/misc/recommendation.png" alt="Recommendation"
                        style="height: 100px !important; object-fit: contain;">
                </div>
                <div class="adbirt-best-service-content">
                    <h3 class="adbirt-best-service-title">8. Cost Per Recommendation (Coming Soon)
                    </h3>
                    <p class="adbirt-best-service-description">Only Pay for Recommendations.
                    </p>
                </div>
            </div>

        </div>

    </div>

    <div class="container pt-1 pb-4">
        <br>
        <div class="d-flex align-items-center justify-content-center">
            <a href="/dashboard" class="text-white font-weight-bold bg-primary-color btn">Let's Start</a>
        </div>
        <br>
    </div>
@stop
