@extends('layouts.default')
@section('style')
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
        div#preview img {padding: 10px;}
    </style>
@stop
@section('content')

<!-- Content -->
<div class="layout-content" data-scrollable>
    <div class="container-fluid">
        <div class="Formbox">
            @include('includes.alert')
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>

                @if ( isset($tourData) )
                <li class="active">{!! $title = "Update Tour" !!}</li>
                @else
                <li class="active">{!! $title = "Add Tour" !!}</li>
                @endif
            </ol>
            <a href="{{ url('/tour/view-tour') }}"><button class="btn btn-primary waves-effect waves-light" id="navigate">View Tours</button></a>
            <div class="card">
                <form @if(isset($tourData)) action="{{ url('/tour/update') }}" @else action="{{ url('/tour/store') }}" @endif data-parsley-validate novalidate method="POST" id="myform" name="myform" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if(isset($tourData))
                    <input type="hidden" name="id" value="{{ $tourData->id }}">
                    @endif
                    @if ( isset($tourData) )
                    <h5>Update tour</h5>
                    @else
                    <h5>Add tour</h5>
                    @endif
                    <fieldset>
                        <legend>Tour Details:</legend>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Tour Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="tour_name" parsley-trigger="change" required placeholder="Tour Name" class="form-control" id="tour_name" @if ( isset($tourData) && !empty($tourData->tour_name)) value="{{ $tourData->tour_name }}" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Tour`s Description</label>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="tour_description" required placeholder="Tour Description" class="form-control" id="tour_description" >@if( isset($tourData) && !empty($tourData->tour_description)){{$tourData->tour_description }}@endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Tour`s Price($)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="tour_price" parsley-trigger="change" required placeholder="Tour Price" class="form-control" id="tour_price($)" title="" @if ( isset($tourData) && !empty($tourData->tour_price)) value="{{ $tourData->tour_price }}" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Tour`s Pictures</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" class="filestyle" name="image[]" id="upld" data-buttontext="Select Image" multiple data-buttonname="btn-white">
                                    @if ( isset($tourData) && !empty($tourData->GetImages)) 
                                        <div id="preview">
                                            @foreach($tourData->GetImages as $image)    
                                                <img src="{!! asset('assets/tourPhotos/'.$image->tour_image) !!}" height="100">
                                            @endforeach
                                        </div>
                                    @else
                                        <div id="preview"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Tour`s Location</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="tour_location" parsley-trigger="change" required placeholder="Tour Location" class="form-control" id="tour_location" title="" @if ( isset($tourData) && !empty($tourData->tour_location)) value="{{ $tourData->tour_location }}" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Tour`s Address</label>
                                </div>    
                                <div class="col-md-8">
                                    <textarea name="tour_address" required placeholder="Tour Address" class="form-control" id="tour_address" >@if(isset($tourData) && !empty($tourData->tour_address)) {{ $tourData->tour_address }} @endif</textarea>
                                </div>
                            </div>
                        </div>
                        @if(Auth::user()->hasRole('admin'))
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Select Owner</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="owner_id" data-placeholder="Select an option" class="form-control" id="owner_id">
                                        @if ( isset($arrOwner) && count($arrOwner) > 0 )
                                            <option value="">Select Vendor</option>
                                            @foreach ($arrOwner as $value)
                                                @if ( isset($tourData) && $tourData->owner_id == $value->user_id )
                                                    <option value="{{ $value->user_id }}" selected>{{ $value->GetOwner->name }}</option>
                                                @else
                                                    <option value="{{ $value->user_id }}">{{ $value->GetOwner->name }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        @else
                            <input type="hidden" name="owner_id" @if ( isset($tourData) && !empty($tourData->owner_id)) value="{{ $tourData->owner_id }}"  @endif>
                        @endif
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="formLabel">Tour`s Visit Policy</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea  name="tour_site_visit_policy" parsley-trigger="change" required placeholder="Tour`s Visit Policy" class="form-control" id="tour_site_visit_policy" title="" >@if ( isset($tourData) && !empty($tourData->tour_site_visit_policy)) {{ $tourData->tour_site_visit_policy }} @endif </textarea>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit" id="btn-submit">
                            @if(isset($tourData))  Update  @else   Save  @endif  <i class="icon-arrow-right14 position-right"></i>
                        </button>
                        <a href="{{ url('/tour/view-tour') }}" type="reset" class="btn btn-danger waves-effect waves-light m-l-5">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>  
        </div><!-- /.box -->
    </div></div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->


<!-- Modal for delete confirm -->

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
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js') !!}

{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js') !!}

<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">
    CKEDITOR.replace('tour_description');
    CKEDITOR.replace('tour_site_visit_policy');
    function previewImages() {

      var $preview = $('#preview').empty();
      if (this.files) $.each(this.files, readAndPreview);

      function readAndPreview(i, file) {

        if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
          return alert(file.name +" is not an image");
    } // else...
    
    var reader = new FileReader();

    $(reader).on("load", function() {
      $preview.append($("<img/>", {src:this.result, height:100}));
  });

    reader.readAsDataURL(file);
    
}

}

$('#upld').on("change", previewImages);

jQuery(document).ready(function() {

    $("#myform").validate({
        errorPlacement: function(error,element) {
            return true;
        },
        rules:{
            tour_name:{
                required: true,
            },
            tour_description:{
                required: true,
            },
            <?php  if ( empty($tourData->tour_image)){ ?>
                image:{
                    required: true,
                },
                <?php } ?>
                location:{
                    required: true,
                },
                address:{
                    required: true,
                },
                owner_id:{
                    required: true,
                },
                tour_site_visit_policy:{
                    required: true,
                },
                tour_price:{
                    required:true,
                    digits:true,
                },
            },
            submitHandler: function(form){
                $('#btn-submit').hide();
                form.submit();
            }
        });
});
</script>
@stop