<?php
/*
@package kidzoo-lite
  =================
  THEME REQUIRED AND RECOMMENDED PLUGINS
  =================
*/

/**
 * Include the TGM_Plugin_Activation class.
*/
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'kidzoo_register_required_plugins' );

/**
 * Register the required plugins for this theme.
*/
function kidzoo_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => esc_html__('WooCommerce', 'kidzoo-lite'),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('Woo Product Slider and Carousel with category', 'kidzoo-lite'),
			'slug'      => 'woo-product-slider-and-carousel-with-category',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('WP Latest Posts', 'kidzoo-lite'),
			'slug'      => 'wp-latest-posts',
			'required'  => false,
		),
        array(
			'name'      => esc_html__('Newsletter', 'kidzoo-lite'),
			'slug'      => 'newsletter',
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
        array(
			'name'      => esc_html__('Testimonial Free', 'kidzoo-lite'),
			'slug'      => 'testimonial-free',
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'      => esc_html__('Contact Form 7', 'kidzoo-lite'),
			'slug'      => 'contact-form-7',
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'      => esc_html__('Better Font Awesome', 'kidzoo-lite'),
			'slug'      => 'better-font-awesome',
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'kidzoo-lite',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
