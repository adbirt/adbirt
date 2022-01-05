@extends('layouts.default')

@section('style')
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
    <style type="text/css">
        .dropAction {
            min-width: 40px;
            text-align: center;
            background: white;
        }

        .greenclass {
            color: green;
        }

    </style>
@stop

@section('content')

    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            @if (Session::has('flash_message'))
                <div class="alert bg-success alert-styled-left" id="msg">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                            class="sr-only">Close</span></button>
                    <span class="text-semibold">
                        {!! session('flash_message') !!}
                </div>
            @endif
            <div class="--Formbox--viewtable--">
                @include('includes.alert')
                <!--<ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="active">{!! $title = 'View Advertiser' !!}</li>
                        </ol>-->

                {{-- <a href="{{ url('/advertiser/add-advertiser') }}"><button class="btn btn-primary waves-effect waves-light" id="navigate">Add Advertiser</button></a> --}}
                <div class="card">
                    @if (isset($arrOwner) && count($arrOwner))
                        <table id="datatable-example" class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Balance</th>
                                    <th>Phone Number</th>
                                    <th>BirthDay</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arrOwner as $value)
                                    <tr id="data-{!! $value->user_id !!}">
                                        <td class="product_name">{!! ucwords($value->GetOwner->name) !!}</td>
                                        <td class="product_name">{!! $value->GetOwner->email !!}</td>
                                        <td class="product_name greenclass">{!! $balanceAmount[$value->user_id] !!}$</td>
                                        <td class="product_name">{!! $value->GetOwner->phone !!}</td>
                                        <td class="product_name">{!! $value->GetOwner->birthday !!}</td>
                                        <td class="product_name">{!! $value->GetOwner->address !!}</td>
                                        <td class="product_name">{!! $value->GetOwner->city !!}</td>
                                        <td class="product_name">{!! $value->GetOwner->country !!}</td>
                                        <td class="citybtn pl-2 d-flex flex-row align-items-center justify-content-center">
                                            <a href="{{ url('/advertiser/editOwner/' . base64_encode($value->user_id)) }}"
                                                class="btn btn-primary text-white">
                                                <i class="fa fa-edit --action--" aria-hidden="true"></i>
                                            </a>

                                            <a href="javascript:void(0);" Onclick="Del({{ $value->user_id }});"
                                                class="btn btn-danger ml-1 text-white">
                                                <i class="fa fa-trash --action--" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td><span class="nodata">No Data Found<span></td>
                                </tr>
                    @endif
                    </tbody>
                    </table>
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


@section('script')
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        var baseUrl = "{{ url('/') }}"

        function Del(id) {
            console.log(id);
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this advertiser details!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Ok',
                    closeOnConfirm: true,
                },
                function() {
                    $.ajax({
                            url: baseUrl + '/advertiser/delete',
                            type: 'POST',
                            data: {
                                id: id
                            },
                        })
                        .done(function() {
                            $("#mainDiv").animate({
                                scrollTop: 0
                            });
                            $("#data-" + id).fadeOut("slow");
                        })
                });
        };
    </script>
@stop
