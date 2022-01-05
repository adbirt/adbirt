@extends('layouts.default')
@section('content')
@include('includes.alert')
{!! Html::style('dist/cssc/bootstrap.striped.min.css') !!}
<link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightslider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.rateyo.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">


<!-- Material Design Icons  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Roboto Web Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">

<!-- Content -->
<div class="layout-content" data-scrollable id="mainDiv">
    <div class="container-fluid">
        <div class="alert bg-success alert-styled-left" style="display:none;" id="msg">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">
                Tour Site Booked Successfully... 
            </span>
        </div>
        <div class="alert bg-danger alert-styled-left" style="display:none;" id="Errormsg">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">
                Not Enough Money Available In Wallet To Procced...
            </span>
        </div>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">{!! $title = "View Tour" !!}</li>
        </ol>


        <div class="loaderParent">
            <div id="loader"></div>
        </div>

        @if( Auth::user()->hasRole('admin') )
        <a href="{{ url('/tour/grid-view-tour') }}" class="btn btn-white active"><i class="material-icons">dashboard</i></a>        
        <a href="{{ url('/tour/view-tour') }}" class="btn btn-white "><i class="material-icons">list</i></a>
        @endif
        <div class="clearfix"></div>
        <div class="card-columns viewproductbox">
            @if(!empty($arrTours))

            <div class="card">
                <div class="card-header bg-white center">
                    <h4 class="card-title"><a href="{{ url('/tour/show/'.base64_encode($arrTours->id)) }}">{!! ucwords($arrTours->tour_name) !!}</a></h4>

                </div>
                {{-- <div class="demo text-center">
                    <ul id="lightSlider" class="imgSlider">
                        <li class="sliderImg" data-thumb="{!! asset('assets/tourPhotos/'.$image->tour_image) !!}">
                            <img class="MainImg" src="{!! asset('assets/tourPhotos/'.$image->tour_image) !!}" />
                        </li>
                    </ul>
                </div> --}}
                <div class="zoom-gallery">
                    @foreach($TourImage as $image)
                    <a href="{!! asset('assets/tourPhotos/'.$image->tour_image) !!}" data-source="{!! asset('assets/tourPhotos/'.$image->tour_image) !!}" title="Tour Site" style="width:193px;height:125px;">
                        <img src="{!! asset('assets/tourPhotos/'.$image->tour_image) !!}" width="193" height="125">
                    </a>
                    @endforeach
                </div>
                <div class="card-block">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 ">
                        <label  class="control-label space text-uppercase viewproductlabel  col-md-4 col-xs-12 col-sm-4 col-lg-3 ">description : </label>
                        <p class="description col-md-8 col-xs-12 col-sm-8 col-lg-9">
                            {!! ucwords(strip_tags($arrTours->tour_description)) !!} 
                        </p>
                    </div>
                    @if( Auth::user()->hasRole('client') )

                    <div class="form-group row">     

                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                    <label class="viewproductlabel"> Location : </label><span class="text-success" style="font-size:17px;"> {!! ucwords($arrTours->tour_location) !!}</span>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                    <label class="viewproductlabel">Site Visit Policy : </label><span class="text-success" style="font-size:17px;"> {!! ucwords(strip_tags($arrTours->tour_site_visit_policy)) !!}</span>
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12 ">
                                <a class="buyproduct" href="{{ url('/book/tour/'.base64_encode($arrTours->id)) }}" ><button type="button"  class="btn btn-primary btn-rounded ">Book Now</button></a>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12 ">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                    <label class="viewproductlabel">Price : </label> 
                                    <span class="text-success" style="font-size:17px;">${!! number_format($arrTours->tour_price,2) !!} {{-- + $1* --}}</span> 
                                </div>
                                <input type="hidden" name="tourPrice" value="{!! $arrTours->tour_price !!}" id="tourPrice">
                            </div>


                        </div>
                    </div>
                    @else
                    <div class="form-group row">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Location :  </label><span class="text-success" style="font-size:21px;"> {!! ucwords($arrTours->tour_location) !!}</span>
                            </div>
                            <div class="col-md-4">
                                <label>Price : </label><span class="text-success" style="font-size:21px;"> ${!! number_format($arrTours->tour_price,2) !!}</span>
                            </div>
                            <div class="col-md-4">
                                <label>Site Visit Policy :  </label><span class="text-success" style="font-size:21px;">{!! ucwords($arrTours->tour_site_visit_policy) !!}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                    <br><hr>
                    @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('vendor') )
                    <ul class="ActionMenu" style="margin-left: 108px;">
                        <li class="ActionMenuLi">
                            <a href="{{ url('/tour/editTour/'.base64_encode($arrTours->id)) }}">
                                Edit
                            </a>
                        </li>
                        <li class="ActionMenuLi">
                            <a href="javascript:void(0);" Onclick=Del({{ $arrTours->id }});>
                                Delete
                            </a>
                        </li>
                    </ul>
                    @endif
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Visitors Comments & Rating</h3>
                            </div>
                            <div class="col-md-6 Mainrate" style="position: relative;left: 35%;">
                                <div class="MainRateYo"></div> 
                                <div class="MainView">
                                    <input type="hidden" name="MainRating"  id="MainRating"  @if(isset($AverageRating) && !empty($AverageRating)) value="{{ $AverageRating }}" @endif>
                                    <span>  @if(isset($arrReviewCnt) && !empty($arrReviewCnt)) {{ $arrReviewCnt }} @else 0 @endif Reviews</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr>
                            @foreach($arrTours->TourReview as $Comment)    
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong>{{ $Comment->user_name }}</strong>
                                    </div>
                                    <div class="panel-body" style="padding-left: 25px">
                                     {{ $Comment->tour_comment }} 
                                 </div>
                                 <hr>
                             </div>
                         </div>
                         @endforeach
                     </div>
                 </div>
                 @if(isset($cntBook))
                 <div class="container">
                    <div class="row">
                        <h3>Give Your FeedBack</h3>
                        @if( Auth::user()->hasRole('client') )
                            <div class="rateYo"></div> 
                        @endif
                    </div>
                    <div class="row cmnt" @if(isset($arrTourCmt) && !empty($arrTourCmt)) style="display: block;"
                    @else style="display: none;" @endif>
                    <div class="col-md-12">
                        <div class="widget-area no-padding blank">
                            <div class="status-upload">
                                <form @if(isset($arrTourCmt) && !empty($arrTourCmt)) action="{{ url('/tour/UpdateComment') }}" @else action="{{ url('/tour/comment') }}" @endif method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="tour_rating" id="TourRate" value="@if(isset($arrTourCmt) && !empty($arrTourCmt->tour_rating)) {{ $arrTourCmt->tour_rating }} @endif">
                                    <input type="hidden" name="tour_id" value="{{ $arrTours->id }}">
                                    @if(isset($arrTourCmt) && !empty($arrTourCmt->tour_comment))
                                    <input type="hidden" name="update" id="update" value="update">
                                    @endif
                                    <textarea placeholder="Your Thoughts About This Tour?" name="tour_comment" class="form-control" required>@if(isset($arrTourCmt) && !empty($arrTourCmt->tour_comment)) {{ $arrTourCmt->tour_comment }} @endif</textarea>
                                    <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Share</button>
                                </form>
                            </div><!-- Status Upload  -->
                        </div><!-- Widget Area -->
                    </div>

                </div>
            </div>
            @endif
        </div>
    </div>
    @else
    <h3><span class="nodata">No tour found<span></h3>
    @endif

</div>
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
<script type="text/javascript" src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/lightslider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/loadingoverlay.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/loadingoverlay_progress.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.rateyo.js') }}"></script>

<script type="text/javascript">

    $(document).ready(function() {
        $('.zoom-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function(item) {
                    return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function(element) {
                return element.find('img');
            }
        }
        
    });
    })
    var baseUrl = "{{ url('/')}}"
    var rate = $("#TourRate").val();  

    $(".rateYo").rateYo({
        onSet: function (rating, rateYoInstance) {
            var rating;
            var id = $("#Rate_id").val(); 
            $("#TourRate").val(rating); 
            $(".cmnt").show(); 
        },
        <?php if( isset($arrTourCmt->tour_rating) && !empty($arrTourCmt->tour_rating) ){ ?>
            rating: rate,
            <?php }else{ ?>
                rating: 1,
                <?php } ?>
                starWidth: "20px",
                numStars: 5,
                fullStar: true,
            });

    var AvrgeRate = $("#MainRating").val();  
    $(".MainRateYo").rateYo({
        onSet: function (rating, rateYoInstance) {

        },

        rating: AvrgeRate,
        starWidth: "20px",
        numStars: 5,
        readOnly:true,
        fullStar: true,
    });
    $('#lightSlider').lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        slideMargin: 0,
        thumbItem: 9
    });
    function Del(id){

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this tour details!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Ok',
            closeOnConfirm: true,
        },
        function(){
            $.LoadingOverlay("show");
            $.ajax({
                url: baseUrl+'/tour/delete',
                type: 'POST',
                data: {id: id},
            })
            .done(function() {
                $("#data-"+id).fadeOut( "slow");
            })          
        });
    };

    function Book(id){
        var tourPrice = $("#tourPrice").val();
        var totalPrice = parseInt(tourPrice);

        swal({
            title: "Are you sure?",
            text: "You want to Book this tour! $"+ totalPrice +" Will Be Deducted From Your Wallet Balance",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes',
            closeOnConfirm: true,
        },
        function(){
            $.LoadingOverlay("show");
            $.ajax({
                url: baseUrl+'/tour/Book',
                type: 'POST',
                data: {id: id},
            })
            .done(function(response) {
                $.LoadingOverlay("hide");
                $("#mainDiv").animate({ scrollTop: 0 });
                var response = response;
                if(response == "true"){
                    $("#msg").show();
                    setTimeout(function(){ 
                        $("#msg").fadeOut( "slow"); 
                        window.location.href = "{{ url('/order/clientHistory') }}";
                    }, 3500);
                }else{
                    $("#Errormsg").show();
                    setTimeout(function(){ 
                        $("#Errormsg").fadeOut( "slow"); 
                        window.location.href = "{{ url('/dashboard') }}";
                    }, 3500);
                }
            })          
        });
    };                                                                                                       
</script>
@stop