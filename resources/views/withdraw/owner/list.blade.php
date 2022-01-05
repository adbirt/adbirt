@extends('layouts.dashboard')
@section('style')
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
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
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">

            @include('includes.alert')
            <div class="Formbox viewtable">
                {{-- <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">{!! $title = "Withdrawal History" !!}</li>
            </ol> --}}
                <div class="card">
                    @if (isset($arrWithdrawalHistory) && count($arrWithdrawalHistory))
                        <div class="table-responsive">
                            <table id="datatable-example" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Withdrawal History Id</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Payment Type</th>
                                        <th>Date</th>
                                        @if (Auth::user()->hasRole('admin'))
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($arrWithdrawalHistory as $value)
                                        <tr>
                                            <td class="gas_name">#{!! $value['id'] !!}</td>
                                            <td class="gas_name">${!! $value['amount'] !!}</td>
                                            <td class="gas_name">{!! ucwords($value['status']) !!}</td>
                                            <td class="gas_name">{!! ucwords($value['payment_type']) !!}</td>
                                            <td class="gas_name">{!! $value['created_at'] !!}</td>
                                            @if (Auth::user()->hasRole('admin'))
                                                <td>
                                                    <a class="btn btn-success"
                                                        href="{{ url('withdraw/account-info/' . base64_encode($value['id'])) }}">Account
                                                        Info</a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <td><span class="nodata">No Data Found<span></td>
                    @endif
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
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
