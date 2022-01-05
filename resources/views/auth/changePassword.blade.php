@extends('layouts.dashboard')
@section('content')

    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Roboto Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
        rel="stylesheet">

    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            @include('includes.alert')
            <ol class="breadcrumb">
                <li><a href="{{ route('profile') }}">My Profile</a></li>
                <li class="active">{{ $title }}</li>
            </ol>

            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="{!! route('password.change') !!}" data-toggle="tab">Account</a>
                    </li>
                </ul>
                <div class="p-a-2 tab-content">
                    <div class="tab-pane active" id="first">
                        {!! Form::open(['route' => 'password.doChange', 'class' => 'form-horizontal']) !!}

                        <div class="form-group row">
                            {!! Form::label('password', 'New Password', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6 col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">
                                        <i class="material-icons md-18 text-muted">lock</i>
                                    </span>
                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'New Password']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('password_confirmation', 'Confirm New Password', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6 col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">
                                        <i class="material-icons md-18 text-muted">lock</i>
                                    </span>
                                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm New Password']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 col-sm-offset-3">
                                <div class="media">
                                    <div class="media-left">
                                        {!! Form::submit('Reset Password', ['class' => 'btn btn-primary btn-rounded']) !!}
                                    </div>
                                    <div class="media-body media-middle p-l-1">
                                        <!-- <label class="c-input c-checkbox">
                            <input type="checkbox" checked>
                            <span class="c-indicator"></span> Subscribe to Newsletter
                          </label> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
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
