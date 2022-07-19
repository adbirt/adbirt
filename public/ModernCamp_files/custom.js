(function($) {

    "use strict";

    $('.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(500);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
    });

    //Submenu Dropdown Toggle
    if ($('.nav li.dropdown .dropdown-menu').length) {
        //Dropdown Button
        $('.nav li.dropdown .dropdown-menu.dropdown-2').on('click', function() {
            $(this).prev('ul').slideToggle(500);
        });

        //Disable dropdown parent link
        $('.nav li.dropdown .dropdown-menu.dropdown-2 > a').on('click', function(e) {
            e.preventDefault();
        });
    }



    //Submenu Dropdown Toggle
    if ($('.header-menu li.dropdown ul').length) {
        $('.header-menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');

        //Dropdown Button
        $('.header-menu li.dropdown .dropdown-btn').on('click', function() {
            $(this).prev('ul').slideToggle(500);
        });

        //Disable dropdown parent link
        $('.header-menu .navigation li.dropdown > a,.hidden-bar .side-menu li.dropdown > a').on('click', function(e) {
            e.preventDefault();
        });
    }

    /*
     * ----------------------------------------------------------------------------------------
     *  PRELOADER JS
     * ----------------------------------------------------------------------------------------
     */

    function handlePreloader() {
        if ($('.preloader').length) {
            $('.preloader').delay(200).fadeOut(500);
        }
    }

    var prealoaderOption = $(window);
    prealoaderOption.on("load", function() {
        var preloader = jQuery('.spinner');
        var preloaderArea = jQuery('.preloader-area');
        preloader.fadeOut();
        preloaderArea.delay(350).fadeOut('slow');
    });

    /* ==========================================================================
       When document is loading, do
       ========================================================================== */

    $(window).on('load', function() {
        handlePreloader();
    });


    /* ==========================================================================
       step 4
       ========================================================================== */

       $(document).on('click', '.fa-times', function(event) {
            $(this).parent().css({
                'display': 'none'
            });
        });


    /*  ==========================================
                TABS FUNCTIONALITY
        ========================================== */



    
    if ($('.accrodion-grp').length) {

        $('.accrodion-grp').each(function() {
            var accrodionName = $(this).data('grp-name');
            var Self = $(this);
            Self.addClass(accrodionName);
            Self.find('.accrodion .accrodion-content').hide();
            Self.find('.accrodion.current').find('.accrodion-content').show();
            Self.find('.accrodion').each(function() {
                $(this).find('.accrodion-title').on('click', function() {
                    if ($(this).parent().hasClass('current') === false) {
                        $('.accrodion-grp.' + accrodionName).find('.accrodion').removeClass('current');
                        $('.accrodion-grp.' + accrodionName).find('.accrodion').find('.accrodion-content').slideUp();
                        $(this).parent().addClass('current');
                        $(this).parent().find('.accrodion-content').slideDown();
                    };
                });
            });
        });

    };


    /* When document is loading, do */

    $("#crop").on("click", { id: "#imageContainer img" }, initCropperOnImage);

    function initCropperOnImage(event) {
        //get the id from event.data
        $(event.data.id).cropper({
            autoCrop: false,
            movable: false,
            viewMode: 3,
            crop: function(e) {
                // Output the result data for cropping image.
                console.log(e.x);
                console.log(e.y);
                console.log(e.width);
                console.log(e.height);
                console.log(e.rotate);
                console.log(e.scaleX);
                console.log(e.scaleY);

            },
            cropend: function(e) {
                if (bool == 0) {
                    $('#cropTimetable').toggle();
                    $('#clearCrop').toggle();
                    $('#downloadTimetable').toggle();
                    $('#downloadHDTimetable').toggle();
                    bool = 1;
                }
            }

        });
    }

    /* ==========================================================================
       right tabs functionality
       ========================================================================== */

    $('#OpenImgUpload').click(function() { $('#imgupload').trigger('click'); });
    $('#color').click(function() { $('#color_picker').trigger('click'); });

    //--popup
    function openPopup(el) { // get the class name in arguments here
        $.magnificPopup.open({
            items: {
                src: '#test-modal',
            },
            type: 'inline'
        });
    }

    $(function() {
        $('.ajax-call').click(function(e) {
            openPopup(this.className);
            $("#test-modal").css({
                'display': 'block'
            });
        });
        $(document).on('click', '.closePopup', function(e) {
            e.preventDefault();
            $.magnificPopup.close();
            $("#test-modal").css({
                'display': 'none'
            });
        });
    });

    $("#layout").on('click', function() {
        jQuery("body").addClass("boxed_size");
    });

    $(".brightness").on('click', function() {
        jQuery("#controls").addClass("range");
    });

    //--popup
    function openPopup(el) { // get the class name in arguments here
        $.magnificPopup.open({
            items: {
                src: '#font-modal',
            },
            type: 'inline'
        });
    }

    //--popup

    $(function() {
        $('.fonts').click(function(e) {
            openPopup(this.className);
            $("#font-modal").css({
                'display': 'block'
            });
        });
        $(document).on('click', '.closePopup', function(e) {
            e.preventDefault();
            $.magnificPopup.close();
            $("#font-modal").css({
                'display': 'none'
            });
        });
    });

    //--popup

    $(function() {
        $('.request_btn').click(function(e) {
            openPopup(this.className);
            $("#form").css({
                'display': 'block'
            });
        });
        $(document).on('click', '.closePopup', function(e) {
            e.preventDefault();
            $.magnificPopup.close();
            $("#form").css({
                'display': 'none'
            });
        });
    });
    
	
	//--select dropdown 1
	$('.dropdown-menu1 p').click(function(){
		$('#selected-post').text($(this).text());
	});
	
	//--select dropdown 2
	$('.dropdown-menu2 p').click(function(){
		$('#selected-campaign').text($(this).text());
	});
	
	//--select dropdown 3
	$('.dropdown-menu3 p').click(function(){
		$('#selected-range').text($(this).text());
	});
	
	//--select dropdown 4
	$('.dropdown-menu4 p').click(function(){
		$('#campaign_post').text($(this).text());
	});
	
	//--select dropdown 5
	$('.dropdown-menu5 p').click(function(){
		$('#filters_post').text($(this).text());
	});
	
	//--select dropdown 6
	$('.dropdown-menu6 p').click(function(){
		$('#column_post').text($(this).text());
	});
	
	//--select dropdown 7
	$('.dropdown-menu7 p').click(function(){
		$('#clicks_post').text($(this).text());
	});
	
	//--select dropdown 8
	$('.dropdown-menu8 p').click(function(){
		$('#cost_post').text($(this).text());
	});
	
	//--select dropdown 9
	$('.dropdown-menu9 p').click(function(){
		$('#days_post').text($(this).text());
	});
	
	//--select dropdown 10
	$('.dropdown-menu10 p').click(function(){
		$('#post-format').text($(this).text());
	});
	
	//--select dropdown 11
	$('.dropdown-menu11 p').click(function(){
		$('#post-checking').text($(this).text());
	});
	
	//--select dropdown 12
	$('.dropdown-menu12 p').click(function(){
		$('#post1').text($(this).text());
	});
	
	//--select dropdown 13
	$('.dropdown-menu13 p').click(function(){
		$('#post-clr1').text($(this).text());
	});
	
	//--select dropdown 14
	$('.dropdown-menu14 p').click(function(){
		$('#selected-range1').text($(this).text());
	});

	//--select dropdown 15
	$('.dropdown-menu15 p').click(function(){
		$('#img_125').text($(this).text());
	});
	
	//--select dropdown 16
	$('.dropdown-menu16 p').click(function(){
		$('#camp_123').text($(this).text());
	});
	
	//--select dropdown 17
	$('.dropdown-menu17 p').click(function(){
		$('#vkyl_125').text($(this).text());
	});
	
	//--select dropdown 18
	$('.dropdown-menu18 p').click(function(){
		$('#select_18').text($(this).text());
	});
	
	//--select dropdown 19
	$('.dropdown-menu19 p').click(function(){
		$('#select_19').text($(this).text());
	});
	
	//--select dropdown 20
	$('.dropdown-menu20 p').click(function(){
		$('#select_20').text($(this).text());
	});
	
	//--select dropdown 21
	$('.dropdown-menu21 p').click(function(){
		$('#select_21').text($(this).text());
	});
	
	//--select dropdown 22
	$('.dropdown-menu22 p').click(function(){
		$('#select_22').text($(this).text());
	});
	
	//--select dropdown 23
	$('.dropdown-menu23 p').click(function(){
		$('#select_23').text($(this).text());
	});
	
	//--select dropdown 24
	$('.dropdown-menu24 p').click(function(){
		$('#select_24').text($(this).text());
	});
	
})(window.jQuery);