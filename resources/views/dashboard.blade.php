@extends('layouts.dashboard')

@section('style')
    {{-- <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" /> --}}
@stop

@section('content')

    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">

    <!-- Roboto Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
        rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! Html::style('dist/cssc/style.css') !!}

    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            <!--<ol class="breadcrumb">
                                                                                                                                                                                                                                <li><a href="{!! route('dashboard') !!}">Home</a></li>
                                                                                                                                                                                                                                <li class="active">Dashboard</li>
                                                                                                                                                                                                                            </ol> -->
            @include('includes.alert')
            @if (Session::has('flash_message'))
                <div class="alert bg-success alert-styled-left" id="msg">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                            class="sr-only">Close</span></button>
                    <span class="text-semibold">
                        {!! session('flash_message') !!}
                    </span>
                </div>
            @elseif(Session::has('Error_message'))
                <div class="alert bg-danger alert-styled-left" id="msg">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                            class="sr-only">Close</span></button>
                    <span class="text-semibold">
                        {!! session('Error_message') !!}
                    </span>
                </div>
            @endif
            @if (Auth::user()->hasRole('admin'))

                <div class="card card-stats-primary">
                    <div class="card-block">
                        <div class="media" style="padding: 8px; padding-top: 16px;">
                            <div class="media-left media-middle">
                                <i class="material-icons text-muted-light">credit_card</i>
                            </div>
                            <div class="media-body media-middle">
                                <span>Total Deposited Funds:</span>
                                <strong class="text-success">${!! number_format($TotalAmt, 2) !!}</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                {{-- <div class="card card-stats-primary">
            <div class="card-block">
                <div class="media">
                    <div class="media-left media-middle">
                        <i class="material-icons text-muted-light">credit_card</i>
                    </div>
                    <div class="media-body media-middle">
                        <span>Your Current Balance</span>
                        <strong class="text-success">${!!\App\PendingTransfers::balance() -
                            \App\PendingTransfers::productCost() !!}</strong>
                    </div>
                    <div class="media-right">
                        <a class="btn btn-success btn-rounded" href="{!! URL::route('paypal.create') !!}">Add Funds</a>
                    </div>
                </div>
            </div>
        </div> --}}


                <!-- Begin: monetary statistics cards -->
                <div class="card-header bg-white">
                    <!-- <h4 class="card-title">Your monetary statistics</h4> -->
                    <p class="card-subtitle font-weight-bold">Monetary statistics</p>
                </div>
                <div class="row">
                    <div class="col-6">
                        <!-- small box -->
                        <div class="small-box bg-info h-100">
                            <div class="inner">
                                <h3>
                                    @if (!empty($TotalRevenue))
                                        ${{ number_format($TotalRevenue, 2) }}
                                    @else
                                        $0
                                    @endif
                                </h3>

                                <p>Total Revenue</p>
                            </div>
                            <div class="icon">
                                <!-- <i class="ion ion-bag"></i> -->
                                <i class="fa fa-money-bill-wave"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-6">
                        <!-- small box -->
                        <div class="small-box bg-info h-100">
                            <div class="inner">
                                <h3>
                                    @if (!empty($TotalProfit))
                                        ${{ number_format($TotalProfit, 2) }}
                                    @else
                                        $0
                                    @endif
                                </h3>

                                <p>Total Profit</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-funnel-dollar"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- End: monetary statistics cards -->


                <hr />


                <!-- Begin: publisher statistics cards -->
                <div class="card-header bg-white">
                    <p class="card-subtitle font-weight-bold">Publisher Statistics</p>
                </div>
                <div class="row">
                    <div class="col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning h-100">
                            <div class="inner">
                                <h3>
                                    {{ $totalClient }}
                                </h3>

                                <p>Total Count</p>
                            </div>
                            <div class="icon">
                                <!-- <i class="ion ion-bag"></i> -->
                                <i class="fa fa-users"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-6">
                        <!-- small box -->
                        <div class="small-box bg-info h-100">
                            <div class="inner">
                                <h3>
                                    {{ $emailCount }}
                                </h3>

                                <p>Email</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger h-100">
                            <div class="inner">
                                <h3>
                                    {{ $phoneCount }}
                                </h3>

                                <p>Phone</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-6">
                        <!-- small box -->
                        <div class="small-box bg-info h-100">
                            <div class="inner">
                                <h3>
                                    {{ $activeClient }}
                                </h3>

                                <p>Verified Publishers</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-check"></i>
                            </div>
                            <a href="/allUsers" class="small-box-footer">View<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-6 mt-1">
                        <!-- small box -->
                        <div class="small-box bg-warning h-100">
                            <div class="inner">
                                <h3>
                                    {{ $NonActiveClient }}
                                </h3>

                                <p>Unverified Publishers</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-times"></i>
                            </div>
                            <a href="allUsersInactive" class="small-box-footer">View<i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- End: publisher statistics cards -->



                <hr>


                <!-- Begin: Total advertiser statistics cards -->
                <div class="card-header bg-white">
                    <p class="card-subtitle font-weight-bold">Total Advertisers Statistics</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>
                                    {{ $totalVendors }}
                                </h3>

                                <p>Total Advertisers</p>
                            </div>
                            <div class="icon">
                                <!-- <i class="ion ion-bag"></i> -->
                                <i class="fa fa-chart-pie"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- End: Total advertiser statistics cards -->


                <!-- Begin: Total campaign statistics cards -->
                <div class="card-header bg-white">
                    <p class="card-subtitle font-weight-bold">Total Campaign Statistics</p>
                </div>
                <div class="row">
                    <div class="col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>
                                    {{ $totalCamps }}
                                </h3>

                                <p>Total Campaigns</p>
                            </div>
                            <div class="icon">
                                <!-- <i class="ion ion-bag"></i> -->
                                <i class="fa fa-ad"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- small box -->
                        <div class="small-box bg-info h-100">
                            <div class="inner">
                                <h3>
                                    ${{ number_format($totalCampsCost, 2) }}
                                </h3>

                                <p>Total Campaign cost</p>
                            </div>
                            <div class="icon">
                                <!-- <i class="ion ion-bag"></i> -->
                                <i class="fa fa-comments-dollar"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- End: Total campaign statistics cards -->


                <!-- Begin: Total successful campaign statistics cards -->
                <div class="card-header bg-white">
                    <p class="card-subtitle font-weight-bold">Total Successful Campaign Statistics</p>
                </div>
                <div class="row">
                    <div class="col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>
                                    {{ $totalSuccessCamps }}
                                </h3>

                                <p>Total Successful Campaigns</p>
                            </div>
                            <div class="icon">
                                <!-- <i class="ion ion-bag"></i> -->
                                <i class="fa fa-check"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- small box -->
                        <div class="small-box bg-info h-100">
                            <div class="inner">
                                <h3>
                                    ${{ number_format($totalSuccessCampsCost, 2) }}
                                </h3>

                                <p>Total Successful Campaign cost</p>
                            </div>
                            <div class="icon">
                                <!-- <i class="ion ion-bag"></i> -->
                                <i class="fa fa-times"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- End: Total successful campaign statistics cards -->


                <hr>
                <div class="col-sm-12 dashboardcard">
                    <div class="card">
                        <div class="card-header bg-white">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="card-title">Advertisers Statistics By Cities</h4>
                                </div>
                                <div class="media-right media-middle">
                                    <a class="btn btn-primary" href="{{ url('/advertiser/view-advertiser') }}">View</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($arrvendorsCity)
                                        <?php
                                        $i = 1;
                                        ?>
                                        @foreach ($arrvendorsCity as $key => $value)
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $key }}</td>
                                                <td>{{ $value }}</td>
                                            </tr>
                                            <?php
                                            $i++;
                                            ?>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                </div>
                <br>
        </div>



    @elseif(Auth::user()->hasRole('vendor'))

        <div class="card card-stats-primary">
            <div class="card-block">
                <div class="media" style="padding: 8px; padding-top: 16px;">
                    <div class="media-left media-middle">
                        <i class="material-icons text-muted-light">credit_card</i>
                    </div>
                    <div class="media-body media-middle">
                        <span>Your Current Balance</span>
                        <?php $amt = \App\PendingTransfers::balance() - \App\PendingTransfers::productCost(); ?>
                        <strong class="text-success">${!! number_format($amt, 2) !!}</strong>
                    </div>
                    @if (Auth::user()->hasRole('vendor'))
                        <div class="media-right">
                            <a class="btn btn-success btn-rounded" href="{!! URL::route('paypal.create') !!}">Add Funds</a>
                        </div>
                    @endif
                </div>
            </div>
            <a class="ubm-banner" data-id="1"></a>
        </div>

        <br />

        <hr>
        <p class="card-subtitle">
            <strong>Your Advertiser Statistics</strong>
        </p>

        <!-- new -->
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info h-100">
                    <div class="inner">
                        <h3>{{ $ActiveAd }}</h3>

                        <p>Active Ads</p>
                    </div>
                    <div class="icon">
                        <!-- <i class="ion ion-bag"></i> -->
                        <i class="fa fa-check"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info h-100">
                    <div class="inner">
                        <h3>{{ $Impressions ?? 0 }}
                            <!-- <sup style="font-size: 20px">%</sup> -->
                        </h3>

                        <p>Impressions</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-eye"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning h-100">
                    <div class="inner">
                        <h3>{{ $Clicks ?? 0 }}</h3>

                        <p>Clicks</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-mouse-pointer"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger h-100">
                    <div class="inner">
                        <h3>{{ $Leads }}</h3>

                        <p>Leads</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- end new  -->

        <!-- <canvas id="myChart" width="100" height="100"></canvas> -->

    </div>
    </div>

    </div>
    </div>

@else

    <div class="card card-stats-primary">
        <div class="card-block">
            <div class="media p-2">
                <div class="media-left media-middle">
                    <i class="material-icons text-muted-light">credit_card</i>
                </div>
                <div class="media-body media-middle">
                    <span>Your Current Balance</span>
                    <?php $amt = \App\PendingTransfers::balance() - \App\PendingTransfers::productCost(); ?>
                    <strong class="text-success">${!! number_format($amt, 2) !!}</strong>
                </div>
                @if ($amt > 0)
                    <div class="media-right">
                        <a class="btn btn-success btn-rounded" href="{!! URL::route('withdraw.create') !!}">Withdraw Funds</a>
                    </div>
                @endif
            </div>
        </div>
        <a class="ubm-banner" data-id="1"></a>
    </div>

    <br />
    <br />

    <!-- Begin: publisher statistics cards -->
    <div class="card-header bg-white">
        <!-- <h4 class="card-title">Your monetary statistics</h4> -->
        <p class="card-subtitle font-weight-bold">Your tatistics</p>
    </div>
    <div class="row">

        <div class="col-6 col-lg-3">
            <!-- small box -->
            <div class="small-box bg-info h-100">
                <div class="inner">
                    <h3>
                        {{ $ActiveAd }}
                    </h3>

                    <p>Active Ads</p>
                </div>
                <div class="icon">
                    <!-- <i class="ion ion-bag"></i> -->
                    <i class="fa fa-check"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->

        <div class="col-6 col-lg-3">
            <!-- small box -->
            <div class="small-box bg-info h-100">
                <div class="inner">
                    <h3>
                        {{ $Impressions }}
                    </h3>

                    <p>Impressions</p>
                </div>
                <div class="icon">
                    <!-- <i class="ion ion-bag"></i> -->
                    <i class="fa fa-eye"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-6 col-lg-3">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>
                        {{ $Clicks }}
                    </h3>

                    <p>Clicks</p>
                </div>
                <div class="icon">
                    <!-- <i class="ion ion-bag"></i> -->
                    <i class="fa fa-mouse"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-6 col-lg-3">
            <!-- small box -->
            <div class="small-box bg-warning h-100">
                <div class="inner">
                    <h3>
                        {{ $Leads }}
                    </h3>

                    <p>Leads</p>
                </div>
                <div class="icon">
                    <!-- <i class="ion ion-bag"></i> -->
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->

    </div>
    <!-- End: publisher statistics cards -->

    </div>
    </div>

    </div>
    </div>
    @endif
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

    {{-- <script type="text/javascript" src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/form_select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/datatables_responsive.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/datatables_basic.js') }}"></script> --}}

    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script type="text/javascript">
        var ctx = document.getElementById("myChart").getContext('2d');
        var d = new Date();
        var n = d.getFullYear();
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: '# of Ads ' + n,
                    data: [7, 4, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script> --}}
@stop
