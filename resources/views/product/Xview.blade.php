@extends('layouts.template')
@section('content')
{!! Html::style('dist/cssc/bootstrap.striped.min.css') !!}
  <!-- Content -->
  <div class="layout-content" data-scrollable>
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li><a href="{!!  route( 'dashboard') !!}">Home</a></li>
        <li class="active">Marketplace</li>
      </ol>

      <p class="btn-group pull-md-right">
        <!-- <a href="#" class="btn btn-white active"><i class="material-icons">list</i></a> -->
        <a href="#" class="btn btn-white"><i class="material-icons">dashboard</i></a>
      </p>	
	  @include('includes.alert')
      <div class="clearfix"></div>
	@if(Auth::user()->hasRole('admin'))
	
	 <h1>Peru BookStore</h1>
 <a href="{!!  route( 'product.create') !!}" class="btn btn-success">Create Book</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>ISBN</th>
         <th>Title</th>
         <th>Author</th>
         <th>Publisher</th>
         <th>Thumbs</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($products as $product)
         <tr>
             <td>{{ $product->id }}</td>
             <td>{{ $product->pro_name }}</td>
             <td>{{ $product->pro_des }}</td>
             <td>{{ $product->pro_price }}</td>
             <td><img src="../images/catalog/{!! $product->pro_pics !!}" height="35" width="30"></td>
             <td><a href="{{url('product',$product->id)}}" class="btn btn-primary">Read</a></td>
             <td><a href="{{route('product.edit',$product->id)}}" class="btn btn-warning">Edit</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['product.delete', $product->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>

	  
      <div class="card-columns">
	@if(Auth::user()->hasRole('vendor'))
        <div class="card">
          <div class="card-header bg-white center">
            <h4 class="card-title"><a href="take-course.html">{!! $product->pro_name !!}</a></h4>
            <div>
                         <i class="material-icons text-warning md-18">star</i>
              <i class="material-icons text-warning md-18">star</i>
              <i class="material-icons text-warning md-18">star</i>
              <i class="material-icons text-warning md-18">star</i>
              <i class="material-icons text-warning md-18">star_border</i>
            </div>
          </div>
          <a href="{!! route('product.buy', $product->id) !!}">
            <img src="../public{!! $product->pro_pics !!}" alt="Card image cap" style="width:100%;">
          </a>
          <div class="card-block">
            <p class="text-muted">ADVANCED</p>
            <p class="m-b-0">
              {!! $product->pro_des !!}
            </p>
			<div class="form-group row">
                <span class="text-success" style="font-size:21px;">&#x20A6;{!! $product->pro_price !!}</span>
                <div class="col-sm-8">
                  <div class="row">
                    <div class="col-md-6">
                    
                    </div>
                    <div class="col-md-6">
                       <a href="{!! route('product.buy', $product->id) !!}"> <button type="button"  class="btn btn-primary btn-rounded">Pay for Service</button></a>
                    </div>
                  </div>
                </div>
              </div>
             
          </div>
        </div>
	 @else
	 
	 @endif
	 @endforeach

@endif
	   
	   
		
        
       

      </div>
	 
      <nav class="center"> 
 {!! $products->render() !!} 
        <!-- <ul class="pagination pagination-sm">
          <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item active">
            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul> -->
      </nav>

    </div>
  </div>
  
    <!-- jQuery -->
{!! Html::script('dist/vendor/jquery.min.js') !!}

{!! Html::script('dist/vendor/bootstrap.min.js') !!}


