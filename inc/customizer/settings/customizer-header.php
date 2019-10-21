<?php
/**
 * Customization of theme header
 *
 * @package Shibumi
 */

/**
 * Section
 */
$wp_customize->add_section( 'header_settings', array(
    'title'    => esc_html__( 'Main Menu Settings', 'shibumi' ),
    'priority' => 120,
    'panel'    => 'theme_options_panel'
) );

/**
 * Settings
 */

// Nav alignment
$wp_customize->add_setting( 'header_nav_align_setting', array(
    'default'           => 'left',
    'sanitize_callback' => 'shibumi_sanitize_radio'
));

$wp_customize->add_control( 'header_nav_align_setting', array(
    'label'    => esc_html__( 'Main Menu Position', 'shibumi' ),
    'priority' => 1,
    'section'  => 'header_settings',
    'type'     => 'radio',
    'choices'  => array(
        'left'   => 'Left',
        'center' => 'Center',
        'right'  => 'Right',
        'hamburger'  => 'Hamburger Button',
    ),
) );
