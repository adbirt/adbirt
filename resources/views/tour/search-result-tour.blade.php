@extends('layouts.dashboard')
@section('content')
    @include('includes.alert')
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

    </style>
    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Roboto Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
        rel="stylesheet">

    <!-- Content -->
    <div class="layout-content" data-scrollable id="mainDiv">
        <div class="container-fluid">
            <div class="alert bg-success alert-styled-left" style="display:none;" id="msg">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                        class="sr-only">Close</span></button>
                <span class="text-semibold">
                    Tour Site Booked Successfully...
                </span>
            </div>
            <div class="alert bg-danger alert-styled-left" style="display:none;" id="Errormsg">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                        class="sr-only">Close</span></button>
                <span class="text-semibold">
                    Not Enough Money Available In Wallet To Procced...
                </span>
            </div>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">{!! $title = 'View Tour' !!}</li>
            </ol>

            <p class="btn-group pull-md-left">
            <div class="Searchdetails">
                <form action="{{ url('/filter/tour') }}" method="GET" id="filter" name="myform">
                    <div class="row searchproduct">

                        <div class="col-md-12">
                            <div class="input-group searchbox">
                                <input type="text" name="searchByname" id="searchByname" value="@if (isset($_GET['searchByname'])){{ $_GET['searchByname'] }}@endif"
                                    class="form-control" placeholder="Search Tours..">

                            </div>
                        </div>
                    </div>
                    <div class="row detailsproduct">
                        <div class="col-md-4">
                            <input type="search" name="searchByLoc" id="searchBy" value="@if (isset($_GET['searchByLoc'])){{ $_GET['searchByLoc'] }}@endif"
                                class="form-control" placeholder="Enter Location">
                        </div>

                        <div class="col-md-4">
                            <select name="owner_id" data-placeholder="Select an option" class="form-control"
                                id="owner_id">
                                @if (isset($arrOwner) && count($arrOwner) > 0)
                                    <option value="">Select Owner</option>
                                    @foreach ($arrOwner as $value)
                                        @if (isset($_GET['owner_id']) && $_GET['owner_id'] == $value->user_id)
                                            <option value="{{ $value->user_id }}" selected>
                                                {{ ucfirst($value->GetOwner->name) }}</option>
                                        @else
                                            <option value="{{ $value->user_id }}">
                                                {{ ucfirst($value->GetOwner->name) }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md-4" id="search" style="position: relative;top: -20px;">
                            <input type="search" name="searchByPrice" id="price_range" class="form-control">
                            <input type="hidden" value="{{ $MinPrice }}" id="Min_price">
                            <input type="hidden" value="{{ $MaxPrice }}" id="Max_price">

                            <input type="hidden" value="{{ $price_range['0'] }}" id="Old_Min_price">
                            <input type="hidden" value="{{ $price_range['1'] }}" id="Old_Max_price">
                        </div>
                    </div>

                    <div class="buttonblock row">
                        <div class="col-md-12 ">
                            <input type="submit" class="btn btn-default searchbtn" value="Search"
                                style="background-color: #2196f3;color: #fff;">
                            <a href="{{ url('tour/view') }}"><input type="button" class="btn btn-default searchbtn"
                                    value="Reset" style="background-color: #2196f3;color: #fff;"></a>
                        </div>
                    </div>
                </form>
            </div>
            </p>



            <div class="clearfix"></div>
            <div class="card-columns">

                @if (!empty($arrTours))

                    @foreach ($arrTours as $tour)
                        <div class="card">
                            <div class="card-header bg-white center">
                                <h4 class="card-title"><a
                                        href="{{ url('/tour/show/' . base64_encode($tour['id'])) }}">{!! ucfirst(substr($tour['tour_name'], 0, 40)) !!}</a>
                                </h4>
                            </div>
                            <a href="{{ url('/tour/show/' . base64_encode($tour['id'])) }}">
                                <img src="{!! asset('assets/tourPhotos/' . $tour['get_images']['0']['tour_image']) !!}" class="productimg" alt="Card image cap"
                                    style="width:100%;max-height: 285px;">
                            </a>
                            <div class="card-block">

                                <p class="m-b-0 productdescription">
                                    {!! substr($tour['tour_description'], 0, 60) !!}
                                </p>
                                @if (Auth::user()->hasRole('client'))
                                    <div class="form-group row">
                                        <span class="text-success" style="font-size:21px;">${!! number_format($tour['tour_price'], 2) !!}
                                            {{-- + $1* --}}</span>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ url('/book/tour/' . base64_encode($tour['id'])) }}"><button
                                                            type="button" class="btn btn-primary btn-rounded">Book
                                                            Now</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-md-6">

                                                </div>
                                                <div class="col-md-6">
                                                    <span class="text-success"
                                                        style="font-size:21px;">${!! number_format($tour['tour_price'], 2) !!}</span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('vendor'))
                                <ul class="ActionMenu" style="margin-left: 108px;">
                                    <li class="ActionMenuLi">
                                        <a href="{{ url('/tour/edittour/' . base64_encode($tour['id'])) }}">
                                            Edit
                                        </a>
                                    </li>
                                    <li class="ActionMenuLi">
                                        <a href="javascript:void(0);" Onclick=Del({{ $tour['id'] }});>
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    @endforeach

                @else
                    <h3><span class="nodata">No Tours Found<span></h3>
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

        var Old_Min_price = $("#Old_Min_price").val();
        var Old_Max_price = $("#Old_Max_price").val();

        $("#price_range").ionRangeSlider({
            type: "double",
            min: parseInt(Min_price),
            max: parseInt(Max_price),

            <?php if(isset($_GET['searchByPrice'])){ ?>
            from: parseInt(Old_Min_price),
            to: parseInt(Old_Max_price),
            <?php  } ?>

        });
        var baseUrl = "{{ url('/') }}";

        function Del(id) {
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this tour details!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Ok',
                    closeOnConfirm: true,
                },
                function() {
                    $.ajax({
                            url: baseUrl + '/tour/delete',
                            type: 'POST',
                            data: {
                                id: id
                            },
                        })
                        .done(function() {
                            $("#data-" + id).fadeOut("slow");
                        })
                });
        };

        function Book(id, price) {
            var totalPrice = parseInt(price);
            swal({
                    title: "Are you sure?",
                    text: "You want to Book this tour! $" + totalPrice + " Will Be Deducted From Your Wallet Balance",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Yes',
                    closeOnConfirm: true,
                },
                function() {
                    $.LoadingOverlay("show");
                    $.ajax({
                            url: baseUrl + '/tour/Book',
                            type: 'POST',
                            data: {
                                id: id
                            },
                        })
                        .done(function(response) {
                            $.LoadingOverlay("hide");
                            $("#mainDiv").animate({
                                scrollTop: 0
                            });
                            var response = response;
                            if (response == "true") {
                                $("#msg").show();
                                setTimeout(function() {
                                    $("#msg").fadeOut("slow");
                                    window.location.href = "{{ url('/order/clientHistory') }}";
                                }, 6000);
                            } else {
                                $("#Errormsg").show();
                                setTimeout(function() {
                                    $("#Errormsg").fadeOut("slow");
                                    window.location.href = "{{ url('/dashboard') }}";
                                }, 6000);
                            }
                        })
                });
        };
    </script>
@stop
