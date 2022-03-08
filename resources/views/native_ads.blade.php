@extends('layouts.frontend')

@section('style')
    <style>
        .ads-three {
            width: 90% !important;
            height: 80% !important;
        }

        .ads-three {
            margin-left: 5% !important;
        }

        .ads-four {
            font-family: 'Times New Roman', Times, serif;
        }

        button {
            border: 1px solid;
            padding: 4px !important;
        }


        .images-one {
            width: 100% !important;
            height: 90% !important;
        }

        .All-every {
            font-family: 'Times New Roman', Times, serif;

        }

        .no-text-decoration:hover {
            color: cadetblue;
        }

        .no-text-decoration {
            text-decoration: none;
            color: #000;
            font-family: 'Times New Roman', Times, serif;
        }

        .Start-one {
            margin-left: 23% !important;
        }

        .Start-two {
            margin-left: 23% !important;
            padding: 2% !important;
        }


        .adbirt-page-heading {
            height: 140px;
        }

        .adbirt-feature-list {
            list-style-type: disc !important;
        }

    </style>
@stop

@section('content')

    <div class="adbirt-content clearfix">
        <div class="adbirt-page-heading custom-clearfix">
        </div><!-- adbirt-page-heading -->

    </div>

    <br />
    <br />

    <div class="container-lg">
        <div class="mt-5  All-one ">
            <h4 class=" text-center">
                New Native Ads for Advertisers:
            </h4>

            <h5 class="mt-3 text-center">
                Here's why Advertisers choose Adbirt Native Ads
            </h5>
        </div>


        <div class="row">
            <div class="col-lg-6 mt-3 ">
                <img src="/public/assets-revamp/img/point-ad.png" alt="" class="ads-three">
            </div>

            <div class="col-lg-6">
                <p class="text-black ads-four mt-4 ">
                    Unlike banner ads that interfere and can be completely ignored, Native ads appear in a design that
                    blends with
                    the real organic content. Due to its non-intrusive nature, it is user-friendly, which provides an
                    opportunity
                    for advertisers to engage with consumers and archive better performance that drives revenue and produce
                    a high return on investment.
                </p>

                <br />

                <div class="d-flex flex-row align-items-center justify-content-center">
                    <span class="bg-primary-color text-white text-center  p-2">
                        What makes us different from others.
                    </span>
                </div>

                <br />

                <div>

                    <ul class="adbirt-feature-list">
                        <li class="p-2"> <i class="fa fa-check text-primary-color"></i> <a
                                class="no-text-decoration" href="# ">Increase your sales and generate
                                a new lead to your
                                business</a></li>
                        <li class="p-2"> <a class="no-text-decoration" href="# ">You don't have to break the
                                banks to get
                                started</a></li>
                        <li class="p-2"> <a class="no-text-decoration" href="# ">Native Ads click rates are 10
                                times higher than
                                regular banner</a></li>
                        <li class="p-2"> <a class="no-text-decoration" href="# ">Write a short description of
                                your product or
                                service</a></li>
                        <li class="p-2"> <a class="no-text-decoration" href="# ">Responsive designs for all
                                devices (mobile,
                                desktop, tablet)</a></li>
                    </ul>

                </div>


                <p class="Start-two">
                    <button class="btn btn-danger bg-primary-color border-0">Start Now For Free</button>
                </p>

            </div>

        </div>

        <div class="row">
            <div class="col-lg-6  mt-4">

                <div>
                    <marquee>
                        <span class="text-center bg-primary-color text-white p-3">
                            NEW! NATIVE ADS fOR PUBLISHERS
                        </span>
                    </marquee>
                </div>

                <p class="text-black All-every mt-3 ">
                    Take advantage of our Native Ads to drive more revenue from your website traffic that completely blends
                    with
                    the content on your websites. This is the most effective ad format for building audience engagement and
                    retaining users on your website that reduces bounce rate for all Publishers
                </p>

                <div>

                    <ul class="">
                        <li class="p-2"> <a class="no-text-decoration" href="# ">Withdraw directly into your
                                Naija bank account when
                                you earn, and there's no minimum threshold required to withdrawal</a></li>

                        <li class="p-2"> <a class="no-text-decoration" href="# ">Generate high revenue with ads
                                that blend on your
                                website</a></li>


                        <li class="p-2"> <a class="no-text-decoration" href="# ">Easy to set up and
                                hassle-free</a></li>


                        <li class="p-2"> <a class="no-text-decoration" href="# ">Native Ads click rates are 10
                                times higher than
                                regular banner</a></li>


                        <li class="p-2"> <a class="no-text-decoration" href="# ">Responsive designs for all
                                devices (mobile,
                                desktop, tablet)</a></li>
                    </ul>
                    <p class="Start-one">
                        <button class="btn btn-danger bg-primary-color border-0">Start Earning Now</button>
                    </p>

                </div>


            </div>

            <div class="col-lg-6">
                <img src="/public/assets-revamp/img/vibe.png" alt="" srcset="" class="images-one">
            </div>
        </div>

    </div>
@stop

@section('script')
@stop
