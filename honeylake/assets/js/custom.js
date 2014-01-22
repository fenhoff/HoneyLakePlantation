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


var oldItem;

function homeMenu(activeItem) {	
    
    var menuOff = "#js-hm" + oldItem;
	var menuOn = "#js-hm" + activeItem;
    
    oldItem = activeItem;

    jQuery(menuOff).removeClass("active");
    jQuery(menuOn).addClass("active");

}

homeMenu(1);

jQuery(".menu-btn").click(function($){
    jQuery(".nav-menu").slideToggle("fast");
});

// Enable sticky nav
jQuery(document).ready(function($) {  
	if (!(navigator.userAgent.match(/Android/i) ||
             navigator.userAgent.match(/webOS/i) ||
             navigator.userAgent.match(/iPhone/i) ||
             navigator.userAgent.match(/iPad/i) ||
             navigator.userAgent.match(/iPod/i) ||
             navigator.userAgent.match(/BlackBerry/) || 
             navigator.userAgent.match(/Windows Phone/i) || 
             navigator.userAgent.match(/ZuneWP7/i)
             )) 
  {
    var stickyNavTop = $('.main-nav').offset().top;  

  	var stickyNav = function(){  
  		var scrollTop = $(window).scrollTop();  

  		if (scrollTop > stickyNavTop) {   
  			$('.main-nav').addClass('sticky');  
  		} else {  
  			$('.main-nav').removeClass('sticky');   
  		}
    }  
	};  

	stickyNav();  

	$(window).scroll(function() {  
		stickyNav();  
	});  
});  



// Smooth scroll
(function($) {
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
})(jQuery);


