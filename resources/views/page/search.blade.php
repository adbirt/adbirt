@extends('layouts.default')
@section('content')
	@include('includes.alert')
  <!-- Content -->
  <div class="layout-content" data-scrollable>
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">Marketplace</li>
      </ol>
      <p class="btn-group pull-md-right">
        <a href="#" class="btn btn-white active"><i class="material-icons">list</i></a>
        <a href="#" class="btn btn-white"><i class="material-icons">dashboard</i></a>
      </p>
      <div class="clearfix"></div>
      <div class="card-columns">
	 @if (count($products) === 0)
 html showing no products found
@elseif (count($products) >= 1)
print out results
    @foreach($products as $product)
    print product
    @endforeach
@endif
		
        
       

      </div>
	 
      <nav class="center"> 
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
@stop