	<div class="banner slideshow-module large" id="js-home-banner">
		<div class="headline container" id="slideshow-text">
			<h1><?php the_title(); ?></h1>
                <h3>
					<?php echo get('subtitle'); ?>
				</h3>
				<?php 
					$slug = $post->post_name;
					if ($slug != 'home')
					{
	                	echo "<a href='contact' class='contact-btn'>Contact Us</a>";
	                }else{
						echo "<a href='#' onclick='return false;' class='video-btn'>Watch Video</a>";
	                }
                
                    $pageTitle = get_the_title();
                    if($pageTitle == "Weddings" || $pageTitle == "Sporting")
                    { 
                        echo "<a href='#packages' class='contact-btn'>View Packages</a>";
                    } 
                ?>

		</div>
	<!-- 	<div class="arrow-wrapper  clearfix">
			<a href="" class="arrow  left">&larr;</a>
			<a href="" class="arrow  right">&rarr;</a>
		</div> -->
		<div class="slider">
			<?php $options = _s_get_theme_options(); ?>
			<?php $slidermarkup = $options['slideshowid_text_input']; ?>
			<?php echo do_shortcode( $slidermarkup ); ?>
		</div>