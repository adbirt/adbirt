@extends('layouts.default')

@section('style')

{!! Html::style('dist/cssc/bootstrap.striped.min.css') !!}

<link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">

@stop

@section('content')

<!-- Content -->

<div class="layout-content" data-scrollable>

  <div class="container-fluid">

    <div class="Formbox viewtable">

      @include('includes.alert')

      <!--<ol class="breadcrumb">

        <li><a href="{{ url('/') }}">Home</a></li>

        <li class="active">{!! $title = "View Notifications" !!}</li>

      </ol>-->
      
      <div class="card p-3" style="overflow: hidden;">

        <!--<h5 class="notificationheading">Notifications</h5>-->

            @if(count($arrNotify))

              @foreach ($arrNotify as $key => $value)
            
                <!--<hr class="notifydivider">-->
                <div class="row  @if($value->status == 'Unseen' ) notifypending @else  @endif ">
                  <div class="col-md-12 ">
                    <label class="notifylabel label label-warning">  Title : </label> 
                    <span class="notifycontent title">{!! ucwords($value->heading) !!}</span>
                  </div> 
                  <div class="col-md-12 notifyrow">
                    <div class="col-md-8 bordernotify">
                      <label class="notifylabel longcontent">Content :</label>  <span class="notifycontent">{!! $value->content !!}</span>
                    </div>
                    <div class="col-md-4">
                      <label class="notifylabel">Type :</label>   <span class="notifycontent text-color">{!! ucfirst($value->type) !!}</span>
                    </div>
                    <div class="col-md-4">
                      <label class="notifylabel">Date :</label>   <span class="notifycontent text-color">{!! date('d-M-Y h:s A',strtotime($value->created_at)) !!}</span>
                    </div>
                  </div>
                </div>
                <br>
              @endforeach

              @else
                <h3><span class="nodata">No product found<span></h3>  
              @endif

              <nav class="center"> 
               {!! $arrNotify->render() !!}
              </nav>

        </div><!-- /.box-body -->

      </div><!-- /.box -->

    </div>

  </div><!-- /.col -->

</div><!-- /.row -->

</section><!-- /.content -->


<!-- jQuery -->

@stop

@section('script')


{!! Html::script('dist/vendor/jquery.min.js') !!} 



<!-- Bootstrap -->



{!! Html::script('dist/vendor/tether.min.js') !!} 



{!! Html::script('dist/vendor/bootstrap.min.js') !!} 



<!-- AdminPlus -->



{!! Html::script('dist/vendor/adminplus.js') !!}



<!-- App JS -->



{!! Html::script('dist/js/main.min.js') !!}

@stop

