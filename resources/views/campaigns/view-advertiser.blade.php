@extends('layouts.default')
@section('content')
@include('includes.alert')
{!! Html::style('dist/cssc/bootstrap.striped.min.css') !!}
<link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ion.rangeSlider.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ion.rangeSlider.skinHTML5.min.css') }}"> 
<style type="text/css">
.nodata {align-items: center !important; color: red !important; display: flex !important;font-size: 23px    !important;font-weight: bold !important;justify-content: center !important;text-transform: capitalize;}
ul.ActionMenu {list-style-type: none;}
.ActionMenuLi {display: inline;word-spacing: 25px;}
.ActionMenuLi a:hover {text-decoration: none;}
</style>
<!-- Material Design Icons  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Roboto Web Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
<!-- Content -->
<div class="layout-content" data-scrollable id="mainDiv">
    <div class="container-fluid">
      <div class="alert bg-success alert-styled-left" style="display:none;" id="msg">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        <span class="text-semibold">
            Campaign Successfully... 
        </span>
    </div>
    <div class="alert bg-danger alert-styled-left" style="display:none;" id="Errormsg">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        <span class="text-semibold">
            Not Enough Money Available In Wallet To Procced...
        </span>
    </div> 
    <ol class="breadcrumb"> 
        <li><a href="{{ url('/dashboard') }}">Home</a></li>
        <li class="active">Marketplace</li>
    </ol>
    <a href="{{ url('/campaigns/view') }}">
        <button class="btn btn-primary waves-effect waves-light" id="navigate">
            View Campaigns
        </button>
    </a>
    <div class="clearfix"></div>
    <div class="card-columns">
        @if(isset($Advertiser) && !empty($Advertiser) )
        
        @foreach($Advertiser as $advert)
        <div class="card" id="data-{!! $advert->id !!}">
            <div class="card-header bg-white center">
                <h4 class="card-title">
                    <a href="{{ url('/campaigns/view/'.base64_encode($advert->user_id)) }}">
                        {!! ucwords(str_replace("_"," ", $advert->GetVendor->name)) !!}
                    </a>
                </h4>
            </div>
            <a href="{{ url('/campaigns/view/'.base64_encode($advert->user_id)) }}">    @if(!empty($advert->profile))
                <img src="{!! asset('uploads/company_logo/'.$advert->profile->company_logo) !!}" class="tourimg" alt="Card image cap" style="width:100%;max-height: 285px;">
                @endif
            </a>
            <div class="card-block">
                @if(!empty($advert->profile))
                <p class="m-b-0 tourdescription">
                    {!! substr($advert->profile->about_company, 0, 60) !!}
                </p>
                @endif
                <div class="form-group row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('/campaigns/view/'.base64_encode($advert->user_id)) }}">
                                    <button type="button"  class="btn btn-primary btn-rounded">View campaigns</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @else
        
        <h3><span class="nodata">No Advertisers found<span></h3>

            @endif

        </div>

    </div>
</div>
<!-- jQuery -->
{!! Html::script('dist/vendor/jquery.min.js') !!}

<!-- Bootstrap -->
{!! Html::script('dist/vendor/tether.min.js') !!}
{!! Html::script('dist/vendor/bootstrap.min.js') !!}

<!-- AdminPlus -->
{!! Html::script('dist/vendor/adminplus.js') !!}

<!-- App JS -->
{!! Html::script('dist/js/main.min.js') !!}

@section('script')
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/loadingoverlay.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/loadingoverlay_progress.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
<script type="text/javascript">
    var Min_price = $("#Min_price").val();
    var Max_price = $("#Max_price").val();

    $("#price_range").ionRangeSlider({
        type: "double",
        min: parseInt(Min_price),
        max: parseInt(Max_price),
        prefix: "$",
    });



</script>
@stop