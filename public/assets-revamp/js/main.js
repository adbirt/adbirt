/*
Author       : Adbirt
Template Name: Omnipotent - Multipurpose IT Website Template
Version      : 1.0
*/
(function ($) {
	"use strict";


	/*--------------------------------------------------------------
	   PRELOADER
	  --------------------------------------------------------------*/
	/*PRELOADER JS*/
	$(window).load(function () {
		$('.adbirt-status').fadeOut();
		$('.adbirt-preloader').delay(350).fadeOut('fast');
	});
	/*END PRELOADER JS*/



	$('#navbarSupportedContent > ul > li.nav-item.text-white > a').css({
		color: '#fff'
	});


	// Header Sticky
	const mobileMenuIcon = 'body > div.page-wrapper > div.navbar-area.adbirt-nav > div.adbirt-main-responsive-nav > div > div > div.mean-bar > a span';
	$(window).on('scroll', function () {
		if ($(this).scrollTop() > 76) {
			$('.navbar-area').addClass("adbirt-sticky-header");
			$('.adbirt-main-nav').css({
				backgroundColor: '#fff'
			});
			$('.adbirt-nav').css({
				background: '#fff'
			});
			$(mobileMenuIcon).css({
				background: '#000'
			});
			$('.adbirt-main-nav .navbar .navbar-nav .nav-item a:not([href="/dashboard"])').css({
				color: '#000'
			});
		}
		else {
			$('.navbar-area').removeClass("adbirt-sticky-header");
			// $('.adbirt-main-nav').css({
			// 	backgroundColor: 'transparent'
			// });
			// $('.adbirt-nav').css({
			// 	background: 'transparent'
			// });

			$('.adbirt-main-nav').css({
				backgroundColor: '#ecedef'
			});
			$('.adbirt-nav').css({
				background: '#ecedef'
			});

			$(mobileMenuIcon).css({
				background: '#fff'
			});
			$('.adbirt-main-nav .navbar .navbar-nav .nav-item a:not([href="/dashboard"])').css({
				color: '#fff'
			});
		}
	});
	// Mean Menu
	jQuery('.mean-menu').meanmenu({
		meanScreenWidth: "991"
	});
	/*--------------------------------------------------------------
	   Sticky Back To Top
	  --------------------------------------------------------------*/

	$(window).on('scroll', function () {
		if ($(window).scrollTop() > 50) {
			$('.adbirt-sticky-header').addClass('adbirt-nav');
			$('.adbirt-back-to-top').addClass('open');
		} else {
			$('.adbirt-sticky-header').removeClass('adbirt-nav');
			$('.adbirt-back-to-top').removeClass('open');
		}
	});

	/*--------------------------------------------------------------
	   Scroll UP
	  --------------------------------------------------------------*/

	if ($('.adbirt-back-to-top').length) {
		$(".adbirt-back-to-top").on('click', function () {
			var target = $(this).attr('data-targets');
			// animate
			$('html, body').animate({
				scrollTop: $(target).offset().top
			}, 500);

		});
	}


	/*--------------------------------------------------------------
	  Main slider
	  --------------------------------------------------------------*/
	/*-------------------------------------
	  OwlCarousel
  -------------------------------------*/
	$('.adbirt-carousel, .owl-carousel').each(function () {
		var owlCarousel = $(this),
			loop = owlCarousel.data('loop'),
			items = owlCarousel.data('items'),
			dotsEach = owlCarousel.data('doteach'),
			margin = owlCarousel.data('margin'),
			stagePadding = owlCarousel.data('stage-padding'),
			autoplay = owlCarousel.data('autoplay'),
			autoplayTimeout = owlCarousel.data('autoplay-timeout'),
			smartSpeed = owlCarousel.data('smart-speed'),
			dots = owlCarousel.data('dots'),
			nav = owlCarousel.data('nav'),
			navSpeed = owlCarousel.data('nav-speed'),
			xsDevice = owlCarousel.data('mobile-device'),
			xsDeviceNav = owlCarousel.data('mobile-device-nav'),
			xsDeviceDots = owlCarousel.data('mobile-device-dots'),
			smDevice = owlCarousel.data('ipad-device'),
			smDeviceNav = owlCarousel.data('ipad-device-nav'),
			smDeviceDots = owlCarousel.data('ipad-device-dots'),
			smDevice2 = owlCarousel.data('ipad-device2'),
			smDeviceNav2 = owlCarousel.data('ipad-device-nav2'),
			smDeviceDots2 = owlCarousel.data('ipad-device-dots2'),
			mdDevice = owlCarousel.data('md-device'),
			lgDevice = owlCarousel.data('lg-device'),
			centerMode = owlCarousel.data('center-mode'),
			HoverPause = owlCarousel.data('hoverpause'),
			mdDeviceNav = owlCarousel.data('md-device-nav'),
			mdDeviceDots = owlCarousel.data('md-device-dots');

		owlCarousel.owlCarousel({
			loop: (loop ? true : false),
			dotsEach: (dotsEach ? true : false),
			items: (items ? items : 4),
			lazyLoad: true,
			center: (centerMode ? true : false),
			autoplayHoverPause: (HoverPause ? true : false),
			margin: (margin ? margin : 0),
			//stagePadding: (stagePadding ? stagePadding : 0),
			autoplay: (autoplay ? true : false),
			autoplayTimeout: (autoplayTimeout ? autoplayTimeout : 1000),
			smartSpeed: (smartSpeed ? smartSpeed : 250),
			dots: (dots ? true : false),
			nav: (nav ? true : false),
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			navSpeed: (navSpeed ? true : false),
			responsiveClass: true,
			responsive: {
				0: {
					items: (xsDevice ? xsDevice : 1),
					nav: (xsDeviceNav ? true : false),
					dots: (xsDeviceDots ? true : false),
					center: false,
				},
				576: {
					items: (smDevice2 ? smDevice2 : 2),
					nav: (smDeviceNav2 ? true : false),
					dots: (smDeviceDots2 ? true : false),
					center: false,
				},
				768: {
					items: (smDevice ? smDevice : 3),
					nav: (smDeviceNav ? true : false),
					dots: (smDeviceDots ? true : false),
					center: false,
				},
				992: {
					items: (mdDevice ? mdDevice : 4),
					nav: (mdDeviceNav ? true : false),
					dots: (mdDeviceDots ? true : false),
				},
				1200: {
					items: (lgDevice ? lgDevice : 4),
				}
			}
		});
	});

	// nivo Slider Custom jQuery
	var nivo_slider = $('#nivoSlider');
	if (nivo_slider.length) {
		$('#nivoSlider').nivoSlider({
			effect: 'random',
			slices: 15,
			boxCols: 8,
			boxRows: 4,
			animSpeed: 600,
			pauseTime: 5000000000,
			startSlide: 0,
			directionNav: true,
			controlNavThumbs: false,
			pauseOnHover: true,
			manualAdvance: false
		});
	}


	/*--------------------------------------------------------------
	  START SERVICE SLIDER
	  --------------------------------------------------------------*/
	$("#adbirt-home-active, #adbirt-home-active-2, .is-owl-carousel, .owl-carousel").owlCarousel({
		margin: 3,
		nav: false,
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		smartSpeed: 450,
		autoplay: true,
		autoplayTimeout: 6000,
		loop: true,
		dots: true,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 2
			},
			1000: {
				items: 3
			}
		}
	});



	/*--------------------------------------------------------------
		ODOMETER JS
	  --------------------------------------------------------------*/

	$('.odometer').appear(function () {
		var odo = $(".odometer");
		odo.each(function () {
			var countNumber = $(this).attr("data-count");
			$(this).html(countNumber);
		});
	});




	/*--------------------------------------------------------------
		TESTIMONIAL SLIDER
	  --------------------------------------------------------------*/

	$('#testimonial-slider').owlCarousel({
		margin: 10,
		autoplay: true,
		autoplayTimeout: 4000,
		nav: false,
		smartSpeed: 1000,
		dots: true,
		autoplayHoverPause: true,
		loop: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
	});

	/*END Testimonials LOGO*/

	/*--------------------------------------------------------------
		NEWS SLIDER
	  --------------------------------------------------------------*/
	$('#blog-slider').owlCarousel({
		margin: 5,
		autoplay: false,
		autoplayTimeout: 4000,
		nav: false,
		smartSpeed: 1000,
		dots: true,
		autoplayHoverPause: true,
		loop: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 2
			},
			1000: {
				items: 3
			}
		}
	});

	/*END NEWS SLIDER */

	/*--------------------------------------------------------------*/
	/*--------------------------------------------------------------
		MAILCHAMP
	  --------------------------------------------------------------*/

	$('#mc-form').ajaxChimp({
		url: 'https://gmail.us10.list-manage.com/subscribe/post?u=c9af266402a277062d0d7cee0&amp;id=1211fda42f'
		/* Replace Your AjaxChimp Subscription Link */
	});

	/*--------------------------------------------------------------
		Porfolio isotope
	  --------------------------------------------------------------*/

	// image loaded portfolio init

	$('.adbirt-portfolio-grid').imagesLoaded(function () {
		$('.portfolio-filter').on('click', 'button', function () {
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({
				filter: filterValue
			});
		});
		var $grid = $('.adbirt-portfolio-grid').isotope({
			itemSelector: '.grid-item',
			percentPosition: true,
			masonry: {
				columnWidth: '.grid-item',
			}
		});
	});

	// portfolio Filter
	$('.portfolio-filter button').on('click', function (event) {
		$(this).siblings('.active').removeClass('active');
		$(this).addClass('active');
		event.preventDefault();
	});

	//**===================END Porfolio isotope ===================**//	

	//**===================Magnific Popup ===================**//

	$('.image-popup').magnificPopup({
		type: 'image',
		callbacks: {
			beforeOpen: function () {
				this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure animated jackInTheBox');
			}
		},
		gallery: {
			enabled: true
		}
	});
	//**===================END Magnific Popup ===================**//

	//  POPUP VIDEO
	$('.popup-video').magnificPopup({
		type: 'iframe',
	});

	/*--------------------------------------------------------------
		WOW SCROLL SPY
	  --------------------------------------------------------------*/

	/*START PARTNER LOGO*/
	$('.adbirt-brand-active').owlCarousel({
		margin: 10,
		autoplay: true,
		items: 3,
		loop: true,
		nav: false,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
			},
			1000: {
				items: 5
			}
		}
	})
	/*END PARTNER LOGO*/

	/*--------------------------------------------------------------
	MOUSE HOVER TILE EFFECT JS
	--------------------------------------------------------------*/

	$(".card-s").tilt({
		maxTilt: -20,
		perspective: 2400,
		speed: 2200,
		easing: "cubic-bezier(.03,.98,.52,.99)",
		scale: 1,

	});
	/*--------------------------------------------------------------
   START PARALLAX JS
 --------------------------------------------------------------*/
	(function () {

		if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {

		} else {
			$(window).stellar({
				horizontalScrolling: false,
				responsive: true
			});
		}

	}());

	/*--------------------------------------------------------------
		END PARALLAX JS
	  --------------------------------------------------------------*/

	var wow = new WOW({
		//disabled for mobile
		mobile: false
	});

	wow.init();



})(jQuery);

