@extends('layouts.dashboard')

@section('style')
    {!! Html::style('dist/cssc/bootstrap.striped.min.css') !!}

    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">

    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <style type="text/css">
        .credit {
            color: green;
        }

        .debit {
            color: orange;
        }

        .commision {
            color: #29b6f6;
        }

    </style>

@stop


@section('content')
    <!-- Content -->

    <div class="layout-content" data-scrollable>

        <div class="container-fluid">

            <div class="viewtable">


                @include('includes.alert')

                {{-- <ol class="breadcrumb"> --}}

                {{-- <li><a href="{{ url('/') }}">Home</a></li> --}}

                <!--<li class="active">{!! $title = 'Search Wallet History' !!}</li>-->

                {{-- </ol> --}}

                <a href="{{ url('/wallet/view-wallet-history') }}">
                    <button class="btn btn-primary waves-effect waves-light">View Wallet history</button>
                </a>
                <br>
                @if (Session::has('error_message'))

                    <div class="alert alert-danger" id="msg">

                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
                            <span class="sr-only">Close</span>
                        </button>

                        <span class="msg">
                            {!! ucwords(session('error_message')) !!}
                        </span>
                    </div>

                @endif

                <p class="btn-group pull-md-left">
                <div class="Searchdetails">
                    <form action="{{ url('/wallet/search') }}" method="GET" id="filter" name="myform" id="myform">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Start Date</label>
                            </div>
                            <div class="col-md-6">
                                <label>End Date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="startDate" id="startDate" placeholder="YYYY/MM/DD"
                                    @if (isset($_GET) && !empty($_GET['startDate'])) value="{{ $_GET['startDate'] }}" @endif required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="endDate" id="endDate" @if (isset($_GET) && !empty($_GET['endDate'])) value="{{ $_GET['endDate'] }}" @endif
                                    placeholder="DD/MM/YYYY" required class="form-control">
                            </div>
                        </div>
                        <div class="buttonblock row">
                            <div class="col-md-12 ">
                                <input type="submit" class="btn btn-default searchbtn" value="Search"
                                    style="background-color: #2196f3;color: #fff;">
                            </div>
                        </div>
                    </form>
                </div>
                </p>
                <div class="card">

                    <h5>Search Wallet History</h5>

                    @if (count($arrWallet))

                        <table id="datatable-example" class="table table-striped table-hover">

                            <thead>

                                <tr>

                                    <th>No</th>

                                    <th>Amount</th>

                                    <th>Mode</th>

                                    <th>Comment</th>

                                    <th>Date-Time</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($arrWallet as $key => $value)

                                    <tr @if ($value->mode == 'credit' || $value->mode == 'WalletCredit') class="credit" @elseif($value->mode == "debit") class="debit" @else class="commision" @endif>

                                        <td>{!! ++$key !!}</td>

                                        @if ($value->mode == 'commision')
                                            <td>{!! $value->commision !!}</td>
                                        @else
                                            <td>${!! number_format($value->amount, 2) !!}</td>
                                        @endif

                                        <td>{!! ucfirst($value->mode) !!}</td>

                                        <td>{!! ucfirst($value->comment) !!}</td>

                                        <td>{!! date('d-M-Y h:s A', strtotime($value->created_at)) !!}</td>

                                    </tr>

                                @endforeach
                            </tbody>

                        </table>

                    @else

                        <span class="nodata">No Data Found<span>

                    @endif

                    <nav class="center">
                        {!! $arrWallet->render() !!}
                    </nav>

                </div><!-- /.box-body -->

            </div>

        </div><!-- /.col -->

    </div><!-- /.row -->

    </section><!-- /.content -->

@stop


@section('script')
    <!-- jQuery -->
    {!! Html::script('dist/vendor/jquery.min.js') !!}

    {!! Html::script('dist/vendor/tether.min.js') !!}

    {!! Html::script('dist/vendor/bootstrap.min.js') !!}

    {!! Html::script('dist/vendor/adminplus.js') !!}

    {!! Html::script('dist/js/main.min.js') !!}

    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js') !!}

    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js') !!}

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <script type="text/javascript">
        jQuery(document).ready(function() {

            var date_input = $('input[name="startDate"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'yyyy/mm/dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);

            var date_input2 = $('input[name="endDate"]'); //our date input has the name "date"
            var container2 = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options2 = {
                format: 'yyyy/mm/dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input2.datepicker(options2);
        });
    </script>
@stop
