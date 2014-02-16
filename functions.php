<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once( 'library/custom-post-type.php' ); // you can disable this if you like
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'bonestheme' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site...', 'bonestheme' ) . '" />
	<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) .'" />
	</form>';
	return $form;
} // don't remove this bracket!



/*****************************************************************
						THEME OPTIONS
*****************************************************************/
/**
 * _s Theme Options
 *
 * @package _s
 * @since _s 1.0
 */
 
/**
 * Register the form setting for our _s_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, _s_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are properly
 * formatted, and safe.
 *
 * @since _s 1.0
 */
function _s_theme_options_init() {
	register_setting(
		'_s_options', // Options group, see settings_fields() call in _s_theme_options_render_page()
		'_s_theme_options', // Database option, see _s_get_theme_options()
		'_s_theme_options_validate' // The sanitization callback, see _s_theme_options_validate()
	);
 
	// Register our settings field group
	add_settings_section(
		'general', // Unique identifier for the settings section
		'', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page; see _s_theme_options_add_page()
	);
	add_settings_field( 'address1_text_input', __( 'Address 1', '_s' ), '_s_settings_field_address1_text_input', 'theme_options', 'general' );
	add_settings_field( 'address2_text_input', __( 'Address 2', '_s' ), '_s_settings_field_address2_text_input', 'theme_options', 'general' );
	add_settings_field( 'telephone_text_input', __( 'Telephone', '_s' ), '_s_settings_field_telephone_text_input', 'theme_options', 'general' );
	
	add_settings_field( 'copyright_text_input', __( 'Copyright', '_s' ), '_s_settings_field_copyright_text_input', 'theme_options', 'general' );
 	add_settings_field( 'slideshowid_text_input', __( 'Slideshow ID', '_s' ), '_s_settings_field_slideshowid_text_input', 'theme_options', 'general' );
 
	// Register our individual settings fields
/*
	add_settings_field(
		'sample_checkbox', // Unique identifier for the field for this section
		__( 'Sample Checkbox', '_s' ), // Setting field label
		'_s_settings_field_sample_checkbox', // Function that renders the settings field
		'theme_options', // Menu slug, used to uniquely identify the page; see _s_theme_options_add_page()
		'general' // Settings section. Same as the first argument in the add_settings_section() above
	);
 
	add_settings_field( 'sample_select_options', __( 'Sample Select Options', '_s' ), '_s_settings_field_sample_select_options', 'theme_options', 'general' );
	add_settings_field( 'sample_radio_buttons', __( 'Sample Radio Buttons', '_s' ), '_s_settings_field_sample_radio_buttons', 'theme_options', 'general' );
	add_settings_field( 'sample_textarea', __( 'Sample Textarea', '_s' ), '_s_settings_field_sample_textarea', 'theme_options', 'general' );
*/
}
add_action( 'admin_init', '_s_theme_options_init' );
 
/**
 * Change the capability required to save the '_s_options' options group.
 *
 * @see _s_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see _s_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function _s_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability__s_options', '_s_option_page_capability' );
 
/**
 * Add our theme options page to the admin menu.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since _s 1.0
 */
function _s_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Honey Lake Options', '_s' ),   // Name of page
		__( 'Honey Lake Options', '_s' ),   // Label in menu
		'edit_theme_options',          // Capability required
		'theme_options',               // Menu slug, used to uniquely identify the page
		'_s_theme_options_render_page' // Function that renders the options page
	);
}
add_action( 'admin_menu', '_s_theme_options_add_page' );
 
/**
 * Returns an array of sample select options registered for _s.
 *
 * @since _s 1.0
function _s_sample_select_options() {
	$sample_select_options = array(
		'0' => array(
			'value' =>	'0',
			'label' => __( 'Zero', '_s' )
		),
		'1' => array(
			'value' =>	'1',
			'label' => __( 'One', '_s' )
		),
		'2' => array(
			'value' => '2',
			'label' => __( 'Two', '_s' )
		),
		'3' => array(
			'value' => '3',
			'label' => __( 'Three', '_s' )
		),
		'4' => array(
			'value' => '4',
			'label' => __( 'Four', '_s' )
		),
		'5' => array(
			'value' => '5',
			'label' => __( 'Five', '_s' )
		)
	);
 
	return apply_filters( '_s_sample_select_options', $sample_select_options );
}
 */

/**
 * Returns an array of sample radio options registered for _s.
 *
 * @since _s 1.0
 
function _s_sample_radio_buttons() {
	$sample_radio_buttons = array(
		'yes' => array(
			'value' => 'yes',
			'label' => __( 'Yes', '_s' )
		),
		'no' => array(
			'value' => 'no',
			'label' => __( 'No', '_s' )
		),
		'maybe' => array(
			'value' => 'maybe',
			'label' => __( 'Maybe', '_s' )
		)
	);
 
	return apply_filters( '_s_sample_radio_buttons', $sample_radio_buttons );
}
*/ 
/**
 * Returns the options array for _s.
 *
 * @since _s 1.0
 */
function _s_get_theme_options() {
	$saved = (array) get_option( '_s_theme_options' );
	$defaults = array(
		'slideshowid_text_input'     => '',
		'copyright_text_input'       => '',
		'address1_text_input'		 => '',
		'address2_text_input'		 => '',
		'telephone_text_input'		 => ''
	);
 
	$defaults = apply_filters( '_s_default_theme_options', $defaults );
 
	$options = wp_parse_args( $saved, $defaults );
	$options = array_intersect_key( $options, $defaults );
 
	return $options;
}
 
/**
 * Renders the sample checkbox setting field.
 
function _s_settings_field_sample_checkbox() {
	$options = _s_get_theme_options();
	?>
	<label for="sample-checkbox">
		<input type="checkbox" name="_s_theme_options[sample_checkbox]" id="sample-checkbox" <?php checked( 'on', $options['sample_checkbox'] ); ?> />
		<?php _e( 'A sample checkbox.', '_s' ); ?>
	</label>
	<?php
}
*/ 
/**
 * Renders the sample text input setting field.
 */
function _s_settings_field_slideshowid_text_input() {
	$options = _s_get_theme_options();
	?>
	<input type="text" name="_s_theme_options[slideshowid_text_input]" id="slideshowid-text-input" value="<?php echo esc_attr( $options['slideshowid_text_input'] ); ?>" />
	<label class="description" for="slideshowid-text-input"><?php _e( 'This is the Meta Slider Slideshow ID', '_s' ); ?></label>
	<?php
}

function _s_settings_field_copyright_text_input() {
	$options = _s_get_theme_options();
	?>
	<input type="text" style="width:600px;" name="_s_theme_options[copyright_text_input]" id="copyright-text-input" value="<?php echo esc_attr( $options['copyright_text_input'] ); ?>" />
	<?php
}

function _s_settings_field_address1_text_input() {
	$options = _s_get_theme_options();
	?>
	<input type="text" style="width:600px;" name="_s_theme_options[address1_text_input]" id="address1-text-input" value="<?php echo esc_attr( $options['address1_text_input'] ); ?>" />
	<?php
}

function _s_settings_field_address2_text_input() {
	$options = _s_get_theme_options();
	?>
	<input type="text" style="width:600px;" name="_s_theme_options[address2_text_input]" id="address2-text-input" value="<?php echo esc_attr( $options['address2_text_input'] ); ?>" />
	<?php
}

function _s_settings_field_telephone_text_input() {
	$options = _s_get_theme_options();
	?>
	<input type="text" style="width:600px;" name="_s_theme_options[telephone_text_input]" id="telephone-text-input" value="<?php echo esc_attr( $options['telephone_text_input'] ); ?>" />
	<?php
}
/**
 * Renders the sample select options setting field.
 
function _s_settings_field_sample_select_options() {
	$options = _s_get_theme_options();
	?>
	<select name="_s_theme_options[sample_select_options]" id="sample-select-options">
		<?php
			$selected = $options['sample_select_options'];
			$p = '';
			$r = '';
 
			foreach ( _s_sample_select_options() as $option ) {
				$label = $option['label'];
				if ( $selected == $option['value'] ) // Make default first in list
					$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
				else
					$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
			}
			echo $p . $r;
		?>
	</select>
	<label class="description" for="sample_theme_options[selectinput]"><?php _e( 'Sample select input', '_s' ); ?></label>
	<?php
}
*/ 
/**
 * Renders the radio options setting field.
 *
 * @since _s 1.0
 
function _s_settings_field_sample_radio_buttons() {
	$options = _s_get_theme_options();
 
	foreach ( _s_sample_radio_buttons() as $button ) {
	?>
	<div class="layout">
		<label class="description">
			<input type="radio" name="_s_theme_options[sample_radio_buttons]" value="<?php echo esc_attr( $button['value'] ); ?>" <?php checked( $options['sample_radio_buttons'], $button['value'] ); ?> />
			<?php echo $button['label']; ?>
		</label>
	</div>
	<?php
	}
}
*/ 
/**
 * Renders the sample textarea setting field.
 
function _s_settings_field_sample_textarea() {
	$options = _s_get_theme_options();
	?>
	<textarea class="large-text" type="text" name="_s_theme_options[sample_textarea]" id="sample-textarea" cols="50" rows="10" /><?php echo esc_textarea( $options['sample_textarea'] ); ?></textarea>
	<label class="description" for="sample-textarea"><?php _e( 'Sample textarea', '_s' ); ?></label>
	<?php
}
*/ 
/**
 * Renders the Theme Options administration screen.
 *
 * @since _s 1.0
 */
function _s_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<?php $theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>
		<h2><?php printf( __( '%s Theme Options', '_s' ), $theme_name ); ?></h2>
		<?php settings_errors(); ?>
 
		<form method="post" action="options.php">
			<?php
				settings_fields( '_s_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}
 
/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see _s_theme_options_init()
 * @todo set up Reset Options action
 *
 * @param array $input Unknown values.
 * @return array Sanitized theme options ready to be stored in the database.
 *
 * @since _s 1.0

function _s_theme_options_validate( $input ) {
	$output = array();
 
	// Checkboxes will only be present if checked.
	if ( isset( $input['sample_checkbox'] ) )
		$output['sample_checkbox'] = 'on';
 
	// The sample text input must be safe text with no HTML tags
	if ( isset( $input['sample_text_input'] ) && ! empty( $input['sample_text_input'] ) )
		$output['sample_text_input'] = wp_filter_nohtml_kses( $input['sample_text_input'] );
 
	// The sample select option must actually be in the array of select options
	if ( isset( $input['sample_select_options'] ) && array_key_exists( $input['sample_select_options'], _s_sample_select_options() ) )
		$output['sample_select_options'] = $input['sample_select_options'];
 
	// The sample radio button value must be in our array of radio button values
	if ( isset( $input['sample_radio_buttons'] ) && array_key_exists( $input['sample_radio_buttons'], _s_sample_radio_buttons() ) )
		$output['sample_radio_buttons'] = $input['sample_radio_buttons'];
 
	// The sample textarea must be safe text with the allowed tags for posts
	if ( isset( $input['sample_textarea'] ) && ! empty( $input['sample_textarea'] ) )
		$output['sample_textarea'] = wp_filter_post_kses( $input['sample_textarea'] );
 
	return apply_filters( '_s_theme_options_validate', $output, $input );
}
 */
function _s_theme_options_validate( $input ) {
	$output = array();
 	if ( isset( $input['slideshowid_text_input'] ) && ! empty( $input['slideshowid_text_input'] ) )
		$output['slideshowid_text_input'] = wp_filter_nohtml_kses( $input['slideshowid_text_input'] );
 
	if ( isset( $input['copyright_text_input'] ) && ! empty( $input['copyright_text_input'] ) )
		$output['copyright_text_input'] = wp_filter_nohtml_kses( $input['copyright_text_input'] );

	if ( isset( $input['address1_text_input'] ) && ! empty( $input['address1_text_input'] ) )
		$output['address1_text_input'] = wp_filter_nohtml_kses( $input['address1_text_input'] );
 
 	if ( isset( $input['address2_text_input'] ) && ! empty( $input['address2_text_input'] ) )
		$output['address2_text_input'] = wp_filter_nohtml_kses( $input['address2_text_input'] );
 
 	if ( isset( $input['telephone_text_input'] ) && ! empty( $input['telephone_text_input'] ) )
		$output['telephone_text_input'] = wp_filter_nohtml_kses( $input['telephone_text_input'] );
  
	return apply_filters( '_s_theme_options_validate', $output, $input );;
}
/*****************************************************************
					END THEME OPTIONS
*****************************************************************/

?>
