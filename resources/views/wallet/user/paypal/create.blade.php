@extends('layouts.dashboard')

@section('content')

    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Roboto Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
        rel="stylesheet">

    <link href="https://www.adbirt.com/public/css/style.css" rel="stylesheet">

    @include('includes.alert')
    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            <div class="alert alert-success alert-dismissable fade in" id="msg" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                Amount Credit Into Your Wallet Through Paystack Transfer
            </div>
            <ol class="breadcrumb">
                <!--<li><a href="#">Home</a></li>
                                    <li class="active">Paypal Deposit</li>-->
            </ol>
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
                    <div class="tab-pane active p-3" id="first">
                        {!! Form::open(['role' => 'form', 'route' => 'paypal.payment', 'method' => 'post', 'class' => 'form-horizontal p-3']) !!}
                        <div>
                            <div class="form-group row">
                                {!! Form::label('amount', 'Amount* :', ['class' => 'col-sm-3 form-control-label']) !!}
                                <div
                                    class="col-sm-6 col-md-6 d-flex flex-column align-items-center justify-content-between">
                                    <div class="input-group">
                                        <span
                                            class="input-group-addon h-100 d-flex flex-column align-items-center justify-content-center"
                                            id="basic-addon1">
                                            <i class="material-icons md-18 text-muted">credit_card</i>
                                        </span>
                                        {!! Form::text('amount', null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => 'Amount should be inputted in USD', 'required']) !!}

                                    </div>
                                    <br />
                                    <p class="w-100 text-center d-flex flex-row align-items-center justify-content-start">
                                        <img src="https://adbirt.com/public/assets-revamp/img/paypal-icon.png" width="50"
                                            height="50" class="mr-3 shadow" />
                                        PAYPAL: Input amount in USD e.g: 1 = $1
                                    </p>
                                    <br />
                                    <p class="w-100 text-center d-flex flex-row align-items-center justify-content-start">
                                        <img src="https://adbirt.com/public/assets-revamp/img/paystack-icon.png" width="50"
                                            height="50" class="mr-3 shadow" />
                                        PAYSTACK: Input amount in USD e.g : 1 USD= #380
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                @if (empty(Auth::user()->email))
                                    {!! Form::label('Email Id', 'Email* :', ['class' => 'col-sm-3 form-control-label']) !!}
                                    <div class="col-sm-6 col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="material-icons md-18 text-muted">email</i>
                                            </span>
                                            {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email Id', 'required']) !!}
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <br />
                            <br />

                            <div class="media-body media-middle p-l-1">
                                <label class="c-input c-checkbox d-flex flex-row align-items-start justify-content-center">
                                    <input type="checkbox" checked requuired class="p-1 rounded m-1">
                                    <span class="c-indicator"></span> I Acknowledge that all Credit Deposits are
                                    non-refundable/non-transferable
                                </label>
                            </div>
                            <br />
                            <div class="form-group row">
                                <div class="w-100">
                                    <div class="w-100 d-flex flex-column align-items-center justify-content-between">
                                        <div class="media-left">
                                            {!! Form::submit('Pay with Paypal', ['class' => 'btn btn-success btn-rounded']) !!}
                                        </div>
                                        <br />
                                        <div class="media-right">
                                            <button type="button" class="btn btn-primary btn-rounded"
                                                id="addWithpaystack">Pay with Paystack</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="card">
                            {{-- <center>To Add Funds via Bank Deposit, Kindly Proceed here <a href="{!! URL::route('pending.create') !!}">Bank Deposit</a></center> --}}
                            <div class="card-block">
                                <div class="form-group">
                                    <br><br>
                                    <center>
                                        <h3>Other Payment Methods will be available soon</h3>
                                        <div class="gap"></div>
                                        <div class="gap"></div><br>
                                        <a href="https://www.payza.com" target="_blank"><img
                                                src="https://www.adbirt.com/public/uploads/payza.png" alt="Fortumo"
                                                width="80"></a>
                                        <a href="https://fortumo.com/" target="_blank"><img
                                                src="https://www.adbirt.com/public/uploads/fortumo.png" alt="Fortumo"
                                                width="80"></a>
                                        <a href="https://stripe.com/" target="_blank"><img
                                                src="https://www.adbirt.com/public/uploads/stripe.png" alt="Fortumo"
                                                width="80"></a>
                                        <a href="https://www.skrill.com" target="_blank"><img
                                                src="https://www.adbirt.com/public/uploads/skrill.gif" alt="Fortumo"
                                                width="80"></a>
                                    </center>
                                    <br>
                                    <br>

                                </div>

                            </div>
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

    <script type="text/javascript" src="{{ asset('assets/js/loadingoverlay.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/loadingoverlay_progress.min.js') }}"></script>
    <script src='https://js.paystack.co/v1/inline.js'></script>
    <script>
        var baseUrl = "{{ url('/') }}";
        $("#addWithpaystack").click(function(event) {
            var amount = $("#amount").val();
            var paidAmount = 0;
            var clientEmail = "{{ Auth::user()->email }}";
            if (clientEmail == "") {
                clientEmail = $("#email").val();
            }

            if (amount != "" && validateEmail(clientEmail)) {
                $("#addWithpaystack").hide();
                amount = parseInt(amount);
                {{-- var NGNRATE = 380; --}}
                var NGNRATE = 400;
                paidAmount = amount * NGNRATE * 100;
                var refNo = Math.random();
                $.LoadingOverlay("show");
                // makepayment("pk_test_01e038731d30cb9eae9cb3330026e912d032bf66",clientEmail,paidAmount,refNo,"")
                makepayment("pk_live_3feeaad293f7fc85ef6ff19d0b073576fbbc8d5e", clientEmail, paidAmount, refNo, "")
                /*$.ajax({
                                //url: 'https://www.apilayer.net/api/live?access_key=d91294091166e93bb0ebea8dd0012fe5&format=1',
                                // url: 'https://www.apilayer.net/api/live?access_key=b51995d0a889388ea1643cf194a98db0&format=1',
                                 //  url: 'https://openexchangerates.org/api/latest.json?app_id=6f3488f3e1bb4f3a8c258ed26e67bc06',
                                     url: 'https://www.apilayer.net/api/live?access_key=52ea8855e1aef8d4e48b34dc67333236&format=1',
                	             type: 'GET',
                            })
                            .done(function(response) {
                                $("#addWithpaystack").hide();
                		//for open exchange
                                //var NGNRATE = parseInt(response.rates.USD);

                		//for apilayer	
                                var NGNRATE = parseInt(response.quotes.USDNGN);
                                paidAmount = amount * NGNRATE * 100;
                                
                                var refNo = Math.random();    
                                $.LoadingOverlay("show");
                               // makepayment("pk_test_01e038731d30cb9eae9cb3330026e912d032bf66",clientEmail,paidAmount,refNo,"")
                                  makepayment("pk_live_3feeaad293f7fc85ef6ff19d0b073576fbbc8d5e",clientEmail,paidAmount,refNo,"")
                                
                            });*/
                $("#email").css('border', '1px solid grey');
            } else {
                if (amount == "") {
                    $("#amount").css('border', '1px solid red');
                } else {
                    $("#amount").css('border', '1px solid grey');
                }

                if (clientEmail == "") {
                    $("#email").css('border', '1px solid red');
                } else {
                    if (validateEmail(clientEmail)) {
                        $("#email").css('border', '1px solid grey');
                    } else {
                        $("#email").css('border', '1px solid red');
                    }
                }
            }
        });

        function validateEmail(email) {
            var re =
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

        function makepayment(key, email, amount, ref, callback) {
            var handler = PaystackPop.setup({
                key: key, // This is your public key only!
                email: email, // Customer email
                amount: amount, // The amount charged, I like big money lol
                currency: "NGN",
                ref: ref, // Generate a random reference number and put here",
                metadata: { // More custom information about the transaction
                    custom_fields: [{}]
                },
                callback: callback || function(response) {
                    var MainAmount = parseInt($("#amount").val());
                    $.ajax({
                            url: baseUrl + '/wallet-credit/paystack',
                            type: 'POST',
                            data: {
                                amount: MainAmount,
                                ngn_amt: amount,
                                refNo: response.reference
                            },
                        })
                        .done(function(response) {
                            if (response == "true") {
                                $("#amount").val("");
                                $("#msg").css("display", "block");
                                setTimeout(function() {
                                    $('#msg').fadeOut('slow');
                                    location.reload();
                                }, 4000);
                            }
                        });
                },
            });
            handler.openIframe();
            $.LoadingOverlay("hide");
        }
    </script>
@stop
