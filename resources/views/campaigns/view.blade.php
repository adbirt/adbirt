@extends('layouts.dashboard')

@section('styles')
    {!! Html::style('dist/cssc/bootstrap.striped.min.css') !!}
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ion.rangeSlider.skinHTML5.min.css') }}">

    <style type="text/css">
        .nodata {
            align-items: center !important;
            color: red !important;
            display: flex !important;
            font-size: 23px !important;
            font-weight: bold !important;
            justify-content: center !important;
            text-transform: capitalize;
        }

        ul.ActionMenu {
            list-style-type: none;
        }

        .ActionMenuLi {
            display: inline;
            word-spacing: 25px;
        }

        .ActionMenuLi a:hover {
            text-decoration: none;
        }

        .card img {
            width: 100%;
        }

        ul.padination>li {
            padding-left: 4px;
            padding-right: 4px;
        }

        .campaign-card>.card-block>hr {
            border: 2px solid #000 !important;
        }

        /* For mobile phones: */
        @media only screen and (max-width: 768px) {
            html.bootstrap-layout body {
                overflow: auto !important;
            }
        }

    </style>
    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Roboto Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
        rel="stylesheet">
@stop


@section('content')
    @include('includes.alert')
    <!-- Content -->
    <div class="layout-content" data-scrollable id="mainDiv">
        {{-- <div class="container-fluid">
      <div class="alert bg-success alert-styled-left" style="display:none;" id="msg">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        <span class="text-semibold">
            Campaign Successfully... 
        </span>
    </div> --}}
        <div class="alert bg-danger alert-styled-left" style="display:none;" id="Errormsg">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                    class="sr-only">Close</span></button>
            <span class="text-semibold">
                You must have a minimum of $1 in your Account to Create Ads
            </span>
        </div>

        {{-- <a href="{{ url('/campaigns/advertisers') }}">
            <button class="btn btn-primary waves-effect waves-light" id="navigate">
                View Advertisers
            </button>
        </a> --}}


        <p class="btn-group pull-md-left">
        <div class="Searchdetails">
            <form action="{{ url('/campaigns/filter') }}" method="GET" id="filter" name="myform">
                <div class="row searchproduct">

                    <div class="col-md-12">
                        <div class="input-group searchbox">
                            <input type="text" name="searchByname" id="searchByname" class="form-control"
                                placeholder="Search Campaign.."
                                @if (isset($_GET['searchByname']) && !empty($_GET['searchByname'])) value="{{ $_GET['searchByname'] }}" @endif>
                        </div>
                    </div>

                </div>
                <div class="row detailsproduct">
                    <div class="col-md-4">
                        <select name="advertiser_id" data-placeholder="Select an option" class="form-control"
                            id="advertiser_id">
                            <option value="">Select Advertiser</option>
                            @if (isset($Advertiser) && count($Advertiser) > 0)
                                @foreach ($Advertiser as $value)
                                    @if (isset($_GET['advertiser_id']) && $_GET['advertiser_id'] == $value->user_id)
                                        <option value="{{ $value->user_id }}" selected>
                                            {{ ucfirst($value->GetVendor->name) }}
                                        </option>
                                    @else
                                        <option value="{{ $value->user_id }}">
                                            {{ ucfirst($value->GetVendor->name) }}
                                        </option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select name="category_id" data-placeholder="Select an option" class="form-control"
                            id="category_id">
                            <option value="">Select Category</option>
                            @if (isset($campCatData))
                                @if (count($campCatData) > 0)
                                    @foreach ($campCatData as $value)
                                        @if (isset($_GET['category_id']) && $_GET['category_id'] == $value['id'])
                                            <option value="{{ $value['id'] }}" selected>
                                                {{ ucfirst($value['category_name']) }}
                                            </option>
                                        @else
                                            <option value="{{ $value['id'] }}">
                                                {{ ucfirst($value['category_name']) }}
                                            </option>
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                        </select>
                    </div>
                    @if (isset($MinPrice) && !empty($MinPrice))
                        <div class="col-md-4" id="search" style="position: relative;top: -20px;">
                            <input type="search" name="searchByPrice" id="price_range" class="form-control">
                        </div>
                    @endif
                </div>

                @if (isset($MinPrice) && !empty($MinPrice))
                    <input type="hidden" name="Min_price" value="{{ $MinPrice }}" id="Min_price">
                    <input type="hidden" name="Max_price" value="{{ $MaxPrice }}" id="Max_price">
                @endif

                @if (isset($price_range) && !empty($price_range))
                    <input type="hidden" value="{{ $price_range['0'] }}" id="search_Min_price">
                    <input type="hidden" value="{{ $price_range['1'] }}" id="search_Max_price">
                @endif

                <div class="buttonblock row">
                    <div class="col-md-12 ">
                        <input type="submit" class="btn btn-default searchbtn" value="Search"
                            style="background-color: #2196f3;color: #fff;">
                    </div>
                </div>
            </form>
        </div>
        </p>

        {{-- <p class="btn-group pull-md-right">
            <a href="#" class="btn btn-white active"><i class="material-icons">list</i></a>
            <a href="#" class="btn btn-white"><i class="material-icons">dashboard</i></a>
        </p> --}}
        <div class="clearfix"></div>
        <div class="row">

            @if (isset($campaignsData) && count($campaignsData) > 0)

                @foreach ($campaignsData as $campgn)
                    <div class="col-12 col-md-6 col-lg-4 my-3">
                        <div class="card campaign-card h-100" id="data-{!! $campgn->id !!}"
                            data-id="{!! $campgn->id !!}">
                            <div class="card-header bg-white center">
                                <h4 class="card-title font-weight-bold"><a
                                        href="{{ url('/campaigns/show/' . base64_encode($campgn->id)) }}">{!! ucfirst(substr($campgn->campaign_name, 0, 40)) !!}</a>
                                </h4>
                            </div>
                            <a href="{{ url('/campaigns/show/' . base64_encode($campgn->id)) }}">
                                @if ($campgn->banner_type == 'image')
                                    <img src="{!! asset('uploads/campaign_banners/' . $campgn->campaign_banner) !!}" alt="Card image cap" width="auto" height="auto"
                                        class="w-100">
                                @else
                                    <video src="{!! asset('uploads/campaign_banners/' . $campgn->campaign_banner) !!}" alt="Card image cap" width="auto" height="auto"
                                        controls class="w-100">
                                @endif
                            </a>
                            <div class="card-block px-3">

                                <p class="mb-1">
                                    {{-- {!! substr($campgn->campaign_description, 0, 60) !!}--here --}}
                                    {!! ucfirst(substr(strip_tags($campgn->campaign_description), 0, 60)) !!}...<a
                                        href="{{ url('/campaigns/show/' . base64_encode($campgn->id)) }}">[more]</a>
                                </p>
                                <hr />
                                <p class="mb-1">
                                    <strong>Campaign Type:</strong> {!! $campgn->campaign_type !!}
                                </p>
                                <p class="mb-1">
                                    <strong>Banner Type:</strong> {!! ucfirst($campgn->banner_type) !!}
                                </p>
                                <p class="mb-1">
                                    <strong>Campaign Category:</strong> {!! getCategoryName($campCatData, $campgn->campaign_category) !!}
                                </p>

                                @if (Auth::user()->hasRole('client'))
                                    <p class="mb-1">
                                        <strong>Cost Per Action:</strong>
                                        <span class="text-success font-weight-bold" style="font-size:21px;">
                                            ${!! number_format($campgn->campaign_cost_per_action, 2) !!}
                                        </span>
                                    </p>
                                @else
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-md-6">

                                                </div>
                                                <div class="col-md-6">
                                                    <span class="text-success" style="font-size:21px;"
                                                        class="font-weight-bold">${!! number_format($campgn->campaign_cost_per_action, 2) !!}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <h3><span class="nodata">No campaigns found<span></h3>

            @endif

        </div>

        <nav class="center">
            @if (isset($campaignsData))
                {!! $campaignsData->render() !!}
            @endif
        </nav>

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

    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('assets/js/loadingoverlay.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/loadingoverlay_progress.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
    <script type="text/javascript">
        var Min_price = $("#Min_price").val();
        var Max_price = $("#Max_price").val();
        var search_Min_price = $("#search_Min_price").val();
        var search_Max_price = $("#search_Max_price").val();
        $("#price_range").ionRangeSlider({
            type: "double",
            min: parseInt(Min_price),
            max: parseInt(Max_price),

            @if (isset($price_range))
                from: parseInt(search_Min_price),
                to: parseInt(search_Max_price),
            @endif

            prefix: "$",
        });
    </script>
@stop
