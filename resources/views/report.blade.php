@extends('layouts.dashboard')
@section('content')

    <!-- <link rel="stylesheet" href="http://www.expertphp.in/css/bootstrap.css" type="text/css" media="all" /> -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script src="http://demo.expertphp.in/js/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}">Feedback</a></li>
                <li class="active">Report User</li>
            </ol>
            @include('includes.alert')
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#first" data-toggle="tab">Report User</a>
                    </li>
                    <!-- <li class="nav-item">
                <a class="nav-link" href="#second" data-toggle="tab">Billing</a>
              </li> -->
                </ul>
                <div class="p-a-2 tab-content">
                    <div class="tab-pane active" id="first">
                        {!! Form::open(['route' => 'postcontact', 'method' => 'POST']) !!}

                    </div>
                    <div class="form-group row">
                        {!! Form::label('name', 'Name*:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6 col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="material-icons md-18 text-muted">perm_identity</i>
                                </span>
                                {!! Form::text('name', null, ['placeholder' => 'Name of the Alien', 'class' => 'form-control']) !!}
                                {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('phone', 'Phone*:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6 col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="material-icons md-18 text-muted">phone</i>
                                </span>
                                {!! Form::text('phone', null, ['placeholder' => 'Phone of the Alien', 'class' => 'form-control']) !!}
                                {!! $errors->first('phone', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('message', 'Message*:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6 col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon2">
                                    <i class="material-icons md-18 text-muted">message</i>
                                </span>
                                {!! Form::textarea('message', null, ['placeholder' => 'Explain in detail what the Alien did', 'class' => 'form-control', 'style' => 'height:auto', 'style' => 'width:auto']) !!}
                                {!! $errors->first('message', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="media-body media-middle p-l-1">
                        <label class="c-input c-checkbox">
                            <input type="checkbox" checked disabled="disabled">
                            <span class="c-indicator"></span> I Acknowledge that all Report given about this user is True
                            to the best of my own Knowlege.
                        </label>
                    </div>
                    <br />
                    <div class="form-group row">
                        <div class="col-sm-8 col-sm-offset-3">
                            <div class="media">
                                <div class="media-left">
                                    {!! Form::submit('Report User', ['class' => 'btn btn-lg btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>

    </div>
    </div>

@section('style')

@stop


<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
        case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;
    
        case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
        case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
        case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
        }
    @endif
</script>
