{{-- @extends('layouts.home_layout') --}}
@extends('layouts.frontend')


@section('style')
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500,900' rel='stylesheet' type='text/css'>
    <link href="{{ asset('/css/magnific-popup.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
@stop


@section('content')

    {{-- Begin: Reverted header --}}
    <div class="header" id="home">
        <div class="header_top">
            <div class="wrap">
                <div class="logo">
                    <a href="/"><img src="{{ asset('images/logo.png') }}"></a>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="/" class="scroll">Home</a></li>
                        <li><a href="/how-it-works" class="scroll">How it works</a></li>
                        <li><a href="/pricing" class="scroll">Pricing</a></li>
                        <li><a target="_blank" href="https://adbirt.com/blog" class="scroll">Blog</a></li>
                        <li><a target="_blank" href="https://adbirt.com/contact" class="scroll">Contact</a></li>
                        <li class="login">
                            <div id="loginContainer">
                                <a href="/dashboard" id="loginButton">
                                    <span>
                                        @if (Auth::user())
                                            Dashboard
                                        @else
                                            Login
                                        @endif
                                    </span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="clear"></div>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    {{-- End: Reverted header --}}

    <div class="main">
        <div class="content">
            <div class="content_top">
                <div class="wrap">

                    <div class="banner_desc" style="text-align: center !important;">
                        <br />
                        <h1><small class="set" style="font-size: 40px !important; color: #fff !important;">Set
                                the Cost!</small>
                            <br />
                            <span style="font-size: 40px !important; color: #fff !important;">Pay for
                                Result!</span>
                        </h1>
                        <br />
                        <h3 style="background-color: rgb(64, 75, 36) !important; display: inline !important;">
                            <small class="set2" style="padding: 4px !important; border-radius: 4px !important;">
                                You set your Budget (Cost Per Action) and<br /> only pay when your Product is
                                consumed.</small>
                            <br />
                            <small>
                                <i style="color: #fff !important;">No credit card required.</i>
                            </small>
                        </h3>
                        <br />
                        <br />

                        {{-- <a href="/dashboard" style="border: none !important;" class="btn btn-danger bg-primary-color">
                            Sign up for <span style="font-weight: 900 !important;">FREE</span>
                        </a> --}}

                        <div class="button">
                            <a class="" href="/dashboard">
                                Sign up for <span style="font-weight: 900 !important;">FREE</span>
                                <img src="{{ asset('images/arrow.png') }}">
                            </a>
                        </div>

                        {{-- <div class="sign_up">
                            <form>
                                <input type="text" value="E-mail address " onFocus="this.value = '';"
                                    onBlur="if (this.value == '') {this.value = 'E-mail address';}" />
                                <input type="submit" value="Sign Up" />
                                
                            </form>
                        </div> --}}
                    </div>

                    <div class="ipad">
                        <!-- <img src="images/ipad.png" alt="" /> -->
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="features" id="features">

                {{-- <div class="wrap">
                    <h2>Adbirt for <span class="text-primary-color" style="font-size: 64px !important;">Advertisers</span>
                    </h2>
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
                </div> --}}

                <br />
                <br />

                <h2>Adbirt for <span class="text-primary-color" style="font-size: 64px !important;">Advertisers</span>
                </h2>

                {{-- begin: Chilo --}}
                <!-- FEATURES SECTION  -->
                <section class="mb-5 mx-4 mx-md-5- -px-md-5 pt-0">
                    <div class="my-5">
                        <div class="row mx-2 mx-sm-0 mx-md-5">

                            <div class="col col-lg-3 col-md-6 col-12">
                                <div class="feature_card d-flex flex-column align-items-center">
                                    <div class="feature_iconWrap">
                                        <img src="/public/assets-revamp/img/actions-and-events/theme-native.png"
                                            class="feature_icon" alt="click icon" width="130" height="130"
                                            style="width: 130px !important; height: 130px !important; object-fit: cover !important;" />
                                    </div>
                                    <div class="my-4 d-flex flex-column align-items-center">
                                        <h3 class="mt-3 open-sans-text text-custom-color pb-3">Native Ads</h3>
                                        <p
                                            class="mx-0 mx-lg-2 text-center open-sans-text font-size-16 text-custom-color font-weight-bold">
                                            Increase your sales and generate a new lead with Adbirt Native Ads that get
                                            higher click rates than the regular banner
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-lg-3 col-md-6 col-12">
                                <div class="feature_card d-flex flex-column align-items-center">
                                    <div class="feature_iconWrap">
                                        <img src="/public/assets-revamp/img/actions-and-events/theme-cpa.png"
                                            class="feature_icon" alt="click" width="130" height="130"
                                            style="width: 130px !important; height: 130px !important; object-fit: cover !important;" />
                                    </div>
                                    <div class="my-4 d-flex flex-column align-items-center">
                                        <h3 class="mt-3 open-sans-text text-custom-color pb-3">Cost Per Action</h3>
                                        <p
                                            class="mx-0 mx-lg-2 text-center open-sans-text font-size-16 text-custom-color font-weight-bold">
                                            Promote your products or service online pay your desired amount when you make a
                                            sale
                                            or get a new lead to
                                            your business.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-lg-3 col-md-6 col-12">
                                <div class="feature_card d-flex flex-column align-items-center">
                                    <div class="feature_iconWrap">
                                        <img src="/public/assets-revamp/img/actions-and-events/theme-cps.png"
                                            class="feature_icon" alt="click" width="130" height="130"
                                            style="width: 130px !important; height: 130px !important; object-fit: cover !important;" />
                                    </div>
                                    <div class="my-4 d-flex flex-column align-items-center">
                                        <h3 class="mt-3 open-sans-text text-custom-color pb-3">Cost Per Sales</h3>
                                        <p
                                            class="mx-0 mx-lg-2 text-center open-sans-text font-size-16 text-custom-color font-weight-bold">
                                            You're in total control of your ad budget, set the cost within your means and
                                            only
                                            pay after a successful
                                            sales or leads.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-lg-3 col-md-6 col-12">
                                <div class="feature_card d-flex flex-column align-items-center">
                                    <div class="feature_iconWrap">
                                        <img src="/public/assets-revamp/img/actions-and-events/theme-cpc.png"
                                            class="feature_icon" alt="click icon" width="130" height="130"
                                            style="width: 130px; height: 130px !important; object-fit: cover !important;" />
                                    </div>
                                    <div class="my-4 d-flex flex-column align-items-center">
                                        <h3 class="mt-3 open-sans-text text-custom-color pb-3">Cost Per Click</h3>
                                        <p
                                            class="mx-0 mx-lg-2 text-center open-sans-text font-size-16 text-custom-color font-weight-bold">
                                            Get unlimited impressions to your business for free and only pay for a valid
                                            click
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
                {{-- end: Chilo --}}

            </div>

            <br />
            <br />


            <div class="features" id="features">
                <div class="wrap">
                    <h2>Adbirt for <span style="font-size: 64px !important; color: #B1B7A9 !important;">Publishers</span>
                    </h2>
                    <h4>Signup as a Publisher within minutes &amp; start earning</h4>
                    <div class="features_grids">
                        <divcd class="section group">
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
                        </divcd>
                        <div class="button">
                            <a class="" href="/dashboard">Signup Now
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
