<?php
/**
 * Customizer Custom CSS
 *
 * Here you can define your own CSS rules
 *
 * @package  Shibumi
 */

/**
 * Section
 */
$wp_customize->add_section( 'footer_section', array(
    'title'    => esc_html__( 'Footer Settings', 'shibumi' ),
    'panel'    => 'theme_options_panel',
    'priority' => 210
) );


/**
 * Section
 */

// Enable Instagram Section
$wp_customize->add_setting( 'instagram_enable', array(
    'default'           => 0,
    'sanitize_callback' => 'shibumi_sanitize_select'
) );

$wp_customize->add_control( 'instagram_enable', array(
    'label'    => esc_html__( 'Enable Instagram section in the pre-footer area', 'shibumi' ),
    'section'  => 'footer_section',
    'priority' => 3,
    'type'     => 'checkbox'
) );

// Instagram username
$wp_customize->add_setting( 'instagram_username', array(
    'default'           => '',
    'sanitize_callback' => 'shibumi_sanitize_text'
) );

$wp_customize->add_control( 'instagram_username', array(
    'label'    => esc_html__( 'Instagram username', 'shibumi' ),
    'section'  => 'footer_section',
    'priority' => 4,
    'type'     => 'text'
) );

// Divider
$wp_customize->add_setting( 'shibumi_divider_1', array(
    'sanitize_callback' => 'shibumi_sanitize_text',
) );

// Divider
$wp_customize->add_control( new WP_Customize_Divider_Control(
    $wp_customize,
    'shibumi_divider_1',
        array(
            'section'  => 'footer_section',
            'priority' => 5
        )
) );


// Footer Copyright text
$wp_customize->add_setting( 'shibumi_footer_copyright', array(
    'default'           => '',
    'sanitize_callback' => 'shibumi_sanitize_text',
) );

$wp_customize->add_control( 'shibumi_footer_copyright', array(
    'label'    => esc_html__( 'Footer Copyright Text', 'shibumi' ),
    'section'  => 'footer_section',
    'priority' => 10,
    'settings' => 'shibumi_footer_copyright',
    'type'     => 'textarea'
) );
