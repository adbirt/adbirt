@extends('layouts.template')
@section('content')
    <h1>Create Product</h1>
	{!! Form::open(array('role' => 'form', 'files' => 'true', 'route' => 'product.store', 'method' => 'post', 'class' => 'form-horizontal')) !!}
    <div class="form-group">
        {!! Form::label('Name', 'Name:') !!}
        {!! Form::text('pro_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Description', 'Description:') !!}
        {!! Form::text('pro_des',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Price', 'Price:') !!}
        {!! Form::text('pro_price',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Image', 'Image:') !!}
        {!! Form::file('image',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
	
	<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{!! URL::route('product.view') !!}" class="btn btn-primary">Back</a>
            </div>
        </div>
	
@stop