@extends('layouts.dashboard')
@section('content')

    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Roboto Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
        rel="stylesheet">


    @include('includes.alert')
    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">

            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">APPLICATIONS</li>
            </ol>
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#first" data-toggle="tab">EARLY BIRD ACCESS</a>
                    </li>
                    <!-- <li class="nav-item">
                <a class="nav-link" href="#second" data-toggle="tab">Billing</a>
              </li> -->
                </ul>
                <div class="p-a-2 tab-content">
                    <div class="tab-pane active" id="first">

                        <div class="card card-stats-success">
                            <div class="card-block">
                                <p class="text-muted center">You seem to be Interested in the 360 Explorer APPLICATIONS, you
                                    aren't alone and we gat your back on this.<br />NOTE: Get Early Bird Access today by
                                    going PRO with just $10 and gain access to the APPLICATIONS for Life.</p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card">
                    <div class="card-block">
                        <div class="form-group">
                            <br><br>
                            <center>
                                <h3>Our Premium Partners</h3>
                                <div class="gap"></div>
                                <div class="gap"></div><br>
                                <a href="https://www.payza.com" target="_blank"><img
                                        src="http://localhost/wallet/public/uploads/payza.png" alt="Fortumo" width="80"></a>
                                <a href="https://fortumo.com/" target="_blank"><img
                                        src="http://localhost/wallet/public/uploads/fortumo.png" alt="Fortumo"
                                        width="80"></a>
                                <a href="https://stripe.com/" target="_blank"><img
                                        src="http://localhost/wallet/public/uploads/stripe.png" alt="Fortumo"
                                        width="80"></a>
                                <a href="https://www.skrill.com" target="_blank"><img
                                        src="http://localhost/wallet/public/uploads/skrill.gif" alt="Fortumo"
                                        width="80"></a>
                            </center>
                            <br>
                            <center><button type="submit" class="btn btn-success btn-rounded">Go PRO</button></center>

                        </div>
                    </div>
                    <div class="card card-stats-success">
                        <div class="card-block">
                            <center>360 Explorer will be delivered to you in Partnership with selected Customer Centric
                                Organizations known as Premium Partners. <a href="{!! URL::route('pending.create') !!}">Learn More</a>
                            </center>
                        </div>
                    </div>

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


    <!-- jQuery -->
    {!! Html::script('dist/vendor/jquery.min.js') !!}

    <!-- Bootstrap -->
    {!! Html::script('dist/vendor/tether.min.js') !!}
    {!! Html::script('dist/vendor/bootstrap.min.js') !!}

    <!-- AdminPlus -->
    {!! Html::script('dist/vendor/adminplus.js') !!}

    <!-- App JS -->
    {!! Html::script('dist/js/main.min.js') !!}
