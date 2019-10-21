<?php
/**
 * Customization of Archives
 *
 * @package Shibumi
 */

/**
 * Section
 */
$wp_customize->add_section( 'archive_settings', array(
    'title'    => esc_html__( 'Archive Settings', 'shibumi' ),
    'priority' => 140,
    'panel'    => 'theme_options_panel'
) );

/**
 * Settings
 */

// archive template layout
$wp_customize->add_setting( 'archive_layout_setting', array(
    'default'           => 'side',
    'sanitize_callback' => 'shibumi_sanitize_archive_layout'
) );

$wp_customize->add_control( 'archive_layout_setting', array(
    'label'       => esc_html__( 'Archive Style', 'shibumi' ),
    'priority'    => 0,
    'section'     => 'archive_settings',
    'type'        => 'radio',
    'choices'     => array(
    	'side'    => esc_attr__( 'Two column', 'shibumi' ),
        'masonry' => esc_attr__( 'Masonry', 'shibumi' ),
        'list'    => esc_attr__( 'List', 'shibumi' ),
    ),
) );

$wp_customize->add_setting( 'archive_results_number', array(
    'default'           => 1,
    'sanitize_callback' => 'shibumi_sanitize_select'
) );

$wp_customize->add_control( 'archive_results_number', array(
    'label'    => esc_attr__( 'Display Category Post Count', 'shibumi' ),
    'section'  => 'archive_settings',
    'priority' => 1,
    'type'     => 'checkbox'
) );

$wp_customize->add_setting( 'archive_rounded_corners', array(
    'default'           => 0,
    'sanitize_callback' => 'shibumi_sanitize_select'
) );

$wp_customize->add_control( 'archive_rounded_corners', array(
    'label'    => esc_attr__( 'Add rounded corners on buttons', 'shibumi' ),
    'section'  => 'archive_settings',
    'priority' => 2,
    'type'     => 'checkbox'
) );
