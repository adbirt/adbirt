@extends('layouts.dashboard')

@section('style')
    {{-- {!! Html::style('dist/cssc/bootstrap.striped.min.css') !!} --}}
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.rateyo.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">


    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Roboto Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
        rel="stylesheet">

    <style>
        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
        }


        /* For mobile phones: */
        @media only screen and (max-width: 768px) {
            .card-columns .card {
                width: 100% !important;
            }

            #mainDiv {
                width: 100% !important;
                height: auto !important;
            }
        }

        .carousel-inner>.carousel-item>img,
        .img-fluid {
            display: inherit !important;
        }

    </style>
@stop

@section('content')
    <!-- Content -->
    <div class="layout-content" data-scrollable id="mainDiv">
        <div class="container-fluid">
            @include('includes.alert')
            <?php $title = 'View Campaign'; ?>
            <div class="viewproductbox">
                @if (isset($campaignData) && !empty($campaignData))
                    <div class="card">
                        <div class="card-header bg-white center">
                            <h4 class="card-title text-center w-100 font-weight-bold">
                                <a href="javascript:void(0);">
                                    {!! ucwords($campaignData->campaign_name) !!}
                                </a>
                            </h4>
                        </div>

                        <div class="d-flex flex-row align-items-center justify-content-center">
                            @if ($campaignData->banner_type == 'image')
                                <img src="{!! asset('/uploads/campaign_banners/' . $campaignData->campaign_banner) !!}" class="img-fluid pt-2" alt="{!! ucwords($campaignData->campaign_name) !!}"
                                    width="{{ explode(' x ', $campaignData->banner_size)[0] }}"
                                    height="{{ explode(' x ', $campaignData->banner_size)[1] }}">
                            @else
                                <video src="{!! asset('/uploads/campaign_banners/' . $campaignData->campaign_banner) !!}" class="pt-2" alt="{!! ucwords($campaignData->campaign_name) !!}"
                                    width="450" controls>
                            @endif
                        </div>

                        <div class="card-block">

                            <div style="word-wrap: break-word;">
                                <h5 class="font-weight-bold">
                                    <u>
                                        Banner Description
                                    </u>
                                </h5>
                                <br />
                                {!! $campaignData->campaign_description !!}
                            </div>

                            <hr style="border: 1px solid rgba(0, 0, 0, .7) !important;" />

                            @if (!Auth::user()->hasRole('admin'))
                                {{-- @if (isset($campaignData->isCampaignActive))
                                    
                                @endif --}}

                                @if (!isset($campaignData->isCampaignActive))
                                    @if ($campaignData->campaign_approval_status == 'Approved')
                                        <a class="buyproduct" href="javascript:void(0);"
                                            onclick="run({{ $campaignData->id }})">
                                            <button type="button" class="btn btn-primary btn-rounded ">Run Campaign</button>
                                        </a>
                                    @elseif ($campaignData->campaign_approval_status == 'Rejected')
                                        <a class="buyproduct" href="javascript:void(0);"
                                            onclick="run({{ $campaignData->id }})">
                                            <button type="button" class="btn btn-danger btn-rounded disabled"
                                                disabled>Campaign Rejected</button>
                                        </a>
                                    @else
                                        <a class="buyproduct" href="javascript:void(0);">
                                            <button type="button" class="btn btn-danger btn-rounded disabled" disabled>Not
                                                yet
                                                Approved!</button>
                                        </a>
                                    @endif
                                @else
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12 "></div>
                                    @if (Auth::user()->hasRole('client'))
                                        <p class="notificationheading text-center p-2 font-weight-bold">To display adbirt
                                            ads on your
                                            website, follow
                                            the steps below:</p>

                                        <div>
                                            <h2>For Wordpress sites:</h2>
                                            <div class="pl-4">
                                                {{-- <p>STEP 1: Download and install Adbirt Publisher plugin</p> --}}
                                                {{-- <a href="https://adbirt.com/public/assets-revamp/adbirt-publishers-plugin.zip"
                                                    class="btn btn-info">Download Plugin</a>
                                                <br />
                                                <br /> --}}
                                                <p>Step 1. Login to the Adbirt Plugin installed on your WordPress site</p>

                                                <p>Step 2. Copy the campaign shortcode from the plugin </p>

                                                <p>Step 3. Place the code wherever you need ads to show on your websites</p>

                                                <p>That's it, you're all done!</p>
                                            </div>
                                            <br />

                                            <h2>For other Sites:</h2>
                                            <div class="pl-4">
                                                <p>Step 1. Make sure you add this script to your site's source code for
                                                    the ad to show,
                                                    just before the closing <code>&lt;body&gt;</code> tag </p>
                                                <div class="row input-group mb-3 w-75">
                                                    <input type="text" value='<script src="https://adbirt.com/public/assets/js/ubm-jsonp.js?ver=2.70"></script>'
                                                        class="form-control" id="body-script" readonly>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text copy-btn btn btn-info"
                                                            title="Copy to clipboard" data-clipboard-target="#body-script"
                                                            data-clipboard-action="copy">
                                                            <i class="fa fa-copy"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                {{-- <a href="http://adbirt.com/blog" target="_blank">Learn More</a> --}}
                                                <br />
                                                <p>Step 2. Copy the campaign code and place it wherever you need ads to
                                                    show on your
                                                    websites</p>
                                                <div class="row input-group mb-3 w-75">
                                                    <input type="text"
                                                        value='<a class="ubm-banner" data-id="{{ base64_encode($campaignData->advert_code) }}"></a>'
                                                        class="form-control" id="campaign-code" readonly>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text copy-btn btn btn-info"
                                                            title="Copy to clipboard" data-clipboard-target="#campaign-code"
                                                            data-clipboard-action="copy">
                                                            <i class="fa fa-copy"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <br />
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                <div style="text-align: left !important;">

                                    <div>
                                        <label class="viewproductlabel">
                                            Price per Action:
                                        </label>
                                        <span class="text-success" style="font-size:17px;">
                                            ${!! number_format($campaignData->campaign_cost_per_action, 2) !!} {{-- + $1* --}}
                                        </span>
                                    </div>

                                    {{-- <div>
                                        <label class="viewproductlabel">Advertiser:</label>
                                        <br>
                                        {-- + $1* --}</span>
                                    </div> --}}

                                    {{-- <div>
                                        <label class="viewproductlabel">Campaign Landing Page:</label>
                                        <span class="text-success" style="font-size:17px;">{!! $campaignData->campaign_url !!}</span>
                                    </div> --}}

                                    <div>
                                        <label class="viewproductlabel">Campaign Category:</label>
                                        <span class="text-success" style="font-size:17px;">{!! getCategoryName($categories, $campaignData->campaign_category) !!}</span>
                                    </div>

                                    <div>
                                        <label class="viewproductlabel"> Banner Size:</label>
                                        <span class="text-success" style="font-size:17px;">
                                            {!! ucwords($campaignData->banner_size) !!}</span>
                                    </div>

                                    {{-- <div>
                                        <label class="viewproductlabel">Campaign Policy:</label>
                                        <span class="text-success" style="font-size:17px;">
                                            {!! ucwords(strip_tags($campaignData->campaign_policy)) !!}</span>
                                    </div> --}}

                                </div>



                                <input type="hidden" name="campaign_cost_per_action" value="{!! $campaignData->campaign_cost_per_action !!}"
                                    id="campaign_cost_per_action">

                        </div>

                        {{-- @if (isset($campaignData->advert_code) && Auth::user()->hasRole('vendor'))

                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12"><br>
                                <label class="viewproductlabel">Use this Url to callback for registration cofirmation:
                                </label> <br>
                                <span class="text-success" style="font-size:17px;">{!! url('/campaigns/verified/') !!}</span>
                                <span>
                                    <br>
                                    <label class="viewproductlabel">Required Fields: </label>
                                    <ul>
                                        <li>campaign_code = You can get this from request dynamically</li>
                                        <li>uniq_id = *uniq key of registered user</li>
                                    </ul>
                                </span>
                            </div>

                        @endif --}}
                    </div>
                @else
                    <div class="">
                        <div class="">
                            <label>Banner Size:</label>
                            <span class="text-success">
                                {!! ucwords($campaignData->banner_size) !!}
                            </span>
                        </div>
                        <div class="">
                            <label>Price:</label>
                            <span class="text-success">
                                ${!! number_format($campaignData->campaign_cost_per_action, 2) !!}
                            </span>
                        </div>
                        {{-- <div class="">
                            <label>Campaign Policy:</label>
                            <span class="text-success">
                                {!! ucwords($campaignData->campaign_policy) !!}
                            </span>
                        </div> --}}
                        <div class="">
                            <label>Published on:</label>
                            <span class="text-success">
                                {!! implode(' ', explode('-sep-', $campaignData->published_by)) !!}
                            </span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @else
        <h3><span class="nodata">No Campaign found<span></h3>
        @endif

    </div>
    @if (isset($campaignData->isCampaignActive))
        @if (Auth::user()->hasRole('client'))
            <!-- Load Facebook SDK for JavaScript -->
            <!--<div id="fb-root"></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              <script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  (function(d, s, id) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      var js, fjs = d.getElementsByTagName(s)[0];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      if (d.getElementById(id)) return;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      js = d.createElement(s);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      js.id = id;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      fjs.parentNode.insertBefore(js, fjs);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  }(document, 'script', 'facebook-jssdk'));
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              </script>-->



            {{-- <div class="shareurl" style="padding-bottom: 50px;">
                <h2>Social Sharing</h2>
                <!-- Your share button code -->
                <!--<div class="fb-share-button" style="padding-left: 20px;"
                  data-href="https://adbirt.com/campaigns/share/{{ base64_encode($campaignData->advert_code) }}"
                  data-layout="button"
                  data-size="large">
                  </div>-->
                @foreach ($socialData as $key => $value)
                    <a target="_blank" href="{{ $value }}"><img src="/public/images/social/{{ $key }}.jpg"
                            alt="{{ $key }}" width="8%" style="padding-bottom: 7px;"></a>
                @endforeach
            </div> --}}
        @endif
    @endif
    </div>
    </div>
@stop


@section('script')

    <!-- jQuery -->
    {!! Html::script('dist/vendor/jquery.min.js') !!}

    <!-- Bootstrap -->
    {!! Html::script('dist/vendor/tether.min.js') !!}
    {!! Html::script('dist/vendor/bootstrap.min.js') !!}

    <!-- AdminPlus -->
    {!! Html::script('dist/vendor/adminplus.js') !!}

    <!-- App JS -->
    {!! Html::script('dist/js/main.min.js') !!}

    <script type="text/javascript" src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('assets/js/loadingoverlay.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/loadingoverlay_progress.min.js') }}"></script> --}}

    <script type="text/javascript">
        var baseUrl = "{{ url('/') }}"

        function run(id) {
            swal({
                    title: "Are you sure?",
                    text: "You want to run this campaign!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Ok',
                    closeOnConfirm: true,
                },
                function() {
                    window.location.href = '{{ url('/campaigns/run/') }}' + "/" + btoa(id);
                });
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
    <script>
        new ClipboardJS('.copy-btn');
    </script>

@stop
