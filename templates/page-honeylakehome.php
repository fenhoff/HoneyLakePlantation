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
 
get_header(); ?>

	<div class="banner slideshow-module large" id="js-home-banner">
		<div class="headline container" id="slideshow-text">
			<h1>The Best of Southern Hospitality</h1>
			<h3>Explore our rich history while you build new traditions at one of the south's best plantations.</h3>
		</div>
	<!-- 	<div class="arrow-wrapper  clearfix">
			<a href="" class="arrow  left">&larr;</a>
			<a href="" class="arrow  right">&rarr;</a>
		</div> -->
		<div class="slider">
			<?php $options = _s_get_theme_options(); ?>
			<?php $slidermarkup = $options['slideshowid_text_input'] ?>
			<?php echo do_shortcode( $slidermarkup ); ?>
		</div>
	


<?php
	$args = 
    array(  'category_name' => 'HomePageItem',
            'order'     => 'ASC',
            'meta_key' => 'OrderInCalloutMenu',
            'orderby'   => 'meta_value' //or 'meta_value_num'
    );

	$the_query = new WP_Query($args);

?>
	<?php $options['first_id'] = '0'; ?>
	<ul class="overlay-menu">
		<?php while ( $the_query -> have_posts() ) :  $the_query -> the_post(); ?>
				<li>
					<a class="overlay-menu-item" href="<?php the_title(); ?>"><?php the_title(); ?>
					</a>
				</li>
		<?php endwhile; // end of the loop. ?>
	</ul>	
		</div>
<?php get_footer(); ?>
	