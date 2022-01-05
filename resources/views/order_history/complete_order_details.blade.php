@extends('layouts.default')
@section('style')
<link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome/css/font-awesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
<style type="text/css">
    .dropAction{min-width: 40px;text-align: center;background: white;}

</style>
@stop
@section('content')

<!-- Content -->
<div class="layout-content" data-scrollable>
    <div class="container-fluid">
        @if(Session::has('flash_message'))
        <div class="alert bg-success alert-styled-left" id="msg">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">
                {!! session('flash_message') !!}
            </div>
            @endif
            <div class="alert bg-success alert-styled-left" style="display:none;" id="msg">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">
                    Payment Successfully... 
                </span>
            </div>
            <div class="alert bg-danger alert-styled-left" style="display:none;" id="Errormsg">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">
                    Not Enough Money Available In Wallet To Procced...
                </span>
            </div>
            @if(Session::has('Error_message'))
            <div class="alert bg-danger alert-styled-left" id="msg">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">
                    {!! session('Error_message') !!}
                </div>
                @endif
                <div class="Formbox viewtable">
                    @include('includes.alert')
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">{!! $title = "View Products" !!}</li>
                    </ol>
                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('vendor') )
                    <a href="{{ url('/product/add-product') }}"><button class="btn btn-primary waves-effect waves-light" id="navigate">Add Product</button></a>
                    @endif
                    <div class="card">
                        <h5>View Products</h5>
                        @if( isset($arrOrderDet) && count($arrOrderDet))
                        <table id="datatable-example" class="table table-striped table-hover table-sm table-responsive">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Status</th>
                                    <th>Pay</th>        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arrOrderDet as $value)
                                <tr id="data-{!! $value['get_product']['id'] !!}">
                                    <td class="product_name">{!! $value['get_product']['product_name'] !!}</td>
                                    <td class="product_name">${!! number_format($value['final_price'],2) !!}</td>
                                    <td>
                                        @if($value['product_delivery_status'] == "Product Deliverd Successfully")
                                        <span class="label label-success">Product Deliverd Successfully</span>
                                        @elseif($value['product_delivery_status'] == "Your Product Process Failed") 
                                        <span class="label label-danger">Your Product Process Failed</span>
                                        @else
                                        <span class="label label-warning">In Process</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" Onclick=Pay({{ $value['get_product']['id'] }});>
                                            <button type="button"  class="btn btn-primary btn-rounded">Pay Now</button>
                                        </a>  
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td><span class="nodata">No Data Found<span></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<!-- jQuery -->

{!! Html::script('dist/vendor/jquery.min.js') !!} 

<!-- Bootstrap -->

{!! Html::script('dist/vendor/tether.min.js') !!} 

{!! Html::script('dist/vendor/bootstrap.min.js') !!} 

<!-- AdminPlus -->

{!! Html::script('dist/vendor/adminplus.js') !!}

<!-- App JS -->

{!! Html::script('dist/js/main.min.js') !!}   


@section('script')
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script type="text/javascript">
    var baseUrl = "{{ url('/')}}"

    function Pay(id){
        console.log(id);
        swal({
            title: "Are you sure?",
            text: "You want to buy this product!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes',
            closeOnConfirm: true,
        },
        function(){
            $.ajax({
                url: baseUrl+'/Product/Pay',
                type: 'POST',
                data: {id: id},
            })
            .done(function(response) {
                var response = response;
                if(response == "true"){
                    $("#data-"+id).fadeOut( "slow");
                    $("#msg").show();
                    setTimeout(function(){ $("#msg").fadeOut( "slow"); }, 3500);
                }else{
                    $("#Errormsg").show();
                    setTimeout(function(){ $("#Errormsg").fadeOut( "slow"); }, 3500);
                }
            })          
        });
    };                                                                                                       
</script>
@stop