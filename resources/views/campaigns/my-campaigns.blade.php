@extends('layouts.dashboard')

@section('style')
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
    <style type="text/css">
        .dropAction {
            min-width: 40px;
            text-align: center;
            background: white;
        }

    </style>
@stop


@section('content')
    <!-- Content -->
    <div class="layout-content" data-scrollable id="mainDiv">
        <div class="container-fluid">
            @if (Session::has('flash_message'))
                <div class="alert bg-success alert-styled-left" id="msg">
                    <button type="button" class="close" data-dismiss="alert"><span>&nbsp;</span><span
                            class="sr-only">Close</span></button>
                    <span class="text-semibold">
                        {!! session('flash_message') !!}
                </div>
            @endif

            <div class="alert bg-success alert-styled-left" id="msg" style="display:none;">
                <button type="button" class="close" data-dismiss="alert"><span>&nbsp;</span><span
                        class="sr-only">Close</span></button>
                <span class="text-semibold">
                    Successfully Deleted...
            </div>

            <div class="viewtable">
                @include('includes.alert')
                {{-- <ol class="breadcrumb"> --}}
                <!--<li class="active">{!! $title = 'My Ads' !!}</li>-->
                {{-- </ol> --}}
                <div class="card">
                    @if (isset($campaignsData) && count($campaignsData))
                        <div class="table-responsive">
                            <table id="datatable-example" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Pricing Type</th>
                                        <th>Clicks</th>
                                        <th>Impressions</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($campaignsData as $value)
                                        <tr id="data-{!! $value->campaign->id !!}">
                                            <td class="campaigns_name">{!! ucwords($value->campaign->campaign_name) !!}</td>
                                            <td class="campaigns_name">{!! getCategoryName($categories, $value->campaign->campaign_category) !!}</td>
                                            <td class="campaigns_name">${!! number_format($value->campaign->campaign_cost_per_action, 2) !!}</td>
                                            <td class="campaigns_name">{!! $value->campaign->campaign_type !!}</td>
                                            <td class="campaigns_clicks">{!! $value->campaign->campaign_click !!}</td>
                                            <td class="campaigns_clicks">{!! $value->campaign->campaign_view !!}</td>
                                            <td>
                                                <div
                                                    class="d-flex flex-row align-items-center justify-content-center w-100 h-100">
                                                    <span
                                                        class="label p-1 bg-{{ $value->campaign_running_status == 'activated' ? 'success' : 'danger' }}"
                                                        style="cursor: pointer;" data-toggle="dropdown"
                                                        aria-hidden="true">{{ $value->campaign_running_status == 'activated' ? 'Activated' : 'Deactivated' }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ url('/campaigns/view-my-campaign/' . base64_encode($value->campaign_id)) }}"
                                                    class="btn btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td><span class="nodata">No Data Found<span></td>
                                    </tr>
                    @endif
                    </tbody>
                    </table>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
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
