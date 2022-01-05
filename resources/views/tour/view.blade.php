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
                <li><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="active">Marketplace</li>
            </ol>


            <p class="btn-group pull-md-left">
            <div class="Searchdetails">
                <form action="{{ url('/filter/tour') }}" method="GET" id="filter" name="myform">
                    <div class="row searchproduct">

                        <div class="col-md-12">
                            <div class="input-group searchbox">
                                <input type="text" name="searchByname" id="searchByname" class="form-control"
                                    placeholder="Search Tour..">

                            </div>
                        </div>
                    </div>
                    <div class="row detailsproduct">
                        <div class="col-md-4">
                            <input type="search" name="searchByLoc" id="searchBy" class="form-control"
                                placeholder="Enter Location">
                        </div>

                        <div class="col-md-4">
                            <select name="owner_id" data-placeholder="Select an option" class="form-control"
                                id="owner_id">
                                @if (isset($arrOwner) && count($arrOwner) > 0)
                                    <option value="">Select Owner</option>
                                    @foreach ($arrOwner as $value)
                                        <option value="{{ $value->user_id }}">{{ ucfirst($value->GetOwner->name) }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md-4" id="search" style="position: relative;top: -20px;">
                            <input type="search" name="searchByPrice" id="price_range" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" name="Min_price" value="{{ $MinPrice }}" id="Min_price">
                    <input type="hidden" name="Max_price" value="{{ $MaxPrice }}" id="Max_price">
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
            <div class="card-columns">
                @if (!empty($tours['0']['tour_name']))

                    @foreach ($tours as $tour)
                        <div class="card" id="data-{!! $tour->id !!}">
                            <div class="card-header bg-white center">
                                <h4 class="card-title"><a
                                        href="{{ url('/tour/show/' . base64_encode($tour->id)) }}">{!! ucfirst(substr($tour->tour_name, 0, 40)) !!}</a>
                                </h4>
                            </div>
                            <a href="{{ url('/tour/show/' . base64_encode($tour->id)) }}">
                                <img src="{!! asset('assets/tourPhotos/' . $tour->tour_image) !!}" class="tourimg" alt="Card image cap"
                                    style="width:100%;max-height: 285px;">
                            </a>
                            <div class="card-block">

                                <p class="m-b-0 tourdescription">
                                    {!! substr($tour->tour_description, 0, 60) !!}
                                </p>
                                @if (Auth::user()->hasRole('client'))
                                    <div class="form-group row">
                                        <span class="text-success" style="font-size:21px;">${!! number_format($tour->tour_price, 2) !!}
                                            {{-- + $1* --}}</span>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-md-6">

                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ url('/book/tour/' . base64_encode($tour->id)) }}"
                                                        {{-- Onclick=Book({{ $tour->id }},{{ number_format($tour->tour_price,2) }}); --}}><button type="button"
                                                            class="btn btn-primary btn-rounded">Book Now</button></a>
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
                                                        style="font-size:21px;">${!! number_format($tour->tour_price, 2) !!}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            @if (Auth::user()->hasRole('admin'))
                                <ul class="ActionMenu" style="margin-left: 108px;">
                                    <li class="ActionMenuLi">
                                        <a href="{{ url('/tour/editTour/' . base64_encode($tour->id)) }}">
                                            Edit
                                        </a>
                                    </li>
                                    <li class="ActionMenuLi">
                                        <a href="javascript:void(0);" Onclick=Del({{ $tour->id }});>
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            @elseif(Auth::user()->id == $tour->owner_id)
                                <ul class="ActionMenu" style="margin-left: 108px;">
                                    <li class="ActionMenuLi">
                                        <a href="{{ url('/tour/editTour/' . base64_encode($tour->id)) }}">
                                            Edit
                                        </a>
                                    </li>
                                    <li class="ActionMenuLi">
                                        <a href="javascript:void(0);" Onclick=Del({{ $tour->id }});>
                                            Delete
                                        </a>
                                    </li>
                                </ul>

                            @endif
                        </div>
                    @endforeach

                @else

                    <h3><span class="nodata">No tour found<span></h3>

                @endif




            </div>

            <nav class="center">
                {!! $tours->render() !!}
            </nav>

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
    </script>
@stop
