@extends('layouts.default')
@section('style')
<link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome/css/font-awesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
<style type="text/css">
    .dropAction{min-width: 40px;text-align: center;background: white;}

</style>
@stop
@section('content')

<!-- Content -->
<div class="layout-content" data-scrollable>
    <div class="container-fluid">
        @if(Session::has('flash_message'))
        <div class="alert bg-success alert-styled-left" id="msg">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">
                {!! session('flash_message') !!}
            </div>
            @endif
            @if(Session::has('Error_message'))
            <div class="alert bg-danger alert-styled-left" id="msg">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">
                    {!! session('Error_message') !!}
                </div>
                @endif
                <div class="Formbox viewtable">
                    @include('includes.alert')
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">{!! $title = "View tours" !!}</li>
                    </ol>
                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('vendor') )
                    <a href="{{ url('/tour/add-tour') }}"><button class="btn btn-primary waves-effect waves-light" id="navigate">Add tour</button></a>
                    @endif
                    <div class="card">
                        <h5>View tours</h5>
                        @if( isset($arrOrderDet) && count($arrOrderDet))
                        <table id="datatable-example" class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Tour Name</th>
                                    <th>Tour Price</th>
                                    <th>Tour Location</th>
                                    <th>Tour Check In Date</th>
                                    <th>Tour Check Out Date</th>
                                    <th>Tour Status</th>
                                    @if(Auth::user()->hasRole('vendor'))
                                    <th>Verify</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arrOrderDet as $value)
                                <tr>
                                    <td class="tour_name">{!! ucwords($value['get_tour']['tour_name']) !!}</td>
                                    <td class="tour_name">${!! number_format($value['final_price'],2) !!}</td>
                                    <td class="tour_name">{!! ucwords($value['get_tour']['tour_location']) !!}</td>
                                    <td class="tour_name">{!! $value['CheckInDate'] !!}</td>
                                    <td class="tour_name">{!! $value['CheckOutDate'] !!}</td>
                                    <td>
                                        @if($value['tour_visit_status'] == "Tour Visited" )
                                        <span class="label label-success">Tour Visited</span>
                                        @elseif($value['tour_visit_status'] == "Your Tour booking Failed") 
                                        <span class="label label-danger">Your Tour booking Failed</span>
                                        @else
                                        <span class="label label-warning">In Process</span>
                                        @endif
                                    </td>
                                    @if(Auth::user()->hasRole('vendor'))
                                    @if( $value['tour_visit_status'] == "Tour Visited" )
                                    <td>
                                        <span class="label label-success" style="padding: 0.55em 1em;font-size: 80%;">Verified</span>
                                    </td>
                                    @else
                                    <td style="display: inline-block;">
                                        <label>Check In Confirmation Code</label><br>

                                        <form action="{{ url('/visit/verify') }}"  method="POST" id="verify" name="myform">
                                            <input type="text" name="check_in_confirmation_code" required>
                                            <input type="hidden" value="{{ $value['id'] }}" name="id">
                                            <input type="hidden" value="{{ $value['tour_id'] }}" name="tour_id">
                                            <button type="submit" value="submit" id="btn-submit">
                                                <i class="fa fa-check" style="color:green;" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @endif    
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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