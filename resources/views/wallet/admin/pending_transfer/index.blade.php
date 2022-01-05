@extends('layouts.dashboard')

@section('content')

    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            @include('includes.alert')
            <div class="card">
                <div class="table-responsive">
                    <table id="datatable-example" class="table table-striped table-hover table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Bank</th>
                                <th>Date</th>
                                <th>Comment</th>
                                <th>Details</th>
                                <th>Accept</th>
                                <th>Decline</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendings as $pending)
                                <tr>
                                    <td>{!! $pending->id !!}</td>
                                    <td>{!! $pending->user->name !!}</td>
                                    <td>{!! $pending->amount !!}</td>
                                    <td>{!! $pending->bank !!}</td>
                                    <td>{!! $pending->date !!}</td>
                                    <td>{!! $pending->comment !!}</td>
                                    <td>
                                        <a data-toggle="modal" style="color: teal;"
                                            data-target="#myModal_{{ $pending->id }}">
                                            <button class="btn btn-info btn-xs">Details</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{!! route('pending.accept', $pending->id) !!}">
                                            <button class="btn btn-success btn-xs">Accept</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-archive deleteBtn btn-xs" data-toggle="modal"
                                            data-target="#deleteConfirm" deleteId="{!! $pending->id !!}">Decline</a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div id="myModal_{{ $pending->id }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <center>
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4><b>Pending Transaction Request Details</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p> Name: <b>{!! $pending->user->name !!}</b></p>
                                                    <p>Amount: <b>{!! $pending->amount !!}</b></p>
                                                    <p>Bank: <b>{!! $pending->bank !!}</b></p>
                                                    <p>Date: <b>{!! $pending->date !!}</b></p>
                                                    <p>Comment: <b>{!! $pending->comment !!}</b></p>
                                                    <br />
                                                    <p>Action:</p>
                                                    <a href="{!! route('pending.accept', $pending->id) !!}">
                                                        <button class="btn btn-success btn-xs">Accept</button>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-archive deleteBtn btn-xs"
                                                        data-toggle="modal" data-target="#deleteConfirm"
                                                        deleteId="{!! $pending->id !!}">Decline</a>
                                                </div>
                                            </center>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--modal -->

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </section>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Are you sure to Decline The Transaction?
                </div>
                <div class="modal-footer">
                    {!! Form::open(['route' => ['pending.decline', 0], 'method' => 'delete', 'class' => 'deleteForm']) !!}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    {!! Form::submit('Yes, Delete', ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#data').DataTable();
        });
    </script>

    <script type="text/javascript">
        $(document).on("click", ".deleteBtn", function() {
            var deleteId = $(this).attr('deleteId');
            var url = "<?php echo URL::route('pending.index'); ?>";
            $(".deleteForm").attr("action", url + '/' + deleteId);
        });
    </script>
@stop
