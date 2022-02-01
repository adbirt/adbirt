@extends('layouts.frontend')

@section('content')
    <!-- Slider Start -->
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
                                            class="adbirt-themes-btn red animate__animated animate__fadeInUp">@if (Auth::user()) Let's Start @else Sign Up For Free @endif</a>
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
                                            class="adbirt-themes-btn red animate__animated animate__fadeInUp">@if (Auth::user()) Let's Start @else Sign Up For Free @endif</a>
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

    <br>


    <!-- About Section Start -->
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
                        <a class="adbirt-themes-btn red" href="/dashboard">@if (Auth::user()) Let's Start @else Sign Up For Free @endif</a>
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
    <br />
    <br />

    <!-- Benefit session start here -->
    <!-- <section>

                                                            <div class="text-center feed-back pt-5">
                                                                <h2 class="text-primary-color font-weight-bold font-size-35">What you'll benefit</h2>

                                                                <center>
                                                                    <hr>
                                                                </center>
                                                            </div>

                                                            <div class="container mt-2">


                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <h3 class="text-center">01</h3>
                                                                        <p class="all-second">
                                                                            We offer you the lowest cost for your marketing, and you're in total control of your
                                                                            marketing budget set your cost within your means & only pay for the result.
                                                                        </p>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <h3 class="text-center">02</h3>
                                                                        <p class="all-second">
                                                                            With the innovation of our technology, We will promote your product or service to the
                                                                            targeted audience who are likely to buy from you only
                                                                        </p>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <h3 class="text-center">03</h3>
                                                                        <p class="all-second">
                                                                            We guarantee our advertisers 100% return on investment from their ads-spend.YOu don't have
                                                                            to pay a dime if you don't make a sale or get a new lead to your business
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </section> -->
    <!-- End Benefit session start here -->

    <br />
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
                    I worked with this platform for lead generation the results were impressive and their customer
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
                    ad works for me on sale and new lead to my business .I had a good experience with the company
                    you may want to give them a trial.
                </p>
            </div>
        </div>
    </div>
    <!-- End Testimonial page here -->

    <!-- TESTIMONIAL SECTION START-->
    <!-- <section id="testimonial" class="adbirt-section-padding">
                                                   <div class="container">
                                                    <div class="row justify-content-center">
                                                     <div class="col-lg-7 col-xl-6">
                                                      <div class="adbirt-section-title text-center wow zoomIn" data-wow-duration="1s"
                                                       data-wow-delay="0.3s" data-wow-offset="0">
                                                       <h5 class="adbirt-sheading"> Testimonial</h5>
                                                       <h2 class="">Client Feedback</h2>
                                                       <p>Lorem ipsum dolor sit amet elit , consectetur adipiscing , sed eiusmod tempor sit amet
                                                        elit dolor sit amet elit.</p>
                                                      </div>
                                                     </div>
                                                     <--- END COL --
                                                    </div>
                                                    <--- END ROW --


                                                    <div class="row">
                                                     <-- Testimonials section Starts--
                                                     <div class="col-lg-8 offset-lg-2">
                                                      <div id="testimonial-slider"
                                                       class="adbirt-testimonials-slide adbirt-main-testimonials adbirt-testimonial-slider owl-carousel owl-theme">
                                                       <div class="adbirt-testimonial-single">
                                                        <div class="adbirt-testimonial-pic">
                                                         <a href=""><img src="public/assets-revamp/img/portfolio/3.jpg" alt="Portfolio Image"></a>
                                                        </div>
                                                        <div class="adbirt-testimonial-content">
                                                         <p class="adbirt-testimonial-description">
                                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi
                                                          blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi
                                                          nam natus perferendis possimus quasi sint.
                                                         </p>
                                                         <h2 class="adbirt-testimonial-title mt-3">Expediter
                                                          <small class="adbirt-testimonial-post">Jzaa Dancer</small>
                                                         </h2>
                                                         <div class="adbirt-testimonial-icon mt-2">
                                                          <i class="fas fa-star"></i>
                                                          <i class="fas fa-star"></i>
                                                          <i class="fas fa-star"></i>
                                                         </div>
                                                        </div>
                                                       </div>
                                                       <div class="adbirt-testimonial-single">
                                                        <div class="adbirt-testimonial-pic">
                                                         <a href=""><img src="public/assets-revamp/img/portfolio/4.jpg" alt="Portfolio Image"></a>
                                                        </div>
                                                        <div class="adbirt-testimonial-content">
                                                         <p class="adbirt-testimonial-description">
                                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi
                                                          blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi
                                                          nam natus perferendis possimus quasi sint.
                                                         </p>
                                                         <h2 class="adbirt-testimonial-title mt-3">Originator
                                                          <small class="adbirt-testimonial-post">Jzaa Dancer</small>
                                                         </h2>
                                                         <div class="adbirt-testimonial-icon mt-2">
                                                          <i class="fas fa-star"></i>
                                                          <i class="fas fa-star"></i>
                                                          <i class="fas fa-star-half-alt"></i>
                                                         </div>
                                                        </div>
                                                       </div>
                                                      </div>
                                                     </div>
                                                     <--- END COL --
                                                    </div>
                                                    <--- END ROW --
                                                   </div>
                                                   <--- END CONTAINER --
                                                  </section> -->
    <!-- TESTIMONIAL SECTION END-->


    <!-- START COMPANY BRAND LOGO  -->
    <!-- <div id="adbirt-brand-area" class="adbirt-section-padding">
                                                   <div class="adbirt-brand-overlay">
                                                    <div class="container">
                                                     <div class="row clearfix">
                                                      <center class="col-md-12 col-lg-12">
                                                       <center class="adbirt-brand-active owl-carousel">
                                                        <a href="#"><img src="public/assets-revamp/img/partner/1.png" alt="image"></a>
                                                        <a href="#"><img src="public/assets-revamp/img/partner/2.png" alt="image"></a>
                                                        <a href="#"><img src="public/assets-revamp/img/partner/3.png" alt="image"></a>
                                                       </center>
                                                      </center><-- END COL  --
                                                     </div>
                                                     <--END  ROW  --
                                                    </div><-- END CONTAINER  --
                                                   </div><-- END OVERLAY --
                                                  </div> -->
    <!-- END COMPANY BRAND LOGO -->
@stop

@section('script')
    <script>
        //**===================a Adbirt banner waves ===================**//		
        $('#adbirt-wavify') && $("#adbirt-wavify svg path#wave").wavify({
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
    </script>
@stop
