@extends('layouts.frontend')



@section('content')


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
