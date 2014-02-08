// function jqUpdateSize(){
//     // Get the dimensions of the viewport
//     var wwidth = $(window).width();
//     var wheight = $(window).height();

//     $('#jqWidth').html(width);      // Display the width
//     $('#jqHeight').html(wheight);
//     $(".home-banner").height(wheight);
//       // Display the height
// };
// $(document).ready(jqUpdateSize);    // When the page first loads
// $(window).resize(jqUpdateSize);     // When the browser changes size


// Enable Gallery popups
$('.gallery-slides').magnificPopup({
	  delegate: 'a', // child items selector, by clicking on it popup will open
	  type: 'image',
	  gallery: {
	  	enabled: true,
	  	preload: [1,3],
	  	navigateByImgClick: true,
	  	arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>' // markup of an arrow button

	  }
	  // other options
	});

// Enable home page slider
$('.slider').glide();




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
*/


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


