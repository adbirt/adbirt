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

        input[aria-invalid="false"]+div {
            display: block;
        }

        input[aria-invalid="false"]+div {
            display: none;
        }

    </style>
    <style>
        .formLabel {
            font-size: 17px !important;
            font-weight: 400 !important;
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @if (isset($campaignsData))
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <li class="active">{!! $title = 'Update Ad' !!}</li>
                    @else
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <li class="active">{!! $title = 'Add new Ad' !!}</li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @endif
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </ol>-->

                @if (Session::has('flash_message'))
                    <div class="alert bg-info alert-styled-left">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                class="sr-only">Close</span></button>
                        <span class="text-semibold">
                            {!! session('flash_message') !!}
                    </div>
                @endif

                <a href="{{ url('/campaigns/view-campaigns') }}">
                    <button class="btn btn-primary waves-effect waves-light mb-2">View Ads</button>
                </a>
                <div class="card">
                    <form @if (isset($campaignsData)) action="{{ url('/campaigns/update') }}" @else action="{{ url('/campaigns/store') }}" @endif data-parsley-validate novalidate method="POST" id="myform" name="myform"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if (isset($campaignsData))
                            <input type="hidden" name="id" value="{{ $campaignsData->id }}">
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
                                            parsely-maxlength=150 maxlength=150 @if (isset($campaignsData) && !empty($campaignsData->campaign_name)) value="{{ $campaignsData->campaign_name }}" @endif>
                                        <div>
                                            <small>
                                                Maximum of 150 characters (including white-spaces) allowed
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-none">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Campaign Title</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="campaign_title" parsley-trigger="change" required
                                            placeholder="Campaign Title" class="form-control" id="campaign_title"
                                            @if (isset($campaignsData) && !empty($campaignsData->campaign_title)) value="{{ $campaignsData->campaign_title }}" @else value="" @endif>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel" for="campaign_type">Choose Campaign Type</label>
                                    </div>
                                    <div class="col-md-8">

                                        <select class="form-control" id="campaign_type" name="campaign_type">
                                            <?php
                                            $campaign_types = ['CPA', 'CPC', 'Native Content Ad'];
                                            ?>
                                            <option disabled @if (!isset($campaignsData)) selected="true" @endif>Choose Campaign Type</option>
                                            @foreach ($campaign_types as $type)
                                                <option value="{!! $type !!}" @if (!isset($campaignsData) && $campaignsData->campaign_type == $type) selected="true" @endif>
                                                    {!! $type !!}
                                                </option>
                                            @endforeach
                                        </select>
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
                                                <option disabled @if (!isset($campaignsData)) selected="true" @endif>Select Ads Category</option>
                                                @foreach ($categoryData as $value)
                                                    @if (isset($campaignsData) && $campaignsData->campaign_category == $value->id)
                                                        <option value="{{ $value->id }}" selected>
                                                            {{ ucfirst($value->category_name) }}</option>
                                                    @else
                                                        <option value="{{ $value->id }}">
                                                            {{ ucfirst($value->category_name) }}</option>
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
                                        <label class="formLabel">Campaign's Description</label>
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
                                    <div class="col-md-8"
                                        title="Landing page is the webpage where people end up after they click on your banner ad.">
                                        <input type="url" name="campaign_url" parsley-trigger="change" required
                                            placeholder="Ad Landing page URL" class="form-control" id="campaign_url"
                                            title="" @if (isset($campaignsData) && !empty($campaignsData->campaign_url)) value="{{ $campaignsData->campaign_url }}" @endif
                                            title="Landing page is the webpage where people end up after they click on your banner ad.">
                                        <small>Landing page is the webpage where people end up after they click on your
                                            banner ad.</small>
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
                                        <input type="url" parsley-trigger="change" required title=""
                                            @if (isset($campaignsData) && !empty($campaignsData->campaign_success_url)) value="{{ $campaignsData->campaign_success_url }}" @elseif (isset($campaignsData) && !empty($campaignsData->campaign_success_url)) value="{{ $campaignsData->campaign_url }}" @else value="" @endif placeholder="Ad Success page URL"
                                            class="form-control" id="campaign_success_url" name="campaign_success_url">
                                        <small>Success pages, or thank you pages, are pages on your website that users are
                                            directed to after completing a form successfully.</small>
                                        <br />
                                        <br />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="formLabel" for="banner_type">Select Banner Type</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select data-placeholder="Select an option" id="banner_type" name="banner_type"
                                                class="form-control">
                                                <option disabled @if (!isset($campaignsData)) selected="true" @endif>Select Banner Type</option>
                                                <?php
                                                $banner_types = ['image', 'video'];
                                                ?>
                                                @foreach ($banner_types as $type)
                                                    <option value="{!! $type !!}" @if (!isset($campaignsData) && $campaignsData->banner_type == $type) selected="true" @endif>
                                                        {!! ucfirst($type) !!}</option>
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="formLabel">Select Banner Size</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="banner_size" data-placeholder="Select an option"
                                                class="form-control" id="banner_size">
                                                <option disabled @if (!isset($campaignsData)) selected="true" @endif>Select Banner Size</option>
                                                @if (isset($bannerSize) && !empty($bannerSize))
                                                    @foreach ($bannerSize as $key => $value)
                                                        @if (isset($campaignsData) && $campaignsData->banner_size == $value)
                                                            <option value="{{ $value }}" selected>
                                                                {{ $value }}</option>
                                                        @else
                                                            <option value="{{ $value }}">{{ $value }}
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
                                            <label class="formLabel">Campaign's Banner</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="file" class="filestyle" name="campaign_banner" id="upld"
                                                data-buttontext="Choose Banner" data-buttonname="btn-white">
                                            <hr>
                                        </div>

                                        <div class="col-12">
                                            <center class="campaign-type-holder">
                                                {!! asset('uploads/campaign_banners/' . $campaignsData->campaign_banner) !!}
                                                <img style="max-width: 500px;"
                                                    class="w-100 image-banner {!! isset($campaignsData) && !empty($campaignsData->banner_type) && $campaignsData->banner_type == 'image' ? 'd-block' : 'd-none' !!} @if (!isset($campaignsData)) d-block @endif"
                                                    src="{{ isset($campaignsData) && !empty($campaignsData->campaign_banner) ? asset('uploads/campaign_banners/' . $campaignsData->campaign_banner) : asset('assets/photos/Placeholder.jpg') }}"
                                                    id="{!! isset($campaignsData) && !empty($campaignsData->campaign_banner) ? '' : 'view' !!}" class="img-responsive">
                                                <br />
                                                <video style="max-width: 450px;"
                                                    class="w-100 video-banner {!! isset($campaignsData) && !empty($campaignsData->banner_type) && $campaignsData->banner_type == 'video' ? 'd-block' : 'd-none' !!} @if (!isset($campaignsData)) d-none @endif"
                                                    controls loop autoplay
                                                    src="{{ isset($campaignsData) && !empty($campaignsData->campaign_banner) ? asset('uploads/campaign_banners/' . $campaignsData->campaign_banner) : asset('assets-revamp/video/Placeholder.mp4') }}"
                                                    id="{!! isset($campaignsData) && !empty($campaignsData->campaign_banner) ? '' : 'view' !!}" class="img-responsive"></video>
                                            </center>
                                            @if (isset($campaignsData) && !empty($campaignsData->campaign_banner))
                                                <input type="hidden" name="campaign_banner"
                                                    value="{{ $campaignsData->campaign_banner }}">
                                            @endif
                                        </div>
                                    </div>

                                    <span style="color:red;" id="response"></span>
                                    <!-- <span id="width"></span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <span id="height"></span> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Campaign's Cost Per Action ($)</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" min="0.20" name="campaign_cost_per_action"
                                            parsley-trigger="change" required placeholder="($) Campaign Cost Per Action"
                                            class="form-control" id="campaign_cost_per_action" title="Cost Per Action"
                                            data-parsley-error-message="Minimum amount is $0.2" @if (isset($campaignsData) && !empty($campaignsData->campaign_cost_per_action)) value="{{ $campaignsData->campaign_cost_per_action }}" @endif>
                                        <div>
                                            <small>
                                                Minimum amount is $0.2
                                            </small>
                                        </div>
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

                            {{-- <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="formLabel">Campaign's Policy</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="campaign_policy" parsley-trigger="change" required
                                            placeholder="Campaign's Policy" class="form-control" id="campaign_policy"
                                            title="">@if (isset($campaignsData) && !empty($campaignsData->campaign_policy)) {{ $campaignsData->campaign_policy }} @endif </textarea>
                                    </div>
                                </div>
                            </div> --}}

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

    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

    <script>
        @if (isset($campaignsData))
            window.campaignType = `{!! $campaignsData->campaign_type !!}`.trim();
            window.bannerType = `{!! $campaignsData->banner_type !!}`.trim();
        @else
            window.campaignType = "CPA";
            window.bannerType = "image";
        @endif
    </script>

    <script>
        (() => {

            const campaign_types = Object.freeze({
                CPA: 'CPA',
                CPC: 'CPC',
                NATIVE_CONTENT_AD: 'Native Content Ad',
            });

            const banner_types = Object.freeze({
                IMG: 'image',
                VID: 'video'
            });


            /**
             * @type {HTMLSelectElement}
             */
            const campaign_type_selector = document.querySelector('#campaign_type');
            /**
             * @type {HTMLInputElement}
             */
            const successPageinputField = document.querySelector("#campaign_success_url");
            /**
             * @type {HTMLDivElement}
             */
            const successPageInputContainer = document.querySelector("#myform > fieldset > div:nth-child(8) > div.row");
            /**
             * @type {HTMLDivElement}
             */
            const landingpageHint = document.querySelector(
                "#myform > fieldset > div:nth-child(7) > div > div.col-md-8 > small");
            /**
             * @type {HTMLSelectElement}
             */
            const bannerTypeInputField = document.querySelector('#banner_type');
            /**
             * @type {HTMLDivElement}
             */
            const bannerTypeInputFieldContainer = document.querySelector(
                "#myform > fieldset > div:nth-child(8) > div:nth-child(2) > div");
            /**
             * @type {HTMLSelectElement}
             */
            const bannerSizeInputField = document.querySelector("#banner_size");
            /**
             * @type {HTMLDivElement}
             */
            const bannerSizeInputFieldContainer = document.querySelector(
                "#myform > fieldset > div:nth-child(8) > div:nth-child(3) > div");
            const bannerSizeInputFieldV_defaultValue = String(bannerSizeInputField.value);
            /**
             * @type {HTMLImageElement}
             */
            const imageBanner = document.querySelector('.image-banner');
            /**
             * @type {HTMLVideoElement}
             */
            const videoBanner = document.querySelector('.video-banner');

            const setBannerType = (value) => {

                [imageBanner, videoBanner].forEach((banner) => {
                    banner.classList.contains('d-none') && banner.classList.remove('d-none');
                    banner.classList.contains('d-block') && banner.classList.remove('d-block');
                });
                bannerSizeInputFieldContainer.style.display = '';

                window.bannerType = value;

                if (value == banner_types.IMG) {
                    bannerSizeInputFieldContainer.style.display = '';
                    imageBanner.classList.add('d-block');
                    videoBanner.classList.add('d-none');
                    imageBanner.src = 'https://adbirt.com/public/assets/photos/Placeholder.jpg';

                } else if (value == banner_types.VID) {

                    bannerSizeInputFieldContainer.style.display = 'none';
                    bannerSizeInputField.value = '300 x 250';
                    imageBanner.classList.add('d-none');
                    videoBanner.classList.add('d-block');
                }
            }

            const setCampaignType = (value) => {

                successPageInputContainer.style.display = '';
                landingpageHint.style.display = '';
                bannerSizeInputFieldContainer.style.display = 'none';
                (bannerTypeInputField.getAttribute('disabled')) && bannerTypeInputField.removeAttribute(
                    'disabled');

                window.campaignType = value;

                if (value == campaign_types.CPA) {

                    (bannerSizeInputField.getAttribute('disabled')) && bannerSizeInputField.removeAttribute(
                        'disabled');
                    bannerSizeInputFieldContainer.style.display = '';

                } else if (value == campaign_types.CPC) {

                    successPageinputField.value = '';
                    (bannerTypeInputField.getAttribute('disabled')) && bannerTypeInputField.removeAttribute(
                        'disabled');
                    bannerSizeInputFieldContainer.style.display = '';
                    successPageInputContainer.style.display = 'none';
                    landingpageHint.style.display = 'none';

                } else if (value == campaign_types.NATIVE_CONTENT_AD) {

                    successPageinputField.value = '';
                    bannerSizeInputField.value = '300 x 250';
                    bannerSizeInputField.setAttribute('disabled', 'disabled');
                    bannerSizeInputFieldContainer.style.display = '';
                    bannerTypeInputField.value = banner_types.IMG;
                    bannerTypeInputField.setAttribute('disabled', 'disabled');
                    successPageInputContainer.style.display = 'none';
                    landingpageHint.style.display = 'none';

                }
            }

            setBannerType(window.bannerType);
            setCampaignType(window.campaignType);

            const bannerTypeChanged = (e) => {

                /**
                 * @type {typeof banner_types}
                 */
                const value = String(e.target.value);

                setBannerType(value);

            }

            const campaignTypeChanged = (e) => {

                /**
                 * @type {typeof campaign_types}
                 */
                const value = String(e.target.value);

                console.log('Event fired: ', value);

                setCampaignType(value);
            }

            campaign_type_selector.addEventListener('change', campaignTypeChanged);

            bannerTypeInputField.addEventListener('change', bannerTypeChanged);

        })();
    </script>

    <script>
        CKEDITOR.replace('campaign_description');
        {{-- CKEDITOR.replace('campaign_policy'); --}}

        function readURL(input, isVideo = false) { // quiz_avatar preview
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    const url = e.target.result;
                    {{-- console.log(url); --}}
                    const elem = document.querySelector('.campaign-type-holder > .d-block')
                    elem.src = url;

                    if (isVideo === true) {
                        const videoDuration = elem.duration;
                        if (videoDuration > 15.2) {
                            elem.src = '';
                            alert('Video duration should be less than or equal to 15 seconds');
                            return false;
                        }

                        if (input.files[0].size > (10 * 1024 * 1024)) {
                            elem.src = '';
                            alert('Video size should be less than 10 MB');
                            return false;
                        }
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#banner_size").change(function(event) {
            $('#upld').val("");
        });

        @if (isset($campaignsData))
            let isbannerValid = true;
        @else
            let isbannerValid = false;
        @endif
        $("#upld").on("change", function() {
            /**
             * @type {HTMLImageElement}
             */
            const imageBanner = document.querySelector('.image-banner');
            /**
             * @type {HTMLVideoElement}
             */
            const videoBanner = document.querySelector('.video-banner');
            const bannerType = (videoBanner.classList.contains('d-block') && imageBanner.classList.contains(
                'd-none')) ? 'video' : 'image';

            let _URL = window.URL || window.webkitURL;
            event.preventDefault();
            let file = this.files[0];

            if (bannerType == 'video') {
                isbannerValid = true;
                readURL(this, true);
            } else if (bannerType == 'image') {
                let banner_size = $("#banner_size").val();
                if (banner_size != "") {
                    readURL(this);
                    let size = banner_size.split(' x ');
                    img = new Image();
                    let imgwidth = 0;
                    let imgheight = 0;
                    let maxwidth = size['0'];
                    let maxheight = size['1'];

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
                        url: false,
                    },
                    campaign_policy: {
                        required: function(textarea) {
                            CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                            let editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                            return editorcontent.length === 0;
                        },
                    },
                    campaign_description: {
                        required: function(textarea) {
                            CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                            let editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
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
                        alert('selected banner does not match with selected size, please try agian');
                    }
                }
            });
        });
    </script>
@stop
