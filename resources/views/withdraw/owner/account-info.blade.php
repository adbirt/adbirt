
{{-- @if(isset($arrWithdrawalHistory) && count($arrWithdrawalHistory > 0))

@foreach ($arrWithdrawalHistory as $key => $value) 


@endforeach

@endif --}}

@extends('layouts.default')
@section('content')
@include('includes.alert')
{!! Html::style('dist/cssc/bootstrap.striped.min.css') !!}
<link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightslider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.rateyo.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">


<!-- Material Design Icons  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Roboto Web Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">

<!-- Content -->
<div class="layout-content" data-scrollable id="mainDiv">
    <div class="container-fluid">
        <div class="alert bg-success alert-styled-left" style="display:none;" id="msg">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">
                Gas Site Booked Successfully... 
            </span>
        </div>
        <div class="alert bg-danger alert-styled-left" style="display:none;" id="Errormsg">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">
                Not Enough Money Available In Wallet To Procced...
            </span>
        </div>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">{!! $title = "View Withdrwal Request" !!}</li>
        </ol>


        <div class="loaderParent">
            <div id="loader"></div>
        </div>

        
        <div class="clearfix"></div>
        <div class="card-columns viewproductbox">
            @if(!empty($arrWithdrawalHistory))

            <div class="card">
                <div class="card-header bg-white center">
                    <h4 class="card-title"><a href="{{ url('/gas/show/'.base64_encode($arrWithdrawalHistory->id)) }}">View Withdrwal Request</a></h4>
                </div>
                
                <div class="card-block">

                    <div class="form-group row">     

                        <div class="row">

 				
                  <table id="example1" class="table table-bordered table-striped">
                    {{-- <thead>
                      <tr>
                        <th>Country</th>
                        <th>Total Client</th>
                      </tr>
                    </thead> --}}
                    <tbody>
                      <tr>
                          <td>Owner Name</td>
                          <td>{!! ucwords($arrWithdrawalHistory->GetUser->name) !!}</td>
                      </tr>
                      <tr>
                          <td>Amount</td>
                          <td>${!! ucwords($arrWithdrawalHistory->amount) !!}</td>
                      </tr>
                      <tr>
                          <td>Status</td>
                          <td>{!! ucwords($arrWithdrawalHistory->status) !!}</td>
                      </tr>
                      <tr>
                          <td>Payment Type</td>
                          <td>{!! ucwords($arrWithdrawalHistory->payment_type) !!}</td>
                      </tr>
                      @if($arrWithdrawalHistory->payment_type == 'paypal')
                      <tr>
                          <td>PayPal Email Id</td>
                          <td>{!! ($arrWithdrawalHistory->paypal_email_id) !!}</td>
                      </tr>
                      @endif

                      @if($arrWithdrawalHistory->payment_type == 'bank')
                      <tr>
                          <td>Bank Name</td>
                          <td>{!! ($arrWithdrawalHistory->bank_name) !!}</td>
                      </tr>
                      <tr>
                          <td>Bank Holder Name</td>
                          <td>{!! ($arrWithdrawalHistory->bank_holder_name) !!}</td>
                      </tr>

                      <tr>
                          <td>Bank Account Number</td>
                          <td>{!! ($arrWithdrawalHistory->bank_account_number) !!}</td>
                      </tr>
                      @endif

                    </tbody>
                  </table>
                  <a class="btn btn-info pull-right" Onclick="PaidMoney({{$arrWithdrawalHistory->id}})">Paid Money</a>
                        </div>
                    </div>
                   
                    

                </div>
            </div>
            @else
            <h3><span class="nodata">No Withdrwal Request<span></h3>
            @endif

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

@stop

@section('script')
<script type="text/javascript" src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/lightslider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/loadingoverlay.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/loadingoverlay_progress.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.rateyo.js') }}"></script>

<script type="text/javascript">

var baseUrl = "{{ url('/')}}"

function PaidMoney(id){
    swal({
        title: "Are you sure?",
        text: "You Had Paid Amount to Owner From Your Account ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn-danger',
        confirmButtonText: 'Yes',
        closeOnConfirm: true,
    },
    function(){
        $.LoadingOverlay("show");
        $.ajax({
            url: baseUrl+'/withdraw/updated',
            type: 'POST',
            data: {id: id,final_price:{!! ucwords($arrWithdrawalHistory->amount) !!}},
        })
        .done(function(response) {
        	console.log(response);
            $.LoadingOverlay("hide");
            $("#mainDiv").animate({ scrollTop: 0 });
            var response = response;
            if(response == "true"){
                $("#msgWithdrawsuccess").show();
                window.location.href = "{{ url('/withdraw/requested') }}";
            }else{
                $("#Errormsgforwithdrawfailed").show();
                window.location.href = "{{ url('/dashboard') }}";
            }
        })          
    });
};                                                                                                       
</script>
@stop