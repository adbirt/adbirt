@extends('layouts.template')
@section('content')
    <h1>Book Show</h1>
	
    <form class="form-horizontal">
	<input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Cover</label>
            <div class="col-sm-10">
                <img src="{{('../public/..'.$product->pro_pics.'')}}" height="180" width="150" class="img-rounded">
            </div>
        </div>
        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">ISBN</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$product->pro_name}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder={{$product->pro_des}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="author" class="col-sm-2 control-label">Author</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" placeholder={{$product->pro_price}} readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{!! URL::route('product.view') !!}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
@stop