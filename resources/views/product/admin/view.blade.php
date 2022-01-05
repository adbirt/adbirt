@extends('layout/template')

@section('content')
 <h1>Peru BookStore</h1>
 <a href="{{url('/product/create')}}" class="btn btn-success">Create Book</a>
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
             <td><img src="{{('public/..'.$product->pro_pics.'')}}" height="35" width="30"></td>
             <td><a href="{{url('product',$product->id)}}" class="btn btn-primary">Read</a></td>
             <td><a href="{{route('product.edit',$product->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['product.delete', $product->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
		 
		  @endforeach

     </tbody>

 </table>
@endsection