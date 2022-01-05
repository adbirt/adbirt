@extends('layouts.default')

@section('style')
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
@stop

@section('content')

    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            <div class="Formbox">
                @include('includes.alert')
                <!--<ol class="breadcrumb">
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        @if (isset($ownerData))
                                            <li class="active">{!! $title = 'Update Advertiser' !!}</li>
                    @else
                                            <li class="active">{!! $title = 'Add Advertiser' !!}</li>
                                        @endif

                                    </ol>-->
                <div class="card mb-2">
                    <form @if (isset($ownerData)) action="{{ url('/advertiser/update') }}" @else action="{{ url('/advertiser/store') }}" @endif data-parsley-validate novalidate method="POST" id="myform" name="myform"
                        enctype="multipart/form-data" class="p-3">
                        {{ csrf_field() }}
                        @if (isset($ownerData))
                            <input type="hidden" name="id" value="{{ $ownerData->id }}">
                        @endif

                        <h5 class="mb-2">Advertiser Details:</h5>
                        <fieldset>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Advertiser Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="name" parsley-trigger="change" required
                                            placeholder="Advertiser Name" class="form-control" id="name"
                                            @if (isset($ownerData) && !empty($ownerData->name)) value="{{ $ownerData->name }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Login By</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label> Email <input type="radio" name="login" value="email"
                                                @if (isset($ownerData) && $ownerData->login == 'email') checked @endif></label>
                                        <label> Phone <input type="radio" name="login" value="phone"
                                                @if (isset($ownerData) && $ownerData->login == 'phone') checked @endif></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Email</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="email" name="email" required placeholder="Advertiser Email"
                                            class="form-control" id="email" @if (isset($ownerData) && !empty($ownerData->email)) value="{{ $ownerData->email }}"" @endif>
                                        @if (isset($ownerData) && !empty($ownerData->email))
                                            <input type="hidden" name="old_email" id="old_email"
                                                value="{{ $ownerData->email }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Phone Number</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" name="phone" parsley-trigger="change" required
                                            placeholder="Advertiser Phone Number" class="form-control" id="phone" title=""
                                            @if (isset($ownerData) && !empty($ownerData->phone)) value="{{ $ownerData->phone }}" @endif>
                                    </div>
                                </div>
                            </div>
                            @if (isset($ownerData) && !empty($ownerData->password))
                                <div class="form-group chngPass">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="formLabel">Change Password </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" id="chngpass" value="yes">
                                            <input type="hidden" name="oldPass" @if (isset($ownerData) && !empty($ownerData->password)) value="{{ $ownerData->password }}" @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group updatePass" style="display:none;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="formLabel">Password</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="password" name="password" parsley-trigger="change" required
                                                placeholder="password" class="form-control" id="password">
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="formLabel">Password</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="password" name="password" parsley-trigger="change" required
                                                placeholder="password" class="form-control" id="password">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">BirthDay</label>
                                    </div>
                                    <div class="col-md-8">

                                        <input class="form-control" name="birthday" id="date" placeholder="DD/MM/YYYY"
                                            type="text" / @if (isset($ownerData) && !empty($ownerData->birthday)) value="{{ $ownerData->birthday }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Address</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="address" placeholder="Address" parsley-trigger="change" required
                                            class="form-control" id="address">@if (isset($ownerData) && !empty($ownerData->address)) {{ $ownerData->address }} @endif</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Country</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="country" parsley-trigger="change" required
                                            placeholder="Country" class="form-control" id="country" title=""
                                            @if (isset($ownerData) && !empty($ownerData->country)) value="{{ $ownerData->country }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">City</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="city" data-placeholder="Select an option" class="form-control"
                                            id="city">
                                            @if (isset($arrCity) && count($arrCity) > 0)
                                                <option>Select City</option>
                                                @foreach ($arrCity as $value)
                                                    @if (isset($ownerData) && $ownerData->city == $value->city)
                                                        <option value="{{ $value->city }}" selected>{{ $value->city }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $value->city }}">{{ $value->city }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit" id="btn-submit">
                                @if (isset($ownerData))  Update  @else   Save  @endif <i class="icon-arrow-right14 position-right"></i>
                            </button>
                            <a href="{{ url('/advertiser/view-advertiser') }}" type="reset"
                                class="btn btn-danger waves-effect waves-light m-l-5">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>
    </div><!-- /.col -->
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

@stop


@section('script')
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js') !!}

    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js') !!}
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <script type="text/javascript">
        jQuery(document).ready(function() {

            var date_input = $('input[name="birthday"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'dd/mm/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);


            $('.chngpass').change(function() {
                var chng = $('#chngpass').val();

                if (chng == "yes") {
                    $('.updatePass').show();
                    $('#chngpass').val('no');
                } else {
                    $('.updatePass').hide();
                    $('#chngpass').val('yes');
                }
            });
            var base_url = '{{ url('/') }}';
            $("#myform").validate({
                errorPlacement: function(error, element) {
                    return true;
                },
                rules: {
                    name: {
                        required: true,
                    },
                    login: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: base_url + "/advertiser/CheckEmail",
                            method: "POST",
                            data: {
                                email: function() {
                                    return $("#email").val();
                                },
                                @if (isset($ownerData) && !empty($ownerData->email))
                                    old_email: function() {
                                    return $( "#old_email" ).val();
                                    },
                                    action:'edit',
                                @endif
                            }
                        },
                    },
                    phone: {
                        required: true,
                        remote: {
                            url: base_url + "/advertiser/CheckPhone",
                            method: "POST",
                            data: {
                                phone: function() {
                                    return $("#phone").val();
                                },
                            }
                        },
                    },
                    birthday: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    country: {
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
