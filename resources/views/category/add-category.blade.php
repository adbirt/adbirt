@extends('layouts.dashboard')

@section('style')
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
        div#preview img {
            padding: 10px;
        }

    </style>
@stop

@section('content')

    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            <div class="Formbox">
                @include('includes.alert')
                <!--<ol class="breadcrumb">
                                                                <li><a href="{{ url('/') }}">Home</a></li>
                                                                @if (isset($categoryData))
                                                                <li class="active">{!! $title = 'Update Category' !!}</li>
                @else
                                                                <li class="active">{!! $title = 'Add Category' !!}</li>
                                                                @endif
                                                            </ol>-->

                <div class="shadow-sm rounded-sm bg-white text-black p-4 mt-2">
                    <form action="{!! isset($categoryData) ? url('/campaigns-category/update') : url('/campaigns-category/store') !!}" data-parsley-validate novalidate method="POST" id="myform"
                        name="myform" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if (isset($categoryData))
                            <input type="hidden" name="id" value="{{ $categoryData->id }}">
                        @endif
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label class="formLabel">Category Name</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="category_name" parsley-trigger="change" required
                                        placeholder="Category Name" class="form-control" id="category_name"
                                        @if (isset($categoryData) && !empty($categoryData->category_name)) value="{{ $categoryData->category_name }}" @endif>

                                    @if (isset($categoryData) && !empty($categoryData->category_name))
                                        <input type="hidden" name="old_category_name" id="old_category_name"
                                            value="{{ $categoryData->category_name }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit" id="btn-submit">
                                @if (isset($categoryData))  Update  @else   Save  @endif
                                <i class="icon-arrow-right14 position-right"></i>
                            </button>
                            <a href="{{ url('/campaigns-category/view-campaigns-category') }}" type="reset"
                                class="btn btn-danger waves-effect waves-light m-l-5">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>

                <hr />

                <a href="{!! url('/campaigns-category/view-campaigns-category') !!}">
                    <button class="btn btn-primary waves-effect waves-light mb-2">
                        View all Categories
                    </button>
                </a>

            </div><!-- /.box -->
        </div>
    </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->


    <!-- Modal for delete confirm -->


@stop

@section('script')

    <!-- jQuery -->

    {!! Html::script('dist/vendor/jquery.min.js') !!}

    <!-- Bootstrap -->

    {!! Html::script('dist/vendor/tether.min.js') !!}

    {!! Html::script('dist/vendor/bootstrap.min.js') !!}

    <!-- AdminPlus -->

    {!! Html::script('dist/vendor/adminplus.js') !!}

    <!-- App JS -->

    {!! Html::script('dist/js/main.min.js') !!}

    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js') !!}

    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js') !!}

    <script type="text/javascript">
        function readURL(input) { // quiz_avatar preview
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#view').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#upld").change(function() {
            readURL(this);
        });

        jQuery(document).ready(function() {
            var base_url = "{{ url('/') }}";
            $("#myform").validate({
                errorPlacement: function(error, element) {
                    return true;
                },
                rules: {
                    category_name: {
                        required: true,
                        remote: {
                            url: base_url + "/campaigns-category/check-category",
                            method: "POST",
                            data: {
                                category_name: function() {
                                    return $("#category_name").val();
                                },
                                @if (isset($categoryData) && !empty($categoryData->category_name))
                                    old_category_name: function() {
                                    return $( "#old_category_name" ).val();
                                    },
                                    action:'edit',
                                @endif
                            }
                        },
                    },
                },
                submitHandler: function(form) {
                    $('#btn-submit').hide();
                    form.submit();
                }
            });
        });
    </script>
@stop
