	<div class="footer">
		<!-- <div class="container">
			<?php wp_nav_menu( array( 'menu_class' => '', 'container_class' => 'footer-links', 'theme_location' => 'footer-links',) ); ?>
		<p class="copyright">
				<?php $options = _s_get_theme_options(); ?>
				<?php echo $options['copyright_text_input'] ?>
		<p class="legal">
			<a href="#">Terms of Use</a>
			<a href="#">Privacy Policy</a>
		</p>
		</div> -->


		<div class="container">
	
		<div class="footer-left">
			<address>
				<strong>Honey Lake Plantation Resort&nbsp;&amp;&nbsp;Spa</strong><br>
				<?php echo $options['address1_text_input'] ?><br>
				<?php echo $options['address2_text_input'] ?><br>
				<a href="tel:<?php echo $options['telephone_text_input']; ?>">Tel: <?php echo $options['telephone_text_input']; ?></a>
			</address>
			<ul class="copyright">
				<li><?php echo $options['copyright_text_input'] ?></li>
				<li><a href="#">Terms&nbsp;of&nbsp;Use</a></li>
				<li><a href="#">Privacy&nbsp;Policy</a></li>
			</ul>
			<a href="http://www.honeylakeplantation.com/orvis/">
				<img src="<?php echo get_template_directory_uri() ; ?>/honeylake/assets/img/orvis-endorsed.png" alt="Orvis Endorsed Wingshooting Lodge" class="orvis-logo">
			</a>
		</div>

		<div class="footer-right">
			<?php wp_nav_menu( array( 'menu_class' => '', 'container_class' => 'footer-links', 'theme_location' => 'footer-links',) ); ?>
			<ul class="social-links">
				<li><a href="https://twitter.com/HoneyLakeResort" class="social-twitter" target="_blank"><span>Twitter</span></a></li>
				<li><a href="http://www.pinterest.com/honeylakep/" class="social-pinterest" target="_blank"><span>Pinterest</span></a></li>
				<li><a href="https://www.facebook.com/honeylakeplantation" class="social-facebook" target="_blank"><span>Facebook</span></a></li>
			</ul>
		</div>
	
	</div>
	</div>


</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html>