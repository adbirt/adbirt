@extends('layouts.default')
@section('style')
<link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
<style type="text/css">
    div#preview img {padding: 10px;}
</style>
@stop
@section('content')

<!-- Content -->
<div class="layout-content" data-scrollable>
    <div class="container-fluid">
        <div class="Formbox">
            @include('includes.alert')
            @if(Session::has('Error_message'))
                <div class="alert bg-danger alert-styled-left" id="msg">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold">
                        {!! session('Error_message') !!}
                    </span>
                </div>
            @endif
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">{!! $title = "Book Tour" !!}</li>
            </ol>
            {{-- <a href="{{ url('/tour/view-tour') }}"><button class="btn btn-primary waves-effect waves-light" id="navigate">View Tours</button></a> --}}
            <div class="card">
                <form action="{{ url('/tour/Book') }}" data-parsley-validate novalidate method="POST" id="myform" name="myform" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if(isset($arrTours))
                    <input type="hidden" name="id" value="{{ $arrTours->id }}">
                    @endif
                    <h5>Book Tour</h5>
                    <fieldset>
                        <legend>Tour Overview</legend>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Tour Name</label>
                                </div>
                                <div class="col-md-8">
                                    <label>{{ ucwords($arrTours->tour_name) }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Tour`s Description</label>
                                </div>    
                                <div class="col-md-8">
                                    <label>{{ ucwords(strip_tags($arrTours->tour_description)) }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Tour`s Price($)</label>
                                </div>
                                <div class="col-md-8">
                                    <label>${{ ucwords($arrTours->tour_price) }} + $1 Additional Charge*</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Tour`s Pictures</label>
                                </div>
                                <div class="col-md-8">
                                    <div id="preview">
                                        @foreach($TourImage as $image)    
                                        <img src="{!! asset('assets/tourPhotos/'.$image->tour_image) !!}" height="100">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Tour`s Check In Date</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="CheckInDate" parsley-trigger="change" required placeholder="Check In Date" class="form-control" id="CheckInDate" title="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Tour`s Check Out Date</label>
                                </div>    
                                <div class="col-md-8">
                                    <input type="text" name="CheckOutDate" required placeholder="Check Out Date" class="form-control" id="CheckOutDate">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit" id="btn-submit">
                           Book Tour <i class="icon-arrow-right14 position-right"></i>
                        </button>
                        <a href="{{ url('/tour/view') }}" type="reset" class="btn btn-danger waves-effect waves-light m-l-5">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>  
        </div><!-- /.box -->
    </div></div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->


<!-- Modal for delete confirm -->

<!-- jQuery -->

{!! Html::script('dist/vendor/jquery.min.js') !!} 

<!-- Bootstrap -->

{!! Html::script('dist/vendor/tether.min.js') !!} 

{!! Html::script('dist/vendor/bootstrap.min.js') !!} 

<!-- AdminPlus -->

{!! Html::script('dist/vendor/adminplus.js') !!}

<!-- App JS -->

{!! Html::script('dist/js/main.min.js') !!}


@section('script')
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js') !!}

{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js') !!}

{!! Html::script('plugins/datepicker/bootstrap-datepicker.js') !!}

<script type="text/javascript">
    $("#CheckOutDate").change(function () {
        var startDate = document.getElementById("CheckInDate").value;
        var endDate = document.getElementById("CheckOutDate").value;

        if ((Date.parse(startDate) > Date.parse(endDate))) {
            alert("End date should be greater than Start date");
            document.getElementById("CheckOutDate").value = "";
        }
    });
    $("#CheckInDate").datepicker({
        format: 'yyyy-mm-dd',
        startDate: '+0d',
        autoclose: true
    });
    $("#CheckOutDate").datepicker({
        format: 'yyyy-mm-dd',
        startDate: '+0d',
        autoclose: true
    });
</script>
<script type="text/javascript" src="{{ asset('assets/js/loadingoverlay.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/loadingoverlay_progress.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {

        $("#myform").validate({
            errorPlacement: function(error,element) {
                return true;
            },
            rules:{
                CheckInDate:{
                    required: true,
                },
                CheckOutDate:{
                    required: true,
                },
            },
            submitHandler: function(form){
                $('#btn-submit').hide();
                $.LoadingOverlay("show");
                form.submit();
            }
        });
    });
</script>
@stop