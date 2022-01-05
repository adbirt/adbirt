@extends('layouts.dashboard')
@section('style')
    <link href="{{ asset('assets/css/sparken_custom_styles.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
    <style type="text/css">
        div#preview img {
            padding: 10px;
        }

        #sigformclass {
            display: none;
        }

        .layout-container #view {
            width: 100% !important;
        }

    </style>
    <script type="text/javascript">
        $('#formselectid').on('change', function() {
            if ($('#formselectid').val() == 'formclass') {
                $('#sigformid').hide();
                $('#sigformclass').show();
            } else {
                $('#sigformid').show();
                $('#sigformclass').hide();
            }
        });
    </script>
@stop
@section('content')

    <!-- Content -->
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            <div class="Formbox">
                @include('includes.alert')
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    @if (isset($campaignsData))
                        <li class="active">{!! $title = 'Update Ads' !!}</li>
                    @else
                        <li class="active">{!! $title = 'Add Ads' !!}</li>
                    @endif
                </ol>
                <a href="{{ url('/campaigns/view-campaigns') }}"><button class="btn btn-primary waves-effect waves-light"
                        id="navigate">View Ads</button></a>
                <div class="card">
                    <form @if (isset($campaignsData)) action="{{ url('/campaigns/update') }}" @else action="{{ url('/campaigns/store') }}" @endif data-parsley-validate novalidate method="POST" id="myform" name="myform"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if (isset($campaignsData))
                            <input type="hidden" name="id" value="{{ $campaignsData->id }}">
                        @endif
                        @if (isset($campaignsData))
                            <h5>Update Ads</h5>
                        @else
                            <h5>Add Ads</h5>
                        @endif
                        <fieldset>
                            <legend>Ads Details:</legend>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Campaign Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="campaign_name" parsley-trigger="change" required
                                            placeholder="Campaign Name" class="form-control" id="campaign_name"
                                            @if (isset($campaignsData) && !empty($campaignsData->campaign_name)) value="{{ $campaignsData->campaign_name }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Campaign Title</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="campaign_title" parsley-trigger="change" required
                                            placeholder="Campaign Title" class="form-control" id="campaign_title"
                                            @if (isset($campaignsData) && !empty($campaignsData->campaign_title)) value="{{ $campaignsData->campaign_title }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Select Ads Category</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="campaign_category" data-placeholder="Select Ads Category"
                                            class="form-control" id="campaign_category">
                                            @if (isset($categoryData) && count($categoryData) > 0)
                                                <option value="">Select Ads Category</option>
                                                @foreach ($categoryData as $value)
                                                    @if (isset($campaignsData) && $campaignsData->campaign_category == $value->id)
                                                        <option value="{{ $value->id }}" selected>
                                                            {{ $value->category_name }}</option>
                                                    @else
                                                        <option value="{{ $value->id }}">{{ $value->category_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Campaign`s Description</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="campaign_description" required placeholder="Campaign Description"
                                            class="form-control"
                                            id="campaign_description">@if (isset($campaignsData) && !empty($campaignsData->campaign_description)){{ $campaignsData->campaign_description }}@endif</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Ad Landing page URL</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="url" name="campaign_url" parsley-trigger="change" required
                                            placeholder="Ad Landing page URL" class="form-control" id="campaign_url"
                                            title="" @if (isset($campaignsData) && !empty($campaignsData->campaign_url)) value="{{ $campaignsData->campaign_url }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Ad Success page URL</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="url" parsley-trigger="change" required
                                            placeholder="Ad Success page URL" class="form-control"
                                            id="campaign_success_url" title="" @if (isset($campaignsData) && !empty($campaignsData->campaign_success_url)) value="{{ $campaignsData->campaign_success_url }}" @endif>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel" id="adbirt-get-selector">Success element
                                            selector</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="url" name="campaign_success_url" required
                                            placeholder="e.g https://my-site.com/advert" class="form-control"
                                            id="adbirt-selector" title="selector">
                                        <br />
                                        <span id="adbirt-loader">...</span>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primiary btn-small" id="adbirt-get-selector"
                                            title="get selector">Set Selector</button>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            @if (Auth::user()->hasRole('admin'))
                                <div class="form-group" id="sigformselect">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="formLabel">Advertiser Signup Form/class Id</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select id="formselectid" name="formselect">
                                                <option value="formid">Form Id</option>
                                                <option value="formclass">Form Class</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="sigformid">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="formLabel">Advertiser Signup Form Id</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="form_id" parsley-trigger="change"
                                                placeholder="Advertiser Signup Form Id" class="form-control" id="form_id"
                                                title="" @if (isset($campaignsData) && !empty($campaignsData->form_id)) value="{{ $campaignsData->form_id }}" @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="sigformclass">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="formLabel">Advertiser Signup Form Class</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="form_class" parsley-trigger="change"
                                                placeholder="Advertiser Signup Form Class" class="form-control"
                                                id="form_class" title="" @if (isset($campaignsData) && !empty($campaignsData->form_class)) value="{{ $campaignsData->form_class }}" @endif>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="formLabel">Advertiser Signup Form DOM Modified HTML</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="dom_modified" parsley-trigger="change"
                                                placeholder="Advertiser Signup DOM Modified HTML" class="form-control"
                                                id="dom_modified" title="" @if (isset($campaignsData) && !empty($campaignsData->dom_modified)) value="{{ $campaignsData->dom_modified }}" @endif>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!--<div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Advertiser Signup Form Button's Id</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="button_id" parsley-trigger="change" required placeholder="Advertiser Signup Form Button's Id" class="form-control" id="button_id" title="" @if (isset($campaignsData) && !empty($campaignsData->button_id)) value="{{ $campaignsData->button_id }}" @endif>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Select Banner Size</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="banner_size" data-placeholder="Select an option"
                                            class="form-control" id="banner_size">
                                            <option selected disabled>Select Banner Size</option>
                                            @if (isset($bannerSize) && !empty($bannerSize))
                                                @foreach ($bannerSize as $key => $value)
                                                    @if (isset($campaignsData) && $campaignsData->banner_size == $value)
                                                        <option value="{{ $value }}" selected>{{ $value }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $value }}">{{ $value }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Campaign`s Banner</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" class="filestyle" name="campaign_banner" id="upld"
                                            data-buttontext="Choose Banner" data-buttonname="btn-white">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        @if (isset($campaignsData) && !empty($campaignsData->campaign_banner))
                                            <img style="width: 100%;"
                                                src="{{ asset('uploads/campaign_banners/' . $campaignsData->campaign_banner) }}"
                                                id="" class="img-responsive">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="hidden" name="campaign_banner"
                                            value="{{ $campaignsData->campaign_banner }}">
                                    @else
                                        <img style="width: 100%;" src="{{ asset('assets/photos/Placeholder.jpg') }}"
                                            class="img-responsive" id="view">
                                        @endif
                                    </div>

                                    <span style="color:red;" id="response"></span>
                                    <!-- <span id="width"></span>
                                        <span id="height"></span> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Campaign`s Cost Per Action ($)</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" min="0.20" name="campaign_cost_per_action"
                                            parsley-trigger="change" required placeholder="($) Campaign Cost Per Action"
                                            class="form-control" id="campaign_cost_per_action" title=""
                                            @if (isset($campaignsData) && !empty($campaignsData->campaign_cost_per_action)) value="{{ $campaignsData->campaign_cost_per_action }}" @endif>
                                    </div>
                                </div>
                            </div>
                            @if (Auth::user()->hasRole('admin'))
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="formLabel">Select Advertiser</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="advertiser_id" data-placeholder="Select an option"
                                                class="form-control" id="advertiser_id">
                                                @if (isset($Advertiser) && count($Advertiser) > 0)
                                                    <option value="">Select Advertiser</option>
                                                    @foreach ($Advertiser as $value)
                                                        @if (isset($campaignsData) && $campaignsData->advertiser_id == $value->user_id)
                                                            <option value="{{ $value->user_id }}" selected>
                                                                {{ $value->GetVendor->name }}</option>
                                                        @else
                                                            <option value="{{ $value->user_id }}">
                                                                {{ $value->GetVendor->name }}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="advertiser_id" value="{{ Auth::user()->id }}">
                            @endif
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Campaign`s Policy</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="campaign_policy" parsley-trigger="change" required
                                            placeholder="Campaign`s Policy" class="form-control" id="campaign_policy"
                                            title="">@if (isset($campaignsData) && !empty($campaignsData->campaign_policy)) {{ $campaignsData->campaign_policy }} @endif </textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit" id="btn-submit">
                                @if (isset($campaignsData))  Update  @else   Save  @endif <i class="icon-arrow-right14 position-right"></i>
                            </button>
                            <a href="{{ url('/campaigns/view-campaigns') }}" type="reset"
                                class="btn btn-danger waves-effect waves-light m-l-5">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>
    </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->

    {!! Html::script('dist/vendor/css-selector-generator.js') !!}

    <script>
        const successpage = document.querySelector("#campaign_success_url");
        const selectorBtn = document.querySelector("#adbirt-get-selector");
        const selectorInput = document.querySelector("#adbirt-selector");
        const loader = document.querySelector("#adbirt-loader");

        selectorBtn.addEventListener("click", async (event) => {
            event.preventDefault();
            console.log(CssSelectorGenerator.getCssSelector(event.currentTarget));
            try {
                loader.innerHTML = "Rendering, please wait...";

                if (
                    successpage.value.indexOf("https://") != 0 &&
                    successpage.value.indexOf("http://") != 0
                ) {
                    successpage.value = "https://" + successpage.value;
                }

                const html = await (
                    await fetch(
                        /* `https://us-central1-adbirt-e0cd0.cloudfunctions.net/ssr?url=${encodeURIComponent(
                      successpage.value
                    )}&noCacheToken=${Math.random()}`, */
                        `http://localhost:5001/adbirt-e0cd0/us-central1/ssr?url=${
                encodeURIComponent(successpage.value)
              }&noCacheToken=${Math.random()}`, {
                            mode: "cors",
                        }
                    )
                ).text();
                console.log(encodeURIComponent(successpage.value))
                loader.innerHTML = "";

                const win = window.open(
                    "",
                    "Adbirt - Click on the element you want us to track",
                    "width=2000,height=2000,scrollbars=1,center=1"
                );

                win.alert("Wait for the page to load, then click on the element");

                win.document.querySelector("html").innerHTML = html;
                const script = win.document.createElement("script");
                win.document.body.appendChild(script);
                script.src = "./js/index.js";
                Array.from(win.document.getElementsByTagName("*")).forEach((el) => {
                    el.addEventListener("click", (event) => {
                        event.preventDefault();
                        const selectorStr = CssSelectorGenerator.getCssSelector(
                            event.target
                        );
                        console.log(selectorStr);
                        selectorInput.value = selectorStr.toString();

                        return win.close();
                    });
                });

                window.focus();
                window.document.body.style.cursor = "pointer !important";
            } catch (error) {
                console.error(error);
                loader.innerHTML = "";
                alert(`Network error, unable to fetch\n ${error.message}`);
            }
        });
    </script>


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
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

    <script type="text/javascript">
        CKEDITOR.replace('campaign_description');
        CKEDITOR.replace('campaign_policy');

        function readURL(input) { // quiz_avatar preview
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#view').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#banner_size").change(function(event) {
            $('#upld').val("");
        });

        @if (isset($campaignsData))
            var isbannerValid = true;
        @else
            var isbannerValid = false;
        @endif
        $("#upld").on("change", function() {
            var _URL = window.URL || window.webkitURL;
            event.preventDefault();
            var file = $(this)[0].files[0];
            var banner_size = $("#banner_size").val();
            if (banner_size != "") {
                readURL(this);
                var size = banner_size.split(' x ');
                img = new Image();
                var imgwidth = 0;
                var imgheight = 0;
                var maxwidth = size['0'];
                var maxheight = size['1'];

                img.src = _URL.createObjectURL(file);
                img.onload = function() {
                    imgwidth = this.width;
                    imgheight = this.height;
                    if (imgwidth == maxwidth && imgheight == maxheight) {
                        $("#response").text("");
                        isbannerValid = true;
                    } else {
                        $("#response").text("Image size must be " + maxwidth + "X" + maxheight);
                        isbannerValid = false;
                    }
                };
                img.onerror = function() {
                    $("#response").text("not a valid file: " + file.type);
                }
            } else {
                swal({
                        title: "Warning!",
                        text: "Select Banner Size First!",
                        type: "warning",
                        confirmButtonClass: 'btn-danger',
                        confirmButtonText: 'Ok',
                        closeOnConfirm: true,
                    },
                    function() {
                        $('#upld').val("");
                    });
            }
        });

        jQuery(document).ready(function() {
            $("#myform").validate({
                errorPlacement: function(error, element) {
                    return true;
                },
                rules: {
                    campaign_name: {
                        required: true,
                    },
                    campaign_title: {
                        required: true,
                    },
                    @if (!isset($campaignsData))
                        campaign_banner:{
                        required: true,
                        },
                    @endif
                    campaign_url: {
                        required: true,
                        url: true,
                    },
                    campaign_success_url: {
                        required: true,
                        url: true,
                    },
                    campaign_policy: {
                        required: function(textarea) {
                            CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                            var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                            return editorcontent.length === 0;
                        },
                    },
                    campaign_description: {
                        required: function(textarea) {
                            CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                            var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                            return editorcontent.length === 0;
                        },
                    },
                    advertiser_id: {
                        required: true,
                    },
                    campaign_category: {
                        required: true,
                    },
                    isbannerValid: {
                        required: true,
                    },
                    banner_size: {
                        required: true,
                    },
                    campaign_cost_per_action: {
                        required: true,
                        number: true,
                    },
                },
                submitHandler: function(form) {
                    //form.submit();
                    if (isbannerValid) {
                        $('#btn-submit').hide();
                        form.submit();
                    } else {
                        alert('selected banner not match with selected size, please try agian');
                    }
                }
            });
        });
    </script>
@stop
