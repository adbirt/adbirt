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
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('paypal.create') !!}">Add Funds</a></li>
                <li class="active">Bank Transfer</li>
            </ol>
            @include('includes.alert')
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#first" data-toggle="tab">{!! $title !!}</a>
                    </li>
                    <!-- <li class="nav-item">
                <a class="nav-link" href="#second" data-toggle="tab">Billing</a>
              </li> -->
                </ul>
                <div class="p-a-2 tab-content">
                    <div class="tab-pane active" id="first">
                        {!! Form::open(['role' => 'form', 'route' => 'pending.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                        <!-- <div class="form-group row">
                    <label for="avatar" class="col-sm-3 form-control-label">Avatar</label>
                    <div class="col-sm-9">
                      <div class="media">
                        <div class="media-left">
                          <div class="icon-block">
                            <i class="material-icons text-muted-light md-36">photo</i>
                          </div>
                        </div>
                        <div class="media-body media-middle">
                          <label class="file">
                            <input type="file" id="file">
                            <span class="file-custom"></span>
                          </label>
                        </div> 
                      </div>
                    </div>-->
                    </div>
                    <!--<div class="form-group row">
                    {!! Form::label('amount', 'Your Name:', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6 col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"> -->
                    <i class="material-icons md-18 text-muted">credit_card</i>
                    </span>
                    <!-- {!! Form::text('amount', null, ['class' => 'form-control', 'placeholder' => 'Full Name', 'value' => 'Full Name', 'required']) !!} -->

                    <input type="hidden" value="10" name="amount">

                    <!-- </div>
                    </div> 
                  </div>-->
                    <div class="form-group row">
                        {!! Form::label('bank', 'Your Company Name:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6 col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="material-icons md-18 text-muted">account_balance</i>
                                </span>
                                {!! Form::text('bank', null, ['class' => 'form-control', 'placeholder' => 'Company Name', 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('date', 'Your Company Website:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6 col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon2">
                                    <i class="material-icons md-18 text-muted">alarm_on</i>
                                </span>
                                {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'Website URL', 'id' => 'url', 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('comment', 'What do you want to Promote?:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6 col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon3">
                                    <i class="material-icons md-18 text-muted">speaker_notes</i>
                                </span>
                                {!! Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Tell us what your Business is into and what you want to Promote']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="media-body media-middle p-l-1">
                        <label class="c-input c-checkbox">
                            <input type="checkbox" checked disabled="disabled">
                            <span class="c-indicator"></span> I Agree to Adbirt, Inc Terms of Service and Privacy Policy.
                        </label>
                    </div>
                    <br />
                    <div class="form-group row">
                        <div class="col-sm-8 col-sm-offset-3">
                            <div class="media">
                                <div class="media-left">
                                    {!! Form::submit('Claim $10', ['class' => 'btn btn-lg btn-success']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <!--  <div class="tab-pane" id="second">
                <form action="#" class="form-horizontal">
                  <div class="form-group row">
                    <label for="name_on_invoice" class="col-sm-3 form-control-label">Name on Invoice</label>
                    <div class="col-sm-6 col-md-4">
                      <input type="text" class="form-control" value="Adrian Demian">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="address" class="col-sm-3 form-control-label">Address</label>
                    <div class="col-sm-6 col-md-4">
                      <input type="text" class="form-control" value="Sunny Street, 21, Miami, Florida">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="country" class="col-sm-3 form-control-label">Country</label>
                    <div class="col-sm-6 col-md-4">
                      <select class="c-select form-control">
                        <option value="1" selected>USA</option>
                        <option value="2">India</option>
                        <option value="3">United Kingdom</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 col-md-4 col-sm-offset-3">
                      <a href="#" class="btn btn-success btn-rounded"> Update Billing</a>
                    </div>
                  </div>
                </form>
                <div class="card m-t-2">
                  <div class="card-header bg-white">
                    <div class="media">
                      <div class="media-body media-middle">
                        <h4 class="card-title">Payment Info</h4>
                      </div>
                      <div class="media-right media-middle">
                        <a href="#" class="btn btn-primary-outline"><i class="material-icons">add</i></a>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <ul class="list-group m-b-0">
                      <li class="list-group-item active">
                        <div class="media">
                          <div class="media-left">
                            <span class="btn btn-primary btn-circle"><i class="material-icons">credit_card</i></span>
                          </div>
                          <div class="media-body media-middle">
                            <p class="m-b-0">**** **** **** 2422</p>
                            <small class="text-muted">Updated on 12/02/2016</small>
                          </div>
                          <div class="media-right media-middle">
                            <a href="#" class="btn btn-primary btn-sm">
                              <i class="material-icons">edit</i> EDIT
                            </a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="media">
                          <div class="media-left">
                            <span class="btn btn-white btn-circle"><i class="material-icons">credit_card</i></span>
                          </div>
                          <div class="media-body media-middle">
                            <p class="m-b-0">**** **** **** 6321</p>
                            <small class="text-muted">Updated on 11/01/2016</small>
                          </div>
                          <div class="media-right media-middle">
                            <a href="#" class="btn btn-white btn-sm">
                              <i class="material-icons">edit</i> EDIT
                            </a>
                          </div>
                        </div> -->
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


@section('script')


    {!! Html::script('plugins/datepicker/bootstrap-datepicker.js') !!}


    <script type="text/javascript">
        $("#date").datepicker({
            format: 'yyyy-mm-dd',
            endDate: '+0d',
            autoclose: true
        });
    </script>

@stop

<!-- jQuery -->
{!! Html::script('dist/vendor/jquery.min.js') !!}

<!-- Bootstrap -->
{!! Html::script('dist/vendor/tether.min.js') !!}
{!! Html::script('dist/vendor/bootstrap.min.js') !!}

<!-- AdminPlus -->
{!! Html::script('dist/vendor/adminplus.js') !!}

<!-- App JS -->
{!! Html::script('dist/js/main.min.js') !!}
