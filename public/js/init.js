/*
 * Copyright (c) 2017 ThemeMarket
 * Author: ThemeMarket
 * This file is made for CURRENT TEMPLATE
*/

jQuery(document).ready(function(){

	"use strict";
	
	// here all ready functions
	
	//var H = jQuery( window ).height();
	//var W = jQuery( window ).width();
	
	bitmarket_tm_hamburger();
	bitmarket_tm_imgtosvg();
	bitmarket_tm_flexslider();
	bitmarket_tm_about_image();
	bitmarket_tm_magnific_popup();
	bitmarket_tm_jarallax();
	bitmarket_tm_owl_carousel();
	bitmarket_tm_portfolio();
	bitmarket_tm_totop();
	bitmarket_tm_totop_myhide();
	bitmarket_tm_nav_bg_scroll();
	bitmarket_tm_anchor();
	bitmarket_tm_waypoint();
	bitmarket_tm_contact_form();
	bitmarket_tm_magnific_popup();
	bitmarket_tm_widget();
	bitmarket_tm_miniboxes();
	
	
	jQuery(window).on('scroll',function(){
		//e.preventDefault();
		bitmarket_tm_totop_myhide();
		bitmarket_tm_nav_bg_scroll();
		
	});
	
	jQuery(window).on('resize',function(){
		 bitmarket_tm_about_image();
		 bitmarket_tm_miniboxes();
	});
	
	jQuery(window).load('body', function() {
		jQuery('.bitmarket_tm_preloader').addClass('remove');
	});
	
	
});

// -----------------------------------------------------
// --------------------  FUNCTIONS  --------------------
// -----------------------------------------------------

// -----------------------------------------------------
// ---------------    IMAGE TO SVG    ------------------
// -----------------------------------------------------

function bitmarket_tm_imgtosvg(){
	
	"use strict";
	
	jQuery('img.svg').each(function(){
		
		var jQueryimg 		= jQuery(this);
		var imgClass		= jQueryimg.attr('class');
		var imgURL			= jQueryimg.attr('src');

		jQuery.get(imgURL, function(data) {
			// Get the SVG tag, ignore the rest
			var jQuerysvg = jQuery(data).find('svg');

			// Add replaced image's classes to the new SVG
			if(typeof imgClass !== 'undefined') {
				jQuerysvg = jQuerysvg.attr('class', imgClass+' replaced-svg');
			}

			// Remove any invalid XML tags as per http://validator.w3.org
			jQuerysvg = jQuerysvg.removeAttr('xmlns:a');

			// Replace image with new SVG
			jQueryimg.replaceWith(jQuerysvg);

		}, 'xml');

	});
}

// -----------------------------------------------------
// ---------------  HAMBURGER  -------------------------
// -----------------------------------------------------

function bitmarket_tm_hamburger(){
	
	"use strict";
	
	var hamburger 		= jQuery('.hamburger');
	var mobileMenu		= jQuery('.bitmarket_tm_mobile_menu_wrap');
	
	hamburger.on('click',function(){
		var element 	= jQuery(this);
		
		if(element.hasClass('is-active')){
			element.removeClass('is-active');
			mobileMenu.slideUp();
		}else{
			element.addClass('is-active');
			mobileMenu.slideDown();
		}
		return false;
	});
}

// -----------------------------------------------------
// --------------     MAIN FLEXSLIDER     --------------
// -----------------------------------------------------

function bitmarket_tm_flexslider(){
	
	"use strict";
	
	var flexslider 			= jQuery('.bitmarket_tm_universal_box_wrap .flexslider');
	
	flexslider.flexslider({
		animation: "fade",
		controlNav: false,
		directionNav: true,
		slideshowSpeed: 5000,
		pauseOnAction: true,
		after: function(slider){
			if(!slider.playing){
				slider.play();
			}
		}
	});
}

// -----------------------------------------------------
// -------------------    COUNTER    -------------------
// -----------------------------------------------------

jQuery('.bitmarket_tm_counter').each(function() {

	"use strict";

	var el		= jQuery(this);
	el.waypoint({
		handler: function(){

			if(!el.hasClass('stop')){
				el.addClass('stop').countTo({
					refreshInterval: 50,
					formatter: function (value, options) {
						return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
					},	
				});
			}
		},offset:'80%'	
	});
});

// -----------------------------------------------------
// -----------------    ACCORDION    -------------------
// -----------------------------------------------------

jQuery(".bitmarket_tm_accordion").friendslab_accordion({
	showIcon: false, //boolean	
	animation: true, //boolean
	closeAble: true, //boolean
	slideSpeed: 500 //integer, miliseconds
});
	
// -----------------------------------------------------
// -----------------    ABOUT PAGE    ------------------
// -----------------------------------------------------

function bitmarket_tm_about_image(){
	
	"use strict";
	
	var maxHeight = Math.max.apply(null, jQuery(".bitmarket_tm_accordion .acc_content").map(function (){
    	return jQuery(this).outerHeight();
	}).get());
	var boxH	= jQuery('.bitmarket_tm_about_wrap .right_box .inner').outerHeight();
	var extraH	= jQuery('.bitmarket_tm_accordion .accordion_in.acc_active .acc_content').outerHeight();
	var aaaaaa	= boxH-extraH+maxHeight;
	var leftBox = jQuery('.bitmarket_tm_about_wrap .left_box, .bitmarket_tm_about_wrap');
	leftBox.css({minHeight: aaaaaa});
}

// -----------------------------------------------------
// --------------    MAGNIFIC POPUP    -----------------
// -----------------------------------------------------

function bitmarket_tm_magnific_popup(){
	
	"use strict";
	
	jQuery('.open-popup-link').magnificPopup({
		type:'inline',
		midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
	});
	
	jQuery('.gallery').each(function() { // the containers for all your galleries
		jQuery(this).magnificPopup({
			delegate: 'a', // the selector for gallery item
			type: 'image',
			gallery: {
			  enabled:true
			}
		});
	});
	jQuery('.gallery_zoom').each(function() { // the containers for all your galleries
		jQuery(this).magnificPopup({
			delegate: 'a.zoom', // the selector for gallery item
			type: 'image',
			gallery: {
			  enabled:true
			},
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});
		
	});
	jQuery('.popup-youtube').each(function() { // the containers for all your galleries
		jQuery(this).magnificPopup({
			//type: 'iframe',
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
		});
	});
}

// -----------------------------------------------------
// -----------------    PROGRESS BAR    ----------------
// -----------------------------------------------------

function tdProgress(container){

	"use strict";

	container.find('.bitmarket_progress').each(function(i) {
		var progress 		= jQuery(this);
		var pValue 			= parseInt(progress.data('value'), 10);
		var pColor			= progress.data('color');
		var pBarWrap 		= progress.find('.bitmarket_bar_wrap');
		var pBar 			= progress.find('.bitmarket_bar');
		pBar.css({width:pValue+'%', backgroundColor:pColor});
		setTimeout(function(){pBarWrap.addClass('open');},(i*500));
	});
}
jQuery('.bitmarket_progress_wrap').each(function() {
	"use strict";
	var pWrap 			= jQuery(this);
	pWrap.waypoint({handler: function(){tdProgress(pWrap);},offset:'90%'});	
});

// -----------------------------------------------------
// --------------------    JARALLAX    -----------------
// -----------------------------------------------------

function bitmarket_tm_jarallax(){
	
	"use strict";
	
	jQuery('.jarallax').each(function(){
		var element			= jQuery(this);
		var	customSpeed		= element.data('speed');
		
		if(customSpeed !== "undefined" && customSpeed !== ""){
			customSpeed = customSpeed;
		}else{
			customSpeed 	= 0.5;
		}
		
		element.jarallax({
			speed: customSpeed
		});
	});
}

// -----------------------------------------------------
// --------------------    OWL CAROUSEL    -------------
// -----------------------------------------------------

function bitmarket_tm_owl_carousel(){
	
	"use strict";
	
	var carusel2			= jQuery('.bitmarket_tm_testimonial_wrap .owl-carousel');
  	carusel2.owlCarousel({
		loop:true,
		margin:0,
		autoplay:5000,
		autoWidth: false,
		nav: false,
		items:1,
		animateOut: 'zoomOut',
		animateIn: 'zoomIn',
		smartSpeed:450
	});
	
	var carusel3			= jQuery('.bitmarket_tm_team_wrap .owl-carousel');
  	carusel3.owlCarousel({
		loop:true,
		margin:30,
		autoplay:5000,
		autoWidth: false,
		nav: false,
		items:3,
		responsive:{
			0:{items:1},
			480:{items:2},
			768:{items:2},
			1024:{items:3}
		}
	});
	var carusel4			= jQuery('.bitmarket_tm_partners_wrap .owl-carousel');
  	carusel4.owlCarousel({
		
		loop:true,
			items: 4,
			lazyLoad: true,
			margin: 10,
			autoplay: true,
			autoplayTimeout: 5050,
			smartSpeed: 5000,
			dots: false,
			nav: false,
			navSpeed: true,
			responsive:{
			0:{items:1},
			480:{items:2},
			768:{items:3},
			1024:{items:4}
		}
		
	});
	
}

// -------------------------------------------------
// -----------------    PORTFOLIO    ---------------
// -------------------------------------------------

// filterable 
function bitmarket_tm_portfolio(){

	"use strict";

	if(jQuery().isotope) {

		// Needed variables
		var list 		 = jQuery('.bitmarket_tm_portfolio_list');
		var filter		 = jQuery('.bitmarket_tm_portfolio_filter');

		if(filter.length){
			// Isotope Filter 
			filter.find('a').on('click', function(){
				var selector = jQuery(this).attr('data-filter');
				list.isotope({ 
					filter				: selector,
					animationOptions	: {
						duration			: 750,
						easing				: 'linear',
						queue				: false
					}
				});
				return false;
			});	

			// Change active element class
			filter.find('a').on('click', function() {
				filter.find('a').removeClass('current');
				jQuery(this).addClass('current');
				return false;
			});	
		}
	}
}

// -----------------------------------------------------
// --------------------    TOTOP    --------------------
// -----------------------------------------------------

function bitmarket_tm_totop(){
	
	"use strict";
	
	jQuery(".bitmarket_tm_totop").on('click', function(e) {
		e.preventDefault();		
		jQuery("html, body").animate({ scrollTop: 0 }, 'slow');
		return false;
	});
}
function bitmarket_tm_totop_myhide(){
	
	"use strict";
	
	var toTop		=jQuery(".bitmarket_tm_totop");
	if(toTop.length){
		var topOffSet 	=toTop.offset().top;
		
		if(topOffSet > 1000){
			toTop.addClass('opened');	
		}else{
			toTop.removeClass('opened');
		}
	}
}

// -----------------------------------------------------
// ------------    NAV BACKGROUND  SCROLL    -----------
// -----------------------------------------------------

function bitmarket_tm_nav_bg_scroll(){
	
	"use strict";
	
	var header 			= jQuery('.bitmarket_tm_header');
	var windowScroll	= jQuery(window).scrollTop();
	var W				= jQuery(window).width();
	
	if(W>1040){
		jQuery(window).scroll(function(){
            if(windowScroll >= '100'){
                header.addClass('scroll');
            }
            else{
                header.removeClass('scroll');  
            }
        });
	} 
}

// -----------------------------------------------------
// ------------    ANCHOR NAVIGATION    ----------------
// -----------------------------------------------------

function bitmarket_tm_anchor(){
	
	"use strict";
	
	jQuery('.anchor_nav').onePageNav();
	
	var scrollOffset = 0;
	
	jQuery(".anchor > a").on('click', function(evn){
		evn.preventDefault();
		jQuery('html,body').scrollTo(this.hash, this.hash, {
			gap: { y: -scrollOffset-150 },
			animation:{
				duration: 1500,
				easing: "easeInOutExpo"
			}
		});
		return false;	
	});
}

// -----------------------------------------------------
// ----------------     WAYPOINT     -------------------
// -----------------------------------------------------

function bitmarket_tm_waypoint(){
	
	"use strict";
	
	//var shortB			= jQuery('.bitmarket_section');
	//var child			= shortB.find('li');
	
	var listItem 		= jQuery('.bitmarket_tm_attachment_consult_wrap ul.total');
	
	listItem.each(function(){

		var Item		= jQuery(this);
		var ItemLi		= Item.find('li');
		
		ItemLi.each(function(index){
			var www		= jQuery(this);
			www.waypoint({
			handler: function(){
				setTimeout(function(){
					www.addClass('animated');
					www.addClass('slideInUp');
					www.removeClass('hideforanimation');
				},index*100);
			},
			offset: '80%'
		});
		});
	});
}

// -----------------------------------------------------
// ----------------    CONTACT FORM    -----------------
// -----------------------------------------------------

function bitmarket_tm_contact_form(){
	
	"use strict";
	
	jQuery(".contact_form #send_message").on('click', function(){
		
		var name 		= jQuery(".contact_form #name").val();
		var email 		= jQuery(".contact_form #email").val();
		var message 	= jQuery(".contact_form #message").val();
		var subject 	= jQuery(".contact_form #subject").val();
		var success     = jQuery(".contact_form .returnmessage").data('success');
	
		jQuery(".contact_form .returnmessage").empty(); //To empty previous error/success message.
		//checking for blank fields	
		if(name===''||email===''||message===''){
			
			jQuery('div.empty_notice').slideDown(500).delay(2000).slideUp(500);
		}
		else{
			// Returns successful data submission message when the entered information is stored in database.
			jQuery.post("modal/contact.php",{ ajax_name: name, ajax_email: email, ajax_message:message, ajax_subject: subject}, function(data) {
				
				jQuery(".contact_form .returnmessage").append(data);//Append returned message to message paragraph
				
				
				if(jQuery(".contact_form .returnmessage span.contact_error").length){
					jQuery(".contact_form .returnmessage").slideDown(500).delay(2000).slideUp(500);		
				}else{
					jQuery(".contact_form .returnmessage").append("<span class='contact_success'>"+ success +"</span>");
					jQuery(".contact_form .returnmessage").slideDown(500).delay(4000).slideUp(500);
				}
				
				if(data===""){
					jQuery("#contact_form")[0].reset();//To reset form fields on success
				}
				
			});
		}
		return false; 
	});
}

// -----------------------------------------------------
// --------------    MAGNIFIC POPUP    -----------------
// -----------------------------------------------------

function bitmarket_tm_magnific_popup(){
	
	"use strict";
	
	jQuery('.open-popup-link').magnificPopup({
		type:'inline',
		midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
	});
	
	jQuery('.gallery').each(function() { // the containers for all your galleries
		jQuery(this).magnificPopup({
			delegate: 'a', // the selector for gallery item
			type: 'image',
			gallery: {
			  enabled:true
			}
		});
	});
	jQuery('.gallery_zoom').each(function() { // the containers for all your galleries
		jQuery(this).magnificPopup({
			delegate: 'a.zoom', // the selector for gallery item
			type: 'image',
			gallery: {
			  enabled:true
			},
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});
		
	});
	jQuery('.popup-youtube').each(function() { // the containers for all your galleries
		jQuery(this).magnificPopup({
			type: 'iframe',
		});
	});
}

// -----------------------------------------------------
// --------------    PRICING NEWS HEIGHT   -------------
// -----------------------------------------------------


// -----------------------------------------------------
// --------------    BITCOIN WIDGET  -------------------
// -----------------------------------------------------

function bitmarket_tm_widget(){
	
	"use strict";
	
	var button		= jQuery('.bitmarket_tm_live_wrap .button');
	var element		= jQuery('.bitmarket_tm_live_wrap');
	
	button.on('click',function(){
		if(!element.hasClass('opened')){
		element.addClass('opened');
	}else{
		element.removeClass('opened');
	}
		return false;
	});
}

// -----------------------------------------------------
// --------------------    MINI BOX   ------------------
// -----------------------------------------------------
function bitmarket_tm_miniboxes(){
  "use strict";
	 
  var el 		= jQuery('.bitmarket_fn_miniboxes');
	 
  if(el.length){
   el.each(function(index, element) {
         
    var child	= jQuery(element).children('.bitmarket_fn_minibox');
    
    child.css({height:'auto'});
    // Get an array of all element heights
    
    var W 		= jQuery(window).width();
    if(W > 460){
     var elementHeights = child.map(function() {return jQuery(this).outerHeight();}).get();
    
     // Math.max takes a variable number of arguments
     // `apply` is equivalent to passing each height as an argument
     var maxHeight 		= Math.max.apply(null, elementHeights);
     
     // Set each height to the max height
     child.css({height:maxHeight+'px'}); 
    }
   });  
  }
 }