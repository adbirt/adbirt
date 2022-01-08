@extends('layouts.dashboard')

@section('style')
    {!! Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') !!}
    <!-- Ionicons -->
    {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en') !!}
    <style>
        .small-box .icon>i.fa,
        .small-box .icon>i.fab,
        .small-box .icon>i.fad,
        .small-box .icon>i.fal,
        .small-box .icon>i.far,
        .small-box .icon>i.fas,
        .small-box .icon>i.ion {
            font-size: 40px;
        }

        .bio-card {
            height: 100px !important;
        }

    </style>
@stop

@section('content')

    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">

            @include('includes.alert')

            <div class="row" class="font-weight-bold">
                <div class="col-12 col-lg-4">
                    <div class="card w-100">
                        <?php
                        $profilePhotoUrl = strip_tags(substr(Auth::user()->profile->propic, 0, 4) == 'http' ? Auth::user()->profile->propic : (substr(Auth::user()->profile->propic, 0, 8) == '/uploads' ? 'https://adbirt.com/public' . Auth::user()->profile->propic : Auth::user()->profile->propic)) . '';
                        if (strlen($profilePhotoUrl) == 0) {
                            $profilePhotoUrl = 'https://adbirt.com/public/assets-revamp/img/avatar.png';
                        }
                        ?>
                        <img src="{!! $profilePhotoUrl !!}" class="card-img-top" alt="{!! Auth::user()->name !!}">
                        <div class="card-body">
                            <h3 class="card-text h3 font-weight-bold d-block w-100">
                                {!! Auth::user()->name !!}
                            </h3>
                            <p class="card-text">
                                {{ Auth::user()->profile->profession }}
                            </p>
                            <p class="card-text font-italic d-block w-100">
                                {{ Auth::user()->address }}, {{ Auth::user()->profile->city }},
                                {{ Auth::user()->profile->state }}, {{ Auth::user()->country }}
                            </p>
                            <p class="card-text">
                                {{ Auth::user()->profile->aboutmyself }}
                            </p>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-lg-8">
                    <h5 class="text-muted">Personal info</h5>
                    <hr />
                    <!-- Begin: Bio -->
                    <div class="row">

                        <div class="col-12 col-md-6 bio-card my-1">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h4 class="font-weight-bold">
                                        Email
                                    </h4>
                                    <h4>
                                        <a class="text-black" target="_blank"
                                            href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                                        &nbsp;
                                    </h4>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>

                        <div class="col-12 col-md-6 bio-card my-1">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h4 class="font-weight-bold">
                                        Phone Number
                                    </h4>
                                    <h4>
                                        <a class="text-white" target="_blank"
                                            href="tel:{{ Auth::user()->phone }}">{{ Auth::user()->phone }}</a>
                                        &nbsp;
                                    </h4>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>

                        <div class="col-12 col-md-6 bio-card my-1">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h4 class="font-weight-bold">
                                        Birthday
                                    </h4>
                                    <h4>
                                        {{ Auth::user()->birthday }}
                                        &nbsp;
                                    </h4>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-birthday-cake"></i>
                                </div>
                                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>

                        <div class="col-12 col-md-6 bio-card my-1">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h4 class="font-weight-bold">
                                        Gender
                                    </h4>
                                    <h4>
                                        {{ ucfirst(Auth::user()->profile->gender) }}
                                        &nbsp;
                                    </h4>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-restroom"></i>
                                </div>
                                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div>

                    </div>
                    <!-- End: Bio -->
                </div>
            </div>


            <!--  <hr>
                                              <div class="row">
                                                <div class="col-md-6 col-md-offset-3 center">
                                                  <h4 class="m-b-0">Social Profiles</h4>
                                                  <p class="text-muted ">{{ Auth::user()->name }}'s Social Circle</p>
                                                  <div class="btn btn-primary btn-circle"><a href="{{ Auth::user()->profile->personal_site }}">{{ Auth::user()->profile->personal_site }}<i class="material-icons">thumb_up</i></a></div>
                                                 <li>Personal Website: <a href="{{ Auth::user()->profile->personal_site }}">{{ Auth::user()->profile->personal_site }}</a></li>
                                                            <li>Facebook URL: <a href="{{ Auth::user()->profile->fb }}">{!! Auth::user()->profile->fb !!}</a></li>
                                                            <li>Twitter Account: <a href="{{ Auth::user()->profile->twitter }}">{{ Auth::user()->profile->twitter }}</a></li>
                                                            <li>Google+ Profile: <a href="{{ Auth::user()->profile->gp }}">{{ Auth::user()->profile->gp }}</a></li>
                                                            <li>Pinterest: <a href="{{ Auth::user()->profile->pinterest }}">{{ Auth::user()->profile->pinterest }}</a></li>
                                                            <li>Instagram: <a href="{{ Auth::user()->profile->instagram }}">{{ Auth::user()->profile->instagram }}</a></li>
                                                            <li>About.me: <a href="{{ Auth::user()->profile->aboutme }}">{{ Auth::user()->profile->aboutme }}</a></li>
                                                            <li>LinkedIn: <a href="{{ Auth::user()->profile->linkedin }}">{{ Auth::user()->profile->linkedin }}</a></li>
                                                  <br>
                                                  <br>
                                                </div>
                                              </div> -->

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
@stop
