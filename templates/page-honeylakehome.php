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

	<div class="videoOverlay">
			
<?php if (isset($_COOKIE['newvisitor'])) { ?>


<script src="https://static-interlogyllc.netdna-ssl.com/static/feedback2.js?3.2.570" type="text/javascript">

new JotformFeedback({
formId:'40440259074147',
base:'https://secure.jotform.us/',
windowTitle:'Email PopUp',

background:'#FFA500',
fontColor:'#FFFFFF',
type:false,
height:500,
width:700,

openOnLoad:true
});
</script>
<?php } ?>


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
	