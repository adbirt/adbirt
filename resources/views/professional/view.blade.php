@extends('layouts.dashboard')
@section('content')
    @include('includes.alert')
    {!! Html::style('dist/cssc/bootstrap.striped.min.css') !!}

    <style type="text/css">
        @media screen and (min-width: 0px) and (max-width: 400px) {
            a.btn.btn-primary.btn-sm.pull.xs-left.call {
                background-color: red;
                display: block;
            }

            /* show it on small screens */
        }

        @media screen and (min-width: 401px) and (max-width: 1024px) {
            a.btn.btn-primary.btn-sm.pull.xs-left.call {
                background-color: green;
                display: none;
            }

            /* hide it elsewhere */
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

            <ol class="breadcrumb hidden-print">
                <li><a href="{!! route('dashboard') !!}">Home</a></li>
                <li class="active">Professionals</li>
            </ol>

            <!--  <div class="center">
            <a href="#" class="m-b-1">
              <img src="assets/images/people/110/guy-8.jpg" alt="" class="img-circle">
            </a>
            <h1 class=" h2 m-b-0">Adrian Demian</h1>
            <p class="lead text-muted m-b-0">Florida, USA</p>
            <div class="label label-primary">INSTRUCTOR</div>
            <hr>
            <h5 class="text-muted">Instructor Rating</h5>
            <p>
              <i class="material-icons text-success md-18">star</i>
              <i class="material-icons text-success md-18">star</i>
              <i class="material-icons text-success md-18">star</i>
              <i class="material-icons text-muted-light md-18">star_border</i>
              <i class="material-icons text-muted-light md-18">star_border</i>
            </p>
          </div>
          <hr class="m-a-0">
          <h5 class="page-heading center text-muted">Courses by Adrian</h5> -->
            <div class="card-columns">
                @if (!empty($professionals))

                    @foreach ($professionals as $professional)
                        <div class="card">
                            <div class="card-header bg-white">
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <a href="">
                                            {!! Html::image($professional->profile->propic, 'User profile picture', ['class' => 'img-responsive img-square', 'width' => '110px', 'height' => '110px']) !!}
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <h5 style="text-transform:uppercase;">
                                            {{ str_limit($professional->name, $limit = 25, $end = '') }}</h5> <a href="#"
                                            class="btn btn-success btn-rounded"
                                            style="text-transform:capitalize;">{{ str_limit($professional->profile->profession, $limit = 25, $end = '') }}
                                            <i class="material-icons">add</i></a>
                                        <h3 class="card-title"><a href=""
                                                style="text-transform:capitalize;">{{ str_limit($professional->profile->city, $limit = 13, $end = '') }},
                                                {{ str_limit($professional->profile->state, $limit = 12, $end = '') }}</a>
                                        </h3>
                                        <div>
                                            <i class="material-icons text-warning md-18">star</i>
                                            <i class="material-icons text-warning md-18">star</i>
                                            <i class="material-icons text-warning md-18">star</i>
                                            <i class="material-icons text-warning md-18">star</i>
                                            <i class="material-icons text-warning md-18">star</i>
                                        </div>
                                        <a href="tel:{!! $professional->phone !!}"
                                            class="btn btn-primary btn-sm pull-xs-left call"><i
                                                class="material-icons">call</i> Call Now</a>
                                        <a href="{!! URL::route('getcontact') !!}" class="btn btn-default btn-sm pull-xs-right"><i
                                                class="material-icons">mail</i> Report </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach

                @else
                    <h3>No professional found</h3>
                @endif



            </div>
            <nav class="center"> {!! $professionals->render() !!} </nav>
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
