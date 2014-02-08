<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico?v=1">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body>

<div class="site-wrapper">

	<header class="site-header">
		<div class="container  clearfix">
			<menu class="global-nav">
			<?php wp_nav_menu( array( 'menu_class' => '', 'container' => '', 'theme_location' => 'main-nav' ) ); ?>
			</menu>
			<div class="branding">
			 	<a href="/" class="logo clearfix" title="Honey Lake Plantation Resort &amp; Spa">
					<img src="<?php echo get_template_directory_uri() ; ?>/honeylake/assets/img/logo@2x.png" alt="<?php bloginfo( 'name' ); ?>" />
				</a>
				<h1 class="logo-name">
					<span class="logo-main">Honey&nbsp;Lake&nbsp;Plantation</span>
					<br>
					<span class="logo-sub">Resort&nbsp;&&nbsp;Spa</span>
				</h1>
				<a href="http://www.orvis.com" class="orvis-logo-header"  target="_blank">
					<img src="<?php echo get_template_directory_uri() ; ?>/honeylake/assets/img/orvis-endorsed.png" alt="Orvis Endorsed Wingshooting Lodge">
				</a>
			</div>
			<a onclick="return false;" class="menu-btn">Menu</a>
			<div class="main-nav">
				<?php wp_nav_menu( array('menu' => 'pages', 'container' => 'nav', 
										 'container_class' => 'nav-menu') ); ?>
			</div>
		</div>
	</header>
	

