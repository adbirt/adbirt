@extends('layouts.dashboard')

@section('content')
    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            @include('includes.alert')
            <!--<ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active"> {!! $title !!}</li>
                      </ol>-->
            <div class="card">
                @if (count($users))
                    <div class="table-responsive">
                        <table id="datatable-example" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Address</th>
                                    <th>Birthday</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{!! $user->name !!}</td>
                                        <td>{!! $user->email !!}</td>
                                        <td>{!! $user->phone !!}</td>
                                        <td>{!! $user->country !!}</td>
                                        <td>{!! $user->address !!}</td>
                                        <td>{!! $user->birthday !!}</td>
                                        <td>
                                            @if ($user->active == 0)
                                                Inactive
                                            @else
                                                Active
                                            @endif
                                        </td>
                                        <!-- td><a class="btn btn-info btn-xs btn-archive Editbtn" href="#"  style="margin-right: 3px;">Edit</a></td> -->
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


    </div>

    </div>
    </div>

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

    <script>
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    </script>
@stop
