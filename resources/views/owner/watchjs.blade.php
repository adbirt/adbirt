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
            <div class="Formbox viewtable">
                @include('includes.alert')
                <!--<ol class="breadcrumb">
                                                                                  <li><a href="{{ url('/') }}">Home</a></li>
                                                                                  <li class="active">{!! $title = 'Watch Advertiser JS' !!}</li>
                                                                                </ol>-->
                <div class="shadow-sm rounded-sm bg-white">
                    <div class="table-responsive">
                        <table id="datatable-example" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Campaign Name</th>
                                    <th>JS found</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($arrOwner) && count($arrOwner))
                                    @foreach ($arrOwner as $camp => $found)
                                        <tr>
                                            <td>
                                                <a
                                                    href="{{ url('/campaigns/edit-campaigns/' . base64_encode($found->campaign_id)) }}">
                                                    {!! $found->campaign_name !!}
                                                </a>
                                            </td>
                                            <td>
                                                @if ($found->found)
                                                    <span style='color:green'>Found</span>
                                                @else
                                                    <span style='color:red'>Not found</span>
                                                @endif
                                            </td>
                                            <td>{!! $found->approve !!}</td>
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
