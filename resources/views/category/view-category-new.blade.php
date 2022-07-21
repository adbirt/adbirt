@extends('layouts.modern-camp-layout')

@section('style')
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
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
                    Category Details Deleted Successfully...
            </div>

            <div class="viewtable">
                @include('includes.alert')
                <!--<ol class="breadcrumb">
                                                            <li><a href="{{ url('/') }}">Home</a></li>
                                                            <li class="active">{!! $title = 'View Categories' !!}</li>
                                                        </ol>-->

                <a href="{{ url('/campaigns-category/add-campaigns-category') }}" class="mb-2">
                    <button class="btn btn-primary waves-effect waves-light mb-2">Add new Category</button>
                </a>
                <div class="card">
                    @if (isset($categoryData) && count($categoryData))
                        <div class="table-responsive">
                            <table id="datatable-example" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoryData as $value)
                                        <tr id="data-{!! $value->id !!}">
                                            <td class="category_name">{!! ucwords($value->category_name) !!}</td>
                                            <td>
                                                @if ($value->isActive == 'Active')
                                                    <a href="javascript:void(0);" class="status"
                                                        data-id="{{ $value->id }}">
                                                        <span class="label label-success" id="status">
                                                            {{ $value->isActive }}
                                                        </span>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);" class="status"
                                                        data-id="{{ $value->id }}">
                                                        <span class="label label-danger" id="status">
                                                            {{ $value->isActive }}
                                                        </span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td
                                                class="citybtn p-2 d-flex flex-row align-items-center justify-content-start">
                                                <a title="Edit Category" class="btn btn-md btn-primary"
                                                    href="{{ url('/campaigns-category/edit-campaigns-category/' . base64_encode($value->id)) }}">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <a title="Delete Category" class="btn btn-md btn-danger ml-2"
                                                    href="javascript:void(0);" Onclick=Del({{ $value->id }});>
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

    <script type="text/javascript">
        var baseUrl = "{{ url('/') }}"

        $(".status").click(function(event) {
            var id = $(this).attr('data-id');
            $.ajax({
                    url: baseUrl + '/campaigns-category/change-status',
                    type: 'POST',
                    data: {
                        id: id
                    },
                })
                .done(function(response) {
                    if (response == "inactive") {
                        $("#status").removeClass('label-success').addClass('label-danger');
                        $("#status").text('InActive');
                    } else {
                        $("#status").removeClass('label-danger').addClass('label-success');
                        $("#status").text('Active');
                    }
                });
        });

        function Del(id) {
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this category details!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Ok',
                    closeOnConfirm: true,
                },
                function() {
                    $.ajax({
                            url: baseUrl + '/campaigns-category/delete',
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
