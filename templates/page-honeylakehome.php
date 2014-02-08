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
		<?php wp_nav_menu( array('menu' => basename(get_permalink()), 'container' => 'div', 
						 'container_class' => 'overlay-menu') ); ?>
	</div>
get_footer(); ?>
	