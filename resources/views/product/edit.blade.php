@extends('layouts.template')
@section('content')
@if ($errors->has())
        @foreach ($errors->all() as $error)
            <div >{{ $error }}</div>
        @endforeach
    @endif
	
    <h1>Edit Product</h1>
    {!! Form::model($product,['method' => 'PUT', 'files' => 'true', 'route'=>['product.update',$product->id]]) !!}
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
        {!! Form::file('pro_pics',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop