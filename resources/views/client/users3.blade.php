@extends('layouts.default')

@section('style')
    {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            @include('includes.alert')
            {{-- <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">{!! $title !!}</li>
            </ol> --}}
            <div class="card">
                @if (count($users))
                    <div class="table-responsive p-2">
                        <table id="userTable" class="table">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Total Client</th>
                                    {{-- <th>Phone</th>
                                <th>Country</th>
                                <th>Address</th>
                                <th>Birthday</th>
                                <th>Status</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{!! $user->country !!}</td>
                                        <td>{!! $user->total_country_users !!}</td>
                                        {{-- <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td> --}}
                                        {{-- <td><a class="btn btn-info btn-xs btn-archive Editbtn" href="#"  style="margin-right: 3px;">Edit</a></td> --}}
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
@stop


@section('script')
    {!! Html::script('plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('plugins/datatables/dataTables.bootstrap.min.js') !!}

    <script>
        $("#userTable").DataTable({
            "paging": false,
        });
        {{-- $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        }); --}}
    </script>
@stop
