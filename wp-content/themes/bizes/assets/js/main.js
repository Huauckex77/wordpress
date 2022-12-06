/*
	Template  Name: BIZES;
	Template URI: www.themereps.com
	Description: This is a Business and Agency HTML Template;
	Author: Masud Rana
	Author URI: www.themereps.com
	Version: 1.0  
*/
/*================================================
[  Table of contents  ]
================================================
	01. Animation
	02. Welcome Slide
	03. Isotope Filter
	04. Masonary Active
	05. Sticky Header
	06. Testimonial Carousel
	07. Team Carousel
	08. Portfolio Carousel
	09. Blog Carousel
	10. Brands Carousel
	11. CounterUp
	12. SideNav
	13. Venobox Active
	15. Button Effects
	14. Stellar
	16. Preloader
	17. ScrollUp
======================================
[ End table content ]
======================================*/

(function ($) {
 "use strict";	

 	/* ==== 01. Animation ==== */
	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {
			if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {
				i++;
				$(this.element).addClass('item-animate');
				setTimeout(function(){
					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated-fast');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated-fast');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated-fast');
							} else {
								el.addClass('fadeInUp animated-fast');
							}
							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});
				}, 100);
			}
		} , { offset: '85%' } );
	};
	$(function(){
		contentWayPoint();
	});

	/* ==== 02. Welcome Slide ==== */
    $('.welcome-slides').owlCarousel({
		autoplay:bizes_option.slider_autoplay,
		autoplayTimeout: bizes_option.slider_duration,
		items:1,
        loop:bizes_option.slider_loop,
		autoplayHoverPause: false,
		smartSpeed: 500,
        margin:0,
		nav:bizes_option.slider_nav,
		navText:['<span class="slidenav left"><i></i><i></i></span>','<span class="slidenav right"><i></i><i></i></span>'],
		dots:bizes_option.slider_dots,
		dotsContainer:false,
    }) 
	
	/* ==== 03. Isotope Filter ==== */
    $('.portfolio-wrap').imagesLoaded(function() {
        $('.filter-menu').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });
        var $grid = $('.portfolio-wrap').isotope({
            itemSelector: '.portfolio-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.portfolio-item',
            }
        });
    });
    $('.filter-menu button').on('click', function(event) {
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();
    });

	/* ==== 04. Masonary Active ====  */				
	$('.grid-wrap').imagesLoaded( function() {	   
		$('.grid-wrap').masonry({ singleMode: true });	
	});	

	/* ==== 05. Sticky Header ==== */
	$(window).on('scroll',function() {
	  if ($(this).scrollTop() > 1){  
		$('.header-area.primary-header').addClass("scroll-header");
	    }
	  else{
		$('.header-area.primary-header').removeClass("scroll-header");
	    }
	}); 
	
	/* ==== 06. Testimonial Carousel ==== */
    $('.review-carousel').owlCarousel({
        autoplay:bizes_option.feedback_autoplay,
		autoplayTimeout:bizes_option.feedback_duration,
        items:3,
        loop:bizes_option.feedback_loop,
        autoplayHoverPause: false,
        smartSpeed: 500,
        margin:0,
        nav:bizes_option.feedback_nav,
		navText:['<i class="icofont-thin-left"></i>','<i class="icofont-thin-right"></i>'],
        dots:bizes_option.feedback_dots,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            768:{
                items:2,
            },
            1000:{
                items:3,
            }
        }
    }) 
	
	/* ==== 07. Team Carousel ==== */
    $('.team-carousel').owlCarousel({
		autoplay:bizes_option.team_autoplay,
		items:3,
        loop:bizes_option.team_loop,
		autoplayHoverPause: false,
		autoplayTimeout: bizes_option.team_duration,
		smartSpeed: 500,
        margin:0,
		nav:bizes_option.team_nav,
		dots:bizes_option.team_dots,
		responsiveClass:true,
		navText:['<i class="icofont-thin-left"></i>','<i class="icofont-thin-right"></i>'],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            768:{
                items:2,
            },
            1000:{
                items:3,
            }
        }
    }) 

	/* ==== 08. Portfolio Carousel ==== */
	$('.portfolio-carousel').owlCarousel({
		center: true,
		items:2,
		loop:true,
		margin:5,
		responsive:{
			600:{
				items:4,
				margin:30,
			}
		}
	});

	/* ==== 09. Blog Carousel ==== */
    $('.news-carousel').owlCarousel({
        autoplay:bizes_option.news_autoplay,
		autoplayTimeout: bizes_option.news_duration,
        items:3,
        loop:bizes_option.news_loop,
        autoplayHoverPause: false,
        smartSpeed: 500,
        margin:10,
        nav:bizes_option.news_nav,
		navText:['<i class="icofont-thin-left"></i>','<i class="icofont-thin-right"></i>'],
        dots:bizes_option.news_dots,
		autoHeight: true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:1,
            },
            768:{
                items:2,
            },
            1000:{
                items:3,
            }
        },
    }) 

	/* ==== 10. Brands Carousel ==== */
    $('.brands-carousel').owlCarousel({
        autoplay:bizes_option.brands_autoplay,
		autoplayTimeout:bizes_option.brands_duration,
        loop:bizes_option.brands_loop,
        autoplayHoverPause: false,
        smartSpeed: 500,
        nav:bizes_option.brands_nav,
		navText:['<i class="icofont-thin-left"></i>','<i class="icofont-thin-right"></i>'],
        dots:bizes_option.brands_dots,
		margin:30,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
            },
			460:{
                items:2,
            },
            600:{
                items:3,
            },
            768:{
                items:4,
            },
            1000:{
                items:5,
            }
        }
    })

	/* ==== 11. CounterUp ==== */	
	$('.counter').counterUp({
		delay: 10,
		time: 2000
	});

   /* ==== 12. SideNav ==== */
	jQuery('body').removeClass('show-menu');
	jQuery('.nav-icon, .close-menu, .close-again').click(function(e) {
		if (jQuery('body').hasClass('show-menu')) {
			jQuery('body').removeClass('show-menu');
		}
		else {
			jQuery('body').addClass('show-menu');
		}
	});
	// close when click off of container
	jQuery(document).on('click touchstart', function (e){
		if (!jQuery(e.target).is('.nav-icon, .nav-icon *, .sidenav-wrap,.sidenav-wrap *')) {
			jQuery('body').removeClass('show-menu');
		}
	});

	jQuery('.sidenav').find( '.menu-item-has-children > a' ).after( '<a class="menu-expand" href="javascript:void(0)">+</a>' );
	jQuery('.sidenav').find( '.page_item_has_children > a' ).after( '<a class="menu-expand" href="javascript:void(0)">+</a>' );
	
	jQuery('.menu-expand').on("click",function(e){
		e.preventDefault();
		if (jQuery(this).hasClass("menu-clicked")) {
				jQuery(this).text('+');
				jQuery(this).next('ul.sub-menu').slideUp(300, function(){});
		} else {
				jQuery(this).text('-');
				jQuery(this).next('ul.sub-menu').slideDown(300, function(){});
		}
		jQuery(this).toggleClass("menu-clicked");
	});
	jQuery('ul.two-column,ul.three-column').parent().addClass('pos-relative');


	$(document).on('keydown', '.sidenav-wrap :tabbable:not([readonly])', function(e) {

		// Tab key only (code 9)
		if (e.keyCode != 9)
		  return;

		// Get the loop element
		var loop = $(this).closest('.sidenav-wrap');

		// Get the first and last tabbable element
		var firstTabbable = loop.find(':tabbable:not([readonly])').first();
		var lastTabbable = loop.find(':tabbable:not([readonly])').last();

		// Leaving the first element with Tab : focus the last one
		if (firstTabbable.is(e.target) && e.shiftKey == true) {
		  e.preventDefault();
		  lastTabbable.focus();
		}

		// Leaving the last element with Tab : focus the first one
		if (lastTabbable.is(e.target) && e.shiftKey == false) {
		  e.preventDefault();
		  firstTabbable.focus();
		}
	});


	/* ==== 13. Venobox Active ==== */	
	$('.venobox').venobox({
		bgcolor: '#000000',
		overlayColor: 'rgba(255,255,255,0.85)',
		spinner: 'grid',
		spinColor: '#1da1f2',
	});

	/* ==== 14. Stellar ==== */	
	$.stellar({
		horizontalScrolling:false,
		hideDistantElements: false,
		verticalOffset: 0,
		horizontalOffset: 0		
	});	

	/* ==== 15. Button Effects ==== */	
	$( ".btn-bizes.effect-2" ).mouseenter(function(e) {
	   var parentOffset = $(this).offset(); 
	   var relX = e.pageX - parentOffset.left;
	   var relY = e.pageY - parentOffset.top;
	   $(this).prev(".btn-circle").css({"left": relX, "top": relY });
	   $(this).prev(".btn-circle").removeClass("desplode-circle");
	   $(this).prev(".btn-circle").addClass("explode-circle");
	});
	$( ".btn-bizes.effect-2" ).mouseleave(function(e) {
		 var parentOffset = $(this).offset(); 
		 var relX = e.pageX - parentOffset.left;
		 var relY = e.pageY - parentOffset.top;
		 $(this).prev(".btn-circle").css({"left": relX, "top": relY });
		 $(this).prev(".btn-circle").removeClass("explode-circle");
		 $(this).prev(".btn-circle").addClass("desplode-circle");
	});

	/* ==== 16. Preloader ==== */
	$(window).on('load',function(){
		jQuery(".preloader-wrap").fadeOut(500);
	});

	/* ==== 17. ScrollUp ==== */
	var $scroll_obj = $( '#scrollup' );
	$(window).on('scroll',function(){
		if ( $( this ).scrollTop() > 500 ) {
		  $scroll_obj.addClass('active');
		} else {
		  $scroll_obj.removeClass('active');
		}
	});
	$scroll_obj.on('click', function(){
		$( 'html, body' ).animate( { scrollTop: 0 }, 600 );
		return false;
	});

	jQuery(document).ready(function ($) {
		//accessibility
		$('.menu li a, .menu li').on('focus', function() {
			$(this).parents('li').addClass('focus');
		}).blur(function() {
			$(this).parents('li').removeClass('focus');
		});
	});


})(jQuery); 