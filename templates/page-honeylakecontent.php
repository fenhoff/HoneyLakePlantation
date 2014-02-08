<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying content with a centered title
 *
   Template Name: Honeylake Content Page
   MultiEdit: SubTitle,TagLine,LargeItalicText,RightSideList
 *
 * @file           page-honeylakecontent.php
 * @author         Andrew Fenhoff 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php include 'slider.php'; ?>
	    
        <div class="container">
            <div class="main">
                <h2><?php echo get('tag_line'); ?></h2>
                <?php
                $myExcerpt = get('vimeo_url');
                $tags = array("<p>", "</p>");
                $myExcerpt = str_replace($tags, "", $myExcerpt);
                ?>
                <div class="vid-container">
                    <iframe src="//player.vimeo.com/video/<?php echo $myExcerpt; ?>?title=0&byline=0&portrait=0&color=ffffff"
                       width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                   </div>
                   <h4><?php echo get('italic_content'); ?></h4>
                   <p><?php the_content(); ?></p>
                   <a href="/contact" class="contact-btn">Contact Us</a>
               </div>


               <aside class="callout">
                   <?php echo get('right_side_content'); ?>
               </aside>

               <?php 
               if(strlen(do_shortcode(get('nextgen_gallery_shortcode'))) > 0)
               {
                ?>  <div class="gallery">
                <hr class="dotted-dark">
                <h3> <?php the_title(); ?> Gallery:</h3>

                <!--<div class=""gallery-slides""> -->
                <?php echo do_shortcode(get('nextgen_gallery_shortcode')) ; ?>
                <!--</div> -->
            </div> 
            <?php }
            ?>

        </div>


<?php endwhile; endif; ?>

	

<?php get_footer(); ?>