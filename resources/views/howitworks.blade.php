@extends('layouts.frontend')

@section('style')
    <style>
        .join-free-feature-img {
            transform: scale(1);
            transition: 1.5s all
        }

        .join-free-feature-img:hover {
            transform: scale(1.2);
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



        <!-- START OUR TEAM -->
        <!-- <section id="team" class="adbirt-team-area adbirt-section-padding">
                                                                                                                                                                                                                                 <div class="container">	
                                                                                                                                                                                                                                  <div class="row justify-content-center">
                                                                                                                                                                                                                                   <div class="col-lg-7 col-xl-6">
                                                                                                                                                                                                                                    <div class="adbirt-section-title text-center wow zoomIn" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                                                                                                                                                                                                                                     <h5 class="adbirt-sheading">Our Team Member</h5>
                                                                                                                                                                                                                                     <h2 class="">Meet Our Exclusive Member For Your Help</h2>
                                                                                                                                                                                                                                     <p>Lorem ipsum dolor sit amet elit , consectetur adipiscing , sed eiusmod tempor sit amet elit dolor sit amet elit.</p>
                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                   </div><!--- END COL --
                                                                                                                                                                                                                                  </div><!--- END ROW --
                                                                                                                                                                                                                                  
                                                                                                                                                                                                                                  <div class="row clearfix">
                                                                                                                                                                                                                                   <div class="col-lg-3 col-md-6 col-12">
                                                                                                                                                                                                                                    <div class="adbirt-single-team wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
                                                                                                                                                                                                                                     <div class="adbirt-team-pic">
                                                                                                                                                                                                                                      <img src="public/assets-revamp/img/team/1.jpg" alt="">
                                                                                                                                                                                                                                     </div>
                                                                                                                                                                                                                                     <div class="adbirt-team-content">
                                                                                                                                                                                                                                      <h3 class="adbirt-team-title">Khabir</h3>
                                                                                                                                                                                                                                      <span class="adbirt-team-post">IT Consultant</span>
                                                                                                                                                                                                                                     </div>
                                                                                                                                                                                                                                     <ul class="adbirt-team-social">
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-facebook"></a></li>
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-google-plus"></a></li>
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-instagram"></a></li>
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-linkedin"></a></li>
                                                                                                                                                                                                                                     </ul>
                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                   </div><!--- END COL --
                                                                                                                                                                                                                                   
                                                                                                                                                                                                                                   <div class="col-lg-3 col-md-6 col-12">
                                                                                                                                                                                                                                    <div class="adbirt-single-team wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                                                                                                                                                                                                                                     <div class="adbirt-team-pic">
                                                                                                                                                                                                                                      <img src="public/assets-revamp/img/team/2.jpg" alt="">
                                                                                                                                                                                                                                     </div>
                                                                                                                                                                                                                                     <div class="adbirt-team-content">
                                                                                                                                                                                                                                      <h3 class="adbirt-team-title">Malik</h3>
                                                                                                                                                                                                                                      <span class="adbirt-team-post">IT Developer</span>
                                                                                                                                                                                                                                     </div>
                                                                                                                                                                                                                                     <ul class="adbirt-team-social">
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-facebook"></a></li>
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-google-plus"></a></li>
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-instagram"></a></li>
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-linkedin"></a></li>
                                                                                                                                                                                                                                     </ul>
                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                   </div><!--- END COL --
                                                                                                                                                                                                                                   
                                                                                                                                                                                                                                   <div class="col-lg-3 col-md-6 col-12">
                                                                                                                                                                                                                                    <div class="adbirt-single-team wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s" data-wow-offset="0">
                                                                                                                                                                                                                                     <div class="adbirt-team-pic">
                                                                                                                                                                                                                                      <img src="public/assets-revamp/img/team/3.jpg" alt="">
                                                                                                                                                                                                                                     </div>
                                                                                                                                                                                                                                     <div class="adbirt-team-content">
                                                                                                                                                                                                                                      <h3 class="adbirt-team-title">Mubdi</h3>
                                                                                                                                                                                                                                      <span class="adbirt-team-post">IT Service</span>
                                                                                                                                                                                                                                     </div>
                                                                                                                                                                                                                                     <ul class="adbirt-team-social">
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-facebook"></a></li>
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-google-plus"></a></li>
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-instagram"></a></li>
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-linkedin"></a></li>
                                                                                                                                                                                                                                     </ul>
                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                   </div><!--- END COL --
                                                                                                                                                                                                                                   
                                                                                                                                                                                                                                   <div class="col-lg-3 col-md-6 col-12">
                                                                                                                                                                                                                                    <div class="adbirt-single-team wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" data-wow-offset="0">
                                                                                                                                                                                                                                     <div class="adbirt-team-pic">
                                                                                                                                                                                                                                      <img src="public/assets-revamp/img/team/4.jpg" alt="">
                                                                                                                                                                                                                                     </div>
                                                                                                                                                                                                                                     <div class="adbirt-team-content">
                                                                                                                                                                                                                                      <h3 class="adbirt-team-title">Raqib</h3>
                                                                                                                                                                                                                                      <span class="adbirt-team-post">Web Developer</span>
                                                                                                                                                                                                                                     </div>
                                                                                                                                                                                                                                     <ul class="adbirt-team-social">
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-facebook"></a></li>
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-google-plus"></a></li>
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-instagram"></a></li>
                                                                                                                                                                                                                                      <li><a href="#" class="fab fa-linkedin"></a></li>
                                                                                                                                                                                                                                     </ul>
                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                   </div><!--- END COL --
                                                                                                                                                                                                                                  </div><!--- END ROW --	
                                                                                                                                                                                                                                 </div><!--- END CONTAINER --
                                                                                                                                                                                                                                </section> --
                                                                                                                                                                                                                                <!-- END TEAM -->

    </div>




    <!-- Begin Adbirt for Advertisers -->
    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-6">
                <div class="adbirt-section-title text-center wow zoomIn" data-wow-duration="0.3s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <h2 class="text-primary-color font-weight-bold">For Advertisers</h2>
                </div>
            </div>
            <!--- END COL -->
        </div>
        <!--- END ROW -->

        <br>

        <div class="row">

            <div class="col-12 col-md-6">
                <div class="">
                    <h3 style="font-size: 35px !important; line-height: 1.3 !important;"
                        class="font-weight-bold text-left w-75">Increase your sales
                        and generate new leads with Adbirt Ads</h3>

                    <p>With our robust technology, we'll tailor your product
                        or service in front of the prospective customer who is
                        searching for your business online. And pay your des
                        ired amount only when you make sale or leads.
                    </p>

                    <br />

                    <a href="/" class="btn bg-primary-color text-white font-weight-bold">Learn More</a>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div style="overflow: hidden !important;">
                    <img src="/public/assets-revamp/img/phone-join-free.png" alt="Join Adbirt for free"
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
                    </div> --}}


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
                    <h2 class="text-primary-color font-weight-bold">For Publishers</h2>
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




    {{-- <!-- Begin Adbirt for Advertisers -->
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
                            <p class="adbirt-best-service-description">You can Fund your Wallet with as low as $1
                                and you can set a CPA (Cost per action) to as low as $0.01/Action.
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
    <!-- End Adbirt for Publishers --> --}}

    <div class="container pt-1 pb-4">
        <br>
        <div class="d-flex align-items-center justify-content-center">
            <a href="/dashboard" class="text-white font-weight-bold bg-primary-color btn">Let's Start</a>
        </div>
        <br>
    </div>

@stop
