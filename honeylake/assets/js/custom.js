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
  jQuery(".overlay-menu").fadeToggle("fast");
	jQuery(".slideshow-module").fadeToggle("fast", function () {
  			jQuery(".videoOverlay").fadeToggle("fast");	
			});
});

jQuery(".video-close-btn").click(function() {
  jQuery(".overlay-menu").fadeToggle("fast");
	jQuery(".videoOverlay").fadeToggle("fast", function () {
  			jQuery(".slideshow-module").fadeToggle("fast");	
			});
});


// ///////////////////////////////////////////////////////
// Mobile Menu

jQuery(".menu-btn").click(function() {
	console.log("Menu Hit");
	jQuery("nav").slideToggle("fast");
});