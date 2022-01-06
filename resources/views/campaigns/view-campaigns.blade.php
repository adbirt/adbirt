@extends('layouts.dashboard')

@section('style')
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
    <style type="text/css">
        .dropAction {
            min-width: 40px;
            text-align: center;
            background: white;
        }

        .layout-container #view {
            width: 100% !important;
        }

        .responsive-pill {
            width: 100% !important;
        }

        @media only screen and (min-width: 900px) {
            .responsive-pill {
                width: 65% !important;
            }
        }

    </style>
@stop
@section('content')

    <!-- Content -->
    <div class="layout-content" data-scrollable id="mainDiv">
        <div class="container-fluid">
            @if (Session::has('flash_message'))
                <div class="alert p-1 bg-success alert-styled-left" id="msg">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                            class="sr-only">Close</span></button>

                    <span class="text-semibold">
                        {!! session('flash_message') !!}
                    </span>
                </div>
        </div>
        @endif

        <div class="alert p-1 bg-success alert-styled-left" id="msg" style="display:none;">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                    class="sr-only">Close</span></button>
            <span class="text-semibold">
                Campaigns Details Deleted Successfully...
        </div>
        <div class="viewtable">
            @include('includes.alert')
            <!--<ol class="breadcrumb">
                                                                                                                                                                                                                                            <li><a href="{{ url('/') }}">Home</a></li>
                                                                                                                                                                                                                                            <li class="active">{!! $title = 'Campaign Status' !!}</li>
                                                                                                                                                                                                                                        </ol>-->
            <a href="{{ url('/campaigns/add-campaigns') }}">
                <button class="btn btn-primary waves-effect waves-light mb-2">Add new Campaign</button>
            </a>
            <div class="shadow-md rounded-md">
                @if (isset($campaignsData) && count($campaignsData))
                    <div class="table-responsive">
                        <table id="datatable-example" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    {{-- <th>Title</th> --}}
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($campaignsData as $value)
                                    <tr id="data-{!! $value->id !!}">
                                        <td class="campaigns_name">{!! ucwords($value->campaign_name) !!}</td>
                                        {{-- <td class="campaigns_name">{!! ucwords($value->campaign_title) !!}</td> --}}
                                        <td class="campaigns_name">{!! getCategoryName($categories, $value->campaign_category) !!}</td>
                                        <td class="campaigns_name">${!! number_format($value->campaign_cost_per_action, 2) !!}</td>
                                        @if (Auth::user()->hasRole('admin'))
                                            <td>
                                                {{-- Begin:Actions --}}
                                                <div class="dropdown w-100 p-0 m-">
                                                    <span
                                                        class="p-1 w-100 d-block text-center rounded-sm {{ $value->campaign_approval_status == 'Approved' ? 'bg-success' : ($value->campaign_approval_status == 'Pending' ? 'bg-warning' : ($value->campaign_approval_status == 'Rejected' ? 'bg-danger' : '')) }}"
                                                        style="cursor: pointer;" data-toggle="dropdown"
                                                        aria-hidden="true">{!! $value->campaign_approval_status !!}</span>
                                                    <ul class="dropdown-menu dropAction">
                                                        @if ($value->campaign_approval_status == 'Pending' || $value->campaign_approval_status == 'Rejected')
                                                            <li>
                                                                <a title="Approve campaign"
                                                                    href="{{ url('/campaigns/ChngeStatusToApprove/' . base64_encode($value->id)) }}">
                                                                    <i class="fa fa-check" style="color:red;"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($value->campaign_approval_status == 'Pending' || $value->campaign_approval_status == 'Approved')
                                                            <li>
                                                                <a title="Reject campaign"
                                                                    href="{{ url('/campaigns/ChngeStatusToReject/' . base64_encode($value->id)) }}">
                                                                    <i class="fa fa-times" style="color:red;"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                {{-- End:Actions --}}
                                            </td>
                                        @endif
                                        @if (Auth::user()->hasRole('vendor'))
                                            <td>
                                                <div class="w-100">
                                                    <span
                                                        class="label p-1 bg-{!! $value->campaign_approval_status == 'Approved' ? 'success' : ($value->campaign_approval_status == 'Rejected' ? 'danger' : 'warning') !!} responsive-pill d-block text-center"
                                                        style="cursor: pointer;" data-toggle="dropdown"
                                                        aria-hidden="true">{!! ucfirst($value->campaign_approval_status) !!}</span>
                                                </div>
                                            </td>
                                        @endif
                                        <td class="citybtn d-flex flex-row justify-content-start pl-2">

                                            <a href="{{ url('/campaigns/edit-campaigns/' . base64_encode($value->id)) }}"
                                                class="mx-1 btn btn-info">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>

                                            <a href="{{ url('/campaigns/view-my-campaigns/' . base64_encode($value->id)) }}"
                                                class="mx-1 btn btn-info">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>

                                            <a href="javascript:void(0);" onclick="Del({{ $value->id }});"
                                                class="mx-1 btn btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
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
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div>
    </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
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

    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/clipboard.min.js') }}"></script>

    <script type="text/javascript">
        var clipboard = new ClipboardJS('.copy-btn');
        clipboard.on('success', function(e) {
            swal("Code Copied", "Paste the Adbirt code in between the <head></head> tags of your site", "success");
        });

        $(".drop_action").click(function() {
            $(this).parents('.dropdown').addClass('open');
        });

        var baseUrl = "{{ url('/') }}"

        function Del(id) {
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this campaign after deleting it!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Ok',
                    closeOnConfirm: true,
                },
                function() {
                    $.ajax({
                            url: baseUrl + '/campaigns/delete',
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
