<?php
/**
 * Customization of Single
 *
 * @package Shibumi
 */

/**
 * Section
 */
$wp_customize->add_section( 'single_settings', array(
    'title'    => esc_html__( 'Single Post Settings', 'shibumi' ),
    'priority' => 120,
    'panel'    => 'theme_options_panel'
) );

/**
 * Settings
 */

$wp_customize->add_setting( 'single_reading_time', array(
    'default'           => 1,
    'sanitize_callback' => 'shibumi_sanitize_select'
) );

$wp_customize->add_control( 'single_reading_time', array(
    'label'    => esc_attr__( 'Display Reading Time', 'shibumi' ),
    'section'  => 'single_settings',
    'priority' => 1,
    'type'     => 'checkbox'
) );

$wp_customize->add_setting( 'single_navigation', array(
    'default'           => 1,
    'sanitize_callback' => 'shibumi_sanitize_select'
) );

$wp_customize->add_control( 'single_navigation', array(
    'label'    => esc_attr__( 'Display Navigation for Prev/Next Post', 'shibumi' ),
    'section'  => 'single_settings',
    'priority' => 1,
    'type'     => 'checkbox'
) );
