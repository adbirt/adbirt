@extends('layouts.default')


@section('content')
    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            @include('includes.alert')
            {{-- <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">{!! $title !!}</li>
            </ol> --}}


            <div class="tab-pane" id="second">
                {!! Form::model($user, ['route' => ['post.edit.user', $user->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}

                <div class="form-group row">
                    <label for="country" class="col-sm-3 form-control-label">User Status</label>
                    <div class="col-sm-6 col-md-4">
                        {!! Form::select('active', $active, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 col-md-4 col-sm-offset-3">
                        {!! Form::submit('Update', ['class' => 'btn btn-success btn-rounded']) !!}
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
            </li>
            </ul>
        </div>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>

@stop
