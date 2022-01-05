@extends('layouts.dashboard')

@section('content')
    @include('includes.alert')
    {!! Html::style('dist/cssc/bootstrap.striped.min.css') !!}
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ion.rangeSlider.skinHTML5.min.css') }}">

    <style type="text/css">
        .nodata {
            align-items: center !important;
            color: red !important;
            display: flex !important;
            font-size: 23px !important;
            font-weight: bold !important;
            justify-content: center !important;
            text-transform: capitalize;
        }

        ul.ActionMenu {
            list-style-type: none;
        }

        .ActionMenuLi {
            display: inline;
            word-spacing: 25px;
        }

        .ActionMenuLi a:hover {
            text-decoration: none;
        }

    </style>
    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Roboto Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
        rel="stylesheet">
    <!-- Content -->
    <div class="layout-content" data-scrollable id="mainDiv">
        <div class="container-fluid">
            <div class="alert bg-success alert-styled-left" style="display:none;" id="msg">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                        class="sr-only">Close</span></button>
                <span class="text-semibold">
                    Product Puchased Successfully...
                </span>
            </div>
            <div class="alert bg-danger alert-styled-left" style="display:none;" id="Errormsg">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                        class="sr-only">Close</span></button>
                <span class="text-semibold">
                    Not Enough Money Available In Wallet To Procced...
                </span>
            </div>
            <ol class="breadcrumb">
                <li><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="active">Marketplace</li>
            </ol>


            <p class="btn-group pull-md-left">
            <div class="Searchdetails">
                <form action="{{ url('/filter/product') }}" method="GET" id="filter" name="myform">
                    <div class="row searchproduct">

                        <div class="col-md-12">
                            <div class="input-group searchbox">
                                <span class="input-group-addon" id="searchicon">
                                    <select name="Cat_id" data-placeholder="Select an option" class="form-control"
                                        id="Cat_id">
                                        @if (isset($arrCatgry) && count($arrCatgry) > 0)
                                            <option value="">Select Category</option>
                                            @foreach ($arrCatgry as $value)
                                                <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </span>
                                <input type="text" name="searchByname" id="searchByname" class="form-control"
                                    placeholder="Search Products..">

                            </div>
                        </div>
                    </div>
                    <div class="row detailsproduct">
                        <div class="col-md-4">
                            <input type="search" name="searchByLoc" id="searchBy" class="form-control"
                                placeholder="Enter Location">
                        </div>

                        <div class="col-md-4">
                            <select name="vendor_id" data-placeholder="Select an option" class="form-control"
                                id="vendor_id">
                                @if (isset($arrVendor) && count($arrVendor) > 0)
                                    <option value="">Select Vendor</option>
                                    @foreach ($arrVendor as $value)
                                        <option value="{{ $value->user_id }}">{{ $value->GetVendor->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md-4" id="search" style="position: relative;top: -20px;">
                            <input type="search" name="searchByPrice" id="price_range" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" name="Min_price" value="{{ $MinPrice }}" id="Min_price">
                    <input type="hidden" name="Max_price" value="{{ $MaxPrice }}" id="Max_price">
                    <div class="buttonblock row">
                        <div class="col-md-12 ">
                            <input type="submit" class="btn btn-default searchbtn" value="Search"
                                style="background-color: #2196f3;color: #fff;">
                        </div>
                    </div>
                </form>
            </div>
            </p>

            {{-- <p class="btn-group pull-md-right">
            <a href="#" class="btn btn-white active"><i class="material-icons">list</i></a>
            <a href="#" class="btn btn-white"><i class="material-icons">dashboard</i></a>
        </p> --}}
            <div class="clearfix"></div>
            <div class="card-columns">
                @if (!empty($products['0']['product_name']))

                    @foreach ($products as $product)
                        <div class="card" id="data-{!! $product->id !!}">
                            <div class="card-header bg-white center">
                                <h4 class="card-title"><a
                                        href="{{ url('/product/show/' . base64_encode($product->id)) }}">{!! ucfirst($product->product_name) !!}</a>
                                </h4>
                                <div>
                                    <i class="material-icons text-warning md-18">star</i>
                                    <i class="material-icons text-warning md-18">star</i>
                                    <i class="material-icons text-warning md-18">star</i>
                                    <i class="material-icons text-warning md-18">star</i>
                                    <i class="material-icons text-warning md-18">star_border</i>
                                </div>
                            </div>
                            <a href="{{ url('/product/show/' . base64_encode($product->id)) }}">
                                <img src="../uploads/{!! $product->product_image !!}" class="productimg" alt="Card image cap"
                                    style="width:100%;">
                            </a>
                            <div class="card-block">

                                <p class="m-b-0 productdescription">
                                    {!! $product->product_description !!}
                                </p>
                                @if (Auth::user()->hasRole('client'))
                                    <div class="form-group row">
                                        <span class="text-success" style="font-size:21px;">${!! $product->product_price !!}
                                            {{-- + $1* --}}</span>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-md-6">

                                                </div>
                                                <div class="col-md-6">
                                                    <a href="javascript:void(0);"
                                                        Onclick=Buy({{ $product->id }},{{ $product->product_price }},{{ $product->product_shipping_cost }});><button
                                                            type="button" class="btn btn-primary btn-rounded">Buy
                                                            Now</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-md-6">

                                                </div>
                                                <div class="col-md-6">
                                                    <span class="text-success"
                                                        style="font-size:21px;">${!! $product->product_price !!}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            @if (Auth::user()->hasRole('admin'))
                                <ul class="ActionMenu" style="margin-left: 108px;">
                                    <li class="ActionMenuLi">
                                        <a href="{{ url('/product/editProduct/' . base64_encode($product->id)) }}">
                                            Edit
                                        </a>
                                    </li>
                                    <li class="ActionMenuLi">
                                        <a href="javascript:void(0);" Onclick=Del({{ $product->id }});>
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            @elseif(Auth::user()->id == $product->vendor_id)
                                <ul class="ActionMenu" style="margin-left: 108px;">
                                    <li class="ActionMenuLi">
                                        <a href="{{ url('/product/editProduct/' . base64_encode($product->id)) }}">
                                            Edit
                                        </a>
                                    </li>
                                    <li class="ActionMenuLi">
                                        <a href="javascript:void(0);" Onclick=Del({{ $product->id }});>
                                            Delete
                                        </a>
                                    </li>
                                </ul>

                            @endif
                        </div>
                    @endforeach

                @else

                    <h3><span class="nodata">No product found<span></h3>

                @endif




            </div>

            <nav class="center">
                {!! $products->render() !!}
            </nav>

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

@section('script')
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/loadingoverlay.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/loadingoverlay_progress.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
    <script type="text/javascript">
        var Min_price = $("#Min_price").val();
        var Max_price = $("#Max_price").val();

        $("#price_range").ionRangeSlider({
            type: "double",
            min: parseInt(Min_price),
            max: parseInt(Max_price),
            prefix: "$",
        });

        var baseUrl = "{{ url('/') }}";

        function Del(id) {
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this product details!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Ok',
                    closeOnConfirm: true,
                },
                function() {
                    $.ajax({
                            url: baseUrl + '/product/delete',
                            type: 'POST',
                            data: {
                                id: id
                            },
                        })
                        .done(function() {
                            $("#data-" + id).fadeOut("slow");
                        })
                });
        };

        function Buy(id, price, shipingCost) {

            var totalPrice = parseInt(price) + parseInt(shipingCost) + 1;
            swal({
                    title: "Are you sure?",
                    text: "You want to buy this product! An additional charge of $1 & shipping cost of $" +
                        shipingCost + " will be charged so the actual cost would have been $" + price +
                        ", it ended up being $" + totalPrice + "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Yes',
                    closeOnConfirm: true,
                },
                function() {
                    $.LoadingOverlay("show");
                    $.ajax({
                            url: baseUrl + '/Product/Buy',
                            type: 'POST',
                            data: {
                                id: id
                            },
                        })
                        .done(function(response) {
                            $.LoadingOverlay("hide");
                            $("#mainDiv").animate({
                                scrollTop: 0
                            });
                            var response = response;
                            if (response == "true") {
                                $("#msg").show();
                                setTimeout(function() {
                                    $("#msg").fadeOut("slow");
                                    window.location.href = "{{ url('/order/clientHistory') }}";
                                }, 5000);
                            } else {
                                $("#Errormsg").show();
                                setTimeout(function() {
                                    $("#Errormsg").fadeOut("slow");
                                    window.location.href = "{{ url('/dashboard') }}";
                                }, 5000);
                            }
                        })
                });
        };
    </script>
@stop
