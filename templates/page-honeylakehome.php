<?php
    // Top of the page, before sending out ANY output to the page.
        $user_is_first_timer = !isset( $_COOKIE["FirstTimer"] );

    // Set the cookie so that the message doesn't show again
        setcookie( "FirstTimer", 1, strtotime( '+1 year' ) );
?>

<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying content with a centered title
 *
   Template Name: Honeylake Home Page
 *
 * @file           page-calloutmenuitem.php
 * @package        Celestial Lite Child
 * @since          Celestial Lite Child 1.0 
 * @author         Andrew Fenhoff 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */

   get_header(); 

   include 'slider.php';
   wp_nav_menu( array('menu' => basename(get_permalink()), 'container' => 'div', 
   	'container_class' => 'overlay-menu') ); 

   $vimeoID = get('vimeo_url'); 
   $tags = array("<p>", "</p>");
   $vimeoID = str_replace($tags, "", $vimeoID);
   ?>


<?php if( $user_is_first_timer ): ?>
    <script src="https://static-interlogyllc.netdna-ssl.com/static/feedback2.js?3.2.581" type="text/javascript">
    new JotformFeedback({
    formId:'40440259074147',
    base:'https://secure.jotform.us/',
    windowTitle:'Email PopUp',
    background:'#FFA500',
    fontColor:'#FFFFFF',
    type:2,
    height:500,
    width:400
    });
    </script>
<?php endif; ?>



   


   <div class="videoOverlay">

       	<a href="#" class="video-close-btn" onclick="return false;">Close</a>
       	<div class="vid-container">
       		<?php echo '
       		<iframe src="http://player.vimeo.com/video/' . $vimeoID . '?title=0&byline=0&portrait=0&color=ffffff"
       		width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
       	    </iframe>'; ?>
        </div>
    </div>
    
</div>
<?php get_footer(); ?>
