@extends('layouts.dashboard')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
@stop

@section('content')
    <!-- Content -->
    <div class="layout-content" data-scrollable id="mainDiv">
        <div class="container-fluid">
            @include('includes.alert')
            <div class="alert bg-success alert-styled-left SuccessMsg" id="msg" style="display:none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                        class="sr-only">Close</span></button>
                <span class="text-semibold">
                    User is Successfully Deleted
            </div>
            {{-- <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">{!! $title !!}</li>
      </ol> --}}
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Active Users</h5>
                </div>
                @if (count($users))
                    <div class="table-responsive">
                        <table id="datatable-example" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                    {{-- <th>Action</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr id="data-{!! $user->id !!}">
                                        <td>{!! $user->name !!}</td>
                                        <td>{!! $user->email !!}</td>
                                        <td>{!! $user->phone !!}</td>
                                        <td>{!! $user->country !!}</td>
                                        <td>@if ($user->active != 1) NoT Active @else Active @endif</td>

                                        {{-- <td><a href="{!! URL::route('user.edit', ['id' => $user->id]) !!}"
                                            class="btn btn-warning btn-xs btn-archive deleteBtn">Active/Inactive</a>
                                    </td> --}}
                                        <td class="pl-2 d-flex flex-row align-items-center justify-content-start">
                                            <a class="btn btn-info btn-sm btn-archive Editbtn"
                                                href="/user/{{ $user->id }}/edit" style="margin-right: 3px;">
                                                Edit <i class="fa fa-edit"></i>
                                            </a>

                                            <a class="btn btn-info btn-sm btn-archive Editbtn"
                                                href="{!! URL::route('user.show', ['id' => $user->id]) !!}" style="margin-right: 3px;">
                                                Show <i class="fa fa-eye"></i>
                                            </a>

                                            <a href="javascript:void(0);"
                                                class="btn btn-danger btn-sm btn-archive deleteBtn"
                                                Onclick="Del({{ $user->id }});">
                                                Delete <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    No Data Found
                @endif
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->


    <!-- Modal for delete confirm -->
    {{-- <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Are you sure to delete?
                </div>
                <div class="modal-footer">
                    {!! Form::open(array('route' => array('user.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) !!}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    {!! Form::submit('Yes, Delete', array('class' => 'btn btn-success')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div> --}}

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

            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this product details!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Ok',
                    closeOnConfirm: true,
                },
                function() {
                    $.ajax({
                            url: baseUrl + '/user/delete',
                            type: 'POST',
                            data: {
                                id: id
                            },
                        })
                        .done(function() {
                            $("#mainDiv").animate({
                                scrollTop: 0
                            });
                            $(".SuccessMsg").show();
                            $("#data-" + id).fadeOut("slow");
                        })
                });
        };
    </script>
@stop
