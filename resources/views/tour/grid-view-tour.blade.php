@extends('layouts.dashboard')
@section('content')
    @include('includes.alert')
    {!! Html::style('dist/cssc/bootstrap.striped.min.css') !!}
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
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
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">

            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">{!! $title = 'View tour' !!}</li>
            </ol>

            <a href="{{ url('/tour/grid-view-tour') }}" class="btn btn-white active"><i
                    class="material-icons">dashboard</i></a>
            <a href="{{ url('/tour/view-tour') }}" class="btn btn-white "><i class="material-icons">list</i></a>

            <div class="clearfix"></div>
            <div class="card-columns">
                @if (!empty($arrTours))

                    @foreach ($arrTours as $tour)
                        <div class="card">
                            <div class="card-header bg-white center">
                                <h4 class="card-title"><a
                                        href="{{ url('/tour/show/' . base64_encode($tour->id)) }}">{!! ucwords($tour->tour_name) !!}</a>
                                </h4>
                                <div>
                                    <i class="material-icons text-warning md-18">star</i>
                                    <i class="material-icons text-warning md-18">star</i>
                                    <i class="material-icons text-warning md-18">star</i>
                                    <i class="material-icons text-warning md-18">star</i>
                                    <i class="material-icons text-warning md-18">star_border</i>
                                </div>
                            </div>
                            <a href="{{ url('/tour/show/' . base64_encode($tour->id)) }}">
                                <img src="{!! asset('assets/tourPhotos/' . $tour->tour_image) !!}" class="tourimg" alt="Card image cap"
                                    style="width:100%;">
                            </a>
                            <div class="card-block">

                                <p class="m-b-0 tourdescription">
                                    {!! $tour->tour_description !!}
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
                                                    <a href="{{ url('/tour/Buy/' . base64_encode($tour->id)) }}"
                                                        Onclick="if(confirm('Are u sure want to Buy')){return true;}return false;">
                                                        <button type="button" class="btn btn-primary btn-rounded">Buy
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
                                                        style="font-size:21px;">${!! number_format($tour->tour_price, 2) !!}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                            </div>
                            @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('vendor'))
                                <ul class="ActionMenu" style="margin-left: 108px;">
                                    <li class="ActionMenuLi">
                                        <a href="{{ url('/tour/edittour/' . base64_encode($tour->id)) }}">
                                            Edit
                                        </a>
                                    </li>
                                    <li class="ActionMenuLi">
                                        <a href="{{ url('/tour/delete/' . base64_encode($tour->id)) }}"
                                            Onclick="if(confirm('Are u sure want to delete')){return true;}return false;">
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    @endforeach

                @else
                    <h3><span class="nodata">No tours Found<span></h3>
                @endif




            </div>
            <nav class="center">
                {!! $arrTours->render() !!}
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
