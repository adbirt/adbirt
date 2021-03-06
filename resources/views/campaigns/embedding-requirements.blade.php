@extends('layouts.dashboard')

@section('style')

    {!! Html::style('dist/cssc/bootstrap.striped.min.css') !!}

    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
    <link href="{{ asset('assets/css/ubm.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/ubm-jsonp.js') }}"></script>
    <style>
        .embed {
            line-height: 3em;
        }

    </style>
@stop


@section('content')
    <!-- Content -->
    <div class="layout-content" data-scrollable>

        <div class="container-fluid">

            <div class="viewtable">

                @include('includes.alert')

                <?php $title = 'Add Ads to Website Requirements'; ?>

                <div class="card">
                    @if (Auth::user()->hasRole('vendor'))
                        <h5 class="notificationheading p-2">Thank you for creating your campaign with us.</h5>
                        <h5 class="text-center notificationheading p-2 text-white font-weight-bold bg-info">You're a few step
                            away to get your ad running across our ad
                            network, to activate your ad, kindly compelete this few steps below:</h5>
                    @endif

                    <div class="pl-3">
                        @if (Auth::user()->hasRole('client') || Auth::user()->hasRole('admin'))
                            <h5 class="notificationheading text-center p-2 font-weight-bold">For Publishers</h5>
                            <p class="notificationheading text-center p-2">To display adbirt ads on your website, follow
                                the steps below:</p>
                            <hr class="notifydivider">
                            <div>
                                <h2>For Wordpress sites:</h2>
                                <div class="pl-4">
                                    <p>STEP 1: Download and install Adbirt Publisher plugin</p>
                                    <a href="https://adbirt.com/public/assets-revamp/adbirt-publishers-plugin.zip"
                                        class="btn btn-info">Download Plugin</a>
                                    {{-- <a href="http://adbirt.com/blog" target="_blank">Learn More</a>
                                    <br /> --}}

                                    <br />
                                    <br />
                                    <p>Step 2. Login to the plugin with your Adbirt publisher email and password</p>

                                    <p>Step 3. Copy the shortcode from the plugin </p>

                                    <p>Step 4. Place the code wherever you need ads to show on your websites</p>

                                    <p>That's it, you're all done!</p>
                                </div>
                                <br />

                                <h2>For Other Sites:</h2>
                                <div class="pl-4">
                                    <p>Step 1. Make sure you add this script to your site's source code for the ad to show,
                                        just before the closing <code>&lt;body&gt;</code> tag </p>
                                    <div class="row input-group mb-3 w-75">
                                        <input type="text" value='<script src="https://adbirt.com/public/assets/js/ubm-jsonp.js?ver=2.70"></script>' class="form-control"
                                            id="source-code" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text copy-btn btn btn-info" title="Copy to clipboard"
                                                data-clipboard-target="#source-code" data-clipboard-action="copy">
                                                <i class="fa fa-copy"></i>
                                            </span>
                                        </div>
                                    </div>
                                    {{-- <a href="http://adbirt.com/blog" target="_blank">Learn More</a> --}}
                                    <br />
                                    <p>Step 2. Copy the campaign code and place it wherever you need ads to show on your
                                        websites</p>
                                    <br />
                                </div>
                            </div>

                            <hr>
                        @endif

                        @if (Auth::user()->hasRole('vendor') || Auth::user()->hasRole('admin'))
                            <h5 class="notificationheading text-center p-2 font-weight-bold">For Advertisers</h5>
                            <hr class="notifydivider">
                            <br />

                            <div class="pl-3">

                                <h2>For Wordpress Sites:</h2>

                                <div class="pl-4">
                                    <p>Install, Activate our WordPress Plugin on your site and your Ads will go
                                        Live.</p>
                                    <a type="button" class="btn btn-info"
                                        href="https://adbirt.com/public/assets-revamp/adbirt-advertisers-plugin.zip">
                                        Download Plugin
                                    </a>
                                    <br />
                                    <br />
                                    <a href="https://www.adbirt.com/blog/add-adbirt-code-as-advertiser/"
                                        class="btn btn-info" target="_blank">Learn More</a>
                                </div>
                                <br />

                                <h2>For Other Sites (Node.js, PHP, etc)</h2>
                                <div class="pl-4">
                                    <p>
                                        Add following script at the bottom of your page before closing
                                        <code>&lt;body&gt;</code> tags in campaign landing page.
                                    </p>
                                    <div class="row input-group mb-3 w-75">
                                        <input type="text" value='<script src="https://adbirt.com/public/js/adbirt.js"></script>' class="form-control"
                                            id="source-code" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text copy-btn btn btn-info" title="Copy to clipboard"
                                                data-clipboard-target="#source-code" data-clipboard-action="copy">
                                                <i class="fa fa-copy"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <br />
                                    <a href="https://www.adbirt.com/blog/add-adbirt-code-as-advertiser/"
                                        class="btn btn-info" target="_blank">Learn More</a>
                                </div>

                            </div>

                            <p class="p-3"> Once you add this code and our system detects the code on your site,
                                your Ads
                                will go Live.
                                <br />
                                <strong>NOTE:</strong> For the Ads to continue to run, the code must remain on the site,
                                else it
                                will go offline
                            </p>
                        @endif

                    </div>

                </div><!-- /.box-body -->

            </div><!-- /.box -->

        </div>

    </div><!-- /.col -->

    </div><!-- /.row -->

    </section><!-- /.content -->
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

    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
    <script>
        new ClipboardJS('.copy-btn');
    </script>

@stop
