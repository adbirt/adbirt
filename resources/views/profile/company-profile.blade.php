@extends('layouts.default')

@section('style')
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
@stop

@section('content')
    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            @if (Session::has('flash_message'))
                <div class="alert bg-success alert-styled-left" id="msg">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                            class="sr-only">Close</span></button>
                    <span class="text-semibold">
                        {!! session('flash_message') !!}
                </div>
            @endif
            <div class="Formbox-">
                @include('includes.alert')
                {{-- <ol class="breadcrumb"> --}}
                    {{-- <li><a href="{{ url('/') }}">Home</a></li> --}}
                    @if (isset($profileData))
                        <!--<li class="active">{!! $title = 'Update Company Profile' !!}</li>-->
                    @else
                        <!--<li class="active">{!! $title = 'Add Company Profile' !!}</li>-->
                    @endif

                {{-- </ol> --}}
                <div class="card">
                    <form @if (isset($profileData)) action="{{ url('/company-profile/update') }}" @else action="{{ url('/company-profile/store') }}" @endif data-parsley-validate novalidate method="POST" id="myform" name="myform"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if (isset($profileData))
                            <input type="hidden" name="id" value="{{ $profileData->id }}">
                        @endif
                        <fieldset class="p-3">
                            <legend>Company Details:</legend>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Company Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="company_name" parsley-trigger="change" required
                                            placeholder="Company Name" class="form-control" id="company_name"
                                            @if (isset($profileData) && !empty($profileData->company_name)) value="{{ $profileData->company_name }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Email</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="email" name="company_email" parsley-trigger="change" required
                                            placeholder="Email" class="form-control" id="company_email" title=""
                                            @if (isset($profileData) && !empty($profileData->company_email)) value="{{ $profileData->company_email }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Phone Number</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" name="company_phone" parsley-trigger="change" required
                                            placeholder="Phone Number" class="form-control" id="company_phone" title=""
                                            @if (isset($profileData) && !empty($profileData->company_phone)) value="{{ $profileData->company_phone }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Company Logo</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" class="filestyle" name="company_logo" id="upld"
                                            data-buttontext="Choose Logo" data-buttonname="btn-white">
                                        <hr>
                                        @if (isset($profileData) && !empty($profileData->company_logo))
                                            <img src="{{ asset('uploads/company_logo/' . $profileData->company_logo) }}"
                                                id="view" width="250px" height="150px">
                                            <input type="hidden" name="old_company_logo"
                                                value="{{ $profileData->company_logo }}">
                                        @else
                                            <img src="{{ asset('assets/photos/Placeholder.jpg') }}" id="view"
                                                width="250px" height="150px">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Address</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="company_address" placeholder="Company Address"
                                            parsley-trigger="change" required class="form-control"
                                            id="company_address">@if (isset($profileData) && !empty($profileData->company_address)) {{ $profileData->company_address }} @endif</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">About Company</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="about_company" placeholder="About Company" parsley-trigger="change"
                                            required class="form-control"
                                            id="about_company">@if (isset($profileData) && !empty($profileData->about_company)) {{ $profileData->about_company }} @endif</textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group text-right m-b-0 p-3">
                            <button class="btn btn-primary waves-effect waves-light" type="submit" id="btn-submit">
                                @if (isset($profileData))  Update  @else   Save  @endif <i class="icon-arrow-right14 position-right"></i>
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

    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js') !!}
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <script type="text/javascript">
        function readURL(input) { // product_image preview
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#view').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#upld").change(function() {
            readURL(this);
        });

        jQuery(document).ready(function() {
            var base_url = '{{ url('/') }}';
            $("#myform").validate({
                errorPlacement: function(error, element) {
                    return true;
                },
                rules: {
                    company_name: {
                        required: true,
                    },
                    company_email: {
                        required: true,
                        email: true,
                    },
                    company_phone: {
                        required: true,
                        digits: true,
                    },
                    about_company: {
                        required: true,
                    },
                    @if (isset($profileData) && !empty($profileData->company_logo))
                    @else
                        company_logo:{
                        required: true,
                        },
                    @endif
                    company_address: {
                        required: true,
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
