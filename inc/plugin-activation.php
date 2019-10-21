<?php
/**
 * TGM PLUGIN ACTIVATION
 *
 * Activates plugins needed by theme
 *
 * @package  shibumi
 */

// Activate TGM Class
require_once get_template_directory() . '/inc/apis/class-tgm-plugin-activation.php';

if ( ! function_exists( 'shibumi_register_slider_plugin' ) ) {
	function shibumi_register_slider_plugin() {
		$plugins = array(
			array(
				'name'			=> esc_html__( 'Jetpack', 'shibumi' ), // The plugin name
				'slug'			=> 'jetpack', // The plugin slug (typically the folder name)
				'required'		=> false, // If false, the plugin is only 'recommended' instead of required
			),
			array(
				'name'			=> esc_html__( 'Kirki', 'shibumi' ), // The plugin name
				'slug'			=> 'kirki', // The plugin slug (typically the folder name)
				'required'		=> true, // If false, the plugin is only 'recommended' instead of required
			),
			array(
				'name'			=> esc_html__( 'MailChimp List Subscribe Form', 'shibumi' ), // The plugin name
				'slug'			=> 'mailchimp_i18n', // The plugin slug (typically the folder name)
				'source'		=> 'https://downloads.wordpress.org/plugin/mailchimp.1.5.7.zip', // The plugin source
				'required'		=> false, // If false, the plugin is only 'recommended' instead of required
				'external_url'	=> 'https://wordpress.org', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'			=> 'WP Instagram Widget', // The plugin name
				'slug'			=> 'wp-instagram-widget', // The plugin slug (typically the folder name)
				'required'		=> false, // If false, the plugin is onl    y 'recommended' instead of required
			),
			array(
				'name'			=> 'Widget Visibility', // The plugin name
				'slug'			=> 'widget-visibility', // The plugin slug (typically the folder name)
				'required'		=> false, // If false, the plugin is onl    y 'recommended' instead of required
			),
		);
		$config = array(
			'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.

		);
		tgmpa( $plugins, $config );
	} // function
	add_action( 'tgmpa_register', 'shibumi_register_slider_plugin' );
} // if
