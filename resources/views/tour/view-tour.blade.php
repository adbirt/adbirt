@extends('layouts.dashboard')

@section('style')
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
    <style type="text/css">
        .dropAction {
            min-width: 40px;
            text-align: center;
            background: white;
        }

    </style>
@stop
@section('content')

    <!-- Content -->
    <div class="layout-content" data-scrollable id="mainDiv">
        <div class="container-fluid">
            @if (Session::has('flash_message'))
                <div class="alert bg-success alert-styled-left" id="msg">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                            class="sr-only">Close</span></button>
                    <span class="text-semibold">
                        {!! session('flash_message') !!}
                </div>
            @endif

            <div class="alert bg-success alert-styled-left" id="msg" style="display:none;">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                        class="sr-only">Close</span></button>
                <span class="text-semibold">
                    Tour Details Deleted Successfully...
            </div>

            <div class="Formbox viewtable">
                @include('includes.alert')
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">{!! $title = 'View Tours' !!}</li>
                </ol>

                <a href="{{ url('/tour/grid-view-tour') }}" class="btn btn-white"><i
                        class="material-icons">dashboard</i></a>
                <a href="{{ url('/tour/view-tour') }}" class="btn btn-white active"><i class="material-icons">list</i></a>

                <a href="{{ url('/tour/add-tour') }}"><button class="btn btn-primary waves-effect waves-light"
                        id="navigate">Add Tour</button></a>
                <div class="card">
                    <h5>View Tours</h5>
                    @if (isset($arrTours) && count($arrTours))
                        <table id="datatable-example" class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Tour Name</th>
                                    <th>Tour Price</th>
                                    <th>Tour Location</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arrTours as $value)
                                    <tr id="data-{!! $value->id !!}">
                                        <td class="tour_name">{!! ucwords($value->tour_name) !!}</td>
                                        <td class="tour_name">${!! number_format($value->tour_price, 2) !!}</td>
                                        <td class="tour_name">{!! ucwords($value->tour_location) !!}</td>
                                        @if (Auth::user()->hasRole('admin'))
                                            <td>
                                                @if ($value->tour_approval_status == 'Approved')
                                                    <div class="dropdown">
                                                        <span class="label label-success" style="cursor: pointer;"
                                                            data-toggle="dropdown" aria-hidden="true">Approved</span>
                                                        <ul class="dropdown-menu dropAction">
                                                            <li>
                                                                <a
                                                                    href="{{ url('/tour/ChngeStatusToReject/' . base64_encode($value->id)) }}">
                                                                    <i class="fa fa-times" style="color:red;"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @elseif($value->tour_approval_status == "Rejected")
                                                    <div class="dropdown">
                                                        <span class="label label-danger" style="cursor: pointer;"
                                                            data-toggle="dropdown" aria-hidden="true">Rejected</span>
                                                        <ul class="dropdown-menu dropAction">
                                                            <li>
                                                                <a
                                                                    href="{{ url('/tour/ChngeStatusToApprove/' . base64_encode($value->id)) }}">
                                                                    <i class="fa fa-check" style="color:red;"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                @else
                                                    <div class="dropdown">
                                                        <span class="label label-warning" style="cursor: pointer;"
                                                            data-toggle="dropdown" aria-hidden="true">Pending</span>
                                                        <ul class="dropdown-menu dropAction">
                                                            <li>
                                                                <a
                                                                    href="{{ url('/tour/ChngeStatusToApprove/' . base64_encode($value->id)) }}">
                                                                    <i class="fa fa-check" style="color:red;"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ url('/tour/ChngeStatusToReject/' . base64_encode($value->id)) }}">
                                                                    <i class="fa fa-times" style="color:red;"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif

                                            </td>
                                        @endif
                                        @if (Auth::user()->hasRole('vendor'))
                                            <td>
                                                @if ($value->tour_approval_status == 'Approved')
                                                    <div class="dropdown">
                                                        <span class="label label-success" style="cursor: pointer;"
                                                            data-toggle="dropdown" aria-hidden="true">Approved</span>
                                                    </div>
                                                @elseif($value->tour_approval_status == "Rejected")
                                                    <div class="dropdown">
                                                        <span class="label label-danger" style="cursor: pointer;"
                                                            data-toggle="dropdown" aria-hidden="true">Rejected</span>
                                                    </div>
                                                @else
                                                    <div class="dropdown">
                                                        <span class="label label-warning" style="cursor: pointer;"
                                                            data-toggle="dropdown" aria-hidden="true">Pending</span>
                                                    </div>
                                                @endif
                                            </td>
                                        @endif
                                        <td class="citybtn">
                                            <a href="{{ url('/tour/editTour/' . base64_encode($value->id)) }}">
                                                <i class="fa fa-pencil action" aria-hidden="true"></i>
                                            </a>
                                            &nbsp; &nbsp;
                                            <a href="{{ url('/tour/show/' . base64_encode($value->id)) }}">
                                                <i class="fa fa-eye action" aria-hidden="true"></i>
                                            </a>
                                            &nbsp; &nbsp;
                                            <a href="javascript:void(0);" Onclick=Del({{ $value->id }});>
                                                <i class="fa fa-trash-o action" aria-hidden="true"></i>
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


@section('script')
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

    <script type="text/javascript">
        var baseUrl = "{{ url('/') }}"

        function Del(id) {
            console.log(id);
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this tour details!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Ok',
                    closeOnConfirm: true,
                },
                function() {
                    $.ajax({
                            url: baseUrl + '/tour/delete',
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
                            $("#msg").show();
                            setTimeout(function() {
                                $("#msg").fadeOut("slow");
                            }, 3500);
                        })
                });
        };
    </script>
@stop
