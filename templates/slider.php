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
			echo "&nbsp;<a href='#packages' class='contact-btn'>View Packages</a>";
		} 
		?>

	</div>

	<?php
    $myExcerpt = get('slider_short_code');
    $tags = array("<p>", "</p>");
    $myExcerpt = str_replace($tags, "", $myExcerpt);
    if($myExcerpt != "")
    { 
    ?>
	<div class="slider">
		<?php $options = _s_get_theme_options(); ?>
		<?php $slidermarkup = $options['slideshowid_text_input']; ?>
		<?php echo do_shortcode( $slidermarkup ); ?>
	</div>
	<?php } ?>

	<div class="overlay-menu">
		<?php
		if($post->post_parent)
			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
		else
			$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
		if ($children) { ?>
		<ul>
			<?php echo $children; ?>
		</ul>
		<?php } ?>
	</div>
</div>  
