@extends('layouts.default')

@section('style')
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
        div#preview img {
            padding: 10px;
        }

    </style>
@stop

@section('content')
    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            <div class="Formbox">
                @include('includes.alert')
                <!--<ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            @if (isset($ratioData))
                            <li class="active">{!! $title = 'Update Commission Ratio' !!}</li>
                @else
                            <li class="active">{!! $title = 'Add Commission Ratio' !!}</li>
                            @endif
                        </ol>-->

                <div class="card">
                    <form @if (isset($ratioData)) action="{{ url('/commission-ratio/update') }}" @else action="{{ url('/commission-ratio/store') }}" @endif data-parsley-validate novalidate method="POST" id="myform" name="myform"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if (isset($ratioData))
                            <input type="hidden" name="id" value="{{ $ratioData->id }}">
                        @endif
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Admin Ratio</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" name="admin_ratio" parsley-trigger="change" required
                                            placeholder="Admin Ratio" class="form-control" id="admin_ratio"
                                            @if (isset($ratioData) && !empty($ratioData->admin_ratio)) value="{{ $ratioData->admin_ratio }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Publisher Ratio</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" name="publisher_ratio" parsley-trigger="change" required
                                            placeholder="Publisher Ratio" class="form-control" id="publisher_ratio"
                                            @if (isset($ratioData) && !empty($ratioData->publisher_ratio)) value="{{ $ratioData->publisher_ratio }}" @endif>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit" id="btn-submit">
                                @if (isset($ratioData))  Update  @else   Save  @endif <i class="icon-arrow-right14 position-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>
    </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->


    <!-- Modal for delete confirm -->

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

    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js') !!}

    <script type="text/javascript">
        $("#admin_ratio").keyup(function(event) {
            $("#publisher_ratio").val("");
            var rate = parseInt($(this).val());
            if (rate < 0) {
                $(this).val("0");
                $("#publisher_ratio").val("100");
            }
            if (rate > 100) {
                $(this).val("100");
                $("#publisher_ratio").val("0");
            }

            var publishRate = 100 - rate;
            if (publishRate >= 0 && publishRate <= 100) {
                $("#publisher_ratio").val(publishRate);
            }
        });
        $("#publisher_ratio").keyup(function(event) {
            $("#admin_ratio").val("");
            var rate = parseInt($(this).val());
            if (rate < 0) {
                $(this).val("0");
                $("#admin_ratio").val("100");
            }
            if (rate > 100) {
                $(this).val("100");
                $("#admin_ratio").val("0");
            }
            var adminRate = 100 - parseInt(rate);
            if (adminRate >= 0 && adminRate <= 100) {
                $("#admin_ratio").val(adminRate);
            }
        });
        jQuery(document).ready(function() {
            var base_url = "{{ url('/') }}";
            $("#myform").validate({
                errorPlacement: function(error, element) {
                    return true;
                },
                rules: {
                    admin_ratio: {
                        required: true,
                        max: 100,
                        min: 0,
                    },
                    publisher_ratio: {
                        required: true,
                        max: 100,
                        min: 0,
                    },
                },
                submitHandler: function(form) {
                    $('#btn-submit').hide();
                    form.submit();
                }
            });
        });
    </script>
@stop
