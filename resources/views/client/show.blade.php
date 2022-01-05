@extends('layouts.dashboard')

@section('style')
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

            <div class="container">

                <hr />

                <div class="row" class="font-weight-bold">
                    <div class="col-12 col-lg-4">
                        <div class="card w-100">
                            <h5 class="text-muted p-2">Overview</h5>
                            <hr />
                            <?php
                            $profilePhotoUrl = strip_tags(substr($user->profile->propic, 0, 4) == 'http' ? $user->profile->propic : (substr($user->profile->propic, 0, 8) == '/uploads' ? 'https://adbirt.com/public' . $user->profile->propic : $user->profile->propic)) . '';
                            if (strlen($profilePhotoUrl) == 0) {
                                $profilePhotoUrl = 'https://adbirt.com/public/assets-revamp/img/avatar.png';
                            }
                            ?>
                            <img src="{!! $profilePhotoUrl !!}" class="card-img-top" alt="{!! $user->name !!}">
                            <div class="card-body">
                                <h3 class="card-text h3 font-weight-bold d-block w-100">
                                    {!! $user->name !!}
                                </h3>
                                <p class="card-text font-italic d-block w-100">
                                    {{ $user->address }}, {{ $user->profile->city }},
                                    {{ $user->profile->state }}, {{ $user->country }}
                                </p>
                                <p class="card-text">
                                    {{ $user->profile->aboutmyself }}
                                </p>
                                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                            </div>
                        </div>

                        {{-- <a href="javascript:void(0)" class="mb-1">
                            {!! Html::image($user->profile->propic, 'User profile picture', ['class' => 'img-responsive img-circle profile-pic']) !!}
                        </a>

                        <h2 class="h2 mb-0">{{ $user->name }}</h2>

                        <p class="lead text-muted m-b-0">{{ $user->address }}, {{ $user->profile->city }},
                            {{ $user->profile->state }}, {{ $user->country }}</p>
                        <p>{{ $user->profile->aboutmyself }}</p> --}}
                    </div>

                    <div class="col-12 col-lg-8">
                        <h5 class="text-muted p-2">Personal info</h5>
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
                                                href="mailto:{{ $user->email }}">{{ $user->email or '' }}</a>
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
                                                href="tel:{{ $user->profile->phone }}">{{ $user->profile->phone }}</a>
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
                                            {{ $user->birthday }}
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
                                            {{ ucfirst($user->profile->gender) }}
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

                <br />

                {{-- <strong><i class="fa fa-pencil margin-r-5"></i> Social Profiles</strong>
                <ul>
                    <li>Personal Website: <a
                            href="{{ $user->profile->personal_site }}">{{ $user->profile->personal_site }}</a></li>
                    <li>Facebook URL: <a href="{{ $user->profile->fb }}">{!! $user->profile->fb !!}</a></li>
                    <li>Twitter Account: <a href="{{ $user->profile->twitter }}">{{ $user->profile->twitter }}</a>
                    </li>
                    <li>Google+ Profile: <a href="{{ $user->profile->gp }}">{{ $user->profile->gp }}</a></li>
                    <li>Pinterest: <a href="{{ $user->profile->pinterest }}">{{ $user->profile->pinterest }}</a></li>
                    <li>Instagram: <a href="{{ $user->profile->instagram }}">{{ $user->profile->instagram }}</a></li>
                    <li>About.me: <a href="{{ $user->profile->aboutme }}">{{ $user->profile->aboutme }}</a></li>
                    <li>LinkedIn: <a href="{{ $user->profile->linkedin }}">{{ $user->profile->linkedin }}</a></li>
                </ul> --}}
                </p>
            </div>

            <br />
            <br />
            <br />
            <hr class="m-0">

        </div>
    </div>
@stop
