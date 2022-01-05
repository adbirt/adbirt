@extends('layouts.dashboard')

@section('style')
    {!! Html::style('dist/cssc/bootstrap.striped.min.css') !!}
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">

    <style type="text/css">
        .credit {
            color: green;
        }

        .debit {
            color: red;
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

                <!--{{-- <ol class="breadcrumb"> --}}

                            {{-- <li><a href="{{ url('/') }}">Home</a></li> --}}

                            <li class="active">{!! $title = 'View Wallet History' !!}</li>

                        {{-- </ol> --}}-->

                <a href="{{ url('/wallet/search-wallet-history') }}">
                    <button class="btn btn-primary waves-effect waves-light">Search Wallet history</button>
                </a>

                <div class="card">

                    @if (Session::has('flash_message'))

                        <div class="alert alert-success">

                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
                                <span class="sr-only">Close</span>
                            </button>

                            <span class="msg">
                                {!! session('flash_message') !!}
                            </span>
                        </div>

                    @endif


                    @if (count($arrWallet))

                        <div class="table-responsive">
                            <table id="datatable-example" class="table table-striped table-hover ">

                                <thead>

                                    <tr>

                                        <th>S/N</th>

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
                        </div>

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

@stop
