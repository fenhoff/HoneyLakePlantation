/*
// ///////////////////////////////////////////////////////
// Enable sticky nav
jQuery(document).ready(function() {  
	alert ('foo');

	var stickyNavTop = jQuery('.main-nav').offset().top;  

	var stickyNav = function(){  
		var scrollTop = jQuery(window).scrollTop();  

		if (scrollTop > stickyNavTop) {   
			jQuery('.main-nav').addClass('sticky');  
		} else {  
			jQuery('.main-nav').removeClass('sticky');   
		}  
	};  

	stickyNav();  

	$(window).scroll(function() {  
		stickyNav();  
	});  
});  
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> da439c65090c16a295ba1f47b4e8bab743937ee2
=======
>>>>>>> da439c65090c16a295ba1f47b4e8bab743937ee2
=======
>>>>>>> da439c65090c16a295ba1f47b4e8bab743937ee2

$(window).bind("load", function() { 
       var footerHeight = 0,
           footerTop = 0,
           $footer = $(".footer");
           
       positionFooter();
       
       function positionFooter() {
       
                footerHeight = $footer.height();
                footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";
       
               if ( ($(document.body).height()+footerHeight) < $(window).height()) {
                   $footer.css({
                        position: "absolute"
                   }).animate({
                        top: footerTop
                   })
               } else {
                   $footer.css({
                        position: "static"
                   })
               }
               
       }

       $(window)
               .scroll(positionFooter)
               .resize(positionFooter)
               
});

/* Enable sticky nav
$(document).ready(function() {  
	//var scrollBottom = $(window).scrollTop() + $(window).height();
	var bannerHeight = $('.banner').height() + $('.site-header').height();

	var stickyOverlayNav = function(){  

		var stickyNavBottom = $('.overlay-menu').offset().top;

		if (bannerHeight > stickyNavBottom) {   
			$('.overlay-menu').addClass('sticky');  
		} else {  
			$('.overlay-menu').removeClass('sticky');   
		}

		console.log("stickyNavBottom = " + stickyNavBottom + "| bannerHeight = " + bannerHeight);  
	};  

	stickyOverlayNav();  

	$(window).scroll(function() {  
		stickyOverlayNav();  
	});  
}); 
>>>>>>> da439c65090c16a295ba1f47b4e8bab743937ee2
*/


// ///////////////////////////////////////////////////////
// Smooth scroll
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 700);
        return false;
      }
    }
  });
});

// ///////////////////////////////////////////////////////
// Video Overlay - Home page

$(".video-btn").click(function() {
	console.log("Video Hit");
	$(".slideshow-module").toggleClass("showVideo");
	$(".headline").fadeToggle("fast", function() {
		$(".slider").fadeToggle("fast", function () {
			$(".videoOverlay").fadeToggle("fast");	
		});
		
	});
});

$(".video-close-btn").click(function() {
	console.log("Close Video");
	$(".slideshow-module").toggleClass("showVideo");
	$(".videoOverlay").fadeToggle("fast", function () {
		$(".headline").fadeToggle("fast", function () {
			$(".slider").fadeToggle("fast");
		});
	});
});


// ///////////////////////////////////////////////////////
// Mobile Menu

$(".menu-btn").click(function() {
	console.log("Menu Hit");
	$("nav").slideToggle("fast");
});


