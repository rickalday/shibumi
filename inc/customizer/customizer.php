<?php
/**
 * Shibumi Theme Customizer
 *
 * @package Shibumi
 */

// Load Customizer specific functions
require get_template_directory() . '/inc/customizer/functions/customizer-functions.php';
require get_template_directory() . '/inc/customizer/functions/customizer-sanitization.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shibumi_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Remove default Colors section
	$wp_customize->remove_section( 'colors' );

	/**
     * PANELS
     */
    $wp_customize->add_panel( 'theme_options_panel', array(
        'priority'    => 200,
        'capability'  => 'edit_theme_options',
        'title'       => esc_html__( 'Shibumi Settings', 'shibumi' ),
        'description' => esc_html__( 'Shibumi Theme Options', 'shibumi' )
    ) );

    /**
     * SECTIONS AND SETTINGS
     */

    // Header settings
    require get_template_directory() . '/inc/customizer/settings/customizer-header.php';

    // Layout Settings
    require get_template_directory() . '/inc/customizer/settings/customizer-archive.php';

    // Single Settings
    require get_template_directory() . '/inc/customizer/settings/customizer-single.php';

    // Customizer Colors
    require get_template_directory() . '/inc/customizer/settings/customizer-colors.php';

    // Footer copyright
    require get_template_directory() . '/inc/customizer/settings/customizer-footer.php';


    if ( function_exists('mailchimpSF_signup_form')) {
        // Newsletter Settings
        require get_template_directory() . '/inc/customizer/settings/customizer-newsletter.php';
    }

}
add_action( 'customize_register', 'shibumi_customize_register' );


if(class_exists( 'Kirki' )){

    $categories = Kirki_Helper::get_terms( 'category' );
    $categories[0] = 'ALL';
    // Shop Settings
    require get_template_directory() . '/inc/customizer/settings/customizer-shop.php';

    // Google fonts
    require get_template_directory() . '/inc/customizer/settings/customizer-google-fonts.php';

    // Size logo
    require get_template_directory() . '/inc/customizer/settings/customizer-size-logo.php';
}

add_action( 'wp_head', 'add_loader_styles_to_header', 100 );

function add_loader_styles_to_header() {
    ?>
    <style>
        .kirki-customizer-loading-wrapper {
            background-image: none !important;
        }
    </style>
    <?php
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shibumi_customize_preview_js() {
    wp_enqueue_script( 'shibumi-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'shibumi_customize_preview_js' );

/**
 * Additional customizer controls and settings
 */
function shibumi_customize_controla_js() {
    // Customizer settings
    wp_enqueue_script( 'shibumi-customizer-scripts', get_template_directory_uri() . '/inc/customizer/js/customize-controls.js', array(), false, false );

    // Customizer font settings
    wp_enqueue_script( 'shibumi-admin-scripts', get_template_directory_uri() . '/inc/customizer/js/customizer-settings.js', array(), false, false );
}
add_action( 'customize_controls_enqueue_scripts', 'shibumi_customize_controla_js' );
