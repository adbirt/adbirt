@extends('layouts.dashboard')


@section('style')
    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Roboto Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
        rel="stylesheet">
@stop


@section('content')
    @include('includes.alert')
    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">

            <div class="card">
                <div class="p-a-2 tab-content">
                    <div class="tab-pane active" id="first">
                        {!! Form::open(['role' => 'form', 'route' => 'withdraw.requestprocess', 'method' => 'post', 'class' => 'form-horizontal p-3']) !!}
                        <div class="form-group row">
                            {!! Form::label('amount', 'Amount* :', ['class' => 'col-sm-3 form-control-label  px-3']) !!}
                            <div class="col-sm-6 col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="material-icons md-18 text-muted">credit_card</i>
                                    </span>
                                    {{-- */ $currBalance = \App\PendingTransfers::balance() - \App\PendingTransfers::productCost() /* --}}
                                    {!! Form::number('amount', null, ['class' => 'form-control', 'placeholder' => 'Amount', 'required', 'min' => 10, 'max' => $currBalance]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('how_pay', 'How to Pay* :', ['class' => 'col-sm-3 form-control-label px-3']) !!}
                            <div class="col-sm-6 col-md-6">
                                <div class="input-group">
                                    <div class="d-flex flex-row align-items-center">
                                        <input id="checkbox-paypal-withdrawal" type="radio" name="payment_type"
                                            value="paypal" checked> {!! Form::label('checkbox-paypal-withdrawal', 'Paypal', ['class' => 'pt-2']) !!}
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    <div class="d-flex flex-row align-items-center">
                                        <input id="checkbox-bank-withdrawal" type="radio" name="payment_type" value="bank">
                                        {!! Form::label('checkbox-bank-withdrawal', 'Bank Deposit', ['class' => 'pt-2']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row" id="paypal_div">
                            <label class="col-sm-3 form-control-label px-3">Paypal Email Id*</label>
                            <div class="col-sm-6 col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="material-icons md-18 text-muted">email</i>
                                    </span>
                                    <input class="form-control" type="email" name="paypal_email_id" id="paypal_email_id"
                                        required @if (isset($BankDetails) && !empty($BankDetails->paypal_email_id)) value="{{ $BankDetails->paypal_email_id }}" @endif />
                                </div>
                            </div>
                        </div>

                        <div id="bank_div" style="display:none;">
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label px-3">Bank Name*</label>
                                <div class="col-sm-6 col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="material-icons md-18 text-muted">location_city</i>
                                        </span>
                                        <input class="form-control" type="text" name="bank_name" id="bank_name"
                                            @if (isset($BankDetails) && !empty($BankDetails->bank_name)) value="{{ $BankDetails->bank_name }}" @endif />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label px-3">Bank Holder Name*</label>
                                <div class="col-sm-6 col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="material-icons md-18 text-muted">account_circle</i>
                                        </span>
                                        <input class="form-control" type="text" name="bank_holder_name"
                                            id="bank_holder_name" @if (isset($BankDetails) && !empty($BankDetails->bank_holder_name)) value="{{ $BankDetails->bank_holder_name }}" @endif />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label px-3">Bank Account Number*</label>
                                <div class="col-sm-6 col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <i class="material-icons md-18 text-muted">tune</i>
                                        </span>
                                        <input class="form-control" type="text" name="bank_account_no"
                                            id="bank_account_no" @if (isset($BankDetails) && !empty($BankDetails->bank_account_number)) value="{{ $BankDetails->bank_account_number }}" @endif />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <br />
                        <div class="form-group row">
                            <div class="col-sm-8 col-sm-offset-3">
                                <div class="media">
                                    <div class="media-left">
                                        {!! Form::submit('Withdraw', ['class' => 'btn btn-success btn-rounded ml-3']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
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

    <script type="text/javascript">
        $('input:radio[name="payment_type"]').change(
            function() {
                if ($(this).is(':checked') && $(this).val() == 'paypal') {
                    $('#bank_div').hide();
                    $('#paypal_div').show();
                    $('#paypal_email_id').attr('required', 'true');
                    $('#bank_name').removeAttr('required');
                    $('#bank_holder_name').removeAttr('required');
                    $('#bank_account_no').removeAttr('required');
                } else {
                    $('#bank_div').show();
                    $('#paypal_div').hide();
                    $('#paypal_email_id').removeAttr('required');
                    $('#bank_name').attr('required', 'true');
                    $('#bank_holder_name').attr('required', 'true');
                    $('#bank_account_no').attr('required', 'true');
                }
            });
    </script>

@stop
