@extends('layouts.default')
@section('style')
<link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
<!-- Content -->
<div class="layout-content" data-scrollable>
  <div class="container-fluid">
   
    <div class="Formbox">
      @include('includes.alert')
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">{!! $title = "Payment Setup" !!}</li>
        
      </ol>
      <div class="card">
        <form action="{{ url('/owner/bank-details') }}" data-parsley-validate novalidate method="POST" id="myform" name="myform">
          {{ csrf_field() }}
          @if(isset($arrBankDetails) && count($arrBankDetails) > 0)
          <input type="hidden" name="id" value="{{ $arrBankDetails->id }}">
          @endif
          
          @if(count($arrBankDetails) == 0)
          <input type="hidden" name="action" value="add" >
          <div class="form-group row">
            {!! Form::label('how_pay', 'How to Pay* :', array('class' => 'col-sm-3 form-control-label')) !!}
            <div class="col-sm-6 col-md-6">
              <div class="input-group">
                <input type="radio" name="payment_type" value="paypal" checked> PayPal
                <input type="radio" name="payment_type" value="bank"> Bank Deposit
              </div>
            </div>
          </div>
          <div class="form-group row" id="paypal_div">
            <label class="col-sm-3 form-control-label">Paypal Email Id*</label>
            <div class="col-sm-6 col-md-6">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="material-icons md-18 text-muted">email</i>
                </span>
                <input class="form-control" type="email" name="paypal_email_id" id="paypal_email_id" required />
              </div>
            </div>
          </div>

          <div id="bank_div" style="display:none;">
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Bank Name*</label>
              <div class="col-sm-6 col-md-6">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                    <i class="material-icons md-18 text-muted">location_city</i>
                  </span>
                  <input class="form-control" type="text" name="bank_name" id="bank_name" />
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Bank Holder Name*</label>
              <div class="col-sm-6 col-md-6">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                    <i class="material-icons md-18 text-muted">account_circle</i>
                  </span>
                  <input class="form-control" type="text" name="bank_holder_name" id="bank_holder_name"/>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Bank Account Number*</label>
              <div class="col-sm-6 col-md-6">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                    <i class="material-icons md-18 text-muted">tune</i>
                  </span>
                  <input class="form-control" type="text" name="bank_account_no" id="bank_account_no" />
                </div>
              </div>
            </div>
          </div>
          @else
          <input type="hidden" name="action" value="edit" >
          <div class="form-group row">
            {!! Form::label('how_pay', 'How to Pay* :', array('class' => 'col-sm-3 form-control-label')) !!}
            <div class="col-sm-6 col-md-6">
              <div class="input-group">
                <input type="radio" name="payment_type" value="paypal" @if(isset($arrBankDetails->payment_type) && $arrBankDetails->payment_type == "paypal") checked @endif> PayPal
                <input type="radio" name="payment_type" value="bank" @if(isset($arrBankDetails->payment_type) && $arrBankDetails->payment_type == "bank") checked @endif> Bank Deposit
              </div>
            </div>
          </div>
          @if(isset($arrBankDetails->payment_type) && $arrBankDetails->payment_type == "paypal")
          <div class="form-group row" id="paypal_div">
            <label class="col-sm-3 form-control-label">Paypal Email Id*</label>
            <div class="col-sm-6 col-md-6">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="material-icons md-18 text-muted">email</i>
                </span>
                <input class="form-control" type="email" name="paypal_email_id" id="paypal_email_id" required @if(isset($arrBankDetails->paypal_email_id) && $arrBankDetails->paypal_email_id != "") value="{{$arrBankDetails->paypal_email_id}}" @endif/>
              </div>
            </div>
          </div>
          @else
          <div class="form-group row" id="paypal_div" style="display:none;">
            <label class="col-sm-3 form-control-label">Paypal Email Id*</label>
            <div class="col-sm-6 col-md-6">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="material-icons md-18 text-muted">email</i>
                </span>
                <input class="form-control" type="email" name="paypal_email_id" id="paypal_email_id" required />
              </div>
            </div>
          </div>
          @endif

          @if(isset($arrBankDetails->payment_type) && $arrBankDetails->payment_type == "bank")
          <div id="bank_div">
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Bank Name*</label>
              <div class="col-sm-6 col-md-6">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                    <i class="material-icons md-18 text-muted">location_city</i>
                  </span>
                  <input class="form-control" type="text" name="bank_name" id="bank_name" @if(isset($arrBankDetails->bank_name) && $arrBankDetails->bank_name != "") value="{{$arrBankDetails->bank_name}}" @endif/>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Bank Holder Name*</label>
              <div class="col-sm-6 col-md-6">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                    <i class="material-icons md-18 text-muted">account_circle</i>
                  </span>
                  <input class="form-control" type="text" name="bank_holder_name" id="bank_holder_name" @if(isset($arrBankDetails->bank_holder_name) && $arrBankDetails->bank_holder_name != "") value="{{$arrBankDetails->bank_holder_name}}" @endif/>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Bank Account Number*</label>
              <div class="col-sm-6 col-md-6">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                    <i class="material-icons md-18 text-muted">tune</i>
                  </span>
                  <input class="form-control" type="text" name="bank_account_no" id="bank_account_no" @if(isset($arrBankDetails->bank_account_number) && $arrBankDetails->bank_account_number != "") value="{{$arrBankDetails->bank_account_number}}" @endif/>
                </div>
              </div>
            </div>
          </div>
          @else
          <div id="bank_div" style="display:none;">
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Bank Name*</label>
              <div class="col-sm-6 col-md-6">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                    <i class="material-icons md-18 text-muted">location_city</i>
                  </span>
                  <input class="form-control" type="text" name="bank_name" id="bank_name" />
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Bank Holder Name*</label>
              <div class="col-sm-6 col-md-6">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                    <i class="material-icons md-18 text-muted">account_circle</i>
                  </span>
                  <input class="form-control" type="text" name="bank_holder_name" id="bank_holder_name"/>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Bank Account Number*</label>
              <div class="col-sm-6 col-md-6">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                    <i class="material-icons md-18 text-muted">tune</i>
                  </span>
                  <input class="form-control" type="text" name="bank_account_no" id="bank_account_no" />
                </div>
              </div>
            </div>
          </div>
          @endif

          @endif



          <div class="form-group text-right m-b-0">
            <button class="btn btn-primary waves-effect waves-light" type="submit" id="btn-submit">
              Save <i class="icon-arrow-right14 position-right"></i>
            </button>
          </div>
        </form>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
@section('script')
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js') !!}
<script type="text/javascript">
jQuery(document).ready(function() {
  var base_url = '{{url('/')}}';
  $("#myform").validate({
    errorPlacement: function(error,element) {
      return true;
    },
    rules:{
      ConvenienceFee:{
        required: true,
        number: true,
      },
      DeliveryFee:{
        required: true,
        number: true,
      },
      DeliveryTimeframe:{
        required: true,
      },
      DeliveryTimeout:{
        required: true,
      },
    },
    submitHandler: function(form){
      $('#btn-submit').hide();
      form.submit();
    }
  });
});
</script>
<script type="text/javascript">
$('input:radio[name="payment_type"]').change(
  function(){
    if ($(this).is(':checked') && $(this).val() == 'paypal') {
      $('#bank_div').hide();
      $('#paypal_div').show();
      $('#paypal_email_id').attr('required', 'true');
      $('#bank_name').removeAttr('required');
      $('#bank_holder_name').removeAttr('required');
      $('#bank_account_no').removeAttr('required');
    }else{
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