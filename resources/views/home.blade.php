@extends('layouts.home_layout')

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

    </style> --}}

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500,900' rel='stylesheet' type='text/css'>
    <link href="{{ asset('/css/magnific-popup.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
    {{-- <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon" /> --}}
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
                        <li><a class="/pricing" class="scroll">Pricing</a></li>
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
                        <h1 style="line-height: 1 !important;"><small class="set"
                                style="font-size: 40px !important;">Set the Cost!</small>
                            <br />
                            <span style="font-size: 40px !important; color: #fff !important;">Pay for
                                Result!</span>
                        </h1>
                        <h3> <small class="set2"
                                style="background-color: rgb(25, 77, 25) !important; padding: 4px !important; border-radius: 4px !important;">
                                You set your Budget (Cost Per Action) and<br /> only pay when your Product is
                                consumed.</small></h3>
                        {{-- <a class="play_icon fancybox-media" href="https://vimeo.com/33790882">
                            <!-- <img src="{{ asset('images/play-icon.png') }}"> -->
                        </a> --}}
                        {{-- <h3
                            style="background-color: rgb(25, 77, 25) !important; display: inline !important; color: #fff !important;">
                            Signup for
                            <span>FREE</span> today!
                        </h3> --}}
                        <br>
                        <i style="background-color: rgb(25, 77, 25) !important; color: #fff !important;">No credit card
                            required.</i>
                        <br />
                        <br />
                        <a href="/dashboard" class="btn btn-danger bg-primary-color">Sign up for FREE</a>
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
                <div class="wrap">
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
                </div>
            </div>

            <div class="features" id="features">
                <div class="wrap">
                    <h2>Adbirt for <span class="theme-primary-color" style="font-size: 64px !important;">Publishers</span>
                    </h2>
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
                        <div class="button"><a class="" href="/dashboard">Signup Now
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
