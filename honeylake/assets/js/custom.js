// ///////////////////////////////////////////////////////
// Smooth scroll
jQuery(function() {
  jQuery('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html,body').animate({
          scrollTop: target.offset().top
        }, 700);
        return false;
      }
    }
  });
});

////////////////////////////////////////////////////////
// Video Overlay - Home page

jQuery(".video-btn").click(function() {
	console.log("Video Hit");
	jQuery(".slideshow-module").toggleClass("showVideo");
	jQuery(".headline").fadeToggle("fast", function() {
		jQuery(".slider").fadeToggle("fast", function () {
			jQuery(".videoOverlay").fadeToggle("fast");	
		});
		
	});
});

jQuery(".video-close-btn").click(function() {
	console.log("Close Video");
	jQuery(".slideshow-module").toggleClass("showVideo");
	jQuery(".videoOverlay").fadeToggle("fast", function () {
		jQuery(".headline").fadeToggle("fast", function () {
			jQuery(".slider").fadeToggle("fast");
		});
	});
});


// ///////////////////////////////////////////////////////
// Mobile Menu

jQuery(".menu-btn").click(function() {
	console.log("Menu Hit");
	jQuery("nav").slideToggle("fast");
});